<?php

namespace App\Http\Controllers\Management;

use Couchbase\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Catalog;
use DB;
use \App\Models\Management\CatalogProducts;
use Yajra\Datatables\Datatables;
use App\Models\Management\Category;

use Validator;

const PATH_IMAGE = "/support/pictures/productscatalogs/";
const MASTER_SERVICES = 104;


class CatalogsaddController extends Controller
{
    //


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

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => $namecatalog,
            'catalogonuevo' => $catalogonuevo,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos

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


    public function addproducts(Request $request, $group, $page)
    {
        $datos = explode(",", $request->prueba);


        $validator = Validator::make($request->all(), [
            'checkbox' => 'required',
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        //  $tinicial = microtime(true);
        try {
            DB::beginTransaction();

            foreach ($datos as $value) {

                $articulosSeleccionados = CatalogProducts::where('id', '=', $value)->get();


                $productoencatalogonuevo = new CatalogProducts ();

                //for de seleccion productos  de catalogo master

                foreach ($articulosSeleccionados as $produseleccionado) {

                    //ACA
                    $obtenercategoriadelproducto = Category::where('id', '=', $produseleccionado->category_id)->get();

                    if ($obtenercategoriadelproducto[0]->id != $obtenercategoriadelproducto[0]->idowner) {
                        $obtenercategoriadelproducto[0]['hijo'] = true;
                    }
                    if ($obtenercategoriadelproducto[0]['hijo']) {
                        $obtenercategoriaPadre = Category::where('id', '=', $obtenercategoriadelproducto[0]->idowner)->get();
                        $existeCategoriaPadre = Category::where('contract_id', '=', auth()->user()->contract_id)
                            ->where('master_id', '=', $obtenercategoriadelproducto[0]->idowner)
                            ->exists();
                    }


                    $category = Category::where('id', '=', $produseleccionado->category_id)
                        ->first();


                    $categoriaexistente = $category->id;
                    
                    //se agrega el producto a la nueva categoria
                    $productoencatalogonuevo->catalog_id = $request->catalogonuevo;
                    $productoencatalogonuevo->product_id = $produseleccionado->id;
                    $productoencatalogonuevo->name = $produseleccionado->name;
                    $productoencatalogonuevo->category_id = $categoriaexistente;
                    $productoencatalogonuevo->supplier_id = $produseleccionado->supplier_id;
                    $productoencatalogonuevo->salesunit_id = $produseleccionado->salesunit_id;
                    $productoencatalogonuevo->purchaseprice = $produseleccionado->purchaseprice;
                    $productoencatalogonuevo->saleprice = $produseleccionado->saleprice;
                    $productoencatalogonuevo->barcode = $produseleccionado->barcode;
                    $productoencatalogonuevo->products_taxe_id = 1;
                    $productoencatalogonuevo->image = renameImage($request->catalogonuevo, 'png');
                    $productoencatalogonuevo->image_temporary = $produseleccionado->image;
                    $productoencatalogonuevo->status = $produseleccionado->status;
                    $productoencatalogonuevo->idpartner = $produseleccionado->idpartner;
                    $productoencatalogonuevo->save();
                    DB::commit();

                    $typeCatalog = Catalog::where('id', $request->catacontrato)->value('typecatalog_id');

                    if ($typeCatalog != MASTER_SERVICES){

                        $path_destino  = PATH_IMAGE  . $request->catalogonuevo .'/'. str_pad(strval($productoencatalogonuevo->category_id), 3, "0", STR_PAD_LEFT);
                        if (!file_exists(public_path($path_destino))) mkdir(public_path($path_destino), 0777, true);
                        
                        $path_products  = "/support/pictures/productscatalogs/".$produseleccionado->catalog_id.'/'.str_pad(strval($produseleccionado->category_id), 3, "0", STR_PAD_LEFT);
                        $path_cat  = $path_products. '/'.$produseleccionado->image;
                
                        if(file_exists(public_path() . $path_cat)){
                            if(!file_exists(public_path($path_destino).'/'. $productoencatalogonuevo->image)) {
                                \File::copy(public_path() . $path_cat, public_path($path_destino).'/'.$productoencatalogonuevo->image);
                            }
                        }
                    }
                }
                $tfinal = microtime(true);
            }
        } catch (\Exception $e) {

            DB::rollback();
            dd($e);

        }
        DB::commit();
        //  $tiempo = $tfinal - $tinicial;
        //dd($tiempo . "segundos");
        return redirect($group . '/catalogsproducts?id=' . $request->catalogonuevo)->with('success', __('Products have been added to your catalog'));
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

