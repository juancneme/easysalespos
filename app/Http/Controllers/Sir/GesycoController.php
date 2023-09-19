<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Sir\Proccess;

class GesycoController extends Controller {

    protected $empresa;
    protected $fechaInicial;
    protected $fechaFinal;
    protected $params;
    protected $proccess;


    public function __construct() {
        $this->middleware('auth');
        $this->proccess = Proccess::where("status", "=", "1")->get();
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
                
        $this->empresa = Input::get("empresa");
        $this->fechaInicial = Input::get("fechaInicial");
        $this->fechaFinal = Input::get("fechaFinal");
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'proccess' => $this->proccess
        ]);
    }
}
