<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class CredentialsServices extends Model
{
    public $table = "credentials_services";

    public function provider()
    {
        return $this->hasOne('App\Models\Management\Lists', 'id', 'provider');
    }

    public function contract()
    {
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');

    }


}
