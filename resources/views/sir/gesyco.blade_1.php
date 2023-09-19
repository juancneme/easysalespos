<?php $page_title = 'Gestion y Control' ?>
@extends('pike_template')
@section('content')
@include('common.errors')
<style>
    /*.tooltip {
                position: relative;
                display: inline-block;
                border-bottom: 1px dotted black;
            }

                .tooltip .tooltiptext {
                    visibility: hidden;
                    width: 120px;
                    background-color: #6495ED;
                    color: white;
                    text-align: center;
                    border-radius: 6px;
                    padding: 5px 0;
                    position: absolute;
                    z-index: 1;
                    bottom: 125%;
                    left: 50%;
                    margin-left: -60px;
                    opacity: 0;
                    transition: opacity 0.3s;
                }

                    .tooltip .tooltiptext::after {
                        content: "";
                        position: absolute;
                        top: 100%;
                        left: 50%;
                        margin-left: -5px;
                        border-width: 5px;
                        border-style: solid;
                        border-color: #555 transparent transparent transparent;
                    }

                .tooltip:hover .tooltiptext {
                    visibility: visible;
                    opacity: 1;
                }
    .tooltip {
        position: absolute;
        z-index: 9000;
    }*/
/*    html, body {
        height: 100%;
        background-color: #E6E6FA;
    }*/

    .ftovalor {
        font-size: 1.5em;
        /*color: blue;*/
        text-align: center;
    }

    #secciontabla {
        /*background-color: #B0C4DE;*/
    }

    .jover:hover {
        color: orangered;
    }

    .jover {
        font-size: 1em;
        color: #dddddd;
    }

    #navegacion {
        /*position : absolute;
    display : inline-flex;
       border-width: thin ;
       background-color: #B0C4DE;
       padding: .2em;
       width: 95%;
    height: 95%;*/
        top: 1px;
        height: 47%;
        width: 100%;
        margin: .5% .5%;
    }

    /*#seccioniconos {
                left: 5px;
                top: 5px;
                background-color: #8FBC8F;
            }

            #secciontabla {
                width: 50%;
                height: 99%;
                left: 0px;
                top: 0px;
            }*/

    /*#secciongrafica {
                width: 50%;
                height: 99%;
                top: 40px;
            }

            #secciondatos {
                width: 99%;
                height: 99%;
                left: 0px;
                top: 15px;
            }

            #secciongrafica {
                width: 1100px;
                height: 1000px;
                position: absolute;
                left: 701px;
                top: 15px;
            }*/

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
        /*width: 84%;*/
        margin: .5% .5%;
        top: auto;
    }

    .seccion2 {
        /*position:absolute;
      display:  inline;
                height: 80px;
                /*width: 45%;*/
        /*background: #F0E68C;
                background-color: cornflowerblue;
                /*margin: .5% .5%;
      top: 5px;*/
    }

    .seccion3 {
        /*position:absolute;
                height: 80px;
                /*width: 48%;*/
        /*top: 5px;*/
        /*background: #DDA0DD;*/
        /*margin: .5% .5%;*/
    }

/*    title {
        color: silver;
    }*/

    .bloque3x {
        position: relative;
        display: block;
        height: 15%;
        background-color: #FFE4C4;
        width: 99%;
        margin: .5% .5%;
    }

    .bloque4 {
        position: absolute;
        display: block;
        height: 25%;
        background-color: #8FBC8F;
        width: 19%;
        margin: .5% .5%;
    }

    .cuadrado {
        height: 120px;
        margin: 5px;
        /* Ubicar a la izquierda */
        float: left;
        border-radius: 20px 20px 20px 20px;
    }

    .fondo1 {
        /*background: #FFE4B5;*/
        background: #64b0f2 !important;
        color: #ffffff;
    }

    .fondo2 {
        /*background: #EEE8AA;*/
        background: #f1b53d !important;
        color: #ffffff;
    }

    .fondo3 {
        /*background: #F0E68C;*/
        background: #17a2b8 !important;
        color: #ffffff;
    }

    .fondo4 {
        /*background: #BDB76B;*/
        background: #dc3545 !important;
        color: #ffffff;
    }

/*    .clear {
        clear: left;
    }*/


    .bloques {
        height: 30%;
        width: 100%;
        margin: .5% .5%;
    }


    .xseccion21 {
        position: absolute;
        height: 300px;
        width: 100%;
        top: 221px;
        margin: 1px;
        background-color: darkorange;
    }

    .xseccion25 {
        background: #F0E68C;
        height: 120px;
    }

    .xseccion4 {
        position: relative;
        height: 72%;
        width: 48%;
        top: 0px;
        left: 690px;
        background-color: seagreen;
    }

/*    .panel {
        padding-top: 10px;
    }

    .panel h5 {
        text-transform: uppercase;
        text-align: left;
        margin-left: -5px;
        height: 40px;
    }

    .panel h2 {
        margin: 20px 0;
    }

    h2.header {
        border-bottom: 1px solid #cccccc;
        padding: 20px 0;
        background: rgba(0,0,0,.03);
        color: #6b6b6b;
        margin: 0px 0px 15px 0px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .fa {
        font-size: 200%;
        margin: 5px;
    }*/

/*    h3.headerAcc {
        background: #f2d231;
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 5px;
    }*/
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    jQuery(document).ready(function ($) {

        google.charts.load('current', {'packages': ['corechart', 'table']});

//        var IdPadreParametro = getParamValue("idPadre");

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
        var ubicacion = 0
        var datospantalla = []
        var siguientemdx = 0

        // Variables para navegacion

        var navegaciondimensiones = [];
        var arrayDimensiones = []
        var anterior = 0;
        var siguiente = 0;
        var indice = 0;
        // Arreglo que contiene id del mdx ejecutado y siguiente mdx a ejecutar por cada
        // consulta activa en pantalla correpondiente a la sección 55
        var navegacion = []

        // Arreglo para contener Id del siguiente mdx de cada consulta activa jm

        var sgteConsulta = []

        ConsultarProductos(39, 1);
        ConsultarProductos(40, 1);
        ConsultarProductos(41, 1);
        ConsultarProductos(42, 1);
        ConsultarProductos(43, 1);
        ConsultarProductos(44, 1);
        ConsultarProductos(45, 1);
        ConsultarProductos(46, 1);



        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


        function mostrarnav(mdx) {
//        document.getElementById(mdx).style.visibility = "visible";
            $("#" + mdx).css("visibility", "visible");
        }

        function ocultarnav(mdx) {
//        document.getElementById(mdx).style.visibility = "hidden";
            $("#" + mdx).css("visibility", "hidden");
        }

        function adelantar() {
            indice = indice + 1;
            navegacion.push(siguientemdx);
            siguiente = siguientemdx;
            //    alert("Navegacion D... siguiente mdx  " + siguientemdx + "  indice   " + indice + "  navegacion  " + navegacion);
            ConsultarProductos(siguiente);

            iniciar();
        }

        function atrazar() {

            //         alert("Navegacion I... siguiente mdx  " + anterior + "  indice   " + indice + "  navegacion  " + navegacion)

            if (indice > 1) {
                navegacion.pop();
                anterior = navegacion[indice - 2]
                indice = indice - 1;
                ConsultarProductos(anterior);
            }
            iniciar()
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

        function ocultar() {
            //document.getElementById('Cuadrogestion').style.visibility = 'hidden';
            $("#Cuadrogestion").css("visibility", "hidden");
        }

        function mostrar() {
//        document.getElementById('Cuadrogestion').style.visibility = 'visible';
            $("#Cuadrogestion").css("visibility", "visible");
        }

        function muestra_ocultar() {
            muestra_oculta('Cuadrogestion');
            muestra_oculta('navegacion');
        }

        function ConsultarProductox(IdsgteConsulta) {
            muestra_oculta('Cuadrogestion');
            muestra_oculta('navegacion');

            /*    $("#navegacion").show();
             $("#Cuadrogestion").show();
             $("#accordion").accordion({
             active: 1
             });
             */
            navegacion.length = 0;
            navegacion.push(IdsgteConsulta);
            ConsultarProductos(IdsgteConsulta);
            indice = 0;
            iniciar();
        }

        function muestra_oculta(idnavegacion) {
//        if (document.getElementById) { //se obtiene el id
//            var elemento = document.getElementById(idnavegacion); //se define la variable "el" igual a nuestro div
//            elemento.style.display = (elemento.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
//        }
            if ($("#" + idnavegacion).css("display") == 'none') {
                $("#" + idnavegacion).show();
            } else {
                $("#" + idnavegacion).hide();
            }
        }
//        window.onload = function () {/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/

            muestra_oculta('navegacion');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
//        }

//        muestra_oculta('navegacion');

        function ConsultarProductos(Id, IdTablero) {
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

//            $.ajax({
//                url: '/sir/info/ajax?type=getDrillQueryByNivel',
//                data: parametrosAjax,
//                async: false,
//                dataType: 'json',
//                success: function (res) {
            $.ajax({
                url: '/sir/info/ajax?type=getDrillQueryByNivel',
                data: {
                    "id": Id,
                    "nivel": 1
                },
                async: false,
                dataType: 'json',
                "success": function (res) {
                    res = JSON.stringify(res);
                    datos = JSON.parse(res);
                    datos = datos.data;
                    res = datos;
                    console.log("datos....  ", datos)
                    ubicacion = datos.Posicion;

                    siguientemdx = datos.SiguienteConsulta;

                    Valores = datos.Datos;
                    titulos = datos.Series;

                    datosGrafica = [];
                    datosGrafica.push(titulos);

                    if (typeof IdTablero !== 'undefined') {

                        sgteConsulta[ubicacion] = datos.SiguienteConsulta;

                        arrayDimensiones = datos.Subtitulo === "" ? [] : datos.Subtitulo.split(",");// : datos.Subtitulo; datos.Subtitulo.split(",");
                        console.log("datos.Subtitulo---  ", datos.Subtitulo);
                        console.log("ubicacion tarjeta ---  ", ubicacion);
                        console.log("longitud  arrayDimensiones ---  ", arrayDimensiones.length);

                        // for (var i = 0; i < arrayDimensiones.length; i++)--- jm

                        if (ubicacion < 5) {
                            for (var i = 0; i < 5; i++) {
                                if (typeof arrayDimensiones[i] !== 'undefined') {
                                    navegaciondimensiones[(ubicacion * 5) - 5 + i] = arrayDimensiones[i];
                                    console.log("navegaciondimensiones----", navegaciondimensiones[(ubicacion * 5) - 5 + i]);
                                } else {
                                    var oculta = (ubicacion * 5) - 5 + i;
                                    console.log("ocultarnav para ocultar ---", "sec" + oculta);
                                    ocultarnav("sec" + oculta);
                                }
                            }

                        }
                        //            alert("consulta  " + Id + "  Nuevo mdx  " + ubicacion)
                    } else {
                        ubicacion = 55;
                        sgteConsulta[55] = datos.SiguienteConsulta;
                    }

                    // Carga datos

                    $.each(datos.Datos, function (i, row) {
                        $.each(row, function (ind, cell) {
                            val = validarYQuitarFormato(cell);
                            if (val !== false && !isNaN(val)) {
                                row[ind] = val;
                            }
                        });
                        datosGrafica.push(row);
                    });

                    // Presenta el titulo de la sección (titulo del mdx)
                    $("#secciont" + ubicacion).text(res.Titulo);
                    console.log("datos.TipoComponente", res.Titulo, ubicacion, $("#secciont" + ubicacion).text(), res.TipoComponente);

                    switch (res.TipoComponente) {

                        case "Tarjetas":

                            var datotxt = Valores.toString();
                            var posComa = datotxt.lastIndexOf(",");
                            var dato = datotxt.substring(posComa + 1, datotxt.length);

                            if (ubicacion === 4) {
                                dato = 2627891692;
                            }

                            $("#secciond" + ubicacion).html(Intl.NumberFormat("de-DE").format(dato));
                            break

                        case "GoogleCharts":
                            // suspendion idQry 2018-10-08

                            graficarDatos(res.TipoGrafica, ubicacion);

                            break

                        case "datatablesx":
                            $("#IdTabla").empty();
                            $("#IdGrafica").empty();

                            $.each(titulos, function (index, value) {
                                columnas[index] = {"title": value}
                            });

                            if ($.fn.dataTable.isDataTable(".pdv-table")) {
                                $("#IdTabla").empty();
                                table.destroy();
                                $('.ddTipoInv ul').empty();

                                $.each(titulos, function (i, e) {
                                    $('.ddTipoInv ul').append('<li><a href="#" data-value="' + i + '"">' + e + '</a></li>')
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

                            $("#secciond56").append("<table class='table dataTable display pdv-table' style='width: 100%'></table>");

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
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'collection',
                                        text: 'Exportar',
                                        buttons: ['csv', 'excel', 'pdf', 'print']
                                    }
                                ],
                                // Totales inicio
                                "footerCallback": function (actrow, data, start, end, display) {
                                    var api = this.api(), data;
                                    $(".pdv-table tfoot").show();

                                    footRow = [];

                                    $.each(data, function (i, row) {
                                        $.each(row, function (ind, cell) {
                                            val = validarYQuitarFormato(cell);
                                            if (val !== false && !isNaN(val)) {
                                                footRow.push(ind);
                                            }
                                        });
                                    });

                                    // Calcula y muestra totales

                                    $.each(footRow, function (i, cell) {
                                        // Total over all pages
                                        total = 0;
                                        total = api
                                                .column(cell)
                                                .data()
                                                .reduce(function (a, b) {
                                                    return parseFloat(a) + parseFloat(b);
                                                }, 0);

                                        // Total over this page
                                        pageTotal = 0;
                                        pageTotal = api
                                                .column(cell, {page: 'current'})
                                                .data()
                                                .reduce(function (a, b) {
                                                    return parseFloat(a) + parseFloat(b);
                                                }, 0);

                                        // Update footer
                                        $(api.column(cell).footer()).show().html(
                                                $.number(pageTotal, 1) + ' (' + $.number(total, 1) + ' total) '
                                                );
                                    });
                                },

                                initComplete: function () {
                                    this.api().columns().every(function () {
                                        var column = this;

                                        if (column.footer().cellIndex == 0) {
                                            var select = $('<select><option value=""></option></select>')
                                                    .appendTo($(column.footer()).empty())
                                                    .on('change', function () {
                                                        var val = $.fn.dataTable.util.escapeRegex(
                                                                $(this).val()
                                                                );

                                                        column
                                                                .search(val ? '^' + val + '$' : '', true, false)
                                                                .draw();
                                                    });

                                            column.data().unique().sort().each(function (d, j) {
                                                select.append('<option value="' + d + '">' + d + '</option>')
                                            });
                                        }
                                        ;

                                    });
                                },

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
                        //    alert("El informe seleccionado no tiene definido su tipo")
                    }

                },
                "error": function (err) {
                    console.log("error", err);
                }

            });

            $(".cbCombo").change(function () {
                ConsultarProductos($(this).val());
                //alert($(this).val());
            });

        }
        ;

        function graficarDatos(tipoGrafico, idSeccion) {

            // Selección tipo de grafico
            $("#IdGraficac").empty();

            switch (tipoGrafico) {

                case "PieChart":
                    // Pie = 1

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        datospantalla[idSeccion] = data;
                        var options = {
                            'title': datos.Titulo,
                            'is3D': true,
                            'backgroundColor': '#F4F4F4',
                            'width': '60%', 'height': '400',
                        };
                        // IdGrafica
                        var chart = new google.visualization.PieChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(datospantalla[idSeccion], options);
                    });


                    break;

                case "BarChart":
                    // Barras = 2

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var options = {
                            'title': datos.Titulo,
                            'legend': {
                                position: 'top', maxLines: 3,
                                'width': '400px', 'height': 'auto',
                            }
                        };

                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.BarChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });

                    break;

                case "ColumnChart":
                    // columnas = 3
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var options = {
                            'title': datos.Titulo,
                            'width': '400px', 'height': 'auto',
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
                            'width': '400px', 'height': 'auto',
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

                case "BarChart":

                    // Barras acumuladas= 11

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var options = {
                            'title': datos.Titulo,
                            'legend': {position: 'top', maxLines: 3},
                            'bar': {groupWidth: '75%'},
                            'width': '400px', 'height': 'auto',
                            'isStacked': true
                        };

                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.BarChart(document.getElementById("secciond" + idSeccion));
                        chart.draw(data, options);
                    });

                    break;

                case "ColumnChart":

                    // Columnas acumuladas= 12

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var options = {
                            'title': datos.Titulo,
                            'legend': {position: 'top', maxLines: 3},
                            'bar': {groupWidth: '75%'},
                            'width': '400px', 'height': 'auto',
                            'isStacked': true
                        };

                        var contenedor = document.getElementById("secciond" + idSeccion);
                        var chart = new google.visualization.ColumnChart(contenedor);

                        chart.draw(data, options);
                    });

                    break;

                case "Table":

                    // Regilla de datos
                    //google.charts.load('current', { 'packages': ['table'] });
                    google.charts.setOnLoadCallback(function () {

                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var contenedor = document.getElementById("secciond" + idSeccion);
                        var chart = new google.visualization.Table(document.getElementById("secciond" + idSeccion));

                        datospantalla[idSeccion] = data;
                        chart.draw(datospantalla[idSeccion], {showRowNumber: true, width: '100%'});

                    });

                    break;
                default:
                    alert("No se puede graficar informe seleccionado")
            }
        }
        ;

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
    });
    /*
     $(".ddGraficos .dropdown-menu li a").click(function () {
     $(".ddGraficos .btn:first-child").text($(this).text());
     
     $(".ddGraficos .btn:first-child").val($(this).attr("data-value"));
     graficarDatos($(this).attr("data-value"));
     });
     */
    /*    jQuery(document).ready(function ($) {
     $("#accordion").accordion({
     collapsible: true
     });
     });
     */
</script>

<!-- <div class="col-lg-8">
    <h2 style="margin: 10px 0 10px" class="page-header"> Gestión y control </h2>
</div> -->

<div class="w3-container col-lg-12">
    <!-- Sección de navegacion  -->

    <div id="Cuadrogestion1">

        <div class="row col-lg-12">
            <div class="fondo1 panel col-lg-2">

                <div class="pull-right"><i class="fa fa-bullhorn fa-x5" style="font-size: 400%;"></i></div>
                <h5 id="secciont1"></h5>
                <h2 class="ftovalor" id="secciond1"></h2>
                <span id="sec0" class="jover" data-toggle="tooltip" title="Valor de los procesos" onclick="ConsultarProductox(navegaciondimensiones[0])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec1" class="jover" data-toggle="tooltip" title="Ajustes por comercio" onclick="ConsultarProductox(navegaciondimensiones[1])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec2" class="jover" data-toggle="tooltip" title="Top 20 productos" onclick="ConsultarProductox(navegaciondimensiones[2])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec3" class="jover" data-toggle="tooltip" title="Ventas por categoria" onclick="ConsultarProductox(navegaciondimensiones[3])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec4" class="jover" data-toggle="tooltip" title="Top 10 clientes" onclick="ConsultarProductox(navegaciondimensiones[4])"> <i class="fa fa-bullseye"> </i></span>

                <span id="sec6x" class="jover" style="color: #206519;" data-toggle="tooltip" data-placement="bottom" title="Siguiente nivel" onclick="ConsultarProductox(sgteConsulta[1])"> <i class="fa fa-arrow-circle-right"> </i></span>
            </div>
            <div class="col-lg-1">

            </div>
            <div class="fondo2 panel col-lg-2">
                <div class="pull-right"><i class="fa fa-bar-chart fa-x5" style="font-size: 400%;"></i></div>
                <h5 id="secciont2"></h5>
                <h2 class="ftovalor" id="secciond2"></h2>
                <span id="sec5" class="jover" data-toggle="tooltip" title="Top 10 categoría" onclick="ConsultarProductox(navegaciondimensiones[5])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec6" class="jover" data-toggle="tooltip" title="Top 10 Lineas" onclick="ConsultarProductox(navegaciondimensiones[6])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec7" class="jover" data-toggle="tooltip" title="Top 10 productos" onclick="ConsultarProductox(navegaciondimensiones[7])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec8" class="jover" data-toggle="tooltip" title="Clasificacion ABC" onclick="ConsultarProductox(navegaciondimensiones[8])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec9" class="jover" data-toggle="tooltip" title="Ventas por comercio" onclick="ConsultarProductox(navegaciondimensiones[9])"> <i class="fa fa-bullseye"> </i></span>

                <span class="jover" style="color: #206519;" data-toggle="tooltip" data-placement="bottom" title="Siguiente nivel" onclick="ConsultarProductox(sgteConsulta[2])"> <i class="fa fa-arrow-circle-right"> </i></span>
            </div>
            <div class="col-lg-1">

            </div>
            <div class="fondo3 panel offset-col-1 col-lg-2">
                <div class="pull-right"><i class="fa fa-credit-card fa-x5" style="font-size: 400%;"></i></div>
                <h5 id="secciont3"></h5>
                <h2 class="ftovalor" id="secciond3"></h2>
                <span id="sec10" class="jover" data-toggle="tooltip" title="Top 10 proveedores" onclick="ConsultarProductox(navegaciondimensiones[10])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec11" class="jover" data-toggle="tooltip" title="Ventas por comercio" onclick="ConsultarProductox(navegaciondimensiones[11])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec12" class="jover" data-toggle="tooltip" title="Top mejores 10 clientes" onclick="ConsultarProductox(navegaciondimensiones[12])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec13" class="jover" data-toggle="tooltip" title="Ventas por categoria" onclick="ConsultarProductox(navegaciondimensiones[13])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec14" class="jover" data-toggle="tooltip" title="Top 10 clientes" onclick="ConsultarProductox(navegaciondimensiones[14])"> <i class="fa fa-bullseye"> </i></span>

                <span class="jover" style="color: #206519;" data-toggle="tooltip" data-placement="bottom" title="Siguiente nivel" onclick="ConsultarProductox(sgteConsulta[3])"> <i class="fa fa-arrow-circle-right"> </i></span>

                <div class="clearfix"></div>
            </div>
            <div class="col-lg-1">

            </div>
            <div class="fondo4 panel col-lg-2">
                <div class="pull-right"><i class="fa fa-dollar fa-x5" style="font-size: 400%;"></i></div>
                <h5 id="secciont4"></h5>
                <h2 class="ftovalor" id="secciond4"></h2>

                <span id="sec15" class="jover" data-toggle="tooltip" title="Total ingresos" onclick="ConsultarProductox(navegaciondimensiones[15])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec16" class="jover" data-toggle="tooltip" title="Total egresos" onclick="ConsultarProductox(navegaciondimensiones[16])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec17" class="jover" data-toggle="tooltip" title="Top 20 productos" onclick="ConsultarProductox(navegaciondimensiones[17])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec18" class="jover" data-toggle="tooltip" title="Ventas por categoria" onclick="ConsultarProductox(navegaciondimensiones[18])"> <i class="fa fa-bullseye"> </i></span>
                <span id="sec19" class="jover" data-toggle="tooltip" title="Top 10 clientes" onclick="ConsultarProductox(navegaciondimensiones[19])"> <i class="fa fa-bullseye"> </i></span>

                <span class="jover" style="color: #206519;" data-toggle="tooltip" data-placement="bottom" title="Siguiente nivel" onclick="ConsultarProductox(sgteConsulta[4])"> <i class="fa fa-arrow-circle-right"> </i></span>
                <div class="clearfix"></div>
            </div>
        </div>
        <div id="accordion">

            <!--<h3 class="headerAcc">Gestión</h3>-->

            <div id="Cuadrogestion">
                <!--Bloque 2-->
                <div class="row col-lg-12">
                    <div class="seccion2 panel col-lg-5">
                        <h2 id="secciont5" class="header"></h2>
                        <div id="secciond5"></div>
                        <span class="pull-right" onclick="ConsultarProductox(sgteConsulta[5])"> <i class="fa fa-arrow-circle-right"> </i></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="seccion3 panel col-lg-5">
                        <h2 id="secciont6" class="header"></h2>
                        <div id="secciond6"></div>
                        <span class="pull-right" onclick="ConsultarProductox(sgteConsulta[6])"> <i class="fa fa-arrow-circle-right"> </i></span>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Bloque 3-->
                <div class="row col-lg-12">
                    <div class="seccion3 panel col-lg-5">
                        <h2 id="secciont7" class="header"></h2>
                        <div id="secciond7"></div>
                        <span class="pull-right" onclick="ConsultarProductox(sgteConsulta[7])"> <i class="fa fa-arrow-circle-right"> </i></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="seccion2 panel col-lg-5">
                        <h2 id="secciont8" class="header"></h2>
                        <div id="secciond8"></div>
                        <span class="pull-right" onclick="ConsultarProductox(sgteConsulta[8])"> <i class="fa fa-arrow-circle-right"> </i></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <!--   <h3 class="headerAcc">Navegación</h3> -->
            <div id="navegacion">
                <div id="seccioniconos" class="row">
                    <div class="col-lg-11" style="background-color: #8FBC8F;">
                        <span class="pull-left" id="showAnterior" onclick="atrazar()"> <i class="fa fa-arrow-circle-left"> </i></span>
                        <span class="pull-left" onclick="graficarDatos('BarChart', 56)"> <i class="fa fa-bar-chart"> </i></span>
                        <span class="pull-left" onclick="graficarDatos('PieChart', 56)"> <i class="fa fa-pie-chart"> </i></span>
                        <span class="pull-left" onclick="graficarDatos('ColumnChart', 56)"> <i class="fa fa-line-chart"> </i></span>
                        <span class="pull-right" onclick="muestra_ocultar('navegacion')"> <i class="fa fa-reply"> </i></span>
                        <span class="pull-right" id="showSiguiente" onclick="adelantar()"> <i class="fa fa-arrow-circle-right"> </i></span>
                    </div>
                </div>
                <div id="secciondatos" class="row">
                    <div id="secciontabla" class="panel col-lg-5">
                        <h2 id="secciont55" class="header"></h2>
                        <div id="secciond55"></div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div id="secciongrafica" class="panel col-lg-5">
                        <h2 id="secciont56" class="header">Gráfico</h2>
                        <div id="secciond56"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="datatable-datatable">
            <div id="IdTabla_"></div>
        </div>
    </div>
</div>
@endsection