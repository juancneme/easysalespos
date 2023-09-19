<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \App\Http\Controllers\Security\EncdecController;
use Validator;
use Carbon\Carbon;
use \DB;

use App\Enums\StatusEnum;
use App\Enums\TransactionsStatusEnum;
use App\Enums\DeliveryStatusEnum;

use App\Models\Management\Catalog;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;
use \App\Models\Management\CatalogProducts;
use \App\Models\Management\Address;
use \App\Models\Management\Combination;
use \App\Models\Management\Client;
use \App\Models\Management\Contact;
use \App\Models\Management\Contract;
use \App\Models\Management\Courier;
use \App\Models\Management\CredentialsServices;
use \App\Models\Management\Deliveries;
use \App\Models\Management\PaidProviders;
use \App\Models\Management\Lists;
use \App\Models\Management\Transactions;
use \App\Models\Management\TransactionsDetails;
use \App\Models\Management\TransactionsPaymentmethods;
use \App\Models\Management\ShiftManagements;
use \App\Models\Management\BalanceAccounts;
use \App\Models\Management\Company;
use \App\Models\Management\User;
use \App\Models\Management\Category;
use \App\Models\Management\CompaniesUsers;
use \App\Models\Management\Person;

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

const rutaimagenprod = "/support/pictures/products/";
const rutaimagencat  = "/support/pictures/categories/";
const PATH_DEFAULT_IMAGE = '/support/pictures/config/';
const ENDPOINT_RECEIVE = "http://easysalespos.co /rpc?rpc_task=rbpdv_ws1_m4&consecutive=";

const TIPOS_PAGOS = 91;
const TIPOS_TURNOS = 11;

const MULTIMARCA = 110;

const EFECTIVO = 92;
const EFECTIVO_ENTREGA = 147;
const MERCADO_PAGO = 108;
const CONTRAENTREGA = 106;
const CREDITO_LOCAL = 194;

const IN_PROCESS = 116;
const APROVED = 117;
const TIPOS_DOCUMENTOS = 4;
const PERIODOS_PAGP_SIS = 200;

const SHIFT_OPEN = 14;
const SHIFT_CLOSE = 15;
const SHIFT_BLOCK = 12;

const TIPOS_UBICACIONES = 22;
const DELIVERY_SERVICE = 124;
const MENSAJEROS_COMERCIO = 125;
const MENSAJEROS_URBANOS = 126;

const ENLISTMENT = 131;
const IN_TRANSIT = 134;
const RECEIVED = 135;

const TYPE_EMAIL = 37;
const FISICO = 145;
const VIRTUAL = 146;
const MUNICIPIOS = 21;
const PENDIENTE = 164;
const COMBINATION = 176;
const PROMOTION = 177;
const PRODUCT = 178;
const CODVENTA = 61;
const CAT_MASTER = 103;

class PdviController extends Controller
{
    public $itemstypepay = '';
    public $categories = '';
    public $asigcatalog = '';
    public $companies = '';
    public $company = '';
    public $escajero = false;
    public $esVendedorBack = false;
    public $indice_mp = 0;
    public $fechaPDF = null;

    public function __construct()
    {
        $this->middleware('auth');

        //Proceso para MDI INICIO
        $pos = strpos(url()->current(), 'storeonline');
        if ($pos) {
            $parametros = Input::get("par");
            if (empty($parametros)) {
                exit;
            }

            $encdec = new \App\Http\Controllers\Security\EncdecController();
            $parametros = $encdec->encrypt_decrypt('decrypt', $parametros);

            $parms = explode("|", $parametros);
            $this->IDcontract = $parms[0];
            $this->esvirtual = $parms[1] == 'v' ? true : false;

            $logcon = new \App\Http\Controllers\Auth\LoginController();
            $this->image_login = $logcon->getLoginImage($parms[0], $parms[1]);

            $this->user = User::find(100103); //Select para obtener este usuario

            //Temporal se debe evaluar cual es el usuario que debe ejecutar esta funcion
            $email = "erojas@m.com";
            $password = "987654321Gc$1";

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
            }

            $this->middleware('auth');
            $this->indice_mp = 2;
        } else {
            $this->IDcontract = auth()->user()->contract_id;
            $this->esvirtual = false;
            $this->image_login = '';
            $this->user = auth()->user();
            $this->escajero =  auth()->user()->hasRole('cajero') ? true : false;
            $this->indice_mp = 0;
        }
        //Proceso para MDI FIN
        // dd(auth()->user(), $this->IDcontract, $this->esvirtual, auth()->user()->email, auth()->user()->password);

        //QR INFO
        $this->preference = 1;
        $iqr = rand(1, 999);
        $encdec = new EncdecController;
        $this->idCrypt = $encdec->encrypt_decrypt('encrypt', $iqr);
        $this->infoQrCode = $this->QrCodeBank($iqr);

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        $this->cajero = buscar_cajero($this->user, $this->user->contract_id, $this->company->id);
        $this->shift = buscar_turno($this->cajero);

        $this->salesOnHold = 0;

        if (auth()->user() !== null && $this->shift != null) {

            //verificar codigo de cliente con ventas en espera.
            if (auth()->guard('client')->user()) {
                $this->salesOnHold =  Transactions::whereIn('typeoperation_id', [CODVENTA])
                    ->whereIn('shiftmanagement_id', [$this->shift->id])
                    ->orderBy('id', 'desc')
                    ->with('Contrato', 'Comercio', 'Catalogo', 'Cliente', 'User')
                    ->where('transactions.user_id', auth()->user()->id)
                    ->where('saletype_id', 146)
                    ->where('status', TransactionsStatusEnum::ON_HOLD)
                    ->get();
            } else {
                $this->salesOnHold =  Transactions::whereIn('typeoperation_id', [CODVENTA])
                    ->whereIn('shiftmanagement_id', [$this->shift->id])
                    ->orderBy('id', 'desc')
                    ->with('Contrato', 'Comercio', 'Catalogo', 'Cliente', 'User')
                    ->where('transactions.user_id', auth()->user()->id)
                    ->where('saletype_id', 145)
                    ->get();
            }
        }

        $this->itemstypedocumentSis = Lists::whereIn('code', ['CC', 'CE'])
            ->where('idowner', TIPOS_DOCUMENTOS)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        $this->itemstypedocument = Lists::where('idowner', TIPOS_DOCUMENTOS)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        //validacion de Existencia de catalogo, cajero y turno abierto ...
        $this->itemslocations = Lists::where('idowner', TIPOS_UBICACIONES)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        //new for peridos pay
        $this->periodtypeitemsSis = Lists::where('idowner', PERIODOS_PAGP_SIS)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();
        //fin new

        if ($this->escajero) {
            $this->esVendedorBack = find_parameter($this->user->contract_id, $this->company->id, 'VendedorBackOffice', $this->user->id);
        } else {
            if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {
                $this->escajero = true;
            }
        }

        //DATOS DE IMPRESORA ANEXO A LA COMPANY
        $imp = CompaniesUsers::select('companies_users.printer')
                ->where('companies_users.user_id', auth()->user()->id)
                ->value('printer');
        $this->company->impresora = $imp;
        
        $this->contract = Contract::where('contracts.id', auth()->user()->contract_id)
            ->with('Persona')
            ->get()->first();

        $this->resDian = search_counter_control (61, auth()->user()->contract_id, $this->company->id);

        $this->accounts = BalanceAccounts::select('balance_value')
            ->where('user_id', $this->user->id)
            ->get()
            ->first();

        $this->userid = User::select('users.id', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
            ->join('persons', 'persons.id', 'users.person_id')
            ->where('users.id', $this->user->id)
            ->get()
            ->first();

        $this->itemstypeshift = Lists::where('idowner', TIPOS_TURNOS)
            ->whereRaw('id <> idowner')
            ->orderBy('name', 'asc')
            ->get();

        //MEDIOS DE PAGO DEL CONTRATO
        $this->itemstypepayCompany = Company::where('companies.id', $this->company->id)
            ->join('lists', 'lists.id', 'companies.paymentsmethods')
            ->value('paymentsmethods');

        $this->paymentsCompany = explode("|", $this->itemstypepayCompany);

        array_push($this->paymentsCompany,EFECTIVO);
        array_push($this->paymentsCompany,EFECTIVO_ENTREGA);

        $this->itemstypepay = Lists::where('idowner', TIPOS_PAGOS)
            ->whereIn('id', $this->paymentsCompany)
            ->orderBy('name', 'asc')->get();

        $md1 = [];
        $md2 = [];
        $md3 = [];
        foreach($this->itemstypepay as $itemP) {
            $code = explode("|", $itemP->code);
            if (in_array(1, $code)) array_push($md1,$itemP);
            if (in_array(2, $code)) array_push($md2,$itemP);
            if (in_array(3, $code)) array_push($md3,$itemP);
        }
        $md = [];
        array_push($md,$md1);
        array_push($md,$md2);
        array_push($md,$md3);

        $this->itemstypepay = $md;

        $this->asigcatalog = CompaniesUsers::select('companies.catalog_id', 'companies_users.company_id')
            ->join('companies', 'companies.id', 'companies_users.company_id')
            ->where('companies_users.user_id', $this->user->id)
            ->get()
            ->first();

        if (!isset($this->asigcatalog)) {
            $this->asigcatalog = Company::where('admon_id', $this->user->id)
                ->first();
        }

        //Se traen las credenciales dependiendo del comercio
        $this->credentialsMultimark = CredentialsServices::where('provider', MULTIMARCA)
            ->where('type_url', 'PRD')
            ->where('contract_id', $this->IDcontract)
            ->first();

        $this->subcategories = Category::select('*')->whereRaw('id <> idowner')
            ->where('categories.contract_id', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $this->clients = Person::select('clients.id as id', 'firstname', 'othernames', 'lastname', 'otherlastname', 'numberdocument')
            ->join('clients', 'persons.id', 'clients.person_id')
            ->get();

        $this->person = User::where('id', $this->user->id)
            ->value('person_id');

        $this->defaultclient = Client::where('person_id', $this->person)
            ->get();

        $this->combos = Combination::select(
                'combination.*',
                'combination.id as id',
                'combination.name as cname',
                'companies.name as coname',
                'combination.status as status',
                'combination.saleprice as sale')
            ->selectRaw('0 as purchaseprice')
            ->selectRaw(COMBINATION . ' as typeproduct')
            ->join('companies', 'combination.company_id', 'companies.id')
            ->where('companies.id', $this->asigcatalog->id)
            ->where('combination.status', 1)
            ->orderBy('id', 'asc')->get();

        $this->promotions = CatalogProducts::join('special_prices', 'catalog_products.id', 'special_prices.product_id')
            ->with('UnidadVenta', 'Categoria', 'ValorImpuesto')
            ->where('company_id', $this->company->id)
            ->where('special_prices.status', 1)
            ->where('catalog_products.status', 1)
            ->select('special_prices.*', 'catalog_products.*', 'special_prices.saleprice as specialprice')
            ->selectRaw(PROMOTION . ' as typeproduct')
            ->get();
        // dd($this->promotions[0]);
        $this->idMaster = Catalog::select('catalogs.*')
            ->join('contracts as contrato', 'contrato.id', 'catalogs.contract_id')
            ->where('catalogs.typecatalog_id', CAT_MASTER)
            ->where('contract_id', $this->IDcontract)
            ->where('catalogs.status', 1)
            ->with('Contrato')
            ->value('id');

        $categories_catalogs = Catalogproducts::select('catalog_products.category_id')
            ->whereIn('catalog_products.catalog_id', [$this->asigcatalog->catalog_id, $this->idMaster])
            ->orderBY('catalog_products.category_id')
            ->distinct('catalog_products.category_id')
            ->get();

        $this->categories = Category::select('categories.*')
            ->whereIn('categories.id', $categories_catalogs)
            ->where('status', 1)
            ->orderBy('categories.order', 'asc');

        if (empty($this->shift) || $this->shift->typeshift_id != 14) {$this->categories = [];}
        // $this->sellers = User::sellers(auth()->user()->contract_id)->get();
        $this->sellers = User::sellers($this->company->id)
            ->get();

        $this->countProducts = null;
        $this->countMasterProducts = null;

        //Contar Productos
        if (!is_null($this->asigcatalog->catalog_id)) {
            $this->countProducts = CatalogProducts::where('catalog_id', $this->asigcatalog->catalog_id)->count();
            $this->countProducts = $this->asigcatalog->catalog_id . ' ' . $this->countProducts;
        }

        if (!is_null($this->idMaster)) {
            $this->countMasterProducts = CatalogProducts::where('catalog_id', $this->idMaster)->count();
            $this->countMasterProducts = $this->idMaster . ' ' . $this->countMasterProducts;
        }

        $this->deliveryOptions = Lists::where('idowner', DELIVERY_SERVICE)
            ->where('id', '!=', DELIVERY_SERVICE)->get();

        $this->itemscities = Lists::where('idowner', MUNICIPIOS)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        $this->path  = '/support/pictures/productscatalogs/';

        if (!empty($this->categories)) {
            foreach ($this->categories as $sub) {
                $sub['eshijo'] = $sub->id != $sub->idowner ? true : null;
                foreach ($this->subcategories as $kindex => $value) {
                    $sub['tienehijos'] =  $value->idowner == $sub->id && count($value->ProductsCatalog) > 0 ?  true : null;
                }
            }
        }

        if ($this->esVendedorBack) $this->indice_mp = 1;

        // dd("fanalizo constructor");
    }

    public function index($group, $page, $order = "", $dir = "", $iqr = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        $group = 'management';
        $page = 'pdvi';

        if (auth()->guard('client')->user() != null) {
            $client_id = Client::where('id', auth()->guard('client')->user()->client_id)
                ->value('id');

            $person_id = Person::join('clients', 'persons.id', 'clients.person_id')
                ->where('clients.id', $client_id)
                ->value('person_id');

            $client = Person::where('id', $person_id)
                ->get();

            $addresses = Address::with('type')
                ->where('person_id', $person_id)
                ->get();
        } else {
            $client = false;
            $addresses = false;
        }

        //         $esCajeroBack = find_parameter(auth()->user()->contract_id, $this->company->id, 'VendedorBackOffice', auth()->user()->id);
        // // dd(auth()->user()->contract_id, $this->company->id, 'VendedorBackOffice', auth()->user()->id);
        //         if ($esCajeroBack) {
        //             $this->escajero = false;
        //         }
        // // dd(auth()->user()->id,$esCajeroBack,$this->escajero);
        // dd($this->shift);

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,

            'categories' => !empty($this->categories) ? $this->categories->get() : null,
            'itemstypeshift' => $this->itemstypeshift,
            'itemstypepay' => $this->itemstypepay, 
            'indice_mp' => $this->indice_mp,
            'shiftid' => $this->shift,
            'accounts' => $this->accounts,
            'userid' => $this->userid,
            'subcategories' => $this->subcategories,
            'infoQrCode' => $this->infoQrCode,
            'idqr' => $this->idCrypt,
            'preference' => $this->preference,
            'itemstypedocument' => $this->itemstypedocument,
            'clients' => $this->clients,
            'defaultclient' => $this->defaultclient,
            // 'shift' => $this->shift,
            // 'lastshift' => $this->lastshift,
            'combos' => $this->combos,
            'client' => $client,
            'addresses' => $addresses,
            'itemslocations' => $this->itemslocations,
            'deliveryOptions' => $this->deliveryOptions,
            'promotions' => $this->promotions,
            'cities' => $this->itemscities,
            'catalog' => $this->asigcatalog->catalog_id,
            // 'shiftOpen' => $this->shiftOpen,
            'company' => $this->company,
            'payments_id' => $this->paymentsCompany,
            'salesOnHold' => $this->salesOnHold,
            'countProducts' => $this->countProducts,
            'countMasterProducts' => $this->countMasterProducts,
            'masterCatalog' => $this->idMaster,
            'itemstypedocumentSis'=> $this->itemstypedocumentSis,
            'periodtypeitemsSis' => $this->periodtypeitemsSis,


            'typetransaction' => 'sales',
            'escajero' => $this->escajero,
            'esvendedorback' => $this->esVendedorBack,
            'resDian' => $this->resDian,
            'contract' => $this->contract,

            'esvirtual' => $this->esvirtual,
            'IDcontract' => $this->IDcontract,
            'image_login' => $this->image_login,
            'sellers' => $this->sellers,
            'datecl' => Carbon::now()->format('Y-m-d')

        ]);
    }

    public function edit($group, $page, $id, $type = null)
    {
        $id = !is_null($type) ? Deliveries::where('id', $id)->value('transaction_id') : $id;

        $this->oldsale = Transactions::where('id', $id)->with('Cliente')->first();

        $items_sale = TransactionsDetails::select('transactions_details.catalog_product_id', 'transactions_details.quantity', 'transactions_details.unit_price', 'transactions_details.id')
            ->where('transactions_details.transaction_id', $id)
            ->get();

        $itemsA = CatalogProducts::select('catalog_products.*', 'special_prices.saleprice as specialprice', DB::raw("'00' as field"))
            ->selectRaw(PRODUCT . ' as typeproduct')
            ->selectRaw($items_sale[0]->unit_price . ' as saleprice' )
            ->where('catalog_products.id', $items_sale[0]->catalog_product_id)
            ->with('Categoria')
            ->with('ValorImpuesto')
            ->with('UnidadVenta')
            ->leftJoin('special_prices', function ($join) {
                $join->on('special_prices.product_id', 'catalog_products.id')
                    ->where('special_prices.status', 3);
            });
        for ($i = 1; $i < count($items_sale); $i++) {
            $itemB = CatalogProducts::select('catalog_products.*', 'special_prices.saleprice as specialprice', DB::raw("'+$i+' as field"))
                ->selectRaw(PRODUCT . ' as typeproduct')
                ->selectRaw($items_sale[$i]->unit_price . ' as saleprice' )
                ->where('catalog_products.id', $items_sale[$i]->catalog_product_id)
                ->with('Categoria')
                ->with('ValorImpuesto')
                ->with('UnidadVenta')
                ->leftJoin('special_prices', function ($join) {
                    $join->on('special_prices.product_id', 'catalog_products.id')
                        ->where('special_prices.status', 3);
                });
            $itemsA->union($itemB);
        }

        $this->oldsale->items_products = $itemsA->get();
        for ($i = 0; $i < count($items_sale); $i++) {
            $this->oldsale->items_products[$i]->saleprice      = $items_sale[$i]->unit_price;
            $this->oldsale->items_products[$i]->sales_quantity = $items_sale[$i]->quantity;
        }

        $payments = TransactionsPaymentmethods::select(
                'transactions_paymentmethods.amount',
                'transactions_paymentmethods.paymentmethods_id',
                'transactions_paymentmethods.authorization_code',
                'transactions_paymentmethods.receipt_number',
                'transactions_paymentmethods.id')
            ->where('transactions_paymentmethods.transaction_id', $id)
            ->get();
        $this->oldsale->items_payments = $payments;

        if (auth()->guard('client')->user() != null) {
            $client_id = Client::where('id', auth()->guard('client')->user()->client_id)->value('id');

            $person_id = Person::join('clients', 'persons.id', 'clients.person_id')
                ->where('clients.id', $client_id)->value('person_id');

            $client = Person::where('id', $person_id)->get();

            $addresses = Address::with('type')
                ->where('person_id', $person_id)
                ->get();
        } else {
            $client = false;
            $addresses = false;
        }
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            // 'errors' => $errors,
            // 'success' => $success,
            // 'infos' => $infos,

            'categories' => $this->categories->get(),
            'itemstypeshift' => $this->itemstypeshift,
            'itemstypepay' => $this->itemstypepay,
            'indice_mp' => $this->indice_mp,
            'shiftid' => $this->shift,
            'accounts' => $this->accounts,
            'userid' => $this->userid,
            'subcategories' => $this->subcategories,
            'infoQrCode' => $this->infoQrCode,
            'idqr' => $this->idCrypt,
            'preference' => $this->preference,
            'itemstypedocument' => $this->itemstypedocument,
            'clients' => $this->clients,
            'defaultclient' => $this->defaultclient,
            // 'shift' => $this->shift,
            // 'lastshift' => $this->lastshift,
            'combos' => $this->combos,
            'client' => $client,
            'addresses' => $addresses,
            'itemslocations' => $this->itemslocations,
            'deliveryOptions' => $this->deliveryOptions,
            'promotions' => $this->promotions,
            'cities' => $this->itemscities,
            'catalog' => $this->asigcatalog->catalog_id,
            // 'shiftOpen' => $this->shiftOpen,
            'company' => $this->company,
            'payments_id' => $this->paymentsCompany,
            'salesOnHold' => $this->salesOnHold,
            'countProducts' => $this->countProducts,
            'countMasterProducts' => $this->countMasterProducts,
            'masterCatalog' => $this->idMaster,
            'itemstypedocumentSis' => $this->itemstypedocumentSis,
            'periodtypeitemsSis' => $this->periodtypeitemsSis,

            'typetransaction' => 'sales',
            'escajero' => $this->escajero,
            'esvendedorback' => $this->esVendedorBack,
            'resDian' => $this->resDian,
            'contract' => $this->contract,

            'esvirtual' => $this->esvirtual,
            'IDcontract' => $this->IDcontract,
            'image_login' => $this->image_login,
            'sellers' => $this->sellers,

            'type' => $type,
            'oldsale' => $this->oldsale,
            'datecl' => Carbon::now()->format('Y-m-d')

        ]);
    }

    public function selectCategory($idCategory)
    {
        $this->category = Category::select('categories.*')
            ->where('categories.id', $idCategory)
            ->with(array('ProductsCatalog' => function ($query) {
                $query
                    ->select('catalog_products.*', 'special_prices.saleprice as specialprice', 'inventory.status as inventory_control')
                    ->selectRaw('(CASE WHEN inventory.purchaseprice >= 0 THEN inventory.purchaseprice ELSE catalog_products.purchaseprice END) AS purchaseprice')
                    ->selectRaw('(CASE WHEN inventory.saleprice >= 0 THEN inventory.saleprice ELSE catalog_products.saleprice END) AS saleprice')
                    ->leftJoin('special_prices', function ($join) {
                        $join->on('special_prices.product_id', 'catalog_products.id')
                            // ->where('special_prices.company_id', $this->asigcatalog->company_id)
                            ->where('special_prices.status', 1);
                            // ->orderBy('specialprice', 'desc');
                        })

                    ->leftJoin('inventory', function ($join) {
                        $join->on('inventory.product_id', 'catalog_products.id')
                            // ->where('inventory.company_id', $this->asigcatalog->company_id)
                            ->where('inventory.status', 1);
                            // ->orderBy('specialprice', 'desc');
                        })

                    ->selectRaw(PRODUCT . ' as typeproduct')
                    ->whereIn('catalog_products.catalog_id', [$this->asigcatalog->catalog_id, $this->idMaster])
                    ->with('ValorImpuesto')
                    ->with('UnidadVenta');

            }))
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        // dd($this->category[0]->ProductsCatalog[4]);
         
        // return $this->categories->where('id',$idCategory)->get();
        return $this->category;
    }

    public function ajax(Request $request, $page, $group)
    {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;


        switch ($type) {

            
            case 'leer_info_ticket':
                $result->success = false;
                $result->data = $this->leer_info_ticket(Input::all());
                if ($result->data != null)
                    $result->success = true;
                return json_encode($result);
                break;

            case 'imprimir_tirilla':
                $result->data = $this->imprimir_tirilla(Input::all());
                $result->success = true;
                return json_encode($result);
                break;

            case 'generar_txt':
                $result->data = $this->generar_txt(Input::all());
                $result->success = true;
                return json_encode($result);
                break;

            case 'guardarfactura':
                $result->data = $this->guardarfactura(Input::all());
                $result->success = true;
                return json_encode($result);
                break;
            case 'abrirturno':
                $result->data = $this->abrirturno(Input::get("idusuario"), Input::get("estado"), Input::get("initialbalance"));
                if ($result->data) $result->success = true;
                else $result->success = false;
                return json_encode($result);
                break;

            case 'sellProducts':
                $result->data = $this->sellProducts($request, $group, $page);
                if ($result->data['status']) {
                    $result->success = true;
                } else {
                    $result->success = false;
                }
                return json_encode($result);
                break;

            case 'getStanbyProducts':
                $result->data = $this->getStanbyProducts($group, $page, Input::all());
                $result->success = true;
                return json_encode($result);
                break;

            case 'loginclient':
                $result->data = $this->getStanbyProducts($group, $page, Input::all());
                $result->success = true;
                $id = Input::get('usuario');
                $id = Input::get('clave');

                return json_encode($result);
                break;

            case 'searchclient':

                if (Input::get('default')) {
                    $id = Input::get('id');

                    $person = Client::where('id', $id)->value('person_id');

                    $clientemail = Contact::where('person_id', $person)
                        ->where('type_id', TYPE_EMAIL)->value('textcontact');

                    $addresses = Address::select('address.id', 'address', 'typeaddress_id', 'city_id', 'l.name as city', 'l1.name as type')
                        ->where('person_id', $person)
                        ->join('lists as l', 'address.deparment_id', '=', 'l.id')
                        ->join('lists as l1', 'address.typeaddress_id', '=', 'l1.id')
                        ->get();

                    $city_name = Lists::join('address', 'address.typeaddress_id', 'lists.id')
                        ->where('person_id', $person)
                        ->value('name');

                    $typeaddress_name = Lists::join('address', 'address.city_id', 'lists.id')
                        ->where('person_id', $person)
                        ->value('name');

                    $r = [
                        "status" => true,
                        "message" => "Cliente",
                        "clientid" => $id,
                        "person" => $person,
                        "clientemail" => $clientemail,
                        "clientaddresses" => $addresses,
                    ];

                    return json_encode($r);
                }

                if (Input::get("numberdocument")) {
                    $number = Input::get("numberdocument");
                    $typedocument = Input::get("typedoc");
                    // $digitcheck = Input::get("digitcheck");

                    $clients = Person::select(
                        'clients.id as id',
                        'socialreason',
                        'firstname',
                        'othernames',
                        'lastname',
                        'otherlastname',
                        'numberdocument',
                        'persons.id as pid'
                    )
                        ->join('clients', 'persons.id', 'clients.person_id')
                        ->where('numberdocument', $number)
                        ->where('typedocument_id', $typedocument)
                        ->where('contract_id', auth()->user()->contract_id)
                        ->get();

                    if ($typedocument == 6) {
                        $clients = Person::select(
                            'clients.id as id',
                            'socialreason',
                            'firstname',
                            'othernames',
                            'lastname',
                            'otherlastname',
                            'numberdocument',
                            'persons.id as pid'
                        )
                            ->join('clients', 'persons.id', 'clients.person_id')
                            ->where('numberdocument', $number)
                            // ->where('digitcheck', $digitcheck)
                            ->where('typedocument_id', $typedocument)
                            ->where('contract_id', auth()->user()->contract_id)
                            ->get();
                    }

                    foreach ($clients as $client) {
                        $clientid = $client->id;
                        $clientname = $client->firstname;
                        $clientothernames = $client->othernames;
                        $clientlastname = $client->lastname;
                        $clientotherlastname = $client->otherlastname;
                        $clientsocialreason = $client->socialreason;
                        $person_id = $client->pid;
                    }

                    if (count($clients) > 0) {

                        $clientemail = Contact::where('person_id', $person_id)
                            ->where('type_id', TYPE_EMAIL)->value('textcontact');

                        $addresses = Address::select(
                            'address.id',
                            'address',
                            'typeaddress_id',
                            'city_id',
                            'typelist.name as typeaddress',
                            'citylist.name as city'
                        )
                            ->join('lists as typelist', 'typelist.id', 'address.typeaddress_id')
                            ->join('lists as citylist', 'citylist.id', 'address.city_id')
                            ->where('person_id', $person_id)
                            ->get();

                        $r = [
                            "status" => true,
                            "message" => "Cliente",
                            "clientid" => $clientid,
                            "clientname" => $clientname,
                            "clientothernames" => $clientothernames,
                            "clientlastname" => $clientlastname,
                            "clientotherlastname" => $clientotherlastname,
                            "clientemail" => $clientemail,
                            "clientaddresses" => $addresses,
                            "person" => $person_id,
                            "socialreason" => $clientsocialreason,
                        ];
                    } else {
                        $r = [
                            "status" => false,
                            "message" => "Cliente No Encontrado"
                        ];
                    }
                }

                return json_encode($r);
                break;

            case 'filterProducts':
                if (Input::get("filter")) {

                    $idCategory = Input::get("filter");
                    $typetransaction = Input::get("typetransaction");
                    $category = $this->selectCategory($idCategory);
                    $inventory_control = $this->company->inventory_control;

                    //Validar cantidad de productos
                    $tot = 0;
                    foreach ($category as $cate) {
                        foreach($cate->ProductsCatalog as $prod) {
                            $tot += 1;
                            $codprod = $prod->id;
                        }
                    }

                    $result = view('management/pdviproducts', [
                        'typetransaction' => $typetransaction,
                        'categories' => $category,
                        'path' => $this->path,
                        'catalog' => $this->asigcatalog->catalog_id,
                        'inventory_control' => $inventory_control,
                        'tot' => $tot,
                        'codprod' => $codprod
                    ])->render();
                }

                return json_encode($result);
                break;

            case 'search':
                $this->filter = Input::get("filter");
                $this->type = Input::get("search_type");
                $this->typetransaction = Input::get("typetransaction");
                // $this->column = $this->type == 1 ? 'name' : 'barcode';
                // dd($this->asigcatalog->catalog_id, $this->idMaster);
                // dd($this->filter, $this->type, $this->typetransaction);
                $products = Category::select('categories.*')
                    ->with(array('ProductsCatalog' => function ($query) {
                       $query
                // $products = Catalogproducts::select('catalog_products.*', 'special_prices.saleprice as specialprice')
                        ->select('catalog_products.*', 'special_prices.saleprice as specialprice')
                        ->selectRaw('(CASE WHEN inventory.purchaseprice >= 0 THEN inventory.purchaseprice ELSE catalog_products.purchaseprice END) AS purchaseprice')
                        ->selectRaw('(CASE WHEN inventory.saleprice >= 0 THEN inventory.saleprice ELSE catalog_products.saleprice END) AS saleprice')
                        ->whereIn('catalog_products.catalog_id', [$this->asigcatalog->catalog_id, $this->idMaster])
                        ->where('catalog_products.barcode', $this->filter)
                        ->where('catalog_products.status', 1)
                        ->with('Categoria','ValorImpuesto','UnidadVenta')
                        ->leftJoin('special_prices', function ($join) {
                            $join->on('special_prices.product_id', '=', 'catalog_products.id')
                                // ->where('special_prices.company_id', '=', $this->asigcatalog->company_id)
                                ->where('special_prices.status', '=', 1);
                                // ->orderBy('specialprice', 'desc');
                            })
                        ->leftJoin('inventory', function ($join) {
                            $join->on('inventory.product_id', 'catalog_products.id')
                                // ->where('inventory.company_id', $this->asigcatalog->company_id)
                                ->where('inventory.status', 1);
                                // ->orderBy('specialprice', 'desc');
                            })
                        ;

                    }))
                    ->where('categories.status', 1)
                    ->orderBy('order', 'asc')
                    ->get();

                $tot = 0;
                for ($i = 0; $i < count($products); $i++) {
                    $tot += count($products[$i]->ProductsCatalog);
                }
                // dd("med",$tot, count($products), $this->filter, $products[0]->ProductsCatalog);
                // dd($this->asigcatalog->catalog_id, $this->idMaster);
                if ($tot != 1) 
                $products = Category::select('categories.*')
                    ->with(array('ProductsCatalog' => function ($query) {
                        $query
                            ->select('catalog_products.*', 'special_prices.saleprice as specialprice')
                            ->selectRaw('(CASE WHEN inventory.purchaseprice >= 0 THEN inventory.purchaseprice ELSE catalog_products.purchaseprice END) AS purchaseprice')
                            ->selectRaw('(CASE WHEN inventory.saleprice >= 0 THEN inventory.saleprice ELSE catalog_products.saleprice END) AS saleprice')
                            ->whereIn('catalog_products.catalog_id', [$this->asigcatalog->catalog_id, $this->idMaster])
                            ->where('catalog_products.name', 'like', '%' . $this->filter . '%')
                            ->where('catalog_products.status', 1)
                            ->with('Categoria')
                            ->with('ValorImpuesto')
                            ->with('UnidadVenta')
                            ->leftJoin('special_prices', function ($join) {
                                $join->on('special_prices.product_id', '=', 'catalog_products.id')
                                    // ->where('special_prices.company_id', '=', $this->asigcatalog->company_id)
                                    ->where('special_prices.status', '=', 1);
                                    // ->orderBy('specialprice', 'desc');
                                })
                            ->leftJoin('inventory', function ($join) {
                                $join->on('inventory.product_id', 'catalog_products.id')
                                    // ->where('inventory.company_id', $this->asigcatalog->company_id)
                                    ->where('inventory.status', 1);
                                    // ->orderBy('specialprice', 'desc');
                                });

                    }))
                    ->where('categories.status', '=', 1)
                    ->orderBy('order', 'asc')
                    ->get();
                //Validar cantidad de productos
                $codprod = null;
                $tot = 0;
                foreach ($products as $cate) {
                    foreach($cate->ProductsCatalog as $prod) {
                        $tot += 1;
                        $codprod = $prod->id;
                    }
                }
                // dd("fin",$tot, count($products), $this->filter, $products[0]->ProductsCatalog);
                // dd($this->filter, $this->type, $this->typetransaction);
                if ($this->typetransaction == 'sales') {
                    if ($this->shift->typeshift_id != 14) $products = [];
                }
                $result = view('management/pdviproducts', [
                    'typetransaction' => $this->typetransaction,
                    'categories' => $products,
                    'path' => $this->path,
                    'catalog' => $this->asigcatalog->catalog_id,
                    'inventory_control' => $this->company->inventory_control,
                    'tot' => $tot,
                    'codprod' => $codprod
                ])->render();

                return json_encode($result);
                break;

            case 'combos':
                $result = view('management/pdvicombos', [
                    'combos' => $this->combos,
                ])->render();

                return json_encode($result);
                break;

            case 'newAddress':

                $neighborhood = Input::get("neighborhood");
                $address = Input::get("address");
                $person = Input::get("person_id");
                $default = Input::get("default");
                $type = Input::get("typeaddress");
                $indications = Input::get("indications");
                $person_id = Input::get('person');
                $city = Input::get('city');

                if (!empty(auth()->guard('client')->user())) {
                    $location = Address::where('person_id', $person)->first();
                } else {
                    $location = Address::where('person_id', $person_id)->first();
                }

                $newAddress = new Address();

                if (!empty(auth()->guard('client')->user())) {
                    $newAddress->person_id = $person;
                } else {
                    $newAddress->person_id = $person_id;
                }

                $newAddress->country_id = $location->country_id;
                $newAddress->deparment_id = $location->deparment_id;
                $newAddress->city_id = $city;
                $newAddress->neighborhood = $neighborhood;
                $newAddress->address = $address;
                $newAddress->typeaddress_id = $type;
                $newAddress->default = $default;
                $newAddress->location = $indications;
                $newAddress->status = 1;
                $newAddress->save();

                $typeaddress = Address::join('lists', 'lists.id', 'typeaddress_id')
                    ->where('address.id', $newAddress->id)->value('name');

                $cityname = Lists::where('id', $city)->value('name');

                $r = [
                    'id' => $newAddress->id,
                    'neighborhood' => $neighborhood,
                    'address' => $address,
                    'person' => $person,
                    'default' => $default,
                    'type' => $type,
                    'indications' => $indications,
                    'city' => $cityname,
                    'typeaddressname' => $typeaddress,
                    'status' => true
                ];

                return json_encode($r);
                break;

            case 'delivery':
                // $data = Input::all();
                // dd(auth()->guard('client')->user(), Input::get('clientid'), $data);
                // $condition = !empty(auth()->guard('client')->user())
                //     ? auth()->guard('client')->user()->client_id
                //     : Input::get('clientid');

                $venta = Input::get('transaction_id');
                // $venta = Transactions::orderBy('created_at', 'desc')
                //     ->where('client_id', $condition)->value('id');
                $address = Input::get('address');
                $deliveryCompany = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
                // $company = CompaniesUsers::where('user_id', auth()->user()->id)->value('company_id');
                // $deliveryCompany = Company::find($company);

                $delivery = new Deliveries();

                $delivery->contract_id = auth()->user()->contract_id;
                $delivery->company_id = $deliveryCompany->id; // $company;

                $delivery->transaction_id = $venta;

                if ($address != 0) {
                    $delivery->address_id = $address;
                    $delivery->companycourier_id = $deliveryCompany->deliverytype;
                } else {
                    $delivery->address_id = null;
                    $delivery->companycourier_id = null;
                    $delivery->status = ENLISTMENT;
                }

                $delivery->startdate = Carbon::now();
                $delivery->status = ENLISTMENT;
                $delivery->save();
                $company = $deliveryCompany->name; // Company::where('id', $company)->value('name');
                // dd($company, $delivery);
                $r = [
                    'sale' => $venta,
                    'status' => true,
                    "address" => $address,
                    "company" => $company
                ];
                return json_encode($r);
                break;

            case 'promotions':
                $result = view('management/pdvipromotions', [
                    'catalog' => $this->asigcatalog->catalog_id,
                    'path' => '/support/pictures/productscatalogs/',
                    'promotions' => $this->promotions,
                ])->render();

                return json_encode($result);
                break;

            case 'comboProducts':
                $idcombo = Input::get('idcombo');

                $products = CatalogProducts::join('combination_products', 'combination_products.product_id', 'catalog_products.id')
                    ->where('combination_id', $idcombo)->with('UnidadVenta')->get();

                $result = view('management/pdvicombosproducts', [
                    'products' => $products,
                ])->render();

                return json_encode($result);
                break;

            case 'updatePrice':
                try {
                    $result->data = $this->updatePrice(Input::get("id_articulo"), Input::get("new_price"));
                    $result->success = true;
                } catch (\Exception $e) {
                    $result->data = $e;
                    $result->success = false;
                }

                return json_encode($result);
                break;
                
        }
    }

    public function updatePrice($id_articulo, $new_price)
    {
        try {
            DB::beginTransaction();

            $product = CatalogProducts::find($id_articulo);
            $product->saleprice = $new_price;
            $product->update();

            $inventory = Inventory::where('product_id', $id_articulo)
                ->where('catalog_id', $product->catalog_id)->first();

            if (isset($inventory)) {
                $inventory->saleprice = $product->saleprice;
                $inventory->update();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }

        return $inventory;
    }
    /**
     * @param $request
     * @param $group
     * @param $page
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Selvice to sell a product
     */
    public function sellProducts($request, $group, $page) {
        $client = new Client();
        $response = (new ServiceController)->loginService();
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                try {
                    $login_response = $response->getBody()->getContents();
                    $val_json = json_decode($login_response);
                    $TOKEN = $val_json->user->token;
                    $TOKEN_TEST = 'JDJiJDEwJEFaZDZGV1JKcDhSVkZEUUhTQTdEeS5oS1o2TnhBYTB5Y0UxWGdCM0JyTWZIUW1pV1pGRjVt';
                    $url = $this->credentialsMultimark->url_service;
                    $url_test = $this->credentialsMultimark->url_test;

                    $headers = [
                        'Authorization' => 'Bearer ' . $TOKEN,
                        'Accept' => 'application/json',
                    ];

                    $body = [
                        "_channel" => "ws",
                        "productId" => $request->productId,
                        "_refId" => $request->_refId,
                        "amount" => $request->amount,
                        "data" => [
                            "cellphone" => $request->data['cellphone']
                        ]
                    ];


                    $responseMultimark = $client->request('POST', $url . '/products/sell', [
                        //                        'verify' => false, //solo en el de pruebas
                        'headers' => $headers,
                        'json' => $body,
                        'allow_redirects' => true,
                        'timeout' => 2000,
                        'http_errors' => true

                    ]);

                    if ($responseMultimark->getStatusCode() == 200) {
                        $success_res = json_decode($responseMultimark->getBody()->getContents());
                        return [
                            'status' => true,
                            'message' => ['recarga ' . $success_res->data->Product->name . ' fue exitosa']
                        ];
                    }
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    $res = json_decode($e->getResponse()->getBody()->getContents());

                    return [
                        'status' => true,
                        'message' => $res->message
                    ];
                }
            } else {
                return [
                    'status' => false,
                    'message' => 'Error en las credenciales, favor comuniquese con un administrador'
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'Error en las credenciales, favor comuniquese con un administrador'
            ];
        }
    }

    public function guardarfactura($data) {

        $escajero =  auth()->user()->hasRole('cajero') ? true : false;

        if ($escajero && !$this->esVendedorBack) {
            $mVendedor = $data['seller'];
        } else {
            $mVendedor = auth()->user()->id;
        }
        $mShiftid = buscar_turno($this->cajero);

        $nom = Person::select(DB::raw("concat(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
            ->join('users', 'users.person_id', 'persons.id')
            ->where('users.id', $mVendedor )
            ->first();

        if (!empty($nom->nombrecompleto))
            $data['nombrevendedor'] = trim(str_replace("  "," ",$nom->nombrecompleto));
        else
            $data['nombrevendedor'] = 'Vendedor Mostrador';

        if (!empty($mShiftid)) {
            $delivery_id = null;
            $transaction_id = null;
            if (str_contains($data['url'], "delivered")) {
                $delivery_id = $data['delivered'];
                $transaction_id = Deliveries::where('id', $delivery_id)->value('transaction_id');
            } elseif ($data['delivered'] != 0) {
                $transaction_id = $data['delivered'];
            }

            $empresa = User::select('companies_users.company_id', 'users.contract_id', 'companies.catalog_id')
                ->join('companies_users', 'companies_users.user_id', 'users.id')
                ->join('companies', 'companies.id', 'companies_users.company_id')
                ->where('users.id', auth()->user()->id)
                ->first();

            if (!isset($empresa)) {
                $empresa = Company::select('id as company_id', 'contract_id', 'catalog_id')
                    ->where('admon_id', auth()->user()->id)->first();
            }

            $numdocumento = Transactions::select('support_document')
                ->where('typeoperation_id', CODVENTA)
                ->where('contract_id', $empresa->contract_id)
                ->where('company_id', $empresa->company_id)
                ->orderBy('id', 'desc')->first();

            try {
                DB::beginTransaction();

                $catalog = is_null($empresa->catalog_id) ? $this->idMaster : $empresa->catalog_id;

                if ( str_contains($data['url'], "edit") ) {

                    $payments = TransactionsPaymentmethods::select(
                            'transactions_paymentmethods.amount',
                            'transactions_paymentmethods.paymentmethods_id',
                            'transactions_paymentmethods.authorization_code',
                            'transactions_paymentmethods.receipt_number',
                            'transactions_paymentmethods.id')
                        ->where('transactions_paymentmethods.transaction_id', $transaction_id)
                        ->get();
                    for ($i = 0; $i < count($payments); $i++) {
                        TransactionsPaymentmethods::where('id', $payments[$i]->id)->delete();
                    }

                    if ( !str_contains($data['url'], "delivered") ) {

                        $items_sale = TransactionsDetails::select(
                            'transactions_details.catalog_product_id',
                            'transactions_details.quantity',
                            'transactions_details.id')
                            ->where('transactions_details.transaction_id', '=', $transaction_id)
                            ->get();
                        //Efecto en el inventario ????????
                        for ($i = 0; $i < count($items_sale); $i++) {
                            TransactionsDetails::where('id', $items_sale[$i]->id)->delete();
                        }
                    }
                }

				if (isset($transaction_id)) {
					$venta = Transactions::find($transaction_id);
				} else {
					$venta = new Transactions();
					$venta->user_id = $this->cajero;
					$venta->seller_id = $mVendedor;
                    $venta->shiftmanagement_id = $mShiftid->id;
				}

				//Numero de la factura -- Se debe validar si es factura o tiquete.
				if ($data['status'] == 192) {
					$venta->support_document = !empty($numdocumento->support_document) ? $numdocumento->support_document + 1 : '1';
					$venta->invoice_number = search_transaction_number (CODVENTA, $empresa->contract_id, $empresa->company_id);
				}

                $venta->typeoperation_id = CODVENTA;
                $venta->saletype_id = !empty(auth()->guard('client')->user()) ? VIRTUAL : FISICO;
                $venta->contract_id = $empresa->contract_id;
                $venta->catalog_id = $catalog;
                $venta->company_id = $empresa->company_id;
                $venta->supplier_id = '1';
                if ($data['idcliente'] !== 'default') $venta->client_id = $data['idcliente'];
                //se debe revisar esta rutina
                $venta->info_client = $this->getInfolient($data);
                $mytime = Carbon::now('America/Bogota');
                $venta->operation_date = $mytime->toDateTimeString();
                $this->fechaPDF = $mytime->format('Ymd');
                $venta->total_value = $data['totalpago'];
                $venta->iva_value = $data['totaliva'];
                $venta->status = $data['status'];
                $venta->name = $data['name'];
                $venta->comments = $data['comments'];
                $venta->save();

                //PRODUCTOS DE LA VENTA
                if (!str_contains($data['url'], "delivered")) {
                    $Productos = json_decode($data['detalles']);
                    foreach ($Productos->datos as $value) {
                        $producto = CatalogProducts::find($value->idarticulo);

                        $detalle = new TransactionsDetails;
                        $detalle->transaction_id = $venta->id;
                        $detalle->catalog_product_id = $value->idarticulo;
                        $detalle->type_product_id = $value->typeproduct;
                        $detalle->quantity = $value->cantidad;
                        $detalle->unit_price = $value->precio_venta;
                        $detalle->iva_value = $value->valor_iva;
                        $detalle->total_value = $value->precio_total;
                        $detalle->lot_number = '0';
                        $mytime = Carbon::now('America/Bogota');
                        $detalle->expiration_date = $mytime->toDateTimeString();
                        $detalle->fabrication_date = $mytime->toDateTimeString();
                        $detalle->status = '1';
                        $detalle->customer_info = $data['dataClient'] == " " ? "NA" : 'celular' . '|' . $data['dataClient'];
                        $detalle->save();

                        $inventory = Inventory::where('product_id', $value->idarticulo)->where('catalog_id', $catalog)->first();
                        $inventory_details = new InventoryDetails();
                        $unit_value = explode('|', $producto->UnidadVenta->code)[3];

                        //dd($value->idarticulo, $this->company);
                        if ($data['status'] != 191) {

                            if (empty($inventory)) {
                                $inventory = new Inventory();
                                $inventory->contract_id = auth()->user()->contract_id;
                                $inventory->company_id = $this->company->id;
                                $inventory->catalog_id = is_null($this->asigcatalog->catalog_id) ? $catalog : $this->asigcatalog->catalog_id;
                                $inventory->product_id = $value->idarticulo;
                                $inventory->saleprice = $value->precio_venta;
                                $inventory->average_cost = $value->precio_venta;
                                $inventory->availablequantity = 0;
                                $inventory->status = 0;
                                $inventory->created_at = Carbon::now();
                                $inventory->updated_at = Carbon::now();
                                $inventory->save();
                            }

                            if ($producto->inventory_control == 0) {
                                $inventory_details->type_operation = 'COMPRA';
                                $inventory_details->inventory_id = $inventory->id;
                                $inventory_details->quantity = $value->cantidad;
                                $inventory_details->unit_value = $value->precio_venta;
                                $inventory_details->total_value = $value->precio_venta * ($value->cantidad / (int) $unit_value);
                                $inventory_details->businesskey = $venta->id;
                                $inventory_details->gross_margin = 0;
                                $inventory_details->save();

                                // $inventory = Inventory::where('product_id', $value->idarticulo)->where('catalog_id', $catalog)->first();
                                $inventory->availablequantity += $value->cantidad;
                                $inventory->save();
                            }

                            $gross_margin = $inventory->average_cost != 0
                                ? ($value->precio_venta * $value->cantidad) / ($inventory->average_cost * $value->cantidad)
                                : 0;

                            $inventory_details = new InventoryDetails();
                            $inventory_details->type_operation = 'VENTA';
                            $inventory_details->inventory_id = $inventory->id;
                            $inventory_details->quantity = $value->cantidad;
                            $inventory_details->unit_value = $value->precio_venta;
                            $inventory_details->total_value = $value->precio_venta * ($value->cantidad / (int) $unit_value);
                            $inventory_details->businesskey = $venta->id;
                            $inventory_details->gross_margin = $gross_margin;
                            $inventory_details->save();

                            $inventory->availablequantity -= $value->cantidad;
                            $inventory->save();
                        }
                    }
                }

                //MEDIOS DE PAGO
                $payments = json_decode($data['pagos']);
                if (count($payments->pagos) > 0) {
                    foreach ($payments->pagos as $i => $payment) {
                        $statusTransaction = APROVED;
                        if ($payment->idpago == MERCADO_PAGO) {
                            if (PaidProviders::where('transaction_id', $venta->id)->exists()) {
                                $status = PaidProviders::where('transaccion_id', $venta->id)->get();
                                $statusTransaction = $status->status_id;
                            } else {
                                $statusTransaction = IN_PROCESS;
                            }
                        }
                        if ($payment->idpago == CREDITO_LOCAL) {
                            $statusTransaction = IN_PROCESS;
                        }

                        $pago = new TransactionsPaymentmethods;
                        $pago->transaction_id = $venta->id;
                        $pago->paymentmethods_id = $payment->idpago;
                        $pago->amount = $payment->valorpago;
                        $pago->authorization_code = $payment->parmadi1;
                        $pago->receipt_number = $payment->parmadi2;
                        $pago->status = $statusTransaction;
                        $pago->save();

                        if ($pago->paymentmethods_id == EFECTIVO) {
                            guardarsaldo($empresa->contract_id, $empresa->company_id, auth()->user()->id, 18, $this->aprox($pago->amount), $venta->id, $mShiftid->id, 1);
                        }
                    }

                    if ($payments->pagos[0]->idpago == CONTRAENTREGA) {
                        $array = [
                            'transaction_id' => $venta->id,
                            'status' => 1,
                            'start_date' => date("Y/m/d h:i:s"),
                        ];
                        $request = new Request($array);
                        (new DeliveriesController)->store($request);
                    }
                }

                //Actualiza domiciliario, domicilio  y transaccion
                if (str_contains($data['url'], "delivered")) {

                    // $delivered = Deliveries::where('id', $data['delivered'])->value('transaction_id');
                    $delivery = Deliveries::find($delivery_id);
                    if (isset($delivery->courier_id)) {
                        $associated_deliveries = Deliveries::where('courier_id', $delivery->courier_id)
                            ->where('status', DeliveryStatusEnum::IN_TRANSIT)
                            ->count();

                        //Actualiza Domiciliario
                        if ($associated_deliveries == 1) {
                            $courier = Courier::find($delivery->courier_id);
                            $courier->status = 1;
                            $courier->update();
                        }
                    }

                    //Actualiza Domicilio
                    if (count($payments->pagos) > 0) {
                        $delivery->status = DeliveryStatusEnum::RECEIVED;
                        $delivery->enddate = Carbon::now();
                        $delivery->update();
                    }

                    //Actualiza Transaction
                    $venta->status = 192;
                    $venta->save();
                }

            } catch (\Exception $e) {
                // dd($e);
                // exit();
                DB::rollback();
                return $e->getMessage();
            }
            DB::commit();
            // exit();
            //Generar PDF del Tiquete y almacenarlo Ventas Finalizadas
            // dd("status ",$venta->status);

            $data['id'] = $venta->id;
            $data['invoice_number'] = $venta->invoice_number;
            $data['created_at'] = $venta->created_at;

            $delivery = Deliveries::where('transaction_id', $venta->id)->first();
            
            if (!empty($delivery) && $data != null) {

                $cliente = Person::select('persons.digitcheck as digcheck', 
                                          'lists.code as tipiden', 
                                          'persons.numberdocument as numiden', 
                                          DB::raw("concat(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                        ->join('clients', 'clients.person_id', 'persons.id')
                        ->join('lists', 'lists.id', 'persons.typedocument_id')
                        ->where('clients.id', $data['idcliente'])
                        ->first()->toArray();
    
                $direccion = Address::select('address.address as direc', 'address.neighborhood as barrio', 'address.location as observacion')
                        ->join('deliveries', 'deliveries.address_id', 'address.id')
                        ->where('deliveries.transaction_id', $venta->id)
                        ->first()->toArray();
    
                $cliente['nombrecompleto'] = trim(str_replace("  "," ",$cliente['nombrecompleto']));
                $data['cliente'] = $cliente;
                $data['direccion'] = $direccion;
    
            }

            // if ($venta->status == 192) {
            //     $res = $this->generar_txt($venta->id);
            // }
            return ['data' => $data,];

        } else {
            $data['id'] = 'Turno Cerrado, No Puede Facturar';
            return ['data' => $data,];

        }
    }
    
    function imprimir_tirilla($data) {
        //INICO DATA TIRILLA DESDE ID VENTA
        // dd($data['datafull']);
        // $object = (object) $data;
        // dd($object->detalles);
        // dd(json_encode($data));
        $sales = json_decode($data['datafull']);
        // dd($obj);
        // $resDian = json_decode($sales->resDian);
        // $payments = $payments->pagos;

        $company = json_decode($sales->company);
        $contract = json_decode($sales->contract);
        $products = json_decode($sales->detalles);
        $products = $products->datos;
        $payments = json_decode($sales->pagos);
        $payments = $payments->pagos;
        $resDian = json_decode($sales->resDian);

        // dd($company->impresora);

        //******************************** */
        //inicio Congiguracion impresora. Se debe parametrizar
        $nombre_impresora = $company->impresora;

        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        //fin Congiguracion impresora. Se debe parametrizar

        //inicio Construccion tirilla01
        // $path_file = '/support/pictures/companies/' . $sales->contract_id . '/' . $company->id . '/' . $company->logo;
        // if ( file_exists(public_path( $path_file )) ) {
        //     $logo = EscposImage::load(public_path( $path_file ), false);
        // }
        // $printer->bitImage($logo);
        
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 2);
        $printer->text($company->name);
        $printer->feed();
        $printer->text($company->slogan);
        $printer->feed();
        $printer->setTextSize(1, 1);
        $printer->feed();
        $printer->text('IVA '.$company->regimen_impuestos->name.' NIT: '.$contract->persona->numberdocument.'-'.$contract->persona->digitcheck);
        $printer->feed();

        if ($resDian->resolution_number != '') {
            $printer->text('RESOLUCION DIAN: '.$resDian->resolution_number.' DE '.$resDian->resolution_date);
            $printer->feed();
            $printer->text('DEL '.$resDian->initial_value.' AL '.$resDian->final_value.' '.$resDian->official_text);
            $printer->feed();
        }
        $printer->text($company->persona->location[0]->address);
        $printer->feed();

        if ( isset($company->persona->ContactPhone[0]->textcontact) ) {
            $printer->text($company->persona->location[0]->city.' - Tel: '.$company->Persona->ContactPhone[0]->textcontact);
        } else {
            $printer->text($company->persona->location[0]->city);
        }
        $printer->feed(2);

        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(1, 2);
        $printer->text(__("SALES INVOICE").': '.$sales->invoice_number);

        $printer->setTextSize(1, 1);
        $printer->feed(2);
        $printer->text(__("Client"));
        $printer->feed();
        $printer->text(__("Mr. or Ms").': ');
        if (!empty($sales->Cliente)) {
            $printer->text($sales->Cliente->person->fullname);
            $printer->feed();
            $printer->text($sales->Cliente->person->TypeDocument->code . ' : ' . $sales->Cliente->person->numberdocument);
            $printer->feed();
            if (!empty($sales->address)) {
                $printer->text(!empty($sales->address) ? $sales->address : '');
                $printer->feed();
                $printer->text(!empty($sales->neighborhood) ? $sales->neighborhood : '');
                $printer->feed();
                $printer->text(!empty($sales->location) ? $sales->location : '');
            }
        } else {
            $printer->text(__("Customer Counter"));
        }
        $printer->feed(2);

        $reg = registrox2_caj_fec($printer, __("Seller"), __("Date"));
        $printer->text($reg);
        $printer->feed();
        // $reg = registrox2_caj_fec($printer, $sales->seller->persona->fullname, $sales->created_at);
        $reg = registrox2_caj_fec($printer, "Vendedor 2", substr($sales->created_at->date,0,16));
        $printer->text($reg);
        $printer->feed(2);

        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(1, 1);

        $reg = registrox3_prod_tit(
                        $printer,
                        __('Description'),
                        __('Valor Un'),
                        __('SubTotal'));
        $printer->text($reg);
        $printer->feed();
        $printer->text('------------------------------------------------');
        $printer->feed();
        // dd($products    );
        // if (count($products) > 0) {
            for ($i=0; $i<count($products); $i++) {
                $reg = registrox3_prod(
                        $printer,
                        $products[$i]->cantidad.' X '.strtoupper($products[$i]->articulo),
                        $products[$i]->precio_venta,
                        $products[$i]->precio_total
                    );
                $printer->text($reg);
                $printer->feed();
            }
        // }

        //Resumen valores
        $printer->text('------------------------------------------------');
        $printer->feed(1);
        $printer -> setEmphasis(true);
        $reg = registrox2_resume(
            $printer,
            __('Total Articles'),
            $sales->totalarticulos,
            true
            );
        $printer->text($reg);
        $printer->feed();

        $reg = registrox2_resume(
            $printer,
            __('SubTotal'),
            $sales->totalpago - $sales->totaliva);
        $printer->text($reg);
        $printer->feed();

        $reg = registrox2_resume(
            $printer,
            __('VAT'),
            $sales->totaliva);
        $printer->text($reg);
        $printer->feed();

        $reg = registrox2_resume(
            $printer,
            __('Total'),
            $sales->totalpago);
        $printer->text($reg);
        $printer->feed();
        $printer -> setEmphasis(false);
        $printer->text('------------------------------------------------');
        $printer->feed();
        
        //Medios de Pago diferente a Efectivo
        $efectivo = null;
        $printer -> setEmphasis(true);
        $printer->setTextSize(1, 2);

        if (count($payments) > 0) {
            for ($i=0; $i<count($payments); $i++) {
                if ($payments[$i]->idpago != 92) {
                    $reg = registrox2_medpag(
                        $printer,
                        $payments[$i]->nombre,
                        $payments[$i]->valorpago
                    );
                    $printer->text($reg);
                    $printer->feed();
                } else {
                    $efectivo = $i;
                }
            }
        }

        if (count($payments) >= 2) {
            $printer->text('------------------------------------------------');
            $printer->feed();
        }


        $printer->setTextSize(1, 2);
        if ($efectivo >= 0) {
            // dd($efectivo,$payments[$efectivo]['amount']);
            $reg = registrox2_medpag(
                $printer,
                __('Cash Payment'),
                $payments[$efectivo]->valorpago
            );
            $printer->text($reg);
            $printer->feed();

            $reg = registrox2_medpag(
                $printer,
                __('Received Value'),
                $payments[$efectivo]->parmadi1
            );
            $printer->text($reg);
            $printer->feed();

            $reg = registrox2_medpag(
                $printer,
                __('Change'),
                $payments[$efectivo]->parmadi2
            );
            $printer->text($reg);
            $printer->feed();

        }
        $printer->text('------------------------------------------------');
        $printer -> setEmphasis(true);
        $printer->feed(1);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 1);
        $printer->text("GRACIAS POR SU COMPRA");
        $printer->feed(2);
        $printer->cut();
        $printer->pulse(); //Abrir cajon
        $printer->close();

        // dd("fanilizo xxxxxxx");
        return;
    }

    public function leer_info_ticket($data) {

        $id = $data['id'];
        $transaction = Transactions::find($id);

        $contract = $transaction->contract_id;
        $company = $transaction->company_id;
        $fecha = substr(str_replace("-", "", $transaction->operation_date),0,8);

        $folder0 = str_pad($contract, 5, "0", STR_PAD_LEFT)."/".str_pad($company, 5, "0", STR_PAD_LEFT);
        $folder1 = $fecha;
        $filename = "TK".str_pad($id, 6, "0", STR_PAD_LEFT).".txt";

        $filePath = "/tiketsPDVi/".$folder0."/".$folder1;
        $file = $filePath."/".$filename;
        
        $exists = Storage::has($file);

        if ($exists) {
            $data = Storage::get($file);
        } else {
            $data = null;
        }

        $sales = json_decode($data);

        $delivery = Deliveries::where('transaction_id', $id)->first();
        if (!empty($delivery) && $data != null) {

            $cliente = Person::select('persons.digitcheck as digcheck', 
                                      'lists.code as tipiden', 
                                      'persons.numberdocument as numiden', 
                                      DB::raw("concat(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('clients', 'clients.person_id', 'persons.id')
                    ->join('lists', 'lists.id', 'persons.typedocument_id')
                    ->where('clients.id', $sales->idcliente)
                    ->first()->toArray();

            $direccion = Address::select('address.address as direc', 'address.neighborhood as barrio', 'address.location as observacion')
                    ->join('deliveries', 'deliveries.address_id', 'address.id')
                    ->where('deliveries.transaction_id', $id)
                    ->first()->toArray();

            $cliente['nombrecompleto'] = trim(str_replace("  "," ",$cliente['nombrecompleto']));
            $sales->cliente = $cliente;
            $sales->direccion = $direccion;

        }
        return ['data' => json_encode($sales),];

    }

    //Se hace llamada desde guardar factura y /crerpdf
    public function generar_txt($data) { //, $contrato, $company, $fecha) {

        $transaction = Transactions::find($data['id']);
        $file = $this->guardar_pdf( 
                        $data['datafull'], 
                        $transaction->contract_id, 
                        $transaction->company_id, 
                        $data['id'], 
                        "TK", 
                        substr(str_replace("-", "", $transaction->operation_date),0,8) 
                        );

        $pos = strpos(url()->current(), 'createpdf');
        if (!$pos) return;
        if ($file) {
            return redirect(strtolower('/management/deliveries'))->with('success', __('PDF Saved successfuly'));
        } else {
            return redirect(strtolower('/management/deliveries'))->with('errors', array(__("PDF can't be saved. Please review data and try again later")));
        }
                
        return $file;

    }

    function guardar_pdf ( $content, $contract, $company, $id, $file_name, $fecha) {

        $this->folder0 = str_pad($contract, 5, "0", STR_PAD_LEFT)."/".str_pad($company, 5, "0", STR_PAD_LEFT);
        $this->folder1 = $fecha;
        $this->filename = $file_name.str_pad($id, 6, "0", STR_PAD_LEFT);

        $filePath = "/tiketsPDVi/".$this->folder0."/".$this->folder1;
        $file = $filePath."/".$this->filename.'.txt';
        $resp = Storage::put($file, $content);
        // dd($resp, $file);
        return $file;
    }

    // function imprimir_pdf ($file, $filename) {

    //     return Response::make(Storage::get($file), 200, [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'attachment; filename="'.$filename.'"'
    //     ]);

    //     // $delay = Carbon::now()->addMinutes(10);
    //     // $delay = $delay->toTimeString();

    //     dd($file, $filename);
    //     exit();

    // }

    public function facturacion(Request $request)
    {
        $input = $request->all();
    }

    // public function getContractImage($contract){

    //     $path  = '/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT);
    //     $file = '/logo000001.png';
    //     $filepath = $path.$file;

    //     $exists = file_exists(public_path($filepath));

    //     if(!$exists) $filepath = '/support/pictures/partners/001'.$file;

    //     return $filepath;
    // }

    public function download(Request $request, $group, $page)
    {
        $id = $request->id;

        if (isset($request->idqr)) {
            //Decrypt data
            $encdec = new EncdecController;
            $params_decryp = $encdec->encrypt_decrypt('decrypt', $request->idqr);

            //cambio de swicht para el id_transaction
            DB::table('qr_confirmation')->where('switch', 1)
                ->where('status', '=', 'procesada')
                ->where('idconfirmation', $params_decryp)
                ->update(['transaction_id' => $id, 'switch' => 2]);
        }

        $pdf = create_pdf_sale($id);
        $numventa = Transactions::select('id')->where('id', $id)->get();

        // $sale = Transactions::where('id', $id)
        //     ->with('Cliente','User','Seller','typeOperation')
        //     ->first();

        // $details = TransactionsDetails::where('transaction_id', $id)->get();

        // $sale->totalArt = 0;
        // foreach ($details as $detail) {
        //     $sale->totalArt += $detail->quantity;
        // }

        // $payments = TransactionsPaymentmethods::where('transaction_id',$id)
        //     ->with('formaPago')->get();

        // $payItems = TransactionsPaymentmethods::where('transaction_id', '=', $id)->get()->count();

        // $numventa = Transactions::select('id')->where('id', $id)->get();

        // $company = Company::where('id', $sale->company_id)
        //     ->with('Persona','RegimenImpuestos')
        //     ->first();

        // $img = $this->getContractImage(auth()->user()->contract_id);

        // $contract = Contract::where('id',auth()->user()->contract_id)
        //     ->with('Persona')->first();

        // $resDian = Counterscontrol::where('type_transaction', 61)
        //     ->where('contract_id', $contract->id)
        //     ->where('companies_id', $company->id)
        //     ->first();

        // // dd('sale', $sale, 'details', $details, 'payments', $payments,'payItems', $payItems, 'company', $company, 'img', $img, 'contract', $contract, 'resDian', $resDian);

        // $pdf = \PDF::loadView('pdf.venta', ['sale' => $sale, 'details' => $details, 'payments' => $payments,
        //     'payItems' => $payItems, 'company' => $company, 'img' => $img, 'contract' => $contract, 'resDian' => $resDian ])
        //     ->setPaper('A5', 'portrait');

        //B7 para impresión

        //Envio de correo
        if ($request->sendEmail != false)
            if (!empty($group) && !empty($page)) $this->sendPdf($request, $pdf);

        return isset($request->preview) ? $pdf->stream()
            : $pdf->download('venta-' . $numventa[0]->id . '.pdf');
    }

    public function abrirturno($idusuario, $estado, $initialBalance)
    {
        $turno_actual = ShiftManagements::where('shift_managements.user_id', $idusuario)
            ->whereIn('shift_managements.typeshift_id', [14,12,10])
            ->get();

        if ( count($turno_actual) > 0 ) {
            return false;
        }

        $turnoAdmon = buscarTurnoAdmon($this->company->id);

        if(!empty($turnoAdmon)){
            if ($turnoAdmon->typeshift_id == 12) {
                return false;
            }
        }
        try {

            DB::beginTransaction();

            $turno = new ShiftManagements;
            $mytime = Carbon::now('America/Bogota');
            $turno->shiftdate = $mytime->toDateTimeString();
            $turno->user_id = $idusuario;
            $turno->typeshift_id = $estado;
            $turno->initialbalance = $initialBalance;
            $turno->save();

            $company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

            guardarsaldo($company->contract_id, $company->id, auth()->user()->id, 18, $initialBalance, 0, $turno->id, 0);

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return false;
        }
        DB::commit();
        return ['id' => $turno->id];
    }

    public function cerrarturno($group, $page, $idturno, $estado)
    {

        try {
            DB::beginTransaction();

            $turno = ShiftManagements::find($idturno);
            $turno->typeshift_id = $estado;
            $turno->save();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return ['id' => $turno->id];
    }

    // public function generateQr($id_transaction = null)
    // {
    //     $tipo = 'hola';
    //     $now = Carbon::now();
    //     $date = ($now->format('Y-m-d'));
    //     $namepdf = 'qr';
    //     $ext = '.png';

    //     $encdec = new EncdecController;
    //     $parms = '{"id":"' . strval($id_transaction) . '","tp":"' . $tipo . '"}';

    //     $parms = $encdec->encrypt_decrypt('encrypt', $parms);

    //     $img = \QrCode::size(500)->format("png")->generate("gmqa.ccit.hn/rpc?rpc_task=ffps&parametros=" . $parms);
    //     $path = "gm/" . $date . "/" . $id_transaction . "/" . $namepdf . $ext;
    //     Storage::put($path, $img);
    //     $qr_img = Storage::disk('local')->getAdapter()->getPathPrefix() . $path;
    //     return $qr_img;
    // }

    public function QrCodeBank($id)
    {
        $encdec = new EncdecController;
        $parms = '{"id":"' . $id . '"}';
        $params = $encdec->encrypt_decrypt('encrypt', $parms);
        return URL::to('/') . "/rpc?rpc_task=requestDataQr&parametros=" . $params;
        //TESTER URL
        //       return "http://192.168.16.170:8000/rpc?rpc_task=requestDataQr&parametros=".$params;
    }

    public function sendPdf($request, $pdf)
    {

        !file_exists("storage/app/fillPdf/") ? mkdir("storage/app/fillPdf/", 777) : null;

        $path = 'fillPdf/' . 'venta-' . $request->id . '.pdf';
        Storage::disk('local')->put($path, $pdf->download());
        $contents = Storage::get($path);
        $subject = "Correo Factura de venta";
        $for = $request->sendEmail;

        $adminContractsEmail = User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('users.contract_id', '=', auth()->user()->contract_id)
            ->where('users.status', '=', '1')
            ->where('role_user.role_id', '=', '2')
            ->first();

        if (isset($for)) {

            //send mail to client
            Mail::send(
                'emails.billemail',
                ['email' => $request->sendEmail, 'emailClient' => $request->sendEmail],
                function ($msj) use ($request, $contents, $subject, $for) {
                    $msj->subject($subject);
                    $msj->attachData(
                        $contents,
                        'venta-' . $request->id . '.pdf',
                        ['mime' => 'application/pdf',]
                    );
                    $msj->to($for);
                }
            );

            //send mail to Admin Contracts
            if (isset($adminContractsEmail)) {
                Mail::send(
                    'emails.billemail',
                    ['email' => auth()->user()->email, 'emailClient' => $request->sendEmail],
                    function ($msj) use ($request, $contents, $subject, $adminContractsEmail) {
                        $msj->subject($subject);
                        $msj->attachData(
                            $contents,
                            'venta-' . $request->id . '.pdf',
                            ['mime' => 'application/pdf',]
                        );
                        $msj->to($adminContractsEmail->email);
                    }
                );
            }
        }
    }


    public function smartCheckout($group, $page, Request $request)
    {
        require '../vendor/autoload.php';

        try {

            DB::beginTransaction();
            $userData = User::with(['Persona' => function ($q) {
                $q->join('address', 'address.id', '=', 'persons.id');
            }])->where('id', '=', auth()->user()->id)
                ->first();

            $company_id = Company::select('companies.*', 'persons.socialreason', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
                ->join('persons', 'persons.id', '=', 'companies.person_id')
                ->with('Contrato', 'Persona')
                ->where('contract_id', '=', auth()->user()->contract_id)
                ->first();
            $accessToken = CredentialsServices::select('access_token')
                // ->where('company_id', $company_id->id)
                ->where('provider', '=', 111)
                ->where('type_url', 'PRD')->first();

            $consecutive = $request->idFactura;
            $data = [
                'consecutive' => intval($consecutive),
                'company_id' => $company_id->id,
                'access_token' => $accessToken['access_token'],
            ];
            (new PaidProvidersController)->save($data);

            if (empty($accessToken)) {
                DB::rollback();
                return response()->json(['status' => 400, 'type' => 'BAD_REQUEST', 'message' => __("Error, la comercio no esta asociada a una cuenta de Super Pagos")], 400);
            }
            //            Public key: TEST-91c5c431-0017-4925-a679-a8aa026d9bdf
            //            Access token: TEST-1168579801063920-101800-e8a7710cbe049384aa66a6cf20844d27-480556164
            \MercadoPago\SDK::setAccessToken('TEST-1168579801063920-101800-e8a7710cbe049384aa66a6cf20844d27-480556164');
            // Crea un objeto de preferencia
            $preference = new \MercadoPago\Preference();
            // Crea un ítem en la preferencia
            $item = new \MercadoPago\Item();
            //Crea la data del usuario pagador
            $prayer = new \MercadoPago\Payer();

            $item->title = 'Productos PDVI';
            $item->quantity = 1; // cantidad de items
            //$item->unit_price = '2000';
            $item->unit_price = $request->total;
            $preference->payment_methods = array(
                "excluded_payment_types" => array(
                    array("id" => "credit_card")
                ),
                "excluded_payment_methods" => array(
                    array("id" => "codensa"),
                    array("id" => "davivienda"),
                ),
                "default_payment_method_id" => "efecty",
            );
            $prayer->name = $userData->Persona['firstname'];
            $prayer->surname = $userData->Persona['lastname'];
            $prayer->first_name = $userData->Persona['othernames'];
            $prayer->last_name = $userData->Persona['otherlastname'];
            $prayer->email = $userData['email'];
            $prayer->identification = array(
                "type" => " ",
                "number" => $userData->Persona['numberdocument']
            );
            $prayer->address = array(
                "street_name" => $userData->Persona['address'],
                "zip_code" => $userData->Persona['postalcode'],
            );
            $preference->items = array($item);
            $preference->payer = $prayer;
            $preference->notification_url = ENDPOINT_RECEIVE . $consecutive;
            $preference->save();

            if (empty($preference->init_point)) {
                DB::rollback();
                return response()->json(['status' => 500, 'type' => 'BAD_REQUEST', 'message' => __("Error al generar la preferencia, favor comunicarse con un administrador")], 500);
            }

            DB::commit();
            return response()->json(['status' => 200, 'type' => 'CONFIRMED', 'message' => $preference->init_point, 'authorization_code' => $consecutive], 200);
        } catch (\Exception $errorException) {
            DB::rollback();
            return response()->json(['status' => 500, 'type' => 'BAD_REQUEST', 'message' => __("Ocurrio un error inesperado favor comunicarse con un administrador"), 'CAUSED_BY:' => $errorException->getMessage()], 500);
        }
    }

    /**
     * Trae los productos de la venta en standby
     *
     * @param $group
     * @param $page
     * @param $data
     */
    public function getStanbyProducts($group, $page, $data)
    {
        try {
            return TransactionsDetails::with('product')->withCount('product')->where('transaction_id', $data['idTransaccion'])->get();
        } catch (\Exception $e) {
        }
    }

    public function aprox($number)
    {
        return $number - ($number % 50);
    }

    protected function getInfolient($data)
    {
        $infolient = null;
        switch ($data['status']) {
            case '191':
                return $infolient = $data['client_name'];
            default:
                if ($data['idcliente'] !== 'default') {
                    return $infolient = $data['name'];
                } else {
                    return $infolient = 'Cliente genérico';
                }
        }
    }
}
