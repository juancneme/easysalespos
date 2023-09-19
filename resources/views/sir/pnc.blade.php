<?php $page_title = __('Plan de Compras') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<div class="mainReportes">
    <!--<button class="btnmessage">mensaje</button>-->
    <form name="form1" action="{{ url('/sir/pnc') }}" method="get" class="form-inline form-horizontal" style="padding-top: 15px;">
        <input type="hidden" name="empresa" id="empresa" value="1" />

        <label for="fechaInicial" class="col-2 col-form-label">{{ __('Init Date') }}*</label>
        <input type="text" name="fechaInicial" id="fechaInicial" class="col-3 form-control" value="{{ !empty(Input::get("fechaInicial")) ? Input::get("fechaInicial") : date('Y-01-01') }}" />

        <label for="fechaFinal" class="col-2 col-form-label">{{ __('End Date') }}*</label>
        <input type="text" name="fechaFinal" id="fechaFinal" class="col-3 form-control" value="{{ !empty(Input::get("fechaFinal")) ? Input::get("fechaFinal") : date('Y-01-t') }}" />

        <button type="submit" name="btnsave" class="btn btn-primary" style="margin-left: 15px;">
            <i class="fa fa-search"></i> {{ __('Search') }}
        </button>
    </form>
</div>

<div class="panel panel-default" style="margin-top: 110px;">
    <br />
    <?php 
    if(!empty($result)){ 
        $flaghead = true;
        $html = '<table class="table table-hover table-striped" align="center" border="1">';
    
        foreach($result as $cat => $r) {
            
            if($flaghead){
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th rowspan="2" class="text-center">Categoria</th>';
                $html .= '<th rowspan="2" class="text-center">Productos</th>';
                $html .= '<th colspan="'.count($r->result->Series).'" class="text-center">Semanas</th>';
                $html .= '</tr>';
                $html .= '<tr>';
                foreach($r->result->Series as $k => $c){
                    $html .= '<th class="text-center">'.$c.'</th>';
                }
                $html .= '</tr>';
                $html .= '</thead>';

                $html .= '<tbody>';
                $flaghead = false;
            }
            $flag = true;
            array_unshift($r->result->Series, $cat);
            
            foreach($r->result->Datos as $d){
                $html .= '<tr>';
                if($flag){
                    $html .= '<td rowspan="'.count($r->result->Datos).'">'.$r->result->Series[0].'</td>';
                    $flag = false;
                }
                foreach($d as $row){
                    $html .= '<td>'.$row.'</td>';
                }
                $html .= '</tr>';
            }
        }
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;
    }
    ?>
</div>

<script>
    jQuery(document).ready(function($){
        @if(empty(Input::get("fechaFinal")))
        $("button[name='btnsave']").trigger('click');
        @endif
    });
</script>
@endsection