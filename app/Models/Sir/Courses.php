<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
//    protected $connection = 'sqlsrvsir';
    protected $table = 'courses';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
