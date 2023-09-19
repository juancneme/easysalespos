<?php

namespace App\Http\Controllers\Management;

use App\Enums\ImagesPathEnum;
use App\Models\Management\CredentialsCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Person;
use App\Models\Management\Lists;
use App\Models\Management\Catalog;
use App\Models\Management\User;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Users;

const TIPOS_SEDES = 46;
const TIPOS_PAGOS = 91;
const ID_EFECTIVO = 92;
const EFECTIVO_ENTREGA = 147;
const TENDEROUNICO = 47;
const CONVENDEORES = 48;
const DELIVERYS = 124;


class CompaniesController extends Controller
{

    public $contratos = '';
    public $personas = '';
    public $itemstypesede = '';
    public $catalogs = '';
    public $usersadmon = "";
    public $currentusersadmon = "";
    public $sellers = '';
    public $itemstypepay = '';
    public $admonsids = [];
    public $availableadmonsids = [];
    public $catalogsid = [];
    public $availablecatalogs = [];
    public $type_contrac = 'CEN';
    public $type_user = "VEN";
    // public $config_catalog = 'NO';

    public function __construct()
    {
        $this->middleware('auth');

        if (!empty(auth()->user())) {

            if (!auth()->user()->hasRole('admin')) {
                //Administrador de contratos y demas usuarios
                // $this->contratos = Contract::where('id', auth()->user()->contract_id)
                //     ->orderBy('numbercontract', 'asc')->get();
                $this->contratos = Contract::where('contracts.id', '<>', 1)
                    ->where('id', auth()->user()->contract_id)
                    ->orderBy('numbercontract', 'asc')->get();
// dd($this->contratos[0]->typecontract_id, auth()->user()->hasRole('adcontrato'));
                if ($this->contratos[0]->typecontract_id == 143) $this->type_contrac = 'DES';
                if (auth()->user()->hasRole('adcontrato')) $this->type_user = "ADM";
                    
                // } else {
                //     if (!auth()->user()->hasRole('adcontrato')) {
                //         $this->type_contrac = 'DES';
                //         $this->config_catalog = 'SI';
                //     }
                // }
// dd( $this->type_contrac, $this->config_catalog);
                $this->currentcatalogs = Catalog::where('catalogs.contract_id', auth()->user()->contract_id)
                    ->join('companies', 'companies.catalog_id', 'catalogs.id')
                    ->where('typecatalog_id', 105)
                    ->with('Contrato.TypeContract')
                    ->orderBy('catalogs.name', 'asc')->get();


                for ($i = 0; $i < count($this->currentcatalogs); $i++) {
                    array_push($this->catalogsid, $this->currentcatalogs[$i]->catalog_id);
                }

                $this->catalogs = Catalog::where('contract_id', auth()->user()->contract_id)
                    ->where('typecatalog_id', 105)
                    ->whereNotIn('id', $this->catalogsid)
                    ->with('Contrato.TypeContract')
                    ->orderBy('name', 'asc')->get();

                for ($i = 0; $i < count($this->catalogs); $i++) {
                    array_push($this->availablecatalogs, $this->catalogs[$i]->id);
                }

                $this->currentusersadmon = Users::select('users.*')
                    ->join('role_user', 'role_user.user_id', 'users.id')
                    ->join('companies', 'admon_id', 'users.id')
                    ->where('users.contract_id', auth()->user()->contract_id)
                    ->whereIn('role_user.role_id', [6,7])
                    ->orderBy('name', 'asc')->get();

                for ($i = 0; $i < count($this->currentusersadmon); $i++) {
                    array_push($this->admonsids, $this->currentusersadmon[$i]->id);
                }

                $this->usersadmon = Users::select('users.*')
                    ->join('role_user', 'role_user.user_id', 'users.id')
                    ->where('users.contract_id', auth()->user()->contract_id)
                    ->whereIn('role_user.role_id', [6,7])
                    ->whereNotIn('users.id', $this->admonsids)
                    ->orderBy('name', 'asc')->get();

                for ($i = 0; $i < count($this->usersadmon); $i++) {
                    array_push($this->availableadmonsids, $this->usersadmon[$i]->id);
                }

                $this->personas = Person::join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
                    ->where('contracts_persons.contract_id', '=', auth()->user()->contract_id)
                    ->whereIn('contracts_persons.type_user', ['comp', 'cont'])
                    ->groupBy('id')
                    ->orderBy('id', 'asc')->get();

                $this->sellers = User::select('users.id', 'socialreason', 'firstname', 'lastname')
                    ->join('role_user', 'role_user.user_id', 'users.id')
                    ->join('persons', 'persons.id', 'users.person_id')
                    ->where('users.contract_id', auth()->user()->contract_id)
                    ->whereIn('role_user.role_id', [3,4])  //3 Cajero - 4 Vendedor
                    ->get();

                $ciasContratadas = $this->contratos[0]->quantitystores;
            } else {
                //Administrador Plataforma
                $this->contratos = Contract::where('contracts.id', '<>', 1)
                    ->orderBy('numbercontract', 'asc')->get();

                $this->usersadmon = Users::select('users.*')
                    ->join('role_user', 'role_user.user_id', 'users.id')
                    ->where('role_user.role_id', 6)
                    ->orderBy('name', 'asc')
                    ->with('person')->get();

                $this->catalogs = Catalog::where('typecatalog_id', 105)
                    ->orderBy('name', 'asc')->get();


                $this->personas = Person::orderBy('id', 'asc')->get();

                $this->sellers = User::select('users.id', 'socialreason', 'firstname', 'lastname')
                    ->join('role_user', 'role_user.user_id', 'users.id')
                    ->join('persons', 'persons.id', 'users.person_id')
                    ->whereIn('role_user.role_id', [3,4])  //3 Cajero - 4 Vendedor
                    ->get();

                $ciasContratadas = 999;
            }

            $this->paymentsMethods = Contract::where('id', auth()->user()->contract_id)->value('paymentsmethods');

            $this->paymentsMethodsArray = explode("|", $this->paymentsMethods);

            $this->itemstypepay = Lists::where('idowner', TIPOS_PAGOS)
                ->whereIn('id', $this->paymentsMethodsArray)
                ->whereRaw('id <> idowner')
                ->orderBy('name', 'asc')->get();

            $this->itemstypesede = Lists::where('idowner', TIPOS_SEDES)
                ->where('code', $this->type_contrac)
                ->whereRaw('id <> idowner')
                ->where('status', 1)
                ->orderBy('order', 'asc')->get();

            $ciasCreadas = Company::where('contract_id', '=', auth()->user()->contract_id)->count();

            $this->deliveryLists = Lists::where('idowner', '=', DELIVERYS)->whereRaw('id <> idowner')
                ->orderBy('order', 'asc')->get();

            if ($ciasCreadas < $ciasContratadas) {
                $this->numcias = true;
            } else {
                $this->numcias = false;
            }
        }
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contratos' => $this->contratos,
            'personas' => $this->personas,
            'itemstypesede' => $this->itemstypesede,
            'numcias' => $this->numcias,
            'catalogs' => $this->catalogs,
            'usersadmon' => $this->usersadmon,
            'sellers' => $this->sellers,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => ImagesPathEnum::PATH_COMPANY,
            'image' => 'comp000000.png',
            'itemstypepay' => $this->itemstypepay,
            'deliveryLists' => $this->deliveryLists,
            'type_contrac' => $this->type_contrac,
            'type_user' => $this->type_user
        ]);
    } 

    public function viewlist($group, $page)
    {

        $results = Company::select('companies.*', 'persons.socialreason', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
            ->join('persons', 'persons.id', '=', 'companies.person_id')
            ->with('Contrato', 'Persona');

        if (!auth()->user()->hasRole('admin')) {
            if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')){
                $company = Company::where('admon_id',auth()->user()->id)->value('id');
                $results->where('companies.id', '=', $company);
            }
            else{
                $results->where('contract_id', '=', auth()->user()->contract_id);
            }
        }

        return Datatables::of($results)
            ->addColumn('fullname', function ($model) {
                return $model->persona->fullname;
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])
            ->filterColumn('fullname', function ($query, $keyword) {
                $sql = "CONCAT(socialreason, ' ', firstname, '', othernames, '', lastname, '', otherlastname) like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->make(true);
    }

    public function edit($group, $page, $id)
    {
        $companyEdit = Company::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        $vendedoresasignados = Company::select('user_id')
            ->join('companies_users', 'companies_users.company_id', 'companies.id')
            ->where('companies.contract_id', $companyEdit->contract_id)
            ->where('companies_users.company_id', '!=', $id)
            ->get()->toArray();

        $this->sellers = User::select('users.id', 'socialreason', 'firstname', 'lastname', 'users.name','role_id')
            ->with('roles')
            ->join('role_user', 'role_user.user_id', 'users.id')
            ->join('persons', 'persons.id', 'users.person_id')
            ->where('users.contract_id', $companyEdit->contract_id)
            ->whereIn('role_user.role_id', [3,4])
            ->whereNotIn('users.id', $vendedoresasignados)
            ->get();

        $catalogosasignados = Company::select('catalog_id')
            ->where('companies.contract_id', $companyEdit->contract_id)
            ->where('companies.id', '!=', $companyEdit->id)
            ->where('companies.catalog_id', '!=', null)
            ->get()->toArray();

        $this->catalogs = Catalog::select('*')
            ->where('contract_id', $companyEdit->contract_id)
            ->where('typecatalog_id', 105)
            ->whereNotIn('id', $catalogosasignados)
            ->with('Contrato.TypeContract')
            ->orderBy('name', 'asc')->get();

        $adtiendaasignados = Company::select('admon_id')
            ->where('companies.contract_id', $companyEdit->contract_id)
            ->where('companies.id', '!=', $companyEdit->id)
            ->where('companies.admon_id', '>', 0)
            ->where('companies.id', '<>', $companyEdit->id)
            ->get()->toArray();

        $this->adtiendas = Users::select('users.*')
            ->join('role_user', 'role_user.user_id', 'users.id')
            ->whereIn('role_user.role_id', [6,7])
            ->where('users.contract_id', $companyEdit->contract_id)
            ->whereNotIn('id', $adtiendaasignados)
            ->orderBy('name', 'asc')->get();


        $this->paymentsMethods = Contract::where('id', $companyEdit->contract_id)->value('paymentsmethods');

        $this->paymentsMethodsArray = explode("|", $this->paymentsMethods);

        $this->itemstypepay = Lists::where('idowner', TIPOS_PAGOS)
            ->whereIn('id', $this->paymentsMethodsArray)
            ->whereRaw('id <> idowner')
            ->orderBy('name', 'asc')->get();

                
        $this->credentials = CredentialsCompany::where('company_id', $id)->first();
        $path = ImagesPathEnum::PATH_COMPANY . trim($companyEdit->contract_id) . '/' . $companyEdit->id . '/';

        // $this->contratos = Contract::where('id', auth()->user()->contract_id)
        //     ->orderBy('numbercontract', 'asc')->get();

        $this->contratos = Contract::where('contracts.id', '<>', 1)
            ->orderBy('numbercontract', 'asc')->get();
        // dd($perEdit,$this->type_user);
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contratos' => $this->contratos,
            'usersadmon' => $this->adtiendas,
            'personas' => $this->personas,
            'itemstypesede' => $this->itemstypesede,
            'numcias' => $this->numcias,
            'catalogs' => $this->catalogs,
            'sellers' => $this->sellers,
            'perEdit' => $perEdit,
            'companyEdit' => $companyEdit,
            'path' => !empty($companyEdit->logo) ? $path : ImagesPathEnum::PATH_COMPANY,
            'image' => !empty($companyEdit->logo) ? $companyEdit->logo : 'comp000000.png',
            'itemstypepay' => $this->itemstypepay,
            'haveCredential' => $this->credentials,
            'deliveryLists' => $this->deliveryLists,
            'type_contrac' => $this->type_contrac,
            'type_user' => $this->type_user
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        $validator = Validator::make($request->all(), []);

        $validator->after(function ($validator) use ($request)  {

            if ($request->get('admonid') != "" ) { 
                //comercio con tendero uncico
                if ($request->get('tiposede') == TENDEROUNICO ) { 

                    $user = User::find($request->get('admonid'));
                    if (!$user->hasRole('adtendero')) {
                        $validator->errors()->add('adminid', 'El admonid no corresponde con el tipo de comercio');
                    }
                }
                //coemcio cobn vendedores
                if ($request->get('tiposede') == CONVENDEORES ) { 

                    $user = User::find($request->get('admonid'));
                    if (!$user->hasRole('adtienda')) {
                        $validator->errors()->add('adminid', 'El admonid no corresponde con el tipo de comercio');
                    }
                }

            }                
        });

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // dd("save ",$request->request, $request->companyId);

        try {
            // dd($request->companyId);
            $company = $request->companyId > 0
                ? Company::find($request->companyId)
                : new Company();

            $idSeparator = $request->payments != null
                ? implode('|', $request->payments)
                : '';

            $schedule = array($request->opening_time, $request->closing_time);
            $schedule = implode('|', $schedule);

            $company->contract_id = $request->contrato;
            $company->person_id = $request->persona;
            $company->name = $request->storename;
            $company->slogan = $request->slogan;
            $company->logo = $request->image;
            $company->typecompany_id = $request->tiposede;
            $company->idowner = $request->idowner;
            $company->startdate = $request->startdate;
            $company->enddate = $request->enddate;
            $company->catalog_id = $request->catalog == 'true' ? null : $request->catalog;
            $company->admon_id = $request->admonid;
            $company->status = empty($request->status) ? 1 : $request->status; 
            $company->paymentsmethods = $idSeparator;
            $company->schedule = $schedule;
            $company->inventory_control = empty($request->inventory_control) ? 0 : $request->inventory_control;
            $company->deliverytype = $request->delivery_service ? $request->deliverytype_id : null ;
            $company->save();

            if (!empty($request->payments))
                if (in_array('107', $request->payments)) (new CredentialsCompanyController())->save(
                    $request->contrato,
                    $company->id,
                    $request->storeId
                );

            /**
             * $existscompany = Company::find($request->companyId);
             *
             * if(!empty($existscompany)){
             * $company->save();
             * }
             * else{
             * $company->save();
             * $products = CatalogProducts::where('catalog_id', $company->catalog_id)->get();
             *
             * for($i=0; $i<count($products); $i++){
             * $invetory_id = Inventory::where('product_id', $products[$i]->id)->value('id');
             * $inventory = Inventory::find($invetory_id);
             * if(!empty($inventory)){
             * $inventory->company_id = $company->id
             * $inventory->update();
             * }
             * }
             * }
             **/

            //subida imagen
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $image_path = 'comp' . str_pad($company->id, 6, "0", STR_PAD_LEFT) . '.png';

                if (file_exists(public_path() . ImagesPathEnum::PATH_COMPANY . trim($company->contract_id) . '/' . $company->id . '/' . $image_path)) {
                    unlink(public_path() . ImagesPathEnum::PATH_COMPANY . trim($company->contract_id) . '/' . $company->id . '/' . $image_path);
                }
                $image->move(public_path() . ImagesPathEnum::PATH_COMPANY . trim($company->contract_id) . '/' . $company->id . '/', $image_path);
                $imagen_nueva = $image_path;
                $company->logo = $imagen_nueva;
            }
            $company->save();

            try {
                ContractsPersons::where('type_user', '=', 'comp')
                    ->where('person_id', '=', $request->persona)
                    ->delete();

                $piboteContra_persons = new ContractsPersons();
                $piboteContra_persons->contract_id = $company->contract_id;
                $piboteContra_persons->person_id = $request->persona;
                $piboteContra_persons->type_user = 'comp';
                $piboteContra_persons->save();

                if ($group === 'newstore') {
                    return true;
                }
            } catch (\Exception $th) {
                //throw $th
                return back()->with('errors', array(__("Company can't be saved. Please review data and try again later")));
            }

            if ($request->companyId > 0) {
                CompaniesUsers::where('company_id', '=', $request->companyId)->delete();
            }
            if ($request->sellers) {
                foreach ($request->sellers as $cajero) {
                    $ciauser = new CompaniesUsers();
                    $ciauser->company_id = $company->id;
                    $ciauser->user_id = $cajero;
                    $ciauser->save();
                }
            }
        } catch (\Exception $e) {
            // dd($e);
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
        try {
            Company::where('id', '=', $id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }
}
