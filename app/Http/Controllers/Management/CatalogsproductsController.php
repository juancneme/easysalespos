<?php

namespace App\Http\Controllers\Management;

use App\Enums\ImagesPathEnum;
use App\Enums\PermissionsEnum;
use App\Enums\StatusEnum;
use App\Models\Management\Inventory;
use App\Models\Management\ProductsTaxes;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Product;
use \App\Models\Management\Catalog;
use \App\Models\Management\Contract;
use \App\Models\Management\Category;

use \App\Models\Management\Supplier;
use \App\Models\Management\Lists;
use \App\Models\Management\CatalogProducts;
use \App\Models\Management\TransactionsDetails;
use \App\Helpers\Directory;
use App\Helpers\Image;
use Illuminate\Support\Facades\Log;

const PATH_IMAGE = "/support/pictures/productscatalogs/";
const PATH_FTP = "/ftp_images/";
const UNIDADES_VENTA = 53;

class CatalogsProductsController extends Controller
{
    public $categories = '';
    public $products = '';
    public $suppliers = '';
    public $salesunits = '';

    public function __construct()
    {
        $this->middleware('auth');

        Log::useDailyFiles(storage_path() . '/logs/catalogsProducts.log');

        $this->categories = Category::where('contract_id', '=', 1)
            ->orderBy('name', 'asc')->get();

        $this->suppliers = Supplier::orderBy('name', 'asc')->get();
        $this->salesunits = Lists::where('idowner', '=', UNIDADES_VENTA)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->taxes = ProductsTaxes::all();
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        $inputs = Input::all();

        $catalog = $inputs['id'];
        $namecatalog = Catalog::select('name')->where('id', "=", $catalog)->get();

        $existproducts = CatalogProducts::where('catalog_id', $catalog)->count();

        $pathImage = '/support/pictures/products/prod000000.png';

        $type = Catalog::where('id', $catalog)->value('typecatalog_id');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => empty($namecatalog[0]->name) ? '' : $namecatalog[0]->name,
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
            'defaultPath' => $pathImage,
            'taxes' => $this->taxes
        ]);
    }

    public function viewlist($group, $page)
    {

        $inputs = Input::all();
        $catalog = $inputs['id'];

        $results = CatalogProducts::select('catalog_products.*')
            ->where('catalog_id', '=', $catalog)
            ->with('Catalogo')
            ->with('Producto')
            ->with('Categoria')
            ->orderBy('name');


        return Datatables::of($results)
            ->addColumn('categoria', function ($model) {
                return $model->categoria ? $model->categoria->name : ' ';
            })->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })->addColumn('image', function ($model) use ($group, $page) {
                $image = empty($model->image) || !file_exists(public_path(ImagesPathEnum::PATH_PRODUCTS.str_pad($model->catalog_id, 4, "0", STR_PAD_LEFT) . '/' . str_pad($model->category_id, 3, "0", STR_PAD_LEFT) . '/'. $model->image )) 
                            ? ImagesPathEnum::PATH_DEFAULT_CATEGORY . 'cate000000.png'
                            : ImagesPathEnum::PATH_PRODUCTS.str_pad($model->catalog_id, 4, "0", STR_PAD_LEFT) . '/' . str_pad($model->category_id, 3, "0", STR_PAD_LEFT) . '/'. $model->image;


                return '<img height="50px" width="50px" src="' . $image . '"/>';
            })->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {
        $catalogproductEdit = CatalogProducts::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        $namecatalog = Catalog::select('name')->where('id', "=", $catalogproductEdit->catalog_id)->get()[0]->name;

        $filepath = $this->getProductImage($catalogproductEdit);

        $this->products = Product::where('id', '=', $catalogproductEdit->product_id)->get();
        $image = $catalogproductEdit->image == '' 
                    || empty($catalogproductEdit->image) 
                    || !file_exists(public_path(). PATH_IMAGE . str_pad($catalogproductEdit->catalog_id, 4, "0", STR_PAD_LEFT) . '/' . str_pad($catalogproductEdit->category_id, 3, "0", STR_PAD_LEFT) . '/' . $catalogproductEdit->image)
                        ? '/support/pictures/config/cate000000.png'
                        : PATH_IMAGE . str_pad($catalogproductEdit->catalog_id, 4, "0", STR_PAD_LEFT) . '/' . str_pad($catalogproductEdit->category_id, 3, "0", STR_PAD_LEFT) . '/' . $catalogproductEdit->image;

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
            'catalogproductEdit' => $catalogproductEdit,
            'path' => $image,
            'existproducts' => false,
            'defaultPath' => $image,
            'taxes' => $this->taxes
        ]);
    }

    public function save($request, $group, $page)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'purchaseprice' => 'required',
            'saleprice' => 'required|numeric',
            'purchaseprice' => 'required|numeric',
            'image_file' => 'mimes:png'
        ]);
        if ($validator->fails()) {
            return $request->excel
                ? $validator->errors()
                : redirectType($validator->errors(), 'errors', true);
        }

        try {
            if (!$request->excel) DB::beginTransaction();

            $catalogProduct = isset($request->catalogproductId)
                ? CatalogProducts::find($request->catalogproductId)
                : new CatalogProducts();

            $count = CatalogProducts::where('catalog_id', Input::get('catalog'))->count();

            if($request->has('products_taxe_id')){
                $request->taxe = $request->products_taxe_id;
            }

            $catalogProduct->catalog_id = Input::get('catalog');
            $catalogProduct->name = $request->name;
            $catalogProduct->category_id = $request->category_id;
            $catalogProduct->supplier_id = 1;
            $catalogProduct->salesunit_id = $request->salesunit_id;
            $catalogProduct->volume = $request->volume;
            $catalogProduct->saleprice = $request->saleprice;
            $catalogProduct->purchaseprice = $request->purchaseprice;
            $catalogProduct->products_taxe_id = $request->taxe;
            $catalogProduct->image = $request->image_file ?? $request->image;
            $catalogProduct->barcode = $request->barcode;
            $catalogProduct->taxonomy = 0;
            $catalogProduct->image_temporary = $request->sequence ?? ' ';
            $catalogProduct->status = $request->status;
            $catalogProduct->save();
            

            if (!$request->excel) {
                if (!empty($request->file('image_file'))) {
                    $this->uploadImage(
                        $request->image,
                        $catalogProduct->category_id,
                        $catalogProduct->catalog_id,
                        $request->file('image_file'),
                        $catalogProduct->id,
                        $request->file('image_file')->getClientOriginalExtension(),
                        $count
                    );
                }
            }
            if (!$request->excel) DB::commit();
        } catch (\Exception $e) {
            if($request->excel){
                return $e->getPrevious()->getMessage();
            }
            
            DB::rollback();
            //redirectType($e->getMessage(), 'errors');
            return redirect(strtolower('/' . $group . '/' . $page . '?id=' . Input::get('catalog')))->with('errors', array(__('Error')));
        }
        return $request->excel
            ? 'true'
            : redirect(strtolower('/' . $group . '/' . $page . '?id=' . Input::get('catalog')))->with('success', __('Saved successfuly'));
    }

    public function ajax(Request $request, $page, $group)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'selectProduct':
                $result->data = $this->selectProduct($group, $page, Input::get("id"));
                $result->success = true;
                break;
        }

        return json_encode($result);
    }

    public function selectProduct($group, $page, $id)
    {

        $product = Product::where('id', '=', $id)
            ->with('SalesUnit')
            ->with('Pictures')
            ->get();
        return $product;
    }

    public function delete($group, $page, $id)
    {
        $res = TransactionsDetails::where('catalog_product_id', '=', $id)->first();
        if (!$res) {
            try {
                $prodcat = CatalogProducts::find($id);
                $catalog = $prodcat->catalog_id;
                $prodcat->delete();
                return back()->with('success', __('Deleted successfuly'));
            } catch (\Throwable $th) {
                return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
            }
        } else {
            return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }

    /**
     * Funcion para clonar desde un catalogo master
     *
     * @param Request $request
     * @param $group
     * @param $page
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cloneCatalog(Request $request, $group, $page)
    {
        try {
            $catalogMaster = CatalogProducts::where('catalog_id', $request->catalogId)->get();

            foreach ($catalogMaster as $key => $value) {

                $catproduct = new CatalogProducts();
                $catproduct->catalog_id = $request->catalogSelect;
                $catproduct->product_id = $value->product_id;
                $catproduct->name = $value->name;
                $catproduct->category_id = $value->category_id;
                $catproduct->supplier_id = $value->supplier_id;
                $catproduct->salesunit_id = $value->salesunit_id;
                $catproduct->purchaseprice = $value->purchaseprice;
                $catproduct->saleprice = $value->saleprice;
                $catproduct->barcode = $value->barcode;
                $catproduct->products_taxe_id = $value->products_taxe_id;
                $catproduct->image = renameImage($catproduct->catalog_id, 'png');
                $catproduct->image_temporary = $value->image_temporary;
                $catproduct->status = $value->status;
                $catproduct->save();

                $path_destino  = PATH_IMAGE  . $request->catalogSelect . '/' . str_pad(strval($value->category_id), 3, "0", STR_PAD_LEFT);

                if (!file_exists(public_path($path_destino))) mkdir(public_path($path_destino), 0777, true);
                $path_cat  = PATH_IMAGE . $request->catalogId . '/' . str_pad($value->category_id, 3, "0", STR_PAD_LEFT) . '/' . $value->image;

                if(file_exists(public_path() . $path_cat)){
                    if (!file_exists(public_path($path_destino) . '/' . $value->image)){
                        \File::copy(public_path() . $path_cat, public_path($path_destino) . '/' . $value->image);
                        $origin = public_path($path_destino) . '/' . $value->image;
                        $source = public_path($path_destino) . '/' . $catproduct->image; 
                        rename($origin,$source);
                    }
                }
                
                    
            }
            return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $request->catalogSelect)->with('success', __('Saved successfuly'));
        } catch (\Exception $e) {
            dd($e);
            return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $request->catalogSelect)->with('errors', array(__("The record can´t be saved. Please review data and try again later")));
        }
    }


    /**
     * Funcion que se trae las imagenes
     *
     * @param $catalogProduct
     * @return string
     */
    public function getProductImage($catalogProduct)
    {
        $path = '/support/pictures/products/' . $catalogProduct->catalog_id . '/';
        $file = str_pad($catalogProduct->category_id, 3, "0", STR_PAD_LEFT) . '/' . $catalogProduct->image;

        $filepath = $path . $file;

        $exists = file_exists(public_path($filepath));

        if (!$exists) $filepath = PATH_IMAGE . '/products/' . $catalogProduct->image;

        return $filepath;
    }

    /**
     * Funcion para eliminar todos los productos de un catalogo nuevo
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAllProducts($group, $page, $id)
    {
        try {
            $catalogProducts = CatalogProducts::where('catalog_id', $id)->get();

            foreach ($catalogProducts as $value) {
                $value->delete();
            }
            $path_ftp  = PATH_FTP . str_pad($id, 3, "0", STR_PAD_LEFT);
            $path_productsCata  = PATH_IMAGE . str_pad($id, 3, "0", STR_PAD_LEFT);
            \File::deleteDirectory(public_path() . $path_ftp);
            \File::deleteDirectory(public_path() . $path_productsCata);
            return back()->with('success', __("Deleted successfuly"));
        } catch (\Exception $e) {
            return back()->with('infos', __("Deleted unsuccessfuly foreign keys"));
        }
    }

    public function uploadImage($nameImage,$category, $catalog, $image, $id, $ext, $count)
    {
        if (!empty($image)) {
            $directory = ImagesPathEnum::PATH_PRODUCTS
                . Input::get('catalog')
                . '/'
                . str_pad($category, 3, "0", STR_PAD_LEFT);

            $imageName = renameImage($catalog, $ext, $count);

            $catalogProduct = CatalogProducts::find($id);
            $catalogProduct->image = empty($nameImage) ? $imageName : $nameImage;
            $catalogProduct->update();

            $image->move(public_path($directory), empty($nameImage) ? $imageName : $nameImage);
        }
    }
}
