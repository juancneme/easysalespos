<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\ConfirmPayments;
use App\Models\Management\CredentialsServices;
use App\Models\Management\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use phpseclib\Crypt\Hash;
use Validator;

/**
 * Constantes
 */
const TOKEN_SANDBOX = "JWFjuYXhwMW9icmRlDJiJDEwJElZZUgxa0dVMjZMbFVEQaTNoNVZZbzliNjFPOUIRBbWVwLjZvd2lJdU";
const URL_SANDBOX = 'https://testing.refacil.co/api/v1';
const MULTIMARCA = 110;

class CollectionCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|nullable',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {

            //Se traen las credenciales dependiendo del usuario
            $this->credentialsMultimark = CredentialsServices::where('provider', '=', MULTIMARCA)
                ->where('type_url', '=', 'PRD')
                ->where('contract_id', auth()->user()->contract_id)
                ->first();


            if (empty($this->credentialsMultimark)) {
                return back()->with('infos', array(__('No tiene ninguna comercio asociada  con Super Pagos.')));
            }

            DB::beginTransaction();
            $client = new Client();
            $auth = (new ServiceController)->loginService();
            if ($auth->getStatusCode() == 200) {
                $data = json_decode($auth->getBody()->getContents());
                $TOKEN = $data->user->token;
                $url = $this->credentialsMultimark->url_service;

                $customerId = base_convert($request->company_id, 10, 36);

                // Credenciales de TEST
                $TokenSandbox = TOKEN_SANDBOX;
                $urlSandBox = URL_SANDBOX;

                $confirmToken = $this->generatePayToken($request->company_id);

                //encriptar el token antes de enviarlo
                $encdec = new \App\Http\Controllers\Security\EncdecController;
                $token_crypt = $encdec->encrypt_decrypt('encrypt', $confirmToken);

                fopen('test.pdf', 'w');
                $response = $client->request('GET', $url . '/users/downloadCarnet', [
                    'headers' => [
                        'Authorization' => "Bearer {$TOKEN}",
                        'Cache-Control' => 'no-cache',
                    ],
                    "query" => [
                        'customer-id' => "customer-id {$customerId}",
                        'confirm-url' => URL::to('/') . "/rpc?rpc_task=rbpdv_ws1_m3&token=" . $token_crypt,
                    ],

                    'stream' => true,
                    'verify' => false,
                ]);

                DB::commit();
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename=Tarjeta_recaudo.pdf');
                var_dump($response->getBody()->getContents());
                die;
            } else {
                DB::rollback();
                return back()->with('errors', array(__('Error with the credentials please comunicated with Administrator')));
            }
        } catch (RequestException $e) {
            if ($e->getCode() == 401) {
                DB::rollback();
                return back()->with('errors', array(__('Error: ' . $e->getResponse()->getReasonPhrase() . ', please comunicated with Administrator')));
            }elseif ($e->getCode() == 0){
                DB::rollback();
                return back()->with('errors', array(__('Error with the credentials please comunicated with Administrator')));

            }

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
