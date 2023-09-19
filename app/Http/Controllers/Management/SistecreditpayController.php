<?php

namespace App\Http\Controllers\Management;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Enums\EndPointSisteCreditEnum;

use App\Models\Management\CredentialsCompany;
use App\Models\Management\CreditPayments;
use App\Models\Management\CredentialsServices;
use App\Models\Management\Lists;
use App\Models\Management\Person;

const SISTE_CREDIT = 112;
const TIPOS_DOCUMENTOS = 4;

class SistecreditpayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->itemstypedocument = Lists::whereIn('code', ['CC', 'CE'])
            ->where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);
        $this->shift = buscar_turno(auth()->user()->id);

        $this->credentials = CredentialsServices::where('provider', SISTE_CREDIT)
            ->where('contract_id', auth()->user()->contract_id)
            ->first();

        $this->credentialsCompany = $this->credentials ? 
                CredentialsCompany::where('credential_service_id', $this->credentials->id)
                        ->where('company_id', $this->company->id)
                        ->first()
                : null;
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
            'itemstypedocument' => $this->itemstypedocument,
            'numberdoc' => empty($parameter) ? "" : $parameter[0]->idDocument,
            'data' => json_encode($parameter)
        ]);
    }

    public function getActiveCredits($group, $page, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'numberdocument' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        if (!$this->credentials && ! $this->credentialsCompany) {
            return back()->with('errors', array(__('There are no associated credentials, please verify')));
        }
        $docType = Lists::find($request->typedoc);

        try {
            $client = new Client();

            $headers = [
                'Ocp-Apim-Subscription-Key' => $this->credentials->key,
            ];
            $response = $client->request('GET', $this->credentials->url_service . EndPointSisteCreditEnum::GET_ACTIVE_CREDITS, [
                'headers' => $headers,
                'query' => [
                    'typeDocument' => $docType->code, 
                    'idDocument' => $request->numberdocument, 
                    'storeId' => $this->credentialsCompany->store_key, 
                ], 
            ]);

            if ($response->getStatusCode() == 200) {
                $json = json_decode($response->getBody()->getContents());
                return $this->index($group, $page, $json->data);
            }
        } catch (\Exception $e) {

            $exceptionResponse = json_decode($e->getResponse()->getBody()->getContents());
            if (!empty($exceptionResponse->message)) {
                return back()->with('errors', array(__($exceptionResponse->message)));
            } else {
                return back()->with('errors', array(__('Ocurrió un error en el sistema')));
            }
        }
    }

    public function payCredit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payId' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {

            $identification = Person::find(auth()->user()->person_id);
            $client = new Client();
            $headers = [
                'Ocp-Apim-Subscription-Key' => $this->credentials->key,
            ];
            $response = $client->request('POST', $this->credentials->url_service .EndPointSisteCreditEnum::PAY_CREDIT, [
                'headers' => $headers,
                'json' => [
                    'creditId' => $request->credit,
                    'totalValuePaid' => intval($request->payId),
                    'storeId' => $this->credentialsCompany->store_key,
                    'userName' => $identification->numberdocument,
                ],
            ]);

            if ($response->getStatusCode() == 200) {

                $json = json_decode($response->getBody()->getContents());

                if ($json->errorCode) {
                    return response()->json($json->message, 500);
                }
                try {

                    $balpay_id = guardarsaldo(auth()->user()->contract_id, $this->company->id, auth()->user()->id, 18, $request->payId, "PaySis", $this->shift->id, 5);

                    $creditPayment = new CreditPayments();
                    $creditPayment->contract_id = auth()->user()->contract_id;
                    $creditPayment->companies_id = $this->company->id;
                    $creditPayment->credit_id = $request->credit;
                    $creditPayment->payment_id = $json->data->paymentId;
                    $creditPayment->balpay_id = $balpay_id;
                    $creditPayment->value_payment = intval($request->payId);
                    $creditPayment->save();

                    return response()->json($json->data, 200);

                } catch (\Exception $exception) {
                    // dd($exception);
                    return response()->json(__('Error registering the data, please contact an administrator'), 500);
                }

            }
        } catch (\Exception $e) {
            if ($e) {
                $e = json_decode($e->getResponse()->getBody()->getContents());
                return response()->json(__($e->message), 500);
            }
        }
    }
}
