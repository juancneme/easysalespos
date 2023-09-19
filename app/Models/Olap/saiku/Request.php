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
class Request {

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
        if(!empty($args)){
            foreach($args as $k => $v){
                $this->$k = $v;
            }
        }
        $this->queryModel = new \stdClass(); 
        $this->parameters = new \stdClass();
        $this->plugins = new \stdClass();
        $this->metadata = new \stdClass(); 
        
        $this->queryType = "OLAP";
        $this->type = "MDX";
        $this->name = "9E18D0AD-5355-5A18-8567-5FCBFFF579B4";
        
        $this->properties = array(); 
        $this->properties["saiku.olap.query.automatic_execution"] = true;
        $this->properties["saiku.olap.query.nonempty"] = true;
        $this->properties["saiku.olap.query.nonempty.rows"] = true;
        $this->properties["saiku.olap.query.nonempty.columns"] = true;
        $this->properties["saiku.ui.render.mode"] = "table";
        $this->properties["saiku.olap.query.filter"] = true;
        $this->properties["saiku.olap.result.formatter"] = "flat";
        $this->properties["org.saiku.query.explain"] = true;
        $this->properties["saiku.olap.query.drillthrough"] = true;
        $this->properties["org.saiku.connection.scenario"] = false;
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
