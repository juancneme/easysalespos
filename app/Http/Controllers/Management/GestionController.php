<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Lists;
use App\Models\Management\CatalogProducts;
use \App\Models\Management\Transactions;
use \App\Models\Management\TransactionsDetail;
use \App\Models\Management\User;
use Carbon\Carbon;
use DB;

use \App\Models\Management\Category;

const rutaimagenprod = "/support/pictures/products/";
const rutaimagencat = "/support/pictures/categories/";

class GestionController extends Controller
{
    
    public $images = '';
    public $categories = '';
    public $consultas = '';
    public $catalogproducts = '';

    public function __construct() {
        $this->middleware('auth');
        $this->categories = Category::select('categories.*')
                ->where('categories.contract_id', '=', auth()->user()->contract_id)
                ->with('ProductsCatalog')
                ->with('ProductsCatalog.ValorImpuesto')
                ->get();

        $this->consultas = \App\Models\Sir\CubQuerys::select('CubQuerys.*')
                ->get();
        $this->images = '';
            
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'categories' => $this->categories,
            'consultas' => $this->consultas,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
                ]);
    }

    public function ajax($page, $group){
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
     
        switch($type){
            case 'articulos':
                $result->data = $this->articulos($group, $page, Input::get("id"));
                $result->success = true;
                break;
            case 'buscararticulos':
                $result->data = $this->buscararticulos($group, $page, Input::get("query"));
                $result->success = true;
                break;
            case 'guardarfactura':
                $result->data = $this->guardarfactura($group, $page, Input::get("query"), Input::get("items"), Input::get("total"), Input::get("iva"));
                $result->success = true;
                break;
        }
        return json_encode($result);
    }
    
    public function guardarfactura($group, $page, $query, $items, $total, $iva) {
        
        $empresa = User::select('users.contract_id', 'catalogs.id as catalog_id', 'companies.id as company_id')
                ->join('catalogs', 'catalogs.contract_id', '=', 'users.contract_id')
                ->join('companies', 'companies.contract_id', '=', 'users.contract_id')
                ->where('users.id', '=', auth()->user()->id)
                ->first();
        
        try{
            
           DB::beginTransaction();
           
           $venta = new Transactions;
           $venta->typeoperation_id='56';
           $venta->contract_id=$empresa->contract_id;
           $venta->catalog_id=$empresa->catalog_id;
           $venta->company_id=$empresa->company_id;
           $venta->supplier_id='1';
           $venta->client_id='19';
           $venta->user_id=auth()->user()->id;
           $mytime=Carbon::now('America/Bogota');
           $venta->operation_date=$mytime->toDateTimeString();
           $venta->support_document='0';
           $venta->invoice_number='1';
           $venta->total_value=$total;
           $venta->iva_value=$iva;
           $venta->status='1';
           $venta->save();
           
           $array = json_decode($query);
             
           for ($i = 0; $i < $items; $i++) {
              foreach($array as $value) {
                $detalle = new TransactionsDetail;
                $detalle->transaction_id=$venta->id;
                $detalle->catalog_product_id=$value[$i]->idarticulo;
                $detalle->quantity=$value[$i]->cantidad;
                $detalle->unit_price=$value[$i]->precio_venta;
                $detalle->iva_value=$value[$i]->valor_iva;
                $detalle->total_value=$value[$i]->precio_total;
                $detalle->lot_number='0';
                $mytime=Carbon::now('America/Bogota');
                $detalle->expiration_date=$mytime->toDateTimeString();
                $detalle->fabrication_date=$mytime->toDateTimeString();
                $detalle->status='1';
                $detalle->save();
              }
           }
           
           DB::commit();
           
           return redirect($group . '/' . $page);
                 
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        
    }

}
