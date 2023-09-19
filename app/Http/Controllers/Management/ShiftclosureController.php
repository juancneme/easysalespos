<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\ShiftClosureDetail;
use App\Models\Management\ShiftClosure;
use App\Models\Management\ShiftManagements;
use App\Models\Management\Transactions;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\BalancePayments;
use App\Models\Management\Lists;
use Carbon\Carbon;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;
use function foo\func;
use function GuzzleHttp\Promise\all;

const CREDITO = 18;
const DEBITO = 17;
const EFECTIVO = 92;
const TARJ_CREDITO = 93;
const TARJ_DEBITO = 94;
const MERCADO_PAGO = 108;
const SHIFT_OPEN = 14;
const SHIFT_CLOSE = 15;
const EN_ESPERA = 65;

class ShiftclosureController extends Controller
{
    public $today = '';
    public $valuebalance = 0;
    public $denominations = '';

    public function __construct()
    {
        $this->middleware('auth');

        $mytime = Carbon::now('America/Bogota');
        $this->today = $mytime->toDateTimeString();

        $this->denominations = Lists::Where('idowner', 150)
            ->whereRaw('id <> idowner')
            ->get();

        $this->turno = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', '=', 12)
            ->value('id');

        $this->confirmClosure = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', '=', 12)
            ->exists();


        $this->closeTurn = ShiftManagements::where('user_id', auth()->user()->id)
            ->get()->last();

        $this->clousureBase = ShiftClosure::where('turn', $this->turno)
            ->where('record_type', 'base')
            ->count();

        $this->shiftid = ShiftManagements::where('user_id', auth()->user()->id)
            ->get()->last();

        $this->turnoAbierto = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', 14)
            ->value('id');

        $this->sales = Transactions::whereIn('typeoperation_id', [EN_ESPERA])
            ->whereIn('shiftmanagement_id', [$this->turnoAbierto])
            ->orderBy('id', 'desc')
            ->count();
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'today' => $this->today,
            'denominations' => $this->denominations,
            'confirmClosure' => $this->confirmClosure,
            'closeTurn' => $this->closeTurn,
            'clousureBase' => $this->clousureBase,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'shiftid' => $this->shiftid,
            'sales'=> $this->sales
        ]);
    }

    public function viewlist($group, $page)
    {

        $inputs = Input::all();
        $results = Lists::where('idowner', '=', 150)
            ->whereRaw('id <> idowner')
            ->orderBy('name', 'asc')->get();

        $obj = new \stdClass();

        $obj->link = '<button type="submit" onclick="save()" class="btn btn-success" style="..." data-placement="top" data-toggle="tooltip" title="' . __('Save') . '">
                                <i class="fa fa-save"></i> </button>';

        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[0] = $obj;


        return Datatables::of($results)
            ->addColumn('quantity', function ($model) {
                return '<input  type="number" name="quantity" id="quantity' . $model->id . '" style="border:none;background: transparent;" . " class="form-control" value="' . $model->saleprice . '">';
            })
            ->editColumn('amount_payment', function ($model) {
                return '<input   type="number" id="amount_payment' . $model->id . '" name="amount_payment"  style="border:none;background: transparent;text-align: end;"  readonly . " class="form-control" value="0" > ';
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })->escapeColumns(['action'])->make(true);
    }

    public function viewListShifClosure($group, $page)
    {
        $inputs = Input::all();
        if(!empty($this->turno)){
            $results = ShiftClosure::with('paymethods')->where('turn', $this->turno)->get();
            ShiftManagements::where('user_id', auth()->user()->id)
                ->where('typeshift_id', '=', 12)
                ->update(['typeshift_id' => 15]);

        }else{

            $this->turnoCerrado =  ShiftManagements::where('user_id', auth()->user()->id)
                ->where('typeshift_id', '=', 15)
                ->orderby('created_at','DESC')->take(1)
                ->value('id');

            $results = ShiftClosure::with('paymethods')->where('turn', $this->turnoCerrado)->get();
        }



        return Datatables::of($results)
            ->addColumn('quantity', function ($model) {
                return '<input  type="number" name="quantity" id="quantity' . $model->id . '" style="border:none;background: transparent;" . " class="form-control" value="' . $model->saleprice . '">';
            })
            ->editColumn('amount_payment', function ($model) {
                return '<input   type="number" id="amount_payment' . $model->id . '" name="amount_payment"  style="border:none;background: transparent;text-align: end;"  readonly . " class="form-control" value="0" > ';
            })->escapeColumns(['action'])->make(true);
    }

    public function ajax(Request $request, $page, $gruop)
    {

        $type = Input::get('type');
        switch ($type) {
            case 'edit':
                return $this->editAmount($request);

            case 'compareBalance':
                return $this->compareBalance($request, $page, $gruop);

            case 'closeTurn':
                return $this->blockTurn($gruop, $page);

            case 'viewListShifClosure':
                return $this->viewListShifClosure($gruop, $page);

            case 'showShiftClousure':
                return $this->showShiftClousure();

            case 'getClousureBase':
                return $this->getClousureBase($gruop, $page);
        }

    }


    /**
     * @param $request
     * @return float|int
     */
    public function editAmount($request)
    {
        try {
            $code = Lists::where('id', '=', $request->id)
                ->whereRaw('id <> idowner')
                ->orderBy('name', 'asc')->value('code');


            $result = empty($request->quantity)   ? $code * 0 : $code * $request->quantity;

            return $result;

        } catch (\Exception $e) {

            return false;
        }

    }

    /**
     * @param Request $request
     * @param $group
     * @param $page
     */
    public function compareBalance(Request $request, $group, $page)
    {
        try {

            if(empty($this->turno)){
                $this->turno =  ShiftManagements::where('user_id', auth()->user()->id)
                    ->where('typeshift_id', '=', 15)
                    ->orderby('created_at','DESC')->take(1)
                    ->value('id');
            }

            $creditos = BalancePayments::where('balance_payments.contract_id', auth()->user()->contract_id)
                ->where('balance_payments.user_id', auth()->user()->id)
                ->where('typepayment_id', CREDITO)
                ->where('shiftmanagement_id', '=', $this->turno)
                ->sum('amount_payment');

            $debitos = BalancePayments::where('balance_payments.contract_id', auth()->user()->contract_id)
                ->where('balance_payments.user_id', auth()->user()->id)
                ->where('typepayment_id', DEBITO)
                ->where('shiftmanagement_id', '=', $this->turno)
                ->sum('amount_payment');

            $paymentsales = DB::select("SELECT 92 AS id,'Efectivo' AS name, 0 AS count, sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)) AS amount
                FROM balance_payments
                WHERE balance_payments.shiftmanagement_id = " . $this->turno . "
                union
                SELECT transactions_paymentmethods.paymentmethods_id AS id, lists.name AS name, COUNT(*) as count, SUM(transactions_paymentmethods.amount) AS value FROM transactions_paymentmethods
                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                WHERE transactions.shiftmanagement_id = " . $this->turno . "
                AND transactions_paymentmethods.paymentmethods_id != 92
                GROUP BY transactions_paymentmethods.paymentmethods_id, lists.name
                union
                SELECT 'TOTALES' AS id, 'TOTAL CAJA' AS NAME, 0 AS COUNT, (
                (SELECT sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                    sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0))
                    FROM balance_payments
                WHERE balance_payments.shiftmanagement_id = " . $this->turno . ")
                +
                (SELECT SUM(transactions_paymentmethods.amount) FROM transactions_paymentmethods
                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                WHERE transactions.shiftmanagement_id = " . $this->turno . "
                AND transactions_paymentmethods.paymentmethods_id != 92
                )) AS vaLUE");

            $mountCredito = DB::select("SELECT  COUNT(*) AS total FROM transactions_paymentmethods
                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                 WHERE transactions.user_id = " . auth()->user()->id . "
                 AND paymentmethods_id =" . TARJ_CREDITO . "
                 AND transactions.shiftmanagement_id =" . $this->turno . "
            ");

            $mountDebito = DB::select("SELECT  COUNT(*) AS total FROM transactions_paymentmethods
                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                 WHERE transactions.user_id = " . auth()->user()->id . "
                 AND paymentmethods_id =" . TARJ_DEBITO . "
                AND transactions.shiftmanagement_id =" . $this->turno . "
            ");

            $mountMercadoPago = DB::select("SELECT  COUNT(*) AS total FROM transactions_paymentmethods
                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                 WHERE transactions.user_id = " . auth()->user()->id . "
                 AND paymentmethods_id =" . MERCADO_PAGO . "
                AND transactions.shiftmanagement_id =" . $this->turno . "
            ");

            $balanceEfectivo = $creditos - $debitos;
            $balaces = [
                'tarjetaCredito' => 0,
                'tarjetaDebito' => 0,
                'mercadoPago' => 0,
                'totalCaja' => 0,
                'totalEfectivo' => $balanceEfectivo,
                'difTarjetaCredito' => 0,
                'difTarjetaDebito' => 0,
                'difMercadoPago' => 0,
                'difTotalCaja' => 0,
                'difTotalEfectivo' => intval($request->total_efectivo) - intval($balanceEfectivo),
                'debito_mount_sistem' => $mountDebito[0]->total,
                'credito_mount_sistem' => $mountCredito[0]->total,
                'mercado_mount_sistem' => $mountMercadoPago[0]->total,

            ];

            $this->turno = ShiftManagements::where('user_id', auth()->user()->id)
                ->where('typeshift_id', '=', 12)
                ->value('id');

            if(empty($this->turno)){
                return $balaces;
            }

            foreach ($paymentsales as $value) {

                switch ($value->id) {
                    case MERCADO_PAGO:
                        $balaces['mercadoPago'] = $value->amount;
                        $balaces['difMercadoPago'] = intval($request->mercado_pago) - intval($value->amount);
                        $this->save($request, $value, $request->mercado_mount, intval($request->mercado_pago), $mountMercadoPago[0]->total, $value->amount);
                        break;
                    case  TARJ_CREDITO:
                        $balaces['tarjetaCredito'] = $value->amount;
                        $balaces['difTarjetaCredito'] = intval($request->credito) - intval($value->amount);
                        $this->save($request, $value, $request->credito_mount, intval($request->credito), $mountCredito[0]->total, $value->amount);
                        break;
                    case TARJ_DEBITO:
                        $balaces['tarjetaDebito'] = $value->amount;
                        $balaces['difTarjetaDebito'] = intval($request->debito) - intval($value->amount);
                        $this->save($request, $value, $request->debito_mount, intval($request->debito), $mountDebito[0]->total, $value->amount);
                        break;
                    case 'TOTALES':
                        $balaces['totalCaja'] = $value->amount == null ? 0 : $value->amount;
                        $balaces['difTotalCaja'] = intval($request->total_caja) - intval($value->amount);
                        $this->save($request, $value, 1, intval($request->total_efectivo), 1, intval($balanceEfectivo));
                        break;
                }

            }
            $this->saveDetail($request);
            return $balaces;

        } catch (\Exception $e) {
            return 'false';
        }
    }

    /**
     *
     *
     * @param Request $request
     * @param null $data
     * @param int $inputQuantity
     * @param int $inputValue
     * @param int $systemQuantity
     * @param int $systemValue
     */
    public function save(Request $request, $data = null, $inputQuantity = 0, $inputValue = 0, $systemQuantity = 0, $systemValue = 0)
    {

        try {
            $closure = new ShiftClosure();
            $closure->turn = $this->turno;
            $closure->record_type = $request->recordType;
            $closure->ope_type = "CR"; //TODO
            $closure->medium_payment_type = $data->id == "TOTALES" ? EFECTIVO : $data->id;
            $closure->input_quantity = $inputQuantity;
            $closure->input_value = $inputValue;
            $closure->system_quantity = $systemQuantity;
            $closure->system_value = $systemValue;
            $closure->save();

        } catch (\Exception $e) {
            return 'false';
        }
    }

    /**
     *
     * @param Request $request
     */
    public function saveDetail(Request $request)
    {
        try {

            foreach ($request->denominations as $value) {
                $detailClosure = new ShiftClosureDetail();
                $detailClosure->turn = $this->turno;
                $detailClosure->denomination = $value["name"];
                $detailClosure->amount = $value["quantity"] ? intval($value["quantity"]) : 0;
                $detailClosure->record_type = $request->recordType;
                $detailClosure->save();
            }


        } catch (\Exception $e) {
            return 'false';
        }

    }

    public function closeTurn($group, $page)
    {
        try {
            $errors = (array)session('errors');
            $success = (array)session('success');
            $infos = (array)session('infos');

            return view($group . '/' . 'shiftclosure', [
                'group' => ucwords($group),
                'page' => ucwords('shiftclosure'),
                'today' => $this->today,
                'denominations' => $this->denominations,
                'confirmClosure' => true,
                'confirmModal' => true,
                'closeTurn' => $this->closeTurn,
                'errors' => $errors,
                'success' => $success,
                'infos' => $infos,
                'shiftid' => $this->shiftid,
                'sales'=> $this->sales
            ]);

        } catch (\Exception $e) {
            return 'false';
        }

    }

    public function blockTurn($group, $page)
    {
        try {

            ShiftManagements::where('user_id', auth()->user()->id)
                ->where('typeshift_id', '=', 14)
                ->update(['typeshift_id' => 12]);

        } catch (\Exception $e) {
            return 'false';
        }

    }

    public function showShiftClousure()
    {

        try {
            if(!empty($this->turno)){
                $results = ShiftClosure::with('paymethods')->where('turn', $this->turno)->get();
                ShiftManagements::where('user_id', auth()->user()->id)
                    ->where('typeshift_id', '=', 12)->get();

            }else{
                $this->turnoCerrado =  ShiftManagements::where('user_id', auth()->user()->id)
                    ->where('typeshift_id', '=', 15)
                    ->orderby('created_at','DESC')->take(1)
                    ->value('id');

                $results = ShiftClosure::with('paymethods')->where('turn', $this->turnoCerrado)->get();
            }
            return $results;

        } catch (\Exception $e) {
            return 'false';
        }
    }


    public function getClousureBase($group, $page)
    {

        try {
            if(ShiftClosure::where('turn', $this->turno)->where('record_type', 'AJUSTE')->exists()){
                $base = ShiftClosure::where('turn', $this->turno)
                    ->where('record_type', 'AJUSTE')
                    ->get();

            }else{
                $base = ShiftClosure::where('turn', $this->turno)
                    ->where('record_type', 'base')
                    ->get();
            }

            $detail = ShiftClosureDetail::where('turn', $this->turno)
                ->where('record_type', 'base')
                ->get();

            $balaces = [
                'base' => $base,
                'detail' => $detail,
                'denominations' => $this->denominations
            ];

            return $balaces;

        } catch (\Exception $e) {
            dd($e->getMessage());

        }


    }

}
