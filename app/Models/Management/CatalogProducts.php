<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class CatalogProducts extends Model
{
    
    public $table = "catalog_products"; 

    public function Catalogo(){
        return $this->hasOne('App\Models\Management\Catalog', 'id', 'catalog_id');
    }

    public function Producto(){
        return $this->hasOne('App\Models\Management\Product', 'id', 'product_id');
    }

    public function Categoria(){
        return $this->hasOne('App\Models\Management\Category', 'id', 'category_id');
    }

    public function Distribuidor(){
        return $this->hasOne('App\Models\Management\Distributor', 'id', 'distributor_id');
    }

    public function UnidadVenta(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'salesunit_id');
    }
    
    public function ValorImpuesto(){
        return $this->hasOne('App\Models\Management\ProductsTaxes', 'id', 'products_taxe_id');
    }

    public function getInventoryQuantityAttribute(){
        $company = CompaniesUsers::where('user_id', auth()->user()->id)->value('company_id');

        $quantity = Inventory::where('catalog_id', $this->catalog_id)
            ->where('product_id', $this->id)
            ->value('availablequantity');

        if(empty($quantity)) $quantity = 0;

        return $quantity;
    }

    public function getInventoryPriceAttribute(){

        $company = CompaniesUsers::where('user_id', auth()->user()->id)->value('company_id');

        $price = Inventory::where('catalog_id', $this->catalog_id)
            ->where('product_id', $this->id)
            ->where('company_id', $company)
            ->value('saleprice');

        if(empty($price))  $price = CatalogProducts::where('id', $this->id)->value('saleprice');

        return $price;
    }

    public function scopeAttribute($query, $catalog, $attribute, $attributeValue){
        return $query->where('catalog_id', $catalog)
                     ->where($attribute, $attributeValue);
    }

    public function getInventoryAttribute(){
        return Inventory::where('product_id', $this->id)->count();  
    }

}
