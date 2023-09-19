<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class CompaniesUsers extends Model
{
    //
    public $table = "companies_users";

    public function company(){
        return $this->hasOne('App\Models\Management\Company', 'id', 'company_id');

    }
}
