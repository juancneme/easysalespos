<?php

namespace App\Models\Sir\Xml;

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
class Join {
    
    // attributes
    protected $leftAlias;
    protected $leftKey;
    protected $rightAlias;
    protected $rightKey;
    
    // dependencies
    protected $tables = [];

    public function __construct($xml) {
        if(!empty($xml['@attributes'])){
            foreach($xml['@attributes'] as $name => $val){
                $this->{$name} = $val;
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
