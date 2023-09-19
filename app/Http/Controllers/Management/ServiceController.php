<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Traits\Multimark;
use App\Models\Management\Company;
use App\Models\Management\CredentialsServices;
use App\Models\Management\ProductsPictures;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Catalog;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Manufacturer;
use App\Models\Management\Product;
use \App\Models\Management\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use \App\Models\Management\User;
use Validator;
use Session;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Yajra\Datatables\Datatables;
use DB;

const NAME = 'PAQUETES';
const NAME_RE = 'RECARGAS';
const SHORT_NAME = 'Recargas';
const IMG_PAQ = 'cate000028.png';
const IMG_REC = 'cate000029.png';
const UNIT_SERVICE = 101;
const MASTER_SERVICES_ID = 5000;
const MULTIMARCA_ID = 110;

class ServiceController extends Controller
{
    use Multimark;

    public function __construct()
    {
        $this->middleware('auth');
        //items para validar los operadores existan de verdad
        $manufactValidationItems = loadManufacturersService();
        $manufactValidationItems2 = [];

        foreach ($manufactValidationItems as $key => $value) {
            array_push($manufactValidationItems2, $value['idpartner']);
        }

        $this->catalogs = Catalog::select('catalogs.*')
            ->join('contracts', 'contracts.id', '=', 'catalogs.contract_id')
            ->join('users', 'users.contract_id', '=', 'contracts.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('catalogs.id', '=', MASTER_SERVICES_ID)
            ->get();

        $this->operadores = Manufacturer::select('name', 'idpartner')
            ->whereIn('idpartner', $manufactValidationItems2)
            ->where('status', '=', 1)->get();


        $id_cat = Category::where('name', '=', NAME)->value('id');

        $this->categories = Category::select('*')
            ->whereRaw('id <> idowner')
            ->where('idowner', '=', $id_cat)
            ->where('status', '=', 1)->get();

        $this->credentialsMultimark = CredentialsServices::where('provider', '=', MULTIMARCA_ID)
            ->where('type_url', '=', 'PRD')
            ->where('contract_id', auth()->user()->contract_id)
            ->first();

        $this->existcredentials = Company::where('contract_id', auth()->user()->contract_id)->each(function ($q) {
            $ifExist = CredentialsServices::where('type_url', 'PRD')
                ->where('provider', '=', MULTIMARCA_ID)
                ->where('contract_id', auth()->user()->contract_id)
                ->exists();
            if ($ifExist) {
                return $ifExist;

            }
        });

    }

    /**
     * viewList para servicios
     * @param $group
     * @param $page
     * @return mixed
     * @throws \Exception
     */
    public function viewlist($group, $page)
    {

        $results = Product::select('products.*')->where('salesunit_id', '=', UNIT_SERVICE);

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })->make(true);
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'catalogos' => $this->catalogs,
            'operators' => $this->operadores,
            'categories' => $this->categories,
        ]);
    }

    public function route(Request $request, $page, $group)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        switch ($type) {
            case 'loadService':
                $result->data = $this->loadService($request, $page, $group);

                if ($result->data == 'ok') {
                    $result->success = true;
                } else {
                    $result->success = false;
                }
                return json_encode($result);
                break;

            case 'deleteService':
                $result->data = $this->deleteService($request, $page, $group);
                if ($result->data == 'ok') {
                    $result->success = true;
                } else {
                    $result->success = false;
                }
                return json_encode($result);
                break;

            case 'createRechargeService':
                $result->data = $this->createRechargeService($request, $page, $group);
                if ($result->data == 'ok') {
                    $result->success = true;
                } else {
                    $result->success = false;
                }
                return json_encode($result);
                break;
        }
    }


    private function getToken()
    {
        $token = $this->login($this->credentialsMultimark);
        if ($token)
            return $token;
        return false;
    }

    /**
     * Function to consume the first service.
     * Por este se entra el primer servicio
     * @param Request $request
     * @param $group
     * @param $page
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function loadService(Request $request, $group, $page)
    {

        if (!$this->existcredentials)
            return response()->json(['message' => 'Favor crear credenciales para Multimarca ', 'status' => 401]);

        $manufactValidationItems = loadManufacturersService();
        if (!Manufacturer::where('idpartner', '=', collect($manufactValidationItems)->pluck('idpartner'))->exists())
            return response()->json(['message' => __('Please load 1 or more Manufacturers'), 'status' => 401]);

        if (isset($request->idcat)) {
            $catalog = Catalog::where('id', MASTER_SERVICES_ID)->exists();
            if ($catalog === false) {
                $request->idcat = $this->createCatalogService(MASTER_SERVICES_ID);
            }
        }

        $id_cat = $request->idcat;
        $client = new Client();

        $response = $this->loginService();

        try {
            if ($response->getStatusCode() == 200) {

                $url = $this->credentialsMultimark->url_service;
                $login_response = $response->getBody()->getContents();
                $val_json = json_decode($login_response);
                $TOKEN = $val_json->user->token;

                $headers = [
                    'Authorization' => 'Bearer ' . $TOKEN,
                    'Accept' => 'application/json',
                ];
                /**
                 * Request  service
                 */
                $request = $client->request('GET', $url . '/products/list', [
                    'headers' => $headers,
                ]);

                if ($request->getStatusCode() == 200) {

                    $resp = $this->pacagesService($id_cat, $TOKEN);
                    if ($resp == 'ok') {
                        return 'ok';
                    }
                }

            }
        } catch (\Throwable $e) {
            return response()->json(['message' => __('error en las credenciales'), 'status' => 401]);
        }

    }

    /**
     * @return array
     * Function to request API SUPERPAGOS add pacages to the PDVI
     */
    public function pacagesService($id, $TOKEN)
    {

        try {
            //   DB::beginTransaction();
            $client = new Client();

            $url = $this->credentialsMultimark->url_service;
            $headers = [
                'Authorization' => 'Bearer ' . $TOKEN,
                'Accept' => 'application/json',
            ];

            /**
             * Request  service
             */
            $request = $client->request('GET', $url . '/transaction/packages', [
                'headers' => $headers,
            ]);

            $data = json_decode($request->getBody()->getContents());

            $true = Category::where('name', '=', NAME)->where('contract_id', '=', auth()->user()->contract_id)->get()->count();


            if (Category::where('name', '=', NAME)->where('status', '=', 0)) {

                Category::where('name', '=', NAME)
                    ->where('status', '=', 0)
                    ->update(['status' => 1]);


                //Crear las categorias perteneciente a los paquetes
                if ($true == 0) {
                    $order = Category::max('order');
                    $categories = new Category();
                    $categories->contract_id = auth()->user()->contract_id;
                    $categories->name = NAME;
                    $categories->shortname = NAME;
                    $categories->image = IMG_PAQ;
                    $categories->order = $order + 1;
                    $categories->status = 1;
                    $categories->master_id = 0;
                    $categories->typemodal = 1;
                    $categories->save();
                    $id_owner = $categories->id;
                    $categories->idowner = $id_owner;
                    $categories->save();

                } else {

                    $id_owner = Category::where('name', '=', NAME)->where('status', '=', 1)
                        ->where('contract_id', '=', auth()->user()->contract_id)
                        ->value('id');
                }
                $order = 0;

                /**
                 * Arreglo en el que se va guardar toda la data
                 */
                $paquetes = [
                    'categories' => [],
                    'products' => [],
                ];

                foreach ($data->carriers as $kIndex => $value) {
                    array_push($paquetes['categories'], $value);
                }

                for ($i = 0; $i < count($data->data); $i++) {
                    array_push($paquetes['products'], $data->data[$i]);
                }

                for ($i = 0; $i < count($paquetes['categories']); $i++) {
                    $order += 1;
                    if (Category::where('name', '=', $paquetes['categories'][$i]->name)->where('status', '=', 0)->where('contract_id', '=', auth()->user()->contract_id)) {
                        Category::where('name', '=', $paquetes['categories'][$i]->name)->where('status', '=', 0)->where('contract_id', '=', auth()->user()->contract_id)->update(['status' => 1]);
                    }

                    //Se verifica si existe el paquete
                    $paqueExistente = Category::where('name', '=', $paquetes['categories'][$i]->name)
                        ->where('status', '=', 1)
                        ->where('contract_id', '=', auth()->user()->contract_id)->exists();

                    if ($paqueExistente === false) {

                        if (substr($paquetes['categories'][$i]->name, 0, 8) === 'Paquete ') {
                            $short_name = substr($paquetes['categories'][$i]->name, 8, 8);
                        } else {
                            $short_name = substr($paquetes['categories'][$i]->name, 9, 9);

                        }

                        //Crea las subcategorias de los paquetes
                        $subcategories = new Category();
                        $subcategories->contract_id = auth()->user()->contract_id;
                        $subcategories->name = $paquetes['categories'][$i]->name;
                        $subcategories->shortname = $short_name;
                        $subcategories->image = IMG_PAQ;
                        $subcategories->order = $order;
                        $subcategories->status = 1;
                        $subcategories->master_id = 0;
                        $subcategories->typemodal = 1;
                        $subcategories->idowner = $id_owner;
                        $subcategories->save();

                    }
                }

                $order_products = Product::max('order');

                for ($i = 0; $i < count($paquetes['products']); $i++) {
                    $order_products += 1;


                    //Evalua a que id de manufacture pertenece cada producto
                    switch ($paquetes['products'][$i]->carrierId) {
                        case 14:
                            $operador = 40;
                            $name = 'Paquetes Claro';
                            break;
                        case 15:
                            $operador = 42;
                            $name = 'Paquetes Tigo';
                            break;
                        case 16:
                            $operador = 44;
                            $name = 'Paquetes Virgin';
                            break;
                        case 17:
                            $operador = 47;
                            $name = 'Paquetes Conectame';
                            break;
                        case 18:
                            $operador = 41;
                            $name = 'Paquetes Movistar';
                            break;
                        case 19:
                            $operador = 45;
                            $name = 'Paquete Etb';
                            break;
                        case 20:
                            $operador = 43;
                            $name = 'Paquetes Avantel';
                            break;
                        default:
                            $operador = false;

                    }
                    if (!$operador) continue;
                    $manufac_exist = Manufacturer::where('idpartner', '=', $operador)->exists();
                    if ($manufac_exist === false) {
                        continue;
                    }

                    $count = Product::where('idpartner', '=', $paquetes['products'][$i]->productId)
                        ->where('name', '=', $paquetes['products'][$i]->name)
                        ->where('status', '>', 0)
                        ->count();

                    $searchManufacturer = Manufacturer::where('idpartner', '=', $operador)->first();

                    if ($count == 0) {
                        $imageProductExist = ProductsPictures::where('name', '=', $searchManufacturer->image)->first();
                        $catid = Category::where('name', '=', $name)->value('id');

                        //crea imagen con la misma del manufacturare en imagebn pdoycuto
                        if (!$imageProductExist) {
                            $productsPicture = new ProductsPictures();
                            $productsPicture->name = $searchManufacturer->image;
                            $productsPicture->status = 1;
                            $productsPicture->save();
                            $productImageId = $productsPicture->id;
                        } else {
                            $productImageId = $imageProductExist->id;
                        }

                        $id_estandar = str_pad(88, 7, "0", STR_PAD_RIGHT) + 1;

                        //Crea los productos de cada subcategoria
                        $dinamicId = $this->productsIdBySales($id_estandar, UNIT_SERVICE);
                        $products = new Product();
                        $products->id = $dinamicId;
                        $products->name = $paquetes['products'][$i]->name;
                        $products->manufacturer_id = $searchManufacturer->id;
                        $products->order = $order_products;
                        $products->idpartner = $paquetes['products'][$i]->productId;
                        $products->salesunit_id = 101;
                        $products->saleprice = $paquetes['products'][$i]->amount;
                        $products->products_taxe_id = 1;
                        //asicia id al producto
                        $products->products_picture_id = $productImageId; //coloar imagen que corresponde
                        $products->purchaseprice = $paquetes['products'][$i]->amount;
                        $products->category_id = $catid;
                        $products->status = 1;
                        $products->save();
                        $product_id = $products->id;

                        //ASIGNA LOS PRDUCTOS AL CATALOG MASTER
                        $catalogs_products = new CatalogProducts();
                        $catalogs_products->name = $paquetes['products'][$i]->name;
                        $catalogs_products->catalog_id = $id;
                        $catalogs_products->category_id = $catid;
                        $catalogs_products->product_id = $product_id;
                        $catalogs_products->supplier_id = 1;
                        $catalogs_products->idpartner = $paquetes['products'][$i]->productId;
                        $catalogs_products->salesunit_id = 101;
                        $catalogs_products->saleprice = $paquetes['products'][$i]->amount;
                        $catalogs_products->products_taxe_id = 1;
                        $catalogs_products->image = $searchManufacturer->image; //cambiar por imagen que corresponde
                        $catalogs_products->purchaseprice = $paquetes['products'][$i]->amount;
                        $catalogs_products->status = 1;
                        $catalogs_products->save();

                    }

                }


                DB::commit();

                return 'ok';
            }

        } catch (\Exception $e) {

            // dd($e);
            DB::rollback();
            return response()->json(['message' => __('Error creating the product, if error continues contact an administrator'), 'status' => 401]);
        }

    }

    /**
     * @Fabio
     * Metodo para crear el servicios de recargas
     * @param Request $request
     * @return string
     */
    public function createRechargeService(Request $request)
    {
        if (!$this->existcredentials) {
            return response()->json(['message' => 'Favor crear credenciales para Multimarca ', 'status' => 401]);
        }

        $catalog = Catalog::where('id', MASTER_SERVICES_ID)->exists();

        if (!$catalog) {
            $this->createCatalogService(MASTER_SERVICES_ID);
        }
        /**
         * Se valida si existe la categoria de las recargas
         */
        $count = Category::where('name', '=', NAME_RE)
            ->where('status', '=', 1)
            ->where('contract_id', '=', auth()->user()->contract_id)
            ->get();

        $order_products = Product::max('order');
        $conta = 0;

        /**
         * Se crea la categoria padre si no existe
         */
        if (count($count) > 0) {
            $categories = Category::find($count[0]['id']);
            $order = Category::max('order');
        } else {
            $categories = new Category();
            $order = Category::max('order');
            $order += 1;
        }

        $categories->contract_id = auth()->user()->contract_id;
        $categories->name = NAME_RE;
        $categories->shortname = NAME_RE;
        $categories->image = IMG_REC;
        $categories->order = $order;
        $categories->status = 1;
        $categories->typemodal = 1;
        $categories->save();
        $id_owner = $categories->id;
        $categories->idowner = $id_owner;
        $categories->save();

        foreach ($request->idoperators as $Kvalue => $value) {
            $order_products += 1;
            $json_value = json_decode($value);

            /**
             * Id Categoria a la que corresponde el producto
             */
            $idcat = Category::where('name', '=', NAME_RE . ' ' . $json_value->name)
                ->where('contract_id', '=', auth()->user()->contract_id)
                ->value('id');

            /**
             * Se valida si ya existe la categoria hija
             */
            $child_cat = Category::where('name', '=', SHORT_NAME . ' ' . $json_value->name)
                ->where('contract_id', '=', auth()->user()->contract_id)
                ->get();

            /**
             * Si no existe se crea la categoria hija correspondiente
             */

            if (count($child_cat) == 0) {
                $categories_hijo = new Category();
                $categories_hijo->contract_id = auth()->user()->contract_id;
                $categories_hijo->name = SHORT_NAME . ' ' . $json_value->name;
                $categories_hijo->shortname = $json_value->name;
                $categories_hijo->image = IMG_REC;
                $categories_hijo->order = $conta += 1;
                $categories_hijo->typemodal = 1;
                $categories_hijo->status = 1;
                if (count($count) > 0) {
                    $categories_hijo->idowner = $count[0]['id'];

                } else {
                    $categories_hijo->idowner = $categories->id;
                }
                $categories_hijo->save();
                $idcat = $categories_hijo->id;

            }
            $name = 'Recarga ' . $json_value->name . ' de ' . $request['idamount'];

            /**
             * Valida si existe el producto
             */
            $flag = Product::where('idpartner', '=', $json_value->idpartner)
                ->where('name', '=', $name)
                ->where('status', '=', 1)
                ->get();


            /**
             * Se crea los productos
             */

            if (count($flag) == 0) {

                try {
                    DB::beginTransaction();
                    //Info del manufacture al que correspode el id_patern
                    $manufac_id = Manufacturer::where('idpartner', '=', $json_value->idpartner)->get();
                    $id_estandar = str_pad(88, 7, "0", STR_PAD_RIGHT) + 1;
                    $id = $this->productsIdBySales($id_estandar, UNIT_SERVICE);
                    $products = new Product();
                    $products->id = $id;
                    $products->name = $name;
                    $products->manufacturer_id = $manufac_id[0]->id;
                    $products->order = $order_products;
                    $products->idpartner = $manufac_id[0]->idpartner;
                    $products->salesunit_id = 101;
                    $products->saleprice = $request['idamount'];
                    $products->products_taxe_id = 1;
                    $products->products_picture_id = 1;
                    $products->purchaseprice = $request['idamount'];
                    $products->category_id = $idcat;
                    $products->status = 1;
                    $products->save();
                    $product_id = $products->id;

                    $products_image = ProductsPictures::find(1);

                    /**
                     * Asigna los producos al CATALOG MASTER
                     */
                    $catalogs_products = new CatalogProducts();
                    $catalogs_products->name = $name;
                    $catalogs_products->catalog_id = MASTER_SERVICES_ID;
                    $catalogs_products->category_id = $idcat;
                    $catalogs_products->product_id = $product_id;
                    $catalogs_products->supplier_id = 1;
                    $catalogs_products->idpartner = $manufac_id[0]->idpartner;
                    $catalogs_products->salesunit_id = 101;
                    $catalogs_products->saleprice = $request['idamount'];
                    $catalogs_products->products_taxe_id = 1;
                    $catalogs_products->image = $products_image['name']; // imagen por defecto
                    $catalogs_products->purchaseprice = $request['idamount'];
                    $catalogs_products->status = 1;
                    $catalogs_products->save();
                    DB::commit();

                } catch (\Exception $e) {
                    DB::rollback();
                    return 'false';
                }

            }

        }

        return 'ok';

    }

    /**
     * Funcion para crear id dinamico para cualquier tipo de producto
     * @param $id_estandar el valor del id inicial
     * @param $unit el salesunit del producto
     * @return int|mixed
     */
    public function productsIdBySales($id_estandar, $unit)
    {

        $find = Product::find($id_estandar);
        if ($find) {
            $max_id = Product::where('salesunit_id', '=', $unit)->max('id');
            return $id = $max_id + 1;
        } else {
            return $id = $id_estandar;
        }
    }

    /**
     *
     * Metodo para la creacion del Master catalogo de los servicios
     * @param $id
     * @return mixed
     */
    private function createCatalogService($id)
    {
        $catalog = new Catalog();
        $catalog->id = $id;
        $catalog->contract_id = 1;
        $catalog->status = 1;
        $catalog->name = 'CATALOGO MASTER SERVICIOS';
        $catalog->description = 'Catalogo Generico de Servicios';
        $catalog->typecatalog_id = 104;
        $catalog->save();
        return $catalog->id;
    }

}
