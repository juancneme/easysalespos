<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public $table = "couriers";

    public function person(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

    public function company(){
        return $this->hasOne('App\Models\Management\Company', 'id', 'company_id');
    }

    public function vehicle(){
        return $this->hasOne('App\Models\Management\Vehicle', 'id', 'vehicle_id');
    }

    public function delivery(){
        return $this->hasMany('App\Models\Management\Deliveries');
    }
}
