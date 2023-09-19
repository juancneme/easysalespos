<?php
namespace App\Models\Olap;

use phpOlap\Xmla\Connection\Connection;
use phpOlap\Xmla\Connection\Adaptator\SoapAdaptator;
use phpOlap\Layout\Table\HtmlTableLayout;
use phpOlap\Layout\Table\CsvTableLayout;
use phpOlap\Layout\Highcharts\HighChartsLayout;
use App\Models\Sir\CubQuerys;
use App\Models\Sir\Connections;

class MsOlapDao implements OlapDaoInterface {
    
    protected $dsInfo;
    protected $dsUrl;
    protected $dsCatalogName;
    protected $connection;
    public $resultSet;
    protected $error;
    protected $errorMessage;


    public function __construct(Connections $conn){
        $this->dsInfo = '';
        $this->dsUrl = $conn->url;
        $this->dsCatalogName = $conn->cube;
    }
    
    private function getConnection(){
        $adaptor = new SoapAdaptator($this->dsUrl);
        $info = $this->dsInfo;
        $cname = $this->dsCatalogName;
        $this->connection = new Connection(
            $adaptor,
            array(
                'DataSourceInfo' => $info,
                'CatalogName' => $cname
                )
        );
    }
    
    public function hasError() {
        return $this->error;
    }
    
    public function getErrorMessage() {
        return explode('Xml result', $this->errorMessage)[0];
    }
    
    public function runMdx($mdx){
        try {
            $this->getConnection();
            $this->resultSet = $this->connection->statement($mdx);
            $this->error = false;
            $this->errorMessage = "";
        }
        catch(\Exception $e){
            $this->error = true;
            $this->errorMessage = $e->getMessage();
        }
    }
    
    public function toHighCharts($resultSet){
        if(empty($resultSet)){
            return (new HighChartsLayout($this->resultSet))->generate();
        }
        else {
            return (new HighChartsLayout($resultSet))->generate();
        }
    }
    
    public function toTable($resultSet = ''){
        if(empty($resultSet)){
            return (new HtmlTableLayout($this->resultSet))->generate();
        }
        else {
            return (new HtmlTableLayout($resultSet))->generate();
        }
    }
    
    public function toDto(CubQuerys $query){
        $ret = new \stdClass();
        $listDatos = array();
        $listColumnas = array();
        $col0 = array();
        
        $listColumnas[] = "";
        if(!empty($this->resultSet->getColAxisSet())){
            foreach($this->resultSet->getColAxisSet() as $col){
                $listColumnas[] = $col[0]->getMemberCaption();
            }
        }
        
        if(!empty($this->resultSet->getRowAxisSet())){
            foreach($this->resultSet->getRowAxisSet() as $row){
                $col0[] = $row[0]->getMemberCaption();
            }
        }
//        $listDatos[] = $col0[0];
        $b = 0;
        $flag = true;
        $row = array();
        $mod = count($listColumnas) > 1 ? count($listColumnas) -1: count($listColumnas);
        for($a = 0; $a < count($this->resultSet->getDataSet());){
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
                $row[] = !empty($this->resultSet->getDataCell($a)->getFormatString()) ? 
                        $this->resultSet->getDataCell($a)->getFormatString() : 
                        $this->resultSet->getDataCell($a)->getFormatedValue();
                $a++;
                $flag = true;
            }
        }
        
        if(!empty($row)){
            $listDatos[] = $row;
        }
        
        $ret->Datos = $listDatos;
        $ret->Series = $listColumnas;
        if(!empty($query->configuration)){
            $config = json_decode($query->configuration);
            $ret->Titulo = !empty($config->Titulo) ? $config->Titulo : '';
            $ret->Subtitulo = !empty($config->Subtitulo) ? $config->Subtitulo : '';
            $ret->Tipo = !empty($config->Tipo) ? $config->Tipo : '';
            $ret->TipoComponente = !empty($config->TipoComponente) ? $config->TipoComponente : '';
            $ret->TipoGrafica = !empty($config->TipoGrafica) ? $config->TipoGrafica : '';
            $ret->icono = !empty($config->icono) ? $config->icono : '';
        }
        else {
            $ret->Titulo = "";
            $ret->Subtitulo = "";
            $ret->Tipo = "";
            $ret->TipoComponente = "";
            $ret->TipoGrafica = "";
            $ret->icono = "";
        }
        $ret->Id = !empty($query->query_id) ? $query->query_id : 0;
        $ret->IdPadre = !empty($query->parent_id) ? $query->parent_id : 0;
        $ret->Posicion = !empty($query->position) ? $query->position : 0;
        $ret->Nivel = !empty($query->level) ? $query->level : 0;
        $ret->SiguienteConsulta = !empty($query->next) ? $query->next : 0;
        
        return $ret;
    }
}