<?php $page_title = 'Sistema de Información y Reportes' ?>
@extends('pike_template')
@section('content')
@include('common.errors')
<style>
    .ftovalor {
        font-size: 1.5em;
        color: blue;
        text-align: center;
    }

    .jover:hover {
        color: white;
    }

    .jover {
        font-size: 1em;
        color: white;
        text-align: right;
    }

    .botonadelante {
        font-size: 1em;
        color: white;
        text-align: right;
    }

    .botonatras {
        font-size: 1em;
        color: black;
        text-align: right;
    }

    #navegacion {
        top: 1px;
        height: 47%;
        width: 100%;
        margin: .5% .5%;
    }

    .bloque1 {
        top: 1px;
        height: 17%;
        width: 100%;
        margin: .5% .5%;
    }

    .bloque2 {
        position: absolute;
        height: 45%;
        background-color: #FFA500;
        width: 84%;
        margin: .5% .5%;
        top: auto;
    }

    .seccion2 {
        height: 300px;
        background: #F0E68C;
    }

    .seccion3 {
        height: 400px;
        background: #DDA0DD;
    }

    title {
        color: silver;
    }

    .fondo1 {
        background: #FFE4B5;
        background: #64b0f2 !important;
        color: #ffffff;
    }

    .fondo2 {
        background: #EEE8AA;
        background: #f1b53d !important;
        color: #ffffff;
    }

    .fondo3 {
        background: #F0E68C;
        background: #17a2b8 !important;
        color: #ffffff;
    }

    .fondo4 {
        background: #BDB76B;
        background: #dc3545 !important;
        color: #ffffff;
    }
/*
    .clear {
        clear: left;
    }


    .panel {
        padding-top: 10px;
    }

    .panel h5 {
        text-transform: uppercase;
    }

    .panel h2 {
        margin: 20px 0;
    }
*/
    h2.header {
        border-bottom: 1px solid #cccccc;
        padding: 20px 0;
        background: rgba(0,0,0,.03);
        color: #6b6b6b;
        margin: 0px 0px 15px 0px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .tablero{
        height: auto;
    }

    #secciond55{
        height: auto;
    }
    .cuadrado {
        width: 17%;
        height: 60px;
        left: 5px; 
        float: left;
        border-radius: 10px 10px 10px 10px;
        border: outset;
    }

    .textomenu {
        color: red;
    }

    .procesos {
        background: #DCDCDC;
        color: black;
    }

    .compras {
        background: #F08080;
        color: black;
    }

    .inventarios {
        background: #66CDAA;
        color: black;
    }

    .ventas {          
        background: #87CEFA;
        color: black;
    }

    .monetario {
        background: #F0E68C;
        color: black;
    }

    .grafica {
        background-color: #DCDCDC;
        color: black;
        height: auto;
    }

    .etiqueta {
        width: 17%;
        height: 200px;
        left: 5px;
        float: left;
        border-radius: 10px 10px 10px 10px;
        border: outset;
    } 

    .info {
        height: 400px;
        left: 5px;
        float: left;
        border-radius: 10px 10px 10px 10px;
        border: outset;
        text-align: center;
    }


    .interactivo{
        float: left;
        display: inline;
        background-color: #EAEDED;
    }

    .opcionmenu {
        width: 17%;
        height: 60px;
        left: 5px;
        float: left;
        border-radius: 10px 10px 10px 10px;
        border: outset;
        background-color: #6B8E23;
        color: white;
        margin-bottom: 0px;
        display: inline;
    }

    .navegar {
        position: absolute;
        top: 0px;
        height: 100%;
        visibility: hidden;
    }

    .cuadro_gestion {
        left: 0px;
        top: 0px;
    }
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="w3-container col-lg-12">    

    <div id="cuadrogestion" class="cuadro_gestion row">

        <div class="procesos etiqueta col-lg-4">
            <div id="container"></div>
            <h5 id="secciont1"></h5>
            <h3 id="secciond1"></h3>
            <span class="botonadelante"  data-toggle="tooltip" data-placement="bottom"  data-id="1"> <i class="fa fa-arrow-circle-right"> </i></span>            
        </div>

        <div class="compras etiqueta col-lg-2">
            <h5 id="secciont2"></h5>
            <h5>Mes</h5>
            <h3 class="ftovalor" id="secciond2"></h3>
            <h5>Día</h5>
            <h3 class="ftovalor" id="secciond3"></h3>
            <span class="botonadelante" data-toggle="tooltip" data-placement="bottom" data-id="2"> <i class="fa fa-arrow-circle-right"> </i></span>
        </div>

        <div class="inventarios etiqueta col-lg-2">
            <h5 id="secciont4"></h5>
            <h5>Mes</h5>
            <h3 class="ftovalor" id="secciond4"></h3>
            <h5>Día</h5>
            <h3 class="ftovalor" id="secciond5"></h3>
            <span class="botonadelante" data-toggle="tooltip" data-placement="bottom" data-id="3"> <i class="fa fa-arrow-circle-right"> </i></span>
        </div>

        <div class="ventas etiqueta col-lg-2">
            <h5 id="secciont6"></h5>
            <h5>Mes</h5>
            <h3 class="ftovalor" id="secciond6"></h3>
            <h5>Día</h5>
            <h3 class="ftovalor" id="secciond7"></h3>
            <span class="botonadelante" data-toggle="tooltip" data-placement="bottom" data-id="4"> <i class="fa fa-arrow-circle-right"> </i></span>
        </div>

        <div class="monetario etiqueta col-lg-2">
            <h5 id="secciont8"></h5>
            <h5>Mes</h5>
            <h3 class="ftovalor" id="secciond8"></h3>
            <h5>Día</h5>
            <h3 class="ftovalor" id="secciond9"></h3>
            <span class="botonadelante" data-toggle="tooltip" data-placement="bottom" data-id="5"> <i class="fa fa-arrow-circle-right"> </i></span>
        </div>

        <div class="grafica info col-lg-6">
            <h5 id="secciont10"></h5>
            <div id="secciond1010"></div>
            <div id="secciond10"></div>
        </div>

        <div class="grafica info col-lg-6">  
            <h5 id="secciont11"></h5>
            <div id="secciond11" style="width: 600px; height: 400px;"> </div>
        </div>
    </div>

    <!-- Cuadro de menus y presentacion de consultas -->

    <div id="cnavegacion" class="navegar row col-lg-12">

        <div class="row col-lg-12">

            <div class="col-lg-1">                
                <span class="botonatras" data-toggle="tooltip" data-placement="bottom" data-id="2"> <i class="fa fa-arrow-circle-left"> </i></span>	  
            </div>

            <div id='opcc0' class="opcionmenu col-lg-2">
                <h5 id='opcm0' onclick='ConsultarProductos(70)'></h5>
            </div>

            <div id='opcc1' class="opcionmenu col-lg-2">
                <h5 id="opcm1" onclick='obtieneconsulta(70)'></h5>
            </div>

            <div id='opcc2' class="opcionmenu col-lg-2">
                <h5 id="opcm2"></h5>
            </div>

            <div id='opcc3'class="opcionmenu col-lg-2">
                <h5 id="opcm3"></h5>
            </div>

            <div id='opcc4'class="opcionmenu col-lg-2">
                <h5 id="opcm4"></h5>
            </div>

            <div id='opcc5'class="opcionmenu col-lg-2">
                <h5 id="opcm5"></h5>
            </div>

            <div id='opcc6'class="opcionmenu col-lg-2">
                <h5 id="opcm6"></h5>
            </div>

            <div id='opcc7'class="opcionmenu col-lg-2">
                <h5 id="opcm7"></h5>
            </div>

            <div id='opcc8'class="opcionmenu col-lg-2">
                <h5 id="opcm8"></h5>
            </div>

            <div id='opcc9' class="opcionmenu col-lg-2">
                <h5 id="opcm9"></h5>
            </div>
        </div>

        <div class="grafica info col-lg-6">
            <div class="col-lg-6">
                <span class="pull-left bar"> <i class="fa fa-bar-chart"> </i></span>
                <span class="pull-left pie"> <i class="fa fa-pie-chart"> </i></span>
                <span class="pull-left column"> <i class="fa fa-line-chart"> </i></span>
            </div>
            <div class="tablero" id="tablero-visualizacion info col-lg-6">
                <h5 id="secciont55"></h5>
                <div id="secciond55">  </div>  
                <div class="interactivo" id="catfilter0" style="padding-left: 2em; min-width: 200px"></div>
                <div class="interactivo" id="catfilter1"></div>
                <div class="interactivo" id="catfilter2"></div>
                <div class="interactivo" id="NumRanFilter0"></div>
                <div class="interactivo" id="StrFilter0"></div>
                <div class="interactivo" id="StrFilter1"></div>
                <div id="programatico" style="width: 1100px; height: auto;"></div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {

        google.charts.load('current', {'packages': ['corechart', 'controls'], 'language': 'sp'});

        var opc = [];
        //-- Procesos -->
        opc[0] = 'Procesos por comercio';
        opc[1] = "Detalle de procesos";
        opc[2] = "Detalle de actividades";
        opc[3] = "";
        opc[4] = "";
        opc[5] = "";
        opc[6] = "";
        opc[7] = "";
        opc[8] = "";
        opc[9] = "";
        //-- Compras -->
        opc[10] = "Compras por comercio";
        opc[11] = "Top 10 proveedores";
        opc[12] = "Top 10 categorias mas compradas";
        opc[13] = "Top 10 productos mas comprados";
        opc[14] = "Compras por semana";
        opc[15] = "Tendencia compras mes";
        opc[16] = "";
        opc[17] = "";
        opc[18] = "";
        opc[19] = "";
        //-- Ventas -->
        opc[20] = "Ventas por comercio";
        opc[21] = "Top 10 categorias mas vendidas";
        opc[22] = "Top 10 productos mas vendidos";
        opc[23] = "Ventas por semana";
        opc[24] = "Tendencia de compras diaria";
        opc[25] = "Top mejores 10 clientes";
        opc[26] = "Ventas y rentabilidad";
        opc[27] = "Los 15 productos que mas aportan";
        opc[28] = "Ventas por comercio y categoría";
        opc[29] = "";
        // -- Inventarios -->
        opc[30] = "Existencia por categoria";
        opc[31] = "Existencia por producto";
        opc[32] = "";
        opc[33] = "";
        opc[34] = "";
        opc[35] = "";
        opc[36] = "";
        opc[37] = "";
        opc[38] = "";
        opc[39] = "";
        //  -- Monetario --
        opc[40] = "Total ingresos por comercio";
        opc[41] = "Detalle ingresos por comercio";
        opc[42] = "Detalle egresos";
        opc[43] = "Saldo en caja por comercio";
        opc[44] = "";
        opc[45] = "";
        opc[46] = "";
        opc[47] = "";
        opc[48] = "";
        opc[49] = "";

        var datos = [];
        var columnas = [];
        var formatocol = [];
        var titulos = [];
        var arr = [];
        var arrdat = [];
        var Col = 0;
        var datosGrafica = [];
        var Poscomprasmes = 0;
        var Poscomprasdia = 0;
        var ubicacion = 0;
        var datospantalla = [];
        var siguientemdx = 0;

        // Variables para navegacion

        var navegaciondimensiones = [];
        var arrayDimensiones = [];
        var anterior = 0;
        var siguiente = 0;
        var indice = 0;
        // Arreglo que contiene id del mdx ejecutado y siguiente mdx a ejecutar por cada
        // consulta activa en pantalla correpondiente a la sección 55

        var navegacion = [];

        // Arreglo para contener Id del siguiente mdx de cada consulta activa jm

        var sgteConsulta = [];
        var muestrainformacion = [41, 62, 40, 63, 64, 65, 66, 67, 68, 69];
        var totalmdx = muestrainformacion.length - 1;
        var repitemdx = 0;
        totalmdx = 3;
        presentacuadrogestion();

        function presentacuadrogestion() {

            ConsultarProductos(54, 1);
            ConsultarProductos(41, 1);
            ConsultarProductos(62, 1);
            ConsultarProductos(40, 1);
            ConsultarProductos(63, 1);
            ConsultarProductos(64, 1);
            ConsultarProductos(65, 1);
            ConsultarProductos(66, 1);
            ConsultarProductos(67, 1);
            ConsultarProductos(69, 1);
            ConsultarProductos(68, 1);
        }

        function obtieneconsulta(mdx, jma) {
            ConsultarProductos(mdx);
        }

        function muestra_oculta(idnavegacion) {
            if ($("#" + idnavegacion).css("display") == 'none') {
                $("#" + idnavegacion).show();
            } else {
                $("#" + idnavegacion).hide();
            }
        }

        function ocultar(division, cualmenu) {
            $("#" + division).css("visibility", "visible");
            if (division == "cuadrogestion") {
                mostrar("cnavegacion");
                cambiocolormenu(cualmenu);
            } else {
                mostrar("cuadrogestion");
            }
        }

        function mostrar(division, queoculta) {
            $("#" + division).css("visibility", "visible");
        }

        function cambiocolormenu(cual) {

            switch (cual) {

                case 1:
                    colorfondo = '#DCDCDC';
                    break;
                case 2:
                    colorfondo = '#F08080';
                    break;
                case 3:
                    colorfondo = '#66CDAA';
                    break;
                case 4:
                    colorfondo = '#87CEFA';
                    break;
                case 5:
                    colorfondo = '#F0E68C';
                    break;
                default:
                    colorfondo = '#DAA520';
                    colorletra = 'black';
            }

            $(".opcionmenu").each(function (index, elemento) {
                $(elemento).css("background", colorfondo);
            });

            cualopcion = (cual * 10) - 10;
            for (var i = 0; i < 10; i++) {
                var opcmx = ("opcc" + i);
                if (opc[i + cualopcion] != "") {
                    mostrarnav(opcmx);
                    $("#opcm" + i).append(opc[i + cualopcion]);
                } else {
                    $("#" + opcmx).css("visibility", "hidden");
                }
            }
        }

        /* fin funciones 2018-11-15 */

        $('[data-toggle="tooltip"]').tooltip();

        function mostrarnav(mdx) {
            $("#" + mdx).css("visibility", "visible");
        }

        function ocultarnav(mdx) {
            $("#" + mdx).css("visibility", "hidden");
        }

        function adelantar() {
            indice = indice + 1;
            navegacion.push(siguientemdx);
            siguiente = siguientemdx;
            ConsultarProductos(siguiente);
            iniciar();
        }

        function atrazar() {
            if (indice > 1) {
                navegacion.pop();
                anterior = navegacion[indice - 2];
                indice = indice - 1;
                ConsultarProductos(anterior);
            }
            iniciar();
        }

        function iniciar() {

            siguiente = navegacion[indice];
            if (siguiente == 0) {
                ocultarnav("showSiguiente");
            } else {
                mostrarnav("showSiguiente");
            }

            if (indice < 2) {
                ocultarnav("showAnterior");
                anterior = 0;
            } else {
                mostrarnav("showAnterior");
                anterior = navegacion[indice - 2];
            }
        }

        function ConsultarProductox(IdsgteConsulta) {

            if (IdsgteConsulta > 0) {
                muestra_oculta('cuadrogestion');
                muestra_oculta('navegacion');

                navegacion.length = 0;
                navegacion.push(IdsgteConsulta);
                ConsultarProductos(IdsgteConsulta);
                indice = 0;
                iniciar();
            }
        }

        muestra_oculta('navegar');

        function ConsultarProductos(Id, IdTablero, paramsArgs) {

            datos = [];
            columnas = [];
            formatocol = [];
            titulos = [];
            Valores = [];
            arr = [];
            arrdat = [];
            Col = 0;
            SiguienteNivel = 0;
            var ventanas = [];

            var parametrosAjax = {};
            parametrosAjax['id'] = Id;
            parametrosAjax['nivel'] = 1;
            if (paramsArgs != undefined) {
                $.each(paramsArgs, function (iargs, eargs) {
                    parametrosAjax[iargs] = eargs;
                });
            }

            $.ajax({
                url: '/sir/info/ajax?type=getDrillQueryByNivel',
                data: parametrosAjax,
                async: false,
                dataType: 'json',
                "success": function (res) {
//                    datos = JSON.stringify(res);
//                    datos = JSON.parse(datos);
                    //    console.log("datos....  ", datos)
                    
                    res = JSON.stringify(res);
                    datos = JSON.parse(res);
                    datos = datos.data;
                    res = datos;
                    console.log("datos....  ", res, datos);
                    if(datos.length == 0){
                        return;
                    }

                    ubicacion = datos.Posicion;
                    siguientemdx = datos.SiguienteConsulta;
                    Valores = datos.Datos;
                    titulos = datos.Series;
                    console.log("Nuevos valores json   ", datos);
                    datosGrafica = [];
                    datosGrafica.push(titulos);
                    if (typeof IdTablero != 'undefined') {

                        sgteConsulta[ubicacion] = datos.SiguienteConsulta;
                        //arrayDimensiones = datos.Subtitulo.split(",");
                        arrayDimensiones = datos.Subtitulo === "" ? [] : datos.Subtitulo.split(",");// : datos.Subtitulo; datos.Subtitulo.split(",");
                        
                        if (ubicacion < 12) {
                            for (var i = 0; i < 5; i++) {
                                if (typeof arrayDimensiones[i] != 'undefined') {
                                    navegaciondimensiones[(ubicacion * 5) - 5 + i] = arrayDimensiones[i];
                                } else {
                                    var oculta = (ubicacion * 5) - 5 + i;
                                }
                            }
                        }
                    } else {
                        ubicacion = 55;
                        sgteConsulta[55] = datos.SiguienteConsulta;
                    }

                    // Carga datos

                    if (res.TipoComponente != "datatables") {

                        $.each(datos.Datos, function (i, row) {
                            $.each(row, function (ind, cell) {
                                val = validarYQuitarFormato(cell);
                                if (val !== false && !isNaN(val)) {
                                    row[ind] = val;
                                }
                            });
                            datosGrafica.push(row);
                        });
                    }

                    // Presenta el titulo de la sección (titulo del mdx) jm
                    $("#secciont" + ubicacion).html(res.Titulo);
                    switch (res.TipoComponente) {

                        case "Tarjetas":

                            var datotxt = Valores.toString();
                            var posComa = datotxt.lastIndexOf(",");
                            var dato = datotxt.substring(posComa + 1, datotxt.length);
                            $("#secciond" + ubicacion).html(Intl.NumberFormat("de-DE").format(dato));
                            break

                        case "GoogleCharts":
                            // suspendion idQry 2018-10-08

                            graficarDatos(res.TipoGrafica, ubicacion);
                            break

                        case "datatables":
                            $("#IdTabla").empty();
                            $("#IdGrafica").empty();
                            $.each(titulos, function (index, value) {
                                columnas[index] = {"title": value}
                            });
                            console.log("estoy en datables -----......   ", datos.Datos, columnas);
                            if ($.fn.dataTable.isDataTable(".pdv-table")) {
                                $("#IdTabla").empty();
                                table.destroy();
                                $('.ddTipoInv ul').empty();
                                $.each(titulos, function (i, e) {
                                    $('.ddTipoInv ul').append('<li><a href="#" data-value="' + i + '"">' + e + '</a></li>');
                                });
                                $(".ddTipoInv .btn:first-child").text('Ocultar/activar columnas');
                                $(".ddTipoInv .dropdown-menu li a").click(function () {
                                    $(".ddTipoInv .btn:first-child").text($(this).text());
                                    $(".ddTipoInv .btn:first-child").val($(this).attr("data-value"));
                                    var columna = table.column($(this).attr("data-value"));
                                    columna.visible(!columna.visible());
                                });
                            }
                            ;
                            $("#secciond55").append("<table class='table dataTable display pdv-table' style='width: 100%'></table>");
                            $(".pdv-table").append('<tfoot />');
                            $(".pdv-table tfoot").append("<tr/>");
                            $.each(columnas, function (i, col) {
                                $(".pdv-table tfoot tr").append("<th>" + col.title + "</th>");
                            });
                            table = $(".pdv-table").DataTable({
                                paging: true,
                                searching: true,
                                data: datos.Datos,
                                columns: columnas,
                                "columnDefs": formatocol,
                                "order": [[0, 'asc']],
                                "deferLoading": 60,
                                dom: 'C<"clear">Bfrtip',
                                //"sDom": 'C<"clear">lfrtip',
                                buttons: [
                                    {
                                        extend: 'colvis',
                                        text: 'Columnas',
                                        //button: ['colvis']
                                    },
                                    {
                                        extend: 'collection',
                                        text: 'Exportar',
                                        buttons: ['csv', 'excel', 'pdf', 'print']
                                    }

                                ]
                            });
                            $('.pdv-table tbody').on('click', 'tr', function () {
                                if ($(this).hasClass('selected')) {
                                    $(this).removeClass('selected');
                                } else {
                                    table.$('tr.selected').removeClass('selected');
                                    $(this).addClass('selected');
                                }
                            });
                            break

                        default:
                            alert("El informe seleccionado no tiene definido su tipo")
                    }


                },
                "error": function (err) {
                    console.log("Error:   ", err);
                }
            });
        }

        function graficarDatos(tipoGrafico, idSeccion, graficoComun) {

            // Selección tipo de grafico
            $("#IdGraficac").empty();
            switch (tipoGrafico) {

                case "Multiple":

                    google.charts.setOnLoadCallback(function () {

                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'width': 400,
                            'height': 300
                        };
                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.BarChart(document.getElementById('secciond56'));
                        function selectHandler() {
                            var selectedItem = chart.getSelection()[0];
                            if (selectedItem) {
                                var itemSeleccionado = data.getValue(selectedItem.row, 0);
                                alert('Ha seleccionado   ' + itemSeleccionado);
                            }
                        }
                        google.visualization.events.addListener(chart, 'select', selectHandler);
                        chart.draw(data, options);
                    });
                    break;
                case "PieChart":
                    // Pie = 1

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        datospantalla[idSeccion] = data;
                        var options = {
                            title: datos.Titulo,
                            is3D: true,
                            width: '650%', 'height': '450',
                            backgroundColor: 'transparent',
                            legendTextStyle: {color: '#000000'},
                            titleTextStyle: {color: '#000000'},
                            hAxis: {
                                color: '#000000'
                            }

                        };
                        // IdGrafica
                        var chart = new google.visualization.PieChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(datospantalla[idSeccion], options);
                    });
                    break;
                case "BarChart":

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': datos.Titulo,
                            'legend': {
                                position: 'top', maxLines: 3,
                                'width': '700px', 'height': '6000',
                                backgroundColor: {fill: 'transparent'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.BarChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "TreeMap":
                    // Barras = 2

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': datos.Titulo,
                            'legend': {
                                position: 'top', maxLines: 3,
                                'width': '650px', 'height': '400',
                                backgroundColor: {fill: 'transparent'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.TreeMap(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "ColumnChart":
                    // columnas = 3
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': datos.Titulo,
                            width: '650%', 'height': '400',
                            backgroundColor: 'transparent',
                            legendTextStyle: {color: '#ffffff'},
                            titleTextStyle: {color: '#ffffff'},
                            hAxis: {
                                textStyle: {color: '#ffffff'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.ColumnChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "LineChart":
                    // lineas = 4
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '600px', 'height': '400',
                            backgroundColor: {fill: 'transparent'}
                        };
                        var chart = new google.visualization.LineChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "AreaChart":
                    // Areas = 5
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.AreaChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "BubbleChart":
                    // Areas = 5
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.BubbleChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "CandlestickChart":
                    // Velas = 7
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.CandlestickChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "PieChart_dona":
                    // Donas = 6 es igual a PieChart solo que tiene pieHole
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'pieHole': 0.4,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.PieChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "SteppedAreaChart":
                    // area escalonada = 9
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.SteppedAreaChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "ScatterChart":
                    // Tendencia = 10
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.ScatterChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });
                    break;
                case "Table":


                    // Regilla de datos
                    google.charts.load('current', {'packages': ['table']});
                    google.charts.setOnLoadCallback(function () {

                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var contenedor = document.getElementById("secciond" + idSeccion);
                        var chart = new google.visualization.Table(document.getElementById("secciond" + idSeccion));
                        datospantalla[idSeccion] = data;
                        //  chart.draw(datospantalla[idSeccion], { showRowNumber: false, backgroundColor: 'transparent' });
                        chart.draw(data, {showRowNumber: false, backgroundColor: 'transparent'});
                    });
                    break;
                case "TableInt":

                        google.charts.load('current', {'packages':
                                ['corechart', 'controls']});
                    var contenedor = document.getElementById("secciond" + idSeccion);
                    var tipografico = 'Table';
                    var data = google.visualization.arrayToDataTable(datosGrafica);
                    console.log("data ...", data);
                    google.charts.setOnLoadCallback(dibujargrafico);
                    function dibujargrafico() {


                        var dashboard = new google.visualization.Dashboard(document.getElementById('tablero-interactivo'));
                        //    var data = google.visualization.arrayToDataTable(datosGrafica);


                        // Omito "var" para que programmaticSlider esté visible para cambio de rango.

                        visualizacion = new google.visualization.ChartWrapper({
                            'chartType': 'Table',
                            'containerId': 'programatico',
                            'options': {
                                'legend': 'boton',
                                'width': 1100,
                                'height': 500,
                                'legend': 'label',
                                'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
                                'pieSliceText': 'value',
                                page: 'enable',
                                pageSize: 20,
                                pagingSymbols: {
                                    prev: 'Anterior',
                                    next: 'Siguiente'
                                },
                            }
                        });
                        programmaticSlider = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter0',
                            'options': {
                                'filterColumnIndex': '0',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                            }
                        });
                        programmaticSlider1 = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter1',
                            'options': {
                                'filterColumnIndex': '1',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                                //	, 				'caption' : 'Seleccione lugar'}
                            }
                        });
                        programmaticSlider2 = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter2',
                            'options': {
                                'filterColumnIndex': '2',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                                //	, 				'caption' : 'Seleccione lugar'}
                            }
                        });
                        var slider = new google.visualization.ControlWrapper({
                            'controlType': 'NumberRangeFilter',
                            'containerId': 'NumRanFilter0',
                            'options': {
                                'filterColumnIndex': '3',
                                'ui': {'labelStacking': 'vertical'}
                            }
                        });
                        var stringFilter = new google.visualization.ControlWrapper({
                            'controlType': 'StringFilter',
                            'containerId': 'StrFilter0',
                            'options': {
                                // 'filterColumnLabel': 'Name',
                                'filterColumnIndex': '0',
                                'ui': {'labelStacking': 'vertical'}

                            }
                        });
                        var stringFilter1 = new google.visualization.ControlWrapper({
                            'controlType': 'StringFilter',
                            'containerId': 'StrFilter1',
                            'options': {
                                'filterColumnIndex': '1',
                                'ui': {'labelStacking': 'vertical'}

                            }
                        });
                        new google.visualization.Dashboard(document.getElementById('dashboard'))
                                .bind(programmaticSlider, programmaticSlider1)
                                .bind(programmaticSlider1, programmaticSlider2)
                                .bind(programmaticSlider2, stringFilter)
                                .bind(stringFilter, stringFilter1)
                                .bind(stringFilter1, slider)
                                .bind(slider, visualizacion)
                                .draw(data);
                    }
                    ;
                    break;
                default:
                    alert("No se puede graficar informe seleccionado");
            }
        }
        
        $.each(titulos, function (i, e) {
            $('.ddTipoInv ul').append('<li><a href="#" data-value="' + i + '">' + e + '</a></li>')
        });
        
        $(".ddInformes .dropdown-menu li a").click(function () {
            $(".ddInformes .btn:first-child").text($(this).text());
            $(".ddInformes .btn:first-child").val($(this).attr("data-value"));
            ConsultarProductos($(this).attr("data-value"));
        });
        
        $(".ddTipoInv .dropdown-menu li a").click(function () {
            $(".ddTipoInv .btn:first-child").text($(this).text());
            $(".ddTipoInv .btn:first-child").val($(this).attr("data-value"));
            var columna = table.column($(this).attr("data-value"));
            columna.visible(!columna.visible());
        });

        $(".flip").click(function () {
            $(".panel").slideToggle();
        });

        $(".botonadelante").on('click', function(){
            ocultar('cuadrogestion', $(this).attr("data-id"));
        });
        
        $(".botonatras").on('click', function(){
            ocultar('cnavegacion', $(this).attr("data-id"), 0);
        });
        
        $(".grafica span.bar").on('click', function(){
           graficarDatos('Multiple', 0, 'BarChart'); 
        });
        
        $(".grafica span.pie").on('click', function(){
           graficarDatos('Multiple', 0, 'PieChart'); 
        });
        
        $(".grafica span.column").on('click', function(){
           graficarDatos('Multiple', 0, 'ColumnChart'); 
        });
    });
</script>
@endsection