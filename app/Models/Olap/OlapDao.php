<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Olap;

use App\Models\Olap\OlapDaoInterface;
use App\Models\Sir\CubQuerys;
use App\Models\Sir\Connections;
use Illuminate\Support\Facades\Input;
/**
 * Description of OlapDao
 *
 * @author OIVANANGEL
 */
class OlapDao {
    
    protected $impl;
    private $class;
    private $params;

    public function __construct($cubeid = null){
        if(!empty($cubeid)){
            $conn = Connections::select("connections.*")
                    ->join("cubes", "cubes.connection_id", "=", "connections.connection_id")
                    ->where("cubes.status", "=", "1")
                    ->where("connections.status", "=", "1")
                    ->where("cubes.cube_id", "=", $cubeid)
                    ->first();
        }
        else {
            $conn = Connections::where("status", "=", "1")->first();
        }
        $impl = new $conn->class($conn);
        $this->params = array();
        if($impl instanceof OlapDaoInterface){
            $this->impl = $impl;
        }
        else {
            throw new Exception("Error en la implementacion del driver OlapDaoInterface");
        }
    }
    
    public function getClass(){
        return $this->class;
    }
    
    public function hasError(){
        return $this->impl->hasError();
    }
    
    public function getErrorMessage(){
        return $this->impl->getErrorMessage();
    }
    
    public function runMdx($mdx){
        return $this->impl->runMdx($mdx);
    }
    
    public function toDto(CubQuerys $query) {
        return $this->impl->toDto($query);
    }
    
    public function toSingleDto() {
        return $this->impl->toSingleDto();
    }
    
    public function setParams($params){
        if(!is_array($params)){
            throw new Exception("Variable params must be an array");
        }
        $this->params = $params;
    }
    
    public function replaceParameters($mdx, $params) {
        if (!empty($params)) {
            foreach (explode(',', $params) as $param) {
                $p = str_replace('@', '', $param);
                if (!empty(Input::get($p))) {
                    $mdx = str_replace('@' . $p, Input::get($p), $mdx);
                } 
                else if(isset($this->params[$p])) {
                    $mdx = str_replace('@' . $p, $this->params[$p], $mdx);
                }
                else if(isset($this->params[str_replace('param', '', $p)])) {
                    $mdx = str_replace('@' . $p, $this->params[str_replace('param', '', $p)], $mdx);
                }
            }
        }
        //return preg_replace("/\r\n|\r|\t|\n/", "", $mdx);
        return $mdx;
    }
}
