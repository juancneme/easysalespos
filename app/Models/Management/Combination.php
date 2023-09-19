<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    public $table = "combination";

    public function ValorImpuesto() {
        return $this->hasOne('App\Models\Management\ProductsTaxes', 'id', 5);
    }

}
