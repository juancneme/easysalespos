<?php $page_title = __('Gestion') ?>
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
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->

<div id="main" class="row">

    <div style="height: 2%"></div>
    <div class="col-12">

        <!--CARROUSEL INICIO-->
        <!--BORDE-->
        <div style="border: gray 2px solid;">

            <!--CARROUSEL PRODUCTOS INICIO-->
            <div class="container-fluid" id="divcategorias" align="center" style="margin-top:2%; margin-bottom:1%">
                <div class="categorias owl-carousel" style="line-height: 0.6;font-weight: 100;">
                    @foreach ($consultas as $consulta)
                    <div class="item">
                        <img src="{{ '/support/pictures/categories/cate000001.png'}}" class="img-responsive filter-button" data-filter="{{ $consulta->Id }}" style='border: 1px #0074a5' onclick="seleccionarcategoria('{{ $consulta->Id }}')">{{ $consulta->Nombre }}/{{ $consulta->Id }}
                    </div>
                    @endforeach
                </div>
            </div>
            <!--CARROUSEL PRODUCTOS FIN-->
        </div>

        <!--BUSCAR DENTRO DEL CARROUSEL INICIO-->
        <div style="border: gray 2px solid;">

            <div class="row" id="divbuscar" style="margin-top:2%; margin-bottom:3%;">

                <div class="col-2 item">
                    <img name="btnbuscar" id="btnbuscar" src="{{ '/support/pictures/config/search000000.png' }}" class="img-responsive filter-button" data-filter="find" style='border: 1px #0074a5' onclick="buscararticulos()">
                    <h1 Buscar />
                </div>

                <div class="col-8 item">
                    <input type="text" name="name-buscar" id="name-buscar" class="form-control" style="line-height:1.8; padding:.45em 0 .45em .675em; font-size: 1em; border: 2px solid #000; width: 100%; margin-top: 40px;">
                </div>

                <div class="col-2 item">
                    <img id="btnregresar" src="{{ '/support/pictures/config/cancel000000.png' }}" class="img-responsive" data-filter="find" style='border: 1px #0074a5' onclick="funregresar()">
                    <h1 Buscar />
                </div>

            </div>


        </div>
        <!--BUSCAR DENTRO DEL CARROUSEL FIN-->


        <!--GALERIA PRODUCTOS INICIO-->
        <div class="row" style="height: 69vh; margin-top: 10px; border: gray 2px solid; background-color:#2C83E4;">
            <div class="col-12 perfectScrollbarContainer" style="height: 100%;">
                <br />
                @foreach ($categories as $category)
                <div id='category{{$category->id}}' style="display: none;">
                    @foreach ($category->ProductsCatalog as $product)
                    <div class="gallery_product col-3 filter {{ $product->idcategory }}" style="border: 2px solid #2C83E4; border-radius: 8px; height: 24vh; max-width: 15vh; min-width: 13vh; margin: 1.05vh; padding-top: 15px ;
                         background-color: #ffffff; display: inline-block; padding: 10px;">

                        <img src="{{ '/support/pictures/products/'.$product->image }}" class="img-responsive" onclick="agregaritem('{{ $product->id }}','{{ $product->name }}','{{ $product->saleprice }}','{{ $product->tax }}')">

                        <div style="height: 80px; position: relative;">
                            <div style="font-size: medium; color:#6A6A6A; text-transform: lowercase; text-align: left; height: 100%;" class="perfectScrollbarContainer">
                                {{ $product->name }}
                            </div>
                        </div>
                        <div style="font-weight:bold; font-size: large; text-align: right;"> {{ $product->saleprice }}</div>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>
        <!--GALERIA PRODUCTOS FIN-->

    </div>

</div>

<script>
    var cont = 0;
    total = 0;
    canttotal = 0;
    iva = 0;
    subt = 0;
    items = 0;
    subtotal = [];
    $("#divbuscar").hide();

    function seleccionarcategoria(value) {
        var categ = [
            @foreach($categories as $cat)['{{ $cat->id }}'],
            @endforeach
        ];
        if (value == "find") {
            $("#divcategorias").hide();
            $("#divbuscar").show();
            $("#divbuscar").val();
        } else {
            for (i = 0; i < categ.length; i++) {
                if (value == "all") {
                    $("#category" + categ[i]).show();
                } else {
                    if (categ[i] == value) {
                        $("#category" + categ[i]).show();
                    } else {
                        $("#category" + categ[i]).hide();
                    }
                }
            }
        }
    };

    var json = "";
    if (canttotal == 0) {
        var list = {
            'datos': []
        };
    };

    function agregaritem(idarticulo, articulo, precio_venta, impuesto) {

        //        datosArticulo=id.split(";");
        //        idarticulo=datosArticulo[0];
        //        articulo=datosArticulo[1];
        cantidad = 1;
        descuento = 0;
        //        precio_venta=datosArticulo[2];
        subtotal[cont] = (cantidad * precio_venta - descuento);
        total = total + subtotal[cont];
        //        impuesto=datosArticulo[3];
        factor = parseFloat(1 + (impuesto / 100));
        ivaunitario = Math.round(precio_venta - (precio_venta / factor), 0);
        iva = Math.round(total - (total / factor), 0);
        subt = Math.round((total / factor), 0);
        var fila = '<tr class="selected" id="fila' + cont + '"><td style="width: 270px"><input id="IdArticulo' + cont + '" type="hidden" name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td><td><input id="cant' + cont + '" onchange="calcularvalor(' + cont + ',this.value)" type="number" name="cantidad[]" value="' + cantidad + '" text="' + cantidad + '" style="width: 50px"></td><td hidden="hidden"><input id="precio' + cont + '" type="number" name="precio_venta[]" value="' + precio_venta + '" disabled="disabled" style="width: 80px"></td><td style="width: 100px" id="subt' + cont + '">' + subtotal[cont] + '</td><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ')">X</button></td><td><input id="ivaunitario' + cont + '" type="hidden" value="' + ivaunitario + '"></td></tr>'
        cont++;
        $("#total").html("$ " + total);
        $("#total_venta").val(total);
        $("#btpagar").html("$ " + total);
        $("#iva").html("$ " + iva);
        $("#total_iva").val(iva);
        $("#subtotal").html("$ " + subt);
        $("#subtotal").val(subt);
        $("#detalles").append(fila);
        $("#detalles").scrollTop($("#detalles")[0].scrollHeight);
        canttotal++;
        $("#canttotal").text(canttotal);
    };

    function calcularvalor(cont, cant) {
        if ($.isNumeric(cant)) {
            if (cant > 0) {
                $("#subt" + cont).text($("#precio" + cont).val() * cant);
                total = total - subtotal[cont];
                subtotal[cont] = (cant * $("#precio" + cont).val());
                total = total + subtotal[cont];
                factor = parseFloat(1 + (datosArticulo[3] / 100));
                iva = Math.round(total - (total / factor), 0);
                subt = Math.round((total / factor), 0);
                ivaunitario = Math.round(parseInt($("#subt" + cont).text()) - (parseInt($("#subt" + cont).text()) / factor), 0);
                $("#total").html("$ " + total);
                $("#total_venta").val(total);
                $("#btpagar").html("$ " + total);
                $("#iva").html("$ " + iva);
                $("#total_iva").val(iva);
                $("#subtotal").html("$ " + subt);
                $("#subtotal").val(subt);
                $("#ivaunitario" + cont).val(ivaunitario);
                if ($("#cant" + cont).text() == '') {
                    anterior = 1;
                } else {
                    anterior = parseInt($("#cant" + cont).text());
                };
                if (anterior < cant) {
                    canttotal = (canttotal) + (cant - anterior);
                } else {
                    canttotal = (canttotal) - (anterior - cant);
                };
                $("#cant" + cont).text(cant);
                $("#canttotal").text(canttotal);
            } else {
                $("#cant" + cont).val(1);
            };
        } else {
            $("#cant" + cont).val(1);
        };
    };

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

    function funregresar() {
        $("#divcategorias").show();
        $("#divbuscar").hide();
        $("#divbuscar").val();
        $("#consultaVacia").hide();
        $('#name-buscar').val('');
    };

    function funcancelar() {
        cancelarfactura();
    };

    function buscararticulos() {

        $("#tbarticulos").empty();
        $.ajax({
            url: '/management/pdvi/ajax?type=buscararticulos',
            type: 'get',
            data: {
                "query": $("#name-buscar").val()
            },
            async: false,
            success: function(response) {
                res = JSON.parse(response);
                if (res.success) {
                    var cont = 1;
                    var fila = 1;
                    if (res.data.length == 0) {
                        $("#tbarticulos").append('<tr id="Fila' + fila + '"></tr>');
                        $("#Fila" + fila).append('<td style="width: 600px" id="consultaVacia"><div class="card card-body">{{__('
                            No Products Found ')}}</div></td>');
                    }

                    $.each(res.data, function(i, e) {
                        if (cont == 1) {
                            $("#tbarticulos").append('<tr id="Fila' + fila + '"></tr>');
                            $("#Fila" + fila).append('<td style="width: 120px"><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 120px; width: 120px;"></td>');
                            cont = cont + 1;
                        } else {
                            $("#Fila" + fila).append('<td style="width: 120px"><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 120px; width: 120px;"></td>');
                            cont = cont + 1;
                        };
                        if (cont == 5) {
                            cont = 1;
                            fila = fila + 1;
                        };
                    });
                } else {
                    $.message("Error en la consulta", "error", true);
                }
            }
        });
    };

    function cancelarfactura() {
        $("#tbdetalles").empty();
        total = 0;
        $("#btpagar").html("$ " + total);
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
    };

    function guardarfactura() {

        list = {
            'datos': []
        };
        if (cont > 0) {

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
                    console.log(json);
                };
            };
            $.ajax({
                url: '/management/pdvi/ajax?type=guardarfactura',
                type: 'get',
                data: {
                    "query": json,
                    "items": items,
                    "total": total,
                    "iva": iva
                },
                async: false,
                success: function(response) {
                    res = JSON.parse(response);
                    //console.log(res.data);
                    if (res.success) {
                        cancelarfactura();
                        $.message("Factura Pagada Correctamente", "success", true);
                    } else {
                        $.message("Error en la consulta", "error", true);
                    }
                }
            });
        };
    };
    $(document).ready(function($) {
        // ocultar manualmente la barra de menu lateral

        $(".filter-button").on('click', function() {
            filter = $(this).attr("data-filter");
            seleccionarcategoria(filter);
            console.log("onclick " + filter);
        });


        $(".btnpay").on('click', function() {
            console.log("guardarfactura");
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
        $("#btregresar").click(function() {
            $("#divcategorias").show();
            $("#divbuscar").hide();
            $("#divbuscar").val();
            $("#consultaVacia").hide();
            $('#name-buscar').val('');
        });
        $("#btcancelar").click(function() {
            cancelarfactura();
        });

    });
</script>
@endsection