<?php $page_title = __('Formulation Orders') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')

    <style>
        .img-responsive {
            height: auto;
            width: 100%;
        }

        .owl-carousel .owl-stage {
            margin-bottom: 5px;
        }

        .item {
            display: inline-block;
        }
    </style>

    <div class="panel-body form-add" style="margin-top: 110px;">
        <div id="main" class="row">

            <div style="height: 2%"></div>
            <div class="col-8">

                <!--CARROUSEL INICIO-->
                <!--BORDE-->

                <div style="background:#2C83E4; border: #E6E6E6 2px solid;border-bottom-width: 1px;">

                    <!--CARROUSEL PRODUCTOS INICIO-->
                    <!--BARRA BUSCAR POR CODEBAR-->

                    <!--INCLUIR CATEGORIAS-->
                    <div id="divcategorias" style="margin-top:2%; margin-bottom:1%; text-align: center;"
                         class="container-fluid">
                        <div class="categorias owl-carousel" style="line-height: 0.6;font-weight: 100;">
                            <div class="item">
                                <img name="btnbuscar" id="btnbuscar"
                                     src="{{ '/support/pictures/config/search000000.png' }}"
                                     class="img-responsive filter-button" data-filter="find"
                                     style="border: 1px #0074a5; width: 85px;">
                                <h1 Buscar/>
                            </div>
                        <!-- <div class="item">
                            <img src="{{ '/support/pictures/config/cateall000000.png' }}"
                            class="img-responsive filter-button" data-filter="all" style="border: 1px #0074a5; max-height:30%; min-height:30%;">
                            <span style="font-weight:bold; color: #FFFFFF">TODOS</span>
                        </div> -->
                            @if ($categories != '')
                                @foreach ($categories as $category)
                                    @if(count($category->ProductsCatalog) > 0)
                                        <div class="item">
                                            <img src="{{ '/support/pictures/categories/'.$category->image }}"
                                                 class="img-responsive filter-button" data-filter="{{ $category->id }}"
                                                 style="border: 1px #0074a5; max-height:131px; font-weight:bold; width: 85px;">
                                            <span style="font-weight:bold; color: #FFFFFF">{{ strtoupper($category->shortname) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--CARROUSEL PRODUCTOS FIN-->

                    <!--BUSCAR DENTRO DEL CARROUSEL INICIO-->
                    <div class="col-12" id="divbuscar"
                         style="margin-top:2%; margin-bottom:3%; background-color:#2C83E4">
                        <div class="row">

                            <div class="col-xs-10 col-sm-8 col-md-10  input-bar-item" style="padding-top: 16px;">
                                <input placeholder="{{ __('What are you looking for?') }}" name="name-buscar"
                                       id="name-buscar" class="form-control"
                                       style="margin-top: -20px; font-size: 1em; border: 2px solid #585858; width: 95%;"> </input>
                            </div>
                            <div style="height: 55px"></div>

                            <div class="col-xs-2 col-sm-4 col-md-2" style="text-align: right; padding-right: 24px;">
                                <i class="fa fa-times fa-5x img-responsive btnback" data-filter="find" style="margin-top: -25px; margin-right: 15px;
                            color: #424242; "></i>
                            </div>
                        </div>
                    </div>
                    <!--BUSCAR DENTRO DEL CARROUSEL FIN-->

                </div>

                <!--GALERIA PRODUCTOS INICIO-->

                <!--Fondo azul-->
                <div style="border: #E6E6E6 2px solid; background-color:#2C83E4;border-top-width: 1px;">
                    <div class="row" style="height: 69vh;">
                        <div class="col-12 perfectScrollbarContainer" style="height: 100%;">

                            <div id='category0'
                                 style="display: none; height: 100%; padding-left: 5px;padding-right: 0px;">
                                @if ($categories != '')
                                    @foreach ($categories as $category)
                                        @foreach ($category->ProductsCatalog as $product)
                                            <div id="divprod{{ $product->id }}"
                                                 class="gallery_product filter category{{$category->id}}"
                                                 style="border: 2px solid #2C83E4; border-radius: 5px; background-color: #ffffff; display: inline-block;
                                        max-width:2.8vw; min-width:115px; min-height:160px; padding-top: 15px; padding-left: 7px; padding-right: 5px;
                                        margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">

                                                <img id="prod{{ $product->id }}"

                                                    src="{{file_exists(public_path() . '/support/pictures/productscatalogs/' . $product->catalog_id .'/'. str_pad($product->category_id, 3, "0", STR_PAD_LEFT). '/' . $product->image)
                                                                ? '/support/pictures/productscatalogs/' . $product->catalog_id .'/'. str_pad($product->category_id, 3, "0", STR_PAD_LEFT). '/' . $product->image
                                                                : '/support/pictures/config/cate000000.png'}}"
                                                     class="img-responsive addprod"
                                                     data-id="{{ $product->id }}"
                                                     data-price="{{ $product->purchaseprice }}"
                                                     data-tax="{{$product->ValorImpuesto->value}}"
                                                     data-name="{{ strtoupper($product->name) }}"
                                                     data-code="{{ $product->barcode }}">

                                                <div style="height: 30px; position: relative;">
                                                    <div style="font-weight:bold; font-size: smaller; color:#6A6A6A; text-align: left; height: 80%; line-height:103%"
                                                         class="perfectScrollbarContainer">
                                                        {{ ucfirst(strtolower($product->name)) }}</div>
                                                </div>

                                                <div style="font-weight:bold; font-size: large; text-align: right; color:#585858;">
                                                    ${{ $product->purchaseprice }}</div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--GALERIA PRODUCTOS FIN-->
            </div>

            <div class="col-4">
                <!--INICIO CABECERA CLIENTE-->
                <div class='row'
                     style="border: #D2CFCF 2px solid;border-top-width: 0px; border-left-width: 0px;border-right-width: 0px; height: 8%;margin-left: -12px;margin-right: -12px;">
                    <div class="col-10" style="margin-top:7px">
                        <select name="client_name" id="client_name" class="form-control" data-live-search="true">
                            @foreach($defaultclient as $item)
                                <option value="{{$item->id}}">Cliente Mostrador</option>
                            @endforeach
                        </select>
                    </div>
                    {{--                <div class="col-2" style="margin-top:10px">--}}
                    {{--                    <img class="btn-success" name="btnbuscarperson" id="btnbuscarperson"--}}
                    {{--                         src="{{ '/support/pictures/config/search000000.png' }}"--}}
                    {{--                         style="height: 30px; width: 30px;">--}}
                    {{--                    <h1 BuscarPerson/>--}}
                    {{--                </div>--}}
                    <div class="col-2" style="margin-top:10px">
                        <button class="btn-primary add-client" onclick="addNewClientModal()"><i
                                    class="fa fa-search"></i>
                        </button>
                        <h1 BuscarPerson/>
                    </div>
                </div>
                <!--FIN CABECERA CLIENTE-->

                <div style="border: #E6E6E6 2px solid;border-top-width: 1px;border-bottom-width: 1px;">
                    <div class="col-12 col-12 col-12 col-12" style="height: 65px; margin-top: 10px;">
                        <button class="btn btn-success btn-lg btn-block" style="margin-top: 8px" disabled
                                id="titulo">{{__('Your Products')}}</button>
                    </div>
                </div>

                <!--TIRILLA INICIO-->
                <div style="border: #E6E6E6 2px solid;border-top-width: 1px;border-bottom-width: 1px;">
                    <div class="col-12 col-12 col-12 col-12" style="height: 69vh;">
                        <table id="detalles"
                               class="table table-responsive table-striped table-border table-condensed table-hover"
                               style="max-height: 65vh;">
                            <thead style="background-color:#A9D0F5">
                            </thead>
                            <tbody id="tbdetalles" style="overflow-y: scroll;">

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--TIRILLA FIN-->

                <div>
                    <!--BOTONES CANCELAR PAGAR INICIO-->
                    <div style="border: #E6E6E6 2px solid; border-top-width: 1px;">
                        <div class="container col-12" style="height: auto;margin-top: 10px">
                            <div class="row" style="margin: 8px 5px;">
                                <!--Cancelar-->
                                <div class="col-2">
                                    <a href="#CancelarVenta" role="button" class="btn btn-danger btn-lg btn-block"
                                       data-toggle="modal">X</a>
                                </div>
                                <!--Cantidad total-->
                                <div class="col-3">
                                    <button class="btn btn-success btn-lg btn-block" disabled id="canttotal">0</button>
                                </div>
                                <!--Pagar-->
                                <div class="col-7">
                                    <button class="btn btn-success btn-lg btn-block btnpay"
                                            id="btpagar">{{__('Make an order')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--BOTONES CANCELAR PAGAR FIN-->

                {{-- modal para cancelar venta --}}
                <!-- Modal / Ventana / Overlay en HTML -->
                    <div id="CancelarVenta" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{__('Cancel Formulation of order')}}</p>
                                    <p class="text-warning"><small>
                                            {{__('Are you sure to cancel this order formulation?')}}</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" type="button"
                                            data-dismiss="modal">{{__('Close')}}</button>
                                    <button class="btn btn-danger btn-lg " id="btcancelar"
                                            data-dismiss="modal">{{__('Accept')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip"
                        title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
            </div>
        </div>
    </div>

    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    <!-- Current Oders -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Orders') }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>

        </div>

        <div class="panel-body">
            <table id="example" class="table table-striped table-en task-table">
            </table>
        </div>
    </div>

    @include('management.components.pdvi.pdviNewClientModal.pdviNewClientModalComponent')

    <script>

        $(document).ready(function ($) {

            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'id', name: 'id', title: "{{__('Invoice Number')}}"},
                    {data: 'created_at', name: 'created_at', title: "{{ __('created_at') }}"},
                    {data: 'comercio.name', name: 'comercio.name', title: "{{__('Company')}}"},
                    {data: 'total_value', name: 'total_value', title: "{{__('Total Value')}}"},
                    {data: 'user.name', name: 'user.name', title: "{{__('User')}}"},
                    // {data: 'fullname', name: 'fullname', title: "{{__('Client')}}"},
                    {data: 'estado.name', name: 'estado.name', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[0, "asc"]]
            });

            var cont = 0;
            var idprod = 0;
            var idventas = [];
            var taxim = 0;
            total = 0;
            canttotal = 0;
            iva = 0;
            subt = 0;
            items = 0;
            subtotal = [];

            categ = [
                    @if ($categories != '')
                    @foreach ($categories as $cat)
                ['{{ $cat->id }}'],
                @endforeach
                @endif
            ];

            $("#divbuscar").hide();

            productos = [
                    @if ($categories != '')
                    @foreach ($categories as $cat)
                    @foreach ($cat->ProductsCatalog as $prod)
                ['{{ $prod->id }}', '{{strtoupper(str_replace("\n" ,"" ,$prod->name ))}}', '{{ $prod->barcode }}'],
                @endforeach
                @endforeach
                @endif
            ];

            var json = "";
            if (canttotal == 0) {
                var list = {
                    'datos': []
                };
            }
            ;

            $("#category0").show();
            // seleccionarcategoria('one');

            $("#name-code").focus();

            $(".filter-button").on('click', function () {
                filter = $(this).attr("data-filter");
                seleccionarcategoria(filter);
            });

            function seleccionarcategoria(value) {

                if (value == "find") {
                    $("#name-code").hide();
                    $("#divcategorias").hide();
                    $("#divbuscar").show();
                    $("#divbuscar").val();
                    $('#name-buscar').val('');
                    for (i = 0; i < categ.length; i++) {
                        $(".category" + categ[i]).hide();
                    }
                    ;
                    $('#name-buscar').focus();
                } else {
                    if (value == "one") {
                        $(".category" + categ[0]).show();
                    } else {
                        for (i = 0; i < categ.length; i++) {
                            if (value == "all") {
                                $(".category" + categ[i]).show();
                            } else {
                                if (categ[i] == value) {
                                    $(".category" + categ[i]).show();
                                } else {
                                    $(".category" + categ[i]).hide();
                                }
                            }
                        }
                    }
                }
            };

            $(".filter-buttonprod").on('click', function () {
                buscaritem($("#name-buscar").val(), 0);
            });

            function buscaritem(busqueda, tipo) {

                var cantprod = 0; //Cantidad de Productos Encontrados
                var codeprod = 0; //Codigo del Producto Encontrado

                for (i = 0; i < categ.length; i++) {
                    $(".category" + categ[i]).hide();
                }
                ;

                palabra = busqueda.toUpperCase();

                if (palabra != null && palabra != '') {

                    for (i = 0; i < productos.length; i++) {
                        if (productos[i][1].toString().indexOf(palabra) > -1 || productos[i][2].toString().indexOf(palabra) > -1) {
                            $("#divprod" + productos[i][0]).show();
                            if ($.isNumeric(palabra)) {
                                cantprod = cantprod + 1;
                                codeprod = productos[i][0];
                            }
                        } else {
                            $("#divprod" + productos[i][0]).hide();
                        }
                    }

                    if (cantprod == 1) {
                        idprod = codeprod;
                        $("#name-code").val('');
                    } else {
                        //    if (tipo == 1){
                        //        $.message("Producto No Encontrado", "error", true);
                        //    }
                    }
                    ;
                }

            };

            $(".addprod").on('click', function () {
                agregaritem($(this).attr("data-id"), $(this).attr("data-name"), $(this).attr("data-price"), $(this).attr("data-tax"));
            });

            function agregaritem(id, name, price, tax) {

                idarticulo = id;
                articulo = name;
                precio_venta = price;
                cantidad = 1;
                descuento = 0;
                subtotal[cont] = (cantidad * precio_venta - descuento);
                total = total + subtotal[cont];
                factor = parseFloat(1 + (tax / 100));
                console.log("Precio Venta:" + precio_venta + " Factor: " + factor);
                ivaunitario = Math.round(precio_venta - (precio_venta / factor), 0);
                console.log("Iva Unitario: " + ivaunitario);
                iva = Math.round(total - (total / factor), 0);
                console.log("Iva : " + iva);
                subt = Math.round((total / factor), 0);

                console.log(idventas);

                //Validar Mismo Producto
                let last_product = idventas.slice(-1);

                if (last_product == idarticulo) {
                    let actual_value = $('#cant' + (cont - 1)).val();
                    $('#cant' + (cont - 1)).val(parseInt(actual_value) + 1);
                    $('#cant' + (cont - 1)).trigger('change');
                } else {
                    idventas.push(idarticulo);
                    fila = $("<tr />").addClass("selected").attr("id", "fila" + cont);
                    columna1 = $("<td />").css("width", "270px")
                        .append($("<input />", {
                            "type": "hidden",
                            "id": "IdArticulo" + cont,
                            "name": "idarticulo[]",
                            "value": idarticulo
                        }))
                        .append(articulo);

                    columna2 = $("<td />").append($("<input />", {
                        "type": "number",
                        "id": "cant" + cont,
                        "name": "cantidad[]",
                        "value": cantidad,
                        "data-index": cont,
                        "class": "btn-cant"
                    }).css("width", "50px")
                        .change(function () {
                            console.log('entra al triger')
                            calcularvalor($(this).attr("data-index"), $(this).val(), tax);
                        }));

                    columna3 = $("<td />").hide()
                        .append($("<input />", {
                            "type": "number",
                            "id": "precio" + cont,
                            "name": "precio_venta[]",
                            "value": precio_venta
                        }).css("width", "80px").prop("disabled", true));

                    columna4 = $("<td />").text("$");

                    columna5 = $("<td />").css("width", "100px").attr("id", "subt" + cont).text(parseFloat(subtotal[cont]).toFixed(2));

                    columna6 = $("<td />").append($("<button />", {
                        "type": "button",
                        "data-index": cont,
                        "class": "btn btn-warning"
                    }).click(function () {
                        eliminar($(this).attr("data-index"));
                    }).text("X"));

                    columna7 = $("<td />").append($("<input />", {
                        "type": "hidden",
                        "id": "ivaunitario" + cont,
                        "name": "ivaunitario[]",
                        "value": ivaunitario
                    }));

                    fila.append(columna1).append(columna2).append(columna3).append(columna4).append(columna5).append(columna6).append(columna7);
                    cont++;
                    $("#total").html("$ " + total);
                    $("#total_venta").val(total);
                    $("#btpagar").html("{{__('Make an order')}}" + " $ (" + parseFloat(total).toFixed(2) + ")");
                    $("#iva").html("$ " + iva);
                    $("#total_iva").val(iva);
                    $("#subtotal").html("$ " + subt);
                    $("#subtotal").val(subt);
                    $("#detalles").append(fila);
                    $("#detalles").scrollTop($("#detalles")[0].scrollHeight);
                    canttotal++;
                    $("#canttotal").text(canttotal);
                    idprod = 0;

                    cargaritems();
                }
            };

            function calcularvalor(cont, cant, tax) {
                console.log("Cont: " + cont + " Cant: " + cant + " Tax: " + tax);
                if ($.isNumeric(cant)) {
                    if (cant > 0) {
                        $("#subt" + cont).text($("#precio" + cont).val() * cant);
                        total = total - subtotal[cont];
                        subtotal[cont] = (cant * $("#precio" + cont).val());
                        total = total + subtotal[cont];
                        factor = parseFloat(1 + (tax / 100));
                        iva = Math.round(total - (total / factor), 0);
                        subt = Math.round((total / factor), 0);
                        ivaunitario = Math.round(parseInt($("#subt" + cont).text()) - (parseInt($("#subt" + cont).text()) / factor), 0);
                        $("#total").html("$ " + total);
                        $("#total_venta").val(total);
                        $("#btpagar").html("{{__('Make an order')}}" + " $ (" + total + ")");
                        $("#iva").html("$ " + iva);
                        $("#total_iva").val(iva);
                        $("#subtotal").html("$ " + subt);
                        $("#subtotal").val(subt);
                        $("#ivaunitario" + cont).val(ivaunitario);
                        if ($("#cant" + cont).text() == '') {
                            anterior = 1;
                        } else {
                            anterior = parseInt($("#cant" + cont).text());
                        }
                        ;
                        if (anterior < cant) {
                            canttotal = (canttotal) + (cant - anterior);
                        } else {
                            canttotal = (canttotal) - (anterior - cant);
                        }
                        ;
                        $("#cant" + cont).text(cant);
                        $("#canttotal").text(canttotal);
                        cargaritems();
                    } else {
                        $("#cant" + cont).val(1);
                    }
                    ;
                } else {
                    $("#cant" + cont).val(1);
                }
                ;
            };

            function cargaritems() {

                list = {
                    'datos': []
                };
                items = 0;

                for (i = 0; i < cont; i++) {

                    if ($("#IdArticulo" + i).val() != null) {

                        list.datos.push({
                            "idarticulo": $("#IdArticulo" + i).val(),
                            "cantidad": $("#cant" + i).val(),
                            "precio_venta": $("#precio" + i).val(),
                            "valor_iva": Math.round($("#ivaunitario" + i).val(), 0),
                            "precio_total": $("#subt" + i).text()
                        });
                        items++;
                        json = JSON.stringify(list);

                    }
                    ;

                }
                ;

            };

            function guardarfactura() {
                if($("#client_name").val() ==null){
                    $.message("Por favor agrega o registra el cliente antes de utilizar la venta no presencial", "error", true);
                    return
                }

                console.log(json);
                if (cont > 0) {

                    $.ajax({
                        url: '/management/formulationorders/ajax?type=guardarfactura',
                        type: 'get',
                        data: {
                            "query": json,
                            "items": items,
                            "total": total,
                            "clientid": $("#client_name").val(),
                            "iva": iva
                        },
                        async: false,
                        success: function (response) {
                            res = JSON.parse(response);
                            console.log(res);
                            if (res.success) {
                                cancelarfactura();
                                cont = 0;
                                location.href = " {{ strtolower('/'.$group . '/' . $page) }}";
                                $.message("Formulacion Del Pedido Realizado Correctamente", "success", true);

                            } else {
                                $.message("Error en la consulta", "error", true);
                            }
                        }
                    });

                } else {
                    alert('formulacion de pedido vacio');
                }

            };

            $(".btnpay").on('click', function () {
                guardarfactura();
            })

            $('.categorias').owlCarousel({
                margin: 5,
                loop: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 6,
                        nav: false,
                        loop: false
                    }
                }
            });

            $("#btregresar").click(function () {

                $("#divcategorias").show();
                $("#divbuscar").hide();
                $("#divbuscar").val();
                $("#consultaVacia").hide();
                $('#name-buscar').val('');
                seleccionarcategoria('one');

            });

            function cancelarfactura() {

                $("#tbdetalles").empty();
                total = 0;
                $("#btpagar").html("{{__('Make an order')}}" + " $ (" + total + ")");
                $("#total").html("$ 0.00");
                $("#total_venta").val(total);
                iva = 0;
                subt = 0;
                $("#iva").html("$ 0.00");
                $("#total_iva").val(iva);
                $("#subtotal").html("$ 0.00");
                $("#subtotal").val(subt);
                canttotal = 0;
                $("#canttotal").text(canttotal);
                items = 0;
                idprod = 0;
                $("#name-code").focus();

            };

            $(".btncancel").on('click', function () {
                cancelarfactura();
            });

            function eliminar(index) {
                total = total - subtotal[index];
                $("#total").html("$ " + total);
                $("#btpagar").html("$ " + total);
                $("#total_venta").val(total);
                iva = Math.round(total - (total / 1.19), 0);
                subt = Math.round((total / 1.19), 0);
                $("#iva").html("$ " + iva);
                $("#total_iva").val(iva);
                $("#subtotal").html("$ " + subt);
                $("#subtotal").val(subt);
                canttotal = canttotal - $("#cant" + index).val();
                $("#canttotal").text(canttotal);
                $("#fila" + index).remove();
                items--;
            };

            $(".btnback").on('click', function () {
                $("#name-code").show();
                $("#divcategorias").show();
                $("#divbuscar").hide();
                $("#divbuscar").val();
                $("#consultaVacia").hide();
                $('#name-buscar').val('');

                seleccionarcategoria('one');

                $("#name-code").focus();

            });

            $("#name-code").change(function () {
                buscaritem($("#name-code").val(), 1);
                $("#prod" + idprod).trigger("click");
            });

            $("#name-buscar").keyup(function () {
                buscaritem($("#name-buscar").val(), 0);
            });

        });

        function addNewClientModal() {
            $("#modalNewClient").modal('show');
        }

        function closeClientModal() {
            $("#formSearch")[0].reset();
            $('#alert').hide();
            $('#add').show();
        }

        function addClientModal() {
            $("#modalNewClientAdd").modal('show');
        }

        // Add Clients
        function addClient() {
            location.href = "/{{strtolower($group.'/'.$page)}}/addpersons/client";
            var number = $("#numberdocument").val();
            var type = $("#typedoc").val();
            sessionStorage.setItem("number", number);
            sessionStorage.setItem("type", type);
            $('#numberdocument').reset();
            $('#typedoc').reset();
        }

        function cancelInterval() {
            clearInterval(myVar);
        }

        $("#divbarcode").hide();

        $('#formSearch').submit(function (e) {

            $.ajax({
                url: '/management/pdvi/ajax?type=searchclient',
                type: $('#formSearch').attr('method'),
                data: $('#formSearch').serialize(),
                success: function (response) {

                    res = JSON.parse(response);
                    console.log("dato:", res.status);

                    if (res.status == false) {
                        $('#add').show();
                        $('#alert').removeClass();
                        $('#alert').addClass("alert alert-danger")
                        $('#alert').text(res.message + ' ');
                        $('#alert').append('<a href="/{{strtolower($group."/".$page)}}/addpersons/client" class="alert-link">Registrese aqui</a>');
                        $('#alert').removeAttr('hidden');
                        $('#alert').show();

                        sessionStorage.setItem("number", $("#numberdocument1").val());
                        sessionStorage.setItem("type", $("#typedoc1").val());
                    } else {
                        $('#alert').removeClass();
                        $('#alert').addClass("alert alert-success")
                        $('#alert').text(res.message + ':' + ' ' + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname);
                        $('#alert').removeAttr('hidden');
                        $('#alert').show();
                        $('#add').hide();

                        $('#client_name').empty();
                        $('#client_name').append('<option value="' + res.clientid + '"selected>' + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname + '</option>');
                        $('#client_name').trigger('change');
                    }
                }
            });
            e.preventDefault();
        });

        if (sessionStorage.getItem("firstname")) {
            var firstname = sessionStorage.getItem("firstname");
            var othernames = sessionStorage.getItem("othernames");
            var lastname = sessionStorage.getItem("lastname");
            var otherlastname = sessionStorage.getItem("otherlastname");
            var id = sessionStorage.getItem("id");

            $('#client_name').empty();
            $('#client_name').append('<option value="' + id + '"  selected>' + firstname + ' ' + othernames + ' ' + lastname + ' ' + otherlastname + '</option>').val(id);
            $('#client_name').trigger('change');
            sessionStorage.clear();
        }
        $('#btcancelar').on('click', function () {
            cancelarfactura();
        })

        function cancelarfactura() {


            //Eliminar registros de productos
            $("#tbdetalles").empty();

            //Inicializacion contadores
            valor_total_venta = 0;
            valor_total_recibido = 0;
            total_articulos_vendidos = 0;
            cont_items = 0;
            iva_total = 0;
            total = 0;

            subtotal = [];
            cantidad = [];
            iva_item = [];

            receipt_number = [];
            authorization_code = [];

            json_products = "";
            json_payments = "";

            //Actualizacion Blade
            $("#btpagar").html("{{__('Hacer un pedido ')}}");
            $("#canttotal").text(total_articulos_vendidos);
            $("#canttotal2").text(total_articulos_vendidos);
            $('.btnpayments').prop('disabled', false);

            $("#name-code").focus();
            contador = 0;
            service = true;
        }

        // if(sessionStorage.getItem("firstname")){
        //     $("#name-code").show();
        //     $("#divcategorias").show();
        //     $("#divbuscar").hide();
        //     $("#divbuscar").val();
        //     $("#consultaVacia").hide();
        //     $('#name-buscar').val('');
        // }
        function searchClient() {
            $.ajax({
                url: '/management/pdvi/ajax?type=searchclient',
                type: $('#formSearch').attr('method'),
                data: $('#formSearch').serialize(),
                success: function (response) {
                    res = JSON.parse(response);

                    if (res.status == false) {
                        cleanClient();
                        var number = $("#numberdocument1").val();
                        var type = $("#typedoc1").val();
                        var digit = $("#digitcheck-name").val();

                        list_docs = [];
                        list_docs.push({
                            "type": type,
                            "number": number,
                            "digit": digit
                        });
                        json_docs = JSON.stringify(list_docs);
                        sessionStorage.setItem('doc', json_docs);

                        $('#add').show();
                        $('#alert').removeClass();
                        $('#alert').addClass("alert alert-danger");
                        $('#alert').text(res.message + ' ');
                        $('#alert').append('<a href="/{{strtolower($group."/".$page)}}/addpersons/client" class="alert-link">Registrese aqui</a>');
                        $('#alert').removeAttr('hidden');
                        $('#alert').show();

                    } else {
                        console.log(res)
                        address = res.clientaddresses;
                        address.forEach(clientAddresses);

                        $('#emailUser').val(res.clientemail);
                        $('#alert').removeClass();
                        $('#alert').addClass("alert alert-success");
                        $('#alert').text(res.message + ':' + ' ' + res.socialreason + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname);
                        $('#alert').removeAttr('hidden');
                        $('#alert').show();
                        $('#add').hide();
                        $("#modalNewClient").modal('hide');
                        //$('#clean').show();

                        $('#client_name option:first').hide();
                        $('#client_name').append('<option value="' + res.clientid + '"selected>' + res.socialreason + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname + '</option>');
                        $('#client_name').trigger('change');

                        $('#searchClient').hide();
                        $('#btn_clean').show();

                        $('#alert').removeClass();
                        $('#alert').text('');
                        $('#alert').hide();

                        list_client = [];

                        list_client.push({
                            "firstname": res.clientname,
                            "othernames": res.clientothernames,
                            "lastname": res.clientlastname,
                            "otherlastname": res.clientothernames,
                            "socialreason": res.socialreason,
                            "id": res.clientid,
                            "person": res.person,
                            "client": true,
                            "clientemail": res.clientemail
                        });
                        json_client = JSON.stringify(list_client);
                        sessionStorage.setItem('data', json_client);
                    }
                }
            });
        }

        function clientAddresses(item) {
            $('#addresses').append('<option value="' + item.id + '">' + item.typeaddress + ' : ' + item.address + ', ' + item.city + '</option>');
            return item;
        }

        function cleanClient() {
            if ('{{auth()->guard('client')->user()}}' == null) {
                return null;
            } else if (sessionStorage.getItem('data')) {
                $('#client_name').empty();
                $('#client_name').append('<option value="default">Cliente Mostrador</option>');
                sessionStorage.removeItem('data');
                $('#emailUser').val('');
                $('#addresses').empty();
                $('#typedoc1').val('');
                $('#numberdocument1').val('');
            }
            $('#btn_clean').hide();
            $('#searchClient').show();
        }

    </script>
@endsection
