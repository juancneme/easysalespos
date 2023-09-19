<?php

namespace App\Http\Controllers\Management;

use App\Enums\EndPointSisteCreditEnum;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Management\CredentialsCompany;
use App\Models\Management\CredentialsServices;
use App\Models\Management\Lists;

const TIPOS_DOCUMENTOS = 4;
const SCORIGEN = 'Production';
const COUNTRY = 'CO';
const SISTE_CREDIT = 112;
const LEVEL_CONFIG_CHAT = 'ColombiaLevelQuestionsV4';
const STORE_ID_CHAT = '31722';

class SistecreditController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        $this->itemstypedocument = Lists::whereIn('code', ['CC', 'CE'])
            ->where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

        $this->credentials = CredentialsServices::where('provider', SISTE_CREDIT)
            ->where('contract_id', auth()->user()->contract_id)
            ->first();

        $this->credentialsCompany = $this->credentials->count() ? CredentialsCompany::where('credential_service_id', $this->credentials->id)
            ->where('company_id', $this->company->id)
            ->first() : null;

        $this->headers = ['Ocp-Apim-Subscription-Key' => $this->credentials->key];

    }

    public function index($group, $page)
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
            'itemstypedocument' => $this->itemstypedocument,
        ]);
    }


    //Conección estandar para las peticiones GET
    public function clientConnection($method, $host, $complement_host, $params, $headers)
    {

        try {
            $client = new Client();
            $request = $client->request($method, $host . $complement_host, ["query" => $params, "headers" => $headers]);
            return $request;

        } catch (\Exception $ex) {
            $exceptionResponse = json_decode($ex->getResponse()->getBody()->getContents());
            return $this->handleResponse($exceptionResponse);
        }

    }

    //Conección estandar para las peticiones POST, PUT
    public function clientPostConnection($method, $host, $complement_host, $params, $headers)
    {
        try {
            $client = new Client();
            $request = $client->request($method, $host . $complement_host, ["json" => $params, "headers" => $headers]);
            return $request;

        } catch (\Exception $ex) {
            $exceptionResponse = json_decode($ex->getResponse()->getBody()->getContents());
            return $this->handleResponse($exceptionResponse);
        }

    }

    /**
     * Primer WB valida si es apto para el credito
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getCreditLimitClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'typedoc' => 'required',
            'numberdocument' => 'required',
            'periodtype' => 'required',
            'numberperiods' => 'required',
            'creditValue' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => __('Validation Failed'), 'errors' => $validator->messages()], 422);
        }

        if (!$this->credentials || !$this->credentialsCompany) {
            return response()->json(['errors' => __('There are no associated credentials, please verify')], 401);
        }

        $docType = Lists::find($request->typedoc);

        $params = [
            'typeDocument' => $docType->code,
            'idDocument' => $request->numberdocument
        ];

        $response = $this->clientConnection('GET', $this->credentials->url_service, EndPointSisteCreditEnum::GET_CREDIT_LIMIT, $params, $this->headers);
        if ($response->getStatusCode() === 200) {
            $data_1 = json_decode($response->getBody()->getContents());
            return $this->getCreditDetails($request, $data_1);
        }
        return $response;
    }

    public function getCreditDetails(Request $request, $data_1)
    {
        $validator = Validator::make($request->all(), [
            'typedoc' => 'required',
            'numberdocument' => 'required',
            'periodtype' => 'required',
            'numberperiods' => 'required',
            'creditValue' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => __('Validation Failed'), 'errors' => $validator->messages()], 422);
        }

        if (!$this->credentials || !$this->credentialsCompany) {
            return response()->json(['errors' => __('There are no associated credentials, please verify')], 401);
        }

        $docType = Lists::find($request->typedoc);

        $params = [
            'creditValue' => $request->creditValue,
            'frequency' => $request->periodtype,
            'months' => $request->numberperiods,
            'typeDocument' => $docType->code,
            'idDocument' => $request->numberdocument,
            'storeId' => $this->credentialsCompany->store_key
        ];

        $response = $this->clientConnection('GET', $this->credentials->url_service, EndPointSisteCreditEnum::GET_CREDIT_DETAIL, $params, $this->headers);
        if ($response->getStatusCode() === 200) {
            $data_2 = json_decode($response->getBody()->getContents());

            return $this->getCreditToken($request, $data_1, $data_2);
        }
        return $response;
    }

    //Tercer WS trae la clave dinamica o TOKEN
    public function getCreditToken(Request $request, $data_1, $data_2)
    {
        $docType = Lists::find($request->typedoc);
        $params = [
            'creditValue' => $request->creditValue,
            'frequency' => $request->periodtype,
            'months' => $request->numberperiods,
            'typeDocument' => $docType->code,
            'idDocument' => $request->numberdocument,
            'storeId' => $this->credentialsCompany->store_key
        ];

        $response = $this->clientConnection('GET', $this->credentials->url_service, EndPointSisteCreditEnum::GET_CREDIT_TOKEN, $params, $this->headers);

        if ($response->getStatusCode() === 200) {
            $data_3 = json_decode($response->getBody()->getContents());
            $date = new \DateTime($data_3->data->expirationDate);
            return response()->json(['message' => 'OK', 'data' => $data_3->data, 'data2' => $data_1, 'data3' => $data_2, 'expirationDate' => $date->format('H:i:s')], 200);
        }
        return $response;
    }

    //Cuarto WS Crear el credito
    public function createSis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'typedoc' => 'required',
            'numberdocument' => 'required',
            'creditValue' => 'required',
            'periodtype' => 'required',
            'numberperiods' => 'required',
            'claveDinamica' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => __('Validation Failed'), 'errors' => $validator->messages()], 422);
        }

        $docType = Lists::find($request->typedoc);
        if ($request->periodtype == 15) {
            $fees = $request->numberperiods * 2;
        } else {
            $fees = $request->numberperiods;
        }

        $params = [
            'typeDocument' => $docType->code,
            'idDocument' => $request->numberdocument,
            'creditValue' => $request->creditValue,
            'frequency' => $request->periodtype,
            'fees' => $fees,
            'source' => 1,
            'token' => $request->claveDinamica,
            'Seller' => $request->months,
            'authMethod' => 1,
            'storeId' => $this->credentialsCompany->store_key
        ];
        $response = $this->clientPostConnection('POST', $this->credentials->url_service, EndPointSisteCreditEnum::CREATE, $params, $this->headers);
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            return response()->json(['message' => 'OK', 'data' => $data->data], 200);
        }
        return $response;
    }

    /**
     * Chat de sistecredito
     *
     */
    public function initialChat(Request $request)
    {
        if (empty($this->credentials)) {
            return response()->json(['message' => __('There are no associated credentials, please verify')], 401);
        }

        try {
            $client = new Client();
            $headers = [
                'SCLocation' => 0.0,// lat y long
                'country' => 'co',
                'SCOrigen' => 'Production',
                'Ocp-Apim-Subscription-Key' => $this->credentials->key,
                'SCOrigenDeviceType' => 'WEB_CUSTOMER',
            ];
            $docType = Lists::find($request->typeDocumentValue); 
            
            // $response = $client->request('GET', $this->credentials->url_service . EndPointSisteCreditEnum::CHAT_BOT, [
            $response = $client->request('GET', 'https://api.credinet.co/' . EndPointSisteCreditEnum::CHAT_BOT, [
                    'query' => [ 
                    'Lang' => 'es', 
                    'storeId' => $this->credentialsCompany->store_key, 
                    'LevelConfigName' => LEVEL_CONFIG_CHAT, // Depende del store 
                    'IdDocument' => $request->IdDocument, 
                    'TypeDocument' => $docType->code, 
                    'ScStoreId' => STORE_ID_CHAT, 
                    'email' => auth()->user()->email 
                ], 'headers' => $headers, 
            ]); 
            $json = json_decode($response->getBody()->getContents());
            return response()->json(['message' => 'OK', 'data' => $json->data, 'razon_social' => '621fe65a641b4b00017fef25'], 200); 

        } catch (\Exception $e) {
            $exceptionResponse = json_decode($e->getResponse()->getBody()->getContents());
            return $this->handleResponse($exceptionResponse);
        }

    }

    //Solicitud de anulación de credito SIS
    public function requestCancelCredit($creditId, $valueCancel = null)
    {
        $params = [
            'creditId' => $creditId,
            'cancellationType' => 1,
            'valueCancel' => 0, // $valueCancel,
            'reason' => "Cancelación credito",
            //'storeId' => $this->credentialsCompany->store_key
            'storeId' => $this->credentialsCompany['store_key']
        ];
  
        $response = $this->clientPostConnection('POST', $this->credentials->url_service, EndPointSisteCreditEnum::CANCEL_CREDIT, $params, $this->headers);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            return response()->json($data->message, 201);
        }
        return $response;
    }

    //Solicitud de anulación de pago SIS
    public function requestCancelPayment($paymentId)
    {
        $params = [
            'paymentId' => $paymentId,
            'reason' => "Cancelación pago total",
            'storeId' => $this->credentialsCompany->store_key
        ];

        $response = $this->clientPostConnection('POST', $this->credentials->url_service, EndPointSisteCreditEnum::CANCEL_PAYMENT, $params, $this->headers);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            return response()->json($data->message, 201);
        }
        return $response;
    }

    /**
     * Captura todas las posibles respuestas del servicio
     *
     * @param $exceptionResponse
     * @return \Illuminate\Http\JsonResponse
     */
    private function handleResponse($exceptionResponse)
    {
        switch ($exceptionResponse->message) {
            case 'CustomerNotFound':
                $message = __($exceptionResponse->message);
                break;
            case 'MonthsNumberNotValid':
                $message = __($exceptionResponse->message);
                break;
            case 'RequestValuesInvalid':
                $message = __($exceptionResponse->message);
                break;
            case 'StoreNotFound':
                $message = __($exceptionResponse->message);
                break;
            case 'CustomerProfileInvalid':
                $message = __($exceptionResponse->message);
                break;
            case 'SourceNotFound':
                $message = __($exceptionResponse->message);
                break;
            case 'AuthMethodNotFound':
                $message = __($exceptionResponse->message);
                break;
            case 'TokenIsNotValid':
                $message = __($exceptionResponse->message);
                break;
            case 'TokenAlreadyUsed':
                $message = __($exceptionResponse->message);
                break;
            case 'CreditsNotFound':
                $message = __($exceptionResponse->message);
                break;
            case 'CustomerNotActive':
                $message = __($exceptionResponse->message);
                break;
            case 'CreditNotActive':
                $message = __($exceptionResponse->message);
                break;
            case 'NotControlledException':
                $message = __($exceptionResponse->message);
                break;
            case 'NotAvailableCreditLimit':
                $message = __($exceptionResponse->message);
                break;
            case 'Confirmation does not match':
                $message = __($exceptionResponse->message);
                break;
            case 'Resource not found' :
                $message = __($exceptionResponse->message);
                break;
            case 'CustomerIsDefaulter':
                $message = __($exceptionResponse->message);
                break;
            case 'RequestCancelExists':
                $message = __($exceptionResponse->message);
                break;
            case '20000':
                $message = 'Valor minimo a recibir es 20000';
                break;
            case '30000-1000000000':
                $message = 'Valor minimo a recibir es 30000';
                break;
            default:
                $message = "Error desconocido , Favor comuniquese con un administrador: " . $exceptionResponse->message;
                break;
        }
        return response()->json(['message' => __($message), 'errors' => $message], 415);
    }

}
