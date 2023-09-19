<?php

namespace App\Models\Sir\Xml;

use App\Models\Sir\Xml\Property;

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
class Level {
    
    // attributes
    protected $name;
    protected $visible;
    protected $table;
    protected $column;
    protected $nameColumn;
    protected $type;
    protected $uniqueMembers;
    protected $levelType;
    protected $hideMemberIf;
    protected $captionColumn;
    protected $caption;
    
    // dependencies
    protected $properties = [];

    public function __construct($xml) {
        if(!empty($xml['@attributes'])){
            foreach($xml['@attributes'] as $name => $val){
                $this->{$name} = $val;
            }
        }
        
        if(!empty($xml["Property"])){
            foreach($xml["Property"] as $obj){
                $this->properties[] = new Property($obj);
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
