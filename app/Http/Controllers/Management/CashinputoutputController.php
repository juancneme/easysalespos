<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Management\BalancePayments;
use App\Models\Management\ShiftManagements;
use App\Models\Management\ShiftClosure;
use App\Models\Management\Company;
use App\Models\Management\CreditPayments;

const SHIFT_OPEN = 14;
const SHIFT_CLOSE = 15;

class CashinputoutputController extends Controller
{
    public $today = '';
    public $valuebalance = 0;
    public $escajero = false;

    public function __construct() {
        $this->middleware('auth');
      
        $mytime = Carbon::now('America/Bogota');
        $this->today = $mytime->toDateTimeString();

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

        $payments = explode("|", $this->company->paymentsmethods);
        $item = array_search('107', $payments);
        $this->tieneSIS = true;
        if ( $item >= 0 ) $this->tieneSIS = true;

        //buscar turno que corresponde
        $this->shift = ShiftManagements::where('user_id', auth()->user()->id)
                ->get()->last();

        // if ( auth()->user()->hasRole('adtienda')) {
        //     $this->shift = ShiftManagements::where('id', 95)
        //             ->get()->last();
        // }

        if (!empty($this->shift)) {    
            $this->conBase = ShiftClosure::where('shift_closure.turn', $this->shift->id)
                    ->where('shift_closure.record_type', 'BASE')
                    ->get()->count();

            $creditos = BalancePayments::where('balance_payments.contract_id', auth()->user()->contract_id)
                    ->where('balance_payments.user_id', auth()->user()->id)
                    ->where('balance_payments.shiftmanagement_id', $this->shift->id)
                    ->where('balance_payments.status', 1)
                    ->where('typepayment_id', 18)
                    ->sum('amount_payment');
            $debitos = BalancePayments::where('balance_payments.contract_id', auth()->user()->contract_id)
                    ->where('balance_payments.user_id', auth()->user()->id)
                    ->where('balance_payments.shiftmanagement_id', $this->shift->id)
                    ->where('balance_payments.status', 1)
                    ->where('typepayment_id', 17)
                    ->sum('amount_payment');

            $this->esCajero = auth()->user()->hasRole('adtienda') ? false : true;

            $this->valuebalance = $creditos - $debitos;
        } else {

            $this->esCajero = [];
            $this->conBase = [];
            $this->tieneSIS = [];
        }            
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,

            'today' => $this->today,
            'valuebalance' => $this->valuebalance,
            'shiftid' => $this->shift,
            'esCajero' => $this->esCajero,
            'conBase' => $this->conBase,
            'tieneSIS' => $this->tieneSIS
            
        ]);
    }

    public function viewlist($group, $page) {

        $inputs = Input::all();
        $contrato = $inputs['contrato'];
        $user = $inputs['usuario'];

        $results = BalancePayments::select('balance_payments.*', 'lists.code', 'users.name')
                ->leftJoin('lists', 'lists.id', 'balance_payments.typepayment_id')
                ->leftJoin('users', 'users.id', 'balance_payments.user_id')
                ->where('balance_payments.shiftmanagement_id', $this->shift->id)
                ->where('balance_payments.status', 1)
                ->orderBy('balance_payments.id', 'desc')
                ->get();

        return Datatables::of($results)
                ->editColumn('amount_payment', function ($data) {
                    return '$ '.number_format($data->amount_payment, 0);
                })
                ->addColumn('estado', function ($model) {
                    return $model->status == 1 ? __('Active') : __('Inactive');
                })
                ->addColumn('action', function ($model) use ($group, $page) {
                    return getListForm($model->id, $group, $page, [], $model, true, false);
                })
                ->escapeColumns(['action'])->make(true);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
                    'date_io' => 'required',
                    'type' => 'required',
                    'value' => 'required',
                    'description' => 'required|max:100'
        ]);

        $validator->after(function ($validator) use ($request) {
            $Type =  $request->get('type');
            //Validar que el turno de la administracion este abierto.
            if ($Type == 20) {
                $turnoAdmon = buscarTurnoAdmon($this->company->id);
                if ($turnoAdmon == null) {
                    $validator->errors()->add('typeturno', 'El administrador no tiene Turno abierto.');
                } else {
                    if ($turnoAdmon->typeshift_id == 10 || $turnoAdmon->typeshift_id == 15) {
                        $validator->errors()->add('typeturno', 'El administrador no tiene Turno abierto.');
                    }
                }
            }
            //Validar que el valor a pagar no sea mayor a lo disponible en caja.
            if ( $Type == 20 || $Type == 17 ) {
                $accountvalue = $request->get('accountvalue');
                $value = $request->get('value');
                if ($value > $accountvalue) {
                    $validator->errors()->add('accountvalue', 'Saldo insuficiente para este movimiento.');
                }
            }
        });

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {

            if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
                $empresa = Company::select('companies.id as company_id', 'companies.contract_id','companies.admon_id')
                        ->where('companies.admon_id', auth()->user()->id)
                        ->get()->first();
            } else {
                $empresa = Company::select('companies.id as company_id', 'companies.contract_id','companies.admon_id')
                        ->join('companies_users', 'companies_users.company_id', 'companies.id')
                        ->where('companies_users.user_id', auth()->user()->id)
                        ->get()->first();
            }

            $shift = ShiftManagements::where('shift_managements.user_id', auth()->user()->id)
                        ->get()->last();

            // $shiftid = ShiftManagements::where('user_id', auth()->user()->id)
            //         ->where('typeshift_id', SHIFT_OPEN)->value('id');

            if(empty($shift) || $shift->typeshift_id == 15 ){
                return back()->with('errors', array(__("Turn is currently closed")));
            }

            if ( $request->type == 20 ) {
                $mType = 17;
                $mDescription = "Entrega Admon - ".auth()->user()->id."-".$shift->id;
            } else {
                $mType = $request->type;
                $mDescription = $request->description;
            }

            $saldodetalle = new BalancePayments;
            $saldodetalle->company_id = $empresa->company_id;
            $saldodetalle->contract_id = auth()->user()->contract_id;
            $saldodetalle->date_payment = $request->date_io;
            $saldodetalle->user_id = auth()->user()->id;
            $saldodetalle->typepayment_id = $mType;
            $saldodetalle->amount_payment = $request->value;
            $saldodetalle->description_payment = $mDescription;
            $saldodetalle->businesskey = 0;
            $saldodetalle->shiftmanagement_id = $shift->id;
            $saldodetalle->status = '1';
            $saldodetalle->save();

            if ( $request->type == 20 ) {
                $mType = 18;

                $turnoAdmon = buscarTurnoAdmon($this->company->id);

                $saldodetalle = new BalancePayments;
                $saldodetalle->company_id = $empresa->company_id;
                $saldodetalle->contract_id = auth()->user()->contract_id;
                $saldodetalle->date_payment = $request->date_io;
                $saldodetalle->user_id = $empresa->admon_id;
                $saldodetalle->typepayment_id = $mType;
                $saldodetalle->amount_payment = $request->value;
                $saldodetalle->description_payment = $mDescription;
                $saldodetalle->businesskey = 0;
                $saldodetalle->shiftmanagement_id = $turnoAdmon->id;
                $saldodetalle->status = '1';
                $saldodetalle->save();
            }
            
        } catch (\Exception $e) {
            // dd($e);
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return back()->with('success', array(__('Saved successfuly')));
    }

    public function delete($group, $page, $id)
    {
        $balpay = BalancePayments::where('id', $id)->first();

        try {
            DB::beginTransaction();

            if (!empty($balpay)) {

                if ($balpay->description_payment == "Fiado Electronico PaySis") {
                    $rec_pay = CreditPayments::where('credit_payments.balpay_id', $balpay->id)
                        ->get()->first();
                    if (!empty($rec_pay)) {
                        $sistecreditCtrl = new SistecreditController();
                        $res = $sistecreditCtrl->requestCancelPayment($rec_pay->payment_id);
                        if ($res->getStatusCode() === 201) {
                            $balpay->status = 0;
                            $balpay->save();
                        } else return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Deleted unsuccessfuly foreign keys 1'));
                    } else return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Deleted unsuccessfuly foreign keys 2'));
                } else {
                    $balpay->status = 0;
                    $balpay->save();
                }
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Unable to delete record. Validate with the platform administrator.'));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Deleted successfuly'));
    }

}
