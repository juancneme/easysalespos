<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Company;
use App\Models\Management\CredentialsCompany;
use App\Models\Management\CredentialsServices;
use App\Models\Management\PaidProviders;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

const API_MERCADOPAGO = '';
const CREATED = 115;
const IN_PROCESS = 116;
const APPROVED = 117;
const REJECTED = 118;
const MERCADO_PAGO_ID = 111;

class PaidProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->company_id = Company::select('companies.*', 'persons.socialreason', 'persons.firstname', 'persons.othernames', 'persons.lastname', 'persons.otherlastname')
            ->join('persons', 'persons.id', '=', 'companies.person_id')
            ->with('Contrato', 'Persona')
            ->where('contract_id', '=', auth()->user()->contract_id)
            ->first();

        $this->accessToken = CredentialsServices::where('provider', '=', MERCADO_PAGO_ID)
            ->where('type_url', '=', 'PRD')
            ->where('contract_id', auth()->user()->contract_id)
            ->first();

        $this->credentialsCompany = $this->credentials ? CredentialsCompany::where('credential_service_id',$this->credentials->id)->first() : null;

    }

    /**
     * Función para crear el primer registro con el consecutivo
     * @param $request
     */
    public function save($request)
    {
            $paidProviders = new PaidProviders();
            $paidProviders->transaction_id = $request['consecutive'];
            $paidProviders->company_id = $request['company_id'];
            $paidProviders->contract_id = auth()->user()->contract_id;
            $paidProviders->user_id = auth()->user()->id;
            $paidProviders->access_token = $request['access_token'];
            $paidProviders->status = CREATED;
            $paidProviders->save();


    }

    /**
     * Funcion que permite saber en la DB que estado se encuentra el pago
     * @param $request
     * @param int $id
     * @param string $status
     */
    public function edit($request, $id, $status)
    {

        $paidProviders = PaidProviders::where('payment_provider_pay_id', '=', $id)->first();
        $paidProviders->payment_provider_status = $request->status;
        $paidProviders->payment_provider_status_detail = $request->status_detail;
        $paidProviders->status = $status;
        $paidProviders->save();

    }

    /**
     * EndPoint inicial de entrada de MercadoPago
     * @param $group
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callBackConfirmedPayment($group, $page)
    {
        $status_id = Input::get('status');
        $this->query = PaidProviders::where('company_id', '=', $this->company_id->id)
            ->where('access_token', '=', $this->accessToken->access_token)
            ->where('status_id', '=', $status_id)
            ->where('payment_provider_pay_id', '!=', 0)
            ->first();

        if (!empty($this->query)) {
            try {
                $id = $this->query->payment_provider_pay_id;
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', $this->accessToken->url_service .'/'. $id . '?access_token=' . $this->accessToken->access_token);
                if ($response->getStatusCode() === 200) {
                    $jsonResponse = json_decode($response->getBody()->getContents());
                    switch ($jsonResponse->payment_type_id) {
                        case 'ticket':
                            $resp = $this->payPhysical($jsonResponse, $id);
                            return $resp;
                        case 'account_money':
                            $resp = $this->payPhysical($jsonResponse, $id);
                            return $resp;
                        case 'bank_transfer':
                            $resp = $this->payPhysical($jsonResponse, $id);
                            return $resp;
                        case 'credit_card':
                            $resp = $this->payOnline($jsonResponse, $id);
                            return $resp;
                        case 'debit_card':
                            $resp = $this->payOnline($jsonResponse, $id);
                            return $resp;
                        case 'prepaid_card':
                            $resp = $this->payOnline($jsonResponse, $id);
                            return $resp;
                        case 'atm':
                            $resp = $this->payOnline($jsonResponse, $id);
                            return $resp;
                    }
                } else {
                    return response()->json(['status' => 500, 'message' => 'Ocurrio un error inesperado, favor comuniquese con un administrador'], 500);
                }

            } catch (RequestException $e) {
                return response()->json(['status' => 401, 'message' => 'Un momento mientras se valida el pago..'], 401);
            }

        } else {
            return response()->json(['status' => 401, 'message' => 'Un momento mientras se valida el pago..'], 401);

        }
    }

    /**
     * Función para procesar pagos fisicos
     * @param $jsonResponse
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    private function payPhysical($jsonResponse, $id)
    {
        switch ($jsonResponse->status) {
            case 'approved' :
                $resp = $this->proccessSuccessStatus($jsonResponse, $id, APPROVED);
                return $resp;
            case 'pending' :
                $resp = $this->proccessPendingStatus($jsonResponse, $id, IN_PROCESS);
                return $resp;
            case 'in_process' :
                $resp = $this->proccessPendingStatus($jsonResponse, $id, IN_PROCESS);
                return $resp;
            case 'rejected' :
                $resp = $this->proccessBadStatus($jsonResponse, $id, REJECTED);
                return $resp;
            case 'cancelled' :
                $resp = $this->proccessBadStatus($jsonResponse, $id, REJECTED);
                return $resp;
        }
    }

    /**
     * Función para procesar pagos online (Tarjeta credito)
     * @param $jsonResponse
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    private function payOnline($jsonResponse, $id)
    {
        switch ($jsonResponse->status) {
            case 'approved' :
                $resp = $this->proccessSuccessStatus($jsonResponse, $id, APPROVED);
                return $resp;
            case 'in_process' :
                $resp = $this->proccessPendingStatus($jsonResponse, $id, IN_PROCESS);
                return $resp;
            case 'rejected' :
                $resp = $this->proccessBadStatus($jsonResponse, $id, REJECTED);
                return $resp;
            case 'cancelled' :
                $resp = $this->proccessBadStatus($jsonResponse, $id, REJECTED);
                return $resp;
            case 'error' :
                $resp = $this->proccessBadStatus($jsonResponse, $id, REJECTED);
                return $resp;
        }
    }

    /**
     * Función para procesar los pagos Aprovados
     * @param $jsonResponse
     * @param int $id
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function proccessSuccessStatus($jsonResponse, $id, $status)
    {
        $this->edit($jsonResponse, $id, $status);
        $resp = $this->processMessage('¡Listo! Se acreditó tu pago', 200);
        return $resp;
    }

    /**
     * Funcion para procesar los pagos pendientes
     * @param $jsonResponse
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function proccessPendingStatus($jsonResponse, $id, $status)
    {
        $this->edit($jsonResponse, $id, $status);
        switch ($jsonResponse->payment_method_id) {
            case 'pse' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_waiting_transfer':
                        $resp = $this->processMessage('Tienes 20 minutos para hacer la transferencia.', 200);
                        return $resp;
                    default:
                        $resp = $this->processMessage('Su pago esta en proceso de validación con la entidad', 200);
                        return $resp;
                }
            case 'baloto' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_waiting_payment':
                        $resp = $this->processMessage('Su transacción esta pendiente por pago', 200);
                        return $resp;
                    default:
                        $resp = $this->processMessage('Su pago esta en proceso de validación con la entidad', 200);
                        return $resp;
                }
            case 'davivienda' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_waiting_payment':
                        $resp = $this->processMessage('Su transacción esta pendiente por pago', 200);
                        return $resp;
                    default:
                        $resp = $this->processMessage('Su pago esta en proceso de validación con la entidad', 200);
                        return $resp;
                }
            case 'master' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_review_manual':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                    case 'pending_contingency':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                };
                break;
            case 'visa' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_review_manual':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                    case 'pending_contingency':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                };
                break;
            case 'american' :
                switch ($jsonResponse->status_detail) {
                    case 'pending_review_manual':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                    case 'pending_contingency':
                        $resp = $this->processMessage('En menos de 2 días hábiles la entidad enviara por e-mail el resultado', 200);
                        return $resp;
                };
                break;
            case 'account_money' :
                $resp = $this->processMessage('Su pago esta en proceso de validación con la entidad', 200);
                return $resp;
                break;
            default:
                $resp = $this->processMessage('Su pago esta en proceso de validación con la entidad', 200);
                return $resp;
                break;
        }

    }

    /**
     * Función para procesar los pagos Rechazados
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function proccessBadStatus($jsonResponse, $id, $status)
    {
        $this->edit($jsonResponse, $id, $status);
        switch ($jsonResponse->status_detail) {
            case 'bank_error':
                $resp = $this->processMessage('Transferencia rechazada. Tiempo limite excedido', 500);
                return $resp;
            case 'cc_rejected_bad_filled_card_number':
                $resp = $this->processMessage('Revisa el número de tarjeta.', 500);
                return $resp;
            case 'cc_rejected_bad_filled_date':
                $resp = $this->processMessage('Revisa la fecha de vencimiento', 500);
                return $resp;
            case 'cc_rejected_bad_filled_other':
                $resp = $this->processMessage('Revisa los datos.', 500);
                return $resp;
            case 'cc_rejected_bad_filled_security_code':
                $resp = $this->processMessage('Revisa el código de seguridad.', 500);
                return $resp;
            case 'cc_rejected_blacklist':
                $resp = $this->processMessage('No pudimos procesar tu pago.', 500);
                return $resp;
            case 'cc_rejected_call_for_authorize':
                $resp = $this->processMessage('Debes autorizar el pago  a Mercado Pago', 500);
                return $resp;
            case 'cc_rejected_card_disabled':
                $resp = $this->processMessage('Llama  para que active tu tarjeta. El teléfono está al dorso de tu tarjeta.', 500);
                return $resp;
            case 'cc_rejected_card_error':
                $resp = $this->processMessage('Tu tarjeta fue rechazada, no pudimos procesar tu pago.', 500);
                return $resp;
            case 'cc_rejected_duplicated_payment':
                $resp = $this->processMessage('Ya hiciste un pago por ese valor.', 500);
                return $resp;
            case 'cc_rejected_high_risk':
                $resp = $this->processMessage('Elige otro de los medios de pago, te recomendamos con medios en efectivo.', 500);
                return $resp;
            case 'cc_rejected_insufficient_amount':
                $resp = $this->processMessage('Fondos suficientes.', 500);
                return $resp;
            case 'cc_rejected_invalid_installments':
                $resp = $this->processMessage('No procesa pagos en installments cuotas.', 500);
                return $resp;
            case 'cc_rejected_max_attempts':
                $resp = $this->processMessage('límite de intentos permitidos. Elige otra tarjeta u otro medio de pago', 500);
                return $resp;
            case 'expired':
                $resp = $this->processMessage('El limite de tiempo para realizar el pago ha sido excedido', 500);
                return $resp;
            default:
                $resp = $this->processMessage('Error desconocido, no se pudo acreditar el pago', 500);
                return $resp;
        }
    }

    /**
     * Funcion para todos lo mensajes de respuesta
     * @param string $string
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function processMessage($string, $status)
    {
        return response()->json(['status' => $status, 'message' => $string], $status);
    }

    /**
     * Función para crear el consecutivo de cada pago
     * @return int|mixed|string
     */
    public function generateConsecutivePay()
    {

        $consecutive = PaidProviders::max('transaction_id');

        return empty($consecutive) ? $consecutive = str_pad(20, 7, "0", STR_PAD_RIGHT) + 1 : $consecutive + 1;


    }

}
