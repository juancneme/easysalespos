<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = "address";

    public function getCityAttribute(){
        $city = Lists::where('id',$this->city_id)->value('name');
        return $city;
    }

    public function type(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typeaddress_id');
    }

}
