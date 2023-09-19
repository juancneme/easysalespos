<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\TransactionsPaymentmethods;
use App\Models\Management\ShiftManagements;
use Yajra\Datatables\Facades\Datatables;
// use Illuminate\Support\Facades\Input;
use DB;

// Pendiente revisar
// const IN_PROCESS = 116;
// const APROVED = 117;

// const EFECTUADA = 192;
// const CREDITO_LOCAL = 194;

// const SHIFT_OPEN = 14;
// const SHIFT_CLOSE = 15;
// const SHIFT_BLOCK = 12;

class CreditmanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        $this->cajero = buscar_cajero(auth()->user(), auth()->user()->contract_id, $this->company->id);
        $this->shift = buscar_turno($this->cajero);
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
            'infos' => $infos,

            // 'edit' => URL_EDIT
        ]);
    }

    public function viewlist($group, $page)
    {
        $results = TransactionsPaymentmethods::select('transactions_paymentmethods.*', 'transactions.info_client')
                ->join('transactions', 'transactions.id', 'transactions_paymentmethods.transaction_id')
                ->where('transactions_paymentmethods.paymentmethods_id', 194)
                ->where('transactions_paymentmethods.status', 116)  // 116 en proceso - 117 aprobado
                ->where('transactions.status', 192);
        if (auth()->user()->hasRole('adcontrato'))
            $results->where('transactions.contract_id', auth()->user()->contract_id);
        if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('cajero')) {
            $results->where('transactions.company_id', $this->company->id);
        } else {
            $results->whereIn('transactions.id', []);
        }
        if ($this->shift->typeshift_id == 15) {
            $results->whereIn('transactions.id', []);
        }

        $obj = new \stdClass();
        $obj->link = '<a onClick="recaudarCredito({{ $model->id }})" 
                            data-id="{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Collect Credit') . '"
                            style="color: #00a2e8; font-size: 20px; margin: 3px;"
                            <i class="fa fa-usd" ></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        array_push($buttons, $obj);
        
        return Datatables::of($results)
            ->editColumn('amount', function ($data) {
                return '$ '.number_format($data->amount, 0);
            })
            // ->editColumn('total_value', function ($data) {
            //     return '$ ' . number_format($data->total_value, 2);
            // })
            // ->addColumn('type', function ($model) {
            //     return $model->saletype_id == FISICO ? __('Fisico') : __('Virtual');
            // })
            // ->addColumn('pivot', function ($model) {
            //     return $model->status == 2 ? 0 : 1;
            // })
            // ->addColumn('client', function ($model) {
            //     return $model->cliente != null
            //         ? ClientsLogin::where('client_id', $model->cliente->id)->value('email')
            //         : '';
            // })
            //habilitar boton $obj3 al perfil de administrador de tienda
            ->addColumn('status', function ($model) {
                if($model->status == 116)
                    return  __('Pendiente');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })->escapeColumns(['action'])->make(true);
    }

    public function recaudarCredito($group, $page, $id)
    {
        try {
            DB::beginTransaction();

            //actualizar estado de la transaccion a 117 Aprobado
            $recaudo = TransactionsPaymentmethods::where("transactions_paymentmethods.id", $id)
                ->get()->first();
            $recaudo -> status = 117;
            $recaudo->save();

            //Generar registro de balance
            // $pdvicontroller = new PdviController;
            // $pdvicontroller->guardarsaldo(auth()->user()->contract_id, $this->company->id, auth()->user()->id, 18, $recaudo->amount, $recaudo->transaction_id, $this->shift->id, 2);
            guardarsaldo(auth()->user()->contract_id, $this->company->id, auth()->user()->id, 18, $recaudo->amount, $recaudo->transaction_id, $this->shift->id, 2);

            DB::commit();
            return redirect()->back()->with('success', __('Credit Saved successfuly'));

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
            // return $e->getMessage();
        }
    }

}
