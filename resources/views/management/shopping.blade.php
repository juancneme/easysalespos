<?php $page_title = __('Entry of Merchandise') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
@include('management.pdvi_product')

<style>
    .img-responsive{
        height: auto;
        width: 100%;
    }
    .owl-carousel .owl-stage {
        margin-bottom: 5px;
    }
    .item {
        display: inline-block;
    }

    .buttonPay {
        padding-left: 2px;
        padding-right: 2px; 
        font-weight: bold; 
        color: white; 
        background-color: #3483FA; 
        border-color: #3483FA;
        opacity: 1;
    }

    .buttonPay:hover {
        background-color: #5D9CFB;
    }
</style>

<div class="panel-body form-add" style="margin-top: 110px;">
    <!-- INICIO FROTEND PDVi -->
    @include('management.frontendpdvi')
    <!-- FIN FROTEND PDVi -->
</div>

<input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
<!-- Current Oders -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Entry of Merchandise') }}

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

@include('management.components.pdvi.pdviCancelarVenta')

<!-- </div> -->

@include('management.components.pdvi.pdviNewClientModal.pdviNewClientModalComponent')

<script>
    var cont_items = 0;
    var idprod = 0;
    var total = 0;
    var total_articulos_vendidos = 0;
    var iva_total = 0;
    var subt = 0;
    var idelemento = 1020;

    elemento = [];
    idventas = [];
    cantidad = [];
    pcompra = [];
    pventa = [];
    subtotal = [];
    iva_item = [];
    type_item = [];

    taxCode = [];

    categ = [
        @if ($categories != '')
            @foreach ($categories as $cat)
                [ '{{ $cat->id }}' ],
            @endforeach
        @endif
    ];

    productos = [
        @if ($categories != '')
            @foreach ($categories as $cat)
                @foreach ($cat->ProductsCatalog as $prod)
                    [ '{{ $prod->id }}', '{{strtoupper(str_replace("\n" ,"" ,$prod->name ))}}', '{{ $prod->barcode }}' ],
                @endforeach
            @endforeach
        @endif
    ];

    $(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{__('ID Shopping')}}"},
                {data: 'created_at', name: 'created_at', title: "{{ __('created_at') }}"},
                {data: 'comercio.name', name: 'name', title: "{{__('Company')}}"},
                {data: 'total_value', name: 'total_value', title: "{{__('Total Value')}}"},
                {data: 'user.name', name: 'name', title: "{{__('User')}}"},
                // {data: 'fullname', name: 'fullname', title: "{{__('Client')}}"},
                {data: 'estado.name', name: 'name', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });


        $("#divbuscar").hide();

        console.log("categorias: ",categ);
        console.log("categoria 0: ",categ[0]);
        console.log('.cat' + categ[0]);

        $('.cat' + categ[0]).click();
            var json = "";
            if (total_articulos_vendidos == 0){
                var list = {
                'datos' :[]
                };
        };

        $("#category0").show();
        // seleccionarcategoria('one');

        $("#name-code").focus();

        $(".filter-button").on('click', function(){
            filter = $(this).attr("data-filter");
            seleccionarcategoria(filter);
        });

        function seleccionarcategoria(value){
            var token = '{{ csrf_token() }}';

            if (value == "find"){
                $("#name-code").hide();
                $("#divcategorias").hide();
                $("#divbuscar").show();
                $("#divbuscar").val();
                $('#name-buscar').val('');
                for (i = 0; i < categ.length; i++) {
                    $(".category" + categ[i]).hide();
                };
                $('#name-buscar').focus();
            }
            else {

                $.ajax({
                        url: '/management/pdvi/ajax?type=filterProducts',
                        type: 'get',
                        data: {
                            "filter": filter,
                            "typetransaction": "entry",
                            _token: token
                        },
                        success: function (response) {
                            res = JSON.parse(response);
                            $('#category0').html(res);
                            escombo = false;
                            showSubcategories(padre, filter)
                            //if(myParam) getStanbyProduct(myParam);
                        }
                    });
                // if (value == "one"){
                //     $(".category" + categ[0]).show();
                // } else {
                //     for (i = 0; i < categ.length; i++) {
                //         if (value == "all"){
                //             $(".category" + categ[i]).show();
                //         } else {
                //             if (categ[i] == value){
                //                 $(".category" + categ[i]).show();
                //             }
                //             else{
                //                 $(".category" + categ[i]).hide();
                //             }
                //         }
                //     }
                // }
            }
        };

        // $(".filter-buttonprod").on('click', function(){
        //     buscaritem($("#name-buscar").val(), 0);
        // });

        // function buscaritem(busqueda, tipo){

        //     var cantprod = 0; //Cantidad de Productos Encontrados
        //     var codeprod = 0; //Codigo del Producto Encontrado

        //     for (i = 0; i < categ.length; i++) {
        //        $(".category" + categ[i]).hide();
        //     };

        //     palabra = busqueda.toUpperCase();

        //     if ( palabra != null && palabra != ''){

        //         for (i = 0; i < productos.length; i++) {
        //             if (productos[i][1].toString().indexOf(palabra)>-1 || productos[i][2].toString().indexOf(palabra)>-1 ){
        //                 $("#divprod" + productos[i][0]).show();
        //                 if ($.isNumeric(palabra)){
        //                     cantprod = cantprod + 1;
        //                     codeprod = productos[i][0];
        //                 }
        //             }
        //             else{
        //                 $("#divprod" + productos[i][0]).hide();
        //             }
        //         }

        //         if (cantprod == 1){
        //             idprod = codeprod;
        //             $("#name-code").val('');
        //         }else{
        //         //    if (tipo == 1){
        //         //        $.message("Producto No Encontrado", "error", true);
        //         //    }
        //         };
        //     }

        // };

        $("body").on("click", ".addprod", function () {
            // agregaritem($(this).attr("data-id"), $(this).attr("data-name"), $(this).attr("data-price"), $(this).attr("data-tax"));
            addProduct($(this).attr("data-full"), $(this).attr("data-quantity"), $(this).attr("data-price"));
        });

        // $(".addprod").on('click', function(){
        //     // agregaritem($(this).attr("data-id"), $(this).attr("data-name"), $(this).attr("data-price"), $(this).attr("data-tax"));
        //     addProduct($(this).attr("data-full"), $(this).attr("data-quantity"), $(this).attr("data-price"));
        // });

        $('#cancelarVenta').on('click', function () {
            if (cont_items) {
                $(".title_canven_1").html('{{__('Cancel Shoping')}}');
                $(".title_canven_2").html('{{ __('Are you sure to cancel this shoping?') }}');
                $(".title_canven_3").html('{{ __('Yes cancel shoping') }}');
                $("#CancelarVenta").modal('show');
            }
        });


        function addProduct(mData, quantity, price) {
            console.log("addProduct cont_items I: "+cont_items);

            console.log("*** INICIO ADD ****");
            console.log(cont_items);
            console.log(elemento);
            console.log(idventas);
            console.log(cantidad);
            console.log(pcompra);
            console.log(pventa);
            console.log(subtotal);
            console.log(iva_item);
            console.log(type_item);
            console.log("********");

            data = JSON.parse(mData);
            id_venta = data.id;
            inventory_control = data.inventory_control;
            type_product = data.typeproduct;
            idarticulo = id_venta;
            articulo = data.name;

            console.log(data.saleprice, data.invsaleprice, data.specialprice);
            console.log(data.invpurchaseprice, data.purchaseprice);

            precio_venta = parsePDV(data.saleprice);
            precio_compra = parsePDV(data.purchaseprice);

            if ('{{ $typetransaction == "sales" }}') {
                precio_venta = data.specialprice != null ? parsePDV(data.specialprice) : parsePDV(data.saleprice);
            }

            path = data.catalog_id +'/'+ ('00' +  data.category_id).slice(-3) + '/' + data.image;
            console.log(data);
            initial_path = '/support/pictures/productscatalogs/'  + path;
            image_product = $('#prod'+data.id).attr('src') === '/support/pictures/config/cate000000.png' ? '/support/pictures/config/cate000000.png' :initial_path
            let increase = data.unidad_venta ? Number(data.unidad_venta.code.split("|")[3]) : 1;
            if(type_product == 176) image_product = "/support/pictures/config/combo00000.png";

            // cleanMessageModal();

            if ("{{ $salesOnHold  &&  auth()->guard('client')->user() }}") {
                $("#lbmensaje").text("{{__('The product cannot be sold, Because you already have')}}");
                $("#Notificacion").modal('show');
                return false;
            }

            if ('{{ $typetransaction == "sales" }}') {
                if (quantity <= 0 && inventory_control != 0 && url.split('/')[5] != 'delivered') {
                    $("#lbmensaje").text("{{__('The product cannot be sold, Please update quantity')}}");
                    $("#Notificacion").modal('show');
                    return false;
                }
            }

            if (sessionStorage.getItem('comboview')) return false;

            // if (escombo) {
                // tax = 0;
                // taxCode = "1|Un|Un".split("|");
                // iva_item[cont_items] = 0;
            // } else {
                tax = data.valor_impuesto.value;
                taxCode = data.unidad_venta.code.split("|");
                iva_item[cont_items] = data.valor_impuesto.value;
            // }
            if (taxCode[2] == null) taxCode[2] = "???";

            // if (!service) {
            //     $("#CancelarVenta").modal('show');
            //     return false;
            // }

            descuento = 0;
            console.log("====> "+idventas[cont_items - 1]+" - "+id_venta+" - "+increase);
            if (idventas[cont_items - 1] === id_venta) {
                console.log("ele "+"#"+'cant'.concat(idelemento-1));
                console.log("val "+cantidad[cont_items - 1]);

                $("#" + 'cant'.concat(idelemento-1)).val(parseInt(cantidad[cont_items - 1]) + increase);
                $("#" + 'cant'.concat(idelemento-1)).trigger('change');
            } else {
                total_articulos_vendidos += 1;
                elemento[cont_items] = idelemento;
                cantidad[cont_items] = increase;
                pcompra[cont_items] = precio_compra;
                pventa[cont_items] = precio_venta;
                subtotal[cont_items] = (cantidad[cont_items] * precio_compra - descuento) / increase;
                agregaritem($(this).attr("data-id"), data.typeproduct);
            }

            console.log("*** FINAL ADD****");
            console.log(cont_items);
            console.log(elemento);
            console.log(idventas);
            console.log(cantidad);
            console.log(pcompra);
            console.log(pventa);
            console.log(subtotal);
            console.log(iva_item);
            console.log(type_item);
            console.log("********");

        }

        // FUJNCION AGREGAR_ITEM JCNN NEW
        function agregaritem(id, typeProduct = 3) {
            console.log("cont_items I: "+cont_items);
            total += subtotal[cont_items];

            var html = $(".clone-prod").html();

            html = html.replace(/XXidelemento/g, idelemento);
            html = html.replace(/XXimage_product/g, image_product);
            // html = html.replace(/XXcont_items/g, cont_items);
            html = html.replace(/XXidarticulo/g, idarticulo);
            html = html.replace(/XXarticulo/g, articulo.substr(0,57));
            html = html.replace(/XXtypeProduct/g, typeProduct);
            html = html.replace(/XXcantidad/g, cantidad[cont_items]);

            html = html.replace(/XXtaxcode3/g, taxCode[3]);
            html = html.replace(/XXtaxcode/g, taxCode[0]);

            html = html.replace(/XXpcompra/g, precio_compra.formatMoney(0));
            html = html.replace(/XXpventa/g, precio_venta.formatMoney(0));

            html = html.replace(/XXsubtotal/g, subtotal[cont_items].formatMoney(2));

            var fila = jQuery(html);

            idventas.push(id_venta);
            type_item.push(typeProduct);
            cont_items++;
            idelemento++;

            $("#detalles").append(fila);
            $("#detalles").scrollTop($("#detalles")[0].scrollHeight);

            $("#btpagar").html("{{__('Enter merchandise')}}" + " (" + total.formatMoney(2) + ")");
            $("#canttotal").text(total_articulos_vendidos);
            $("#canttotal2").text(total_articulos_vendidos);

            idprod = 0;
            console.log("cont_items F: "+cont_items);

        }

        function calcularvalor(cont_items, cant, tax){
            console.log("Cont: " + cont_items + " Cant: " + cant + " Tax: " + tax);
            if ($.isNumeric(cant)){
                if (cant > 0){
                    $("#subt" + cont_items).text($("#precio" + cont_items).val() * cant);
                    total = total - subtotal[cont_items];
                    subtotal[cont_items] = (cant * $("#precio" + cont_items).val());
                    total = total + subtotal[cont_items];
                    factor = parseFloat(1 + (tax / 100));
                    iva_total = Math.round(total - (total / factor), 0);
                    subt = Math.round((total / factor), 0);
                    ivaunitario = Math.round(parseInt($("#subt" + cont_items).text()) - (parseInt($("#subt" + cont_items).text()) / factor), 0);
                    $("#total").html("$ " + total);
                    $("#total_venta").val(total);
                    $("#btpagar").html("{{__('Enter merchandise')}}" + " $ (" + total + ")");
                    $("#iva").html("$ " + iva_total);
                    $("#total_iva").val(iva_total);
                    $("#subtotal").html("$ " + subt);
                    $("#subtotal").val(subt);
                    $("#ivaunitario" + cont_items).val(ivaunitario);
                    if ($("#cant" + cont_items).text() == ''){
                        anterior = 1;
                    } else{
                        anterior = parseInt($("#cant" + cont_items).text());
                    };
                    if (anterior < cant){
                        total_articulos_vendidos = (total_articulos_vendidos) + (cant - anterior);
                    } else{
                        total_articulos_vendidos = (total_articulos_vendidos) - (anterior - cant);
                    };
                    $("#cant" + cont_items).text(cant);
                    $("#canttotal").text(total_articulos_vendidos);
                    cargar_items();
                } else{
                    $("#cant" + cont_items).val(1);
                };
            } else{
                $("#cant" + cont_items).val(1);
            };
        };

        function cargar_items() {

            console.log("*** INICIO CARGAR_ITEMS ****");
            console.log(cont_items);
            console.log(elemento);
            console.log(idventas);
            console.log(cantidad);
            console.log(pcompra);
            console.log(pventa);
            console.log(subtotal);
            console.log(iva_item);
            console.log(type_item);
            console.log("********");

            iva_total = 0;
            total = 0;
            list_products = {'datos': []};
            for (i = 0; i < cont_items; i++) {
                console.log("cantidad[i] ",cantidad[i]);
                if ( cantidad[i] <= 0) return true;
                list_products.datos.push({
                    "idarticulo": idventas[i],
                    "cantidad": cantidad[i],
                    "precio_compra": pcompra[i],
                    "precio_venta": pventa[i],
                    "precio_total": subtotal[i],
                    "valor_iva": subtotal[i] * iva_item[i] / (100 + iva_item[i]),
                    "typeproduct": type_item[i]
                });
                iva_total += subtotal[i] * iva_item[i] / (100 + iva_item[i]);
                total += subtotal[i];
            }
            json = JSON.stringify(list_products);
            return false;
        }

        function guardarfactura(){

            console.log(json, cont_items);
            if (cont_items > 0){

                $.ajax({
                    url: '/management/shopping/ajax?type=guardarfactura',
                    type: 'get',
                    data: {
                        "query": json,
                        "items": cont_items,
                        "total": total,
                        "clientid": $("#client_name").val(),
                        "iva": iva_total
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        console.log(res.data);
                        if(res.success){
                            cancelarfactura();
                            cont_items=0;
                            location.href=" {{ strtolower('/'.$group . '/' . $page) }}";
                            $.message("Formulacion Del Pedido Realizado Correctamente", "success", true);

                        }else {
                            $.message("Error en la consulta", "error", true);
                        }
                    }
                });

            }
            else{
                alert('formulacion de pedido vacio');
            }

        };
        
        // $(".btnpay").on('click', function(){
        $("#btpagar").on('click', function(){
            //validar cantidaddes en cero
            if (cargar_items()) {
                alert('Productos con cantidad en CERO');
                return;
            }
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

        function eliminar(index){
            total = total - subtotal[index];
            $("#total").html("$ " + total);
            $("#btpagar").html("{{__('Enter merchandise')}}" + " $ (" + total + ")");
            $("#total_venta").val(total);
            iva = Math.round(total - (total / 1.19), 0);
            subt = Math.round((total / 1.19), 0);
            $("#iva").html("$ " + iva_total);
            $("#total_iva").val(iva_total);
            $("#subtotal").html("$ " + subt);
            $("#subtotal").val(subt);
            total_articulos_vendidos = total_articulos_vendidos - $("#cant" + index).val();
            $("#canttotal").text(total_articulos_vendidos);
            $("#fila" + index).remove();
            cont_items--;
        };

        $(".btnback").on('click', function(){
            $("#name-code").show();
            $("#divcategorias").show();
            $("#divbuscar").hide();
            $("#divbuscar").val();
            $("#consultaVacia").hide();
            $('#name-buscar').val('');

            seleccionarcategoria('one');

            $("#name-code").focus();

        });

        // $("#name-code").change(function() {
        //     buscaritem($("#name-code").val(), 1);
        //     $("#prod" + idprod).trigger("click");
        // });

        // $("#name-buscar").keyup(function() {
        //     buscaritem($("#name-buscar").val(), 0);
        // });

    });

    function addNewClientModal() {
        $("#modalNewClient").modal('show');
    }

    function closeClientModal() {
        $("#formSearch")[0].reset();
        $('#alert').hide();
        $('#add').show();
    }

    function addClientModal(){
        $("#modalNewClientAdd").modal('show');
    }

    // Add Clients
    function addClient(){
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

    function increaseProduct(idelemento) {
        cant = parseInt($("#" + 'cant'.concat(idelemento)).val()); 
        cant += 1; 
        $("#" + 'cant'.concat(idelemento)).val(cant).trigger('change'); 
    }

    function decreaseProduct(idelemento) {
        cant = parseInt($("#" + 'cant'.concat(idelemento)).val());
        if (cant > 1) {
            cant -= 1;
            $("#" + 'cant'.concat(idelemento)).val(cant).trigger('change');
        }
    }

    function incrementa_mismo_producto(mIdelemento, mProduct_id, mIncrease) {
        // cleanMessageModal();

        index = elemento.indexOf( mIdelemento );
        if (index < 0) return;

        precio_producto = $('#pcompra' + mIdelemento).val();
        total = parsePDV(total - subtotal[index],true);
        if (mIncrease == 1) {
            total_articulos_vendidos -= cantidad[index];
        }
        cantidad[index] = parseInt($('#cant'.concat(mIdelemento)).val());
        if ( isNaN(cantidad[index]) ) {
            console.log('#cant'.concat(mIdelemento));
            $('#cant'.concat(mIdelemento)).val(0).trigger('change');
            $("#cant".concat(mIdelemento)).focus();
            return false;
        }
        if (mIncrease == 1) {
            total_articulos_vendidos += cantidad[index];
        }
        pcompra[index] = parseInt($('#pcompra' + mIdelemento).val());
        pventa[index] = parseInt($('#pventa' + mIdelemento).val());
        subtotal[index] = parsePDV( (cantidad[index] * precio_producto) / mIncrease - descuento, true );
        total = parsePDV(total + subtotal[index]);

        $("#" + 'subt'.concat(mIdelemento)).text(subtotal[index].formatMoney(2));
        $("#" + 'subt'.concat(mIdelemento)).trigger('change');

        $("#btpagar").html("{{__('Enter merchandise')}}" + " (" + total.formatMoney(2) + ")");
        $("#canttotal").text(total_articulos_vendidos);
        $("#canttotal2").text(total_articulos_vendidos);
    }

    function calcula_subtotal(mCantidad, mPrecioVenta, mTaxCode, mDescuento) {
        console.log(mCantidad, mPrecioVenta, mDescuento);
        switch (mTaxCode) {
            case '1' :
                return (mCantidad * mPrecioVenta - mDescuento);
                total_articulos_vendidos += 1;
                break;
            case '2':
                return (mCantidad * mPrecioVenta) / 500; //1000
                total_articulos_vendidos += 1;
                break;
            case '3':
                return (mCantidad * mPrecioVenta) / 1000; //500
                total_articulos_vendidos += 1;
                break;
            case '4':
                return (mCantidad * mPrecioVenta - mDescuento);
                total_articulos_vendidos += 1;
                break;
            default :
                return (mCantidad * mPrecioVenta - mDescuento);
                total_articulos_vendidos += 1;
                break;
        }
    }

    $("#divbarcode").hide();

    $(".btn_search").on('click', function(){
        buscaritem($("#name-buscar").val(), 1, 'shoping');
    })
    
    $('#formSearch').submit(function(e){
        $.ajax({
            url: '/management/pdvi/ajax?type=searchclient',
            type: $('#formSearch').attr('method'),
            data: $('#formSearch').serialize(),
            success: function (response)  {

                res = JSON.parse(response);
                console.log("dato:", res.status);

                if(res.status == false){
                    $('#add').show();
                    $('#alert').removeClass();
                    $('#alert').addClass("alert alert-danger")
                    $('#alert').text(res.message + ' ');
                    $('#alert').append('<a href="/{{strtolower($group."/".$page)}}/addpersons/client" class="alert-link">Registrese aqui</a>');
                    $('#alert').removeAttr('hidden');
                    $('#alert').show();

                    sessionStorage.setItem("number",$("#numberdocument1").val());
                    sessionStorage.setItem("type", $("#typedoc1").val());
                }
                else{
                    $('#alert').removeClass();
                    $('#alert').addClass("alert alert-success")
                    $('#alert').text(res.message + ':'+' '+res.clientname+' '+res.clientothernames+' '+res.clientlastname+' '+res.clientotherlastname);
                    $('#alert').removeAttr('hidden');
                    $('#alert').show();
                    $('#add').hide();

                    $('#client_name').empty();
                    $('#client_name').append('<option value="'+res.clientid+'"selected>'+res.clientname+' '+res.clientothernames+' '+res.clientlastname+' '+res.clientotherlastname+'</option>');
                    $('#client_name').trigger('change');
                }
            }
        });
        e.preventDefault();
    });

    if(sessionStorage.getItem("firstname")){
        var firstname = sessionStorage.getItem("firstname");
        var othernames = sessionStorage.getItem("othernames");
        var lastname = sessionStorage.getItem("lastname");
        var otherlastname = sessionStorage.getItem("otherlastname");
        var id = sessionStorage.getItem("id");

        $('#client_name').empty();
        $('#client_name').append('<option value="'+id+'"  selected>'+firstname+' '+othernames+' '+lastname+' '+otherlastname+'</option>').val(id);
        $('#client_name').trigger('change');
        sessionStorage.clear();
    }

    // if(sessionStorage.getItem("firstname")){
    //     $("#name-code").show();
    //     $("#divcategorias").show();
    //     $("#divbuscar").hide();
    //     $("#divbuscar").val();
    //     $("#consultaVacia").hide();
    //     $('#name-buscar').val('');
    // }

    $("#btcancelar").on('click', function(){
        console.log("va a cancelarfactura");
        cancelarfactura();
    });

    // function buscaritem(busqueda, tipo, tipotran) {
    //     let token = '{{csrf_token()}}';

    //     $.ajax({
    //         url  :'/management/pdvi/ajax?type=search',
    //         type : 'post',
    //         data : {
    //             filter: busqueda,
    //             search_type  : tipo,
    //             typetransaction : tipotran,
    //             _token: token
    //         },
    //         success: function (response) {
    //             res = JSON.parse(response);
    //             $('#category0').html(res);
    //             if(res.length === 75){
    //                 $("#lbmensaje").text("Producto No Encontrado");
    //                 $("#Notificacion").modal('show');
    //             }
    //             // if (idprod) $("#divprod" + idprod).trigger('click');
    //         },
    //         error: function(xhr, status, error) {
    //             $("#lbmensaje").text("Se produjo un error, favor intentar más tarde");
    //             $("#Notificacion").modal('show');
    //         }
    //     });
    // }

    function cancelarfactura(){
        console.log("en cancelarfactura");
        //Eliminar registros de productos
        $("#detalles").empty();

        //Inicializacion contadores
        total = 0;
        valor_total_recibido = 0;
        total_articulos_vendidos = 0;
        cont_items = 0;
        idelemento = 1020;
        iva_total = 0;

        elemento = [];
        idventas = [];
        cantidad = [];
        pcompra = [];
        pventa = [];
        subtotal = [];
        iva_item = [];
        type_item = [];

        receipt_number = [];
        authorization_code = [];

        json_products = "";
        json_payments = "";

        //Actualizacion Blade
        $("#btpagar").html(" $" + total.formatMoney(2));
        $("#canttotal").text(total_articulos_vendidos);
        $("#canttotal2").text(total_articulos_vendidos);
        $('.btnpayments').prop('disabled', false);

        $("#name-code").focus();
        // service = true;

        // $("#total").html("$ 0.00");
        // $("#total_venta").val(total);
        // $("#iva").html("$ 0.00");
        // $("#total_iva").val(iva_total);
        // $("#subtotal").html("$ 0.00");
        // $("#subtotal").val(subt);

        subt = 0;
        idprod = 0;

        console.log("*** INICIO ADD ****");
        console.log(cont_items);
        console.log(elemento);
        console.log(idventas);
        console.log(cantidad);
        console.log(pcompra);
        console.log(pventa);
        console.log(subtotal);
        console.log(iva_item);
        console.log(type_item);
        console.log("********");

        console.log("fin en cancelarfactura XXXX");

    };

    function parsePDV($value) {
        // console.log("convitiendo");
        // console.log($value);
        $newValue = parseFloat(parseInt(Math.round($value * 100)) / 100);
        // console.log($newValue);
        return parseFloat($newValue);
    }

    function deleteItem(idelemento, code) {

        console.log("Datos entrada: "+idelemento+" - "+code);

        index = elemento.indexOf( idelemento );
        console.log("idelemento: "+idelemento+" - index: "+index);
        if (index < 0) return;

        console.log("*** INICIO DEL ****");
        console.log(cont_items);
        console.log(elemento);
        console.log(idventas);
        console.log(cantidad);
        console.log(pcompra);
        console.log(pventa);
        console.log(subtotal);
        console.log(iva_item);
        console.log(type_item);
        console.log("********");

        cont_items -= 1;
        total = total - subtotal[index];
        $("#btpagar").html("{{__('Enter merchandise')}}" + " (" + total.formatMoney(2) + ")");

        total_articulos_vendidos -= code != 1 ? 1 : parseInt($("#cant" + idelemento).val());
        $("#canttotal").text(total_articulos_vendidos);
        $("#canttotal2").text(total_articulos_vendidos);

        $("#fila" + idelemento).remove();

        elemento.splice(index, 1);
        idventas.splice(index, 1);
        cantidad.splice(index, 1);
        pcompra.splice(index, 1);
        pventa.splice(index, 1);
        subtotal.splice(index, 1);
        iva_item.splice(index, 1);
        type_item.splice(index, 1);

        console.log("*** FINAL DEL ****");
        console.log(cont_items);
        console.log(elemento);
        console.log(idventas);
        console.log(cantidad);
        console.log(pcompra);
        console.log(pventa);
        console.log(subtotal);
        console.log(iva_item);
        console.log(type_item);
        console.log("********");

    }

    $("#btpagar").html("{{__('Enter merchandise')}}" + " $ (" + 0 + ")");

</script>
@endsection
