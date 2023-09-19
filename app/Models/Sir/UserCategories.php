<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

class UserCategories extends Model
{
    
//    protected $connection = 'sqlsrv';
    protected $table = 'user_categories';
    public $timestamps = false;


    public function User(){
        return $this->hasOne('App\Models\Management\Users', 'id', 'user_id');
    }
    
    public function Categories(){
        return $this->hasMany('App\Models\Management\Category', 'id', 'category_id');
    }
}
