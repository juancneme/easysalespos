<?php

namespace App\Models\Olap\Saiku;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author OIVANANGEL
 */
class Response {

    protected $queryModel;
    protected $cube;
    protected $mdx;
    protected $name;
    protected $parameters;
    protected $plugins;
    protected $properties;
    protected $metadata;
    protected $queryType;
    protected $type;

    public function __construct($args){
        $this->queryModel = new \stdClass(); 
        $this->parameters = new \stdClass();
        $this->plugins = new \stdClass();
        $this->metadata = new \stdClass(); 
        
        $this->queryType = "";
        $this->type = "";
        $this->name = "";
        
        $this->properties = array(); 
        if(!empty($args)){
            foreach($args as $k => $v){
                $this->$k = $v;
            }
        }
        
        $this->proccesCellSet();
    }
    
    public function __call($name, $arguments) {
        if($name == 'get' && count($arguments) == 1){
            return $this->$arguments;
        }
        else if($name == 'set' && count($arguments) == 2){
            $this->{$arguments[0]} = $arguments[1];
        }
    }
    
    public function toJSON(){
        $array = array();
        foreach($this as $k => $v){
            $array[$k] = $v;
        }
        return json_encode($array);
    }
}
