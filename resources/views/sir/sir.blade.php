<?php $page_title = 'Sistema de Información y Reportes' ?>
@extends('pike_template')
@section('content')
@include('common.errors')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    .selectparams {
        background: #fff;
        margin-bottom: 10px;
        padding-top: 15px;
    }
    .img-responsive{
        height: auto;
        width: 100%;
    }
    .owl-carousel .owl-stage {
        margin-bottom: 5px;
    }
    .owl-carousel {
        display: block;
    }
    .item {
        display: inline-block;
    }
    .img-responsive {
        width: 100%;
        max-width: 100px;
    }

    /* TODO: AJUSTAR COLORES */
    .categorias .card-box.active {

    }
    #divcategorias {
        margin-top: 20px;
    }
    
    #divcategorias .card-box {
        cursor: pointer;
        margin-bottom: 0px;
        height: 115px;
        padding: 10px;
    }
    
    #divsubcategorias .card-box {
        cursor: pointer;
        margin-bottom: 0px;
        height: 95px;
        padding: 10px;
    }
    
    #divcategorias .card-box i, 
    #divsubcategorias .card-box i {
        font-size: 40px;
        position: absolute;
        right: 20px;
    }
    
    #divcategorias .card-box h6,
    #divsubcategorias .card-box h6,
    #divcategorias .card-box h1,
    #divsubcategorias .card-box h1
    /*#divcategorias .card-box h3,
    #divsubcategorias .card-box h3*/ {
        font-size: large;
    }
    
    .repmain .card-header {
        font-weight: bold;
        text-transform: uppercase;
    }
    
    .repmain .card.card-aliceblue {
        border: 2px solid aliceblue;
        box-shadow: 3px 3px #96c7f1;
        margin-bottom: 20px;
    }
    .repmain .card.card-aliceblue > .card-header {
        background-color: aliceblue;
    }
    
    .repmain .card.card-antiquewhite {
        border: 2px solid antiquewhite;
        box-shadow: 3px 3px #f8bd6e;
        margin-bottom: 20px;
    }
    .repmain .card.card-antiquewhite > .card-header {
        background-color: antiquewhite;
    }
    
    .f-right {
        float: right;
    }
    .card > .card-header {
        color: #fff;
    }
    .card.card-default {
        margin-bottom: 15px;
    }
    .divgraph {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        background: rgba(0,0,0,.8) !important;
        z-index: 999999;
        margin: auto auto;
        padding: 100px 80px;
        left: 0;
    }
    #crossModal .modal-lg {
        max-width: 90%;
    }
    table.dataTable tbody tr td:first-child {
        text-align: left;
    }
    table.dataTable tbody td {
        text-align: right;
    }
</style>

<div class="mainReportes">
    <!--<button class="btnmessage">mensaje</button>-->
    <form name="form1" action="{{ url('/sir/sir') }}" method="get" class="form-inline form-horizontal" style="padding-top: 15px;">
        <input type="hidden" name="empresa" id="empresa" value="1" />
<!--        <div class="col-5">
            <div class="form-group">
                <label for="fechaInicial" class="col-sm-3 col-form-label">{{ __('Init Date') }}*</label>
                <div class="col-sm-6">
                    <input type="date" name="fechaInicial" id="fechaInicial" class="form-control" value="{{ !empty(Input::get("fechaInicial")) ? Input::get("fechaInicial") : "01/01/2019" }}" />
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="fechaFinal" class="col-sm-3 col-form-label">{{ __('End Date') }}*</label>
                <div class="col-sm-6">
                    <input type="date" name="fechaFinal" id="fechaFinal" class="form-control" value="{{ !empty(Input::get("fechaFinal")) ? Input::get("fechaFinal") : "31/01/2019" }}" />
                </div>
            </div>
        </div>

        <div class="col-2 text-left">
            <button type="submit" name="btnsave" class="btn btn-primary">
                <i class="fa fa-search"></i> {{ __('Search') }}
            </button>
            <button class="btn btn-sm btn-warning" type="button" id="minparams">
                <i class="fa fa-arrow-down"></i>
            </button>
        </div>-->

        <label for="fechaInicial" class="col-2 col-form-label">{{ __('Init Date') }}*</label>
        <input type="text" name="fechaInicial" id="fechaInicial" class="col-3 form-control" value="{{ !empty(Input::get("fechaInicial")) ? Input::get("fechaInicial") : date('Y-01-01') }}" />

        <label for="fechaFinal" class="col-2 col-form-label">{{ __('End Date') }}*</label>
        <input type="text" name="fechaFinal" id="fechaFinal" class="col-3 form-control" value="{{ !empty(Input::get("fechaFinal")) ? Input::get("fechaFinal") : date('Y-01-t') }}" />

        <button type="submit" name="btnsave" class="btn btn-primary" style="margin-left: 15px;">
            <i class="fa fa-search"></i> {{ __('Search') }}
        </button>
        
    </form>
    @if(!empty($querys))
    <div class="row">
        <div class="col-12">
            <!--CARROUSEL INICIO-->

            <!--BORDE-->
            <div> 
                <!--CARROUSEL PRODUCTOS INICIO-->
                <div id="divcategorias" class="container-fluid text-center">
                    <div class="categorias owl-carousel"  style="line-height: 0.6;font-weight: 100;">
                        <?php
                        $message = "";
                        
                        foreach ($querys as $query) {
                            if (!empty($query->errorMessage)) {
                                $message .= $query->errorMessage . '\n';
                                continue;
                            }
                            ?>
                            <div class="card-box noradius noborder {{ !empty($query->result->color) ? '' : 'bg-default' }}" data-id="{{ $query->result->Id }}" data-nivel="{{ $query->result->Nivel }}" style="background-color: {{ !empty($query->result->color) ? $query->result->color : '' }}">
                                <i class="fa {{ !empty($query->result->icono) ? $query->result->icono : '' }} float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">{{ !empty($query->result->Titulo) ? $query->result->Titulo : $query->name }}</h6>
                                <h3 class="m-b-20 text-white w-100">${{ number_format(str_replace(',', '.', str_replace('.', '', !empty($query->result->Datos) ? $query->result->Datos[0][1] : 0)), 2) }}</h3>
                                <!--<h3 class="m-b-20 text-white w-100">${{ !empty($query->result->Datos) ? $query->result->Datos[0][1] : '' }}</h3>-->
<!--                                <h1 class="text-white">{{ !empty($query->result->Datos) ? $query->result->Datos[0][0] : '' }}</h1>-->
                                <h1 class="text-white">{{ $query->result->Subtitulo }}</h1>
                            </div> 
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!--CARROUSEL PRODUCTOS FIN-->  
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div id="divsubcategorias" style="margin-top:2%; margin-bottom:1%; text-align: center;" class="container-fluid">
                <div class="subcategorias owl-carousel"  style="line-height: 0.6;font-weight: 100;">

                </div>
            </div>
        </div>
    </div>

    <div class="repmain">
        
    </div>
    
    <div class="modal fade" id="crossModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __("Cross Modal") }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="repcross">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
    
<!--    <div class="row">
        <div class="col-6 panel panel-default">
            <div id="divreportes"style="margin-top:2%; margin-bottom:1%;" class="container-fluid">
                <div class="reportes">

                </div>
            </div>
        </div>
        <div class="col-6 panel panel-default">
            <div id="graph">

            </div>
        </div>
    </div>-->
</div>
<script>
jQuery(document).ready(function ($) {
    
    $("#fechaInicial,#fechaFinal").datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });
//    $(".selectparams")

    @if (!empty($message))
    $.message('{{ $message }}', "error", false);
    @endif


    $(".btnmessage").on('click', function(){
        $.message("error", "error", false);
    });
    
    $('.categorias').owlCarousel({
        margin: 5,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false,
                loop: false
            }
        }
    });

    var $owl = $('.subcategorias').owlCarousel({
        margin: 5,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false,
                loop: false
            }
        }
    });

    $(".categorias .card-box").on('click', function () {
        id = $(this).attr("data-id");
        nivel = $(this).attr("data-nivel");
        $.ajax({
            "url": "/sir/sir/ajax?type=getSubQuerys",
            "data": {
                "id": id,
                "nivel": nivel,
                "sub": true
            },
            "type": "get",
            "success": function (result) {
                res = JSON.parse(result);

                if (!res.success) {
                    $.message("Error al cargar la consulta", "error", true);
                    $.message(res.errorMessage, "error", false);
                    return false;
                }

                $owl.trigger('destroy.owl.carousel');
                $(".subcategorias").empty();
                $(".reportes").empty();
                $("#graph").empty();

                if (res.data != undefined && res.data.length > 0) {
                    $.each(res.data, function (i, e) {
                        icon = $("<i />", {
                            "class": "fa " + e.icono + " float-right text-white",
                        });

                        title = $("<h6 />", {
                            "class": "text-white text-uppercase",
                            "text": e.Nombre
                        });
                        value = $("<h3 />", {
                            "class": "m-b-20 text-white w-100"
                        }).text(e.Titulo);
                    
                        if (e.Subtitulo) {
                            text = $("<h1 />", {
                                "class": "text-white"
                            }).text(e.Subtitulo);
                        } else {
                            text = $("<h1 />", {
                                "class": "text-white"
                            }).text(" ");
                        }

                        item = $("<div />", {
                            "class": "card-box noradius noborder"
                        }).attr("data-id", e.Id).attr("data-nivel", e.Nivel);
                        
                        if(e.color != ""){
                            item.css("background-color", e.color);
                        }
                        else {
                            item.addClass("bg-default");
                        }

                        item.on("click", function () {
                            addParam(e.Nivel + 1, e.Id);
                            loadItems(e.Id, e.Nivel + 1, false);
                        });
                        
                        if(e.icono != undefined && e.icono != ""){
                            item.append(icon);
                        }
                        if(e.Nombre != undefined && e.Nombre != ""){
                            item.append(title);
                        }
                        if(e.Titulo != undefined && e.Titulo != ""){
                            item.append(value);
                        }
                        if(e.Subtitulo != undefined && e.Subtitulo != ""){
                            item.append(text);
                        }

                        $(".subcategorias").append(item);
                        //$owl.trigger('add.owl.carousel', [item]);
                    });
                    //$owl.trigger('refresh.owl.carousel');
                    $('.subcategorias').owlCarousel({
                        margin: 5,
                        loop: true,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                                nav: false
                            },
                            600: {
                                items: 2,
                                nav: false
                            },
                            1000: {
                                items: 3,
                                nav: false,
                                loop: false
                            }
                        }
                    });
                }
            }
        });
        return false;
    });

    function addParam(nivel, id){
        if($('.params').size() > 0){
            if($('.params[name="params['+nivel+']"]').size() > 0){
                $('.params[name="params['+nivel+']"]').val(id);
            }
            else {
                $('form[name="form1"]').prepend($("<input />").attr("type", "hidden").addClass('params').attr("name", "params["+nivel+"]").val(id));
            }
        }
        else {
            $('form[name="form1"]').prepend($("<input />").attr("type", "hidden").addClass('params').attr("name", "params["+nivel+"]").val(id));
        }
    }
    
    function createCardbox(titulo, nivel, color){
        // colores = ['aliceblue', 'antiquewhite'];
        
//        colores = ['#FFCDD2', '#F8BBD0', '#E1BEE7', '#D1C4E9', '#BBDEFB', '#B2EBF2', '#B2DFDB', '#DCEDC8', '#FFE0B2', '#FFECB3'];
//        colores = ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#2196F3', '#00BCD4', '#009688', '#8BC34A', '#FF9800', '#FFB300'];
        
//        idx = 0;
//        if(parseInt(nivel) - 2 < 0){
//            idx = 0;
//        }
//        else if (parseInt(nivel) - 2 > colores.length){
//            idx = 0;
//        }
//        else {
//            idx = parseInt(nivel) - 2;
//        }
        
        $card = $("<div />").addClass('card').addClass('card-default').css("background-color", color); //colores[idx]);
        $cardHeader = $("<div />").addClass('card-header').text(titulo);
        $cardHeader.append($("<div class='f-right'></div>")
                .append($("<button />", {
                    "class": "btn btn-primary",
                    "type": "button"
                }).on('click', function(){
                    if($(".card-body[data-uid='"+nivel+"']").css("display") == 'none'){
                        $(".card-body[data-uid='"+nivel+"']").fadeIn();
                        $($(this).find('i')).removeClass("fa-plus").addClass("fa-minus");
                    }
                    else {
                        $(".card-body[data-uid='"+nivel+"']").fadeOut();
                        $($(this).find('i')).removeClass("fa-minus").addClass("fa-plus");
                    }
                }).append("<i class='fa fa-minus'></i>")));
        $cardBody = $("<div />").addClass('card-body').attr("data-uid", nivel);
        
        $card.append($cardHeader).append($cardBody);
        $(".repmain").append($card);
        return $cardBody;
    }
    
    function loadCross(id, nivel){
        params = {};
        $.each($(".params"), function(i, e){
            k = $(e).attr("name").replace("params[", "").replace("]", "");
            params[k] = $(e).val();
        });       
        
        $.ajax({
            url: '/sir/sir/ajax?type=getDrillQueryByNivel',
            "data": {
                "id": id,
                "nivel": parseInt(nivel),
                "sub": false,
                "empresa": $("#empresa").val(),
                "fechaInicial": $("#fechaInicial").val(),
                "fechaFinal": $("#fechaFinal").val(),               
                "params": params
            },
            "type": "get",
            "success": function (result) {
                $(".repcross").append(selectCross);
                
                data = JSON.parse(result);
                $(".repcross").empty();
                $rep = $(".repcross");
                
                $table = $("<div />").addClass("tableCross").attr("id", "tableCross");
                $graph = $("<div />").addClass("graphCross").attr("id", "graphCross");
                
                $rep.append($table).append($graph);
                
                if (!data.success) {
                    $.message(data.errorMessage, "error", false);
                } else {
                    
                    if(data.data.Datos != undefined && data.data.Datos.length > 0){
                        $.sir({
                            type: data.data.Tipo,
                            series: data.data.Series,
                            data: data.data.Datos,
                            footData: data.data.vars,
                            title: data.data.Titulo,
                            subtitle: data.data.Subtitulo,
                            nextQuery: data.data.SiguienteConsulta,
                            graph: {
                                element: $graph, //"#graph",
                                type: data.data.TipoComponente,
                                style: data.data.TipoGrafica != undefined ? data.data.TipoGrafica : "PieChart", //"BarChart" //
                                option3d: data.data.option3d,
                                inverted: data.data.inverted,
                                grouped: data.data.grouped,
                                percent: data.data.percent,
                                stacking: data.data.stacking,
                                totalspie: data.data.totalspie,
                                drawvars: data.data.drawvars
                            },
                            table : {
                                element: $table, //".reportes",
                                totals: data.data.totals,
                                exports: data.data.exports,
                                filters: data.data.filters,
                                columns: data.data.columns,
                                footer: data.data.footer,
                                select: function(subid){
                                    
                                },
                                draw: function(table){
                                    
                                }
                            }
                        });
                    }
                }
            }
        });
    }
    
    function loadItems(id, nivel, drill) {        
        
        params = {};
        $.each($(".params"), function(i, e){
            k = $(e).attr("name").replace("params[", "").replace("]", "");
            params[k] = $(e).val();
        });       
        
        $.ajax({
            url: '/sir/sir/ajax?type=getDrillQueryByNivel',
            "data": {
                "id": id,
                "nivel": parseInt(nivel),
                "sub": !drill,
                "empresa": $("#empresa").val(),
                "fechaInicial": $("#fechaInicial").val(),
                "fechaFinal": $("#fechaFinal").val(),               
                "params": params
            },
            "type": "get",
            "success": function (result) {
                data = JSON.parse(result);
                if(nivel == 2){
                    $(".repmain").empty();
                }
                else {
                    for(aa = 10; aa >= nivel; aa--){
                        $(".reportes"+aa).empty();
                        $("#graph"+aa).empty();
                    }
                }
                if (!data.success) {
                    $.message(data.errorMessage, "error", false);
                } else {
//                    $(".reportes"+nivel).empty();
//                    $("#graph"+nivel).empty();
                    
                    $rep = $("<div />").addClass("reportes"+nivel);
                    $divrep = $("<div />").addClass("container-fluid").css("margin-top", "2%").css("margin-bottom", "1%").append($rep);
                    $panelrep = $("<div />").addClass("col-12").addClass("panel").addClass("panel-default").append($divrep);
                    
                    $graph = $("<div />").attr("id", "graph"+nivel);
                    $btngraph = $("<button />").addClass("btn").addClass("btn-primary").append('<i class="fa fa-arrows-alt"></i>')
                    $panelgraph = $("<div />").addClass("col-12").addClass("panel").addClass("panel-default").append('<br />').append($btngraph).append('<br />').append($graph);
                    $btngraph.on('click', function(){
                        $panelgraph.toggleClass('divgraph', 5000);
                    });
                    
                    $row = $("<div />").addClass("row").append($panelrep).append($panelgraph);
                    
                    if(data.data.Datos != undefined && data.data.Datos.length > 0){
                        // Crea los cross querys
                        selectCross = $("<select id='selectCross' />");
                        selectCross.append($("<option />").val("").text("{{ __('Select') }}"));
                        $.each(data.data.crossQuerys, function(iop, eop){
                            selectCross.append($("<option />").val(eop.query_id).text(eop.name)).attr("data-level", eop.level);
                        });
                        
                        btnCross = $("<button />", {type: "button", "class": "btn btn-primary","data-toggle": "modal", "data-target": "#crossModal"}).text("show");
                    
                        btnCross.on("click", function(){
                            if($("#selectCross").val() != ""){
                                loadCross($("#selectCross").val(), $("#selectCross").attr('data-level'));
                                $("#exampleModalLabel").text($("#selectCross option:selected").text());
                            }
                            return true;
                        });
                        
                        $divCross = $("<div style='float: right;' />").append(selectCross).append(btnCross);
                        
                        if(data.data.crossQuerys.length > 0){
                            $rep.append($divCross);
                        }
                        
                        $('.card-body').fadeOut();
                        $('.card-header i').removeClass('fa-plus').addClass('fa-minus');
                        createCardbox(data.data.Titulo, nivel, data.data.color).append($row);
                                                
                        $.sir({
                            type: "dual",
                            series: data.data.Series,
                            data: data.data.Datos,
                            footData: data.data.vars,
                            title: data.data.Titulo,
                            subtitle: data.data.Subtitulo,
                            nextQuery: data.data.SiguienteConsulta,
                            graph: {
                                element: $graph, //"#graph",
                                type: data.data.TipoComponente,
                                style: data.data.TipoGrafica != undefined ? data.data.TipoGrafica : "PieChart", //"BarChart" //
                                option3d: data.data.option3d,
                                inverted: data.data.inverted,
                                grouped: data.data.grouped,
                                percent: data.data.percent,
                                stacking: data.data.stacking,
                                totalspie: data.data.totalspie,
                                drawvars: data.data.drawvars
                            },
                            table : {
                                element: $rep, //".reportes",
                                totals: data.data.totals,
                                exports: data.data.exports,
                                filters: data.data.filters,
                                columns: data.data.columns,
                                footer: data.data.footer,
                                select: function(subid){
//                                    console.log("select subid => ", subid, " nivel => ", (parseInt(nivel) + 1), data.data.SiguienteConsulta);
                                    addParam(parseInt(nivel) + 1, subid);
                                    if(data.data.SiguienteConsulta == "undefined" || data.data.SiguienteConsulta == 0){
                                        loadItems(subid, parseInt(nivel) + 1, false);
                                    }
                                    else {
                                        loadItems(data.data.SiguienteConsulta, parseInt(nivel) + 1, true);
                                    }
                                },
                                draw: function(table){
                                    
                                }
                            }
                        });
                        $panelrep.perfectScrollbar();
                    }
                }
            }
        });
    }
    
    @if(empty(Input::get("fechaFinal")))
    $("button[name='btnsave']").trigger('click');
    @endif
});
</script>
@endsection