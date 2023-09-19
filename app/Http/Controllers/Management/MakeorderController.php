<?php
namespace App\Http\Controllers\Management;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Management\Transactions;
use App\Models\Management\Category;
use App\Models\Management\Company;
use Illuminate\Support\Facades\Input;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Supplier;

use Validator;
use Carbon\Carbon;
use App\Models\Management\User;

const PEDIDO_LIST = 62;
const REALIZAR_PEDIDO = 64;

class MakeOrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');

    }

    public function index($group, $page, $order = "", $dir = "") {

        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        $prueba ="hola mundo desde el controlador" ;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'prueba' => $prueba

        ]);

    }

    public function viewlist($group, $page) {


        $results = Transactions::where('typeoperation_id', '=' ,PEDIDO_LIST )
            ->where('status', '=',72)
                ->with('User')
                ->with('Comercio')
                ->with('Estado')
                ->with('Cliente.person')
                ->orderByRaw('created_at DESC');


        if (!auth()->user()->hasRole('admin')) {
            $results->where('contract_id', '=', auth()->user()->contract_id);
        }

        $obj = new \stdClass();
        $obj->link ='<a href="/management/formulationordersproducts?id={{ $model->id }}" class="btn btn-success" data-placement="top" data-toggle="tooltip" title="' . __('See Products') . '">
                            <i class="fa fa-list"></i>
                    </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)

                        ->addColumn('client', function ($model) {
                            return $model->Cliente->person->fullname .' '. $model->Cliente->person->identification;
                        })
                        ->addColumn('checkbox', function ($model) use ($group, $page,$buttons) {
                            return getListFormCheckBox($model->id,  $page);
                        })
                        ->addColumn('action', function ($model) use ($group, $page,$buttons) {
                            return getListForm($model->id, $group, $page, $buttons, $model, false, false);
                            // return getListFormCheckBox2($model->id, $group, $page, $buttons, $model);
                        })
                        ->escapeColumns(['action'])->make(true);

    }


    public function realizarPedido( $group, $page, Request $request ){

        $validator = Validator::make($request->all(), [
            'checkbox' => 'required',
        ]);

        // validate fields
        if ($validator->fails()) {
            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
        }

        $prueba=count($_POST["checkbox"]);

            foreach ($_POST["checkbox"] as $value) {
                $cambiarEstado = Transactions::findOrFail($value);
                $cambiarEstado->status ="73";
                $cambiarEstado->update();

            }

                $datos = Transactions::where('id', '=', $value)->get();
                    $consultica = DB::table('transactions')
                    ->select('transactions.*','transactions.typeoperation_id','s.id as idproveedor','td.catalog_product_id as numeroCata','cp.supplier_id as numeroProveedorCata','s.id as idProve','cp.name as nombreproducto','td.iva_value as valoriva','td.total_value as valortotal','td.*',DB::raw('COUNT(td.catalog_product_id) as totalpro'),DB::raw('sum(td.total_value) as totalsuma'))
                    ->join('transactions_details as td','td.transaction_id' ,'=','transactions.id')
                    ->join('catalog_products as cp' ,'cp.id', '=' , 'td.catalog_product_id')
                    ->join('suppliers as s' , 's.id','=' , 'cp.supplier_id')

                    ->where('transactions.typeoperation_id','=', PEDIDO_LIST )
                    ->where('transactions.status','=','73')
                    // ->where('transactions.id','=',$value)
                    ->where('transactions.contract_id', '=', auth()->user()->contract_id)
                    ->groupBy('s.id')->get();

                //    var_dump($consultica);
                   //
                    foreach($consultica as $tabaltransa){

                        $venta = new Transactions();

                        $venta->typeoperation_id=REALIZAR_PEDIDO;


                        $venta->contract_id=$tabaltransa->contract_id;
                        $venta->catalog_id=$tabaltransa->catalog_id;
                        $venta->company_id=$tabaltransa->company_id;
                        $venta->supplier_id=$tabaltransa->idproveedor;
                        $venta->client_id=$tabaltransa->client_id;
                        $venta->user_id=auth()->user()->id;
                        $mytime=Carbon::now('America/Bogota');
                        $venta->operation_date=$mytime->toDateTimeString();
                        $venta->support_document=$tabaltransa->support_document;
                        $venta->invoice_number=$tabaltransa->invoice_number;
                        $venta->total_value=$tabaltransa->totalsuma;
                        $venta->iva_value=$tabaltransa->iva_value;
                        $venta->status="76";
                        $venta->save();

                        //aca son los prodcutos
                        $items = DB::table('transactions_details')
                        ->select('cp.supplier_id  as b','cp.name','t.id','transactions_details.*',DB::raw('sum(transactions_details.quantity) as quantitytot'),DB::raw('sum(transactions_details.total_value) as totalValor'))
                        ->join('transactions  as t','t.id' ,'=','transactions_details.transaction_id')
                        ->join('catalog_products as cp' ,'cp.id', '=' , 'transactions_details.catalog_product_id')
                        ->where('cp.supplier_id','=', $venta->supplier_id )
                        ->where('t.typeoperation_id','=', PEDIDO_LIST )
                        ->where('t.status','=','73')
                        ->where('t.contract_id', '=', auth()->user()->contract_id)
                        ->groupBy('transactions_details.catalog_product_id')->get();


                        foreach($items as $item){
                            // var_dump($item->b);

                            $detalle = new TransactionsDetails();
                            $detalle->transaction_id=$venta->id;
                            $detalle->catalog_product_id=$item->catalog_product_id;
                            $detalle->quantity=$item->quantitytot;
                            $detalle->unit_price=$item->unit_price;
                            $detalle->iva_value=$item->iva_value;
                            $detalle->total_value=$item->totalValor;
                            $detalle->lot_number=$item->lot_number;
                            $mytime=Carbon::now('America/Bogota');
                            $detalle->expiration_date=$mytime->toDateTimeString();
                            $detalle->fabrication_date=$mytime->toDateTimeString();
                            $detalle->status='1';
                            $detalle->save();
                        }


                    }

                        foreach ($_POST["checkbox"] as $value) {
                            $cambiarEstado = Transactions::findOrFail($value);
                            $cambiarEstado->status ="74";
                            $cambiarEstado->update();

                        }



                        return back()->with('success', __('The order has been processed.'));
        }
}
