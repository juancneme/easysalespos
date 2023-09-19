<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = "users";

    public function person(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

}
