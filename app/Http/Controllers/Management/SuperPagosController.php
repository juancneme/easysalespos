<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\CompaniesUsers;
use App\Models\Management\ConfirmPayments;
use App\Models\Management\CredentialsServices;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

const ENDPOINT_PSE = '/transaction/createPse';
const  ENDPOINT_TARJETA = '/users/downloadCarnet';

class SuperPagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->company_id = CompaniesUsers::where('user_id', \auth()->user()->id)->value('company_id');

        $this->credentialsMultimark = CredentialsServices::where('provider', '=', 110)
            ->where('type_url', '=', 'PRD')
            ->where('contract_id', auth()->user()->contract_id)
            ->first();

        $this->existcredentials = CredentialsServices::where('provider', '=', 110)
            ->where('type_url', '=', 'PRD')
            ->where('contract_id', auth()->user()->contract_id)
            ->exists();
    }

    public function index($group, $page, $parameter = null)
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

    /**
     * Servicio web para crear tarjeta de recaudo
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadCarnet()
    {
        try {
            if(!file_exists("storage/app/tarjetaRecaudo/". $this->company_id."/")){
                if (!$this->existcredentials)  return back()->with('errors', array(__('Favor crear credenciales para Multimarca o Superpagos para esta comercio')));
                mkdir("storage/app/tarjetaRecaudo/".$this->company_id."/", 777,true);
                $auth = (new ServiceController())->loginService();
                $val_json = json_decode($auth->getBody()->getContents());
                $TOKEN = $val_json->user->token;
                $confirmToken = $this->generatePayToken($this->company_id);
                //encriptar el token antes de enviarlo
                $encdec = new \App\Http\Controllers\Security\EncdecController;
                $token_crypt = $encdec->encrypt_decrypt('encrypt', $confirmToken);

                $client = new Client();
                $url = $this->credentialsMultimark->url_service;
                //$customerId = base_convert($this->company_id, 10, 36);
                $headers = [
                    'Authorization' => 'Bearer ' . $TOKEN,
                    'Accept' => 'application/json',
                ];

                $request = $client->request('GET', $url . ENDPOINT_TARJETA, [
                    'headers' => $headers,
                    "query" => [
                        'customer-id' => "customer-id {$this->company_id}",
                        'confirm-url' => URL::to('/') . "/rpc?rpc_task=rbpdv_ws1_m3&token=" . $token_crypt,
                    ],
                ]);

                if ($request->getStatusCode() == 200) {
                    try {
                        $data = $request->getBody()->getContents();
                        header('Content-type: application/pdf');
                        header('Content-Disposition: attachment; filename=Tarjeta_recaudo.pdf');

                        $path = 'tarjetaRecaudo/'. $this->company_id.'/Tarjeta_recaudo.pdf';
                        Storage::disk('local')->put($path, $data);
                        var_dump($data);
                    } catch (\Exception $e) {
                        return back()->with('errors', array(__('Error, please comunicated with Administrator')));
                    }

                } else {
                    return back()->with('errors', array(__('Error en las credenciales')));
                }
            }else{

                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename=Tarjeta_recaudo.pdf');
                $path = 'tarjetaRecaudo/'. $this->company_id.'/Tarjeta_recaudo.pdf';
                $contents = Storage::get($path);
                var_dump($contents);


            }

        } catch (\Exception $e) {
            dd($e);
            return back()->with('errors', array(__('Error, please comunicated with Administrator')));
        }

    }



    public function createPse(Request $request)
    {
        if (!$this->existcredentials) return response()->json(['message' => 'Favor crear credenciales para Multimarca o Superpagos ', 'status' => 401]);
        try {
            $client = new Client();
            $encdec = new \App\Http\Controllers\Security\EncdecController;
            $url = $this->credentialsMultimark->url_service;


            $request = $client->request('POST', $url . '/auth/login', [
                'form_params' => [
                    "amount" => $request->amount,
                    "bank" =>$request->bank ,
                    "cellphone" =>$request->cellphone ,
                    "docNumber" => $request->docNumber,
                    "docType" =>$request->docType ,
                    "email" =>$request->email ,
                    "name" =>$request->name ,
                    "urlConfirm" => $request->urlConfirm,
                ]
            ]);

        } catch (\Exception $e) {
            //Catch the guzzle connection errors over here.These errors are something
            // like the connection failed or some other network error
            return back()->with('errors', array(__('Error: ' . $e->getMessage() . ', please comunicated with Administrator')));
        }

    }

    public function generatePayToken($company_id)
    {
        //asegurar que no se repita el token  con la función microtime
        $token = str_random(60) . microtime();

        $api_token = \Hash::make($token);

        $confirmPay = new ConfirmPayments();
        $confirmPay->company_id = $company_id;
        $confirmPay->token = $api_token;
        $confirmPay->description = 'PENDIENTE';
        $confirmPay->status = 1;
        $confirmPay->save();

        return $confirmPay->token;
    }
}
