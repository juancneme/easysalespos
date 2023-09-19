<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Courier;
use App\Models\Management\CredentialsServices;
use App\Models\Management\Deliveries;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\TransactionsPaymentmethods;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

const END_POINT_OAUTH = '/oauth/token';
const END_POINT_CREATE = '/Create-services';
const END_POINT_ADD_STORE = '/Add-store';
const TYPE_SERVICE = 4;
const EN_TRANSITO = 79;
const MENSAJEROS = 113;

/**
 * @author Faio Castagnola
 * Class UrbanCouriersController
 * @package App\Http\Controllers\Management
 */
class UrbanCouriersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        $this->credentials = CredentialsServices::where('provider', '=', MENSAJEROS)
            ->where('type_url', '=', 'PRD')
            ->first();

        $this->city =
            [
                1 => 2181,
                2 => 3036,
                3 => 2033,
                4 => 2158,
                8 => 2182,
                9 => 2687,
                10 => 2876,

            ];

        $this->user_payment_type =
            [
                1 => 92,
                2 => 94,
                3 => 93
            ];


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
        ]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function authService()
    {

        if (empty($this->credentials)) {
            return response()->json(['message' => __('There are no associated credentials, please verify')], 500);
        }
        try {
            $client = new Client();
            $headers = [
                'client_id' => $this->credentials->access_token,
                'client_secret' => $this->credentials->key,
            ];

            $response = $client->request('POST', $this->credentials->url_service . END_POINT_OAUTH, [
                'form_params' => [
                    'grant_type' => env('GRAND_TYPE'),
                ],
                'headers' => $headers,
            ]);
            if ($response->getStatusCode() === 200) {
                $json = json_decode($response->getBody()->getContents());
                return response()->json(['data' => $json], 200);

            } else {
                return response()->json(['message' => 'Ocurrio un Error inesperado '], 500);
            }

        } catch (\Exception $e) {
            $exceptionResponse = json_decode($e->getResponse()->getBody()->getContents());
            return response()->json(['message' => __($exceptionResponse->error_description)], 401);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addStore($id, $token)
    {
        try {
            $store = Transactions::where('id', $id)
                ->with('User.Persona.ContactPhone')
                ->with('Comercio.Persona.Location')
                ->with('Comercio.Persona.ContactPhone')
                ->first();
            if (!count($store->Comercio->Persona->Location) > 0){
                return response()->json(['message' => 'La comercio no tiene una direccion asociada,favor verificar'], 401);
            }

            $id_company = $this->credentials->user_name;

            $headers = [
                'access_token' => $token,
            ];
            $client = new Client();

            $response = $client->request('POST', $this->credentials->url_service . END_POINT_ADD_STORE, [
                'json' => [
                    'grant_type' => env('GRAND_TYPE'),
                    "id_user" => intval($this->credentials->user_name),
                    "id_point" => strval($store->Comercio->id), //id de la comercio
                    "name" => $store->Comercio->name,
                    "address" => $store->Comercio->Persona->Location[0]->address,
                    "city" => array_search($store->Comercio->Persona->Location[0]->city_id, $this->city),
                    "phone" => empty($store->Comercio->Persona->ContactPhone[0]->textcontact) ? 'N/A' : $store->Comercio->Persona->ContactPhone[0]->textcontact,
                    "parking" => 0,
                    "id_company" => intval($id_company)
                ],
                'headers' => $headers,

            ]);
            if ($response->getStatusCode() === 200) {
                return response()->json(['message' => 'OK'], 200);

            } else {
                return response()->json(['message' => 'Error inesperado al crear la comercio '], 500);
            }

        } catch (\Exception $e) {
            $exceptionResponse = json_decode($e->getResponse()->getBody()->getContents());
            if ($exceptionResponse->status_code === 400) {
                return response()->json(['message' => 'OK'], 200);

            } else {
                return response()->json(['message' => __($exceptionResponse->error_description)], 401);

            }

        }

    }

    /**
     * @param $group
     * @param $page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function sendOrder($group, $page, $id)
    {
        $delivery = Deliveries::with('transaction', 'status', 'courier')
            ->find($id);

        $authRes = $this->authService();
        //se debe verificar si el comercio ya esta en MU 
        if ($authRes->getStatusCode() === 200) {
            try {
                $authRes = json_decode($authRes->content());
                $token = $authRes->data->access_token;
                $expire = $authRes->data->expires_in;
                $tokenType = $authRes->data->token_type;
                $id = $delivery->transaction->id;
                $addStore = $this->addStore($id, $token);
            } catch (\Exception $exception) {
                return redirect(strtolower($group . '/' . $page))->with('errors', array(__($exception->getMessage())));
            }

            if ($addStore->getStatusCode() == 200) {
                try {

                    $client = new Client();

                    $transaction = Transactions::where('id', $id)
                        ->with('User.Persona.ContactPhone')
                        ->with('Comercio.Persona.Location')
                        ->with('Estado')
                        ->first();

                    $typePay = TransactionsPaymentmethods::where('transaction_id', $id)
                        ->value('paymentmethods_id');

                    $productsquery = TransactionsDetails::with('Orderpro')
                        ->where('transaction_id', $id)
                        ->get();

                    // Funcion para armar los productos
                    $products = $this->listOfProducts($productsquery, $id);

                    $headers = [
                        'access_token' => $token,
                        'Content-Type' => 'application/json',
                    ];
                    $response = $client->request('POST', $this->credentials->url_service . END_POINT_CREATE, [
                        'headers' => $headers,
                        'json' => (object)[
                            "id_user" => intval($this->credentials->user_name),
                            "type_service" => TYPE_SERVICE,
                            "roundtrip" => 0,
                            "declared_value" => 1250,
                            "city" => array_search($transaction->Comercio->Persona->Location[0]->city_id, $this->city),
                            "start_date" => date("Y/m/d"),
                            "start_time" => date("h:i:s"),
                            "observation" => $transaction->comments,
                            "user_payment_type" => array_search($typePay, $this->user_payment_type),
                            "type_segmentation" => 1,
                            "type_task_cargo_id" => 2,
                            "os" => "NEW API 2.0",
                            "coordinates" => [(object)[
                                "type" => "1",
                                "order_id" => 471,
                                "address" => empty($transaction->Comercio->Persona->Location[0]->address) ? 'N/A' : $transaction->Comercio->Persona->Location[0]->address,
                                "city" => "bogota",
                                "description" => $transaction->User->Persona->socialreason,
                                "client_data" => (object)[
                                    "client_name" => $transaction->User->Persona->firstname . ' ' . $transaction->User->Persona->lastname,
                                    "client_phone" => empty($transaction->User->Persona->ContactPhone[0]->textcontact) ? 'N/A' : $transaction->User->Persona->ContactPhone[0]->textcontact,
                                    "client_email" => $transaction->User->email,
                                    "products_value" => $transaction->total_value,
                                    "domicile_value" => "0",
                                    "client_document" => $transaction->User->Persona->numberdocument,
                                    "payment_type" => array_search($typePay, $this->user_payment_type),
                                ],
                                "products" => $products
                            ]
                            ],
                        ]]);
                    $json = json_decode($response->getBody()->getContents());
                    //Se debe actualziar el delivery
                    $transaction->status = EN_TRANSITO;
                    $transaction->update();
                    $array =
                        [
                            'transaction_id' => $transaction->id,
                            'third_id' => $json->data->uuid,
                            'status' => $json->data->status,
                            'start_date' => $json->data->date,
                            'courier_id' => Courier::where('status', 1)->first(),
                            'contract_id' =>$transaction->contract_id,
                            'company_id' => $transaction->company_id,
                            'companycourier_id'=>null,
                            'tercero_id'=>null,
                            'address_id'=>null
                        ];

                    $request = new Request($array);
                    $classMethods = (new DeliveriesController);
                    //el delivery ya esiste es el punto de partir de este despacho
                    $found = Deliveries::where('transaction_id', $transaction->id)->exists();
                    $found ? $classMethods->update($request, $delivery->id) : $classMethods->store($request);

                    return redirect(strtolower($group . '/' . $page))->with('success', array(__('Servicio creado satisfactoriamente! ')));

                } catch (\Exception $e) {
                    if (empty($e->getResponse())) {
                        return redirect(strtolower($group . '/' . $page))->with('errors', array(__($e->getMessage())));
                    } else {
                        $exceptionResponse = json_decode($e->getResponse()->getBody()->getContents());
                        return redirect(strtolower($group . '/' . $page))->with('errors', array(__($exceptionResponse->message)));
                    }

                }
            } else {
                $exceptionResponse = json_decode($addStore->content());
                return redirect(strtolower($group . '/' . $page))->with('errors', array(__($exceptionResponse->message)));
            }
        } else {

            $exceptionResponse = json_decode($authRes->content());
            return redirect(strtolower($group . '/' . $page))->with('errors', array(__($exceptionResponse->message)));

        }
    }

    /**
     * Funcion para asamlar la lista de todos los productos
     * @param $products
     * @param $id
     * @return array
     */
    private function listOfProducts($products, $id)
    {
        $store = Transactions::where('id', $id)
            ->with('User.Persona.ContactPhone')
            ->with('Comercio.Persona.Location')
            ->with('Comercio.Persona.ContactPhone')
            ->first();

        $array1 = [];

        $listProducts = [];

        $index = [
            "store_id",
            "sku",
            "product_name",
            "url_img",
            "value",
            "quantity",
            "barcode"
        ];

        for ($i = 0; $i < count($products); $i++) {

            array_push($array1, intval($store->Comercio->id));
            array_push($array1, strval($products[$i]->id));
            array_push($array1, $products[$i]->Orderpro->name);
            array_push($array1, $products[$i]->Orderpro->image);
            array_push($array1, $products[$i]->Orderpro->saleprice);
            array_push($array1, $products[$i]->quantity);
            array_push($array1, $products[$i]->Orderpro->barcode);
        }

        $e = array_chunk($array1, 7);

        for ($i = 0; $i < count($products); $i++) {
            $listProducts[$i] = array_combine($index, $e[$i]);
        }

        return $listProducts;


    }
}
