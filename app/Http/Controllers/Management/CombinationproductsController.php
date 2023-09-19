<?php
namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use App\Models\Management\CombinationProducts;

class CombinationproductsController extends Controller
{

    
    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
       
        $inputs=Input::all();
        $comboid = $inputs['id'];
       // $numero = Transactions::select('name')->where('id', "=", $catalog)->get()[0]->name;
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'comboid' => $comboid,    
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }
    public function viewlist($group, $page) {
       
        $inputs=Input::all();
        $comboid = $inputs['id'];
        $buttons = array();

  
        $results = CombinationProducts::select('catalog_products.name as name','combination_products.quantity as quantity')
        ->join('catalog_products','combination_products.product_id','catalog_products.id')
        ->where('combination_id',$comboid)
        ->orderBy('combination_products.id','asc');

       
        return Datatables::of($results)
                        
        ->addColumn('estado', function ($model){
            return $model->status == 1 ? __('Active') : __('Inactive');
        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page, array(), $model,true,false);
                        })->escapeColumns(['action'])->make(true);
    }

    public function delete($group, $page, $id) {
        $res = CombinationProducts::where('product_id', '=', $id)->first();
        if (!$res){
            CombinationProducts::findOrFail($id)->delete();
            return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Deleted successfuly'));
        }else{
            return redirect(strtolower('/'.$group.'/'.$page))->with('infos', __('Deleted unsuccessfuly'));
        }
       
    }


    

}
