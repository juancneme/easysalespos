<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\ContractsController;
use App\Http\Controllers\Management\PersonsController;
use App\Http\Controllers\Management\SuppliersController;
use App\Http\Controllers\Management\UsersController;
use App\Models\Management\Category;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Lists;
use App\Models\Management\Person;
use \App\Models\Management\Supplier;
use App\Models\Management\Role;
use App\Models\Management\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Validator;
use \App\Models\Management\Address;
use \App\Models\Management\Contact;
use Illuminate\Support\Facades\File;
const TIPOS_DOCUMENTOS = 4;
const PAISES = 19;
const MUNICIPIOS = 21;
const TIPO_CONTACTO_COREO = 37;
const PATH_FILE = "/support/docsContracts/";
const DOCUMENTOS_CONTRATO = 95;
//PERSONS
const DEPARTMENT_NEWSTORE = 2002;
const TYPE_ADDRESS_NEWSTORE = 23;
const TYPE_EMAIL_NEWSTORE = 33;
//CONTRACTS
const QUANTITY_STORES = 1;
const QUANTITY_USER = 2;
const TYPE_CONTRACT = 40;
const TIME_BILLING = 123;
const TAX_REGIMEN = 44;
//USER
const USER_IMG = "user000000.png";
//COMPANIES
class NewsupplierController extends Controller
{

    public function __construct() {
    }

    public function registernewsupplier()
    {

        $tipoidentificacion = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')->get();
        //return view('management.passwords.newsupplier');

        $itemscountries = Lists::where('idowner', '=', PAISES)->whereRaw('id <> idowner')
            ->where('code', 'COL')
            ->orderBy('order', 'asc')->get();
        $itemscities = Lists::where('idowner', '=', MUNICIPIOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $categorias = Category::where('contract_id', 1)->get();

        $documentContract = Lists::where('idowner', '=', DOCUMENTOS_CONTRATO)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        return view('auth.newsupplier', [
            'tipoidentificacion' => $tipoidentificacion,
            'itemscountries' => $itemscountries,
            'itemscities' => $itemscities,
            'categorias' => $categorias,
            'documentContract' => $documentContract
        ]);
    }

    public function save(Request $request)
    {

        $count_file = count($request->coun_file) - 1;
        $file = $request->file('upload_file');
        if (isset($file)) {
            for ($i = 0; $i < $count_file; $i++) {
                $ext = $file[$i]->getClientOriginalExtension();
                if ($ext != 'pdf') {
                    return redirect()->back()->with('error','EL archivo seleccionado solo puede ser .pdf');

                }
            }
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion1' => 'required',
            'numberdocumento' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:users',
            'nombretienda' => 'required',
            'identificacion2' => 'required',
            'numberdocumento2' => 'required',
            'direccion' => 'required',
            'email2' => 'required|email',

        ]);
        // validate fields
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // crear persona para el contrado
        // retorna el id de la persona creada

        try {

            // crear persona para el contrado
            // retorna el id de la persona creada
            $nombrepartes = explode(" ", $request->nombre);
            $apellidopartes = explode(" ", $request->apellido);
            Input::merge(['typeper' =>2]);
            Input::merge(['typedoc' =>$request->identificacion1]);
            Input::merge(['numberdocument' =>$request->numberdocumento]);
            Input::merge(['digitcheck' =>""]);
            Input::merge(['socialreason' =>""]);
            Input::merge(['firstname' =>$nombrepartes[0]]);
            Input::merge(['othernames' =>count($nombrepartes)>= 2 ? $nombrepartes[1] :""]);
            Input::merge(['lastname' =>$apellidopartes[0]]);
            Input::merge(['otherlastname' =>count($apellidopartes)>= 2 ? $apellidopartes[1] :""]);
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            Input::merge(['birthdate' =>$date]);
            Input::merge(['status' =>1]);
            Input::merge(['typesex' =>null]);
            Input::merge(['typecivilstatus' =>null]);
            Input::merge(['country' =>$request->pais]);
            Input::merge(['city' =>$request->ciudad]);
            Input::merge(['address' =>array($request->direccion)]);
            Input::merge(['typeaddress' =>array(TYPE_ADDRESS_NEWSTORE)]);
            Input::merge(['default_address' =>array(1)]);
            Input::merge(['default_email' =>array(1)]);
            Input::merge(['textcontact_email' =>array($request->email)]);
            Input::merge(['typecontact_email' =>array(TYPE_EMAIL_NEWSTORE)]);

            $personaparacontrado = (new PersonsController)->savePersons($request,'newstore',null);

            // se crea el contrato
            // retorna el id del contrato creado
            Input::merge(['person' =>$personaparacontrado]);
            Input::merge(['quantitystores' =>QUANTITY_STORES]);
            Input::merge(['timebilling' =>TIME_BILLING]);
            Input::merge(['typecontract' =>TYPE_CONTRACT]);
            Input::merge(['taxregime' =>TAX_REGIMEN]);
            Input::merge(['numbercontract' =>true]);
            Input::merge(['quantityusers' =>QUANTITY_USER]);
            Input::merge(['status' =>1]);
            $time = Carbon::now('America/Bogota');
            Input::merge(['startdate' =>$time->toDateTimeString()]);
            Input::merge(['enddate' =>$time->addYears(1)->addDay()]);

            $idcontrato = (new ContractsController)->save($request,'newstore',null);


            // se crea el usuario administrador de contrato
            //retorna el idusercontrato
            //$usuarioadministrador = $this->crearUsuario($request, $personaparacontrado, $idcontrato, $request->email, 2);
            $parte1email = explode("@", $request->email);
            $emaildistribuidor = $parte1email[0] . "@easysales.com";

            // se crea el usuario administrador de contrato
            //retorna el idusercontrato
            Input::merge(['password' =>$request->numberdocument]);
            Input::merge(['name' =>$request->firstname]);
            Input::merge(['persona' =>$personaparacontrado]);
            Input::merge(['contrato' =>$idcontrato]);
//            Input::merge(['email' =>$emaildistribuidor]);
            Input::merge(['email' =>$request->email]);
            Input::merge(['image' =>USER_IMG]);
            Input::merge(['roles' =>array(2)]);
            // se crea el usuario cajero
            $usuariodistribuidor   = (new UsersController)->save($request,'newstore',null);


            // se crea persona juridica
//            Input::merge(['email' =>$request->email2]);
//            $personajurica = (new PersonsController)->savePersons($request,'newstore',null);
            // se crea la comercio
            Input::merge(['contract' =>$idcontrato]);
            $nombrecorto = explode(" ", $request->nombretienda);
            Input::merge(['shortname' =>$nombrecorto[0]]);
            Input::merge(['name' =>$request->nombretienda]);
//            Input::merge(['persona' =>$personajurica]);
            Input::merge(['image' =>'supl000000.png']);
            Input::merge(['order' =>1]);

            (new SuppliersController)->save($request,'newstore',null);


            /**
             * Funcion para guardar archivos
             */
            $arrayDocs = [];

            $aux = 0;
            $contracts = Contract::find($idcontrato);
            if ($count_file > 0) {
                if (!file_exists("storage/app/filecontracts")) {
                    mkdir("storage/app/filecontracts/", 777);
                }
                for ($i = 0; $i < $count_file; $i++) {
                    $aux = $aux + 1;
                    $files = $request->hasFile('upload_file');
                    if ($files) {
                        $file = $request->file('upload_file');
                        $number_idfile = str_pad($request->id_file[$i], 3, '0', STR_PAD_LEFT);
                        $file_path = $contracts->numbercontract . '/' . $contracts->numbercontract . '_' . $number_idfile . '.pdf';
                        $file_db = '0' . $aux . '|' . $number_idfile . '|' . $contracts->numbercontract;
                        Storage::disk('local')->put($file_path, \File::get($file[$i]));
                        array_push($arrayDocs, $file_db);
                    }
                }
                $contracts->docssuppor = implode('|', $arrayDocs);
                $contracts->save();
            }

            // credenciales para el envio del email
            $emailadminstradorcontrato = ''; //$usuarioadministrador->email;
            $emaildistribuidor = $usuariodistribuidor->email;
            $claveusuario = $request->numberdocumento;
            $for = $request->email;
            $subject = "Credenciales para ingreso para la plataforma PDVI";
            // envio de correos
            Mail::send('emails.maildistribuidor', ['claveusuario' => $claveusuario, 'emailadminstradorcontrato' => $emailadminstradorcontrato, 'emaildistribuidor' => $emaildistribuidor], function ($msj) use ($subject, $for) {
                $msj->subject($subject);
                $msj->to($for);
            });

            return redirect('/auth/login')->with('success', ["Credenciales enviadas al correo: ".$emaildistribuidor ]);

        } catch (\Throwable $th) {

            return back()->with('errors', array(__("The record can´t be saved. Please review data and try again later")));
        }



    }


}
