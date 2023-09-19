<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Person;
use App\Models\Management\Address;
use App\Models\Management\Contact;
use App\Models\Management\User;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Role;
use DB;

use Carbon\Carbon;

const TIPOS_DOCUMENTOS = 4;
const PAISES = 19;
const MUNICIPIOS = 21;
const TIPO_CONTACTO_COREO = 37;
const PATH_FILE = "/support/docsContracts/";
const DOCUMENTOS_CONTRATO = 95;

trait NewRegisterController
{
    public function crearPersona($request, $tipopersona, $identificacion, $numerodocumento, $email)
    {
        // Separar el nombre y apellido
        $nombrepartes = explode(" ", $request->nombre);
        $apellidopartes = explode(" ", $request->apellido);

        $perm = new Person();
        $perm->typeperson_id = $tipopersona;
        $perm->typedocument_id = $identificacion;
        $perm->numberdocument = $numerodocumento;
        $perm->digitcheck = "";
        $perm->socialreason = "";
        $perm->firstname = $nombrepartes[0];
        if (count($nombrepartes) >= 2) {
            $perm->othernames = $nombrepartes[1];
        } else {
            $perm->othernames = "";
        }
        $perm->lastname = $apellidopartes[0];
        if (count($apellidopartes) >= 2) {
            $perm->otherlastname = $apellidopartes[1];
        } else {
            $perm->otherlastname = "";
        }
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $perm->birthdate = $date;
        $perm->status = 1;
        $perm->sex_id = null;
        $perm->civilstatus_id = null;
        $perm->save();

        // datos de la persona
        $locat = new Address();

        $locat->person_id = $perm->id;
        $locat->country_id = $request->pais;
        $locat->deparment_id = 2002;
        $locat->city_id = $request->ciudad;
        $locat->address = $request->direccion;
        $locat->postalcode = 0000;
        $locat->typeaddress_id = 23;
        $locat->default = 1;
        $locat->status = 1;
        $locat->save();

        //ya
        $contE = new Contact();

        $contE->person_id = $perm->id;
        $contE->type_id = TIPO_CONTACTO_COREO;
        $contE->typecontact_id = 33;
        $contE->textcontact = $email;
        $contE->default = 1;
        $contE->status = 1;
        $contE->save();

        return $perm->id;
    }


    public function crearContrato($idcontrato)
    {
        $nuevocontrato = new Contract();
        $date = Carbon::now();
        $ym = ($date->format('Ym')) * 100;
        $maxnumcon = Contract::select(DB::raw("max(contracts.numbercontract) as maxnum"))
            ->where('contracts.numbercontract', '>', $ym)
            ->value('maxnum');
        if (!empty($maxnumcon)) {
            $nuevocontrato->numbercontract = $maxnumcon + 1;
        } else {
            $nuevocontrato->numbercontract = $ym + 1;
        }
        $nuevocontrato->typecontract_id = 40; //tipo de contrado opracion PDV
        $nuevocontrato->person_id = $idcontrato;
        $time = Carbon::now('America/Bogota');
        $nuevocontrato->startdate = $time->toDateTimeString();
        $nuevocontrato->enddate = $time->addYears(1)->addDay();
        $nuevocontrato->timebilling = 123;
        $nuevocontrato->taxregime_id = 44; //regimen comun por defecto
        $nuevocontrato->quantitystores = 1; //cantidad de comercios
        $nuevocontrato->quantityusers = 2; //cantidad de usuarios
        $nuevocontrato->status = 1;
        $nuevocontrato->save();

        return $nuevocontrato->id;
    }

    public function crearUsuario($request, $personaparacontrado, $idcontrato, $email, $rol)
    {
        $user = new User();

        $user->password = bcrypt($request->numberdocumento);
        $user->person_id = $personaparacontrado;
        $user->contract_id = $idcontrato;
        $user->name = $request->nombre;
        // funcion para sacar el email

        // vaida que no exista mas de un email y nombre de usuario repetido
        // $uname = User::where('email', '=', $parte1email[0]."@easysales.com")->first();
        // if (!empty($uname->id)) {
        //     return back()->with('errors', array(__('Email User already exists')));
        // }

        $user->email = $email;
        $user->image = "user000000.png";
        $user->status = 1;
        $user->save();
        $roles = array($rol);
        $user->detachRoles(Role::get());
        $user->save();
        $user->attachRoles($roles);
        $user->save();

        ContractsPersons::where('type_user', '=', 'user')->where('person_id', '=', $request->persona)->delete();
        $piboteContra_persons = new ContractsPersons();
        $piboteContra_persons->contract_id = $user->contract_id;
        $piboteContra_persons->person_id = $personaparacontrado;
        $piboteContra_persons->type_user = 'user';
        $piboteContra_persons->save();

        return $user;

    }

    public function crearCompany($request, $personajurica, $idcontrato, $usuariovendedor)
    {
        $company = new Company();
        $company->contract_id = $idcontrato;
        $company->person_id = $personajurica;
        $company->name = $request->nombretienda;
        $company->slogan = "";
        $company->logo = "comp000000.png";
        $company->typecompany_id = 47; //tipo de sede comercio individual
        $company->idowner = "";
        $time = Carbon::now('America/Bogota');
        $company->startdate = $time->toDateTimeString();
        $company->enddate = $time->addYears(1)->addDay();
        $company->catalog_id = 4000; //falta cual catalogo se va a agregar
        $company->status = 1;
        $company->save();

        ContractsPersons::where('type_user', '=', 'comp')->where('person_id', '=', $personajurica)->delete();
        $piboteContra_persons = new ContractsPersons();
        $piboteContra_persons->contract_id = $company->contract_id;
        $piboteContra_persons->person_id = $personajurica;
        $piboteContra_persons->type_user = 'comp';
        $piboteContra_persons->save();


    }
}
