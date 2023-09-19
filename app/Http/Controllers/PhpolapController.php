<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Olap\OlapDao;

class PhpolapController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        $mdx = " SELECT NON EMPTY { [Measures].[Valor Egreso] } ON COLUMNS, "
                . "NON EMPTY { ([Dim Actividades].[Actividad].[Actividad].ALLMEMBERS ) } "
                . "DIMENSION PROPERTIES MEMBER_CAPTION, MEMBER_UNIQUE_NAME ON ROWS FROM [RBPDV] ";
        
        $mdx = "SELECT NON EMPTY { [Measures].[Valorcompra], [Measures].[Valor Venta] } ON COLUMNS, 
	NON EMPTY { ([Dim Clientes].[Jclientes].[Nombrecliente].ALLMEMBERS * [Dim Estructura].[jEstructura].[Nombre Empresa].ALLMEMBERS * [Dim Productos].[Jproductos].[Nombre Segmentos].ALLMEMBERS ) } ON ROWS 
	FROM [RBPDV] ";
        
        $mdx = "SELECT NON EMPTY { [Measures].[Valorcompra], [Measures].[Valor Venta] } ON COLUMNS, 
        NON EMPTY { ([Dim Estructura].[jEstructura].[Nombre Empresa].ALLMEMBERS * [Dim Productos].[Jproductos].[Nombre Segmentos].ALLMEMBERS ) } ON ROWS 
        FROM [RBPDV] ";
        
        $olap = new OlapDao();
        $olap->runMdx($mdx);
        
        return view('phpolap', [
            "group" => 'phpolap',
            "page" => "",
            'html' => json_encode($olap->toTable())
        ]);
    }

    public function ajax(){
        
    }
}
