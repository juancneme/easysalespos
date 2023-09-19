<?php

namespace App\Models\Sir\Xml;

use App\Models\Sir\Xml\Hierarchy;

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
class Dimension {
    
    // attributes
    protected $type;
    protected $visible;
    protected $highCardinality;
    protected $name;

    // dependencies
    protected $hierarchies = [];

    public function __construct($xml) {
        if(!empty($xml['@attributes'])){
            foreach($xml['@attributes'] as $name => $val){
                $this->{$name} = $val;
            }
        }
        
        if(!empty($xml["Hierarchy"])){
            foreach($xml["Hierarchy"] as $obj){
                $this->hierarchies[] = new Hierarchy($obj);
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
