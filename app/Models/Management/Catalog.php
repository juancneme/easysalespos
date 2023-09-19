<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    public $table = "catalogs";
    
    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }

    public function TypeCatalog(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typecatalog_id');
    }

    public function scopeCatalog($query, $request)
    {
        return $query->where('id',$request->catalog_id);
    }

}
