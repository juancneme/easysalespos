<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

class HechosMonetario extends Model
{
    
    protected $connection = 'sqlsrv';
    protected $table = 'hechosMonetario';
}
