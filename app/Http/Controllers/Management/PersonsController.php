<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\In;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use \App\Models\Management\Person;
use \App\Models\Management\Lists;
use \App\Models\Management\Address;
use \App\Models\Management\Contact;
use \App\Models\Management\Direccion;
use Illuminate\Support\Facades\Input;
use App\Models\Management\ContractsPersons;
use App\Models\Management\InfoGuarantees;
use App\Models\Management\Clients;

const TIPOS_PERSONAS = 1;
const TIPOS_DOCUMENTOS = 4;
const PAISES = 19;
const DEPARTAMENTOS = 20;
const MUNICIPIOS = 21;
const TIPOS_UBICACIONES = 22;
const TIPOS_EMAILS = 26;
const TIPOS_TELEFONOS = 30;
const TIPO_CONTACTO_COREO = 37;
const TIPO_CONTACTO_TELEFONO = 38;
const TIPO_ESTADO_CIVIL = 85;
const TIPO_SEXO = 82;
const IDPAIS = '1047';
const PAIS = 'COL';

class PersonsController extends Controller
{

    public $itemstypeperson = '';
    public $itemstypedocument = '';
    public $itemscountries = '';
    public $itemsstates = '';
    public $itemscities = '';
    public $itemslocations = '';
    public $itemsemails = '';
    public $itemsphones = '';

    public function __construct()
    {
        $this->middleware('auth');

        $this->itemstypeperson = Lists::where('idowner', '=', TIPOS_PERSONAS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();
        $this->itemstypecivilstatus = Lists::where('idowner', '=', TIPO_ESTADO_CIVIL)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->itemstypeSex = Lists::where('idowner', '=', TIPO_SEXO)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->itemstypedocument = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        //PAISES
        $this->itemscountries = Lists::where('idowner', '=', PAISES)->whereRaw('id <> idowner')
            //->where('code','=', PAIS )
            ->orderBy('order', 'asc')->get();
        //DEPARTAMENTOS
        $this->itemsstates = Lists::where('idowner', '=', DEPARTAMENTOS)->whereRaw('id <> idowner')
            ->whereRaw('substr(code,1,3) = "' . PAIS . '"')//CODIGO PAIS SELECCIONADO
            ->orderBy('order', 'asc')->get();
        //CIUDADES
        $this->itemscities = Lists::where('idowner', '=', MUNICIPIOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->itemslocations = Lists::where('idowner', '=', TIPOS_UBICACIONES)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();
        $this->itemsemails = Lists::where('idowner', '=', TIPOS_EMAILS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();
        $this->itemsphones = Lists::where('idowner', '=', TIPOS_TELEFONOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypeperson' => $this->itemstypeperson,
            'itemstypedocument' => $this->itemstypedocument,
            'itemscountries' => $this->itemscountries,
            'itemsstates' => $this->itemsstates,
            'itemscities' => $this->itemscities,
            'itemslocations' => $this->itemslocations,
            'itemsemails' => $this->itemsemails,
            'itemsphones' => $this->itemsphones,
            'itemstypecivilstatus' => $this->itemstypecivilstatus,
            'itemsSex' => $this->itemstypeSex,
            'errors' => $errors,
            'success' => $success,
        ]);
    }

    //crear persona para el usuarios logueado
    public function createPerson($group, $page, $tipoDC = '')
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        if ($page == 'cancellationdebtor') {
            $this->itemstypeperson = Lists::where('idowner', '=', TIPOS_PERSONAS)
                ->whereRaw('id <> idowner')
                ->where('id', 3)
                ->orderBy('order', 'asc')->get();
            $this->itemstypedocument = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)
                ->whereRaw('id <> idowner')
                ->where('id', 10)
                ->orderBy('order', 'asc')->get();
        } else {
            $this->itemstypedocument = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)
                ->whereRaw('id <> idowner')
                ->where('id', '<>', 10)
                ->orderBy('order', 'asc')->get();
        }

        return view('management.personscreate', [
            'group' => $group,
            'page' => $page,
            'itemstypeperson' => $this->itemstypeperson,
            'itemstypedocument' => $this->itemstypedocument,
            'itemscountries' => $this->itemscountries,
            'itemsstates' => $this->itemsstates,
            'itemscities' => $this->itemscities,
            'itemslocations' => $this->itemslocations,
            'itemsemails' => $this->itemsemails,
            'itemsphones' => $this->itemsphones,
            'itemstypecivilstatus' => $this->itemstypecivilstatus,
            'itemsSex' => $this->itemstypeSex,
            'perEdit' => '',
            'tipoDC' => $tipoDC,
            'errors' => $errors,
            'success' => $success
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Person::with('TypePerson', 'TypeDocument');

        return Datatables::of($results)
            ->addColumn('typeperson', function ($model) {
                return $model->TypePerson->name;
            })
            ->addColumn('fullname', function ($model) {
                return $model->fullname;
            })
            ->addColumn('identification', function ($model) {
                return $model->identification;
            })
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })
            ->filterColumn('fullname', function ($query, $keyword) {
                $sql = "CONCAT(socialreason, firstname, ' ', othernames, ' ',lastname, ' ',otherlastname) like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $personsEdit = Person::where('id', '=', $id)
            ->with('Location')
            ->with('ContactEmail')
            ->with('ContactPhone')
            ->first();


        $perEdit = !validatePermission('edit', $page) ? 'disabled' : '';

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypeperson' => $this->itemstypeperson,
            'itemstypedocument' => $this->itemstypedocument,
            'itemscountries' => $this->itemscountries,
            'itemsstates' => $this->itemsstates,
            'itemscities' => $this->itemscities,
            'itemslocations' => $this->itemslocations,
            'itemsemails' => $this->itemsemails,
            'itemstypecivilstatus' => $this->itemstypecivilstatus,
            'itemsSex' => $this->itemstypeSex,
            'itemsphones' => $this->itemsphones,
            'perEdit' => $perEdit,
            'personsEdit' => $personsEdit
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        $validator = Validator::make($request->all(), [
            'typeper' => 'required',
            'typedoc' => 'required',
            'numberdocument' => 'required|numeric|digits_between:1,25',
            'digitcheck' => 'required_if:typeper,==,3|numeric|digits_between:1,1',
            'firstname' => 'required_if:typeper,==,2',
            'lastname' => 'required_if:typeper,==,2',
            'socialreason' => 'required_if:typeper,==,3',
            'address.*' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
            // return redirect(strtolower('/'.$group . '/' . $page))->withInput()->withErrors($validator->errors()->all());
        }
        $saveperson = $this->guardarPersona($request);

        if($saveperson === false)
            return back()->withInput()->withErrors('El número de identificación ya se encuentra asociado a una persona.');
        else
            return back()->with('success', array(__('Saved successfuly')));
    }

    public function delete($group, $page, $id)
    {
        try {
            Person::where('id', '=', $id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));

    }

    public function activate(Request $request, $group, $page)
    {
        $perm = Person::find($request->id);
        $perm->status = !$perm->status;
        $perm->save();
    }

    public function ajax(Request $request, $group, $page)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        $url = $request->url;

        switch ($type) {
            case 'savePersons':
                if($url=='management/pdvi'){

                    $value = $this->savePersons($request, $group, $page);
                    if($value === false){
                        $result->successid = false;
                    }
                    else {

                        $result->data = $value[0];
                        $result->success = $value[0];
                        $result->id = $value[1];
                        $result->personid = $value[2];
                    }

                    $person = Client::where('id',$value[1])->value('person_id');
                    $email = Contact::where('type_id',37)
                        ->where('person_id',$person)->value('textcontact');
                    if(!empty($email))
                        $result->email = $email;
                    else
                        $result->email = '';
                }
                else{
                    $result->data = $this->savePersons($request, $group, $page);
                    if($result->data === false){
                        $result->successid = false;
                    }
                    $result->success = $result->data === true ? true : false;
                }
                break;
            case 'editPerson':
                $result->data = $this->editPerson($group, $page, Input::get("id"));
                $result->success = $result->data === true ? true : false;
                break;
            case 'selectIdentificacion':
                $result->data = $this->selectIdentificacion($group, $page, Input::get("id"));
                $result->success = true;
                break;

        }
        //return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        //return back();
        return json_encode($result);
    }


    public function selectIdentificacion($group, $page, $id)
    {

        $documents = '';
        switch ($id) {
            //persona natural
            case '2':
                $documents = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')->whereIN('id', ['5', '7', '8', '9'])->get();
                break;
            //persona tributario
            case '3':
                $documents = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')->whereIN('id', ['6'])->get();
                break;
            default:
                break;
        }
        return $documents;
    }


    /**
     * Funcion para obtener el id en el select  del formulario de usuario para editar una persona
     */
    public function editPerson($group, $page, $id)
    {
        //Aca es la logica de la View Person
        $url = explode("&", \Request::getRequestUri());
        $viewPerson = isset($url[1]) ? $url[1] : null;

        $user_id = Input::get("user");
        $inscription_id = Input::get("inscription");
        $perEdit = Input::get("peredit");

        if ($page == 'cancellationdebtor') {
            $this->itemstypeperson = Lists::where('idowner', '=', TIPOS_PERSONAS)
                ->whereRaw('id <> idowner')
                ->where('id', 3)
                ->orderBy('order', 'asc')->get();
            $this->itemstypedocument = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)
                ->whereRaw('id <> idowner')
                ->where('id', 10)
                ->orderBy('order', 'asc')->get();
        } else {
            $this->itemstypedocument = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)
                ->whereRaw('id <> idowner')
                ->where('id', '<>', 10)
                ->orderBy('order', 'asc')->get();
        }

        $personsEdit = Person::with('Location')
            ->with('ContactEmail')
            ->with('ContactPhone')
            ->find($id);

        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        if (auth()->user()->contract_id == 1 || $id == '-1' || $inscription_id == '-1') {  // OJO contrato asignado para tramites de la CCIT
            $perEdit = '';
        }
//        else{
//            $perEdit = !validatePermission('edit', $page) ? 'disabled' : '';
//        }
        return view('management.personscreate', [
            'group' => $group,
            'page' => $page,
            'itemstypeperson' => $this->itemstypeperson,
            'itemstypedocument' => $this->itemstypedocument,
            'itemscountries' => $this->itemscountries,
            'itemsstates' => $this->itemsstates,
            'itemscities' => $this->itemscities,
            'itemslocations' => $this->itemslocations,
            'itemsemails' => $this->itemsemails,
            'itemsphones' => $this->itemsphones,
            'itemstypecivilstatus' => $this->itemstypecivilstatus,
            'itemsSex' => $this->itemstypeSex,
            'errors' => $errors,
            'success' => $success,
            'user_id' => $user_id,
            'inscription_id' => $inscription_id,
            'perEdit' => $perEdit,
            'personsEdit' => $personsEdit,
            'viewPerson' => $viewPerson,

        ]);
    }


//metodo solo para guardar cuando un usuario nesecita crear otra persona
    public function savePersons(Request $request, $group, $page)
    {   //ojo estan al reves
        // get request fields

        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'typeper' => 'required',
                'typedoc' => 'required',
                'firstname' => 'required_if:typeper,==,2',
                'lastname' => 'required_if:typeper,==,2',
                'socialreason' => 'required_if:typeper,==,3',
                'typecivilstatus' => 'required_if:typeper,==,2',
                'typesex' => 'required_if:typeper,==,2',
                'address.*' => 'required',
                'numberdocument' => 'required',
                'textcontact_phone.*' => 'required|numeric|digits_between:6,10',
                'textcontact_email.*' => 'required|email'

            ]);

            if ($validator->fails()) {
                return array('errors' => $validator->getMessageBag()->toArray());
            }

            if ($request->url == 'management/changedebtor') {
                $request->personsId = -1;
            }
            if ($request->url == 'management/changecreditor') {
                $request->personsId = -1;
            }

            $idperson = $this->guardarPersona($request);


            switch ($request->url) {

                case 'management/users':
                    if($idperson === false){
                        return false;
                    }
                    if (is_null($request->personsId)) {
                        $piboteContra_persons = new ContractsPersons();
                        $piboteContra_persons->contract_id = auth()->user()->contract_id;
                        $piboteContra_persons->person_id = $idperson;
                        $piboteContra_persons->type_user = 'user';
                        $piboteContra_persons->save();
                    }
                    break;

                case 'management/contracts':
                    if($idperson === false){
                        return false;
                    }
                    if (is_null($request->personsId)) {
                        $piboteContra_persons = new ContractsPersons();
                        $piboteContra_persons->contract_id = auth()->user()->contract_id;
                        $piboteContra_persons->person_id = $idperson;
                        $piboteContra_persons->type_user = 'cont';
                        $piboteContra_persons->save();
                    }
                    break;

                case 'management/pdvi':
                    if($idperson === false){
                        return false;
                    }
                    else {
                        if (is_null($request->personsId)) {
                            $client = new Client();
                            $client->contract_id = auth()->user()->contract_id;
                            $client->person_id = $idperson;
                            $client->status = 1;
                            $client->save();
                            $idclient = $client->id;
                            return [true, $idclient, $idperson];
                        }
                    }
                    break;

                case 'management/formulationorders':
                    if($idperson === false){
                        return false;
                    }
                    if (is_null($request->personsId)) {
                        $client = new Client();
                        $client->contract_id = auth()->user()->contract_id;
                        $client->person_id = $idperson;
                        $client->save();
                        $idclient = $client->id;
                        return [true,$idclient];
                    }
                    break;

                case 'management/couriers':
                    if($idperson === false){
                        return false;
                    }
                    if (is_null($request->personsId)) {
                        $piboteContra_persons = new ContractsPersons();
                        $piboteContra_persons->contract_id = auth()->user()->contract_id;
                        $piboteContra_persons->person_id = $idperson;
                        $piboteContra_persons->type_user = 'courier';
                        $piboteContra_persons->save();
                    }
                    break;
            }

            return true;

        } else {
            return $this->guardarPersona($request);
        }
        // return redirect($group.'/users')->with('success', __('Saved successfuly'));
    }


    public function guardarPersona(Request $request)
    {
        $person = Person::join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
            ->where('typedocument_id', $request->typedoc)
            ->where('numberdocument', $request->numberdocument)
            ->where('contract_id', auth()->user()->contract_id)
            ->first();



        if (isset($person->id) && !$person->id === intval($request->personsId)) {
            return false;
        }else {

            if ($request->personsId > 0) {
                $perm = Person::find($request->personsId);
            } else {
                $perm = new Person();
            }

            $perm->typeperson_id = $request->typeper;
            $perm->typedocument_id = $request->typedoc;
            $perm->numberdocument = $request->numberdocument;
            $perm->digitcheck = $request->digitcheck;
            $perm->socialreason = $request->socialreason;
            $perm->firstname = $request->firstname;
            $perm->othernames = $request->othernames;
            $perm->lastname = $request->lastname;
            $perm->otherlastname = $request->otherlastname;
            $perm->birthdate = $request->birthdate;
            $perm->status = $request->status;
            $perm->sex_id = $request->typesex;
            $perm->civilstatus_id = $request->typecivilstatus;
            $perm->save();

            /**
             * Old address
             */

            $this->saveAddress($request, $perm->id);
            $this->savePhones($request, $perm->id);
            $this->saveEmails($request, $perm->id);


            if ($request->url === 'management/persons' || $request->url === 'management/companies') {
                $contractperson = new ContractsPersons();
                $contractperson->contract_id = auth()->user()->contract_id;
                $contractperson->person_id = $perm->id;
                $contractperson->type_user = $request->url === 'management/companies' ? 'cont' : 'person';
                $contractperson->save();
            }
            return $perm->id;
        }
    }

    public function saveAddress($request, $personId)
    {

        for ($i = 0; $i < count($request->address); $i++) {
            if ($request->personsId > 0 && ($request->idaddres[$i] > 0)) {
                $locat = Address::find(trim($request->idaddres[$i]));
            } else {

                $locat = new Address();
                $locat->status = 1;
            }
            $depart = Lists::where('code', '=', $request->state)->value('id');
            $locat->person_id = $personId;
            $locat->country_id = $request->country;
            $locat->deparment_id = empty($depart) ? 2002 : $depart;
            $locat->city_id = $request->city;
            $locat->address = $request->address[$i];
            $locat->default = $request->default_address[$i];
            $locat->typeaddress_id = $request->typeaddress[$i];
            $locat->save();
        }

        /**
         * Borrar datos
         */
        if ($request->editadd) {
            $editArray = explode(",", $request->editadd);
            $datosborraraddress = array_intersect($request->idaddres, $editArray);
            if ($datosborraraddress > 0) {
                $arraygeneranado = array_values($datosborraraddress);
                for ($a = 0; $a < count($arraygeneranado); $a++) {
                    $edit = Address::find($arraygeneranado[$a]);
                    $edit->status = 0;
                    $edit->update();
                }
            }
        }

    }

    function savePhones($request, $personId)
    {
        //ARRAY PHONE
        if ($request->textcontact_phone) {
            $countPho = count($request->textcontact_phone);
            for ($i = 0; $i < $countPho; $i++) {
                if ($request->personsId > 0 && ($request->idphone[$i] > 0)) {
                    $contE = Contact::find($request->idphone[$i]);
                } else {
                    $contE = new Contact();
                    $contE->status = 1;
                }
                $contE->person_id = $personId;
                $contE->type_id = TIPO_CONTACTO_TELEFONO;
                $contE->textcontact = $request->textcontact_phone[$i];
                $contE->typecontact_id = $request->typecontact_phone[$i];
                $contE->default = $request->status_phone[$i];
                $contE->save();
            }

            /**
             * Borrar datos
             */
            $editArrayPhone = explode(",", $request->editphone);
            $datosborrarphone = array_intersect($request->idphone, $editArrayPhone);
            if ($datosborrarphone > 0) {
                $arraygeneranado = array_values($datosborrarphone);
                for ($a = 0; $a < count($arraygeneranado); $a++) {
                    $edit = Contact::find($arraygeneranado[$a]);
                    $edit->status = 0;
                    $edit->update();

                }
            }
        }


    }

    function saveEmails($request, $personId)
    {

        //ARRAY emal
        if ($request->textcontact_email) {
            $countEma = count($request->textcontact_email);
            for ($i = 0; $i < $countEma; $i++) {
                if ($request->personsId > 0 && ($request->idemail[$i] > 0)) {
                    $contE = Contact::find($request->idemail[$i]);
                } else {
                    $contE = new Contact();
                    $contE->status = 1;
                }

                $contE->person_id = $personId;
                $contE->type_id = TIPO_CONTACTO_COREO;
                $contE->textcontact = $request->textcontact_email[$i];
                $contE->typecontact_id = $request->typecontact_email[$i];
                $contE->default = $request->default_email[$i];
                $contE->save();

            }

            /**
             * Borrar datos
             */
            if ($request->editemail) {
                $editArray = explode(",", $request->editemail);
                $datosborraremail = array_intersect($request->idemail, $editArray);

                if ($datosborraremail > 0) {
                    $arraygeneranado = array_values($datosborraremail);
                    for ($a = 0; $a < count($arraygeneranado); $a++) {
                        $edit = Contact::find($arraygeneranado[$a]);
                        $edit->status = 0;
                        $edit->update();

                    }
                }
            }

        }


    }


}
