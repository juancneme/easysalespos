<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public $table = "vehicles";

    public function type(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'type_id');
    }
}
