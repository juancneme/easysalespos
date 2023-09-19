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
use Vasilisq\MdxQueryBuilder\MDX\Query;
use App\Helpers\Sir\QueryBuilder\ConnectionStub;
use Vasilisq\MdxQueryBuilder\MDX\Expressions\DateRange;
use Carbon\Carbon;
use Vasilisq\MdxQueryBuilder\MDX\Period;

class AsirController extends Controller {

    protected $empresa;
    protected $fechaInicial;
    protected $fechaFinal;
    protected $params;
    
    protected $periods = [
        'DAY' => 'Day',
        'WEEK' => 'Week',
        'MONTH' => 'Month',
        'QUARTER' => 'Quarter',
//        'SEMESTER' => 'Semester',
        'YEAR' => 'Year'
    ];

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function ajax(Request $request) {
        $type = Input::get("type");
        $result = new \stdClass();
        
        switch($type){
            case 'mdx':
                $cubo = $request->cubo;
                $dimension = $request->dimension;
                $fechaInicial = $request->fechaInicial;
                $fechaFinal = $request->fechaFinal;
                $periodo = $request->periodo;
                
                $this->empresa = 1;
                
                $conn = new ConnectionStub();
                $query = new Query($conn);
                
                $query->select("[Measures].Allmembers");
                $query->by($dimension);
                $query->from($cubo);
                
                if(!empty($fechaInicial) && !empty($fechaFinal) && empty($periodo)){
                    $query->withMember('[dTiempo.amd].[RangoFechas]', 'Aggregate({[dTiempo.amd].['.$fechaInicial.']:[dTiempo.amd].['.$fechaFinal.']})');
                    $query->where('[dTiempo.amd].[RangoFechas]');
                }
                else if(!empty($fechaInicial) && !empty($fechaFinal) && !empty($periodo)){
                    $anioInicial = date('Y', strtotime($fechaInicial));
                    $mesInicial = date('m', strtotime($fechaInicial));
                    $diaInicial = date('d', strtotime($fechaInicial));
                    
                    $anioFinal = date('Y', strtotime($fechaFinal));
                    $mesFinal = date('m', strtotime($fechaFinal));
                    $diaFinal = date('d', strtotime($fechaFinal));
                    
                    $dateRange = new DateRange(
                            Carbon::createFromDate($anioInicial, $mesInicial, $diaInicial),
                            Carbon::createFromDate($anioFinal, $mesFinal, $diaFinal),
                            Period::parsePeriodString($this->periods[$periodo]),
                            'dTiempo');
                    $query->where($dateRange);
                }
                $query->where("[Empresa].&[".$this->empresa."]");
                 //dd($query->toMdx());
                $olap = new OlapDao();
                $olap->runMdx($query->toMdx());
                $result->mdx = $query->toMdx();
                if ($olap->hasError()) {
                    $result->errorMessage = $olap->getErrorMessage();
                    $result->data = array();
                } else {
                    $result->data = $olap->toSingleDto();
                    $result->errorMessage = "";
                }

                break;
            
            default:
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
                } else if(isset($this->params[str_replace('param', '', $p)])) {
                    $mdx = str_replace('@' . $p, $this->params[str_replace('param', '', $p)], $mdx);
                }
            }
        }
        //return preg_replace("/\r\n|\r|\t|\n/", "", $mdx);
        return $mdx;
    }

}
