<?php

/**
 * Funciones para el Sistema de Informacion y Reportes
 * Calculos y funciones adicionales
 *
 * @author OIVANANGEL
 */
include_once __DIR__ . '/Sir/PncTotals.php';
include_once __DIR__ . '/Sir/FormulaParser.php';

use App\Helpers\Sir\PncTotals;
use App\Helpers\Sir\ReportColumn;

function proccessPncData($dbdata) {
    $ret = array();
    
    foreach ($dbdata as $category => $data) {
        
        foreach($data->result->Datos as $k => $v){
            $totals = new PncTotals();
            $totals->weeks = $data->result->Series;
//            $totals->category = $category;
            $prod = '';
            foreach($v as $idx => $dato){
                if($idx == 0){
                    $prod = $dato;
                }
                else {
                    $totals->values[($idx - 1)] = $dato;
                }
            }
            $prods[$prod] = new ReportColumn($totals);
        }
        $ret[$category] = $prods;
    }
    return $ret;
}
