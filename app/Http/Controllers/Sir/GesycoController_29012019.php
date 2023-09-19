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


class GesycoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        
//        $cubs = CubCubos::orderBy('Nombre', 'asc')->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
//            'cubs' => $cubs
        ]);
    }

    public function ajax(){
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        $result->data = null;
        switch ($type){
            case "getDrillQueryByNivel":
                $id = !empty(Input::get("id")) ? Input::get("id") : 0;
                $nivel = !empty(Input::get("nivel")) ? Input::get("nivel") : 0;
                $subQuery = CubQuerys::where("id", "=", $id)->where("nivel", "=", $nivel)->first();
                if(!empty($subQuery)){
                    $mdx = $this->replaceParameters($subQuery->Query, $subQuery->Parametros);
                    $olap = new OlapDao();
                    $olap->runMdx($mdx);
                    $result->success = true;
                    $result->data = $olap->toDto($subQuery);
                }
                else {
                    $result->success = true;
                    $result->data = array();
                }
                break;
        }
        
        return json_encode($result);
    }
    
    private function replaceParameters($mdx, $params){
        if(!empty($params)){
            foreach(explode(',', $params) as $param){
                $mdx = str_replace('@'.$param, Input::get($param), $mdx);
            }
        }
        return $mdx;
    }
}
