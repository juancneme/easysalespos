<?php
namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;

class FormulationOrdersProductsController extends Controller
{

    
    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
       
        $inputs=Input::all();
        $pedido = $inputs['id'];
       // $numero = Transactions::select('name')->where('id', "=", $catalog)->get()[0]->name;
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'pedido' => $pedido,
            
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }
    public function viewlist($group, $page) {
       
        $inputs=Input::all();
        $pedido = $inputs['id'];
  
        $results = TransactionsDetails::select('transactions_details.*',DB::raw('sum(transactions_details.quantity) as totalpro'))
                ->join('catalog_products as orderpro' , 'orderpro.id' , '=' , 'transactions_details.catalog_product_id')
                ->with('Orderpro')
                ->where('transaction_id', '=', $pedido)
                ->groupBy('catalog_product_id');

        return Datatables::of($results)
                        ->addColumn('estado', function ($model){
                            return $model->status == 1 ? __('Active') : __('Inactive');
                        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }


    

}
