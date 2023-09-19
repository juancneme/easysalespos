<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Input;

use App\Models\Management\BalancePayments;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\User;

class BalanceController extends Controller
{

    use \App\Http\Controllers\SaveFunction;

    public $users_contrato = '';
    public $contracts = '';
    public $accountValue = 0;

    public function __construct() {
        $this->middleware('auth');
      
        if ( auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('persons', 'persons.id', 'contracts.person_id')
                    ->where('contracts.status', 1)
                    ->orderBy('numbercontract', 'asc')
                    ->get();
        } elseif (auth()->user()->hasRole('adcontrato') ){
            $this->contracts = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('persons', 'persons.id', 'contracts.person_id')
                    ->where('contracts.id', auth()->user()->contract_id)
                    ->where('contracts.status', 1)
                    ->orderBy('numbercontract', 'asc')
                    ->get();
        } elseif (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')){
            $this->contracts = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('persons', 'persons.id', 'contracts.person_id')
                    ->where('contracts.id', auth()->user()->contract_id)
                    ->where('contracts.status', 1)
                    ->orderBy('numbercontract', 'asc')
                    ->get();
        } elseif (auth()->user()->hasRole('cajero') ) {
            $this->contracts = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('persons', 'persons.id', 'contracts.person_id')
                    ->where('contracts.status', 1)
                    ->where('contracts.id', auth()->user()->contract_id)
                    ->orderBy('numbercontract', 'asc')
                    ->get();
        } else {
            $this->contracts = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
                    ->join('persons', 'persons.id', 'contracts.person_id')
                    ->where('contracts.status', 1)
                    ->where('contracts.id', null)
                    ->orderBy('numbercontract', 'asc')
                    ->get();
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

            'accountValue' => $this->accountValue,
            'contracts' => $this->contracts
        ]);
    }

    public function viewlist($group, $page) {

        $inputs = Input::all();
        $contrato = $inputs['contrato'];
        $compania = $inputs['compania'];
        $usuario = $inputs['usuario'];

        if (auth()->user()->hasRole('cajero') ) {
            if ( $compania == 'all' || $usuario == 'all' ) {
                $contrato = 0;
            }
        }

        $results = BalancePayments::select('balance_payments.*', 'lists.code', 'users.name')
                ->leftJoin('lists', 'lists.id', '=', 'balance_payments.typepayment_id')
                ->leftJoin('users', 'users.id', '=', 'balance_payments.user_id')
                ->where('balance_payments.contract_id', $contrato)
                ->orderBy('balance_payments.id', 'desc')
                ->take(500);

        if ( $compania != 'all') {
            $results->where('balance_payments.company_id', $compania);
        }
        if ( $usuario != 'all') {
            $results->where('balance_payments.user_id', $usuario);
        }

        return Datatables::of($results)
                ->editColumn('amount_payment', function ($data) {
                    return '$ '.number_format($data->amount_payment, 0);
                })
                ->addColumn('action', function ($model) use ($group, $page) {
                    return getListForm($model->id, $group, $page);
                })->escapeColumns(['action'])
                ->make(true);

    }

    public function ajax(Request $request, $group, $page ) {

        $type = Input::get("type");
        $response = new \stdClass();
        $response->success = false;

        switch($type){
            case 'findcompany': 
                $response->data = $this->findcompany(Input::get("contrato"));
                $response->success = $response->data ? true : false;
                break;
            case 'findusers': 
                $response->data = $this->findusers(Input::get("compania"));
                $response->success = $response->data ? true : false;
                break;
            case 'findbalance': 
                $response->data = $this->findbalance(Input::get("contrato"),Input::get("compania"),Input::get("usuario"));
                $response->success = $response->data ? true : false;
                break;
        }
        return json_encode($response);
    }

    public function findcompany( $contrato ){

        if ( auth()->user()->hasRole('admin')) {
            $companies_contrato = Company::select('id','name')
                    ->where('status', 1)
                    ->where('contract_id', $contrato)
                    ->get();
        } elseif (auth()->user()->hasRole('adcontrato')) {
            $companies_contrato = Company::select('id','name')
                    ->where('status', 1)
                    ->where('contract_id', $contrato)
                    ->get();
        } elseif (auth()->user()->hasRole('adtienda')) {
            $companies_contrato = Company::select('id','name')
                    ->where('status', 1)
                    ->where('contract_id', $contrato)
                    ->where('admon_id', auth()->user()->id)
                    ->get();
        } elseif (auth()->user()->hasRole('cajero') ) {
            $companies_contrato = Company::select('id','name')
                    ->join('companies_users', 'companies_users.company_id', 'companies.id')
                    ->where('status', 1)
                    ->where('contract_id', $contrato)
                    ->where('companies_users.user_id', auth()->user()->id)
                    ->get();
        }

        return $companies_contrato;
    }

    public function findusers( $company ){

        if ( auth()->user()->hasRole('admin')) {
            $users_company = User::select('users.id','users.name')
                    ->leftJoin('role_user', 'role_user.user_id', 'users.id')
                    ->leftJoin('companies_users', 'companies_users.user_id', 'users.id')
                    ->where('companies_users.company_id', $company)
                    ->whereIn('role_user.role_id', [3])
                    ->get();
        } elseif (auth()->user()->hasRole('adcontrato')) {
            $users_company = User::select('users.id','users.name')
                    ->leftJoin('role_user', 'role_user.user_id', 'users.id')
                    ->leftJoin('companies_users', 'companies_users.user_id', 'users.id')
                    ->where('companies_users.company_id', $company)
                    ->whereIn('role_user.role_id', [3])
                    ->get();
        } elseif (auth()->user()->hasRole('adtienda')) {
            $users_company = User::select('users.id','users.name')
                    ->leftJoin('role_user', 'role_user.user_id', 'users.id')
                    ->leftJoin('companies_users', 'companies_users.user_id', 'users.id')
                    ->where('companies_users.company_id', $company)
                    ->whereIn('role_user.role_id', [3])
                    ->get();
    } elseif (auth()->user()->hasRole('cajero') ) {
            $users_company = User::select('users.id','users.name')
                    ->leftJoin('role_user', 'role_user.user_id', 'users.id')
                    ->leftJoin('companies_users', 'companies_users.user_id', 'users.id')
                    ->where('companies_users.company_id', $company)
                    ->where('companies_users.user_id', auth()->user()->id)
                    ->whereIn('role_user.role_id', [3])
                    ->get();
        }

        return $users_company;
    }

    public function findbalance( $contrato, $compania, $usuario ){

        $balance = $this->calcula_saldo_disponible($contrato, $compania, $usuario);

        if (auth()->user()->hasRole('cajero') ) {
            if ( $compania == 'all' || $usuario == 'all' ) {
                $balance = 0;
            }
        }

        return $balance;
    }
}
