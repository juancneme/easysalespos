<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\UrbanCouriersController;
use App\Models\Management\Address;
use App\Models\Management\Client;
use App\Models\Management\Company;
use App\Models\Management\Courier;
use App\Models\Management\Deliveries;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Lists;
use App\Models\Management\Person;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;
use App\Models\Management\Parameters;
use App\Models\Management\TransactionsPaymentmethods;
use Exception;
use DB;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Helpers\Transaction;
//Enums
use App\Enums\DeliveryStatusEnum;
use App\Enums\TransactionsStatusEnum;
use App\Enums\StatusEnum;

const ENLISTMENT = 131;
const PREPARED = 132;
const ASIGNED = 133;
const IN_TRANSIT = 134;
const RECEIVED = 135;
const CANCEL = 136;

const SERVICE = 124;

const MENSAJEROS_COMERCIO = 125;
const MENSAJEROS_URBANOS = 126;


class DeliveriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group, $page)
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
        ]);
    }

    public function viewlist($group, $page)
    {
        $this->arrStatus = [IN_TRANSIT, ENLISTMENT, PREPARED, ASIGNED, RECEIVED, CANCEL];

        $this->hayCajeroDomicilios = false;
        $this->esCajeroDomicilios = false;
        $this->autDomicilios = false;

        if (auth()->user()->hasRole('admin')) {

            $results = Deliveries::whereIn('deliveries.status', $this->arrStatus)
                ->with('status', 'address', 'courier', 'couriercompany', 'transaction');
                // ->get();

        } elseif (auth()->user()->hasRole('adcontrato')) {

            $results = Deliveries::where('deliveries.contract_id', auth()->user()->contract_id)
                ->whereIn('deliveries.status', $this->arrStatus)
                ->with('status', 'address', 'courier', 'couriercompany', 'transaction');
                // ->get();

        } elseif ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
            
            $this->autDomicilios = True;

            $company = Company::where('admon_id', auth()->user()->id)
                ->value('id');

            $results = Deliveries::where('deliveries.company_id', $company)
                ->whereIn('deliveries.status', $this->arrStatus)
                ->with('status', 'address', 'courier', 'couriercompany', 'transaction');
                // ->get();

        } elseif (auth()->user()->hasRole('cajero')) {

            $company = CompaniesUsers::where('user_id', auth()->user()->id)
                ->value('company_id');

            $this->hayCajeroDomicilios = Parameters::select('*')
                ->where('parameters.contract_id', auth()->user()->contract_id)
                ->where('parameters.company_id', $company)
                ->where('parameters.parameter', 'CajeroDomicilios')
                ->where('status', 1)
                ->exists();
    
            $this->esCajeroDomicilios = Parameters::select('*')
                ->where('parameters.contract_id', auth()->user()->contract_id)
                ->where('parameters.company_id', $company)
                ->where('parameters.parameter', 'CajeroDomicilios')
                ->where('parameters.value', auth()->user()->id)
                ->where('status', 1)
                ->exists();
    
            $this->autDomicilios = Parameters::select('*')
                ->where('parameters.contract_id', auth()->user()->contract_id)
                ->where('parameters.company_id', $company)
                ->where('parameters.parameter', 'autDomicilios')
                ->where('parameters.value', auth()->user()->id)
                ->where('status', 1)
                ->exists();

                if ( $this->hayCajeroDomicilios ) {
                if ( $this->esCajeroDomicilios ) {
                    $this->autDomicilios = true;
                } else {
                    $this->arrStatus = [];
                }
            } else {
                if ( !$this->autDomicilios ) $this->arrStatus = [IN_TRANSIT];
            }

            $results = Deliveries::where('deliveries.company_id', $company)
                ->whereIn('deliveries.status', $this->arrStatus)
                ->with('status', 'address', 'courier', 'couriercompany', 'transaction');
                // ->get();
        }

        $results->select('deliveries.*')
                ->join('lists', 'lists.id', 'deliveries.status')
                ->join('transactions', 'transactions.id','deliveries.transaction_id')
                ->orderBy('lists.order', 'asc')
                ->orderBy('transactions.id', 'desc');


        // dd($results->get()[0]);

        // $results->orderBy('');

        $obj1 = new \stdClass();
        $obj1->link = '<a href="/management/deliveryproducts?id={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Detail of the delivery') . '">
                            <i class="fa fa-list" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                       </a>';
        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        $obj = new \stdClass();
        $obj->link = '<a href="/management/deliveries/sendOrder?id={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Assign courier') . '"
                            <i class="fa fa-share" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';

        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj2 = new \stdClass();
        $obj2->link = '<a onClick="confirmDelivery({{ $model->id }})" 
                            data-id="{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Prepare delivery') . '">
                            <i class="fa fa-check" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                       </a>';
        $obj2->vars = array();
        $obj2->vars[] = array();
        $obj2->vars[0]['name'] = 'model->id';
        $obj2->vars[0]['value'] = 'id';

        $obj3 = new \stdClass();
        $obj3->link = '<a onClick="receiveDelivery({{ $model->id }})"
                            data-id="{{ $model->id }}"
                            data-placement="top"
                            data-toggle="tooltip"
                            title="' . __('Confirm delivery status') . '" 
                            <i class="fa fa-car" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                       </a>';

        $obj3->vars = array();
        $obj3->vars[] = array();
        $obj3->vars[0]['name'] = 'model->id';
        $obj3->vars[0]['value'] = 'id';

        // $obj4 = new \stdClass();
        // $obj4->link = '<a href="/createpdf/{{ $model->id }}" 
        //                     class="btn btn-secondary" 
        //                     style="margin-right: 7px" 
        //                     data-placement="top" 
        //                     data-toggle="tooltip" 
        //                     title="' . __('Create PDF') . '">
        //                     <i class="fa fa-file-pdf-o"></i>
        //                </a>';
        // $obj4->vars = array();
        // $obj4->vars[] = array();
        // $obj4->vars[0]['name'] = 'model->id';
        // $obj4->vars[0]['value'] = 'transaction_id';

        $obj5 = new \stdClass();
        $obj5->link = '<a onClick="leer_info_ticket({{ $model->id }})"
                            data-id="{{ $model->id }}"
                            data-placement="top"
                            data-toggle="tooltip"
                            title="' . __('Print Ticket') . '" 
                            <i class="fa fa-print" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                       </a>';
        $obj5->vars = array();
        $obj5->vars[] = array();
        $obj5->vars[0]['name'] = 'model->id';
        $obj5->vars[0]['value'] = 'transaction_id';


        $buttons = array();
        //      array_push($buttons, $obj, $obj1, $obj2);

        return Datatables::of($results)
            ->addColumn('courier', function ($model) {
                if ($model->courier != null) {
                    return $model->courier->Person->fullname . $model->courier->Person->identification;
                }
                return null;
            })
            ->addColumn('transaction', function ($model) {
                return $model->transaction->id;
            })
            ->addColumn('city', function ($model) {
                if ($model->address != null) {
                    return $model->address->city;
                }
                return null;
            })
            //columna cliente en deliveries
            // ->addColumn('client', function ($model) {
            //    if ($model->address != null) {
            //        return $model->address->person_id;
            //
            //   }
            //    return null;
            //})
            ->addColumn('address', function ($model) {
                if ($model->transaction->info_client != null) {
                    if ($model->address != null) {
                        return $model->transaction->info_client.' '.$model->address->address;
                    }
                }
                return null;
            })
            ->addColumn('company', function ($model) {
                if ($model->couriercompany != null) {
                    return $model->couriercompany->name;
                }
                return 'Entrega en comercio';
            })
            ->addColumn('enddate', function ($model) {
                return $model->enddate == '0000-00-00 00:00:00' ? '--' : $model->enddate;
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj, $obj1, $obj2, $obj3, $obj5) {

                array_push($buttons, $obj1, $obj5);

                switch ($model->status) {

                    case ENLISTMENT :
                        if ( $this->autDomicilios ) array_push($buttons, $obj2);
                        break;

                    case PREPARED:
                        if ( $this->autDomicilios ) array_push($buttons, $obj);
                        break;

                    case DeliveryStatusEnum::IN_TRANSIT:
                        if ( auth()->user()->hasRole('cajero') ) array_push($buttons, $obj3);
                        break;

                    case RECEIVED:
                        // array_push($buttons, $obj1);
                        break;

                    // case CANCEL: 
                    //     $buttons = [];
                    //     break;

                }
                return getListForm($model->id, $group, $page, $buttons, $model, false, false);
            })->escapeColumns(['action'])->make(true);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $this->getStatus($request->status);

        $domicile = new Deliveries();
        $domicile->transaction_id = $request->transaction_id;
        $domicile->courier_id = $request->courier_id;
        //columna nombre cliente en deliveries
        //$domicile->client_id = $request->client_id;
        $domicile->companycourier_id = $request->companycourier_id;
        $domicile->tercero_id = $request->tercero_id;;
        $domicile->tercero_info = $request->third_id;
        $domicile->address_id = $request->address_id;;;
        $domicile->status = $status;
        $domicile->startdate = $request->start_date;
        $domicile->contract_id = $request->contract_id;
        $domicile->company_id = $request->company_id;
        $domicile->save();

        Transactions::where('id', $request->transaction_id)
            ->update(['status' => $status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($group, $page, $id)
    {
        try {

            $delivery = Deliveries::findOrFail($id);

            if ($delivery->status == ENLISTMENT) {

                switch ($delivery->companycourier_id) {
                    case MENSAJEROS_COMERCIO:
                        $delivery->status = PREPARED;
                        break;
                    case MENSAJEROS_URBANOS:
                        $delivery->status = PREPARED;
                        break;
                    default:
                        $delivery->status = IN_TRANSIT;
                        break;
                }
            }
            $delivery->update();

            return redirect(strtolower($group . '/' . $page))->with('success', array(__('Pedido alistado correctamente! ')));

        } catch (\Exception $e) {
            return redirect(strtolower($group . '/' . $page))->with('error', array(__('Error, favor comunicarse con un administrador ')));
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->details;
        $status = $this->getStatus($input);

        //homologar el $status a los codigos nuestros

        $domicile = Deliveries::findOrFail($id);
        $domicile->courier_id = $request->courier_id;
        $domicile->tercero_info = empty($request->third_id) ? $request->details['uuid'] : $request->third_id;
        $domicile->status = $status;
        $domicile->enddate = date("Y/m/d h:i:s");
        $domicile->save();

        //la transaction no se actualiza en este momento.
        Transactions::where('id', $domicile->transaction_id)
            ->update(['status' => $status]);

    }


    /**
     * Return respective status of the Transaction
     * @param $request
     * @return int
     */
    public function getStatus($request)
    {
        switch ($request['status_id']) {
            case 5:
                if (!$request['finish_status']) {
                    return $status = CANCEL;
                }
                return $status = RECEIVED;

            case 6:
                return $status = CANCEL;

            default :
                return $status = IN_TRANSIT;
        }

    }

    public function send($group, $page, Request $request)
    {

        $id = Input::get('id');

        $order = Deliveries::join('transactions', 'transactions.id', 'deliveries.transaction_id')
            ->where('deliveries.id', $id)
            ->value('transaction_id');

        $client = Deliveries::join('persons')
            ->where('deliveries.id', $id)
            ->value('client_id');

            $person = Client::where('clients.id', $client)
            ->join('persons', 'clients.person_id', 'persons.id')
            ->value('person_id');

        $address_id = Deliveries::join('transactions', 'transactions.id', 'deliveries.transaction_id')
            ->where('deliveries.id', $id)
            ->value('address_id');

        $options = Lists::where('idowner', SERVICE)
            ->where('id', '!=', SERVICE)->get();

        $address = Address::where('id', $address_id)
            ->get();

        $city_id = Address::where('id', $address_id)->value('city_id');

        $city = Lists::where('id', $city_id)->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'send' => true,
            'id' => $id,
            'options' => $options,
            'address' => $address,
            'city' => $city
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        $service = $request->deliverie;
        $address = $request->address;

        switch ($service) {
            case MENSAJEROS_COMERCIO:

                $delivery = Deliveries::with('transaction', 'status', 'courier')
                    ->find($request->sale);

                $courier = Courier::where('status', 1)->first();

                try {
                    $delivery->courier_id = $courier->id;
                    $delivery->status = RECEIVED;
                    $delivery->update();

                    $courier->status = 2;
                    $courier->update();

                    return redirect(strtolower($group . '/' . $page))->with('success', array(__('Currier asigned')));
                } catch (\Exception $e) {
                    return redirect(strtolower($group . '/' . $page))->with('errors', array(__('No couriers available')));
                }
                break;
            case MENSAJEROS_URBANOS:

                $urban = new UrbanCouriersController();

                try {
                    return $urban->sendOrder(strtolower($group), strtolower($page), $request->id);
                } catch (GuzzleException $e) {
                    return redirect(strtolower($group . '/' . $page))->with('errors', array(__('Error')));
                }
                break;
        }
    }

    //Validar si el domicilio es local o viene de  otro servicio
    public function validateDelivery()
    {
        $id = Input::get('id');
        $group = 'management';
        $page = 'deliveries';

        $delivery = Deliveries::find($id);

        if($delivery->courier_id)
            return redirect(strtolower($group . '/' . $page))->with('infos', array(__('El pedido No.'.$id.' ya posee un mensajero asignado'  )));

        switch ($delivery->companycourier_id) {
            case MENSAJEROS_URBANOS:
                $urban = new UrbanCouriersController();
                return $urban->sendOrder(strtolower($group), strtolower($page), $id);

            default:
                return $this->showCourierLocal($delivery, $group, $page);
        }

    }

    //Para mensajeros locales devuelve el modal
    private function showCourierLocal($delivery, $group, $page)
    {
        $curriers = Courier::with('person')
            ->where('company_id', $delivery->company_id)
            ->whereIn('status',[1,IN_TRANSIT])->get();

        if (!$curriers->count())
            return redirect(strtolower($group . '/' . $page))->with('errors', array(__('There are no couriers available, please create them in the store')));

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'modal' => true,
            'curriers' => $curriers,
            'delivery_id' =>$delivery->id
        ]);
    }

    public function assignCurrierToDelivery($group, $page, Request $request)
    {
        $delivery = Deliveries::find($request->delivery_id);
        $delivery->courier_id = $request->currier_id;
        $delivery->status = ASIGNED;
        $delivery->update();
          return redirect(strtolower($group . '/' . $page))->with('success', array(__('Courier assigned to order No.'). $delivery->id));
    }

    public function receive($group, $page, $id, $type){
        switch($type){
            case 'delivered':
                return $this->receiveDelivery($group, $page, $id);
                break;
            case 'rejected':
                return $this->rejectDelivery($group, $page, $id);
                break;
        }
    }

    public function receiveDelivery($group, $page, $id){}

    public function rejectDelivery($group, $page, $id){
        $transaction = new Transaction($id, true);
        return $transaction->reject($group, $page);
    }
       
}
