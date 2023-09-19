<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Helpers\WSError;
use Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Management\User;
use Carbon\Carbon;
use App\Http\Controllers\PHP_AES_Cipher;
use App\Models\Management\CompaniesUsers;

const CORRECT_RESULT = "0";
const RESULT_WITH_ERROR = "1";

//start_s0100 : LogIN

class StartsessionController extends Controller
{
    private $tasks = array('start_s0100');

    public function index() {

        Log::useDailyFiles(storage_path().'/logs/startlog.log');

        $rpc_task = Input::get('rpc_task');
        Log::info('WS: '.$rpc_task);
        if (!in_array($rpc_task, $this->tasks)) {
            return $this->processResponse("0016", array("error" => "Indeterminate action name!"));
        } else {
            if ($rpc_task != $this->tasks[0] ){
                if (Input::get("rpc_token") != md5(gmdate("Ymd") . 'b343fcdb42af964d')) {
                    return $this->processResponse("0016", array("error " => "Access not invalidated!" . md5(gmdate("Ymd") . 'b343fcdb42af964d')));
                }
            }
        }

        $params = Input::get("parametros");
        if (empty($params)) {
            return $this->processResponse("0016", array("error " => "Incorrect parameters"));
        }
        $valRet = $this->validate_strDataService($params, $rpc_task);
        if ( $valRet != "0" ) {
            return $this->processResponse("0016", array("error " => $valRet));
        }

        Log::info('WS - PARAMS: '.$params);

        return $this->$rpc_task($params);
    }
    
    //WEB SERVICE PROCESO: LogIN 
    public function start_s0100($params) {

        $params = json_decode($params);

        $emide0a5 = substr($params->cabecera[0]->imei, 0, 5);
        $emide5afinal = substr($params->cabecera[0]->imei, 5, strlen($params->cabecera[0]->imei));

        $emuifinal = $emide5afinal . $emide0a5;
        $rellanoaremui = str_pad($emuifinal, 16, "0", STR_PAD_RIGHT);

        $dates = Carbon::parse($params->cabecera[0]->fechahora)->format('Y9m9d9H9i');

        $usuario = $params->detalle[0]->usuario;
        $email = PHP_AES_Cipher::decrypt($rellanoaremui, $usuario, $dates);

        $passwd = $params->detalle[0]->passwd;
        $password = PHP_AES_Cipher::decrypt($rellanoaremui, $passwd, $dates);

        $respuesta = array();

        // validara usuario se debe implementar si usuario logeado ********************
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $respuesta['idusuario'] = "";
            $respuesta['idcontract'] = "";
            $respuesta['idcompany'] = "";
            $respuesta['token'] = "";
            try {
                $usuarioExitoso = User::where('email', $email)->first();
                $datoCompanyUser = CompaniesUsers::where('user_id', $usuarioExitoso->id)->first();

                //validacione para aceptar el usuario en el movil
                //Este activo
                //Este asociado a una compañia Comercio como cajero
                //La comercio tenga un catalogo
                //El catalogo tenga productos
                //Que tenga Categorias asociadas

                $respuesta['idusuario'] = $usuarioExitoso->id;
                $respuesta['idcontract'] = $usuarioExitoso->contract_id;
                $respuesta['idcompany'] = $datoCompanyUser->company_id;
                $respuesta['token'] = md5(gmdate("Ymd") . 'b343fcdb42af964d');
            } catch (\Throwable $th) {
                return $this->processResponse('0015', $respuesta);
            }
        } else {
            return $this->processResponse('0013', $respuesta);
        }

        return $this->processResponse('0000', $respuesta);
    }

	public function validate_strDataService($strData, $Task) {
        $valRet = CORRECT_RESULT;
        $objResp = json_decode($strData);
        $valRet = $this->validate_information($objResp, "cabecera", 0);
		if ($valRet == CORRECT_RESULT ) {
			$valRet = $this->validate_information($objResp, "detalle", 0);
			if ($valRet == CORRECT_RESULT) {
                $CB = $objResp->cabecera[0];
				$valRet = $this->validate_information($CB, "cabecera", 1);
				if ($valRet == CORRECT_RESULT)  {
                    $DT = $objResp->detalle;
                    foreach ($DT as $dtt) {
                        $valRet = $this->validate_information($dtt, $Task, 1);
                        if (!$valRet == "0" ) break;
                    }
				}
			}
        }
		return $valRet;
	}

	private function validate_information($jSonObj, $tipoInfo, $swTipo) {

        $valRet = CORRECT_RESULT;
		if ($swTipo == 0){
    		if (empty($jSonObj->$tipoInfo)) {
				$valRet = RESULT_WITH_ERROR . ": No llego el campo " . $tipoInfo;
			}
		} else {
            //leer tabla con los cmapos segun el tipo de servicio
            $valRet = CORRECT_RESULT;
            $camposServ = array();
            switch($tipoInfo){
                //cabecra
                case "cabecera" :
                    $camposServ = array('imei','version','division','fechahora','coordx','coordy','coordz');
                break;
                //LogIN
                case "start_s0100" :
                    $camposServ = array('usuario','passwd');
                break;
            }
			if (!empty($camposServ)) {
                foreach ($camposServ as $campo) {
                    //Sedeben validar unos que esten y tengan valor obligatorios con empty .... los otros solo que esten
                    if (!isset($jSonObj->$campo) ) {
						$valRet = RESULT_WITH_ERROR . ": No llego el campo " . $campo . " de " . $tipoInfo;
						break;
                    }
                }
				// if (count($camposServ) != count($jSonObj) || true) {
				// 	$valRet = "1" . ": Faltan campos " . " de " . $tipoInfo;
                // }
			} else {
				$valRet = RESULT_WITH_ERROR . ": No hay campos definicidos servicio " . $tipoInfo;
            }
        }
		return $valRet;
	}

    private function processResponse($codigo, $data){
        $return = [];
        $return["cabecera"] = [
            "codigorespuesta" => $codigo,
            "mensaje" => WSError::get($codigo)
        ];
      
        $array = array($data);

        $return["detalle"] = !isset($array) ? array() : $array;

        return json_encode($return);
    }

}
