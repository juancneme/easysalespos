<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {
    
    public $table = "modules";
    
    public function TypeLabel(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typelabel_id');
    }
    
    public function IconSel(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typelabel_id');
    }
    
    public function chilrens() {
        return $this->belongsToMany('App\Models\Management\Modules');
    }
}
