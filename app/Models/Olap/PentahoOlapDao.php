<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Olap;

use App\Models\Sir\CubQuerys;
use App\Models\Sir\Connections;

/**
 * Description of PentahoOlapDao
 *
 * @author OIVANANGEL
 */
class PentahoOlapDao implements OlapDaoInterface {

    protected $url;
    protected $user;
    protected $pass;
    protected $catalog;
    protected $resultSet;
    protected $error;
    protected $errorMessage;
    
    protected $vars = [ "Total", "AVG", "Promedio", "Porcentaje", "Mediana" ];

    public function __construct(Connections $conn) {
        $this->url = $conn->url;
        $this->user = $conn->user;
        $this->pass = $conn->password;
        $this->catalog = $conn->cube;
    }

    public function runMdx($mdx) {
        $params = new \stdClass();
        $params->connectionName = $this->catalog;
        $params->query = $mdx;
        $params->tidy = new \stdClass();
        $params->tidy->enabled = false;
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_URL, $this->url . 'query');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $data = curl_exec($ch);
        curl_close($ch);
        $this->resultSet = json_decode($data);
        if($this->resultSet instanceof \stdClass && !empty($this->resultSet->reason)){
            $this->error = true;
            $this->errorMessage = $this->resultSet->reason . ": " . $this->resultSet->rootCauseReason;
        }
        else {
            $this->error = false;
            $this->errorMessage = "";
        }
    }
    
    public function hasError() {
        return $this->error;
    }
    
    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function toDto(CubQuerys $query) {
        $ret = new \stdClass();
        $listDatos = array();
        $listColumnas = array();
        $listCeldas = array();
        $listEje3 = array();
        $col0 = array();
        $col1 = array();
        
        $listColumnas[] = "";
        
        if(!empty($this->resultSet->cells)){
            foreach($this->resultSet->cells as $cell){
                $obj = new \stdClass();
                $obj->formattedValue = $cell->formattedValue;
                $obj->value = $cell->value;
                $obj->ordinal = $cell->ordinal;
                $obj->row = $cell->coordinates[1];
                $obj->column = $cell->coordinates[0];
                $listCeldas[$cell->coordinates[1]][$cell->coordinates[0]] = $obj;
            }
        }
        
        //for columns
        if(!empty($this->resultSet->axes[0])){
            foreach($this->resultSet->axes[0]->positions as $col){
//                $listColumnas[] = $col->memberDimensionValues[0];
                $listColumnas[] = $col->positionMembers[0]->memberValue;
            }
        }
        
        //for rows
        if(!empty($this->resultSet->axes[1])){
            foreach($this->resultSet->axes[1]->positions as $col){
//                $col0[] = $col->memberDimensionValues[0];
                $col0[] = $col->positionMembers[0]->memberValue;
            }
        }
        
        //for 3 axis
        if(!empty($this->resultSet->axes[2])){
            foreach($this->resultSet->axes[2]->positions as $col){
//                $listEje3[] = $col->memberDimensionValues[0];
                $listEje3[] = $col->positionMembers[0]->memberValue;
            }
        }
        
        $listVars = array();
        $b = 0;
        $flag = true;
        $row = array();
        $mod = count($listColumnas) > 1 ? count($listColumnas) -1: count($listColumnas);
        if(!empty($this->resultSet->cells)){
            for($a = 0; $a < count($this->resultSet->cells);){
                if($flag && ($a % $mod == 0 && $b < count($col0))){
//                if($flag){
                    if(!empty($row)){
                        $listDatos[] = $row;
                    }
                    $row = array();
                    if($this->isVar($col0[$b])){
                        $obj = new \stdClass();
                        $obj->rownum = $b;
                        $obj->var = $col0[$b];
                        $listVars[] = $obj;
                    }
                    
                    $row[] = $col0[$b];
                    
                    $b++;
                    //$a++;
                    $flag = false;
                }
                else {
                    
                    $row[] = /*!empty($this->resultSet->cells[$a]->formattedValue) ?  
                            $this->resultSet->cells[$a]->formattedValue; :
//                            number_format($this->resultSet->cells[$a]->value, 2, ',', '.');*/
                            str_replace(".", ",", str_replace(",", "", $this->resultSet->cells[$a]->value));
                    $a++;
                    $flag = true;
                }
            }
        }
        
        if(!empty($row)){
            $listDatos[] = $row;
        }
        
        foreach($listVars as $k => &$v){
            if(isset($listDatos[$v->rownum]) && !empty($listDatos[$v->rownum])){
                $v->row = $listDatos[$v->rownum];
                unset($listDatos[$v->rownum]);
            }
        }
        
        $ret->Datos = $listDatos;
        $ret->eje3 = $listEje3;
        $ret->vars = $listVars;
        $ret->Series = $listColumnas;
        $ret->Celdas = $listCeldas;
                
        if(!empty($query->configuration)){
            $config = json_decode($query->configuration);
            $ret->Titulo = !empty($config->Titulo) ? $config->Titulo : '';
            $ret->Subtitulo = !empty($config->Subtitulo) ? $config->Subtitulo : '';
            $ret->Tipo = !empty($config->Tipo) ? $config->Tipo : '';
            $ret->TipoComponente = !empty($config->TipoComponente) ? $config->TipoComponente : '';
            $ret->TipoGrafica = !empty($config->TipoGrafica) ? $config->TipoGrafica : '';
            $ret->GraficaGrupo = !empty($config->GraficaGrupo) ? $config->GraficaGrupo : false;
            $ret->icono = !empty($config->icono) ? $config->icono : '';
            $ret->color = !empty($config->color) ? $config->color : '';
            
            // options table
            $ret->filters = !empty($config->filters) ? $config->filters : false;
            $ret->columns = !empty($config->columns) ? $config->columns : false;
            $ret->exports = !empty($config->exports) ? $config->exports : false;
            $ret->totals = !empty($config->totals) ? $config->totals : false;
            $ret->footers = !empty($config->footers) ? $config->footers : false;
                        
            // options graph
            $ret->inverted = !empty($config->inverted) ? $config->inverted : false;
            $ret->grouped = !empty($config->grouped) ? $config->grouped : false;
            $ret->stacking = !empty($config->stacking) ? $config->stacking : false;
            $ret->percent = !empty($config->percent) ? $config->percent : false;
            $ret->option3d = !empty($config->option3d) ? $config->option3d : false;
            $ret->drawvars = !empty($config->drawvars) ? $config->drawvars : false;
            $ret->totalspie = !empty($config->totalspie) ? $config->totalspie : false;
        }
        else {
            $ret->Titulo = "";
            $ret->Subtitulo = "";
            $ret->Tipo = "";
            $ret->TipoComponente = "";
            $ret->TipoGrafica = "";
            $ret->GraficaGrupo = false;
            $ret->icono = "";
            $ret->color = "";
            
            // options table
            $ret->filters = false;
            $ret->columns = false;
            $ret->exports = false;
            $ret->totals = false;
            $ret->footers = false;
            
            // options graph
            $ret->inverted = false;
            $ret->grouped = false;
            $ret->stacking = false;
            $ret->percent = false;
            $ret->option3d = false;            
            $ret->drawvars = false;
            $ret->totalspie = false;
        }
        
        $ret->Id = !empty($query->query_id) ? $query->query_id : 0;
        $ret->IdPadre = !empty($query->parent_id) ? $query->parent_id : 0;
        $ret->Posicion = !empty($query->position) ? $query->position : 0;
        $ret->Nivel = !empty($query->level) ? $query->level : 0;
        $ret->SiguienteConsulta = !empty($query->next) ? $query->next : 0;
        
        $ret->crossQuerys = $query->cross_querys();
        
        $ret->htmlTable = $this->toTable($listDatos, $listColumnas);
        return $ret;
    }
    
    private function isVar($txt){
        foreach($this->vars as $k => $v){
            if($v == $txt){
                return true;
            }
        }
        return false;
    }

    public function toSingleDto(){
        $ret = new \stdClass();
        $listDatos = array();
        $listColumnas = array();
        $listCeldas = array();
        $col0 = array();
        
        $listColumnas[] = "";
        
        if(!empty($this->resultSet->cells)){
            foreach($this->resultSet->cells as $cell){
                $obj = new \stdClass();
                $obj->formattedValue = $cell->formattedValue;
                $obj->value = $cell->value;
                $obj->ordinal = $cell->ordinal;
                $obj->row = $cell->coordinates[1];
                $obj->column = $cell->coordinates[0];
                $listCeldas[$cell->coordinates[1]][$cell->coordinates[0]] = $obj;
            }
        }
        
        //for columns
        if(!empty($this->resultSet->axes[0])){
            foreach($this->resultSet->axes[0]->positions as $col){
                $listColumnas[] = $col->memberDimensionValues[0];
            }
        }
        
        //for rows
        if(!empty($this->resultSet->axes[1])){
            foreach($this->resultSet->axes[1]->positions as $col){
                $col0[] = $col->memberDimensionValues[0];
            }
        }
        
        $b = 0;
        $flag = true;
        $row = array();
        $mod = count($listColumnas) > 1 ? count($listColumnas) -1: count($listColumnas);
        if(!empty($this->resultSet)){
            for($a = 0; $a < count($this->resultSet->cells);){
                if($flag && ($a % $mod == 0 && $b < count($col0))){
                    if(!empty($row)){
                        $listDatos[] = $row;
                    }
                    $row = array();
                    $row[] = $col0[$b];
                    $b++;
                    $flag = false;
                }
                else {
                    $row[] = /*!empty($this->resultSet->cells[$a]->formattedValue) ? 
                            $this->resultSet->cells[$a]->formattedValue : */
//                            number_format($this->resultSet->cells[$a]->value, 2, ',', '.');
                            $this->resultSet->cells[$a]->value;
                    $a++;
                    $flag = true;
                }
            }
        }
        
        if(!empty($row)){
            $listDatos[] = $row;
        }
        
        $ret->Datos = $listDatos;
        $ret->Series = $listColumnas;
        $ret->Celdas = $listCeldas;
                
//        if(!empty($query->configuration)){
//            $config = json_decode($query->configuration);
//            $ret->Titulo = !empty($config->Titulo) ? $config->Titulo : '';
//            $ret->Subtitulo = !empty($config->Subtitulo) ? $config->Subtitulo : '';
//            $ret->Tipo = !empty($config->Tipo) ? $config->Tipo : '';
//            $ret->TipoComponente = !empty($config->TipoComponente) ? $config->TipoComponente : '';
//            $ret->TipoGrafica = !empty($config->TipoGrafica) ? $config->TipoGrafica : '';
//            $ret->GraficaGrupo = !empty($config->GraficaGrupo) ? $config->GraficaGrupo : false;
//            $ret->icono = !empty($config->icono) ? $config->icono : '';
//        }
//        else {
            $ret->Titulo = "";
            $ret->Subtitulo = "";
            $ret->Tipo = "";
            $ret->TipoComponente = "";
            $ret->TipoGrafica = "";
            $ret->GraficaGrupo = false;
            $ret->icono = "";
//        }
        $ret->Id = 0;
        $ret->IdPadre = 0;
        $ret->Posicion = 0;
        $ret->Nivel = 0;
        $ret->SiguienteConsulta = 0;
        
        $ret->htmlTable = $this->toTable($listDatos, $listColumnas);
        return $ret;
    }

    public function toTable($listDatos, $listColumnas){
        
        $html = '<table class="table table-hover table-striped" align="center" border="1">';
        
        $html .= '<thead>';
        $html .= '<tr>';
        foreach($listColumnas as $c){
            $html .= '<th>'.$c.'</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';
        
        $html .= '<tbody>';
        foreach($listDatos as $d){
            $html .= '<tr>';
            foreach($d as $row){
                $html .= '<td>'.$row.'</td>';
            }
            $html .= '</tr>';
        }
        $html .= '<tbody>';
        
        $html .= '</table>';
        return $html;
    }
}
