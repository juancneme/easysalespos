<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

use App\Models\Management\Company;
use App\Models\Management\ShiftClosure;
use App\Models\Management\ShiftClosureDetail;
use App\Models\Management\ShiftManagements;
use App\Models\Management\Transactions;
use App\Models\Management\BalanceAccounts;
use App\Models\Management\BalancePayments;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\RoleUser;

use App\Enums\TransactionsStatusEnum;
use App\Enums\TypeOperationEnum;
use App\Models\Management\Users;

const ADTIENDA = 6;

class BalancesheetController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        $this->turnoAdmon = buscarTurnoAdmon($this->company->id);

        if (Input::get('id')) {
            $this->turno = Input::get('id');
            $this->shift = ShiftManagements::where('id', $this->turno)
                ->get()->last();
        } else {
            $this->shift = ShiftManagements::where('user_id', auth()->user()->id)
                ->get()->last();
        }
            // dd($this->shift);
        if (!empty($this->shift)) {
            $userRol = RoleUser::where('user_id', $this->shift->user_id)->get()->first();
            $this->esAdmin = $userRol->role_id == ADTIENDA ? true : false;
            $this->esAjuste = false;
            if ( $this->esAdmin && $this->shift->typeshift_id == 12 ) {
            $this->esAjuste = true;
            }
            $this->hasPendingTransaction = Transactions::where('shiftmanagement_id', $this->shift->id)
                ->whereIn('status', [TransactionsStatusEnum::ON_HOLD,TransactionsStatusEnum::WITHDELI])
                ->whereIn('typeoperation_id', [TypeOperationEnum::SELL])
                ->count();

            $this->cantBase = ShiftClosure::where('turn', $this->shift->id)
                ->where('record_type', 'BASE')
                ->count();

            $this->cantAjuste = ShiftClosure::where('turn', $this->shift->id)
                ->where('record_type', 'AJUSTE')
                ->count();

            $this->typeItem = 'INICIAL';
            if ($this->cantBase > 0) $this->typeItem = 'BASE';
            if ($this->cantAjuste > 0) $this->typeItem = 'AJUSTE';

            $this->saldofinal = 0;

            if ($this->esAdmin) {
                $regCajeros = BalancePayments::selectRaw('trim(substr(balance_payments.description_payment,18,21)) as turno')
                        ->whereRaw('balance_payments.description_payment LIKE "Cierre Caja Turno%"')
                        ->where('balance_payments.shiftmanagement_id', $this->turnoAdmon->id)
                        ->pluck('turno');
                $this->data_turno = '0';
                for ($i = 0; $i < count($regCajeros); $i++) {
                    if ($i < count($regCajeros)-1)
                        $this->data_turno = $this->data_turno.$regCajeros[$i].',';
                    else
                        $this->data_turno = $this->data_turno.$regCajeros[$i];
                }
            }

            if ($this->typeItem == 'INICIAL') {
                //REGISTROS INICIALES CAJEROS
                // if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
                if ($this->esAdmin) {
                    $this->itemsFull = DB::select("
                            SELECT '0100092' AS id,
                                   'Efectivo' AS name, 
                                   0 AS input_amount, 
                                   0 AS input_value, 
                                   0 AS system_amount, 
                                   sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                                   sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)) AS system_value,
                                   0 AS diff_amount, 0 AS diff_value
                            FROM balance_payments
                            WHERE balance_payments.shiftmanagement_id = " . $this->shift->id . "
                            AND balance_payments.status != 0
                            # AND balance_payments.description_payment != 'Valor cuenta inicial caja'
                            
                            union
                            
                            SELECT CONCAT('02',LPAD(transactions_paymentmethods.paymentmethods_id,5,'0')) AS id, 
                                   lists.name AS name, 
                                   0 AS input_amount, 
                                   0 AS input_value, 
                                   COUNT(*) as system_amount, 
                                   SUM(transactions_paymentmethods.amount) AS system_value,
                                   0 AS diff_amount, 
                                   0 AS diff_value
                            FROM transactions_paymentmethods
                            JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                            JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                            WHERE transactions.shiftmanagement_id = " . $this->shift->id . "
                            AND transactions.status != 193
                            AND transactions_paymentmethods.paymentmethods_id != 92
                            AND transactions.`status` IN (192)
                            GROUP BY transactions_paymentmethods.paymentmethods_id, lists.name

                            union 

                            SELECT CONCAT('03',LPAD(shift_closure.medium_payment_type,5,'0')) AS id, 
                                   CONCAT('REC: ', lists.name) AS name, 
                                   shift_closure.input_quantity AS input_amount, 
                                   shift_closure.input_value AS input_value, 
                                   shift_closure.input_quantity AS system_amount, 
                                   shift_closure.input_value AS system_value , 
                                   0 AS diff_amount, 
                                   0 AS diff_value
                            FROM shift_closure
                            JOIN lists ON lists.id = shift_closure.medium_payment_type
                            WHERE shift_closure.turn IN (" . $this->data_turno . ")
                            AND shift_closure.record_type = 'AJUSTE'
                            AND shift_closure.medium_payment_type != 92
                            
                            union
                            
                            SELECT '0000000' AS id, 
                                   'TOTAL CAJA' AS name, 
                                   0 AS input_amount, 
                                   0 AS input_value, 
                                   0 AS system_amount, 
                                   (
                                        (
                                        SELECT COALESCE(sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)),0) - 
                                               COALESCE(sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)),0)
                                        FROM balance_payments
                                        WHERE balance_payments.shiftmanagement_id = " . $this->shift->id . "
                                        AND balance_payments.status != 0
                                        # AND balance_payments.description_payment != 'Valor cuenta inicial caja'
                                        )
                                        +
                                        (
                                        SELECT COALESCE(SUM(transactions_paymentmethods.amount),0) 
                                        FROM transactions_paymentmethods
                                        JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                                        JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                                        WHERE transactions.shiftmanagement_id = " . $this->shift->id . "
                                        AND transactions.status != 193
                                        AND transactions_paymentmethods.paymentmethods_id != 92
                                        )
                                        +
                                        (
                                        SELECT COALESCE(SUM(shift_closure.input_value),0)
                                        FROM shift_closure
                                        JOIN lists ON lists.id = shift_closure.medium_payment_type
                                        WHERE shift_closure.turn IN (" . $this->data_turno . ")
                                        AND shift_closure.record_type = 'AJUSTE'
                                        AND shift_closure.medium_payment_type != 92
                                        )

                                    ) AS system_value,
                                    0 AS diff_amount,
                                    0 AS diff_value
                            
                            ORDER BY id
                            ");
                } else {
                    $this->itemsFull = DB::select("
                        SELECT '0100092' AS id,'Efectivo' AS name, 0 AS input_amount, 0 AS input_value, 0 AS system_amount, sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)) -
                            sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)) AS system_value
                            ,0 AS diff_amount, 0 AS diff_value
                        FROM balance_payments
                        WHERE balance_payments.shiftmanagement_id = " . $this->shift->id . "
                        AND balance_payments.status != 0
                        AND balance_payments.description_payment != 'Valor cuenta inicial caja'
                        
                        union
                        
                        SELECT CONCAT('02',LPAD(transactions_paymentmethods.paymentmethods_id,5,'0')) AS id, lists.name AS name, 0 AS input_amount, 0 AS input_value, 
                            COUNT(*) as system_amount, SUM(transactions_paymentmethods.amount) AS system_value 
                            ,0 AS diff_amount, 0 AS diff_value
                        FROM transactions_paymentmethods
                        JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                        JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                        WHERE transactions.shiftmanagement_id = " . $this->shift->id . "
                        AND transactions.status != 193
                        AND transactions_paymentmethods.paymentmethods_id != 92
                        AND transactions.`status` IN (192)
                        GROUP BY transactions_paymentmethods.paymentmethods_id, lists.name
                        
                        union
                        
                        SELECT '0000000' AS id, 'TOTAL CAJA' AS name, 0 AS input_amount, 0 AS input_value, 0 AS COUNT, 
                            (
                                (
                                SELECT COALESCE(sum(if(balance_payments.typepayment_id = 18, balance_payments.amount_payment, 0)),0) - 
                                       COALESCE(sum(if(balance_payments.typepayment_id = 17, balance_payments.amount_payment, 0)),0)
                                FROM balance_payments
                                WHERE balance_payments.shiftmanagement_id = " . $this->shift->id . "
                                AND balance_payments.status != 0
                                AND balance_payments.description_payment != 'Valor cuenta inicial caja'
                                )
                                +
                                (
                                SELECT COALESCE(SUM(transactions_paymentmethods.amount),0) FROM transactions_paymentmethods
                                JOIN transactions ON transactions.id = transactions_paymentmethods.transaction_id
                                JOIN lists ON lists.id = transactions_paymentmethods.paymentmethods_id
                                WHERE transactions.shiftmanagement_id = " . $this->shift->id . "
                                AND transactions.status != 193
                                AND transactions_paymentmethods.paymentmethods_id != 92
                                )
                            ) AS system_value
                            ,0 AS diff_amount, 0 AS diff_value
                        
                        ORDER BY id
                        ");

                }
                $this->denominations = DB::select("
                    SELECT lists.id, lists.name, lists.code, 0 AS cantidad, 0 AS valor FROM lists
                    WHERE lists.id <> lists.idowner
                    AND lists.idowner = 150
                    ORDER BY lists.id desc
                    ");
            } else {
                //REGISTROS CUANDO HAY BASE Y/O AJUSTE
                if ($this->esAdmin) {
                    $this->itemsFull = DB::select("
                        SELECT CONCAT('01',LPAD(lists.id,5,'0')) AS id, 
                               lists.name AS name, 
                               shift_closure.input_quantity AS input_amount, 
                               shift_closure.input_value AS input_value, 
                               shift_closure.system_quantity AS system_amount, 
                               shift_closure.system_value as system_value, 
                               shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, 
                               shift_closure.system_value - shift_closure.input_value AS diff_value 
                        FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        AND lists.id = 92

                        UNION

                        SELECT CONCAT('02',LPAD(lists.id,5,'0')) AS id, 
                               lists.name AS name, 
                               shift_closure.input_quantity AS input_amount, 
                               shift_closure.input_value AS input_value, 
                               shift_closure.system_quantity AS system_amount, 
                               shift_closure.system_value as system_value, 
                               shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, 
                               shift_closure.system_value - shift_closure.input_value AS diff_value 
                        FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        AND lists.id != 92

                        union 

                        SELECT CONCAT('03',LPAD(shift_closure.medium_payment_type,5,'0')) AS id, 
                               CONCAT('REC: ', lists.name) AS name, 
                               shift_closure.input_quantity AS input_amount, 
                               shift_closure.input_value AS input_value, 
                               shift_closure.input_quantity AS system_amount, 
                               shift_closure.input_value AS system_value , 
                               0 AS diff_amount, 
                               0 AS diff_value
                        FROM shift_closure
                        JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn IN (" . $this->data_turno . ")
                        AND shift_closure.record_type = 'AJUSTE'
                        AND shift_closure.medium_payment_type != 92

                        UNION
                        
                        SELECT '0000000' AS id, 
                               'TOTAL CCCAJA' AS name, 
                               0 AS input_amount, 
                               sum(shift_closure.input_value) AS input_value, 
                               0 AS system_amount, 
                               sum(shift_closure.system_value) AS system_value, 
                               0 AS diff_amount, 
                               sum(shift_closure.system_value) - sum(shift_closure.input_value) AS diff_value 
                        FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        
                        ORDER BY ID
                        ");

                    if ($this->esAdmin) {
                        $values_adi = ShiftClosure::selectRaw('COALESCE(SUM(shift_closure.input_value),0) AS input_value,
                                COALESCE(SUM(shift_closure.system_value),0) AS system_value')
                            ->whereIn('shift_closure.turn', $regCajeros)
                            ->where('shift_closure.record_type', 'AJUSTE')
                            ->where('shift_closure.medium_payment_type', '!=', 92)
                            ->get()->toArray();
                        if (count($values_adi) >= 1) {
                            for ($i=0; $i<count($this->itemsFull); $i++) {
                                if ($this->itemsFull[$i]->id == '000000' ) {
                                    $this->itemsFull[$i]->input_value  = $this->itemsFull[$i]->input_value + $values_adi[0]['input_value'];
                                    $this->itemsFull[$i]->system_value = $this->itemsFull[$i]->system_value + $values_adi[0]['system_value'];
                                }
                            }
                        }
                    }
                } else {
                    $this->itemsFull = DB::select("
                        SELECT CONCAT('01',LPAD(lists.id,5,'0')) AS id, lists.name AS name, shift_closure.input_quantity AS input_amount, shift_closure.input_value AS input_value, shift_closure.system_quantity AS system_amount, shift_closure.system_value as system_value, shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, shift_closure.system_value - shift_closure.input_value AS diff_value FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        AND lists.id = 92

                        UNION

                        SELECT CONCAT('02',LPAD(lists.id,5,'0')) AS id, lists.name AS name, shift_closure.input_quantity AS input_amount, shift_closure.input_value AS input_value, shift_closure.system_quantity AS system_amount, shift_closure.system_value as system_value, shift_closure.system_quantity - shift_closure.input_quantity AS diff_amount, shift_closure.system_value - shift_closure.input_value AS diff_value FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        AND lists.id != 92

                        UNION
                        
                        SELECT '0000000' AS id, 'TOTAL CAJA' AS name, 0 AS input_amount, sum(shift_closure.input_value) AS input_value, 0 AS system_amount, sum(shift_closure.system_value) as system_value, 0 AS diff_amount, sum(shift_closure.system_value) - sum(shift_closure.input_value) AS difference  FROM shift_closure
                        LEFT JOIN lists ON lists.id = shift_closure.medium_payment_type
                        WHERE shift_closure.turn = " . $this->shift->id . "
                        AND shift_closure.record_type = '" . $this->typeItem . "'
                        
                        ORDER BY ID
                        ");

                }
                $this->denominations = DB::select("
                        SELECT lists.id, lists.name, lists.code, shift_closure_detail.amount AS cantidad, lists.code*shift_closure_detail.amount AS valor FROM lists
                        left JOIN shift_closure_detail ON shift_closure_detail.denomination = lists.id
                        WHERE lists.idowner = 150
                        AND shift_closure_detail.turn = " . $this->shift->id . "
                        AND shift_closure_detail.record_type = '" . $this->typeItem . "'
                        ORDER BY lists.id desc
                        ");
            }

        } else {
            $this->hasPendingTransaction = [];
            $this->typeItem = 'INICIAL';
            $this->itemsFull = [];
            $this->denominations = [];
        }
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

            'shift' => $this->shift,
            'hasPendingTransaction' => $this->hasPendingTransaction,
            'typeItem' => $this->typeItem,
            'itemsFull' => $this->itemsFull,
            'esAjuste' => $this->esAjuste,
            'denominaciones' => $this->denominations
        ]);
    }

    public function viewlist($group, $page)
    {
        $users = [];

        $company = Company::with('companiesUser')
            ->where('admon_id', auth()->user()->id)
            ->first();

        foreach ($company->companiesUser as $user) {
            array_push($users, $user['user_id']);
        }
        array_push($users, auth()->user()->id);

        $results = ShiftManagements::with('shiftClousure')
            ->whereIn('user_id', $users)
            ->where('shift_managements.typeshift_id', '!=', 15)
            ->orderBy('id', 'desc')->get();

        $this->cn = count($results);

        $this->abiertoAdmon = $this->turnoAdmon->typeshift_id == 14 || $this->turnoAdmon->typeshift_id == 12 ? true : false;

        $obj = new \stdClass();
        $obj->link = '<a class="btn btn-danger" 
                            class="pointer-events: none; cursor: not-allowed;text-decoration: none;opacity: 0.5"  
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Closed') . '" 
                            style="margin-right:6px; margin-bottom:3px; width:36px;height:36px">
                            <i class="fa fa-close" style="margin-left: -2px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj1 = new \stdClass();
        $obj1->link = '<a  href="/management/balancesheet?id={{ $model->id }}" 
                            class="btn btn-primary"   
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Box square') . '" 
                            style="margin-right:6px; margin-bottom:3px; width:36px;height:36px">
                            <i class="fa fa-edit" style="margin-left: -2px;"></i>
                      </a>';
        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        // Boton ejecuta la funcion ajuste modal para cambiar el estado
        $obj2 = new \stdClass();
        $obj2->link = '<a href="/management/balancesheet?id={{ $model->id }}"
                            data-id="{{ $model->id }}"
                            style="margin-right:6px; margin-bottom:3px; width:36px;height:36px; color:#fff;" 
                            class="btn btn-success" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('lock to fit') . '">
                            <i class="fa fa-wrench" style="font-size: 24px; margin-left: -7px;"></i>
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
            ->addColumn('estado', function ($model) {
                if ($model->typeshift_id == 12) return __('Locked');
                if ($model->typeshift_id == 14) return __('Open');
                if ($model->typeshift_id == 15) return __('Closed');
                else return __('in fit');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj, $obj1, $obj2) {
                if ($model->typeshift_id == 10) {
                    array_push($buttons, $obj1);
                } else {
                    if ($model->typeshift_id == 12) {
                        if ( isset($model->shiftClousure[0]->record_type) 
                                    && $model->shiftClousure[0]->record_type == 'BASE' 
                                    && $this->abiertoAdmon )
                            array_push($buttons, $obj1);
                        else
                            if ( auth()->user()->id == $model->user_id && $this->cn == 1)
                                array_push($buttons, $obj2);
                            else
                                array_push($buttons, $obj);
                    } else {
                        array_push($buttons, $obj);
                    }
                }
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })
            ->escapeColumns(['action'])->make(true);
    }

    public function ajax(Request $request, $page, $gruop)
    {
        $type = Input::get('type');
        switch ($type) {
            case 'closeTurn':
                return $this->blockTurn($gruop, $page);
        }
    }

    public function save(Request $request, $group, $page)
    {
        // dd($request->request);
        $validator = Validator::make($request->all(), [
            'turno' => 'required',
            'typeItem' => 'required'
        ]);

        $userRol = RoleUser::where('user_id', $request->user_turno)->get()->first();
        $this->esAdmin = $userRol->role_id == ADTIENDA ? true : false;
        
        if ( $this->esAdmin && $this->shift->typeshift_id == 10 ) {
            $validator->after(function ($validator) use ($request) {
                $datosItems = $request->get('datosItems');
                for($i=1; $i<count($datosItems); $i++) {
                    if( $datosItems[$i]['id'] == '0100092' ){
                        if( $datosItems[$i]['input_value'] == 0 ) {
                            $validator->errors()->add('input_value', 'No se han registrado valores.');
                        }
                    }
                }
            });
        }
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // $roleuserturno = Users::select('role_user.*')
        //     ->where('users.id', $request->user_turno)
        //     ->join('role_user', 'role_user.user_id', 'users.id')
        //     ->where('role_user.role_id', 6)
        //     ->get()->first();
        // $esAdmon = false;
        // if ( !empty($roleuserturno) ) { $esAdmon = true; }

        $turno = ShiftManagements::findOrFail($request->turno);
        // dd($this->esAdmin, $turno->typeshift_id);
        if ( $this->esAdmin && $turno->typeshift_id == 12 ) {
            $turno->typeshift_id = 10;
            $turno->save();
            return redirect('management/balancesheet')->with('success', array(__('Shift Saved for adjustment')));
        }

        try {
            DB::beginTransaction();
            // Guarda denominaciones BASE y AJUSTE
            if ( $this->esAdmin ) { $request->typeItem = 'BASE'; }

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

                if ($request->datosItems[$i]['id'] > "0300000") continue;
                
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

                if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {
                    if ($itemturno->record_type == 'AJUSTE' && $itemturno->medium_payment_type == 92) {

                        $this->saldofinal = $itemturno->system_value;

                        if ( $request->turno == $this->turnoAdmon->id ) continue;

                        guardarsaldo(auth()->user()->contract_id, $this->company->id, auth()->user()->id, 18, $itemturno->input_value, $request->turno, $this->turnoAdmon->id, 4);

                    }
                }
            }

            if ($request->typeItem == 'BASE') {
                //Actualiza Turno
                $turno = ShiftManagements::findOrFail($request->turno);
                $turno->enddate = Carbon::now();
                $turno->typeshift_id = 15;
                $turno->save();

                //Actualiza Saldos balance_accounts
                if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {

                    $balanceAccount = BalanceAccounts::where('user_id', $request->user_turno)->get()->first();
                    if ( $this->esAdmin ) {
                        $balanceAccount->balance_value = $this->saldofinal;
                    } else {
                        $companyuser = CompaniesUsers::where('user_id', $request->user_turno)->get()->first();
                        $balanceAccount->balance_value = $companyuser->saldo;
                    }
                    $balanceAccount->save();
                }
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
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
                'errors' => $errors,
                'success' => $success,
                'infos' => $infos,

                'typeItem' => $this->typeItem,
                'itemsFull' => $this->itemsFull,
                'denominaciones' => $this->denominations,
                'shift' => $this->shift,
                'confirmModal' => true,
                'esAjuste' => $this->esAjuste,
                'hasPendingTransaction' => $this->hasPendingTransaction
                
                // 'hasDelivery' =>$this->hasDelivery
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
            dd('error');
            return 'false';
        }
    }
}
