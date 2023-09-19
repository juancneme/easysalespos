<script>
    const EFECTIVO = 92;
    const TARJETA_CREDITO = 93;
    const TARJETA_DEBITO = 94;
    const SISTECREDITO = 107;  //FIADO_ELECTRONICO
    const MERCADO_PAGO = 108;
    const EFECTIVO_CONTRAENTREGA = 147;
    const QR_TEST = 148;
    const TRANSFERENCIA = 149;
    const CREDITO_LOCAL = 194;

    const GUARDA_VENTA_TEMPO = 191;
    const GUARDA_VENTA_FINAL = 192;
    const GUARDA_VENTA_PROCE = 195;

    const CREATED = 1;
    const URL = '/management/pdvi';
    const URL_DELIVERY = '/management/deliveries';
    
    var flagSistecredit = false;

    var myVar;

    var idelemento = 1010;
    var cont_items = 0;
    var increase = 0;
    var valor_total_venta = 0;
    var total_articulos_vendidos = 0;
    
    var valor_total_recibido = 0;

    var cont_payment = 0;
    var iva_total = 0;

    var escombo = false;

    var elemento = [];
    var idventas = [];
    var cantidad = [];
    var pcompra = [];
    var pventa = [];
    var subtotal = [];
    var iva_item = [];
    var type_item = [];

    var taxCode = [];

    var namepayments = [];
    var receipt_number = [];
    var authorization_code = [];

    var service = true;
    var number_celular = "";
    var fiado = false;
    // var check = $('input[name="non_face_to_face_sale"]:checked').length;
    var countCheck = 0;

    $(document).ready(function ($) {
        cleanMessageModal();
        var contador = 0;
        $("#txidpago").val('0');
        filter = $(this).attr("data-filter");
        padre = $(this).attr("data-padre");
        @if ($escajero)
        @if (empty($shiftid->typeshift_id) || $shiftid->typeshift_id != 14)
        $(".shift-control").css('background', 'salmon');
        $("#btn_open_turn").show();
        @else
        //$(".shift-control").css('background', 'green');
        $(".shift-control").css('background', '-webkit-radial-gradient(25px 25px, circle cover, #98CA3F, #5e8023)');
        $("#btn_open_turn").hide();
        //$("#shiftControl").text("{{$shiftid->id}}");
        @endif
        @else
        $(".shift-control").css('background', '-webkit-radial-gradient(25px 25px, circle cover, #98CA3F, #5e8023)');
        $("#btn_open_turn").hide();
        @endif

        @if (empty($shiftid->typeshift_id) || $shiftid->typeshift_id == 15)

        @if ($escajero && !$esvendedorback)
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            $("#txfecha").val(today);
            $('#AbrirTurno').modal('show');
        @else
            $("#lbmensaje").text('{{ __("Closed shift. Communication with the cashier.") }}');
            $("#Notificacion").modal('show');
            $("#btn_open_turn").hide();
            $('#btnAccept').click(function () {
                window.location.href = "{{ url('management/sales')}}";
            });
        @endif

        @elseif($shiftid->typeshift_id == 12 || $shiftid->typeshift_id == 10)
        
        $("#lbmensaje").text('{{ __("Blocked shift") }}');
        $("#Notificacion").modal('show');
        $("#btn_open_turn").hide();
        $('#btnAccept').click(function () {
            window.location.href = "{{ url('management/balancesheet')}}";
        });

        @endif

        @if(auth()->guard('client')->user())
            $('#searchClient').hide();
            @if(auth()->guard('client')->user()->email != '')
            $('#emailUser').val('{{auth()->guard('client')->user()->email}}');
            @endif
            sessionStorage.clear();
            $('#emailUser').val('informacion@easynet.com');
        @else
            $('#addresses').empty();
        @endif

        combos = [
            @if (!empty($combos))
                @foreach ($combos as $combo)
                    ['{{ $combo->id }}',
                    '{{strtoupper(str_replace("\n" ,"" ,$combo->cname ))}}',
                    "",
                    '{{ $combo->sale }}',
                    "",
                    '{{ $combo->sale }}',
                    '1|Ud|Combo',
                    '{{ $combo->typeproduct }}'
                    ],
                @endforeach
            @endif
        ];

        categories = [
            @if (!empty($categories))
                @foreach ($categories as $category)
                    @if(count($category->ProductsCatalog)> 0)
                        ['{{ $category->id }}'],
                    @endif
                @endforeach
            @endif
        ];

        var json_products = "";

        if (total_articulos_vendidos == 0) {
            var list_products = {'datos': []};
        }

        var json_payments = "";
        var list_payments = {'pagos': []};
        var url = window.location.pathname;

        // $("#category0").show();
        // $("#btnbuscar").trigger('click');

        //Load Products of a category
        if (!url.split('/').includes('delivered')) {
            @if ( !empty($shiftid->typeshift_id) )

            @if ( $shiftid->typeshift_id == 14 )

            $(".filter-button").on('click', function () {
                filter = $(this).attr("data-filter");
                padre = $(this).attr("data-padre");
                var token = '{{ csrf_token() }}';
                if (filter == "barcode") {
                    $("#divcategorias").hide();
                    $("#divbuscar").hide();
                    $("#divbarcode").show();
                    $('#name-code').focus();

                } else if (filter == "find") {
                    $('#category0').empty();
                    $("#divcategorias").hide();
                    $(".barProd").attr("style","height: 90px;");
                    $("#divbarcode").hide();
                    $("#divbuscar").show();
                    $("#divbuscar").val();
                    $('#name-buscar').val('');
                    $('#name-buscar').focus();

                    $(".filter-buttonprod").on('click', function () {
                        buscaritem($("#name-buscar").val(), 0, 'sales');
                    });

                } else if (filter == "combos") {
                    $.ajax({
                        url: '/management/pdvi/ajax?type=combos',
                        type: 'get',
                        data: {
                            "filter": filter,
                            _token: token
                        },
                        success: function (response) {
                            res = JSON.parse(response);
                            $('#category0').html(res);
                            escombo = true;
                        }
                    });
                } else if (filter == "promotions") {
                    $.ajax({
                        url: '/management/pdvi/ajax?type=promotions',
                        type: 'get',
                        data: {
                            "filter": filter,
                            _token: token
                        },
                        success: function (response) {
                            res = JSON.parse(response);
                            $('#category0').html(res);
                            escombo = false;
                        }
                    });
                } else {
                    $.ajax({
                        url: '/management/pdvi/ajax?type=filterProducts',
                        type: 'get',
                        data: {
                            "filter": filter,
                            "typetransaction": "sales",
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
                }
            });

            @endif
            @endif

            //Show products of first category
            @if(!empty($shiftid->typeshift_id))
            @if($shiftid->typeshift_id == 14 )
            // $('.cat' + categories[0]).click();
            // $(".filter-buttonprod").on('click', function () {
            //     buscaritem($("#name-buscar").val(), 0, 'sales');
            // });
            @endif
            @endif
        }

        $("#btregresar").click(function () {
            $("#divcategorias").hide();
            $("#divbarcode").hide();
            $("#divbuscar").show();
            $("#divbuscar").val();
            $('#name-buscar').val('');
            $('#name-buscar').focus();
        });

        //descripcion del modal de los productos
        $('#exampleModal').on('show.bs.modal', function (e) {
            $('<span class="span-se"></span>').html(data.name).insertAfter($('.modal-service'))
            e.stopImmediatePropagation();
        });

        $('#btcancelar').on('click', function (e) {
            cancelarfactura();
        });

        $(".btnback").on('click', function () {
            $("#category0").empty();
            $("#category0").show();
            $("#divsubcategorias").hide();
            $("#divbarcode").hide();
            $("#divcategorias").show();
            $("#divbuscar").hide();
            $("#name-buscar").val('');
            $("#name-code").val('');
            $(".barProd").attr("style","height: 126px;");
            // $('.cat' + categories[0]).click();
        });

        $(".btn_search").on('click', function(){
            buscaritem($("#name-buscar").val(), 1, 'sales');
        })

        // $("#name-buscar").keypress(function(e) {
        //     let code = (e.keyCode ? e.keyCode : e.which);

        //     if(code==13){
        //         $(".btn_search").trigger('click');
        //     }
        // })

        // $("#name-code").keyup(function () {
        //     $('#name-code').trigger(
        //         jQuery.Event('keypress', { keyCode: 13 })
        //     );
        //     buscaritem($("#name-code").val(), 2, 'sales');
        //     //$("#divprod" + idprod).trigger('click');
        // });

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

        const urlParams = new URLSearchParams(window.location.search);
        var myParam = urlParams.get('transaccionId');

        //Si es una venta anterior RETOMA DE VENTA
        @if (!empty($oldsale))
            @foreach($oldsale->items_products as $item)
                itemProduct = '{{ $item }}';
                price = '{{ $item->inventoryprice }}';
                quantity = '{{ $item->inventory_quantity }}';
                sales_quantity = '{{ $item->sales_quantity }}';
                data_inventoryc = '{{ $company->inventory_control }}';

                itemProduct = itemProduct.replace(/&quot;/g, '"');
                addProduct(itemProduct, quantity, price, data_inventoryc, sales_quantity);
            @endforeach

            @foreach($oldsale->items_payments as $payment)
                itemPayment = '{{ $payment }}';
                itemPayment = itemPayment.replace(/&quot;/g, '"');
                itemPayment = JSON.parse(itemPayment);
                addpayments(itemPayment.amount,
                itemPayment.paymentmethods_id,
                itemPayment.authorization_code,
                itemPayment.receipt_number);
            @endforeach

            @if(!empty($oldsale->client_id))
                let typedocument = '{{$oldsale->Cliente->person->typedocument_id}}';

                $('#typedoc1').val(typedocument);
                $('#numberdocument1').val('{{$oldsale->Cliente->person->numberdocument}}');
                if (typedocument == 6) $('#digitcheck-name').val('{{$oldsale->Cliente->person->digitcheck}}');
                searchClient();
            @endif
        @endif

        function seleccionarcategoria(value) {
            categ = [
                @if ($categories != '')
                    @foreach ($categories as $cat)
                        ['{{ $cat->id }}', '{{$cat->idowner}}', '{{$cat->name}}'],
                    @endforeach
                @endif
            ];

            paquete = [
                @if ($categories!='')
                    @foreach ($categories as $cat)
                        @if ($cat->id != $cat->idowner)
                            ['{{$cat->idowner}}'],
                        @endif
                    @endforeach
                @endif
            ];

            if (value == "barcode") {
                $("#divcategorias").hide();
                $("#divbuscar").hide();
                $("#divbarcode").show();
                $('#name-code').focus();
            } else {
                if (value == "find") {
                    $("#divcategorias").hide();
                    $("#divbuscar").show();
                    $("#divbuscar").val();
                    $('#name-buscar').val('');
                    for (i = 0; i < categ.length; i++) {
                        $(".category" + categ[i]).hide();
                    }
                    $('#name-buscar').focus();
                } else {
                    for (i = 0; i < categ.length; i++) {
                        if (value == "first") {
                            $(".category" + categ[0][0]).show();
                            $(".category" + categ[i][0]).hide();
                        } else {
                            if (categ[i][0] == value) {
                                $(".category" + categ[i][0]).show();
                            } else {
                                $(".category" + categ[i][0]).hide();
                            }
                        }
                    }
                }
            }
        }

        function showSubcategories(padre, value) {
            categ = [
                @if ($categories != '')
                    @foreach ($categories as $cat)
                        ['{{$cat->id}}'],
                    @endforeach
                @endif
            ];

            if (padre) {
                $("#divcategorias").hide();
                $("#divsubcategorias").show();

                // var cantidad = $('.categorias').owlCarousel();
                for (i = 0; i < categ.length; i++) {
                    if (categ[i] == value) {
                        $(".owl-item").find(".subcategory" + categ[i]).parent().show();
                    } else {
                        $(".owl-item").find(".subcategory" + categ[i]).parent().hide();
                    }
                }
            }
        }

        function productsCateg(arrayProducts) {
            var token = '{{csrf_token()}}';
            $.ajax({
                url: '/management/pdvi/ajax?type=search',
                type: 'get',
                data: {
                    "filter": arrayProducts,
                    _token: token
                },
                success: function (response) {
                    res = JSON.parse(response);
                    $('#category0').html(res);
                    escombo = false;
                    if (idprod) $("#divprod" + idprod).trigger('click');
                    //showSubcategories(padre, filter)
                }
            });
        }

        dontCopyPrint("confirm_number", "service_number");

        function showModalService() {

            if (total_articulos_vendidos == 0 || flag) {
                contador = contador + 1;
                $('#exampleModal').modal('show');

                //cuando se cierra el modal
                $("#close_modal").click(function () {
                    $("#service_number").val("");
                    $("#exampleModal").find("#confirm_number").removeClass('is-invalid')
                    $("#exampleModal").find("#alert-div").attr('hidden', true)
                    $('.modal-service').find('.span-se').text('');
                });
                //cuando se envia
                $("#send_modal").click(id_venta, function (e) {
                    // $('.modal-service').find('.span-se').text('');
                    service = false;
                    sendService(id_venta);
                });

            } else {
                $("#modalServices").modal('show');
                $('.btn-services').on('click', function () {
                    // flag = true;
                    cancelarfactura();
                    $("#modalServices").modal('hide');
                    setTimeout(function () {
                        $('#exampleModal').modal('show');
                        $("#send_modal").click(function () {
                            service = false;
                            sendService(id_venta)
                        });
                    }, 500);
                    flag = false;
                });
            }
        }

        $("body").on("click", ".addprod", function () {
            //$('.cat'+categories[0]).click();
            addProduct($(this).attr("data-full"), $(this).attr("data-quantity"), $(this).attr("data-price"), $(this).attr("data-inventoryc"), 0);
        });

        function addProduct(mData, quantity, price, data_inventoryc, sales_quantity) {
            // alert(mData);
            data = JSON.parse(mData);
            // alert(data);
            id_venta = data.id;
            inventory_control = data.inventory_control;
            // data_inventoryc = data.data_inventoryc;
            if (data_inventoryc == 1 ) {
                inventory_control = 1;
            }

            type_product = data.typeproduct;
            idarticulo = id_venta;
            articulo = data.name;

            precio_venta = parsePDV(data.saleprice);
            // alert(data.purchaseprice);
            precio_compra = parsePDV(data.purchaseprice);

            if ('{{ $typetransaction == "sales" }}') {
                precio_venta = data.specialprice != null ? parsePDV(data.specialprice) : parsePDV(data.saleprice);
            }

            path = data.catalog_id +'/'+ ('00' +  data.category_id).slice(-3) + '/' + data.image;
            initial_path = '/support/pictures/productscatalogs/' + path;
            image_product = $('#prod'+data.id).attr('src') === '/support/pictures/config/cate000000.png' ? '/support/pictures/config/cate000000.png' : initial_path;
            increase = data.unidad_venta ? Number(data.unidad_venta.code.split("|")[3]) : 1;
            if(type_product == 176) image_product = "/support/pictures/config/combo00000.png";

            cleanMessageModal();

            if ("{{ $salesOnHold  &&  auth()->guard('client')->user() }}") {
                $("#lbmensaje").text("{{__('The product cannot be sold, Because you already have')}}");
                $("#Notificacion").modal('show');
                return false;
            }

            if (precio_venta == 0) {
                @if ($company->typecompany_id == 47)
                    messagePrice("{{__('The product cannot be sold, Please update price')}}", idarticulo);
                @else
                    $("#lbmensaje").text("{{__('The product cannot be sold, Please update price')}}");
                    $("#Notificacion").modal('show');
                @endif
                return false;
            }

            quantity_sales = find_quantity_sales(id_venta);
            quantity -= quantity_sales;

            if (quantity <= 0 && inventory_control == 1 && url.split('/')[5] != 'delivered' ) {
                $("#lbmensaje").text("{{__('The product cannot be sold, Please update quantity')}} men1");
                $("#Notificacion").modal('show');
                return false;
            }
            if (sessionStorage.getItem('comboview')) return false;

            if (escombo) {
                tax = 0;
                taxCode = "1|Un|Un|1".split("|");
                value_iva = 0;
                // iva_item[cont_items] = 0;
            } else {
                tax = data.valor_impuesto.value;
                taxCode = data.unidad_venta.code.split("|");
                value_iva = data.valor_impuesto.value;
                // iva_item[cont_items] = data.valor_impuesto.value;
            }
            if (taxCode[2] == null) taxCode[2] = "???";

            if (!service) {
                $("#CancelarVenta").modal('show');
                return false;
            }

            // alert(cont_items - 1);

            // alert(idventas[cont_items - 1]);
            // alert(id_venta);
            // alert(type_item[cont_items - 1]);
            // alert(type_product);

            descuento = 0;
            if (idventas[cont_items - 1] === id_venta &&
                type_item[cont_items - 1] === type_product  ) {
                $("#" + 'cant'.concat(idelemento-1)).val(parseInt(cantidad[cont_items - 1]) + increase);
                $("#" + 'cant'.concat(idelemento-1)).trigger('change');
            } else {
                total_articulos_vendidos += 1;
                elemento[cont_items] = idelemento;
                cantidad[cont_items] = increase;
                pcompra[cont_items] = parsePDV(precio_compra);
                pventa[cont_items] = parsePDV(precio_venta);
                subtotal[cont_items] = parsePDV( (cantidad[cont_items] * precio_venta) / increase - descuento );
                iva_item[cont_items] = value_iva;
                agregaritem($(this).attr("data-id"), data.typeproduct);
            }

            if (sales_quantity > 0) {
                $("#" + 'cant'.concat(idelemento-1)).val(parseInt(sales_quantity));
                $("#" + 'cant'.concat(idelemento-1)).trigger('change');
            }

            $("#cant".concat(idelemento-1)).focus().select();

        }

        /**
         * Method to consume service SUPERPAGOS
         */
        function sendService(id_venta) {
            minLength = 10;
            value = $("#service_number").val();
            value_confirm = $("#confirm_number").val();
            cleanMessageModal();

            if (value != '') {
                if (value.length < minLength) {
                    $("#lbmensaje").text("{{__('The phone number must have 10 digits')}}");
                    $("#Notificacion").modal('show');
                    return false;
                }
                if (value_confirm == '') {
                    $("#lbmensaje").text("{{__('Please confirm number')}}");
                    $("#Notificacion").modal('show');
                } else if (value === value_confirm && value.length === minLength) {
                    number_celular = parseInt($("#service_number").val(), 10)
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        url: '/management/pdvi/ajax?type=sellProducts',
                        type: 'post',
                        data: {
                            "productId": data.idpartner,
                            "amount": data.saleprice,
                            "_channel": "ws",
                            "_refId": data.id,
                            "data": {
                                "cellphone": number_celular
                            },
                            _token: token
                        },
                        beforeSend: function () {
                            $("#exampleModal").modal('hide');
                            $("#exampleModal").find("#confirm_number").removeClass('is-invalid');
                            $("#exampleModal").find("#alert-div").attr('hidden', true);
                        },
                        async: false,
                        success: function (response) {
                            $('#exampleModal').modal('hide');
                            resp = JSON.parse(response);
                            if (resp.data.status === true) {
                                message = resp.data;
                            } else {
                                message = resp.data;
                            }
                            if (resp.success) {
                                var success_message = '<div class="alert alert-success alert-dismissable"><strong>' + message.message + '<strong></div>'
                                $('#modalMessages').modal('show');
                                $('#modalMessages').find('.modal-body').append(success_message);
                                $("#service_number").val("");
                                $("#confirm_number").val("");
                                agregaritem(id_venta);
                            } else {
                                service = true;
                                var error_message = '<div class="alert alert-danger alert-dismissable"><strong>' + message.message + '<strong></div>'
                                $('#modalMessages').modal('show');
                                $('#modalMessages').find('.modal-body').append(error_message)
                                $("#confirm_number").val("");
                            }

                            $('.messages').on('click', function () {
                                closeModalMessages();
                            });

                        }
                    });

                    $("#service_number").val("");
                    $('#exampleModal').modal('hide');
                    e.stopImmediatePropagation();
                } else if (value != value_confirm) {
                    $("#lbmensaje").text('{{ __("Confirmation does not match") }}');
                    $("#Notificacion").modal('show');
                }
            } else {
                $("#lbmensaje").text('{{ __("Enter a phone number") }}');
                $("#Notificacion").modal('show');
            }
        }

        // FUJNCION AGREGAR_ITEM JCNN NEW
        function agregaritem(id, typeProduct = 3) {
            //Calcula Valor Total basado en la suma de subtotales y redonbdear al final. 
            //valor_total_venta = parsePDV(valor_total_venta + subtotal[cont_items]);
            valor_total_venta = Calcula_valor_total(subtotal);
            valor_total_venta = parsePDV(valor_total_venta,true);
        
            var html = $(".clone-prod").html();

            html = html.replace(/XXidelemento/g, idelemento);
            html = html.replace(/XXimage_product/g, image_product);
            html = html.replace(/XXidarticulo/g, idarticulo);
            html = html.replace(/XXarticulo/g, articulo.substr(0,57));
            html = html.replace(/XXtypeProduct/g, typeProduct);
            html = html.replace(/XXcantidad/g, cantidad[cont_items]);

            html = html.replace(/XXtaxcode3/g, taxCode[3]);
            html = html.replace(/XXtaxcode/g, taxCode[0]);

            html = html.replace(/XXpcompraT/g, precio_compra.formatMoney(0));
            html = html.replace(/XXpcompra/g, precio_compra);

            html = html.replace(/XXpventaT/g, precio_venta.formatMoney(0));
            html = html.replace(/XXpventa/g, precio_venta);

            html = html.replace(/XXsubtotal/g, subtotal[cont_items].formatMoney(2));

            var fila = jQuery(html);

            idventas.push(id_venta);
            type_item.push(typeProduct);
            cont_items++;
            idelemento++;

            $("#detalles").append(fila);
            $("#detalles").scrollTop($("#detalles")[0].scrollHeight);

            $("#btpagar").html(valor_total_venta.formatMoney(2));
            $("#canttotal").text(total_articulos_vendidos);
            $("#canttotal2").text(total_articulos_vendidos);

            $('#fiado').prop('disabled', true);

            idprod = 0;
        }

        function find_quantity_sales(id_venta) {
            cantidad_venta = 0;
            for ($ind=0; $ind < cont_items; $ind++ ) {
                if (idventas[$ind] == id_venta) {
                    cantidad_venta += cantidad[$ind];
                }
            }
            return cantidad_venta;
        }

        function cargar_items() {

            list_products = {'datos': []};
            for (i = 0; i < cont_items; i++) {
                idelemento = elemento[i];
                if (cantidad[i] <= 0) return true;
                list_products.datos.push({
                    "idarticulo": idventas[i],
                    "articulo": $("#Articulo".concat(idelemento)).val(),
                    "cantidad": cantidad[i],
                    "precio_compra": pcompra[i],
                    "precio_venta": pventa[i],
                    "precio_total": subtotal[i],
                    "valor_iva": subtotal[i] * iva_item[i] / (100 + iva_item[i]),
                    "typeproduct": type_item[i]
                });
                iva_total += subtotal[i] * iva_item[i] / (100 + iva_item[i]);
            }
            json_products = JSON.stringify(list_products);
            return false;
        }

        function cargar_pagos() {
            list_payments = {'pagos': []};
            for (i = 0; i < cont_payment; i++) {
                if ($("#payment" + i).val() != null) {
                    list_payments.pagos.push({
                        "idpago": parseInt($("#payment" + i).val()),
                        "nombre": namepayments[i],
                        "valorpago": parseInt($("#payment" + i).attr('amount')),
                        "parmadi1": receipt_number[i],
                        "parmadi2": Math.sign(authorization_code[i]) !== -1 ? authorization_code[i] : Number(0)
                    });
                }
            }
            json_payments = JSON.stringify(list_payments);
        }

        function guardarfactura(status) {
            respuesta = 0;

            $resolusion = '{{ $resDian }}';
            $resolusion = $resolusion.replace(/&quot;/g, '"');
            $company1 = '{{ $company }}';
            $company1 = $company1.replace(/&quot;/g, '"');
            $contract1 = '{{ $contract }}';
            $contract1 = $contract1.replace(/&quot;/g, '"');
            $mPrinter = '{{ $company->impresora }}';

            if (cont_items > 0) {
                var token = '{{csrf_token()}}';

                $.ajax({
                    url: '/management/pdvi/ajax?type=guardarfactura',
                    type: 'post',
                    data: {
                        "detalles": json_products,
                        "pagos": json_payments,

                        "totalarticulos": total_articulos_vendidos,
                        "totalpago": valor_total_venta,
                        "totaliva": iva_total,

                        "resDian": $resolusion,
                        "company": $company1,
                        "contract": $contract1,

                        "name": $.trim($("#client_name option:selected").text()),
                        "idcliente": $("#client_name").val(),
                        "url": url,
                        "delivered": url.split('/')[4] != undefined ? url.split('/')[4] : 0,
                        "dataClient": number_celular,
                        "comments": $("#comments").val() != undefined ? $("#comments").val() : "",
                        "seller" : $("#sellers").val() != undefined ? $("#sellers").val() : "",
                        "status": status,
                        "client_name": $("#name").val() != undefined ? $("#name").val() : "",
                        _token: token
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        if (res.success) {
                            if ($.isNumeric(res.data.data.id)) {
                                respuesta = res.data.data;
                                $('#valor_recibido').val('');
                            } else {
                                $("#lbmensaje").text(res.data.data.id);
                                $("#Notificacion").modal('show');
                                $("#category0").empty();
                            }
                        } else {
                            $.message("Error en la consulta", "error", true);
                        }
                    }
                });
                datafull = respuesta;
                generar_txt(datafull, datafull.id);
                if ( $mPrinter != '' && status == GUARDA_VENTA_FINAL ) print_invoice(datafull, datafull.id);
            } else {
                $("#lbmensaje").text('{{ __("Missing to select products.") }}');
                $("#Notificacion").modal('show');
            }

            return respuesta;
        }

        function generar_txt(datafull, $id, $mPrinter) {
            // if ($id > 0) {
                var token = '{{csrf_token()}}';
                datafull = JSON.stringify(datafull);
                $.ajax({
                    url: '/management/pdvi/ajax?type=generar_txt',
                    type: 'post',
                    data: {
                        "datafull": datafull,
                        "id": $id,
                        _token: token
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                    }
                });
            //}
        }

        /*
        Mercado pago function
        */
        function mercadoPago() {
            $.ajax({
                url: '/management/pdvi/smartCheckout',
                type: 'get',
                data: {
                    "total": valor_total_venta,
                    "idFactura": res.data.id,
                },
                async: false,
                success: function (response) {
                    if (response.status == 200) {
                        authorization_code = response.authorization_code;
                        $(".messages").empty();
                        $(".messages").append('Cancelar');
                        $('#btnMercadopago').attr('href', response.message);
                        $('#btnMercadopago').show(500);
                        $('#btnMercadopago').click();
                        setTimeout(function () {
                            document.getElementById("btnMercadopago").click();
                            myVar = setInterval(callBackConfirmedPayment, 4000);
                        }, 2000);

                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    clearInterval(myVar);
                    $('#modalMessages').modal('show');
                    $('#modalMessages').find('.modal-body').empty();
                    $('#modalMessages').find('.modal-body').append(xhr.responseJSON.message);
                    // setEfectivo();
                }
            });
        }

        function RequestQrCodeDB() {
            $.ajax({
                url: '/management/pdvi/dataBaseQrCallBack/',
                type: 'get',
                data: {
                    "id": '{{$idqr}}',
                },

                async: false,
                success: function (response) {
                    res = response;
                    if (res.status) {
                        $.message(res.message[0], "success", true);
                        clearInterval(myVar);
                        $("#btfinventa").click()
                        $('#qrCode').find('.qr-code').remove();
                    }
                }
            });
        }

        $('#cancelarVenta').on('click', function () {
            if (cont_items) {
                $(".title_canven_1").html('{{__('Cancel Sale')}}');
                $(".title_canven_2").html('{{ __('Are you sure to cancel this sale?') }}');
                $(".title_canven_3").html('{{ __('Yes cancel sale') }}');
                $("#CancelarVenta").modal('show');
            }
        });

        $('#btpagar').on('click', function () {
            if (cont_items) {
                cleanMessageModal();
                if ( !'{{ $escajero }}') {
                    $('#btguardar').trigger('click');
                     return;
                };
                if ( '{{ $esvendedorback }}' && validaCliente()) { return };

                if ( '{{ $esvendedorback }}' ) {
                    $( "#non_face_to_face_sale" ).prop( "checked", true );
                    $( "#non_face_to_face_sale" ).prop( "disabled", true );
                    countCheck = 1;
                };
                $('#add_buttons1').hide();

                if (cargar_items()) {
                    alert('Productos con cantidad en CERO');
                    return;
                }
                remain = valor_total_venta - valor_total_recibido;
                $('.btnpayments').prop('disabled', remain > 0 ? false : true);
                $('#txpagototal').val(valor_total_venta);
                $('#txpagototal').text(valor_total_venta.formatMoney(2));
                $('#txremainingprice').val(remain);
                $('#txremainingprice').text(remain.formatMoney(2));

                // $('#salepaymentmodal').attr('hidden', false);
                // $('#salepaymentmodal').modal('show');

                if ( $('#esvirtual').val() ) {
                    alert("#pdvi_login on");
                    $('#pdvi_login').modal('show');
                }

                @if (!empty($oldsale) && !is_null($type))
                    $('#salepaymentmodal').attr('hidden', false);
                    $('#salepaymentmodal').modal('show');
                @else
                if ( '{{ $esvendedorback }}') {
                    // alert("es cajero back");
                    $('#salepaymentmodal').attr('hidden', false);
                    $('#salepaymentmodal').modal('show');
                } else {
                    // alert("NO es cajero back");
                    $('#btnpayment92').trigger('click');
                }
                @endif

                // $('#salepaymentmodal').attr('hidden', false);
                // $('#salepaymentmodal').modal('show');

            }
        });

        $('#btnHowtopay').on('click', function () {

            // $('#cashModal').attr('hidden', true);
            $('#cashModal').modal('hide');

            $('#salepaymentmodal').attr('hidden', false);
            $('#salepaymentmodal').modal('show');
        });

        $('#btguardar').on('click', function () {
            if (cont_items) {
                if (cargar_items()) {
                    alert('Productos con cantidad en CERO');
                    return;
                }
                $("#btguardarventa").click();
            }
        });

        $("#btnloginclient").on('click', function () {
            var regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            var userClient = $('#email').val().trim();
            var claveClient =  $('#password').val().trim();

            // $("#lbmensaje").text("Datos incluidos "+userClient+" * "+claveClient);
            // $("#Notificacion").modal('show');

            // $('#pdvi_login').modal('hide');
            // $('#salepaymentmodal').modal('show');

            $.ajax({
                url: '/management/pdvi/ajax?type=loginclient',
                type: 'get',
                data: {
                    "usuario": userClient,
                    "clave": claveClient,
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);

                    if (res.success) {
                        //Colocar nombre en la casilla que corresponde
                        //Colocar datos en los campos necesarios para guardar la venta con este cliente
                        $('#pdvi_login').modal('hide');
                        // $('#salepaymentmodal').modal('show');
                        location.reload();
                    } else {
                        $.message("Error en la consulta", "error", true);
                    }
                }
            });

        });

        $("#valor_recibido").keyup(function () {
            $("#valor_cambio").val($("#valor_recibido").val().replace(/[^0-9.-]+/g, "") - $('#txremainingprice').val());

            $("#valor_cambio").text(Math.sign($("#valor_cambio").val()) !== -1
                ? aprox(($("#valor_recibido").val().replace(/[^0-9.-]+/g, "")) - aprox($('#txremainingprice').val())).formatMoney(2)
                : Number(0).formatMoney(2));
        });

        $('.btnpayments').on('click', function () {
            paymentmethod = $(this).attr('paymentid');

            cambio = 0;
            payment = parseInt(paymentmethod);

            // if (countCheck) {
            //     payment = EFECTIVO_CONTRAENTREGA;
            // }
            
            @if(auth()->guard('client')->user())
            payment = EFECTIVO
            @endif

            if (valor_total_recibido < valor_total_venta) {
                remaining_price = valor_total_venta - valor_total_recibido;
                switch (payment) {
                    case EFECTIVO:
                        setTimeout(function() {
                            $("#valor_recibido").focus();
                        }, 500);

                        remaining_price = aprox(remaining_price);
                        $('#valortotalefectivo').val(remaining_price);
                        $('#valortotalefectivo').text(remaining_price.formatMoney(2));
                        $('#valor_recibido').val('');
                        valor = 0;
                        $('#valor_cambio').text(valor.formatMoney(2));
                        $('#cashModal').modal('show');
                        break;

                    case EFECTIVO_CONTRAENTREGA:
                        $('#valortotalefectivo').val(valor_total_venta);
                        $('#valortotalefectivo').text(valor_total_venta.formatMoney(2));
                        $('#valor_recibido').val(valor_total_venta.formatMoney(2));
                        valor = 0;
                        $('#valor_cambio').text(valor.formatMoney(2));
                        // customModalConfirmSaleOut('Desea realizar un venta no presencial?')
                        // confirmSaleOut();
                        addpayments(valor_total_venta, payment, parmadi1 = '', parmadi2 = '')
                        break;

                    case TARJETA_CREDITO:
                        setTimeout(function() {
                            $("#receipt_number_tc").focus();
                        }, 500);
                        $('#receipt_number_tc').val('');
                        $('#authorization_code_tc').val('');

                        // $('#campo_receip_tc').show('');
                        // $('#campo_receipt_tc').hide('');
                        // $('#campo_receipt_tc').hide('');

                        $('#modalTitle_tc').text("{{__('CREDIT card approval information')}}");
                        $('#labelField1_tc').text("{{ __('Last 4 digits of the card') }}*");
                        $('#labelField2_tc').text("{{ __('Authorization number') }}*");

                        $('#txvalorpago_tc').val(remaining_price.formatMoney(2));
                        $('#txvalorpago_tc').text(remaining_price.formatMoney(2));
                        $('#modalTarjeta_tc').modal('show');
                        break;

                    case TARJETA_DEBITO:
                        setTimeout(function() {
                            $("#receipt_number_tc").focus();
                        }, 500);
                        $('#receipt_number_tc').val('');
                        $('#authorization_code_tc').val('');

                        $('#modalTitle_tc').text("{{__('DEBIT card approval information')}}");
                        $('#labelField1_tc').text("{{ __('Last 4 digits of the card') }}*");
                        $('#labelField2_tc').text("{{ __('Authorization number') }}*");

                        $('#txvalorpago_tc').val(remaining_price.formatMoney(2));
                        $('#txvalorpago_tc').text(remaining_price.formatMoney(2));
                        $('#modalTarjeta_tc').modal('show');
                        break;

                    case TRANSFERENCIA:
                        setTimeout(function() {
                            $("#receipt_number_tr").focus();
                        }, 500);
                        $('#receipt_number_tr').val('');
                        $('#authorization_code_tr').val('');
                        
                        $('#modalTitle_tr').text("{{__('Bank transfer approval information')}}");
                        $('#labelField1_tr').text("{{ __('Financial name entity') }}*");
                        $('#labelField2_tr').text("{{ __('Account number') }}*");

                        // $('#receipt_numbertr').type('text');
                        // $('#receipt_numbertr').maxlength(40);
                        // $('#authorization_code').type('nuemric');

                        $('#txvalorpago_tr').val(remaining_price.formatMoney(2));
                        $('#txvalorpago_tr').text(remaining_price.formatMoney(2));
                        $('#modalTransferencia').modal('show');
                        break;

                    case CREDITO_LOCAL:
                        // var hoy = '{{ $datecl }}';
                        
                        $('#receipt_number').val();
                        $('#authorization_code').val();

                        $('#modalTitle').text("{{__('Local Credit approval information')}}");
                        $('#labelField1').text("{{ __('Approval date') }}*");
                        $('#labelField2').text("{{ __('Collection Date') }}*");

                        $('#txvalorpago').val(remaining_price.formatMoney(2));
                        $('#txvalorpago').text(remaining_price.formatMoney(2));
                        
                        $('#modalCreditoLocal').modal('show');
                        break;

                    case SISTECREDITO:
                        if (validaCliente()) return false;
                        if (validaClienteSIS()) return false;
 
                        if (cont_payment > 0){
                            $("#lbmensaje").text('{{ __("Mixed payments are not allowed with this payment method") }}');
                            $("#Notificacion").modal('show');
                            return false;
                        }

                        if ( !(remaining_price >= 10000 && remaining_price <= 200000) ) {
                            $("#lbmensaje").text('{{ __("The value of the sale must be between 10,000 and 200,000") }}');
                            $("#Notificacion").modal('show');
                            return false;
                        }
                        
                        $('#modalSisteCredit').modal({'show': true, keyboard: false, backdrop: 'static',});
                        $('#emailUser').val("{{auth()->user()->email}}");
                        if (!flagSistecredit) {
                            return false;
                        }
                        flagSistecredit = false;
                        break;
                    case MERCADO_PAGO:

                        if (valor_total_venta > 0) {
                            setTimeout(function () {
                                $('#emailUser').val("{{auth()->user()->email}}");
                                $('#txvalorpago').val(remaining_price);
                                addpayments($('#txvalorpago').val(), MERCADO_PAGO)
                                //$("#btfinventa").click();
                            }, 1000);
                        } else {
                            $('#btnMercadopago').hide();
                            $('#btfinventa').show(1000);
                        }
                        break;
                    case QR_TEST:
                        $('#qrCode').empty();
                        $('#qrCode').append($("<img />", {
                            "class": "qr-code",
                        }));
                        $('#modalQr').modal('show');
                        $('#qrCode').show(1000);
                        myVar = setInterval(RequestQrCodeDB, 2000);
                        return false;
                        break;
                }
            }
        });

        $('.close').on('click', function () {
            var modalid = $(this).attr('modalid');
            var modal = document.getElementById(modalid);
            modal.modal('hide');
        });

        function aprox(number) {
            return number - (number % 50);
        }

        function addpayments(valuefp, payment, parmadi1 = '', parmadi2 = '') {
            if (url.split('/').includes('delivered')) {
				$("#btguardarventa").prop("disabled", true);
				$("#non_face_to_face_sale").prop("disabled", true);
				if (payment == EFECTIVO_CONTRAENTREGA) {
					payment = EFECTIVO;
				}
			}

            cleanMessageModal();

            if (valuefp <= 0 || isNaN(Number(valuefp))) {
                $("#lbmensaje").text('{{ __("The value is not correct, please try again") }}');
                $("#Notificacion").modal('show');
                return false;
            }

            var paymentList = $('.pl');

            if (payment == TARJETA_CREDITO || payment == TARJETA_DEBITO) {
                var paymentMethod = $('#btnpayment' + payment).attr('paymentname') + " - " + parmadi1;
            } else {
                var paymentMethod = $('#btnpayment' + payment).attr('paymentname');
            }

            if (valor_total_recibido + valuefp > valor_total_venta && payment != EFECTIVO) {
                $("#lbmensaje").text('{{ __("The Payment Method Exceeds the Invoice Total, Please Delete Any Payment Method") }}');
                $("#Notificacion").modal('show');
            } else {
                valor_total_recibido += valuefp;
                $html = '<li class="list-group-item" style="margin-left: 0; border:none;" id="payment' + cont_payment + '" value="' + payment + '" amount="'
                    + valuefp + '"><em value="' + payment + '" amount="' + valuefp + '" listid = "payment'
                    + '" data-index = "' + cont_payment + cont_payment + '" class="deletepayform" id="deletepayform'
                    + cont_payment + '">×</em></b><i>' + paymentMethod + '</i><div><span class="pl_amount">'
                    + Number(valuefp).formatMoney(2) + '</span></div></li>';

                paymentList.append($html);
                cont_payment++;

                namepayments.push($('#btnpayment' + payment).attr('paymentname'));
                receipt_number.push(parmadi1);
                authorization_code.push(parmadi2);

                remaining_value = valor_total_venta - valor_total_recibido;

                if (aprox(valor_total_venta) <= aprox(valor_total_recibido)) {
                    remaining_value = aprox(remaining_value);
                }

                $('#txremainingprice').text(remaining_value.formatMoney(2));
                $('#txremainingprice').val(remaining_value);
                $('#txremainingprice').trigger('change');

            }

            if (!url.split('/').includes('delivered')) {
                setTimeout(function () {
                    $('#txremainingprice').val() == 0 ? $('#btfinventa').click() : null
                }, 1000);
            }
        }

        $('#btnAddEfectivo').on('click', function () {

            valorpendiente = parseInt($('#valortotalefectivo').val());
            valorecibido = parseInt($('#valor_recibido').val().replace(/[^0-9.-]+/g, ""));
            valorcambio = parseInt($('#valor_cambio').val());

            if (valorecibido <= valorpendiente) {
                valor_recibido = valorecibido;
                remainingPrice = 0;
            } else {
                valor_recibido = valorecibido - valorcambio;
            }

            $('#txremainingprice').val(aprox($('#txremainingprice').val()));

            addpayments(valor_recibido, payment, valorecibido, valorcambio);

        });

        $('#btnaddcredit').on('click', function () {

            if ($("#receipt_number").val() == "" || $("#authorization_code").val() == "") {
                return false;
            } else {
                valuefp = parseInt($('#txvalorpago').val().replace(/[^0-9.-]+/g, ""));
                parmadi1 = $("#receipt_number").val();
                parmadi2 = $("#authorization_code").val();
                addpayments(valuefp, payment, parmadi1, parmadi2);
            }
            $('#modalCreditoLocal').modal('hide');
        });

        $('#btnaddcard_tc').on('click', function () {
           
            if ($("#receipt_number_tc").val() == "" || $("#authorization_code_tc").val() == "") {
                alert("Por Favor Complete todos los Campos");
                return false;
            } else {
                valuefp = parseInt($('#txvalorpago_tc').val().replace(/[^0-9.-]+/g, ""));
                parmadi1= $("#receipt_number_tc").val();
                parmadi2= $("#authorization_code_tc").val();
                addpayments(valuefp, payment, parmadi1, parmadi2);
            }
            $('#modalTarjeta_tc').modal('hide');
        });

        $('#btnaddtransfer').on('click', function () {
            if ($("#receipt_number_tr").val() == "" || $("#authorization_code_tr").val() == "") {
                alert("Por Favor Complete todos los Campos");
                return false;
            } else {
                valuefp = parseInt($('#txvalorpago_tr').val().replace(/[^0-9.-]+/g, ""));
                parmadi1= $("#receipt_number_tr").val();
                parmadi2= $("#authorization_code_tr").val();
                addpayments(valuefp, payment, parmadi1, parmadi2);
            }
            $('#modalTransferencia').modal('hide');
        });

        //eliminar_pago
        $("body").on("click", ".deletepayform", function () {

            index = $(this).attr('data-index');
            amount = $(this).attr('amount');

            valor_total_recibido -= amount;

            //Borrar informacion de pagos
            // receipt_number.splice(index,1);
            // authorization_code.splice(index,1);
            $(this).parents(".list-group-item").remove();

            $('#txremainingprice').text((valor_total_venta - valor_total_recibido).formatMoney(2));
            $('#txremainingprice').val(valor_total_venta - valor_total_recibido);
            $('#txremainingprice').trigger('change');
            cont_payment--;
        });

        $('#txremainingprice').on('change', function () {
            var remain = parseInt($('#txremainingprice').val());
            disableval = remain <= 0 ? true : false;
            $('.btnpayments').prop('disabled', disableval);
        });

        $('#createSis').on('click', function () {
            $.ajax({
                url: '/management/pdvi/createSis',
                type: 'get',
                data: {
                    "typedoc": $('#typedoc').val(),
                    "numberdocument": $('#numberdocument').val(),
                    "creditValue": $('#creditValue').val(),
                    "periodtype": $('#periodtype').val(),
                    "numberperiods": $('#numberperiods').val(),
                    // "availableCreditLimit": $('#availableCreditLimit').val(),
                    // "token": token,
                    "claveDinamica": $('#token').val()
                },
                //async: false,
                beforeSend: function (xhr) {
                    $(".loader").removeAttr('hidden');
                },
                success: function (response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        $(".loader").attr('hidden', true);
                        authorization_code.push(xhr.responseJSON.data.creditId);
                        receipt_number.push(xhr.responseJSON.data.creditNumber);
                        $("#msj-error").hide();
                        $('#modalSisteCredit').modal('hide');
                        resetSisteForm();
                        flagSistecredit = true;
                        $('#txvalorpago').val(valor_total_venta);
                        addpayments(valor_total_venta,
                                 SISTECREDITO,
                                 authorization_code,
                                 receipt_number
                                 );
                        //$("#btnaddfp").click();
                        // $("#btfinventa").click();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status === 422) {
                        $(".loader").attr('hidden', true);
                        $.each(xhr.responseJSON.errors, function (index, datas) {
                            $('#msj').html(datas);
                            $('#msj-error').fadeIn();
                        });
                    } else if (xhr.status === 415 || xhr.status === 500) {
                        $(".loader").attr('hidden', true);
                        $('#msj').html(xhr.responseJSON.errors);
                        $('#msj-error').fadeIn();
                    }
                }
            });
        });

        $(".close-fiado").on('click', function () {
            resetSisteForm();
        });

        function resetSisteForm() {
            //El index del pago a quitar
            //var index = $("#detallespago").find("#tbdetallespago input[type=hidden]").last().val();
            $("#typedoc").removeAttr('readonly');
            document.getElementById("typedoc").style.pointerEvents = "auto";
            $("#typedoc").attr('selected', false);
            $("#typedoc").val('00');

            $("#numberdocument").removeAttr('readonly');
            $("#numberdocument").val("");

            $("#periodtype").removeAttr('readonly');
            document.getElementById("periodtype").style.pointerEvents = "auto";
            $("#periodtype").attr('selected', false);
            $("#periodtype").val('00');

            $("#numberperiods").removeAttr('readonly');
            document.getElementById("numberperiods").style.pointerEvents = "auto";
            var $options = $();
            $options = $options.add($("<option>{{ __('Select a number of periods') }}</option>").attr('value', '00' ));
            $('#numberperiods').html($options).trigger('change');
            $("#numberperiods").attr('selected', false);
            $("#numberperiods").val('00');

            $("#token").val("");
            $('#msj-error').hide();
            $('.btn-consultar').show();
            $('.cupo').hide();
            $('.input-row').hide();
            $('.input-totalDownPayment-row').hide();
            $('.input-token-row').hide();
            $('#btnCalculate').hide();
            $('.btn-aproved').hide();
            $('.btn-check').hide();
            $('.alert-token').html("");
            $(".new-token").hide();
            // $("#type_identification_label").show()
            // $("#type_identification_label_disabled").hide()
            $('#modalSisteCredit').on('hidden.bs.modal', function (e) {
                $(this).find("input").val('').end()
            });
        }

        function editClientName(){
            // setTimeout(() =>{
                @if( !empty($oldsale->info_client) )
                    $("#name").val('{{ $oldsale->info_client }}');
                @endif
                $("#name").show();
                $("#lbmensaje").text("")
                $("#headerMessage").text("{{__('Customer Information')}}");
                $("#btnAccept").prop("disabled", false);
                $("#btnAccept").show();
                $("#Notificacion").modal('show');
                $('#btnAccept').click(function () {
                        window.location.href = "{{ url('management/pdvi')}}";
                         });
            // }, 500);
        }

        $("#btguardarventa").on('click', function () {
            cargar_pagos();
            cleanMessageModal();
            $("#name").prop("required", true);

            editClientName();

            if ( $("#name").val().length <= 0 ) {
                $("#btnAccept").prop("disabled", true);
            }

            $("#name").keyup( () => {
                let condition = $("#name").val().length === 1;
                $("#btnAccept").prop("disabled", condition);
            });

            $("#btnAccept").one('click', () => {
                $("#Notificacion").modal('hide');
                // setTimeout(() =>{
                    mId = guardarfactura(GUARDA_VENTA_TEMPO);
                    $nombre = $("#name").val();
                    cleanMessageModal();
                    if (mId != 0) {
                        $("#headerMessage").text('{{__("Sales Information")}}');
                        // // $("#name").hide();
                        // // if ("{{auth()->guard('client')->user()}}") {
                        // //     $("#lbmensaje").text("Tu compra quedó guardada con el número = " + mId);
                        // // } else {
                        // //     $("#lbmensaje").text( $nombre + "==> Se guardó tu venta Temporalmente... ID = " + mId);
                        // // }
                        // if ($nombre != "")
                        //     $("#lbmensaje").text( $nombre + " ==> Se guardó tu venta Temporalmente... ID = " + mId );
                        // else

                        $("#lbmensaje").text('{{ __("The sale was temporarily saved. - ID = ") }}' + mId.id );
                        //Ocultar boton solo mensaje.
                        $("#btnAccept").prop("disabled", false);
                        $("#btnAccept").show();
                        $("#Notificacion").modal('show');
                        // $('#btnAccept').click(function () {
                        // window.location.href = "{{ url('management/pdvi')}}";
                        //  });
                    }
                    cleanClient();
                    cancelarfactura();
                    // $('.cmodal').attr('hidden', true);
                    $('#salepaymentmodal').attr('hidden', true);
                    $('#salepaymentmodal').modal('hide');
                    //Recargar PDVi para nueva venta.
                    // setTimeout(function () {
                    // location.href = URL;
                    // }, 100);
                // }, 500);
            });
        });

        $("#btfinventa").on('click', function () {
            var regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            if (!regex.test($('#emailUser').val().trim())) {
                $("#lbmensaje").text('{{__("Invalid email address")}}');
                $("#Notificacion").modal('show');
                return;
            }
            if (aprox(valor_total_recibido) < aprox(valor_total_venta)) {
                if (countCheck) {
                    $('#btnpayment147').click(); //Es con 92 venta normal 147 venta no presencial
                } else {
                    $('#btnpayment92').click(); //Es con 92 venta normal 147 venta no presencial
                }
                return;
            }

            // if ( ( '{{ auth()->guard("client")->user() }}' || sessionStorage.getItem('data') ) && countCheck ) {
            //         $("#modalDelivery").modal('show');
            //         // resetVirtualValues();
            //         // cancelarfactura();
            //         // $('.cmodal').attr('hidden', true);
            //         // $('#salepaymentmodal').modal('hide');
            // } 

            cargar_pagos();
            if (countCheck) {
                mId = guardarfactura(GUARDA_VENTA_PROCE);
            } else {
                mId = guardarfactura(GUARDA_VENTA_FINAL);
            }

            if (mId != 0) {
                // $("#idfactdownload").val(mId);
                // $("#sendEmail").val($("#emailUser").val());
                // $('form[name="form-download"]').submit();

                //Si existe mercadopago
                if (list_payments.pagos.length > 0) {
                    for (var i = 0; i < list_payments.pagos.length; i++) {
                        if (list_payments.pagos[i].idpago == MERCADO_PAGO) {
                            mercadoPago();
                            break;
                        }
                    }
                }

                //Modal delivery para cliente web
                $('#salepaymentmodal').modal('hide');

                if ( ( '{{ auth()->guard("client")->user() }}' || sessionStorage.getItem('data') ) && countCheck ) {
                    $("#modalDelivery").modal('show');
                    resetVirtualValues();
                    cancelarfactura();
                    // $('.cmodal').attr('hidden', true);
                    // $('#salepaymentmodal').modal('hide');
                } else {
                    // cleanClient();
                    // message('¿Desea imprimir su factura?', true, mId);
                    // $("#btcancelar").trigger("click");
                    cleanClient();
                    cancelarfactura();
                    // $("#btnbuscar").trigger("click");

                    $("#divcategorias").hide();
                    $("#divbuscar").show();

                    $("#category0").empty();
                    $('#name-buscar').val('');
                    $('#name-buscar').focus();

                    // setTimeout(function () {
                    // customModalMessage("Procesando Transacción...");
                    // $('#btnACPT').hide();
                    if (url.split('/').includes('delivered')) {
                        location.href = URL_DELIVERY;
                    } else if (url.split('/').includes('edit')) {
                        location.href = URL;
                    }
                    // }, 100);
                }
                //Lanzar proceso de descarga de PDF para impresion.
            }

            // if (url.split('/').includes('delivered')) {
            //     setTimeout(function () {
            //         // location.href = URL_DELIVERY;
            //     }, 1000);
            // } 
            // else {
            //     // if (editParam != "") {
            //         $('form[name="form-download"]').submit();
            //         customModalMessage("Procesando Transacción...");
            //         setTimeout(function () {
            //             // window.location.href = URL;
            //         }, 6000);
            //     // }
            //     // else{
            //         // customModalMessage("Venta exitosa!!");
            //     // }
            // }

        });

        function closeModalMessages() {
            $('#modalMessages').find('.alert-dismissable').remove();
        }

        // Method to dont copy at input
        function dontCopyPrint(input1, input2) {
            $('#' + input1).on('paste', function (e) {
                e.preventDefault();
                alert("{{__('This action is prohibited.')}}");
            });

            $('#' + input2).on('copy', function (e) {
                e.preventDefault();
                alert("{{__('This action is prohibited.')}}");
            });
        }

        $(".btnopen").on('click', function () {
            $.ajax({
                url: '/management/pdvi/ajax?type=abrirturno',
                type: 'get',
                data: {
                    "idusuario": $("#txidusuario").val(),
                    "estado": $("#sltypeshift").val(),
                    "initialbalance": $("#txsaldocaja").val(),
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);

                    $('#AbrirTurno').modal('hide');
                    if (res.success) {
                        // $('#AbrirTurno').modal('hide');
                        // location.reload(true);
                        $.message('{{_("Turno Abierto correctamente.")}}', "success", true);
                        location.reload();
                    } else {
                        // $.message("Error en la consulta", "error", true);
                        $.message('{{_("No se puede abrir el turno, comunicarse con el Administrador")}}', "error", true);
                        // location.reload(true);
                    }
                }
            });
        });

        function callBackConfirmedPayment() {
            $.ajax({
                url: '/management/pdvi/callBackConfirmedPayment',
                type: 'get',
                data: {
                    "status": CREATED,
                },
                async: false,
                success: function (response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        if (response.status === 200) {
                            clearInterval(myVar);
                            $('#modalMessages').modal('show');
                            $('#modalMessages').find('.modal-body').empty();
                            $('#modalMessages').find('.modal-body').append(xhr.responseJSON.message);
                            $("#btfinventa").click();
                        }
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status === 401) {
                        $('#modalMessages').modal('show');
                        $('#modalMessages').find('.modal-body').empty();
                        $('#modalMessages').find('.modal-body').append(xhr.responseJSON.message);
                    } else if (xhr.status === 500) {
                        clearInterval(myVar);
                        $('#modalMessages').modal('show');
                        $('#modalMessages').find('.modal-body').empty();
                        $('#modalMessages').find('.modal-body').append(xhr.responseJSON.message);
                        $('#emailUser').val('');
                    } else {
                        clearInterval(myVar);
                        $('#modalMessages').modal('hide');
                        $('#modalMessages').modal('show');
                        $('#modalMessages').find('.modal-body').empty();
                        $('#modalMessages').find('.modal-body').append(xhr.responseJSON.message);
                        $('#emailUser').val('');
                    }

                }
            });
        }

        $(".close-siste-modal").on('click', function () {
            $('#emailUser').val('');
        });

        function setEfectivo() {
            contador = 0;
            // txvalorapagar = 0;
            $("#txpagototal").val(valor_total_venta);
            // $("#txvalorpago").val(valor_total_venta);
            // txpagototal = $("#txpagototal").val();
            // txvalorpago = $("#txvalorpago").val();
            $("#payform_name").val(EFECTIVO);
            $("#tbdetallespago").empty();
            pago = 0;
            // $("#
            // do").val('');
            // $('#valor_recibido').attr('readonly', false);
            // $("#valor_cambio").val('0');
            // $("#txidpago").val('0');
            $("#btnaddfp").trigger("click");
        }

        $('#btnCancel').on('click', function () {
            $('#qrCode').find('.qr-code').remove();
            @if(!auth()->guard('client')->user())
            if (!sessionStorage.getItem('data')) {
                $('#emailUser').val('');
            }
            @endif

            clearInterval(myVar);
            //Mercadopago
            $('#btnMercadopago').hide();
            $('#btfinventa').show();
        });
        
        //CIERRE DOCUMENT PASA AL FINAL VERIFICAR FUNCIONAMIENTO
        @if (!empty($oldsale) && !is_null($type))
        alert("venta guardada");
        $('#btpagar').trigger('click');
        @endif

        //Ocultar metodo de pagos si se seleciona venta no presencial
        $('#non_face_to_face_sale').on('click', function () {
            if (validaCliente()) return;
            @if(!auth()->guard('client')->user())
            if (countCheck == 0) {
                countCheck = 1;
                $('#add_buttons').hide();
                $('#add_buttons1').show();
            } else {
                countCheck = 0;
                $('#add_buttons1').hide();
                $('#add_buttons').show();
            }
            @endif

        })

        $("#category0").empty();
        $("#divcategorias").hide();
        $("#divbarcode").hide();
        $("#category0").show();
        $("#divbuscar").show();
        $('#name-buscar').val('');
        $('#name-buscar').focus();
        //$("#btpagar").html(" (" + valor_total_venta.formatMoney(2) + ")");
        $("#btpagar").html(valor_total_venta.formatMoney(2));
        // $("#btnbuscar").trigger('click');
    });

    @include('management.pdviJS.client')
    @include('management.pdviJS.delivery')

    function cancelarfactura() {

        //Eliminar registros de medios de pago
        for (i = 0; i < cont_payment; i++) {
            if ($("#payment" + i).val() != null) {
                $("#payment" + i).remove();
            }
        }
        //Eliminar registros de productos
        $("#detalles").empty();
        
        //Inicializacion contadores
        valor_total_venta = 0;
        valor_total_recibido = 0;
        total_articulos_vendidos = 0;
        cont_items = 0;
        idelemento = 1010;
        cont_payment = 0;
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
        $("#btpagar").html(valor_total_venta.formatMoney(2));
        $("#canttotal").text(total_articulos_vendidos);
        $("#canttotal2").text(total_articulos_vendidos);
        $('.btnpayments').prop('disabled', false);
        $('#fiado').prop('disabled', false);
        $("#name-code").focus();
        contador = 0;
        service = true;
    }

    function deleteItem(idelemento, code) {
        index = elemento.indexOf( idelemento );
        if (index < 0) return;
        cont_items -= 1;
        if(cont_items <= 0){
            $('#fiado').prop('disabled', false);
        }
        valor_total_venta = valor_total_venta - subtotal[index];
        $("#btpagar").html(valor_total_venta.formatMoney(2));
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
    }

    function cancelInterval() {
        clearInterval(myVar);
    }

    function viewComboProduct(comboid, comboname) {
        var token = '{{csrf_token()}}';
        sessionStorage.setItem('comboview', 'true');

        $.ajax({
            url: '/management/pdvi/ajax?type=comboProducts',
            type: 'get',
            data: {
                "idcombo": comboid,
                _token: token
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                $('#comboheader').html('<h5 class="modal-title">' + comboname + '</h5>');
                $('#combosproductsdiv').html(res);
            }
        });
        $("#modalComboProducts").modal('show');
        setTimeout(function () {
            sessionStorage.removeItem('comboview')
        }, 1000);
    }

    $('#typedoc1').on('change', function () {
        if ($('#typedoc1').val() == 6) {
            $('#perjur1').prop('hidden', false);
            $('#digitcheck-name').attr('type', 'number');
            $('#digitcheck-name').attr('maxlength', '1');
            $('#digitcheck-name').attr('required', true);
        } else {
            $('#perjur1').prop('hidden', true);
        }
    });

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

    function handleKeyPress(e){
        var key=e.keyCode || e.which;
        if (key==13){
            searching();
        }
    }

    function incrementa_mismo_producto(mIdelemento, mProduct_id, mIncrease) {
        cleanMessageModal();

        index = elemento.indexOf( mIdelemento );
        if (index < 0) return;

        $inventory_exists = $('#divprod' + mProduct_id).attr('data-inventory');
        if ('{{ $company->inventory_control == 1 }}' || $inventory_exists == 1) {
            $quantity = parseInt($('#divprod' + mProduct_id).attr('data-quantity'));
            $cantidadIn = parseInt($('#cant' + mIdelemento).val());
            //Falta verificar si se vendio mismo producto
            if ($cantidadIn > $quantity ) {
                $("#lbmensaje").text("{{__('Quantities available for sale')}}: " + $quantity);
                $("#Notificacion").modal('show');
                $('#cant' + mIdelemento).val($quantity);
            }
        }

        precio_producto = parsePDV($('#pventa' + mIdelemento).val());
        if (mIncrease == 1) {
            total_articulos_vendidos -= cantidad[index];
        }
        cantidad[index] = parseInt($('#cant'.concat(mIdelemento)).val());

        if ( isNaN(cantidad[index]) ) {
            $('#cant'.concat(mIdelemento)).val(0);
            $("#cant".concat(mIdelemento)).focus();
        } else {
            $('#cant'.concat(mIdelemento)).val(cantidad[index]);
            if (mIncrease == 1) {
                total_articulos_vendidos += cantidad[index];
            }
            subtotal[index] = parsePDV( (cantidad[index] * precio_producto) / mIncrease - descuento );

            //Calcula Valor Total basado en la suma de subtotales y redonbdear al final. 
            valor_total_venta = Calcula_valor_total(subtotal);
            valor_total_venta = parsePDV(valor_total_venta,true);

            $("#" + 'subt'.concat(mIdelemento)).text(subtotal[index].formatMoney(2));
            $("#btpagar").html(valor_total_venta.formatMoney(2));
            $("#canttotal").text(total_articulos_vendidos);
            $("#canttotal2").text(total_articulos_vendidos);

            $('#name-buscar').val('');
            $('#name-buscar').focus();
        }

    }

    function Calcula_valor_total(subtotal) {
        Valor = 0;
        for (i = 0; i < subtotal.length; i++) {
            Valor += subtotal[i];
        }
        return Valor;
    }

    function message(message, yesNotButtons, transaction) {
        $('#btnAccept').removeAttr('data-dismiss');

        cleanMessageModal();

        if (yesNotButtons == true) {
            if (!$('#btnYes').length) {
                $('#Notificacion').find('.modal-footer').append('<button class="btn btn-primary btn-temporal" id="btnYes" onclick="printMessage(true,' + transaction + ')" type="button" data-dismiss="modal" style="width:50%; height: 35px;">{{ __('Yes') }}</button>');
                $('#Notificacion').find('.modal-footer').append('<button class="btn btn-danger btn-temporal" id="btnNo" onclick="printMessage(false, ' + transaction + ')" type="button" data-dismiss="modal" style="width:50%; height: 35px;">{{ __('No') }}</button>');
            }
            $('#Notificacion').find('#btnAccept').prop('hidden', true);
        }

        $("#lbmensaje").text(message);
    }

    function printMessage(print, transaction) {
        $("#Notificacion").modal('hide');
        $('#Notificacion').find('#btnAccept').prop('hidden', false);
        $('#Notificacion').find('#btnYes').remove();
        $('#Notificacion').find('#btnNo').remove();

        if (print == true) {
            openPreview(transaction)
        }
    }

    function openPreview(transaction_id) {
        $("#idfactpreview").val(transaction_id);
        $('form[name="form-preview"]').submit();
    }

    function messagePrice(message, id_articulo) {
        $("#headerMessage").text(message);
        $('#price_new').show();

        $('#Notificacion').find('.modal-footer').append('<button class="btn btn-primary btn-temporal" id="btnUpdate" onclick="updatePrice(true,' + id_articulo + ') "type="button" data-dismiss="modal">{{ __('Update') }}</button>');
        $('#Notificacion').find('.modal-footer').append('<button class="btn btn-danger btn-temporal"  id="btnCancel"  onclick="updatePrice(false)" data-dismiss="modal">{{ __('Cancel') }}</button>');
        $('#Notificacion').find('#btnAccept').prop('hidden', true);

        $('#Notificacion').modal({'show': true, keyboard: false, backdrop: 'static',});
    }

    function updatePrice(update = false, id_articulo = 0) {
        $('#Notificacion').find('#btnAccept').prop('hidden', false);
        $('.btn-temporal').remove();
        $('#Notificacion').modal('hide');

        if (update && id_articulo > 0) {
            var token = '{{csrf_token()}}';
            var new_price = parseInt(stripCharacters($('#price_new').val()));

            $.ajax({
                url: '/management/pdvi/ajax?type=updatePrice',
                type: 'post',
                data: {
                    "id_articulo": id_articulo,
                    "new_price": new_price,
                    _token: token
                },
                success: function (response) {
                    res = JSON.parse(response);
                    $('#price_new').val('');
                    $('#price' + id_articulo).empty();
                    $('#price' + id_articulo).append('$' + new_price);

                    $('#divprod' + id_articulo).attr("data-price", new_price);
                }
            });
        }
    }

    //Function to only allow a pattern
    function check(e, pattern) {
        key = e.keyCode;

        // Validate pattern
        final_key = String.fromCharCode(key);
        return pattern.test(final_key);
    }

    $('#txsaldocaja').keypress(function (e) {
        return check(e, /[0-9]/);
    });

    function openModalChatFiado() {
        $('#modalChat').modal('show');
    }

    function initialChat() {

        let typeDoc = $('#typeDocChat').val();
        let numberDoc = $('#numberDocChat').val();
        let flag = false;

        if (numberDoc == '') {
            alert('el numero de documento es requerido');
            return false;
        } else {
            flag = true;
        }

        var isPRD  = window.location.origin.split('/').includes('des.salespoint');
        console.log("sssssssssss ",isPRD);

        if ( isPRD ) {
            urlsiste= "https://chatindependiente.sistecredito.com/configuraciones/?idRequest=";
        } else { 
            urlsiste= "https://stg-can-ang-front-chatweb.sistecredito.com/configuraciones/?idRequest=";  
        }
        console.log("urlsiste ",urlsiste);

        if (flag) {
            if (window.confirm('Será redirigido a una nueva ventana para solicitar crédito.')) {
                $.ajax({
                    beforeSend: function () {
                        if (cantidad.length != 0) {
                            $("#btguardarventa").click();
                        }
                    },
                    url: '/management/pdvi/initialChat',
                    type: 'get',
                    data: {
                        "IdDocument": numberDoc,
                        "typeDocumentValue": typeDoc,
                    },
                    async: true,
                    success: function (response) {
                        var urlchat = urlsiste + response.data.request._id + "&idStore=" + response.data.request.storeId + "&idUser=webembebed&idVendor=" + response.razon_social;
                        window.open(urlchat, '_blank');
                    }, error: function (xhr, ajaxOptions, thrownError) {
                        $('#modalMessages1').modal('show');
                        $('#modalMessages1').find('.modal-body').empty();
                        $('#modalMessages1').find('.modal-body').append(xhr.responseJSON.message);
                    }
                });
            }
        }
        
    }

    function stripCharacters(str) {
        str = str.replace("$", '');
        str = str.replace(/,/g, '');
        return str;
    }

    function confirmSaleOut() {
        $('#btnAddEfectivo').trigger('click');
        $('#modalConfirmSaleOut').modal('hide');
    }

    function messageDelivery(company_name, sale_id) {
        cleanMessageModal();

        $("#headerMessage").text('{{__("Your order is the number ")}}' + sale_id);

        $("#lbmensaje").text('{{__("The store * ")}}');
        $("#lbmensaje").append(company_name);

        $("#lbmensaje").append('{{__(" * received your order number ")}}');
        $("#lbmensaje").append(sale_id);
        $("#lbmensaje").append('.');
        $("#lbmensaje").append('<br>');
        $("#lbmensaje").append('{{__("You will receive an email with the invoice of your sale.")}}' );
        $("#lbmensaje").append('<br>');
        $("#lbmensaje").append('<br>');
        $("#lbmensaje").append('{{__("¡Thanks for choosing us!")}}');
        $('#btnAccept').click(function () {
                        window.location.href = "{{ url('management/pdvi')}}";
                         });
    }

    function cleanMessageModal() {
        $("#headerMessage").text(' ');
        $("#lbmensaje").text(' ');
        $('#price').remove();
        $('#name').hide();
        $('#name').val(' ');
        $("#name").keyup();

        $('.btn-temporal').remove();
        $('#Notificacion').find('#btnAccept').prop('hidden', false);
        $("#btnAccept").on('click', function () {
            $("#Notificacion").modal('hide');
            // cleanClient();
            // cancelarfactura();

            $("#divcategorias").hide();
            $("#divbuscar").show();

            $("#category0").empty();
            $('#name-buscar').val('');
            $('#name-buscar').focus();

        })
    }

    function customModalMessage(message) {
        $('#modalMessages').modal('show');
        $('#modalMessages').find('.modal-body').empty();
        $('#modalMessages').find('.modal-body').append(message);
    }

    function customModalConfirmSaleOut(message) {
        $('#modalConfirmSaleOut').modal('show');
        $('#modalConfirmSaleOut').find('.modal-body').empty();
        $('#modalConfirmSaleOut').find('.modal-body').append(message);
    }

    function resetVirtualValues(){
        $( "#non_face_to_face_sale" ).prop( "checked", false );
        $('#add_buttons').show();
        countCheck = 0;
    }

    function validaCliente(){
        if($("#client_name").val() == "default") {
            customModalMessage("{{__('It is necessary to add or register the customer for this sale.')}}");
            $('#salepaymentmodal').modal('hide');
            resetVirtualValues();
            return true;
        } else {
            return false;
        }
    }

    function validaClienteSIS(){
        // //buscar cliente y determinar tipo de docuento
        // //Solo cedula ciudadania y cedula extranjeria
        // $typdoc = Client::
        // if($("#client_name").val() != '5' && $("#client_name").val() != '8') {
        //     customModalMessage("{{__('It is necessary to add or register the customer with type documento correct.')}}");
        //     $('#salepaymentmodal').modal('hide');
        //     resetVirtualValues();
        //     return true;
        // } else {
            return false;
        // }
    }

    function parsePDV($value, $sw = false) {
        if (!$sw) return $value;
        console.log("Valor a calcula ",$value,$sw);
        $value = $value/100;
        $dec = ($value - parseInt($value));
        $int = $value - $dec;
        if ($dec > 0 ) {
            if ($dec <= 0.49)
                $int = $int + 0.5;
            else
                $int = $int + 1;
        }
        $value = $int * 100;
        console.log("Valor procesado ",$value);
        return $value;
    }

</script>
