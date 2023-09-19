<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class TransactionsDetails extends Model
{
    public $table = "transactions_details";

    public function Orderpro() {
        $type_prod = "{$this->type_product_id}";
        if ($type_prod != 176) {
            return $this->hasOne('App\Models\Management\CatalogProducts', 'id', 'catalog_product_id')
                    ->with('ValorImpuesto');
        } else {
            return $this->hasOne('App\Models\Management\Combination', 'id', 'catalog_product_id')
                    ->with('ValorImpuesto');
        }
    }

    public function product(){
        $productClass = $this->type_product_id !== 176 ? CatalogProducts::class : Combination::class;
        return $this->hasMany($productClass,'id','catalog_product_id');
    }

}
