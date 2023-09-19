<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Product;
use \App\Models\Management\Catalog;
use \App\Models\Management\Contract;
use \App\Models\Management\Category;

use \App\Models\Management\Supplier;
use \App\Models\Management\Lists;
use \App\Models\Management\CatalogProducts;
use \App\Models\Management\TransactionsDetails;
use App\Models\Management\InventoryDetails;

const PATH_IMAGE = "/support/pictures/productscatalogs/";
const UNIDADES_VENTA = 53;

class MaintenancecatalogsproductsController extends Controller
{
    public $categories = '';
    public $products = '';
    public $suppliers = '';
    public $salesunits = '';

    public function __construct() {
        $this->middleware('auth');

        $this->categories = Category::where('contract_id', '=', auth()->user()->contract_id)
            ->orderBy('name', 'asc')->get();
        $this->suppliers = Supplier::orderBy('name', 'asc')->get();
        $this->salesunits = Lists::where('idowner', '=', UNIDADES_VENTA)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        $inputs=Input::all();

        $catalog = $inputs['id'];
        $namecatalog = Catalog::select('name')->where('id', "=", $catalog)->get()[0]->name;

        $this->products = DB::select('select * from products where id not in (select product_id from catalog_products where catalog_id = ?)', [$catalog]);
        $existproducts = CatalogProducts::where('catalog_id',$catalog)->count();

        $type = Catalog::where('id',$catalog)->value('typecatalog_id');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => $namecatalog,
            'categories' => $this->categories,
            'products' => $this->products,
            'suppliers' => $this->suppliers,
            'salesunits' => $this->salesunits,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => PATH_IMAGE,
            'existproducts' => $existproducts < 1 ? true : false,
            'type' => $type === 1 ? true : false,
        ]);
    }

    public function viewlist($group, $page) {

        $inputs=Input::all();
        $catalog = $inputs['id'];

        $results = Inventory::select('inventory.*', 'catalog_products.name as name', 'lists.name as nameu', 'lists.code')
            ->join('catalog_products', 'catalog_products.id', 'inventory.product_id')
            ->join('lists', 'lists.id', 'catalog_products.salesunit_id' )
            ->where('inventory.catalog_id',$catalog)
            ->where('inventory.status', 1);
            // ->orderBy('inventory.updated_at','desc');

        return Datatables::of($results->get())
            ->addColumn('updated_at', function ($model){
                return $model->updated_at;
            })
            ->addColumn('name', function ($model){
                //return $model->Producto->name;
                return $model->name;
            })
            ->addColumn('purchaseprice', function($model) {
                return '$'.number_format($model->purchaseprice, 0);
            })
            ->addColumn('saleprice', function($model) {
                return '$'.number_format($model->saleprice, 0);
            })
            ->addColumn('salesUnit', function ($model){
                //return $model->Producto->UnidadVenta->name;
                return $model->nameu;
            })
            ->addColumn('availablequantity', function ($model){
                //return ($model->availablequantity)/(int) explode('|', $model->Producto->UnidadVenta->code)[3];
                return ($model->availablequantity)/(int) explode('|', $model->code)[3];
            })
            ->addColumn('barcode', function ($model){
                return $model->Producto->barcode;
            })
            ->addColumn('estado', function ($model){
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $inventory = Inventory::where('id',$id)->first();

        $catalogproductEdit = CatalogProducts::find($inventory->product_id);
        $catalogproduct = Inventory::where('product_id',$inventory->product_id)->first();

        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        $namecatalog = Catalog::select('name')->where('id', "=", $catalogproductEdit->catalog_id)->get()[0]->name;

        $this->products = Product::where('id', '=', $catalogproductEdit->product_id)->get();
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalogproductEdit->catalog_id,
            'namecatalog' => $namecatalog,
            'categories' => $this->categories,
            'products' => $this->products,
            'suppliers' => $this->suppliers,
            'salesunits' => $this->salesunits,
            'perEdit' => $perEdit,
            'catalogproductEdit' => $catalogproduct,
            'path' => PATH_IMAGE,
            'existproducts' => false,
            'productname' => $catalogproductEdit->name,
            'inventory' => $inventory
        ]);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
            'purchaseprice' => 'required|numeric',
            'saleprice' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            DB::beginTransaction();

            $existsinventory = Inventory::where('id', '=', $request->productid)->first();
            $catalogproduct = CatalogProducts::where('id',$existsinventory->product_id)->first();

            $inventory = !empty($existsinventory) 
                            ? $existsinventory 
                            : new Inventory();

            $unit_value = explode('|', $catalogproduct->UnidadVenta->code)[3];
            $difference = ($request->quantity * $unit_value) - $existsinventory->availablequantity;
            $suffix = $difference > 0 ? 'POSITIVO' : 'NEGATIVO';

            $inventory->saleprice = $request->saleprice;
            $inventory->purchaseprice = $request->purchaseprice;
            $inventory->availablequantity = $request->quantity * $unit_value;
            $inventory->status = 1;
            $inventory->updated_at = Carbon::now();
            $inventory->update();

            $catalogproduct->saleprice = $request->saleprice;
            $catalogproduct->purchaseprice = $request->purchaseprice;
            $catalogproduct->update();

            $details = new InventoryDetails();
            $details->inventory_id = $inventory->id;
            $details->type_operation = 'AJUSTE ' . $suffix;
            $details->quantity = abs($difference);
            $details->unit_value = $catalogproduct->saleprice;
            $details->total_value = $catalogproduct->saleprice * ($inventory->availablequantity / (int) $unit_value);
            $details->unit_value = $catalogproduct->purchaseprice;
            $details->total_value = $catalogproduct->purchaseprice * ($inventory->availablequantity / (int) $unit_value);
            $details->gross_margin = 0;
            $details->save();
            
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect(strtolower('/'.$group.'/'.$page.'?id=').$request->catalog)->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/'.$group.'/'.$page.'?id=').$request->catalog)->with('success', __('Saved successfuly'));
    }

    public function ajax(Request $request, $page, $group){

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch($type){
            case 'selectProduct':
                $result->data = $this->selectProduct($group, $page, Input::get("id"));
                $result->success = true;
                break;
        }

        return json_encode($result);

    }

    public function selectProduct($group, $page, $id) {

        $product = Product::where('id','=',$id)
            ->with('SalesUnit')
            ->with('Pictures')
            ->get();
        return $product;

    }

    public function delete($group, $page, $id) {
        $res = Inventory::where('id', '=', $id)->first();

        if ($res){

            $catalogproducts = CatalogProducts::where('catalog_products.id', $res->product_id)
                ->first();
            $catalogproducts->inventory_control = 0;
            $catalogproducts->update();

            $res->status = 2;
            $res->update();
            return back()->with('success', __('Deleted successfuly'));
        }else{
            return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }


}
