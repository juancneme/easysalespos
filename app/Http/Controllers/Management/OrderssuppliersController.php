<?php

namespace App\Http\Controllers\Management;


use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Courier;
use App\Models\Management\TransactionsPaymentmethods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use DB;

use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

const PEDIDO_LIST = 62;
const PEDIDO_PROVEEDOR = 64;
const APROVE = 117;
const EFECTIVO = 92;
const EN_ALISTAMIENTO = 78;

class OrdersSuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->companies = CompaniesUsers::where('user_id', auth()->user()->id)->value('company_id');
    }

    public function index($group, $page, $order = "", $dir = "")
    {

        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Transactions::where('typeoperation_id', '=', PEDIDO_PROVEEDOR)
            ->with('User')
            ->with('Comercio')
            ->with('Proveedor')
            ->with('Estado')
            ->orderByRaw('created_at DESC');

        if (!auth()->user()->hasRole('admin')) {
            $results->where('contract_id', '=', auth()->user()->contract_id);
        }

        //consulta para colocar disable el boton de modificar porductos y proveedores.

        $obj = new \stdClass();
        $obj->link = '<a href="/management/orderssuppliersproducts?id={{ $model->id }}" class="btn btn-success" data-placement="top" data-toggle="tooltip" title="' . __('See Products') . '">
                            <i class="fa fa-list"></i>
                    </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj1 = new \stdClass();
        // $obj1->link ='<a href="/management/orderssuppliers/download?id={{ $model->id }}&verodescargarpdf=1"
        //                  class="btn btn-dark" data-placement="top" data-toggle="tooltip" title="' . __('send to supplier') . '"
        //                  style="margin-right:6px; margin-bottom:3px; width:36px;height:36px"
        //                  >
        //                  <i class="fa fa-opencart"></i>
        //               </a>';
        $obj1->link = '
                      <button href="/management/orderssuppliers/download?id={{ $model->id }}&verodescargarpdf=1"
                          class="btn btn-primary btn-certifica" data-placement="top"
                          data-toggle="tooltip"
                          style="width:36px;height:36px;margin-right:2px;"
                          title="' . __('send to supplier') . '">
                          <i class="fa fa-opencart"></i>
                      </button>
                   ';
        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        $obj2 = new \stdClass();
        $obj2->link = '<a href="/management/orderssuppliers/download?id={{ $model->id }}&verodescargarpdf=2" 
                         class="btn btn-primary" data-placement="top" data-toggle="tooltip" title="' . __('Download PDF') . '"
                         style="margin-right:6px; margin-bottom:3px; width:36px;height:36px"
                         >
                         <i class="fa fa-file-pdf-o"></i>
                      </a>';
        $obj2->vars = array();
        $obj2->vars[] = array();
        $obj2->vars[0]['name'] = 'model->id';
        $obj2->vars[0]['value'] = 'id';

        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListFormularionPedio($model->id, $group, $page, $buttons, $model);
            })
            ->escapeColumns(['action'])->make(true);
    }

    public function download(Request $request, $group, $page)
    {

        $validacion = $request->verodescargarpdf;
        switch ($validacion) {
            case '1':
                $idTabla = $request->idtp;
                $cambiarEstado = Transactions::find($idTabla);
                $cambiarEstado->status = '77';
                $cambiarEstado->update();
                return back()->with('success', __('The order was sent to the supplier'));
                break;
            case '2':
                $id = $request->idtp;

                $sale = Transactions::where('id', $id)
                    ->with('Cliente')
                    ->with('User')
                    ->with('typeOperation')->first();

                $details = TransactionsDetails::where('transaction_id', $id)->get();

                $payments = TransactionsPaymentmethods::where('transaction_id', $id)
                    ->with('formaPago')->get();

                $payItems = TransactionsPaymentmethods::where('transaction_id', '=', $id)->get()->count();

                $numventa = Transactions::select('id')->where('id', $id)->get();

                $company = Company::where('id', $this->companies)->first();

                $img = $this->getContractImage(auth()->user()->contract_id);

                $contract = Contract::where('id', auth()->user()->contract_id)
                    ->with('Persona')->first();

                $pdf = \PDF::loadView('pdf.order', ['sale' => $sale, 'details' => $details, 'payments' => $payments,
                    'payItems' => $payItems, 'company' => $company, 'img' => $img, 'contract' => $contract])
                    ->setPaper('A5', 'portrait');

                return $pdf->stream('venta-' . $numventa[0]->num_comprobante . '.pdf');
                break;
            default:
                # code...
                break;
        }

    }

    public function delete($group, $page, $id)
    {
        //Validar estados para ver si es posible borrar el pedido

        try {
            $consulta = Transactions::where('id', '=', $id)->where('status', '=', '77')->exists();


            if ($consulta == true) {
                return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
            } else {
                TransactionsDetails::where('transaction_id', '=', $id)->delete();
                Transactions::where('id', '=', $id)->delete();
                return back()->with('success', __('The order was confirmed'));
            }


        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
    }

    public function confirmOrder(Request $request, $group, $page)
    {

        try {

            $id = $request->idtp;
            $transactionDetail = Transactions::find($id);
            $payload =
                [
                    'transaction_id' => $id,
                    'status' => 1,
                    'start_date' => date("Y/m/d h:i:s"),
                    'courier_id' => Courier::where('status', 1)->first(),
                    'contract_id' =>$transactionDetail->contract_id,
                    'company_id' => $transactionDetail->company_id,
                    'companycourier_id'=>null,
                    'tercero_id'=>null,
                    'address_id'=>null
                ];

            $request = new Request($payload);
            (new DeliveriesController)->store($request);

            return back()->with('success', array(__('Confirmed successfuly')));

        } catch (\Exception $exception) {
            dd($exception);
            return back()->with('infos', array(__('Error, please comunicated with Administrator')));
        }
    }

    public function transactionOrder(Request $request)
    {

        try {

            $amount = TransactionsDetails::select('total_value')
                ->where('transaction_id', '=', $request->id)
                ->sum('total_value');

            Transactions::where('id', $request->id)
                ->update(['paid_value' => $amount, 'status' => EN_ALISTAMIENTO]);

            $pago = new TransactionsPaymentmethods;
            $pago->transaction_id = $request->id;
            $pago->paymentmethods_id = EFECTIVO;
            $pago->amount = $amount;
            $pago->status = APROVE;
            $pago->save();

            return (new PdviController)->download($request, '', '');


        } catch (\Exception $exception) {
            return back()->with('infos', array(__('Error, please comunicated with Administrator')));
        }
    }

    public function getContractImage($contract)
    {

        $path = '/support/pictures/partners/' . str_pad($contract, 3, "0", STR_PAD_LEFT);
        $file = '/logo000001.png';
        $filepath = $path . $file;

        $exists = file_exists(public_path($filepath));

        if (!$exists) $filepath = '/support/pictures/partners/001' . $file;

        return $filepath;
    }

}
