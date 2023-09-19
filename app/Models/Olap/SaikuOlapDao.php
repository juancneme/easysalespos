<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Olap;

use App\Models\Sir\CubQuerys;
use App\Models\Sir\Connections;
use App\Models\Olap\Saiku\Request;
use App\Models\Olap\Saiku\Response;

/**
 * Description of PentahoOlapDao
 *
 * @author OIVANANGEL
 */
class SaikuOlapDao implements OlapDaoInterface {

    protected $url;
    protected $user;
    protected $pass;
    protected $catalog;
    protected $resultSet;
    protected $error;
    protected $errorMessage;
    private $params;
    private $conn;
    protected $vars = ["Total", "AVG", "Promedio", "Porcentaje", "Mediana"];

    public function __construct(Connections $conn) {
        $this->url = $conn->url;
        $this->user = $conn->user;
        $this->pass = $conn->password;
        $this->catalog = $conn->cube;
        $this->params = $conn->params;
        $this->conn = $conn;
    }

    public function runMdx($mdx) {
        $request = new Request(json_decode($this->conn->params));
        $request->set("mdx", $mdx);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Accept: application/json"));
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->toJSON());
        $data = curl_exec($ch);
        curl_close($ch);
        $this->resultSet = new Response(json_decode($data));
        if ($this->resultSet->error) {
            $this->error = true;
            $this->errorMessage = $this->resultSet->error;
        } else {
            $this->error = false;
            $this->errorMessage = "";
        }
    }

    public function hasError() {
        return $this->error;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function toDto(CubQuerys $query) {
        $ret = new \stdClass();
        $listDatos = array();
        $listColumnas = array();
        $listCeldas = array();
        $listEje3 = array();
        $col0 = array();
        $col1 = array();
        $listVars = array();

        if (!empty($this->resultSet)) {
            foreach ($this->resultSet->cellset as $k => $v) {
                $row = [];
                foreach ($v as $idx => $col) {
                    if ($k == 0) {
                        //for columns
                        $listColumnas[] = $col->value;
                    } else {
                        //for rows
                        $row[] = str_replace(".", "", $col->value == ',' ? 0 : $col->value);
                    }
                }
                if (!empty($row)) {
                    //for vars
                    if ($this->isVar($row[0])) {
                        foreach ($row as $_k => $_c) {
                            if ($_c == "null") {
                                unset($row[$_k]);
                            }
                        }
                        
                        $row = array_values($row);

                        $obj = new \stdClass();
                        $obj->row = $row;
                        $obj->rownum = $k;
                        $obj->var = $row[0];
                        $listVars[] = $obj;
                    } else {
                        $col0[] = $row;
                    }
                }
            }

            foreach ($listColumnas as $key => $value) {
                if ($value == "(All)") {
                    $this->delete_col($col0, $key);
                    unset($listColumnas[$key]);
                }
            }

            $listEje3 = [];
            foreach ($col0 as $data) {
                $obj = [];
                foreach ($data as $d) {
                    $obj[] = $d;
                }
                $listDatos[] = $obj;
            }
        }

        foreach ($listColumnas as $v) {
            $ret->Series[] = $v;
        }

        $ret->Datos = $listDatos;
        $ret->eje3 = $listEje3;
        $ret->vars = $listVars;
//        $ret->Series = $listColumnas;
        $ret->Celdas = $listCeldas;

        if (!empty($query->configuration)) {
            $config = json_decode($query->configuration);
            $ret->Titulo = !empty($config->Titulo) ? $config->Titulo : '';
            $ret->Subtitulo = !empty($config->Subtitulo) ? $config->Subtitulo : '';
            $ret->Tipo = !empty($config->Tipo) ? $config->Tipo : '';
            $ret->TipoComponente = !empty($config->TipoComponente) ? $config->TipoComponente : '';
            $ret->TipoGrafica = !empty($config->TipoGrafica) ? $config->TipoGrafica : '';
            $ret->GraficaGrupo = !empty($config->GraficaGrupo) ? $config->GraficaGrupo : false;
            $ret->icono = !empty($config->icono) ? $config->icono : '';
            $ret->color = !empty($config->color) ? $config->color : '';

            // options table
            $ret->filters = !empty($config->filters) ? $config->filters : false;
            $ret->columns = !empty($config->columns) ? $config->columns : false;
            $ret->exports = !empty($config->exports) ? $config->exports : false;
            $ret->totals = !empty($config->totals) ? $config->totals : false;
            $ret->footers = !empty($config->footers) ? $config->footers : false;

            // options graph
            $ret->inverted = !empty($config->inverted) ? $config->inverted : false;
            $ret->grouped = !empty($config->grouped) ? $config->grouped : false;
            $ret->stacking = !empty($config->stacking) ? $config->stacking : false;
            $ret->percent = !empty($config->percent) ? $config->percent : false;
            $ret->option3d = !empty($config->option3d) ? $config->option3d : false;
            $ret->drawvars = !empty($config->drawvars) ? $config->drawvars : false;
            $ret->totalspie = !empty($config->totalspie) ? $config->totalspie : false;
        } else {
            $ret->Titulo = "";
            $ret->Subtitulo = "";
            $ret->Tipo = "";
            $ret->TipoComponente = "";
            $ret->TipoGrafica = "";
            $ret->GraficaGrupo = false;
            $ret->icono = "";
            $ret->color = "";

            // options table
            $ret->filters = false;
            $ret->columns = false;
            $ret->exports = false;
            $ret->totals = false;
            $ret->footers = false;

            // options graph
            $ret->inverted = false;
            $ret->grouped = false;
            $ret->stacking = false;
            $ret->percent = false;
            $ret->option3d = false;
            $ret->drawvars = false;
            $ret->totalspie = false;
        }

        $ret->Id = !empty($query->query_id) ? $query->query_id : 0;
        $ret->IdPadre = !empty($query->parent_id) ? $query->parent_id : 0;
        $ret->Posicion = !empty($query->position) ? $query->position : 0;
        $ret->Nivel = !empty($query->level) ? $query->level : 0;
        $ret->SiguienteConsulta = !empty($query->next) ? $query->next : 0;

        // cross query
        $ret->crossQuerys = $query->cross_querys();

        $ret->htmlTable = $this->toTable($listDatos, $listColumnas);
        return $ret;
    }

    private function isVar($txt) {
        foreach ($this->vars as $k => $v) {
            if ($v == $txt) {
                return true;
            }
        }
        return false;
    }

    public function toSingleDto() {
        
    }

    public function toTable($listDatos, $listColumnas) {
        
    }

    private function delete_col(&$array, $key) {
        // Check that the column ($key) to be deleted exists in all rows before attempting delete
        foreach ($array as &$row) {
            if (!array_key_exists($key, $row)) {
                return false;
            }
        }
        foreach ($array as &$row) {
            unset($row[$key]);
        }

        unset($row);

        return true;
    }

}
