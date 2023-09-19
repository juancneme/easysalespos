<?php $page_title = 'Sistema de Información y Reportes Automatico' ?>
@extends('pike_template')
@section('content')
@include('common.errors')

<style>
    
</style>

<div class="mainReportes">
    <form name="sir-form" id="sir-form" action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __($page_title) }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group row">
            <label for="cubo" class="col-3 col-form-label">{{ __('Cubo') }}*</label>
            <div class="col-3">
                <select name="cubo" id="cubo-name" class="form-control">
                    <option value="">{{ __('Select') }}</option>
                    <option value="Compras">Compras</option>
                    <option value="Gestion">Gestion</option>
                    <option value="Inventarios">Inventarios</option>
                    <option value="Monetarios">Monetarios</option>
                    <option value="Procesos">Procesos</option>
                    <option value="Ventas">Ventas</option>
                </select>
            </div>
            
            <label for="dimension" class="col-3 col-form-label">{{ __('Dimension') }}*</label>
            <div class="col-3">
                <select name="dimension" id="dimension-name" class="form-control">
                    <option value="">{{ __('Select') }}</option>
                    <optgroup label="Productos">
                        <option value="[dProductos].[Segmento].Members">Segmento</option>
                        <option value="[dProductos].[Familia].Members">Familia</option>
                        <option value="[dProductos].[Categoria].Members">Categoria</option>
                        <option value="[dProductos].[Producto].Members">Producto</option>
                    </optgroup>
                    <optgroup label="Comercios">
                        <option value="[dTiendas].[Pais]">Pais</option>
                        <option value="[dTiendas].[Departamento]">Departamento</option>
                        <option value="[dTiendas].[Ciudad]">Ciudad</option>
                        <option value="[dTiendas].[Comercio]">Comercio</option>
                    </optgroup>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="fechaInicial" class="col-2 col-form-label">{{ __('Fecha Inicial') }}*</label>
            <div class="col-2">
                <input type="text" name="fechaInicial" id="fechaInicial" class="form-control" value="{{ !empty(Input::get("fechaInicial")) ? Input::get("fechaInicial") : date('Y-01-01') }}" />
            </div>
            
            <label for="fechaFinal" class="col-2 col-form-label">{{ __('Fecha Final') }}*</label>
            <div class="col-2">
                <input type="text" name="fechaFinal" id="fechaFinal" class="form-control" value="{{ !empty(Input::get("fechaFinal")) ? Input::get("fechaFinal") : date('Y-01-t') }}" />
            </div>
            
            <label for="periodo" class="col-2 col-form-label">{{ __('Period') }}*</label>
            <div class="col-2">
                <select name="periodo" id="periodo-name" class="form-control">
                    <option value="">{{ __('Select') }}</option>
                    <option value="DAY">{{ __('Day') }}</option>
                    <option value="WEEK">{{ __('Week') }}</option>
                    <option value="MONTH">{{ __('Month') }}</option>
                    <option value="QUARTER">{{ __('Quarter') }}</option>
                    <option value="YEAR">{{ __('Year') }}</option>
                </select>
            </div>
        </div>
        
        <button type="button" name="btnsave" class="btn btn-primary btnsave" style="margin-left: 15px;">
            <i class="fa fa-search"></i> {{ __('Search') }}
        </button>
    </form>
    
    <div class="repmain">
        
    </div>
</div>
<script>
jQuery(document).ready(function ($) {
    $(".btnsave").on('click', function(){
        $.ajax({
            url: '/sir/asir/ajax?type=mdx',
            type: 'post',
            data: $("#sir-form").serialize(),
            success: function(result){
                console.log(result);
                data = JSON.parse(result);
                console.log(data);
                id = 0, nivel = 0, drill = true;
                
                if(data.data.SiguienteConsulta != ""){
                    id = data.data.SiguienteConsulta;
                }
                
                if(data.data.Nivel != ""){
                    nivel = data.data.Nivel + 1;
                }
                console.log(data.data.htmlTable);
                $(".repmain").append(data.data.htmlTable);
                
                /*$rep = $("<div />").addClass("reportes"+nivel);
                $divrep = $("<div />").addClass("container-fluid").css("margin-top", "2%").css("margin-bottom", "1%").append($rep);
                $panelrep = $("<div />").addClass("col-12").addClass("panel").addClass("panel-default").append($divrep);

                $graph = $("<div />").attr("id", "graph"+nivel);
                $panelgraph = $("<div />").addClass("col-12").addClass("panel").addClass("panel-default").append($graph);

                $row = $("<div />").addClass("row").append($panelrep).append($panelgraph);
                    
                $.sir({
                    type: "dual",
                    series: data.data.Series,
                    data: data.data.Datos,
                    title: data.data.Titulo,
                    subtitle: data.data.Subtitulo,
                    nextQuery: data.data.SiguienteConsulta,
                    graph: {
                        element: $graph, //"#graph",
                        type: data.data.TipoComponente,
                        style: data.data.TipoGrafica != undefined ? data.data.TipoGrafica : "PieChart", //"BarChart" //
                        group: data.data.GraficaGrupo
                    },
                    table : {
                        element: $rep, //".reportes",
//                        select: function(subid){
//                            console.log("select subid => ", subid, " nivel => ", (parseInt(nivel) + 1), data.data.SiguienteConsulta);
//                            addParam(parseInt(nivel) + 1, subid);
//                            if(data.data.SiguienteConsulta == "undefined" || data.data.SiguienteConsulta == 0){
//                                loadItems(subid, parseInt(nivel) + 1, false);
//                            }
//                            else {
//                                loadItems(data.data.SiguienteConsulta, parseInt(nivel) + 1, true);
//                            }
//                        }
                    }
                });*/
            }
        });
    });
});
</script>
@endsection