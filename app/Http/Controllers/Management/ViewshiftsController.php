<?php

namespace App\Http\Controllers\Management;

use App\Enums\TransactionsStatusEnum;
use App\Enums\TypeOperationEnum;
use App\Helpers\Transaction;
use App\Models\Management\Company;
use App\Models\Management\Deliveries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Lists;
use App\Models\Management\ShiftClosure;
use App\Models\Management\ShiftClosureDetail;
use App\Models\Management\ShiftManagements;
use App\Models\Management\BalancePayments;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\TransactionsPaymentmethods;
use App\Models\Management\RoleUser;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

const ADTIENDA = 6;

class ViewshiftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $openTurn = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', 14)
            ->value('id');

        $this->hasPendingTransaction = Transactions::where('shiftmanagement_id', $openTurn)
            ->whereIn('status', [TransactionsStatusEnum::ON_HOLD,TransactionsStatusEnum::WITHDELI])
            ->where('transactions.seller_id', auth()->user()->id)
            ->whereIn('typeoperation_id', [TypeOperationEnum::SELL])
            ->count();

        $trasnsaccions_id =  Transactions::where('shiftmanagement_id', $openTurn)
            ->where('status',TransactionsStatusEnum::ACTIVE)
            ->where('transactions.seller_id', auth()->user()->id)
            ->whereIn('typeoperation_id', [TypeOperationEnum::SELL])
            ->pluck('id');

        $this->hasDelivery = Deliveries::whereIn('transaction_id',$trasnsaccions_id)
            ->whereNotIn('status',[134,135])
            ->count();

        $this->turno = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', 12)
            ->value('id');

        if (empty($this->turno)) {
            $this->turno = ShiftManagements::first()
                ->where('user_id', auth()->user()->id)
                ->where('typeshift_id', 15)
                ->orderBy('id', 'desc')
                ->value('id');
        }

        $this->turno = empty($this->turno) ? 0 : $this->turno;

        if (Input::get('id'))
            $this->turno = Input::get('id');

        $this->cantBase = ShiftClosure::where('turn', $this->turno)
            ->where('record_type', 'BASE')
            ->count();

        $this->cantAjuste = ShiftClosure::where('turn', $this->turno)
            ->where('record_type', 'AJUSTE')
            ->count();

        $this->typeItem = 'INICIAL';
        if ($this->cantBase > 0) $this->typeItem = 'BASE';
        if ($this->cantAjuste > 0) $this->typeItem = 'AJUSTE';

        $this->shiftid = ShiftManagements::where('user_id', auth()->user()->id)
            ->get()->last();


        $this->confirmClosure = ShiftManagements::where('user_id', auth()->user()->id)
            ->where('typeshift_id', '=', 12)
            ->exists();

        if ($this->typeItem == 'INICIAL') {
            //REGISTROS INICIALES
            $this->itemsFull = DB::select("
                    SELECT '0100092' AS id,'Efectivo' AS name, 0 AS input_amount, 0 AS input_value, 0 AS system_amount, sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                        sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)) AS system_value
                        ,0 AS diff_amount, 0 AS diff_value
                    FROM balance_payments
                    WHERE balance_payments.shiftmanagement_id = " . $this->turno . "
                    AND balance_payments.description_payment != 'Valor cuenta inicial caja'
                    
                    union
                    
                    SELECT CONCAT('02',LPAD(transactions_paymentmethods.paymentmethods_id,5,'0')) AS id, lists.name AS name, 0 AS input_amount, 0 AS input_value, 
                        COUNT(*) as system_amount, SUM(transactions_paymentmethods.amount) AS system_value 
                        ,0 AS diff_amount, 0 AS diff_value
                    FROM transactions_paymentmethods
                    JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                    JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                    WHERE transactions.shiftmanagement_id = " . $this->turno . "
                    AND transactions_paymentmethods.paymentmethods_id != 92
                    AND transactions.`status` IN (192)
                    GROUP BY transactions_paymentmethods.paymentmethods_id, lists.name
                    
                    union
                    
                    SELECT '0000000' AS id, 'TOTAL CAJA' AS name, 0 AS input_amount, 0 AS input_value, 0 AS COUNT, 
                        (
                            (
                            SELECT sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                                sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0))
                            FROM balance_payments
                            WHERE balance_payments.shiftmanagement_id = " . $this->turno . "
                            )
                            +
                            (
                            SELECT SUM(transactions_paymentmethods.amount) FROM transactions_paymentmethods
                            JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                            JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                            WHERE transactions.shiftmanagement_id = " . $this->turno . "
                            AND transactions_paymentmethods.paymentmethods_id != 92
                            )
                        ) AS system_value
                        ,0 AS diff_amount, 0 AS diff_value
                    
                    ORDER BY id
                    ");

            $this->denominations = DB::select("
                    SELECT lists.id, lists.name, lists.code, 0 AS cantidad, 0 AS valor FROM lists
                    WHERE lists.id <> lists.idowner
                    AND lists.idowner = 150
                    ORDER BY lists.id desc
                    ");
        } else {
            // if ($this->cantAjuste == 0 ) {
            //     $this->typeItem = 'BASE'; 
            // } else {
            //     $this->typeItem = 'AJUSTE'; 
            // }
            //REGISTROS CUANDO HAY BASE Y/O AJUSTE
            $this->itemsFull = DB::select("
                    SELECT CONCAT('01',LPAD(lists.id,5,'0')) AS id, lists.name AS name, shift_closure.input_quantity AS input_amount, shift_closure.input_value AS input_value, shift_closure.system_quantity AS system_amount, shift_closure.system_value as system_value, shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, shift_closure.system_value - shift_closure.input_value AS diff_value FROM shift_closure
                    LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                    WHERE shift_closure.turn = " . $this->turno . "
                    AND shift_closure.record_type = '" . $this->typeItem . "'
                    AND lists.id = 92

                    UNION

                    SELECT CONCAT('02',LPAD(lists.id,5,'0')) AS id, lists.name AS name, shift_closure.input_quantity AS input_amount, shift_closure.input_value AS input_value, shift_closure.system_quantity AS system_amount, shift_closure.system_value as system_value, shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, shift_closure.system_value - shift_closure.input_value AS diff_value FROM shift_closure
                    LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                    WHERE shift_closure.turn = " . $this->turno . "
                    AND shift_closure.record_type = '" . $this->typeItem . "'
                    AND lists.id != 92

                    UNION
                    
                    SELECT '0000000' AS id, 'TOTAL CAJA' AS name, 0 AS input_amount, sum(shift_closure.input_value) AS input_value, 0 AS system_amount, sum(shift_closure.system_value) as system_value, 0 AS diff_amount, sum(shift_closure.system_value) - sum(shift_closure.input_value) AS difference  FROM shift_closure
                    LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                    WHERE shift_closure.turn = " . $this->turno . "
                    AND shift_closure.record_type = '" . $this->typeItem . "'
                    
                    ORDER BY ID
                    ");
            $this->denominations = DB::select("
                    SELECT lists.id, lists.name, lists.code, shift_closure_detail.amount AS cantidad, lists.code*shift_closure_detail.amount AS valor FROM lists
                    left JOIN shift_closure_detail ON shift_closure_detail.denomination = lists.id
                    WHERE lists.idowner = 150
                    AND shift_closure_detail.turn = " . $this->turno . "
                    AND shift_closure_detail.record_type = '" . $this->typeItem . "'
                    ORDER BY lists.id desc
                    ");
        }
    }

    public function viewlist($group, $page)
    {
        $users = [];

        if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {

            $company = Company::with('companiesUser')
                ->where('admon_id', auth()->user()->id)
                ->first();

            foreach ($company->companiesUser as $user) {
                array_push($users, $user['user_id']);
            }
            array_push($users, auth()->user()->id);

        } else {
            array_push($users, auth()->user()->id);
        }

        $results = ShiftManagements::select('shift_managements.*', 
                            'shift_closure.input_value', 
                            'shift_closure.system_value')
            ->leftjoin('shift_closure', 'shift_closure.turn', 'shift_managements.id')
            ->whereIn('user_id', $users)
            ->where('shift_closure.medium_payment_type', 92)
            ->where('shift_closure.record_type', 'AJUSTE');

        $b = ShiftManagements::select('shift_managements.*')
            ->selectRaw(0 . ' as input_value ')
            ->selectRaw(0 .' as system_value')
            ->leftjoin('shift_closure', 'shift_closure.turn', 'shift_managements.id')
            ->whereIn('user_id', $users)
            ->where('shift_closure.medium_payment_type', 92)
            ->where('shift_closure.record_type', 'BASE')
            ->where('shift_managements.typeshift_id', 12);

        $results->union($b);

        $obj = new \stdClass();
        $obj->link = '<a class="pointer-events: none; cursor: not-allowed;text-decoration: none;opacity: 0.5"  
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Closed') . '" 
                            style="color: #00a2e8; font-size: 20px; margin: 3px;"
                            <i class="fa fa-close" ></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj1 = new \stdClass();

        $obj1->link = '<a  href="/management/balancesheet?id={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Closed') . '" 
                            style="color: #00a2e8; font-size: 20px; margin: 3px;"
                            <i class="fa fa-edit" ></i>
                      </a>';
        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        $obj2 = new \stdClass();

        $obj2->link = '<a href=""
                            onClick="tirilla_turno({{ $model->id }})"
                            data-id="{{ $model->id }}"
                            data-placement="top"
                            data-toggle="tooltip"
                            title="' . __('Print Resume') . '" 
                            style="color: #00a2e8; font-size: 20px; margin: 3px;"
                            <i class="fa fa-file-pdf-o" ></i>
                      </a>';

        $obj2->vars = array();
        $obj2->vars[] = array();
        $obj2->vars[0]['name'] = 'model->id';
        $obj2->vars[0]['value'] = 'id';

        $buttons = array();

        return Datatables::of($results)
            ->addColumn('fullname', function ($model) {
                return $model->user->Persona->fullname;
            })
            ->addColumn('saldoinicial', function ($model) {
                return $model->initialbalance;
            })
            ->addColumn('saldofinal', function ($model) {
                return $model->system_value;
            })
            ->addColumn('valorreportado', function ($model) {
                return $model->input_value;
            })
            ->addColumn('diferencia', function ($model) {
                $dif = $model->input_value - $model->system_value;
                if ($dif < 0) {
                    return $dif;
                } else {
                    return $dif;
                }
            })

            ->addColumn('estado', function ($model) {
                if ($model->typeshift_id == 12) return __('Locked');
                if ($model->typeshift_id == 14) return __('Open');
                if ($model->typeshift_id == 15) return __('Closed');
                else return __('in fit');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj, $obj1, $obj2) {
                    array_push($buttons, $obj2);
                // if ($model->typeshift_id == 15) {
                //     array_push($buttons, $obj);
                // } else {

                //     if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {
                //         if ($model->typeshift_id == 12) {
                //             if (isset($model->shiftClousure[0]->record_type) && $model->shiftClousure[0]->record_type == 'BASE') {
                //                 array_push($buttons, $obj1);
                //             }
                //         }
                //     } else {
                //         if ($model->typeshift_id == 12) {
                //             array_push($buttons, $obj1);
                //         }
                //     }
  
                // }

                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })->escapeColumns(['action'])->make(true);
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'turno' => $this->turno,
            'typeItem' => $this->typeItem,
            'itemsFull' => $this->itemsFull,
            'denominaciones' => $this->denominations,
            'shiftid' => $this->shiftid,
            'confirmClosure' => $this->confirmClosure,
            'hasPendingTransaction' => $this->hasPendingTransaction,
            'hasDelivery' =>$this->hasDelivery,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function ajax(Request $request, $page, $gruop)
    {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            
            case 'data_tirilla_turno':
                $result->success = false;
                $result->data = $this->data_tirilla_turno(Input::all());
                if ($result->data != null)
                    $result->success = true;
                return json_encode($result);
                break;

            case 'closeTurn':
                return $this->blockTurn($gruop, $page);
                break;

        }
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
            'turno' => 'required',
            'typeItem' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        try {
            // Guarda denominaciones BASE y AJUSTE
            for ($i = 1; $i < count($request->datosdinero); $i++) {
                $denominacion = new ShiftClosureDetail();
                $denominacion->turn = $request->turno;
                $denominacion->denomination = $request->datosdinero[$i]['id'];
                $denominacion->amount = $request->datosdinero[$i]['input_amount'];
                $denominacion->record_type = $request->typeItem == 'INICIAL' ? 'BASE' : 'AJUSTE';
                $denominacion->save();
            }
            // Guarda Items de Medios de Pago BASE y AJUSTE
            for ($i = 2; $i < count($request->datosItems); $i++) {
                $itemturno = new ShiftClosure();
                $itemturno->turn = $request->turno;
                $itemturno->record_type = $request->typeItem == 'INICIAL' ? 'BASE' : 'AJUSTE';
                $itemturno->ope_type = 'CR';
                $itemturno->medium_payment_type = intval(substr($request->datosItems[$i]['id'], -5));
                $itemturno->input_quantity = $request->datosItems[$i]['input_amount'];
                $itemturno->input_value = $request->datosItems[$i]['input_value'];
                $itemturno->system_quantity = $request->datosItems[$i]['system_amount'];
                $itemturno->system_value = $request->datosItems[$i]['system_value'];
                $itemturno->save();
            }

            if ($request->typeItem == 'BASE') {
                $turno = ShiftManagements::findOrFail($request->turno);
                $turno->enddate = Carbon::now();
                $turno->typeshift_id = 15;
                $turno->save();
            }
        } catch (\Exception $e) {
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return back()->with('success', array(__('Saved successfuly')));
    }

    /**
     * Cierre de turno
     * @param $group
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|string
     */
    public function closeTurn($group, $page)
    {
        try {
            $errors = (array)session('errors');
            $success = (array)session('success');
            $infos = (array)session('infos');

            return view($group . '/' . $page, [
                'group' => ucwords($group),
                'page' => ucwords($page),
                'turno' => $this->turno,
                'typeItem' => $this->typeItem,
                'itemsFull' => $this->itemsFull,
                'denominaciones' => $this->denominations,
                'shiftid' => $this->shiftid,
                'confirmClosure' => true,
                'confirmModal' => true,
                'hasPendingTransaction' => $this->hasPendingTransaction,
                'hasDelivery' =>$this->hasDelivery,
                'errors' => $errors,
                'success' => $success,
                'infos' => $infos
            ]);
        } catch (\Exception $e) {
            return 'false';
        }
    }

    /**
     * Bloqueo de caja
     * @param $group
     * @param $page
     * @return string
     */
    public function blockTurn($group, $page)
    {
        try {

            ShiftManagements::where('user_id', auth()->user()->id)
                ->where('typeshift_id', '=', 14)
                ->update(['typeshift_id' => 12]);
        } catch (\Exception $e) {
            // dd('error');
            return 'false';
        }
    }

    public function data_tirilla_turno($data) {

        //*********************************************** */
        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        $turno = $data['id'];

        $data['impresora'] = 'CAJA';
        $data['namecia'] = $this->company->name;
        $data['slogancia'] = $this->company->slogan;

        $info_turno = ShiftManagements::select('shift_managements.*', 'users.email')
                ->join('users', 'users.id', 'shift_managements.user_id')
                ->where('shift_managements.id', $turno)
                ->first();

        $userRol = RoleUser::where('user_id', $info_turno->user_id)->get()->first();
        $info_turno->esAdmin = $userRol->role_id == ADTIENDA ? true : false;
        $data['turno'] = $info_turno;

        $transacciones = TransactionsPaymentmethods::select('lists.name', 
                                                 DB::raw("SUM(transactions_paymentmethods.amount) AS valor"), 
                                                 DB::raw("COUNT(*) AS cantidad") )
                ->join('transactions', 'transactions.id', 'transactions_paymentmethods.transaction_id')
                ->leftJoin('lists', 'lists.id', 'transactions_paymentmethods.paymentmethods_id') 
                ->where('transactions.shiftmanagement_id', $turno)
                ->whereIn('transactions.status', [192])
                ->where('transactions_paymentmethods.status', '!=', 118)
                ->groupBy('transactions_paymentmethods.paymentmethods_id')
                ->get()->toArray();
        $data['transacciones'] = $transacciones;

        if ($info_turno->esAdmin) {

            $baseini = BalancePayments::select(DB::raw('"INGRESOS POR VENTAS" as item'),
                                            DB::raw('SUM(balance_payments.amount_payment) AS valor'),
                                            DB::raw('COUNT(*) AS cantidad') )
                    ->where('balance_payments.shiftmanagement_id', $turno)
                    ->where('balance_payments.description_payment', 'Valor cuenta inicial caja')
                    ->where('balance_payments.businesskey', 0)
                    ->where('balance_payments.typepayment_id', 18)
                    ->where('balance_payments.status', '!=', 0)
                    ->get()->toArray();
            $data['baseini'] = $baseini;
        }

        $ingxven = BalancePayments::select(DB::raw('"INGRESOS POR VENTAS" as item'),
                                           DB::raw('SUM(balance_payments.amount_payment) AS valor'),
                                           DB::raw('COUNT(*) AS cantidad') )
                ->where('balance_payments.shiftmanagement_id', $turno)
                ->where('balance_payments.description_payment', '!=', 'Valor cuenta inicial caja')
                ->where('balance_payments.businesskey', '!=', 0)
                ->where('balance_payments.typepayment_id', 18)
                ->where('balance_payments.status', '!=', 0)
                ->get()->toArray();
        $data['ingxven'] = $ingxven;

        $ingresos = BalancePayments::select('balance_payments.description_payment as item', 'balance_payments.amount_payment AS valor')
                ->where('balance_payments.shiftmanagement_id', $turno)
                ->where('balance_payments.description_payment', '!=', 'Valor cuenta inicial caja')
                ->where('balance_payments.businesskey', 0)
                ->where('balance_payments.typepayment_id', 18)
                ->where('balance_payments.status', '!=', 0)
                ->get()->toArray();
        $data['ingresos'] = $ingresos;

        $egresos = BalancePayments::select('balance_payments.description_payment as item', 'balance_payments.amount_payment AS valor')
                ->where('balance_payments.shiftmanagement_id', $turno)
                ->where('balance_payments.businesskey', 0)
                ->where('balance_payments.typepayment_id', 17)
                ->where('balance_payments.status', '!=', 0)
                ->get()->toArray();
        $data['egresos'] = $egresos;

        $reg_cajero = ShiftClosure::select('lists.name AS item', 
                        'shift_closure.input_value AS valor', 
                        'shift_closure.input_quantity AS cantidad',
                        'shift_closure.system_value AS valorsys', 
                        'shift_closure.system_quantity AS cantidadsys')
                ->join('lists', 'lists.id', 'shift_closure.medium_payment_type')
                ->where('shift_closure.turn', $turno)
                ->where('shift_closure.record_type', 'BASE')
                ->get()->toArray();
        $data['reg_cajero'] = $reg_cajero;

        $turnosCajeros = [$turno];
        if($info_turno->esAdmin) {
            $turnosCajeros = BalancePayments::selectRaw('trim(substr(balance_payments.description_payment,18,21)) as turno')
                ->whereRaw('balance_payments.description_payment LIKE "Cierre Caja Turno%"')
                ->where('balance_payments.shiftmanagement_id', $turno)
                ->pluck('turno')->toArray();
            array_push($turnosCajeros, $turno);

            $trans_comercio = TransactionsPaymentmethods::select('lists.name', 
                            DB::raw("SUM(transactions_paymentmethods.amount) AS valor"), 
                            DB::raw("COUNT(*) AS cantidad") )
                ->join('transactions', 'transactions.id', 'transactions_paymentmethods.transaction_id')
                ->leftJoin('lists', 'lists.id', 'transactions_paymentmethods.paymentmethods_id') 
                ->whereIn('transactions.shiftmanagement_id', $turnosCajeros)
                ->where('transactions.status', 192)
                ->where('transactions_paymentmethods.status', '!=', 118)
                ->groupBy('transactions_paymentmethods.paymentmethods_id')
                ->get()->toArray();
            $data['transcomercio'] = $trans_comercio;
        }

        $reg_admon = ShiftClosure::select('lists.name AS item', 
                    'shift_closure.input_value AS valor', 
                    'shift_closure.input_quantity AS cantidad',
                    'shift_closure.system_value AS valorsys', 
                    'shift_closure.system_quantity AS cantidadsys')
                ->join('lists', 'lists.id', 'shift_closure.medium_payment_type')
                ->where('shift_closure.turn', $turno)
                ->where('shift_closure.record_type', 'AJUSTE')
                ->get()->toArray();
        $data['reg_admon'] = $reg_admon;

        if ($info_turno->esAdmin) {
            $reg_admonRec = ShiftClosure::select('lists.name AS item', 'shift_closure.input_value AS valor', 'shift_closure.input_quantity AS cantidad')
                    ->join('lists', 'lists.id', 'shift_closure.medium_payment_type')
                    // ->where('shift_closure.turn', $turno)
                    ->whereIn('shift_closure.turn', $turnosCajeros)
                    ->where('shift_closure.record_type', 'AJUSTE')
                    ->where('shift_closure.medium_payment_type', '!=', 92)
                    ->get()->toArray();
            $data['reg_admon_rec'] = $reg_admonRec;
        }

        $resumen_iva = TransactionsDetails::select('products_taxes.name AS item',
                                           DB::raw('sum(transactions_details.iva_value) AS valor'),
                                           DB::raw('COUNT(*) AS cantidad') )
                ->join('transactions', 'transactions.id', 'transactions_details.transaction_id')
                ->join('catalog_products', 'catalog_products.id', 'transactions_details.catalog_product_id')
                ->leftJoin('products_taxes', 'products_taxes.id', 'catalog_products.products_taxe_id')
                // ->where('transactions.shiftmanagement_id', $turno)
                ->whereIn('transactions.shiftmanagement_id', $turnosCajeros)
                ->where('products_taxes.id', '!=', 4)
                ->where('transactions.status', 192)
                ->groupBy('products_taxes.id')
                ->get()->toArray();
        $data['resumen_iva'] = $resumen_iva;

        if ($info_turno->esAdmin) {
            $creditos = TransactionsPaymentmethods::select('transactions.info_client as nombre', 
                    'transactions_paymentmethods.amount as valor', 
                    'transactions_paymentmethods.receipt_number as fecha')
                ->join('transactions', 'transactions.id', 'transactions_paymentmethods.transaction_id')
                ->where('transactions.company_id', $this->company->id)
                ->where('transactions_paymentmethods.paymentmethods_id', 194)
                ->where('transactions_paymentmethods.status', 116)
                ->where('transactions.status', 192)
                ->get()->toArray();
            $data['creditos'] = $creditos;
        }

        // dd($data);

        return json_encode($data);

        //******************************************************** */
    }

}
