<?php

namespace App\Models\Sir\Xml;

use App\Models\Sir\Xml\Dimension;
use App\Models\Sir\Xml\Cube;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Schema
 *
 * @author OIVANANGEL
 */
class Schema {
    
    // attributes
    protected $name; 
    protected $description;
    
    // dependencies
    private $dimensions = [];
    private $cubes = [];
 
    public function __construct($xml) {
        if(!empty($xml['@attributes'])){
            foreach($xml['@attributes'] as $name => $val){
                $this->{$name} = $val;
            }
        }
        
        if(!empty($xml["Dimension"])){
            foreach($xml["Dimension"] as $obj){
                $this->dimensions[] = new Dimension($obj);
            }
        }
        
        if(!empty($xml["Cube"])){
            foreach($xml["Cube"] as $obj){
                $this->cubes[] = new Cube($obj);
            }
        }
    }
    
    public function __call($name, $arguments) {
        if($name == 'get' && count($arguments) == 1){
            return $this->$arguments;
        }
        else if($name == 'set' && count($arguments) == 2){
            $this->{$arguments[0]} = $arguments[1];
        }
    }    
}
