<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    public $table = "business_type";

    public function Catalog(){
        return $this->hasOne('App\Models\Management\Catalog', 'id', 'catalog_id');
    }

    public function scopeType($query){
        return $query->where('status', 1);
    }
}
