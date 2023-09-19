<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Company;
use App\Models\Management\CredentialsServices;
use App\Models\Management\Lists;
use http\Exception\BadMethodCallException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Yajra\Datatables\Datatables;
/**
 * Constantes
 */
const SERVICIOS_EXTERNOS = 109;
const NO_IDENTIFY = 'N/A';
const SISTECREDITO_ID = 112;
const MULTIMARCA_ID = 110;

class ServicecredentialsController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');

        //Listas de los servicios
        $this->listServices = Lists::where('idowner', '=', SERVICIOS_EXTERNOS)->whereRaw('id <> idowner')->get();

//        //Lista de las comercios del usuario
        $this->listCompanies = !auth()->user()->hasRole('admin')
            ? Company::select('companies.*', 'persons.socialreason', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
                ->join('persons', 'persons.id', '=', 'companies.person_id')
                ->with('Contrato', 'Persona')
                ->where('contract_id', '=', auth()->user()->contract_id)
                ->get()
            : Company::select('companies.*', 'persons.socialreason', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
                ->join('persons', 'persons.id', '=', 'companies.person_id')
                ->with('Contrato', 'Persona')
                ->get();
//        //Lista de las comercios con la compañia multimarca asociada

        $this->listCompaniesWithProvider = !auth()->user()->hasRole('admin')
            ? CredentialsServices::with('provider','contract')
                ->where('type_url', '=', 'PRD')
                ->where('contract_id',auth()->user()->contract_id)
                ->get()
            : CredentialsServices::with('provider','contract')->get();

    }

    public function viewlist($group, $page)
    {
        $results = !auth()->user()->hasRole('admin')
            ? CredentialsServices::with('provider','contract')
                ->where('type_url', '=', 'PRD')
                ->where('contract_id',auth()->user()->contract_id)
                ->get()
            :  CredentialsServices::with('provider','contract')->get();


        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('type_url', function ($e) {
                return $e->type_url == 'PRD' ? __('Production') : __('Tester');
            })->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    public function index($group, $page, $data=null)
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
            'listServices' => $this->listServices,
            'listCompanies' => $this->listCompanies,
            'StoreId' => $data ? $data->storeId : null,
            'listCompaniesWithProvider' => $this->listCompaniesWithProvider

        ]);
    }

    public function edit($group, $page, $id)
    {
        $itemEdit = CredentialsServices::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'perEdit' => $perEdit,
            'itemEdit' => $itemEdit,
            'listServices' => $this->listServices,
            'listCompanies' => $this->listCompanies,
            'listCompaniesWithProvider' => $this->listCompaniesWithProvider
        ]);
    }

    public function save(Request $request, $group, $page)
    {


        $validator = Validator::make($request->all(), [
            'status' => 'required',
            "type_url" => 'required',
            'secret_key' => 'sometimes|required',
            'password' => 'sometimes|required',
            'user_name' => 'sometimes|required',
            'end_point' => 'sometimes|required',
            "accessToken" => 'sometimes|required',
            "storeId" => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return $request->serviceId > 0 ? back()->withInput()->withErrors($validator) : back()->withInput()->withErrors($validator);
        }

        try {
            DB::beginTransaction();
            $credentials = $request->serviceId > 0 ? CredentialsServices::find($request->serviceId) : new CredentialsServices();

            $encdec = new \App\Http\Controllers\Security\EncdecController;

            $credentials->user_name = isset($request->user_name) ? $request->user_name : NO_IDENTIFY;
            $credentials->password = (empty($request->serviceId) && isset($request->password))
                ? $encdec->encrypt_decrypt('encrypt', $request->password)
                : (($request->password != $credentials->password)
                    ? $encdec->encrypt_decrypt('encrypt', $request->password)
                    : $request->password);
            $credentials->provider = $request->provider_id;
            $credentials->key = isset($request->secret_key) ? $request->secret_key : NO_IDENTIFY;
            $credentials->url_service = isset($request->end_point) ? $request->end_point : NO_IDENTIFY;
            $credentials->type_url = isset($request->type_url) ? $request->type_url : NO_IDENTIFY;
            $credentials->access_token = isset($request->accessToken) ? $request->accessToken : NO_IDENTIFY;
            $credentials->contract_id = $contract_id;
            $credentials->status = $request->status;
            $credentials->save();

            if(isset($request->companies_id)){
                $this->saveStoreId($credentials->id,$request->companies_id);
            }

            DB::commit();
            return $request->serviceId > 0 ? back()->with('success', array(__('Updated successfuly'))) : back()->with('success', array(__('Created successfuly')));

        } catch (\Exception $e) {

            DB::rollback();
            return back()->with('errors', array(__('Error creating the product, if error continues contact an administrator')));
        }


    }


    public function delete($group, $page, $id)
    {
        try {
            CredentialsServices::where('id', '=', $id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    /**
     * Guarda el Store id 
     * @param $storeId
     * @param $companyId
     */
    public function saveStoreId($storeId,$companyId)
    {
        $credentials = CredentialsServices::where('company_id',$companyId)->first();
        if(!$credentials){
            return back()->with('errors', array(__("La comercio no tiene credenciales asociadas, Favor crearlas primero")));
        }

        $credentials->store_id = $storeId;
        $credentials->save();

    }

    /**
     * Credenciales por contrato
     * @param Request $request
     * @param $contract_id
     */
    public function saveCredentialByContract($subscripcion_key, $contract_id)
    {
        $credential = CredentialsServices::where('contract_id',$contract_id)->first();
        if(!$credential){
            $credential = new CredentialsServices();
        }
            $credential->contract_id = $contract_id;
            $credential->provider = SISTECREDITO_ID;
            $credential->url_service = env('URL_SISTECREDITO');
            $credential->key = $subscripcion_key;
            $credential->type_url = 'PRD';
            $credential->status = 1;
            $credential->save();

    }


}
