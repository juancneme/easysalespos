<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use App\Models\Sir\CubCubos;
use App\Models\Sir\CubQuerys;
use App\Models\Olap\OlapDao;
use Illuminate\Support\Facades\Input;

class SirController extends Controller {

    protected $empresa;
    protected $fechaInicial;
    protected $fechaFinal;
    protected $params;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

//        $cubs = CubCubos::orderBy('Nombre', 'asc')->get();
        $querys = array();

//        $this->empresa = empty(Input::get("empresa")) ? 1 : Input::get("empresa");
//        $this->anio = empty(Input::get("year")) ? 2017 : Input::get("year");
//        $this->mes = empty(Input::get("month")) ? 10 : Input::get("month");
//        $this->dia = empty(Input::get("day")) ? 1 : Input::get("day");
        $this->empresa = Input::get("empresa");
        $this->fechaInicial = Input::get("fechaInicial");
        $this->fechaFinal = Input::get("fechaFinal");

        if (!empty($this->empresa) && !empty($this->fechaInicial) && !empty($this->fechaFinal)) {
            
            $querys = CubQuerys::select(DB::raw("querys.*"))
                ->join("cubes", "cubes.cube_id", "=", "querys.cube_id")
                ->join("connections", "connections.connection_id", "=", "cubes.connection_id")
                ->where("querys.parent_id", "=", 0)
                ->where("querys.level", "=", 0)
                ->where("querys.status", "=", "1")
//                ->where("connections.status", "=", "1")
                ->where("querys.position", "=", "0")
                ->orderBy("querys.query_id", "asc")
                ->get();
            
            foreach ($querys as &$query) {
                $olap = new OlapDao($query->cube_id);
                $mdx = $this->replaceParameters($query->query, $query->parameters);
                $olap->runMdx($mdx);
                if ($olap->hasError()) {
                    $query->errorMessage = $olap->getErrorMessage();
                    $query->result = array();
                } else {
                    $query->result = $olap->toDto($query);
                    $query->errorMessage = "";
                }
            }
        }
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'querys' => $querys
        ]);
    }

    public function ajax() {
        $type = Input::get("type");
        $this->empresa = empty(Input:: get("empresa")) ? $this->empresa : Input::get("empresa");
        $this->fechaInicial = empty(Input:: get("fechaInicial")) ? $this->fechaInicial : Input::get("fechaInicial");
        $this->fechaFinal = empty(Input::get("fechaFinal")) ? $this->fechaFinal : Input::get("fechaFinal");
        $this->params = empty(Input::get("params")) ? array() : Input::get("params");
        
        $result = new \stdClass();
        $result->success = false;
        $result->data = null;
        switch ($type) {
            case "getDrillQueryByNivel":
                //$idpadre = 0; 
                $id = !empty(Input::get("id")) ? Input::get("id") : 0;
                $nivel = !empty(Input::get("nivel")) ? Input::get("nivel") : 0;
                $idpadre = !empty(Input::get("idpadre")) ? Input::get("idpadre") : 0;
                foreach($this->params as $k => $v){
                    try {
                        $val = intval($v);
                    } catch (Exception $ex) {
                        
                    }
                    if($nivel == ($k + 1) && getType($val) == 'integer'){
                        $idpadre = $val;
                        break;
                    }
                }
                
                $qq = CubQuerys::where("level", "=", $nivel)->where("status", "=", "1");
                if (!empty(Input::get("sub")) && Input::get("sub") == "true") {
                    if(!empty($idpadre)){
                        $qq->where("query_id", "=", $id);
                        $qq->where("parent_id", "=", $idpadre);
                    }
//                    else {
//                        $qq->where("query_id", "=", $id);
//                    }
                    else {
                        $qq->where("parent_id", "=", $id);   
                    }
                } else {
                    $qq->where("query_id", "=", $id);
                }
                $subQuery = $qq->first();
                if (!empty($subQuery)) {
                    $mdx = $this->replaceParameters($subQuery->query, $subQuery->parameters);
                    $olap = new OlapDao($subQuery->cube_id);
//                    if($olap->getClass() == '\App\Models\Olap\PentahoOlapDao'){
//                        $mdx = "select NON EMPTY {[Measures].[ventas]} ON COLUMNS,
//                            NON EMPTY {([Time].[All time], [d_tiendas.New Hierarchy 0].[All d_tiendas.New Hierarchy 0s])} ON ROWS
//                          from [VENTAS]";
//                    }
                    $olap->runMdx($mdx);
                    $result->success = !$olap->hasError();
                    if (!$olap->hasError()) {
                        $result->data = $olap->toDto($subQuery);
                    } else {
                        $result->data = array();
                        $result->errorMessage = $olap->getErrorMessage();
                    }
                } else {
                    $result->success = true;
                    $result->data = array();
                }
                break;
            case "getSubQuerys":
                $temp = array();
                $idpadre = !empty(Input::get("id")) ? Input::get("id") : 0;
                $nivel = !empty(Input::get("nivel")) ? Input::get("nivel") : 0;
                $subQuerys = CubQuerys::where("level", "=", ($nivel + 1))->where("parent_id", "=", $idpadre)->where("status", "=", "1")->get();
                
                $result->success = true;
                if (!empty($subQuerys)) {
                    foreach ($subQuerys as $query) {
                        $olap = new OlapDao($query->cube_id);
                        if (empty($query->query)) {
                            $temp[] = $olap->toDto($query);
                        } else {
                            $mdx = $this->replaceParameters($query->query, $query->parameters);
                            $olap->runMdx($mdx);
                            if (!$olap->hasError()) {
                                $temp[] = $olap->toDto($query);
                            } else {
                                $result->errorMessage = $olap->getErrorMessage();
                                $result->success = false;
                                break;
                            }
                        }
                    }
                }
                $result->data = $temp;

                break;
        }

        return json_encode($result);
    }

    public function replaceParameters($mdx, $params) {
        if (!empty($params)) {
            foreach (explode(',', $params) as $param) {
                $p = str_replace('@', '', $param);
                if (!empty(Input::get($p))) {
                    $mdx = str_replace('@' . $p, Input::get($p), $mdx);
                } else {
                $mdx = str_replace('@' . $p, $this->params[str_replace('param', '', $p)], $mdx);
                }
            }
        }
        //return preg_replace("/\r\n|\r|\t|\n/", "", $mdx);
        return $mdx;
    }

}
