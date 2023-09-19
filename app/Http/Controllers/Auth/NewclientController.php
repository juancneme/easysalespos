<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\Management\Category;
use App\Models\Management\ClientsLogin;

use App\Models\Management\Contract;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Lists;
use App\Models\Management\Person;

use App\Models\Management\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;
use \App\Models\Management\Address;
use \App\Models\Management\Contact;
use \App\Models\Management\Client;

const TIPOS_DOCUMENTOS = 4;
const PAISES = 19;
const MUNICIPIOS = 21;
const TIPO_CONTACTO_CORREO = 37;
const PATH_FILE = "/support/docsContracts/";
const DOCUMENTOS_CONTRATO = 95;
//PERSONS
const DEPARTMENT_NEWSTORE = 2002;
const TYPE_ADDRESS_NEWSTORE = 23;
const TYPE_EMAIL_NEWSTORE = 33;
const TIPO_CONTACTO_TELEFONO = 38;
//CONTRACTS
const QUANTITY_STORES = 1;
const QUANTITY_USER = 2;
const TYPE_CONTRACT = 40;
const TIME_BILLING = 123;
const TAX_REGIMEN = 44;
//USER
const USER_IMG = "user000000.png";
//COMPANIES

const CONTRATO_RUTA = 2;

class NewclientController extends Controller
{
    public function __construct() {}

    public function registernewclient()
    {
        $contract = decrypt(Input::get('contract'));

        $filepath = $this->getImage();

        $tipoidentificacion = Lists::where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')->get();
        //return view('management.passwords.newclient');

        $itemscountries = Lists::where('idowner', '=', PAISES)->whereRaw('id <> idowner')
            ->where('code', 'COL')
            ->orderBy('order', 'asc')->get();
        $itemscities = Lists::where('idowner', '=', MUNICIPIOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $categorias = Category::where('contract_id', 1)->get();

        $documentContract = Lists::where('idowner', '=', DOCUMENTOS_CONTRATO)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        return view('auth.newclient', [
            'tipoidentificacion' => $tipoidentificacion,
            'itemscountries' => $itemscountries,
            'itemscities' => $itemscities,
            'categorias' => $categorias,
            'documentContract' => $documentContract,
            'contract' => $contract,
            'path' => $filepath
        ]);
    }

    public function getImage(){
        $contract = decrypt(Input::get('contract'));

        $path  = '/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT);

        $file = '/logo000001.png';

        $filepath = $path.$file;

        $exists = file_exists(public_path($filepath));

        if(!$exists) $filepath = '/storage/pictures/partners/001/logo000001.png';

        return $filepath;
    }


    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);
        // validate fields
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $person = new Person();

        DB::beginTransaction();

        try {
            $name = explode(' ',$request->name);
            $lastname = explode(' ',$request->lastname);

            $person->typeperson_id = 2;
            $person->typedocument_id = $request->typedoc;
            $person->numberdocument = $request->numberdocument;
            $person->digitcheck = $request->digitcheck;
            $request->socialreason === null ? $person->socialreason = ' ' : $person->socialreason = $request->socialreason;

            if(count($name) > 1){
                $person->firstname = $name[0];
                unset($name[0]);
                $person->othernames = implode($name,' ');
            }
            else{
                $person->firstname = $name[0];
                $person->othernames = ' ';
            }

            if(count($lastname) > 1){
                $person->lastname = $lastname[0];
                unset($lastname[0]);
                $person->otherlastname = implode($lastname,' ');
            }
            else{
                $person->lastname = $lastname[0];
                $person->otherlastname = ' ';
            }

            $person->birthdate = ' ';
            $person->status = $request->status;
            $person->sex_id = $request->typesex;
            $person->civilstatus_id = $request->typecivilstatus;
            $person->status = 1;
            $person->save();

            $contractperson = new ContractsPersons();
            $contractperson->contract_id = $request->contract;
            $contractperson->person_id = $person->id;
            $contractperson->type_user = 'client';
            $contractperson->save();

            $contract = Contract::find($request->contract);

            $key = $contract->keyvirtual;

            //save address
            $this->saveAddress($request,$person->id);

            //save email
            $this->saveEmail($request,$person->id);

            //save phone
            $this->savePhone($request,$person->id);

            //save client
            $client_id = $this->saveClient($request,$person->id, $request->contract);

            //create user
            $url = explode('/',$request->url);
            $this->createUser($request,$person->id,$client_id, $request->contract, $person->firstname, $url[2],$key);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('errors', array(__("Client can't be saved.")));
        }

        return redirect('auth/login?par=' . $key)->with('success',  array(__('An email was sent to you with your access credentials')));
    }

    public function saveAddress($request,$person_id){
        $address = new Address();
        $address->person_id = $person_id;
        $address->country_id = $request->country;
        $address->deparment_id = 2002;
        $address->city_id = $request->city;
        $address->neighborhood = $request->neighborhood;
        $address->address = $request->address;
        $address->typeaddress_id = 23;
        $address->status = 1;
        $address->save();
    }

    public function saveEmail($request,$person_id){
        $contact = new Contact();
        $contact->person_id = $person_id;
        $contact->type_id = TIPO_CONTACTO_CORREO;
        $contact->typecontact_id = 33;
        $contact->textcontact = $request->email;
        $contact->status = 1;
        $contact->save();
    }

    public function savePhone($request,$person_id){
        $contact = new Contact();
        $contact->person_id = $person_id;
        $contact->type_id = TIPO_CONTACTO_TELEFONO;
        $contact->typecontact_id = 33;
        $contact->textcontact = $request->phone;
        $contact->status = 1;
        $contact->save();
    }

    public function saveClient($request,$person_id,$contractid){
        $password =str_random(5);
        $client = new Client();
        $client->person_id = $person_id;

        if(!empty($request->contract))
            $client->contract_id = $contractid;
        else
            $client->contract_id = CONTRATO_RUTA;

        $client->status = 1;
        $client->save();

        return $client->id;
    }

    public function createUser($request,$person_id,$client_id,$contract_id,$name,$url,$keyvirtual){
        $password =str_random(5);
        $user = new ClientsLogin();
        $user->person_id = $person_id;
        $user->client_id = $client_id;
        $user->contract_id = $contract_id;
        $user->name = $name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->status = 1;
        $user->save();

        //send email
        $this->sendMail($request->email,$password,$url, $keyvirtual, $name, $contract_id);
    }

    public function sendMail($email,$passuser,$url, $keyvirtual, $name, $contract_id){
        $person_id = ContractsPersons::where('contract_id', $contract_id)->value('person_id');
        $business = Person::where('id', $person_id)->first();
        $busisess_name = $business->socialreason != '' ? $business->socialreason : $business->fullname;
        $subject = __("Credentials for entry to the {$busisess_name} platform");

        Mail::send('emails.clientmail', [
            'emailuser'=>$email,
            'passuser'=>$passuser,
            'url'=>$url,
            'key'=>$keyvirtual,
            'name' => $name,
            'business' => $busisess_name,
            'contract' => $contract_id], function ($msj) use ($subject, $email) {
            $msj->subject($subject);
            $msj->to($email);
        });
    }

    public function ajax(){

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch($type){
            case 'validateEmail':
                $contract = Input::get('contract');
                $email = Input::get('email');

                $emailclient = ClientsLogin::where('contract_id',$contract)
                    ->where('email',$email)->value('email');

                $result->success = true;
                $result->message = !empty($emailclient)>0 ? false : true;

                return json_encode($result);
                break;

            case 'validateDocument':
                $typedocument = Input::get('typedoc');
                $numberdocument = Input::get('numberdocument');
                $contract = Input::get('contract');

                $document = Person::where('typedocument_id',$typedocument)
                    ->where('numberdocument',$numberdocument)
                    ->join('contracts_persons','persons.id','contracts_persons.person_id')
                    ->where('contract_id',$contract)
                    ->get();

                $result->success = true;
                $result->message = count($document)>0 ? false : true;

                return json_encode($result);
                break;

            case 'validateEmailStore':
                $contract = Input::get('contract');
                $email = Input::get('email');

                $email = User::where('contract_id', $contract)
                    ->where('email', $email)->value('email');

                $result->success = true;
                $result->message = !empty($email) > 0 ? false : true;

                return json_encode($result);
                break;

        }

    }


}
