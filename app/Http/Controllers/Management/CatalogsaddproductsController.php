<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Company;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;
use App\Models\Management\Supplier;
use Couchbase\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Catalog;
use Illuminate\Support\Facades\DB;
use \App\Models\Management\CatalogProducts;
use Yajra\Datatables\Datatables;
use App\Models\Management\Category;

use Validator;

const PATH_IMAGE = "/support/pictures/productscatalogs/";


class CatalogsaddproductsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        $inputs = Input::all();
        $catalog = $inputs['id'];
        $catalogonuevo = $inputs['cat'];

        $namecatalog = Catalog::select('name')->where('id', "=", $catalog)->value('name');

        $this->products = DB::select('select * from products where id not in (select product_id from catalog_products where catalog_id = ?)', [$catalog]);

        $this->suppliers = Supplier::orderBy('name', 'asc')->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => $namecatalog,
            'catalogonuevo' => $catalogonuevo,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'suppliers' => $this->suppliers
        ]);
    }

    public function viewlist($group, $page)
    {


        $inputs = Input::all();
        $catalog = $inputs['id'];
        $catalog1 = $inputs['cat'];

        $product_act = CatalogProducts::select('catalog_products.product_id')
            ->where('catalog_id', $catalog1)
            ->whereNotNull('product_id')
            ->get()->toArray();

        $results = CatalogProducts::select('catalog_products.*')
            ->where('catalog_id', $catalog)
            ->whereNotin('catalog_products.id',$product_act)
            ->with('Catalogo')
            ->with('Categoria');


        return Datatables::of($results)
            ->addColumn('image', function ($model) use ($group, $page) {
                $image = $model->image == '' || empty($model->image)
                    ? '/support/pictures/config/prod000000.png'
                    : PATH_IMAGE . str_pad($model->catalog_id, 4, "0", STR_PAD_LEFT) . '/' . str_pad($model->category_id, 3, "0", STR_PAD_LEFT) . '/' . $model->image;

                return '<img height="50px" width="50px" src="' . $image . '"/>';
            })
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return cheackboxagregarproductos($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    public function ajax(Request $request, $page, $group){
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        $id = Input::get("id");
        $supplier = Input::get("supplier");
        $saleprice = Input::get("saleprice");
        $quantity = Input::get("quantity");
        $catalog = Input::get("catalog");
        $master = Input::get("master");

        switch($type){
            case 'selectProduct':
                $result->data = $this->selectProduct($id);
                $result->success = true;
                return json_encode($result);
                break;

            case 'saveProduct':
                $result->data = $this->saveProduct($id, $supplier, $saleprice, $quantity, $catalog, $master);
                $result->success = true;
                return json_encode($result);
                break;
        }

    }

    public function selectProduct($id){
        $product = CatalogProducts::find($id);
        return $product;
    }

    public function saveProduct($id, $supplier, $saleprice, $quantity, $catalog, $master){

        DB::beginTransaction();

        try {
            $product = CatalogProducts::find($id);
            $image = 'CAT' . $catalog . $id . '.png';

            $productNewCatalog = new CatalogProducts();
            $productNewCatalog->catalog_id = $catalog;
            $productNewCatalog->name = $product->name;
            $productNewCatalog->product_id = $product->id;
            $productNewCatalog->category_id = $product->category_id;
            $productNewCatalog->supplier_id = $supplier;
            $productNewCatalog->salesunit_id = $product->salesunit_id;
            $productNewCatalog->purchaseprice = $product->purchaseprice;
            $productNewCatalog->saleprice = $saleprice;
            $productNewCatalog->inventory_control = 1;
            $productNewCatalog->barcode = $product->barcode;
            $productNewCatalog->products_taxe_id = $product->products_taxe_id;
            $productNewCatalog->image = $image;
            $productNewCatalog->image_temporary = $product->image_temporary;
            $productNewCatalog->status = $product->status;
            $productNewCatalog->idpartner = $product->idpartner;
            $productNewCatalog->taxonomy = $product->taxonomy;
            $productNewCatalog->save();

            $this->copyImage($id, $master, $product->category_id, $product->image, $catalog, $productNewCatalog->category_id, $productNewCatalog->image);

            $company = Company::where('admon_id', auth()->user()->id)->first();

            $inventory = new Inventory();
            $inventory->contract_id = auth()->user()->contract_id;
            $inventory->company_id = !empty($company) ? $company->id : null;
            $inventory->catalog_id = $productNewCatalog->catalog_id;
            $inventory->product_id = $productNewCatalog->id;
            $inventory->saleprice = $productNewCatalog->saleprice;
            $inventory->average_cost = $productNewCatalog->purchaseprice;
            $inventory->availablequantity = $quantity;
            $inventory->status = 1;
            $inventory->save();

            $details = new InventoryDetails();
            $details->inventory_id = $inventory->id;
            $details->type_operation = 'INVENTARIO INICIAL';
            $details->quantity = $inventory->availablequantity;
            $details->unit_value = $productNewCatalog->saleprice;
            $details->total_value = $productNewCatalog->saleprice * $productNewCatalog->availablequantity;
            $details->gross_margin = 0;
            $details->save();

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e);
        }

        return $productNewCatalog;
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

}

