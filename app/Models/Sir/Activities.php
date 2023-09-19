<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
//    protected $connection = 'sqlsrvsir';
    protected $table = 'activities';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
