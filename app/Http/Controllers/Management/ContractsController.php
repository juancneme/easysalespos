<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;

use App\Models\Management\Contact;
use App\Models\Management\CredentialsServices;
use App\Models\Management\User;
use App\Models\Management\Users;
use \App\Models\Management\Lists;
use \App\Models\Management\Person;
use \App\Models\Management\Contract;
use \App\Models\Management\ContractsPersons;

const path_image1 ='';
const path_default = "/support/pictures/partners/001";
const TIPOS_CONTRATOS = 140;
const TIPOS_REGIMENES = 42;
const TIPOS_PAGOS = 91;
const ID_EFECTIVO = 92;
const EFECTIVO_ENTREGA = 147;

class ContractsController extends Controller
{
    public $itemstypecontract = '';
    public $itemstyperegime = '';
    public $persons = '';
    public $itemstypepay = '';

    public function __construct()
    {
        $this->middleware('auth');
        if (!empty(auth()->user())) {
            $this->itemstypecontract = Lists::where('idowner', '=', TIPOS_CONTRATOS)->whereRaw('id <> idowner')
                ->orderBy('order', 'asc')->get();
            $this->itemstyperegime = Lists::where('idowner', '=', TIPOS_REGIMENES)->whereRaw('id <> idowner')
                ->orderBy('order', 'asc')->get();

//        $this->persons = Person::take(1)->get();
            $this->persons = Person::join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
                ->where('contracts_persons.contract_id', '=', auth()->user()->contract_id)
                ->whereIn('contracts_persons.type_user', ['comp', 'cont'])
                ->distinct()->orderBy('id', 'asc')->get();

            $this->itemstypepay = Lists::where('idowner', '=', TIPOS_PAGOS)
                ->whereNotIn('id',[ID_EFECTIVO,EFECTIVO_ENTREGA])
                ->whereRaw('id <> idowner')
                ->orderBy('name', 'asc')->get();
        }
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $pathDefaults = [];
        for ($i = 0; $i < 5; $i++) {
            $index = $i + 1;
            array_push($pathDefaults, path_default.'/logo00000'.$index.'.png');
        }
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');


        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypecontract' => $this->itemstypecontract,
            'itemstyperegime' => $this->itemstyperegime,
            'persons' => $this->persons,
            'perEdit' => '',
            'image' => 'comp000000.png',
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => "",
            'img1' => $pathDefaults[0],
            'img2' => $pathDefaults[1],
            'img3' => $pathDefaults[2],
            'img4' => $pathDefaults[3],
            'img5' => $pathDefaults[4],
            'itemstypepay' => $this->itemstypepay
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Contract::select('contracts.*', DB::raw("CONCAT(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
            ->join('persons', 'persons.id', '=', 'contracts.person_id')
            ->with('TypeContract', 'Persona')
            ->orderBy('contracts.numbercontract', 'desc');

        if (auth()->user()->contract_id != 1) {
            $results->where('contracts.id', '=', auth()->user()->contract_id);
        }

//        $this->persons = Person::whereIn('id','=',[$contractEdit->person_id])->get();

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('fullname', function ($model) {
                return $model->persona->fullname;
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })
            ->escapeColumns(['action'])
            ->filterColumn('fullname', function ($query, $keyword) {
                $sql = "nombrecompleto like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->make(true);
    }

    public function edit($group, $page, $id)
    {
        $contractEdit = Contract::find($id);

        if (auth()->user()->contract_id != 1) {
            $perEdit = "disabled";
        } else {
            $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        }

        $this->persons = Person::select('persons.*')
            ->join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
            ->where('contracts_persons.type_user', '=', 'cont')
            ->where('contracts_persons.contract_id', '=', $contractEdit->id)
            ->get();
        $number_idfile = str_pad($contractEdit->id, 3, '0', STR_PAD_LEFT);


        $pathDefaults = [];
        $paths = [];
        $imgs = [];
        for ($i = 0; $i < 5; $i++) {
            $index = $i + 1;
            array_push($pathDefaults, path_default.'/logo00000'.$index.'.png');
            array_push($paths, '/support/pictures/partners/' . $number_idfile . '/logo' . '00000' . $index . '.png');
            array_push($imgs, $paths[$i]);
        }

        $this->credentials = CredentialsServices::where('contract_id',$id)->first();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypecontract' => $this->itemstypecontract,
            'itemstyperegime' => $this->itemstyperegime,
            'persons' => $this->persons,
            'perEdit' => $perEdit,
            'contractEdit' => $contractEdit,
            'image' => 'comp000000.png',
            'img1' => !file_exists(public_path($paths[0])) ? $pathDefaults[0] : $imgs[0],
            'img2' => !file_exists(public_path($paths[1])) ? $pathDefaults[1] : $imgs[1],
            'img3' => !file_exists(public_path($paths[2])) ? $pathDefaults[2] : $imgs[2],
            'img4' => !file_exists(public_path($paths[3])) ? $pathDefaults[3] : $imgs[3],
            'img5' => !file_exists(public_path($paths[4])) ? $pathDefaults[4] : $imgs[4],
            'path' => path_image1,
            'itemstypepay' => $this->itemstypepay,
            'haveCredential' => $this->credentials
        ]);
    }

    public function save(Request $request, $group, $page)
    {

        // get request fields
        $validator = Validator::make($request->all(), [
            'numbercontract' => 'sometimes|unique:contracts,numbercontract,' . $request->id_contrac,
            'quantitystores' => 'required',
            'quantityusers' => 'required',
            'startdate' => 'required',
            'enddate' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
//            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
            return back()->withInput()->withErrors($validator);
        }

        try {
            if ($request->contractId > 0) {
                $contract = Contract::where('id', '=', $request->contractId)->first();
                $contract->numbercontract = $request->numbercontract;
            } else {
                // $numcon = Contract::where('numbercontract', '=', $request->numbercontract)->first();
                // if (!empty($numcon->id)) {
                //     return back()->with('errors', array(__('Numbercontract already exists')));
                // }
                $contract = new Contract();

                $date = Carbon::now();
                $ym = ($date->format('Ym')) * 100;

                $maxnumcon = Contract::select(DB::raw("max(contracts.numbercontract) as maxnum"))
                    ->where('contracts.numbercontract', '>', $ym)
                    ->value('maxnum');
                if (!empty($maxnumcon)) {
                    $contract->numbercontract = $maxnumcon + 1;
                } else {
                    $contract->numbercontract = $ym + 1;
                }

            }


            $idSeparator = $request->payments != null  ? implode('|',$request->payments) : '';

            $contract->typecontract_id = $request->typecontract;
            $contract->person_id = $request->person;
            $contract->startdate = $request->startdate;
            $contract->enddate = $request->enddate;
            $contract->timebilling = $request->timebilling;
            $contract->taxregime_id = $request->taxregime;
            $contract->quantitystores = $request->quantitystores;
            $contract->quantityusers = $request->quantityusers;
            $contract->paymentsmethods = $idSeparator;
            $contract->status = $request->status;
            $contract->save();

            if(!empty($request->payments)){
                if (in_array('107',$request->payments))
                        (new ServicecredentialsController)->saveCredentialByContract($request->subscripcion_key,$contract->id);

            }

            if ($request->contractId <= 0) {
                // Genracion de la key de coneccion para el contrato Nuevo.
                $contract->keyfisico = $this->generar_key_login($contract->id, 'f');
                $contract->keyvirtual = $this->generar_key_login($contract->id, 'v');
                $contract->save();
            }

            if ($request->contractId > 0) {
                $piboteContra_persons0 = ContractsPersons::where('contract_id', '=', $request->contractId)->where('type_user', '=', 'cont')->where('person_id', '=', $request->person)->count();
                if ($piboteContra_persons0 >= 1) {
                    $piboteContra_persons = ContractsPersons::where('contract_id', '=', $request->contractId)->where('type_user', '=', 'cont')->where('person_id', '=', $request->person)->firstOrFail();

                } else {
                    $piboteContra_persons = new ContractsPersons();
                }
            } else {
                $user = Users::where('person_id', $request->person)->where('contract_id',$request->contractId)->get();

                if(count($user)>0){
                    $email = Users::where('person_id', $request->person)->value('email');
                }
                else{
                    $email = Contact::where('type_id',37)->where('person_id', $request->person)->value('textcontact');
                }
                $url = explode('/',$request->url1);

                if(!empty($email)) $this->sendMail($email, $url[2], $contract->keyfisico, $contract->keyvirtual);

                $piboteContra_persons = new ContractsPersons();
            }
            $piboteContra_persons->contract_id = $contract->id;
            $piboteContra_persons->person_id = $request->person;
            $piboteContra_persons->type_user = 'cont';
            $piboteContra_persons->save();

            $logos = [];
            array_push($logos, $request->logo_1);
            array_push($logos, $request->logo_2);
            array_push($logos, $request->logo_3);
            array_push($logos, $request->logo_4);
            array_push($logos, $request->logo_5);
            if (count($logos) > 0) {
                for ($i = 0; $i < count($logos); $i++) {
                    $index = $i + 1;
                    $files = $request->hasFile('logo_' . $index);
                    if ($files) {
                        $file = $request->file('logo_' . $index);
                        $number_contract =  $request->id_contrac > 0 ? $request->id_contrac : $contract->id;
                        $number_idfile = str_pad($number_contract, 3, '0', STR_PAD_LEFT);
                        $name_logo = str_pad($index, 6, '0', STR_PAD_LEFT);
                        $file_path = public_path('/support/pictures/partners/' . $number_idfile . '/');
                        $file_name = 'logo' . $name_logo . '.png';
                        $file->move($file_path,$file_name);
                        //Storage::disk('local')->put($file_path, \File::get($file));
                        //Storage::disk('public')->put($file_path, \File::get($file));
                    }
                }
            }

            //solo para NEWSTORE
            if ($group === 'newstore') {
                return $contract->id;
            }

        } catch (Exception $e) {
            return back()->with('errors', array(__("Contract can't be saved. Please review data and try again later")));
        }
        if (isset($request->excelFile)) {
            return true;
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
        try {
            Contract::where('id', '=', $id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function ajax(Request $request, $group, $page)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'listcontratantes':
                $result->data = $this->listcontratantes($group, $page);
                $result->success = true;
                $result->message = $this->message;
                break;
            case 'acceptConditions':
                $result = $this->acceptConditions();
                return json_encode($result);
        }

        return json_encode($result);

    }

    public function acceptConditions(){
        $userId = auth()->user()->id;
        $success = false;

        DB::beginTransaction();

        try{
            $user = User::find($userId);
            $user->authorization = Carbon::now()->toDateTimeString();
            $user->update();

            $success = true;
            DB::commit();
        }
        catch(\Exception $e){
            dd($e);
            DB::rollback();
        }

        return [
            'success' => $success,
            'contract' => auth()->user()->contract_id,
            'userId' => auth()->user()->id,
            'date_authorization' => $user->authorization
        ];
    }

    public function listcontratantes($group, $page)
    {

        $contractsIns = Contract::select('person_id')->get();

        $persontrats = ContractsPersons::select('persons.*', DB::raw("concat(socialreason, firstname, ' ',othernames, ' ',lastname, ' ',otherlastname) AS nombrecompleto"))
            ->leftJoin('persons', 'persons.id', '=', 'contracts_persons.person_id')
            ->whereNotin('persons.id', $contractsIns)
            ->groupBy('persons.numberdocument')
            ->orderBy('nombrecompleto', 'asc')
            ->distinct()
            ->get();

        return $persontrats;
    }

    public function generar_key_login($mContract, $mType)
    {

        $encdec = new \App\Http\Controllers\Security\EncdecController();
        return $encdec->encrypt_decrypt('encrypt', $mContract . '|' . $mType);

    }

    public function sendMail($email, $url, $keyfisica, $keyvirtual){
        $subject = __("Register to the PDVI platform");
        Mail::send('emails.newcontractmail', ['emailuser'=>$email,'contract_id'=>auth()->user()->contract_id,
            'url'=>$url, 'keyfisica'=>$keyfisica, 'keyvirtual'=>$keyvirtual],function ($msj) use ($subject, $email) {
            $msj->subject($subject);
            $msj->to($email);
        });
    }


}
