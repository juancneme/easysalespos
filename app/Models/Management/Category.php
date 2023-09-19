<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $table = "categories";
    
    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }
    
    public function ProductsCatalog() 
    {
        return $this->hasMany('App\Models\Management\CatalogProducts');
    }

    public function scopeCategories($query){
        return $query->where('contract_id', 1);
    }


    
    
}
