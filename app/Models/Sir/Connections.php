<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Connections
 *
 * @author OIVANANGEL
 */
class Connections extends Model {
    
    protected $table = 'connections';
    public $timestamps = false;
    public $primaryKey = 'connection_id';
}
