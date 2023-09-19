<?php

namespace App\Http\Controllers\Management;
 
use App\Enums\TransactionsStatusEnum;
use App\Helpers\Transaction;
use App\Models\Management\ClientsLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\BalancePayments;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Lists;
use App\Models\Management\ShiftManagements;
use App\Models\Management\Transactions;
use Yajra\Datatables\Facades\Datatables;

const CODVENTA = 61;
const URL_EDIT = "/management/pdvi/edit/";
const FISICO = 145;
const VIRTUAL = 146;
const SHIFT_OPEN = 14;

class SalesController extends Controller
{
    public $company = '';
    public $cajero = '';
    public $shift = '';

    public function __construct() {
        $this->middleware('auth');
        if (auth()->user()->roles[0]->name == 'admin') {
            $this->company = 1;
        } else {
            // dd(auth()->user()->id, auth()->user()->roles[0]->name);
            $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        }
        // dd($this->company);
        // dd(auth()->user(), auth()->user()->contract_id, 1);
        $this->cajero = buscar_cajero(auth()->user(), auth()->user()->contract_id, $this->company->id);
        // dd("xxxx ",$this->cajero);
        $this->shift = buscar_turno($this->cajero);
        // dd($this->company, $this->cajero,$this->shift);
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'edit' => URL_EDIT
        ]);
    }

    public function viewlist($group, $page) {
        if(auth()->user()->hasRole('admin') ) {
            $results = Transactions::where('typeoperation_id', CODVENTA)
                // ->where('transactions.contract_id', auth()->user()->contract_id)
                // ->where('transactions.company_id', auth()->user()->contract_id)
                ->with('Contrato', 'Comercio', 'Catalogo', 'Cliente', 'User', 'Seller', 'Estado');
        } else {
            if ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ) {

                // if ( $this->shift->typeshift_id == 14 || $this->shift->typeshift_id == 15 ) {
                if ( $this->shift->typeshift_id != 10 ) {

                    $users = CompaniesUsers::select('companies_users.user_id')
                        ->where('companies_users.company_id', $this->company->id)
                        ->get()->toArray();

                    array_push($users, ["user_id" => auth()->user()->id]);

                    $turnosCajeros = ShiftManagements::select('id')
                        ->whereIn('shift_managements.typeshift_id', [12,14])
                        ->whereIn('shift_managements.user_id', $users)
                        ->get()->toArray();

                } else {
                    $turnosCajeros = BalancePayments::selectRaw('trim(substr(balance_payments.description_payment,18,21)) as turno')
                        ->whereRaw('balance_payments.description_payment LIKE "Cierre Caja Turno%"')
                        ->where('balance_payments.shiftmanagement_id', $this->shift->id)
                        ->pluck('turno')->toArray();

                    array_push($turnosCajeros, $this->shift->id);
                }
                // dd($turnosCajeros);
                $results = Transactions::whereIn('transactions.shiftmanagement_id', $turnosCajeros)
                        ->where('typeoperation_id', CODVENTA)
                        ->where('transactions.contract_id', auth()->user()->contract_id)
                        ->where('transactions.company_id', $this->company->id)
                        ->with('Contrato', 'Comercio', 'Catalogo', 'Cliente', 'User', 'Seller', 'Estado');
            } else { 
                $results = Transactions::where('typeoperation_id', CODVENTA)
                        ->where('transactions.contract_id', auth()->user()->contract_id)
                        ->where('transactions.company_id', $this->company->id)
                        ->where('transactions.shiftmanagement_id', $this->shift->id)
                        ->with('Contrato', 'Comercio', 'Catalogo', 'Cliente', 'User', 'Seller', 'Estado');
                $this->escajero =  auth()->user()->hasRole('cajero') ? true : false;

                if ( $this->escajero ) {
                    $this->esVendedorBack = find_parameter(auth()->user()->contract_id, $this->company->id, 'VendedorBackOffice', auth()->user()->id);
                    if ( $this->esVendedorBack ) {
                        $results->where('transactions.seller_id', auth()->user()->id);
                    } else {
                        $results->where('transactions.user_id', auth()->user()->id);
                    }
                } else if (auth()->user()->hasRole('vendedor') ) {
                    $results->where('transactions.seller_id', auth()->user()->id);
                    } else {
                    $results = new Transactions();  
                }
            }
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/salesitems?transactionId={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Sales Detail') . '" 
                            <i class="fa fa-list" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj1 = new \stdClass();
        $obj1->link = '<a onClick="onEditConfirmation(this)" 
                            data-id="{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Resume Sale') . '">
                            <i class="fa fa-arrow-right" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        $obj2 = new \stdClass();
        $obj2->link = '<a onClick="leer_info_ticket({{ $model->id }})"
                            data-id="{{ $model->id }}"
                            data-placement="top"
                            data-toggle="tooltip"
                            title="' . __('Print Ticket') . '" 
                            <i class="fa fa fa-print" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                        </a>';
        $obj2->vars = array();
        $obj2->vars[] = array();
        $obj2->vars[0]['name'] = 'model->id';
        $obj2->vars[0]['value'] = 'id';

        $obj3 = new \stdClass();
        $obj3->link = '<a onClick="rejectSale({{ $model->id }})" 
                            data-id="{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Reject Sale') . '">
                            <i class="fa fa-window-close" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj3->vars = array();
        $obj3->vars[] = array();
        $obj3->vars[0]['name'] = 'model->id';
        $obj3->vars[0]['value'] = 'id';

        $buttons = array();
        array_push($buttons, $obj,$obj2);

        return Datatables::of($results)

            ->editColumn('total_value', function ($data) {
                return '$ ' . number_format($data->total_value, 2);
            })
            ->addColumn('type', function ($model) {
                return $model->saletype_id == FISICO ? __('Fisico') : __('Virtual');
            })
            ->addColumn('pivot', function ($model) {
                return $model->status == 2 ? 0 : 1;
            })
            ->addColumn('client', function ($model) {
                return $model->cliente != null
                    ? ClientsLogin::where('client_id', $model->cliente->id)->value('email')
                    : '';
            })
            //habilitar boton $obj3 al perfil de administrador de tienda
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj1, $obj3) {
                switch($model->status){
                    case TransactionsStatusEnum::ACTIVE :
                        if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')){
                            array_push($buttons, $obj3);
                        }
                        break;
                    case TransactionsStatusEnum::ON_HOLD :
                        if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')){
                            if($model->shiftmanagement_id == $this->shift->id ){
                                array_push($buttons, $obj1, $obj3);
                            }else{
                                array_push($buttons, $obj3); 
                            }
                        }
                        if(auth()->user()->hasRole('cajero') || auth()->user()->hasRole('vendedor')){
                            array_push($buttons, $obj1, $obj3);
                        }           
                        break;
                }
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })->escapeColumns(['action'])->make(true);
    }

    public function activate(Request $request, $group, $page) {
        $list = Lists::find($request->id);
        $list->public = !$list->public;
        $list->save();
    }

    // public function getContractImage($contract){

    //     $path  = '/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT);
    //     $file = '/logo000001.png';
    //     $filepath = $path.$file;

    //     $exists = file_exists(public_path($filepath));

    //     if(!$exists) $filepath = '/support/pictures/partners/001'.$file;

    //     return $filepath;
    // }

    public function download($id) {

        $pdf = create_pdf_sale($id);
        $numventa = Transactions::select('id')->where('id', $id)->get();

        // $sale = Transactions::where('id', $id)
        //     ->with('Cliente','User','Seller','typeOperation')
        //     ->first();

        // $details = TransactionsDetails::where('transaction_id', $id)->get();

        // $sale->totalArt = 0;
        // foreach ($details as $detail) {
        //     $sale->totalArt += $detail->quantity;
        // }

        // $payments = TransactionsPaymentmethods::where('transaction_id',$id)
        //     ->with('formaPago')->get();

        // $payItems = TransactionsPaymentmethods::where('transaction_id', '=', $id)->get()->count();

        // $numventa = Transactions::select('id')->where('id', $id)->get();

        // $company = Company::where('id', $sale->company_id)
        //     ->with('Persona','RegimenImpuestos')
        //     ->first();

        // $img = $this->getContractImage(auth()->user()->contract_id);

        // $contract = Contract::where('id',auth()->user()->contract_id)
        //     ->with('Persona')->first();

        // $resDian = Counterscontrol::where('type_transaction', 61)
        //     ->where('contract_id', $contract->id)
        //     ->where('companies_id', $company->id)
        //     ->first();

        // // dd('sale', $sale, 'details', $details, 'payments', $payments,'payItems', $payItems, 'company', $company, 'img', $img, 'contract', $contract, 'resDian', $resDian);

        // $pdf = \PDF::loadView('pdf.venta', ['sale' => $sale, 'details' => $details, 'payments' => $payments,
        //     'payItems' => $payItems, 'company' => $company, 'img' => $img, 'contract' => $contract, 'resDian' => $resDian ])
        //     ->setPaper('A5', 'portrait');

        return $pdf->download('venta-' . $numventa[0]->id . '.pdf');
    }

    public function reject($group, $page, $id) {
        $transaction = new Transaction($id);
        return $transaction->reject($group, $page);
    }
}
