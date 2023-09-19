<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    public $table = "distributors";

    public function RefPersona(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }
    
}
