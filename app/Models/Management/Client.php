<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $table = "clients";

    public function person(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

    public function address(){
        return $this->hasOne('App\Models\Management\Address', 'person_id', 'person_id');
    }

}
