<?php

namespace App\Models\Sir;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sir\Activities;

class Process extends Model {

//    protected $connection = 'sqlsrvsir';
    protected $table = 'process';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function activities() {
        return $this->belongsToMany('App\Models\Sir\Activities');
    }

    public function activitiesWithAdvance() {
        $activities = $this->hasMany('App\Models\Sir\Activities', 'proccess_id', 'id')->get();
        foreach ($activities as &$activity) {
            $activity->percent = $this->rand_float();
        }
        return $activities;
    }

    private function rand_float($st_num = 1, $end_num = 100, $mul = 100) {
        if ($st_num > $end_num){
            return false;
        }
        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }

}
