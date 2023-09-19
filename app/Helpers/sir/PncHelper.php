<?php

namespace App\Helpers\Sir;

use App\Models\Sir\CubCubos;
use App\Models\Sir\CubQuerys;
use App\Models\Olap\OlapDao;
use DB;

/**
 * Description of PncHelper
 *
 * @author OIVANANGEL
 */
final class PncHelper {
    
    private $empresa;
    private $fechaInicial;
    private $fechaFinal;
    
    protected $result;
    protected $result2;
    protected $fields;
        
    public function __construct(Array $props = array()) {
        foreach ($props as $k => $v) {
            $this->{$k} = $v;
        }
        $this->result = array();
        $this->result2 = array();
        
        $this->fields = array();
        $this->fields[] = __('Category');
        $this->fields[] = __('Products');
        $this->fields[] = __('Weeks');
    }

    public function getReportData() {
        // MDX PARA LISTADO DE CATEGORIAS
        $queryCat = CubQuerys::select(DB::raw("querys.*"))
                ->join("cubes", "cubes.cube_id", "=", "querys.cube_id")
                ->join("connections", "connections.connection_id", "=", "cubes.connection_id")
                ->where("querys.parent_id", "=", "0")
                ->where("querys.level", "=", "0")
                ->where("querys.status", "=", "1")
                ->where("connections.status", "=", "1")
                ->where("querys.position", "=", "2")
                ->orderBy("querys.query_id", "asc")
                ->first();
//            dd($queryCat);

        $olap = new OlapDao();
//            $olap->setParams($params);
//            $mdx = $olap->replaceParameters($query->query, $query->parameters);
        $olap->runMdx($queryCat->query);
        if ($olap->hasError()) {
            $queryCat->errorMessage = $olap->getErrorMessage();
            $queryCat->result = array();
        } else {
            $queryCat->result = $olap->toDto($queryCat);
            $queryCat->errorMessage = "";
        }

        foreach ($queryCat->result->Datos as $cat) {

            // MDX PARA LISTADO PRODUCTOS * UNIDADES VENDIDAS - ABC
            $query = CubQuerys::select(DB::raw("querys.*"))
                    ->join("cubes", "cubes.cube_id", "=", "querys.cube_id")
                    ->join("connections", "connections.connection_id", "=", "cubes.connection_id")
                    ->where("querys.parent_id", "=", $queryCat->query_id)
                    ->where("querys.level", "=", "1")
                    ->where("querys.status", "=", "1")
                    ->where("connections.status", "=", "1")
                    ->where("querys.position", "=", "2")
                    ->orderBy("querys.query_id", "asc")
                    ->first();

            $params = array("empresa" => $this->empresa,
                "anio" => date('Y', strtotime($this->fechaInicial)),
                "semana1" => (int) date('W', strtotime($this->fechaInicial)),
                "semana2" => (int) date('W', strtotime($this->fechaFinal)),
                "categoria" => $cat[0]);

            $olap = new OlapDao();
            $olap->setParams($params);
            $mdx = $olap->replaceParameters($query->query, $query->parameters);
            $olap->runMdx($mdx);
            if ($olap->hasError()) {
                $query->errorMessage = $olap->getErrorMessage();
                $query->result = array();
            } else {
                $query->result = $olap->toDto($query);
                $query->errorMessage = "";
            }
            $query->result->Series = array();
            for ($a = $params['semana1']; $a <= $params['semana2']; $a++) {
                $query->result->Series[] = $a;
            }
            $this->result[$cat[0]] = $query;
        }
    }

    public function calculateReportData() {
        $this->result2 = proccessPncData($this->result);
    }

    public function getResult(){
        return $this->result;
    }
}
