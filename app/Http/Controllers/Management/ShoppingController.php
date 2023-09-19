<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

use App\Models\Management\Transactions;
use App\Models\Management\Category;
use App\Models\Management\Company;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\CatalogProducts;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;
use App\Models\Management\Lists;
use App\Models\Management\Person;

const SHOPPING_ID = 65;
const STATUS = 74;
const TIPOS_DOCUMENTOS = 4;

const rutaimagenprod = "/support/pictures/productscatalogs/";
const rutaimagencat = "/support/pictures/categories/";

class ShoppingController extends Controller
{
    public $images = '';
    public $salesunits = '';
    public $categories = '';
    public $asigcatalog = '';

    public function __construct()
    {
        $this->middleware('auth');

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

        $this->itemstypedocument = Lists::whereIn('code', ['CC', 'CE'])
            ->where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->defaultclient = Person::select('clients.id as id','socialreason')->join('clients','persons.id','clients.person_id')
            ->where('persons.socialreason','REGISTRO PARA EMPRESA SIN DISTRIBUIDOR')->get();

        if ( !empty($this->company) && !empty($this->company->catalog_id)) {

            $categorias_catalogo = CatalogProducts::select('category_id')
                ->where('catalog_id', $this->company->catalog_id)
                ->distinct()
                ->get()
                ->toArray();

            $this->categories = Category::select('categories.*')
                ->whereIn('categories.id', $categorias_catalogo)
                ->where('typemodal', 0)
                ->orderBy('order', 'asc')
                ->get();
        }
    }

    public function viewlist($group, $page)
    {
        $results = Transactions::where('transactions.typeoperation_id', SHOPPING_ID )
            ->where('transactions.status', STATUS)
            ->where('transactions.company_id', $this->company->id)
            ->with('User','Comercio','Estado')
            ->orderByRaw('created_at DESC');

        if (!auth()->user()->hasRole('admin')) {
            $results->where('transactions.contract_id', auth()->user()->contract_id);
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/shoppingitems?transactionId={{ $model->id }}" 
                            class="btn btn btn-info" data-placement="top" data-toggle="tooltip" 
                            style="width:36px;height:36px; margin:auto;"; title="' . __('Shopping Detail') . '">
                            <i class="fa fa-list" style="font-size: 24px; margin-left: -7px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
            // ->addColumn('fullname', function ($model) {
            //     return $model->client->person->fullname .' '. $model->client->person->identification;
            // })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })
            ->escapeColumns(['action'])->make(true);

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
            
            'categories' => $this->categories,
            'success' => $success,
            'infos' => $infos,
            'itemstypedocument' => $this->itemstypedocument,
            'defaultclient' => $this->defaultclient,
            'esvirtual' => false,
            'typetransaction' => 'entry',
            'salesOnHold' => 0,

            'shiftid' => '',
            'combos' => [],
            'promotions' => [],
            'subcategories' => [],
            'payments_id' => [],
            'escajero' => true

        ]);

    }

    public function ajax($page, $group)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'guardarfactura':
                $result->data = $this->guardarfactura($group, $page, Input::get("query"), Input::get("items"), Input::get("total"), Input::get("iva"),Input::get("clientid"));
                $result->success = true;
                break;
        }
        return json_encode($result);
    }

    public function edit($group, $page, $id)
    {
        //dd($path);
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'categories' => $this->categories,
            'images' => $this->images,
            'success' => $success,
            'infos' => $infos

        ]);

    }

    public function guardarfactura($group, $page, $query, $items, $total, $iva, $clientid)
    {
        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

        try {
            DB::beginTransaction();

            $compra = new Transactions();
            $compra->typeoperation_id = SHOPPING_ID;
            $compra->contract_id = $this->company->contract_id;
            $compra->company_id = $this->company->id;
            $compra->catalog_id = $this->company->catalog_id;
            $compra->supplier_id = '1';
            $compra->client_id = null;
            $compra->user_id = auth()->user()->id;
            $mytime = Carbon::now('America/Bogota');
            $compra->operation_date = $mytime->toDateTimeString();
            $compra->support_document = '0';
            $compra->invoice_number = search_transaction_number (SHOPPING_ID, $this->company->contract_id, $this->company->id);
            $compra->total_value = $total;
            $compra->iva_value = $iva;
            $compra->status = '74';

            $compra->save();

            $array = json_decode($query);

            foreach ($array->datos as $value) {

                $detalle = new TransactionsDetails();
                $detalle->transaction_id = $compra->id;
                $detalle->catalog_product_id = $value->idarticulo;
                $detalle->quantity = $value->cantidad;
                $detalle->unit_price = $value->precio_compra;
                $detalle->iva_value = $value->valor_iva;
                $detalle->total_value = $value->precio_total;
                $detalle->lot_number = '0';
                $mytime = Carbon::now('America/Bogota');
                $detalle->expiration_date = $mytime->toDateTimeString();
                $detalle->fabrication_date = $mytime->toDateTimeString();
                $detalle->status = '1';
                $detalle->save();

                //Funcion para mover el inventario de productos
                $inventario = Inventory::where('product_id', $value->idarticulo)->get()->first();
                if ( empty($inventario) ){ 
                    $inventario = new Inventory();
                    $inventario->contract_id = $this->company->contract_id;
                    $inventario->company_id = $this->company->id;
                    $inventario->catalog_id = $this->company->catalog_id;
                    $inventario->product_id = $value->idarticulo;
                    $inventario->status = 1;
                }
                $inventario->purchaseprice = $value->precio_compra;
                $inventario->saleprice = $value->precio_venta;
                $inventario->availablequantity += $value->cantidad;
                $inventario->average_cost = 0; //falta calcular costo promedio
                $inventario->status = 1;
                $inventario->save();
                
                $detalle_inventario = new  InventoryDetails();
                $detalle_inventario->inventory_id = $inventario->id;
                $detalle_inventario->type_operation = 'COMPRA PRODUCTO';
                $detalle_inventario->quantity = $value->cantidad;
                $detalle_inventario->unit_value = $value->precio_compra;
                $detalle_inventario->total_value = $value->cantidad * $value->precio_compra;
                $detalle_inventario->businesskey = $compra->id;
                $detalle_inventario->gross_margin = 0;
                $detalle_inventario->save();

                $cata_prod = CatalogProducts::where('id', $value->idarticulo)->get()->first();
                if ( !empty($inventario) ) {
                    $cata_prod->purchaseprice = $value->precio_compra;
                    $cata_prod->saleprice = $value->precio_venta;
                    $cata_prod->inventory_control = 1;
                    $cata_prod->save();
                }
            }
            DB::commit();
            // return redirect($group . '/' . $page);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function delete($group, $page, $id)
    {

        try {
            $consulta = Transactions::where('id', '=', $id)->where('status', '=', '74')->exists();


            if ($consulta == true) {
                return back()->with('infos', array(__('No se puede Eliminar el pedido esta Procesado')));
            } else {
                TransactionsDetails::where('transaction_id', '=', $id)->delete();
                Transactions::where('id', '=', $id)->delete();
                return back()->with('success', array(__('Deleted successfuly')));
            }


        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
    }

}
