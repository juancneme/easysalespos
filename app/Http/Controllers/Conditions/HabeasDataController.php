<?php

namespace App\Http\Controllers\Conditions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HabeasDataController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('Conditions.habeasData');
    }

}
