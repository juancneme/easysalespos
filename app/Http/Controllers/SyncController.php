<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Helpers\WSError;
use App\Models\Management\CatalogProducts;
use Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Management\Category;
use App\Models\Management\Company;
use App\Models\Management\Product;

const CORRECT_RESULT    = "0";
const RESULT_WITH_ERROR = "1";

//pdvi_u0101 : Answers
//pdvi_u0102 : Registers
//pdvi_u0103 : Supports
//pdvi_u0104 : SupportsFiles

class SyncController extends Controller
{
    private $tasks = array(
        'pdvi_u0101', // 
        'pdvi_u0102', // 
        'pdvi_u0103', // 

        'pdvi_d0101', // Company
        'pdvi_d0102', // Categories
        'pdvi_d0103'  // Products
    );

    public function index() {

        Log::useDailyFiles(storage_path().'/logs/synclog.log');

        $rpc_task = Input::get('rpc_task');
        Log::info('WS: '.$rpc_task);
        if (!in_array($rpc_task, $this->tasks)) {
            return $this->processResponse("0016", array("error" => "Indeterminate action name!"));
        } else {
            if (Input::get("rpc_token") != md5(gmdate("Ymd") . 'b343fcdb42af964d')) {
                return $this->processResponse("0016", array("error " => "Access not invalidated!" . md5(gmdate("Ymd") . 'b343fcdb42af964d')));
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
    
    //WEB SERVICE PROCESO: Answers
    public function pdvi_u0101($params) {

        $params = json_decode($params);

        $respuesta = array();
        $respuesta['maid']  = $params->detalle[0]->maid;
        $respuesta['said'] = 10000+$params->detalle[0]->maid;

        // // validara usuario
        // if ($email == 'eEU0dC9Nc0hVQTlnWHRqbGRwT0lYTlEyQ2VHYmlBMGdzbTM1bnVSRXU5MD0=' && $password == 'K2Nyczdld2FRSWF0RkNZZCtGSVAwZz09') {
        //     try {
        //         $respuesta['users'] = $this->list_users();
        //         $respuesta['token'] = md5(gmdate("Ymd") . 'b343fcdb42af964d');
        //     } catch (\Throwable $th) {
        //         //throw $th;
        //         return $this->processResponse('0015', $respuesta);
        //     }
        // } else {
        //     return $this->processResponse('0013', $respuesta);
        // }
        return $this->processResponse('0000', $respuesta);
    }

    //WEB SERVICE PROCESO: Registers 
    public function pdvi_u0102($params) {

        $params = json_decode($params);

        $respuesta = array();
        $respuesta['mrid']  = $params->detalle[0]->mrid;

        // // validara usuario
        // if ($email == 'eEU0dC9Nc0hVQTlnWHRqbGRwT0lYTlEyQ2VHYmlBMGdzbTM1bnVSRXU5MD0=' && $password == 'K2Nyczdld2FRSWF0RkNZZCtGSVAwZz09') {
        //     try {
        //         $respuesta['users'] = $this->list_users();
        //         $respuesta['token'] = md5(gmdate("Ymd") . 'b343fcdb42af964d');
        //     } catch (\Throwable $th) {
        //         //throw $th;
        //         return $this->processResponse('0015', $respuesta);
        //     }
        // } else {
        //     return $this->processResponse('0013', $respuesta);
        // }
        
        return $this->processResponse('0000', $respuesta);
    }

    //WEB SERVICE PROCESO: Supports
    public function pdvi_u0103($params) {

        $params = json_decode($params);

        $respuesta = array();
        $respuesta['msid']  = $params->detalle[0]->msid;

        // // validara usuario
        // if ($email == 'eEU0dC9Nc0hVQTlnWHRqbGRwT0lYTlEyQ2VHYmlBMGdzbTM1bnVSRXU5MD0=' && $password == 'K2Nyczdld2FRSWF0RkNZZCtGSVAwZz09') {
        //     try {
        //         $respuesta['users'] = $this->list_users();
        //         $respuesta['token'] = md5(gmdate("Ymd") . 'b343fcdb42af964d');
        //     } catch (\Throwable $th) {
        //         //throw $th;
        //         return $this->processResponse('0015', $respuesta);
        //     }
        // } else {
        //     return $this->processResponse('0013', $respuesta);
        // }
        
        return $this->processResponse('0000', $respuesta);
    }

    //WEB SERVICE PROCESO: Company
    public function pdvi_d0101($params) {

        $params = json_decode($params);

        $respuesta = array();

        $idCompany = $params->detalle[0]->companyid;

        $Company = Company::where('id', $idCompany)
                //->with('Persona')
                ->with(array('Persona' => function($query) {
                    $query
                        ->with('Location','ContactPhone');
                }))
                ->first();

            try {
                array_push($respuesta, 
                array(
                    "id" => $Company->id,
                    "scid" => $Company->id,
                    "nombre" => $Company->name,
                    "slogan" => $Company->slogan,
                    "logo" => $Company->logo,
                    "typecompany" => $Company->typecompany_id,
                    "idowner" => $Company->idowner,
                    "catalogid" => $Company->catalog_id,
                    "direccion" => empty($Company->Persona->Location[0]->address) ? '' : $Company->Persona->Location[0]->address,
                    "contacto" => $Company->Persona->socialreason.$Company->Persona->firstname.' '.$Company->Persona->othernames.' '.$Company->Persona->lastname.' '.$Company->Persona->otherlastname,
                    "nit" => $Company->Persona->numberdocument,
                    "telefono" => empty($Company->Persona->ContactPhone[0]->textcontact) ? '' : $Company->Persona->ContactPhone[0]->textcontact,
                ));
            } catch (\Throwable $th) {
                //throw $th;
                return $this->processResponse('0015', $respuesta);
            }

        return $this->processResponse('0000', $respuesta);
    }

    //WEB SERVICE PROCESO: Categories
    public function pdvi_d0102($params) {

        $params = json_decode($params);

        $respuesta = array();

        $idContract = $params->detalle[0]->contractid;

        $Categories = Category::where('contract_id', $idContract)->get();

        foreach ($Categories as $Category) {
            try {
                array_push($respuesta, 
                array(
                    "id" => $Category->id,
                    "scid" => $Category->id,
                    "nombre" => $Category->name,
                    "nombrecorto" => $Category->shortname,
                    "imagen" => $Category->image,
                    "orden" => $Category->order,
                    "masterid" => $Category->master_id,
                    "idowner" => $Category->id, //$Categorys->idorder;
                    "typemodal" => $Category->typemodal,
                    "status" => $Category->status,
                ));
            } catch (\Throwable $th) {
                return $this->processResponse('0015', $respuesta);
            }
        }
        return $this->processResponse('0000', $respuesta);
    }

    //WEB SERVICE PROCESO: Products
    public function pdvi_d0103($params) {

        $params = json_decode($params);

        $respuesta = array();

        $Products = CatalogProducts::where('catalog_id', 4000)->get();

        foreach($Products as $Product){
            try {
                array_push($respuesta, 
                array(
                    "id" => $Product->id,
                    "spid" => $Product->id,
                    "catalogid" => $Product->catalog_id,
                    "nombre" => $Product->name,
                    "productid" => $Product->product_id,
                    "categoryid" => $Product->category_id,
                    "salesunitid" => $Product->salesunit_id,
                    "saleprice" => $Product->saleprice,
                    "barcode" => $Product->barcode,
                    "taxvalue" => 19,
                    "imagen" => 'imagen0001',
                    "idpartner" => $Product->idpartner,
                    "status" => $Product->status,
                ));
            } catch (\Throwable $th) {
                //throw $th;
                return $this->processResponse('0015', $respuesta);
            }
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


                //UPLOAD DATA
                //Answers
                case "pdvi_u0101" :
                    $camposServ = array('maid','idvisita','idform','preid','item','idanswer','answer','observacion','suid','secuencia');
                break;
                //Registers
                case "pdvi_u0102" :
                    $camposServ = array('mrid', 'operacion', 'version', 'usuario', 'fecha', 'imei', 'identificador', 'latitud', 'longitud', 'altitud', 'proveedor');
                break;
                //Supports
                case "pdvi_u0103" :
                    $camposServ = array('msid', 'idanswer', 'consecutivo', 'tiposoporte', 'urlsoporte');
                break;
                //SupportsFiles
                case "pdvi_u0104" :
                    $camposServ = array('msid', 'urlsoporte', 'tiposoporte', 'bitmapimg');
                break;


                //DOWNLOAD DATA
                //Company
                case "pdvi_d0101" :
                    $camposServ = array('userid', 'companyid', 'contractid');
                break;
                //Categories
                case "pdvi_d0102" :
                    $camposServ = array('userid', 'companyid', 'contractid');
                break;
                //Products
                case "pdvi_d0103" :
                    $camposServ = array('userid', 'companyid', 'contractid');
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
      
        //$array = array($data);

        $return["detalle"] = !isset($data) ? array() : $data;
        return json_encode($return);
    }

}
