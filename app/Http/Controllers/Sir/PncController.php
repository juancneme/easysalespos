<?php

namespace App\Http\Controllers\Sir;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Helpers\Sir\PncHelper;

class PncController extends Controller {

    protected $empresa;
    protected $fechaInicial;
    protected $fechaFinal;
    protected $params;
    protected $columns;

    public function __construct() {
        $this->middleware('auth');
        $this->columns = array('category', 'product', 'weeks', 'next period');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

//        $cubs = CubCubos::orderBy('Nombre', 'asc')->get();
        $result = array();

//        $this->empresa = empty(Input::get("empresa")) ? 1 : Input::get("empresa");
//        $this->anio = empty(Input::get("year")) ? 2017 : Input::get("year");
//        $this->mes = empty(Input::get("month")) ? 10 : Input::get("month");
//        $this->dia = empty(Input::get("day")) ? 1 : Input::get("day");
        $this->empresa = Input::get("empresa");
        $this->fechaInicial = Input::get("fechaInicial");
        $this->fechaFinal = Input::get("fechaFinal");

        if (!empty($this->empresa) && !empty($this->fechaInicial) && !empty($this->fechaFinal)) {

            $helper = new PncHelper(array("empresa" => $this->empresa,
                "fechaInicial" => $this->fechaInicial, "fechaFinal" => $this->fechaFinal));

            $helper->getReportData();
            //$helper->calculateReportData();
            $result = $helper->getResult();
        }

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'result' => $result,
            'columns' => $this->columns
        ]);
    }

}
