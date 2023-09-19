<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    public $table = "inventory";

    #region scopes

    public function scopeCompany($query, $request)
    {
        if ($request->has('company')) {
            $query->where('company_id', $request->company);
        }
    }

    public function scopeProduct($query, $request)
    {
        if ($request->has('product')) {
            $query->where('product_id', $request->product);
        }
    }

    public function scopeContract($query, $request)
    {
        if ($request->has('contract')) {
            $query->where('contract_id', $request->contract);
        }
    }

    public function scopeAvailableQuantity($query)
    {
        $query->where('availablequantity','>',0);
    }

    #endregion
    public function Catalogo()
    {
        return $this->hasOne('App\Models\Management\Catalog', 'id', 'catalog_id');
    }

    public function Producto()
    {
        return $this->hasOne('App\Models\Management\CatalogProducts', 'id', 'product_id');
    }

}
