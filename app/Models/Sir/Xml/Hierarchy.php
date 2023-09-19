<?php

namespace App\Models\Sir\Xml;

use App\Models\Sir\Xml\Join;
use App\Models\Sir\Xml\Level;
use App\Models\Sir\Xml\Table;

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
class Hierarchy {
    
    // attributes
    protected $visible;
    protected $hasAll;
    protected $primaryKey;
    protected $primaryKeyTable;
    
    // dependencies
    protected $joins = [];
    protected $levels = [];
    protected $tables = [];

    public function __construct($xml) {
        if(!empty($xml['@attributes'])){
            foreach($xml['@attributes'] as $name => $val){
                $this->{$name} = $val;
            }
        }
        
        if(!empty($xml["Join"])){
            foreach($xml["Join"] as $obj){
                $this->joins[] = new Join($obj);
            }
        }
        
        if(!empty($xml["Level"])){
            foreach($xml["Level"] as $obj){
                $this->levels[] = new Level($obj);
            }
        }
        
        if(!empty($xml["Table"])){
            foreach($xml["Table"] as $obj){
                $this->tables[] = new Table($obj);
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
