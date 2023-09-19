<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Lists;
use App\Models\Management\Person;
use App\Models\Management\Role;
use App\Models\Management\User;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Management\Company;
use App\Models\Management\CompaniesUsers;



const path_image = "/support/pictures/users/";
const TIPOS_DOCUMENTOS = 4;
class SellersController extends Controller
{

    public $roles = '';
    public $contracts = '';
    public $persons = '';
    public $numusers = true;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $documents = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')->whereIN('id', ['5', '7', '8', '9'])->get();
        $companys = Company::where('contract_id',auth()->user()->contract_id)->get();
       
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'documents' => $documents,
            'perEdit' => $perEdit,
            'companys' =>$companys
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        // auth()->user()->contract_id ya tengo el contrato
        $validator = Validator::make($request->all(), [

            'typedocument' => 'required',
            'email' => 'required|max:100|unique:users,email',
            'numberdocument' => 'required',
            'sellcompany' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // try {
            //code...
            $idperson = $this->savepersons($request->typedocument, $request->numberdocument,$request->firstname,$request->othernames,$request->lastname,$request->otherlastname);
            $user = new User();
            $user->person_id = $idperson;
            $user->contract_id = auth()->user()->contract_id;
            $user->name = strtolower($request->firstname);
            $user->password = bcrypt($request->numberdocument);
            $user->email = $request->email;
            $user->image = "user000000.png";
            $user->status = 1;
            $user->save();

            $roles = array("3");
            $user->detachRoles(Role::get());
            $user->save();
            $user->attachRoles($roles);
            $user->save();

            ContractsPersons::where('type_user', '=', 'user')->where('person_id', '=', $idperson)->delete();
            $piboteContra_persons = new ContractsPersons();

            $piboteContra_persons->contract_id = $user->contract_id;
            $piboteContra_persons->person_id = $idperson;
            $piboteContra_persons->type_user = 'user';
            $piboteContra_persons->save();

            //se asigna el cajero a la comercio
            $ciauser = new CompaniesUsers();
            $ciauser->company_id = $request->sellcompany;
            $ciauser->user_id = $user->id;
            $ciauser->save();

            // credenciales envio de correo para un nuevo cajero
         
            $emailvendedor = $user->email;
            $claveusuario = $request->numberdocument;
            $for = $request->email;
            $subject = "Credenciales para ingreso para la plataforma PDVI del cajero creado";
            // envio de correos
            Mail::send('emails.resetpassword', ['claveusuario' => $claveusuario,'emailventdedor' => $emailvendedor], function ($msj) use ($subject, $for) {
                $msj->subject($subject);
                $msj->to($for);
            });

        return back()->with('success', array(__('Saved successfuly')));
    }

    public function savepersons($identificacion, $numerodocumento,$primernombre,$segundonombre,$primerapellido,$segundoapellido)
    {
        $perm = new Person();
        $perm->typeperson_id = 2; //la persona siempre es natural cuando se crea un cajero
        $perm->typedocument_id = $identificacion;
        $perm->numberdocument = $numerodocumento;
        $perm->digitcheck = "";
        $perm->socialreason = "";
        $perm->firstname = $primernombre;
        $perm->othernames =$segundonombre;
        $perm->lastname = $primerapellido;
        $perm->otherlastname = $segundoapellido;
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $perm->birthdate = $date;
        $perm->status = 1;
        $perm->sex_id = 84;
        $perm->civilstatus_id = 86;
        $perm->save();



        // datos de la persona
        $locat = new Address();

        $locat->person_id = $perm->id;
        $locat->country_id = 1047;
        $locat->deparment_id = 2002;
        $locat->city_id = 2181;
        $locat->address = "";
        $locat->postalcode = 0000;
        $locat->typeaddress_id = 23;
        $locat->default = 1;
        $locat->status = 1;
        $locat->save();
        return $perm->id;
    }

}
