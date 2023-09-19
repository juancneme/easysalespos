<?php

namespace App\Http\Controllers;

use App\Helpers\WSError;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\DeliveriesController;
use App\Http\Controllers\PHP_AES_Cipher;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;

use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\ConfirmPayments;
use App\Models\Management\Deliveries;
use App\Models\Management\QrConfirmation;
use App\Models\Management\PaidProviders;
use App\Models\Management\User;

const CREATED = 115;
class RPCController extends Controller
{


    private $tasks = array('rbpdv_ws1_m1', 'requestDataQr', 'servicioDevuelta', 'rbpdv_ws1_m3', 'rbpdv_ws1_m4', 'rbpdv_ws1_m5','rbpdv_ws1_m6');

    /**
     * Web Services Constructor
     * Validate MC_token and call function according to rpc_task parameter
     *
     * @param rpc_token Token to validate if not is spam
     * @param rpc_task Method/function to execute
     * @return multitype:string|array Error or success descriptions
     */
    public function index()
    {

//        if (!(Input::get('rpc_task') == 'rbpdv_ws1_m1')) {
//            if (Input::get("rpc_token") != md5(gmdate("Ymd") . 'b343fcdb42af964d')) {
//                return array("error" => "Error key, invalid token! " . md5(gmdate("Ymd") . 'b343fcdb42af964d'));
//            }
//        }

        $rpc_task = Input::get('rpc_task');
        if (!in_array($rpc_task, $this->tasks)) {
            return array("error" => "Error: invalid task!");
        }

        return $this->$rpc_task();
    }

    private function validarCabecera($cabecera, $validarToken = true)
    {
        // dd($cabecera);
        foreach ($cabecera as $cabe) {
            # code...

            if (!isset($cabecera)) {
                return "0001";
            }
            $imei = (int)mb_strlen($cabe->imei);
            if (empty($cabe->imei) || ($imei < 15 || $imei > 30)) {
                return "0002";
            }

            if (empty($cabe->fechahora)) {
                return "0003";
            } else {
                // dd($cabe->fechahora);
                $d = \DateTime::createFromFormat('Y-m-d H:i:s', $cabe->fechahora);

                // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
                if (!($d && $d->format('Y-m-d H:i:s') === $cabe->fechahora)) {
                    return "0004";
                }
            }
            if (empty($cabe->version)) {
                return "0005";
            } else if (!preg_match('/\d+(,\d{1,2})?/', $cabe->version)) {
                return "0006";
            }

            if (empty($cabe->division)) {
                return "0007";
            } else if (!is_numeric($cabe->division)) {
                return "0008";
            }

            // if (empty($cabe->coordx)) {
            //     return "0009";
            // }

            // if (empty($cabe->coordy)) {
            //     return "0010";
            // }

            // if(empty($cabecera["coordz"])){
            //     return "0011";
            // }

            // if($validarToken){
            //     if(empty($cabecera["token"])){
            //         return "0012";
            //     }
            //     else if(!verificarToken($cabecera["token"])){
            //         return "0013";
            //     }
            // }
        }
        return "0000";
    }

    private function proccessResponse($codigo, $data)
    {
        $return = [];
        $return["cabecera"] = [
            "codigorespuesta" => $codigo,
            "mensaje" => WSError::get($codigo),
        ];

        $array = array($data);

        $return["detalle"] = !isset($array) ? array() : $array;

        return json_encode($return);
    }

    public function rbpdv_ws1_m1()
    { // as login

        $params = Input::get("parametros");

        if (empty($params)) {
            return array("error" => "Incorrect parameters");
        }

        $params = json_decode($params);

        $cod = $this->validarCabecera($params->cabecera);
        if ($cod != "0000") {
            return $this->proccessResponse($cod, array());
        }

        // parametras para decifrar

        $emide0a5 = substr($params->cabecera[0]->imei, 0, 5);

        $emide5afinal = substr($params->cabecera[0]->imei, 5, strlen($params->cabecera[0]->imei));

        $emuifinal = $emide5afinal . $emide0a5;
        $rellanoaremui = str_pad($emuifinal, 16, "0", STR_PAD_RIGHT);

        $dates = Carbon::parse($params->cabecera[0]->fechahora)->format('Y9m9d9H9i');
        $usuario = str_replace(" ", "+", $params->detalle[0]->usuario);

        $email = PHP_AES_Cipher::decrypt($rellanoaremui, $usuario, $dates);
        $passwd = str_replace(" ", "+", $params->detalle[1]->passwd);

        $password = PHP_AES_Cipher::decrypt($rellanoaremui, $passwd, $dates);
        $respuesta = array();
        $respuesta['idusuario'] = "";
        $respuesta['iddivision'] = "";

        // login
        // validara usuario
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            try {
                //code..
                $usuarioExitoso = User::where('email', $email)->first();
                $datoCompanyUser = CompaniesUsers::where('user_id', $usuarioExitoso->id)->first();
                $datoCompany = Company::where('id', $datoCompanyUser->company_id)->first();
                $respuesta['idusuario'] = $usuarioExitoso->id;
                $respuesta['iddivision'] = $datoCompany->id;
                $respuesta['token'] = md5(gmdate("Ymd") . 'b343fcdb42af964d');

            } catch (\Throwable $th) {
                //throw $th;
                return $this->proccessResponse('0015', $respuesta);
            }
        } else {
            return $this->proccessResponse('0013', $respuesta);
        }
        // return $this->proccessResponse('0014', app('App\Http\Controllers\MainController')->execService('management', 'catalogs', 'index', ["", ""]));
        // $respuesta['token'] = createToken();

        return $this->proccessResponse('0000', $respuesta);
    }


    public function rbpdv_ws1_m2()
    {//creacion de comercio


        $params = Input::get("parametros");

        if (empty($params)) {
            return array("error" => "Incorrect parameters");
        }

        $params = json_decode($params);

        $cod = $this->validarCabecera($params->cabecera);
        if ($cod != "00000000") {
            return $this->proccessResponse($cod, array());
        }

        try {
            $emailprimerpersona = $request->email;
            $personaparacontrado = $this->crearPersona($request, 2, $request->identificacion1, $request->numberdocumento, $emailprimerpersona);

            // se crea el contrato
            // retorna el id del contrato creado
            $idcontrato = $this->crearContrato($personaparacontrado);

            // se crea el usuario administrador de contrato
            //retorna el idusercontrato
            $usuarioadministrador = $this->crearUsuario($request, $personaparacontrado, $idcontrato, $request->email, 2);
            $parte1email = explode("@", $request->email);
            $emailvendedor = $parte1email[0] . "@easysales.com";

            // se crea el usuario cajero
            $usuariovendedor = $this->crearUsuario($request, $personaparacontrado, $idcontrato, $emailvendedor, 3);

            $emailpersonajuridica = $request->email2;
            // se crea persona juridica
            $personajurica = $this->crearPersona($request, 3, $request->identificacion2, $request->numberdocumento2, $emailpersonajuridica);
            // se crea la comercio
            $this->crearCompany($request, $personajurica, $idcontrato, $usuariovendedor);

        } catch (\Throwable $th) {
            return $this->proccessResponse('0016', "Error");
        }
    }

    public function requestDataQr()
    {
        $params_json = $this->decrypAll(Input::get("parametros"));
        $qrConfirmation = new QrConfirmation();
        $qrConfirmation->idconfirmation = $params_json->id;
        $qrConfirmation->data = 'SERVICIO WEB EXITOSO';
        $qrConfirmation->status = 'pendiente';
        $qrConfirmation->save();
        $id = $qrConfirmation->id;
        DB::table('qr_confirmation')->where('id', $id)->update(['switch' => 1]);


        return 'TRANSACCIÓN EXITOSA';

    }

    public function servicioDevuelta()
    {

        $params = Input::get("id");
        $params_json = $this->decrypAll($params);

        $qrConfirmation = QrConfirmation::where('status', '=', 'pendiente')
            ->where('idconfirmation', '=', $params_json)->first();
        DB::table('qr_confirmation')->where('idconfirmation', $params_json)->update(['status' => 'procesada']);
        if ($qrConfirmation) {
            return [
                'status' => true,
                'message' => ['Transacción realizada correctamente']
            ];
        }

    }

    private function decrypAll($data)
    {
        $encdec = new \App\Http\Controllers\Security\EncdecController;
        $params_decryp = $encdec->encrypt_decrypt('decrypt', $data);
        return json_decode($params_decryp);
    }

    /**
     * @method: END POINT  para la Tarjeta Recaudo
     * @return \Illuminate\Http\JsonResponse
     */
    public function rbpdv_ws1_m3()
    {
        try {

            $encdec = new \App\Http\Controllers\Security\EncdecController;
            $token = Input::get("token");
            $token_decryp = $encdec->encrypt_decrypt('decrypt', $token);
            if ($token_decryp) {

                $validateToken = ConfirmPayments::where('token', $token_decryp)
                    ->where('status', 0)->first();
                if ($validateToken) {
                    return Response()->json(['status' => 401, 'message' => 'Token ya validado'], 401);
                }
                $count = ConfirmPayments::where('token', $token_decryp)
                    ->where('status', 1)
                    ->update(['status' => 0, 'description' => 'CONFIRMADA']);
                return $count > 0 ? response()->json(['status' => 200, 'type' => 'CONFIRMED', 'message' => 'Transacción confirmada'], 200) : response()->json(['status' => 401, 'type' => 'BAD_REQUEST', 'message' => 'Token invalido'], 400);

            } else {

                return response()->json(['status' => 400, 'type' => 'BAD_REQUEST', 'message' => 'Token invalido'], 400);
            }

        } catch (\Exception $e) {

            return response()->json(['status' => 500, 'type' => 'ERROR', 'message' => 'Error de aplicación'], 500);

        }
    }

    /**
     * @method: END POINT  para las notificaciones de MercadoPagos
     * @return \Illuminate\Http\JsonResponse
     */
    public function rbpdv_ws1_m4()
    {
        try {
            $consecutive = Input::get('consecutive');
            $id_transaction = Input::get('id');
            $type = Input::get('type');

            //Prubea de respuesta para test
            if ($type == 'test') {
                return response()->json('OK', 200);
            }

            if (empty($type)) {
                $type = "payment";
            }

            \Log::warning("Consecutivo: " . $consecutive . " - id: " . $id_transaction . " - Type: " . $type);

            if (PaidProviders::where('payment_provider_pay_id', '=', $id_transaction)->first()) {
                \Log::info("Transaccion ya verificada");
                return response()->json(['message' => 'Transaccion ya verificada'], 200);
            }

            $infoTransaction = PaidProviders::where('transaction_id', '=', $consecutive)
                ->where('status_id', '=', CREATED)->first();


            if (empty($infoTransaction)) {
                \Log::error('Error: consecutivo no encontrado');
                return response()->json(['message' => 'Error: consecutivo no encontrado'], 500);
            }
            \MercadoPago\SDK::setAccessToken($infoTransaction->access_token);
            switch ($type) {
                case "payment":
                    $payment = \MercadoPago\Payment::find_by_id($id_transaction);
                    break;
                case "test":
                    return response()->json('OK', 200);
                    break;
            }

            if (empty($payment)) {
                \Log::error('No se encontro la transaccion con el id : ' . $id_transaction);
                return response()->json(['message' => 'No se encontro la transaccion con el id : ' . $id_transaction], 401);
            }

            $infoTransaction->payment_provider_date = $payment->date_created;
            $infoTransaction->payment_provider_pay_id = $id_transaction;
            $infoTransaction->payment_provider_status = $payment->status;
            $infoTransaction->save();
            \Log::info("SUCCESS");
            return response()->json('OK', 200);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Error:' . $e->getMessage()], 500);

        }

    }

    public function rbpdv_ws1_m5()
    {

        if (count(Input::get()) <= 1) {
            return response()->json(['code' => 1005, 'message' => 'Unprocessable Entity', 'description' => 'Error empty body'], 422);

        } else {
            try {
                $data = Input::get();
                $id = Deliveries::where('tercero_info', $data['details']['uuid'])
                    ->value('id');
                if(empty($id)){
                    return response()->json(['code' => 1007, 'message' => 'Bad Response', 'description' => 'No uuid asociate'], 500);
                }
                $request = new \Illuminate\Http\Request($data);

                (new DeliveriesController)->update($request,$id);
                return response()->json('OK', 200);

            } catch (\Exception $e) {
                return response()->json(['code' => 1006, 'message' => 'Bad Response', 'description' => $e->getMessage()], 500);


            }

        }
    }

    public function rbpdv_ws1_m6(){
        try {
            $users = User::with('roles')->get();
             return response()->json([ 'users' => $users], 200);

        } catch (\Exception $e) {
            return response()->json([ 'message' => $e->getMessage()], 500);
        }
    }


}
