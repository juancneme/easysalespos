<?php
namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use \App\Models\Management\Courier;
use App\Models\Management\Deliveries;
use App\Models\Management\Lists;
use App\Models\Management\Parameters;
use App\Models\Management\Person;
use App\Models\Management\Vehicle;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;

const VEHICLES = 119;
const NO_VEHICLE = 120;

const IN_TRANSIT = 134;
const ASIGNED = 133;

class CouriersController extends Controller{

    public $companies;

    public function __construct() {

        $this->middleware("auth");

        $this->persons = Person::join('contracts_persons', 'persons.id', 'contracts_persons.person_id')
            ->where('contracts_persons.type_user', 'courier')
            ->where('contracts_persons.contract_id', auth()->user()->contract_id)
            ->get();

        if(!auth()->user()->hasRole('admin')) {
            $this->persons->where('contracts_persons.contract_id',auth()->user()->contract_id);
        }

        $this->vehicles = Lists::where('idowner',VEHICLES)
            ->where('id','!=',VEHICLES)->get();

        if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
            $this->companies = Company::where('contract_id', auth()->user()->contract_id)
                ->where('admon_id', auth()->user()->id)
                ->get();
        } else {
            $this->companies = Company::join('companies_users', 'companies_users.company_id', 'companies.id')
                ->where('companies_users.user_id', auth()->user()->id)
                ->get();
        }

        $this->perAddcourier = true;

        if (auth()->user()->hasRole('cajero')) {
            $company = CompaniesUsers::where('user_id', auth()->user()->id)
            ->value('company_id');

            $this->esCajeroDomicilios = find_parameter(auth()->user()->contract_id, $company, 'CajeroDomicilios', auth()->user()->id);
            $this->autDomicilios = find_parameter(auth()->user()->contract_id, $company, 'autDomicilios', auth()->user()->id);

            if (!$this->esCajeroDomicilios && !$this->autDomicilios) {
                $this->perAddcourier = false;
            }
    
        }

    }

    public function index($group, $page) {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        // if (auth()->user() !== null && !auth()->user()->hasRole('admin'))
        //     $this->contracts = Contract::where('contracts.id', '=', auth()->user()->contract_id)
        //         ->where('contracts.id','<>',1)
        //         ->orderBy('numbercontract', 'asc')->get();
        // else
        //     $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,

            'persons' => $this->persons,
            'companies' => $this->companies,
            'vehicles' => $this->vehicles,
            'perAddcourier' => $this->perAddcourier

        ]);
    }

    public function viewlist($group, $page){

        $this->hayCajeroDomicilios = false;
        $this->esCajeroDomicilios = false;
        $this->autDomicilios = false;
        $this->dispatch_courier = false;

        if (auth()->user()->hasRole('admin')) {

            $results = Courier::selectRaw('couriers.*, sum(if(deliveries.status=133 || deliveries.status=134, 1, 0)) AS cantidad')
                ->with('person','company','vehicle')
                // ->join('companies', 'companies.id', 'couriers.company_id')
                ->leftjoin('deliveries','deliveries.courier_id','couriers.id')
                // // ->where('companies.contract_id', auth()->user()->contract_id)
                // // ->where('couriers.company_id', $company)
                ->groupBy('couriers.id');

        } elseif (auth()->user()->hasRole('adcontrato')) {

            $results = Courier::selectRaw('couriers.*, sum(if(deliveries.status=133 || deliveries.status=134, 1, 0)) AS cantidad')
                ->with('person','company','vehicle')
                ->join('companies', 'companies.id', 'couriers.company_id')
                ->leftjoin('deliveries','deliveries.courier_id','couriers.id')
                ->where('companies.contract_id', auth()->user()->contract_id)
                // ->where('couriers.company_id', $company)
                ->groupBy('couriers.id');

        } elseif ( auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {

            $this->dispatch_courier = true;
            $this->autDomicilios = true;

            $company = Company::where('admon_id', auth()->user()->id)
                ->value('id');

            $results = Courier::selectRaw('couriers.*, sum(if(deliveries.status=133 || deliveries.status=134, 1, 0)) AS cantidad')
                ->with('person','company','vehicle')
                ->join('companies', 'companies.id', 'couriers.company_id')
                ->leftjoin('deliveries','deliveries.courier_id','couriers.id')
                ->where('companies.contract_id', auth()->user()->contract_id)
                ->where('couriers.company_id', $company)
                ->groupBy('couriers.id');

        } elseif (auth()->user()->hasRole('cajero')) {

            $this->dispatch_courier = true;

            $company = CompaniesUsers::where('user_id', auth()->user()->id)
                ->value('company_id');

            $this->hayCajeroDomicilios = find_parameter(auth()->user()->contract_id, $company, 'CajeroDomicilios');
    
            $this->esCajeroDomicilios = find_parameter(auth()->user()->contract_id, $company, 'CajeroDomicilios', auth()->user()->id);
    
            $this->autDomicilios = find_parameter(auth()->user()->contract_id, $company, 'autDomicilios', auth()->user()->id);

            $results = Courier::selectRaw('couriers.*, sum(if(deliveries.status=133 || deliveries.status=134, 1, 0)) AS cantidad')
                ->with('person','company','vehicle')
                ->join('companies', 'companies.id', 'couriers.company_id')
                ->leftjoin('deliveries','deliveries.courier_id','couriers.id')
                ->where('companies.contract_id', auth()->user()->contract_id)
                ->where('couriers.company_id', $company)
                ->groupBy('couriers.id');

            if ( $this->hayCajeroDomicilios ) {
                if ( $this->esCajeroDomicilios ) {
                    $this->autDomicilios = true;
                } else {
                    $results->whereIn('couriers.status', []);
                }
            } else {
                if ( !$this->autDomicilios ) {
                    $results->whereIn('couriers.status', []);
                }
            }
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/couriers/dispatchCourier?id={{ $model->id }}" 
                        data-placement="top" data-toggle="tooltip"
                        title="' . __('Despatch courier') . '">
                        <i class="fa fa-bicycle" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                    </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();

        return Datatables::of($results->get())
            ->addColumn('fullname', function ($model) {
                return $model->Person->fullname;
            })
            ->addColumn('identification', function ($model) {
                return $model->Person->identification;
            })
            ->addColumn('company', function ($model) {
                if($model->Company != null){return $model->Company->name;}
                return null;
            })
            ->addColumn('vehicle', function ($model) {
                if($model->Vehicle != null){return $model->Vehicle->type->name;}
                return null;
            })
            ->addColumn('record', function ($model) {
                if($model->Vehicle != null){return $model->Vehicle->register;}
                return null;
            })
            ->addColumn('estado', function ($model) {
                if($model->status == 1)
                    return  __('Active');
                else if($model->status == 2)
                    return  __('Not Available');
                else
                    return  __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj) {
                if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') || auth()->user()->hasRole('cajero')) {
                if ($model->status == 1 && $model->cantidad > 0) {
                    array_push($buttons, $obj);
                }
                }
                return getListForm($model->id, $group, $page,$buttons,$model,true,true);
            })
           ->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id){

        $courierEdit = Courier::where('couriers.id',$id)
            ->with('person','company','vehicle')
            ->first();

        $this->persons = Person::join('contracts_persons','persons.id','contracts_persons.person_id')
            ->where('type_user','courier')
            ->where('persons.id',$courierEdit->person_id)->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),

            'persons' => $this->persons,
            'companies' => $this->companies,
            'vehicles' => $this->vehicles,
            'perAddcourier' => $this->perAddcourier,

            'courierEdit' => $courierEdit
        ]);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
                    'person' => 'required',
                    'company' => 'required',
                    'vehicle' => 'required',
                    // 'register' => Rule::requiredIf($request->vehicle > 120),
                    'status' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if ($request->courierId > 0) {
            $courier = Courier::find($request->courierId);
            $vehicle = Vehicle::where('id',$courier->vehicle_id)->first();
        } else {
            $courier = new Courier();
            $vehicle = new Vehicle();
        }

        try {
            $vehicle->type_id = $request->vehicle;
            if ($request->vehicle == 120) {
                $vehicle->register = "SIN VEHICULO";
            } else {
                $vehicle->register = strtoupper($request->register);
            }
            $vehicle->status = 1;
            $vehicle->save();

            $courier->vehicle_id = $vehicle->id;

            $courier->company_id = $request->company;
            $courier->person_id = $request->person;
            $courier->status = 1;
            $courier->save();

        } catch (Exception $e) {
            return redirect(strtolower('/'.$group.'/'.$page))->with('errors', array(__("Courier can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }


    public function delete($group, $page, $id) {
        $res = Courier::where('id', '=', $id);
        if ($res){
            $courier = Courier::findOrFail($id);
            $courier->status = 3;
            $courier->update();
            return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Deleted successfuly'));
        }else{
            return redirect(strtolower('/'.$group.'/'.$page))->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }

    public function dispatchCourier($group, $page)
    {

        $id = Input::get('id');
        $courier = Courier::with('delivery')->findOrFail($id);
        if($courier->delivery->count() === 0)
            return redirect(strtolower('/'.$group.'/'.$page))->with('infos', __('Courier not have delivery'));
        $courier->status = 2;
        $courier->update();

        $deliveries = Deliveries::where('courier_id',$id)
            ->where('status',ASIGNED)->get();

        foreach ($deliveries as $delivery) {
            $delivery->status = IN_TRANSIT;
            $delivery->update();
        }
        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Dispatched courier successfuly'));
    }


}



