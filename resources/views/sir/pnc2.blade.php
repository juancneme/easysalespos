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
    <table class="table table-hover table-striped" align="center" border="1">
    <?php  
    if(!empty($result)){
        $flaghead = true;
        $thead = array();
        $tbody = array();
    
        foreach($result as $category => $r){
            // asdasd
            if($flaghead){
                $thead .= '<th rowspan="2" class="text-center">Categoria</th>';
                $thead .= '<th rowspan="2" class="text-center">Productos</th>';
                $thead .= '<th colspan="'.count($r->result->Series).'" class="text-center">Semanas</th>';
                
                $flaghead = false;
            }
            
            foreach($columns as $column){
                var_dump($r->getField($column));
            }
        }
    }
    ?>
    </table>
</div>

<script>
    jQuery(document).ready(function($){
        @if(empty(Input::get("fechaFinal")))
        $("button[name='btnsave']").trigger('click');
        @endif
    });
</script>
@endsection