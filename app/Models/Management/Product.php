<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";
    
    public function Fabricante(){
        return $this->hasOne('App\Models\Management\Manufacturer', 'id', 'manufacturer_id');
    }

    public function SalesUnit(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'salesunit_id');
    }

    public function Pictures()
    {
        return $this->hasOne('App\Models\Management\ProductsPictures','id','products_picture_id');
    }
    public function picture()
    {
        return $this->belongsTo(ProductsPictures::class, 'products_picture_id');
    }
}

