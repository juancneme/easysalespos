<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public $table = "suppliers";
    
    public function RefPersona(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }
    
    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }

    public function scopeSupplier($query, $contract){
        return $query->where('contract_id', $contract);
    }
    
}
