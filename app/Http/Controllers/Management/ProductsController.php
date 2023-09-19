<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use \App\Models\Management\Product;
use \App\Models\Management\Manufacturer;
use \App\Models\Management\Lists;
use \App\Models\Management\ProductsPictures;
const UNIDADES_VENTA = 53;
const path_image = "/support/pictures/products/";

class ProductsController extends Controller
{

    public $manufacturers = '';
    public $salesunits = '';

    public function __construct()
    {
        $this->middleware('auth');

        $this->manufacturers = Manufacturer::orderBy('order', 'asc')->get();
        $this->salesunits = Lists::where('idowner', '=', UNIDADES_VENTA)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();
        $this->categories = Category::where('contract_id', '=', auth()->user()->contract_id)
            ->where('status', '=', 1)->get();

    }

    public function index($group, $page, $order = "", $dir = "")
    {

        //dd($path);
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'manufacturers' => $this->manufacturers,
            'salesunits' => $this->salesunits,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => path_image,
            'image' => 'prod000000.png',
            'categories' => $this->categories,
            'excelFile'=>false
        ]);

    }

    public function viewlist($group, $page)
    {

        //$queryColumns = array('id', 'name', 'shortname', 'proveedor_id', 'purchaseprice', 'saleprice', 'status');
        $results = Product::select('products.*')
            ->join('manufacturers as fabricante', 'fabricante.id', '=', 'products.manufacturer_id')
            ->join('lists as sales_unit', 'sales_unit.id', '=', 'products.salesunit_id')
            ->with('Fabricante')
            ->with('SalesUnit');

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $productEdit = Product::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'manufacturers' => $this->manufacturers,
            'salesunits' => $this->salesunits,
            'perEdit' => $perEdit,
            'productEdit' => $productEdit,
            'path' => path_image,
            'image' => 'prod000000.png',
            'categories' => $this->categories,
            'excelFile'=>false,
        ]);
    }

    public function save(Request $request, $group, $page)
    {

        // get request fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'shortname' => 'required',
            'manufacturer' => 'required',
            'barcode' => 'required|unique:products,barcode,'.$request->productId,
            'purchaseprice' => 'required',
            'saleprice' => 'required',
            'category' => 'required',
            'image_file' => 'required_without_all:excelFile,productId|mimes:png',
        ]);


        if ($validator->fails()) {
            if ($request->productId > 0) {
                return redirect(strtolower($group . '/' . $page) . '/edit/' . $request->productId)->withInput()->withErrors($validator);
            } else {
                return redirect(strtolower($group . '/' . $page))->withInput()->withErrors($validator);
            }
        }

        try {

            if ($request->productId > 0) {
                $producto = Product::where('id', '=', $request->productId)
                    ->with('Pictures')
                    ->first();
                $id_producto_image = $producto->products_picture_id;
            } else {
                $producto = new Product();
                $id_producto_image = 1;
            }

            $producto->name = $request->name;
            $producto->shortname = $request->shortname;
            $producto->manufacturer_id = $request->manufacturer;
            $producto->order = $request->order;
            $producto->barcode = $request->barcode;
            $producto->salesunit_id = $request->salesunit;
            $producto->purchaseprice = $request->purchaseprice;
            $producto->saleprice = $request->saleprice;

            if (!empty($request->products_taxe))
                $producto->products_taxe_id = $request->products_taxe_id;
            else
                $producto->products_taxe_id = 1;

            $producto->products_picture_id = $id_producto_image;
            $producto->localtaxonomy = $request->localtaxonomy;
            $producto->status = $request->status;
            $producto->category_id = $request->category;
            $producto->save();


            if (isset($request->excelFile)) {
                return true;
            }

            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $image_path = 'prod' . str_pad($producto->id, 6, "0", STR_PAD_LEFT) . '.png';
                if (file_exists(public_path() . path_image . $image_path)) {
                    unlink(public_path() . path_image . $image_path);
                }
                $image->move(public_path() . path_image, $image_path);

                if (!($request->productId > 0)) {
                    $product_image = new ProductsPictures();
                    $product_image->name = $image_path;
                    $product_image->status = 1;
                    $product_image->save();
                    $producto->products_picture_id = $product_image->id;
                    $producto->save();
                }

            }
        } catch (Exception $e) {

            return redirect(strtolower($group . '/' . $page))->with('errors', array(__("User can't be saved. Please review data and try again later")));

        }

        return redirect(strtolower($group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
        try {
            Product::where('id', '=', $id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }
}
