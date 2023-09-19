<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\NewRegisterController;
use App\Models\Management\BusinessType;
use App\Models\Management\Catalog;
use App\Models\Management\CatalogProducts;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Lists;
use App\Models\Management\Person;
use App\Models\Management\RoleUser;
use App\Models\Management\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use \App\Models\Management\Address;

const TIPOS_DOCUMENTOS = 4;
const PAISES = 19;
const MUNICIPIOS = 21;
const TIPO_CONTACTO_COREO = 37;
const PATH_FILE = "/support/docsContracts/";
const DOCUMENTOS_CONTRATO = 95;

//PERSONS
const DEPARTMENT_NEWSTORE = 2002;
const TYPE_ADDRESS_NEWSTORE = 23;
const TYPE_EMAIL_NEWSTORE = 33;

//CONTRACTS
const QUANTITY_STORES = 1;
const QUANTITY_USER = 2;
const TYPE_CONTRACT = 40;
const TIME_BILLING = 123;
const TAX_REGIMEN = 44;

//USER
const USER_IMG = "user000000.png";

//COMPANIES
const TIPOS_SEDES = 46;
const PATH_IMAGE = "/support/pictures/productscatalogs/";

class NewstoreController extends Controller
{

    use NewRegisterController;

    public $typeIdentification = '';
    public $countries = '';
    public $cities = '';
    public $companyType = '';
    public $documentContract = '';
    public $businessType = '';

    public function __construct(){
        $this->typeIdentification = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)
            ->whereRaw('id <> idowner')
            ->get();

        $this->countries = Lists::where('idowner', '=', PAISES)->whereRaw('id <> idowner')
            ->where('code', 'COL')
            ->orderBy('order', 'asc')
            ->get();

        $this->cities = Lists::where('idowner', '=', MUNICIPIOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        $this->companyType = Lists::where('idowner', TIPOS_SEDES)->where('order', '<>', 0)
            ->whereIn('id', [47, 48])
            ->get();

        $this->documentContract = Lists::where('idowner', '=', DOCUMENTOS_CONTRATO)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->businessType = BusinessType::all()
            ->where('status', 1);
    }

    public function registernewstore()
    {
        $contract = decrypt(Input::get('contract'));

        return view('auth.newstore', [
            'tipoidentificacion' => $this->typeIdentification,
            'itemscountries' => $this->countries,
            'itemscities' => $this->cities,
            'tiposSedes' => $this->companyType,
            'documentContract' => $this->documentContract,
            'contract' => $contract,
            'businessType' => $this->businessType
        ]);
    }

    public function save(Request $request){
        DB::beginTransaction();

        $contract = Contract::find($request->contract);
        $key = $contract->keyfisico;

        try{
            $this->savePerson($request, $key);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withInput()->with('errors', array(__("Store can't be saved.")));
        }
        return redirect('auth/login?par=' . $key)->with('success',  array(__('An email was sent to you with your access credentials')));

    }

    public function savePerson(Request $request, $key){
        $person = new Person();
        $person->typeperson_id = 2;
        $person->typedocument_id = 5;
        $person->digitcheck = 0;
        $person->numberdocument = $request->numberdocumento;
        $person->firstname = $request->nombre;
        $person->lastname = $request->apellido;
        $person->birthdate = ' ';
        $person->status = 1;
        $person->save();

        $this->saveAddress($request, $person->id);
        $this->saveContractPerson($request->contract, $person->id);
        $store = $this->saveStore($request, $person->id);
        $this->saveUsers($person->id, $request->contract, $request, $key, $store);
    }

    public function saveAddress($request,$person_id){
        $address = new Address();
        $address->person_id = $person_id;
        $address->country_id = 1047;
        $address->deparment_id = 2002;
        $address->city_id = 2181;
        $address->neighborhood = '';
        $address->address = $request->direccion;
        $address->typeaddress_id = 23;
        $address->status = 1;
        $address->save();
    }

    public function saveContractPerson($contract, $person_id){
        $contractperson = new ContractsPersons();
        $contractperson->contract_id = $contract;
        $contractperson->person_id = $person_id;
        $contractperson->type_user = 'cont';
        $contractperson->save();

        $contractperson_seller = new ContractsPersons();
        $contractperson_seller->contract_id = $contract;
        $contractperson_seller->person_id = $person_id;
        $contractperson_seller->type_user = 'cont';
        $contractperson_seller->save();
    }

    public function saveUsers($person_id, $contract, $request, $key, $store){
        $url = explode('/',$request->url);

        //change email domain
        $email_array = explode("@", $request->email);
        $email_admin = $email_array[0] . '@adm.com';

        if($request->typeStore == 47){
            $companyAdmin = new User();
            $companyAdmin->person_id = $person_id;
            $companyAdmin->contract_id = $contract;
            $companyAdmin->name = strtolower(str_replace(' ', '', $request->nombre));
            $companyAdmin->email = $request->email;
            $companyAdmin->password = bcrypt($request->numberdocumento);
            $companyAdmin->image = "user000000.png";
            $companyAdmin->status = 1;
            $companyAdmin->save();

            $companyAdminTendero = new RoleUser();
            $companyAdminTendero->user_id = $companyAdmin->id;
            $companyAdminTendero->role_id = 7;
            $companyAdminTendero->save();

            $company_user = new CompaniesUsers();
            $company_user->company_id = $store;
            $company_user->user_id = $companyAdmin->id;
            $company_user->save();
        }
        else{
            $companyAdmin = new User();
            $companyAdmin->person_id = $person_id;
            $companyAdmin->contract_id = $contract;
            $companyAdmin->name = strtolower(str_replace(' ', '', $request->nombre));
            $companyAdmin->email = $email_admin;
            $companyAdmin->password = bcrypt($request->numberdocumento);
            $companyAdmin->image = "user000000.png";
            $companyAdmin->status = 1;
            $companyAdmin->save();

            $companyAdminRole = new RoleUser();
            $companyAdminRole->user_id = $companyAdmin->id;
            $companyAdminRole->role_id = 6;
            $companyAdminRole->save();

            $seller = new User();
            $seller->person_id = $person_id;
            $seller->contract_id = $contract;
            $seller->name = strtolower(str_replace(' ', '', $request->nombre));
            $seller->email = $request->email;
            $seller->password = bcrypt($request->numberdocumento);
            $seller->image = "user000000.png";
            $seller->status = 1;
            $seller->save();

            $sellerRole = new RoleUser();
            $sellerRole->user_id = $seller->id;
            $sellerRole->role_id = 3;
            $sellerRole->save();

            $company_user = new CompaniesUsers();
            $company_user->company_id = $store;
            $company_user->user_id = $seller->id;
            $company_user->save();
        }

        $companyCatalog = BusinessType::find($request->businessType);
        $genericCatalog = Catalog::find($companyCatalog->catalog_id);

        //Create Contract Catalog
        $catalog = new Catalog();
        $catalog->contract_id = $contract;
        $catalog->name = $genericCatalog->name;
        $catalog->description = $genericCatalog->description;
        $catalog->status = 1;
        $catalog->typecatalog_id = 105;
        $catalog->save();

        $catalogNew = Catalog::find($catalog->id);
        $catalogNew->name = $catalogNew->name . '_' . $catalog->id;
        $catalogNew->description = $catalogNew->description . '_' . $catalog->id;
        $catalogNew->update();

        //Clone All Products
        $products = CatalogProducts::where('catalog_id', $companyCatalog->catalog_id)->get();
        $this->cloneCatalog($products, $catalog, $genericCatalog, $companyCatalog);

        $company = Company::find($store);
        $company->admon_id = $companyAdmin->id;
        $company->catalog_id = $catalog->id;
        $company->update();

        $this->sendMail($request->email, $email_admin, $request->numberdocumento, $url[2], $key, $companyAdmin->name, $contract, $request->typeStore );
    }

    public function saveStore($request, $person_id){

        //$idSeparator = $request->payments != null ? implode('|',$request->payments) : '';
        //$payments = Contract::where('id', $this->contract)->value('paymentsmethods');

        $company = new Company();
        $company->contract_id = $request->contract;
        $company->person_id = $person_id;
        $company->name = $request->nombretienda;
        $company->slogan = $request->nombretienda;
        $company->typecompany_id = $request->typeStore;
        //$company->paymentsmethods = $payments;
        $company->startdate = Carbon::now();
        $company->enddate = Carbon::now()->addYear();
        $company->idowner = 0;
        $company->created_at = Carbon::now()->toDateString();
        $company->save();

        return $company->id;
    }

    public function cloneCatalog($products, $catalog, $genericCatalog, $companyCatalog)
    {
        foreach ($products as $value) {
            $catproduct = new CatalogProducts();
            $catproduct->catalog_id = $catalog->id;
            $catproduct->product_id = $value->product_id;
            $catproduct->name = $value->name;
            $catproduct->category_id = $value->category_id;
            $catproduct->supplier_id = $value->supplier_id;
            $catproduct->salesunit_id = $value->salesunit_id;
            $catproduct->purchaseprice = $value->purchaseprice;
            $catproduct->saleprice = $value->saleprice;
            $catproduct->barcode = $value->barcode;
            $catproduct->products_taxe_id = $value->products_taxe_id;
            $catproduct->image = $value->image;
            $catproduct->image_temporary = $value->image_temporary;
            $catproduct->status = $value->status;
            $catproduct->save();

            // Copy Images
            $path_destino  = PATH_IMAGE  . $catalog->id .'/'. str_pad(strval($catproduct->category_id), 3, "0", STR_PAD_LEFT);
            if (!file_exists(public_path($path_destino))) mkdir(public_path($path_destino), 0777, true);

            $path_products  = PATH_IMAGE . $genericCatalog->id.'/'.str_pad(strval($value->category_id), 3, "0", STR_PAD_LEFT);
            $path_cat  = $path_products. '/'.$value->image;

            if(file_exists(public_path() . $path_cat)){
                if(!file_exists(public_path($path_destino).'/'. $value->image)) {
                    \File::copy(public_path() . $path_cat, public_path($path_destino).'/'.$value->image);
                }
            }
        }
    }

        public function copyImage($id, $master, $masterCategory, $imageMaster, $catalog, $category, $image){
            $path_destino  = PATH_IMAGE  . $catalog .'/'. str_pad(strval($category), 3, "0", STR_PAD_LEFT);
            if (!file_exists(public_path($path_destino))) mkdir(public_path($path_destino), 0777, true);

            // $path_products  = "/support/pictures/products/";
            $path_products  = "/support/pictures/productscatalogs/".$master.'/'.str_pad(strval($masterCategory), 3, "0", STR_PAD_LEFT);
            $path_cat  = $path_products. '/'.$imageMaster;

            if(file_exists(public_path() . $path_cat)){
                if(!file_exists(public_path($path_destino).'/'. $image)) {
                    \File::copy(public_path() . $path_cat, public_path($path_destino).'/'.$image);
                }
            }
        }


    public function sendMail($email, $admin_email, $passuser,$url, $key, $name, $contract_id, $type){

        $person_id = ContractsPersons::where('contract_id', $contract_id)->value('person_id');
        $business = Person::where('id', $person_id)->first();
        $busisess_name = $business->socialreason;
        $subject = __("Bienvenido a tu plataforma {$busisess_name}");
        $file = public_path('files/BienvenidoAlPuntoDeVenta.pdf');

        Mail::send('emails.storemail', [
            'email_admin'=>$admin_email,
            'email_seller'=>$email,
            'passuser'=>$passuser,
            'url'=>$url,
            'key'=>$key,
            'name' => $name,
            'business' => $busisess_name,
            'type' => $type,
            'contract' => $contract_id], function ($msj) use ($subject, $email, $file) {
            $msj->subject($subject);
            $msj->to($email);
            $msj->attach($file);
        });
    }

    public function ajax()
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'validateEmail':
                $contract = Input::get('contract');
                $email = Input::get('email');

                $email = User::where('contract_id', $contract)
                    ->where('email', $email)->value('email');

                $result->success = true;
                $result->message = !empty($email) > 0 ? false : true;

                return json_encode($result);
                break;

            case 'validateDocument':
                $typedocument = Input::get('typedoc');
                $numberdocument = Input::get('numberdocument');
                $contract = Input::get('contract');

                $document = Person::where('typedocument_id', $typedocument)
                    ->where('numberdocument', $numberdocument)
                    ->join('contracts_persons', 'persons.id', 'contracts_persons.person_id')
                    ->where('contract_id', $contract)
                    ->get();

                $result->success = true;
                $result->message = count($document) > 0 ? false : true;

                return json_encode($result);
                break;
        }
    }

}
