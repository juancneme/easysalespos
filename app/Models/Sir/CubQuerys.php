<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;

class CubQuerys extends Model
{
//    protected $connection = 'sqlsrvsir';
    protected $table = 'querys';
    public $timestamps = false;
    protected $primaryKey = 'query_id';
    
    public function cross_querys(){
        return CubQuerys::select("querys2.*")
                ->join("querys_cross", "querys_cross.query_id", "=", "querys.query_id")
                ->join("querys as querys2", "querys2.query_id", "=", "querys_cross.cross_id")
                ->where("querys.query_id", "=", $this->query_id)
                ->get();
    }
}
