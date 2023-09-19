<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Company;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;
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

const PATH_IMAGE = "/support/pictures/productscatalogs/";
const UNIDADES_VENTA = 53;

class InventorycatalogsproductsController extends Controller
{
    public $categories = '';
    public $products = '';
    public $suppliers = '';
    public $salesunits = '';

    public function __construct() {
        $this->middleware('auth');

        $this->categories = Category::where('contract_id', '=', auth()->user()->contract_id)
            ->orderBy('name', 'asc')->get();

        $this->suppliers = Supplier::orderBy('name', 'asc')
            ->get();

        $this->salesunits = Lists::where('idowner', '=', UNIDADES_VENTA)
            ->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')
            ->get();

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        $inputs=Input::all();

        $catalog = $inputs['id'];

        $namecatalog = Catalog::select('name')->where('id', "=", $catalog)->first()->name;

        $this->products = CatalogProducts::select('catalog_products.*', DB::raw("'0' as availablequantity") )
            ->where('catalog_id', $catalog)
            ->where('inventory_control', 0)
            ->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => $namecatalog,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => PATH_IMAGE
        ]);
    }

    public function viewlist($group, $page) {

        $inputs=Input::all();
        $catalog = $inputs['id'];

        $results = CatalogProducts::select('catalog_products.*', DB::raw("'0' as availablequantity") )
            ->where('catalog_id', $catalog)
            ->where('inventory_control', 0);

        $obj = new \stdClass();
        $obj->link = '<button type="submit" onclick="save()" class="btn btn-success" style="..." data-placement="top" data-toggle="tooltip" title="' . __('Save') . '">
                            <i class="fa fa-save"></i> </button>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[0] = $obj;

        return Datatables::of($results->get())
            ->addColumn('purchaseprice', function ($model) {
                return '<input type="number" style="border:none;background: transparent;" id="purchaseprice' . $model->id . '" class="form-control" value="' . $model->purchaseprice . '" >';
            })
            ->addColumn('saleprice', function ($model) {
                return '<input type="number" style="border:none;background: transparent;" id="saleprice' . $model->id . '" class="form-control" value="' . $model->saleprice . '" >';
            })
            ->addColumn('availablequantity', function ($model) {
                return '<input type="number" style="border:none;background: transparent;" id="quantity' . $model->id . '" class="form-control" value="' . $model->availablequantity . '" >';
            })
            ->addColumn('estado', function ($model){
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('salesUnit', function ($model){
                return $model->UnidadVenta->name;
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model,false,false);
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
        ]);
    }

    public function save($request, $group, $page) {
        // get request fields
        // dd("llega ",$request->request);
        $validator = Validator::make($request->all(), [
            'purchaseprice' => 'required|numeric',
            'saleprice' => 'required|numeric',
            'availablequantity' => 'required|numeric',
        ]);

        // validate fields
        if ($validator->fails()) {
            return $request->excel
                ? $validator->errors()
                : redirectType($validator->errors(), 'errors', true);
        }
        try {
            if (!$request->excel) DB::beginTransaction();

            $saleprice = (int) $request->saleprice;
            $quantity = (int) $request->availablequantity;

            $product = CatalogProducts::where('id', $request->product_id)
                        ->where('catalog_id', $request->catalog_id)
                        ->first();

            if(isset($product->id)){
                $company = Company::where('admon_id', auth()->user()->id)->first();

                $product->saleprice = $saleprice;
                $product->inventory_control = 1;
                $product->status = 1;
                $product->updated_at = Carbon::now();
                $product->save();

                $inventory = new Inventory();
                $inventory->contract_id = auth()->user()->contract_id;
                $inventory->company_id = !empty($company) ? $company->id : null;
                $inventory->catalog_id = $product->catalog_id;
                $inventory->product_id = $product->id;
                $inventory->saleprice = $product->saleprice;
                $inventory->average_cost = $product->purchaseprice;
                $inventory->availablequantity = $request->availablequantity;
                $inventory->status = 1;
                $inventory->save();

                $details = new InventoryDetails();
                $details->inventory_id = $inventory->id;
                $details->type_operation = 'INVENTARIO INICIAL';
                $details->quantity = $inventory->availablequantity;
                $details->unit_value = $product->saleprice;
                $details->total_value = $product->saleprice * $product->availablequantity;
                $details->gross_margin = 0;
                $details->save();
            }
            
            if (!$request->excel) DB::commit();

        }  catch (\Exception $e) {
            dd($e);
            return $request->excel
                ? $e->getPrevious()->getMessage()
                : DB::rollback();

                return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__('Error')));
        }
        return $request->excel
                ? 'true'
                : redirect(strtolower('/' . $group . '/' . $page . '?id=' . Input::get('catalog')))->with('success', __('Saved successfuly'));
    }

    public function ajax(Request $request, $page, $group){

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch($type){
            case 'edit':
                $purchaseprice = Input::get('purchaseprice');
                $saleprice = Input::get('saleprice');
                $quantity = Input::get('quantity');
                $id = Input::get('id');
                $company = Company::where('admon_id', auth()->user()->id)->first();

                $catalogProduct = CatalogProducts::where('id',$id)->with('UnidadVenta')->get()->first();
                // dd($catalogProduct);
                $multiple = explode('|', $catalogProduct->UnidadVenta->code)[3];

                $inventario = Inventory::where('product_id', $id)->get()->first();

                if (empty($inventario)) {
                    $inventario = new Inventory();
                }

                try{
                    DB::beginTransaction();

                    $inventario->contract_id = auth()->user()->contract_id;
                    $inventario->company_id = !empty($company) ? $company->id : null; //buscar company
                    $inventario->catalog_id = $catalogProduct->catalog_id;
                    $inventario->product_id = $id;
                    $inventario->purchaseprice = $purchaseprice;
                    $inventario->saleprice = $saleprice;
                    $inventario->availablequantity = $quantity * $multiple;
                    $inventario->average_cost = $catalogProduct->purchaseprice;
                    $inventario->status = 1;
                    $inventario->updated_at = Carbon::now();
                    $inventario->save();

                    $catalogProduct->inventory_control = 1;
                    $catalogProduct->purchaseprice = $purchaseprice;
                    $catalogProduct->saleprice = $saleprice;
                    $catalogProduct->save();
                    
                    $details = new InventoryDetails();
                    $details->inventory_id = $inventario->id;
                    $details->type_operation = 'INVENTARIO INICIAL';
                    $details->quantity =  $inventario->availablequantity;
                    $details->unit_value = $purchaseprice;
                    $details->total_value = $inventario->availablequantity * $purchaseprice;
                    $details->gross_margin = 0;
                    $details->save();
                    
                    $result = [
                    "status" => true,
                    "saleprice" => $saleprice
                    ];

                    DB::commit();
                }
                catch(\Exception $e){
                    DB::rollback();
                    dd($e);
                }

                return json_encode($result);
                break;
        }

    }

    public function selectProduct($group, $page, $id) {

        $mproduct = Product::where('id','=',$id)
            ->with('SalesUnit')
            ->with('Pictures')
            ->get();
        return $mproduct;

    }

    public function delete($group, $page, $id) {
        $res = Inventory::where('id', '=', $id)->first();

        if ($res){
            $res->status = 2;
            $res->update();
            return back()->with('success', __('Deleted successfuly'));
        }else{
            return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }


}
