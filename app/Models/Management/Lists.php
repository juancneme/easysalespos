<?php

namespace App\Models\Management;

use App\Enums\SalesUnitEnum;
use Illuminate\Database\Eloquent\Model;

const TABLA_PAISES = 7;
const TABLA_DEPARTAMENTOS = 8;
const TABLA_MUNICIPIOS = 9;

class Lists extends Model
{
    //
    public $table = "lists";

    public function scopeUnit($query){
        return $query->where('idowner', SalesUnitEnum::UNIDAD_VENTA_LIST)
            ->where('id', '<>', SalesUnitEnum::UNIDAD_VENTA_LIST);
    }
    
}
