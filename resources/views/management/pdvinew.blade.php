<?php $page_title = __('PDVi') ?>
@extends('pike_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<div>
    <div style="height: 5px"></div>
    <div class="row">
        <div class="col-md-7">
            <div id="txbuscar">
                <table class="col-md-12">
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="name" id="name-buscar" class="form-control" style="with: 80px;height: 60px">
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button onclick="buscararticulos()"><img src="/pike_template/assets/images/buscar.png" alt="slide" style="with: 25px;height: 25px"></button>
                            </td>
                            <td>
                                <button id="btregresar"><img src="/pike_template/assets/images/x-circulo.jpg" alt="slide" style="with: 25px;height: 25px"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="imagenes" class="card mb-2"  >
                <div class="card-body"  style="font-size: 0px;line-height: 0.6;font-weight: 100;">

                    <div class="owl-2 owl-carousel owl-theme" >
                    <div class="item" style="width: 100px; margin-right: 5px"><img onclick="panelbuscar()" src="/pike_template/assets/images/buscar.png" alt="slide" title="{{__('Search Product')}}" style="height: 100px" ></div>
                        @foreach ($images as $Image)
                    <div class="item" style="width: 100px; margin-right: 5px"><img id="{{ $Image->id }}" onclick="seleccionarcategoria(this.id)" src="<?= !empty($Image) ? $Image->image : '' ?>" title="{{$Image->name}}" style="height: 100px" class="img-fluid" alt="responsive image" ></div>
                        @endforeach

                    </div>

                </div>														
            </div><!-- end card-->	
            
            <table class="table table-responsive table-striped table-border table-condensed table-hover" style="max-height: 550px">
                <tbody id="tbarticulos">
                    
                </tbody>
            </table>
      
        </div>
        
        <div class="col-md-5">
            <table id="detalles" class="table table-responsive table-striped table-border table-condensed table-hover" style="max-height: 450px; ">
                <thead style="background-color:#A9D0F5">
                    <th style="width: 190px">Artículo</th>
                    <th>Cant.</th>
                    <th hidden="hidden">V. Unitario</th>
                    <th>Valor</th>
                    <th>Opc.</th>
                    <th></th>
                </thead>
                <tbody id="tbdetalles" style="overflow-y: scroll;">

                </tbody>
            </table>
            <div>
                <table class="table table-responsive table-striped table-border table-condensed table-hover">
                    <tfoot style="display: none;">
                        <th style="width: 300px"></th>
                        <th></th>
                        <th>Total</th>
                        <th style="width: 160px" id="total">$ 0.00<input type="hidden" name="total_venta" id="total_venta"></th>
                    </tfoot>
                       <tfoot>
                        <th style="width: 300px">Total Articulos</th>
                        <th id="canttotal">0</th>
                        <th style="display: none;">Subtotal</th>
                        <th style="width: 160px; display: none;" id="subtotal">$ 0.00<input type="hidden" name="subtotal" id="subtotal"></th>
                    </tfoot>
                    <tfoot style="display: none;">
                        <th style="width: 300px"></th>
                        <th></th>
                        <th>Iva</th>
                        <th style="width: 160px" id="iva">$ 0.00<input type="hidden" name="total_iva" id="total_iva"></th>
                    </tfoot>
                </table>
            </div>

            <div>
               

            <div class="container">
                <div class="row" >
                    <div class="col">
                        <a href="#CancelarVenta"  role="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal">{{__('Cancel Sale')}}</a>
                    </div>
                    <div class="col">
                    <button class="btn btn-success btn-lg btn-block" onclick="guardarfactura()" id="btpagar">{{__('Pay')}}</button>
                    </div>
                </div>

            </div>
          
            {{-- modal para cancelar venta --}}
               <!-- Modal / Ventana / Overlay en HTML -->
               <div id="CancelarVenta" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>{{__('Cancel Sale')}}</p>
                                <p class="text-warning"><small>
                                    {{__('Are you sure to cancel this sale?')}}</small></p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                                <button class="btn btn-danger btn-lg " id="btcancelar" data-dismiss="modal">{{__('Accept')}}</button>
                                </div>
                            </div>
                        </div>
                    </div> 
        </div>
    </div>
   
</div>

    <script>
        
        var cont=0;
        total=0;
        canttotal=0;
        iva=0;
        subt=0;
        items= 0;
        subtotal=[];
        $("#txbuscar").hide();
        
        function seleccionarcategoria(id){
            //console.log(id);
            $("#tbarticulos").empty();               
            $.ajax({
                 url: '/management/pdvi/ajax?type=articulos',
                 type: 'get',
                 data: {
                     "id": id
                 },
                 async: false,
                 success: function (response) {
                     res = JSON.parse(response);
                     //console.log(res.data);
                     if(res.success){
                         var cont = 1;
                         var fila = 1;
                         $.each(res.data, function (i, e) {
                             if (cont == 1){
                                 $("#tbarticulos").append('<tr id="Fila' + fila + '"></tr>');

                                 $("#Fila" + fila).append('<td><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 110px; width: 110px;"></td>');  
                                 cont = cont + 1;
                             }else{
                                 $("#Fila" + fila).append('<td><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 110px; width: 110px;"></td>');
                                 cont = cont + 1;
                             };
                             if (cont == 5){
                                 cont = 1;
                                 fila = fila + 1;
                             };
                         });  
                     }
                     else {
                         $.message("Error en la consulta", "error", true);
                     }
                 }
             });
        
        };
        
        var json = "";       
        if (canttotal == 0){
          var list = {
            'datos' :[]
          }; 
        };
        
        function agregaritem(id){
            
            datosArticulo=id.split(";");
            idarticulo=datosArticulo[0];
            articulo=datosArticulo[1];
            cantidad=1;
            descuento=0;
            precio_venta=datosArticulo[2];
            subtotal[cont]=(cantidad*precio_venta-descuento);
            total=total+subtotal[cont];
            factor=parseFloat(1 + (datosArticulo[3]/100));
            ivaunitario=Math.round(precio_venta-(precio_venta/factor),0);
            iva=Math.round(total-(total/factor),0);
            subt=Math.round((total/factor),0);
            var fila='<tr class="selected" id="fila' + cont + '"><td style="width: 190px"><input id="IdArticulo' + cont + '" type="hidden" name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td><td><input id="cant' + cont + '" onchange="calcularvalor(' + cont + ',this.value)" type="number" name="cantidad[]" value="' + cantidad + '" text="' + cantidad + '" style="width: 50px"></td><td hidden="hidden"><input id="precio' + cont + '" type="number" name="precio_venta[]" value="' + precio_venta + '" disabled="disabled" style="width: 80px"></td><td style="width: 100px" id="subt' + cont + '">' + subtotal[cont] + '</td><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ')">X</button></td><td><input id="ivaunitario' + cont + '" type="hidden" value="' + ivaunitario + '"></td></tr>'        
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
        
         function calcularvalor(cont, cant){
             if($.isNumeric(cant)){
                 if (cant > 0){
                    $("#subt" + cont).text($("#precio" + cont).val() * cant);
                    total=total-subtotal[cont];
                    subtotal[cont]=(cant*$("#precio" + cont).val());
                    total=total+subtotal[cont];
                    factor=parseFloat(1 + (datosArticulo[3]/100));
                    iva=Math.round(total-(total/factor),0);
                    subt=Math.round((total/factor),0);
                    ivaunitario=Math.round(parseInt($("#subt" + cont).text())-(parseInt($("#subt" + cont).text())/factor),0);

                    $("#total").html("$ " + total);
                    $("#total_venta").val(total);
                    $("#btpagar").html("$ " + total);
                    $("#iva").html("$ " + iva);
                    $("#total_iva").val(iva);
                    $("#subtotal").html("$ " + subt);
                    $("#subtotal").val(subt);
                    $("#ivaunitario" + cont).val(ivaunitario);
                    if ($("#cant" + cont).text() == ''){
                        anterior = 1;
                    }else{
                        anterior = parseInt($("#cant" + cont).text());
                    };
           
                    if(anterior < cant){
                        canttotal = (canttotal) + (cant - anterior);
                    }else{
                        canttotal = (canttotal) - (anterior - cant);
                    };
                    $("#cant" + cont).text(cant);
                    $("#canttotal").text(canttotal);
                }else{
                    $("#cant" + cont).val(1);
                }; 
             }else{
                 $("#cant" + cont).val(1);
             };
         };
         
        function eliminar(index){
            total=total-subtotal[index];
            $("#total").html("$ "+total);
            $("#btpagar").html("$ " + total);
            $("#total_venta").val(total);
            iva=Math.round(total-(total/1.19),0);
            subt=Math.round((total/1.19),0);
            $("#iva").html("$ " + iva);
            $("#total_iva").val(iva);
            $("#subtotal").html("$ " + subt);
            $("#subtotal").val(subt);
            canttotal = canttotal - $("#cant" + index).val();
            $("#canttotal").text(canttotal);
            $("#fila" + index).remove();
            items--;
        };
        
        function panelbuscar(){
            $("#imagenes").hide();
            $("#txbuscar").show();
            $("#txbuscar").val();
        };
        
        function buscararticulos(){
            
            $("#tbarticulos").empty();
            $.ajax({
                url: '/management/pdvi/ajax?type=buscararticulos',
                type: 'get',
                 data: {
                        "query": $("#name-buscar").val()
                    },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);
                   
                    if(res.success){
                        var cont = 1;
                        var fila = 1;
                        if(res.data.length == 0){
                            $("#tbarticulos").append('<tr id="Fila' + fila + '"></tr>');
                            $("#Fila" + fila).append('<td style="width: 600px" id="consultaVacia"><div class="card card-body">{{__('No Products Found')}}</div></td>');
                        }
                        
                        $.each(res.data, function (i, e) {
                            if (cont == 1){
                                $("#tbarticulos").append('<tr id="Fila' + fila + '"></tr>');
                                $("#Fila" + fila).append('<td style="width: 120px"><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 120px; width: 120px;"></td>');  
                                cont = cont + 1;
                            }else{
                                $("#Fila" + fila).append('<td style="width: 120px"><label style="font-size: small">' + e.name.substring(0, 10) + '</label><br><label style="font-size: small">$' + e.saleprice + '</label><p><image id="' + e.id + ';' + e.name.substring(0, 10) + ';' + e.saleprice + ';' + e.tax + '" onclick="agregaritem(this.id)" src="' + e.image + '" style="height: 120px; width: 120px;"></td>');
                                cont = cont + 1;
                            };
                            if (cont == 5){
                                cont = 1;
                                fila = fila + 1;
                            };

                            
                        });  
                    }else {
                        $.message("Error en la consulta", "error", true);
                    }
                }
            });

        };
        
        function cancelarfactura(){
            $("#tbdetalles").empty();
             total=0;
             $("#btpagar").html("$ " + total);
             $("#total").html("$ 0.00");
             $("#total_venta").val(total);
             iva=0;
             subt=0;
             $("#iva").html("$ 0.00");
             $("#total_iva").val(iva);
             $("#subtotal").html("$ 0.00");
             $("#subtotal").val(subt);
             canttotal=0;
             $("#canttotal").text(canttotal);
             items=0; 
         };
         
        function guardarfactura(){
      
            list = {
              'datos' :[]
            }; 
                 
            if (cont > 0){
                
                for (i = 0; i < cont; i++) {
                    
                    if ($("#IdArticulo" + i).val() != null){
                    
                        list.datos.push({
                            "idarticulo":$("#IdArticulo" + i).val(),
                            "cantidad":$("#cant" + i).val(),
                            "precio_venta":$("#precio" + i).val(),
                            "valor_iva":Math.round($("#ivaunitario" + i).val(),0),
                            "precio_total":$("#subt" + i).text()
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
                    success: function (response) {
                        res = JSON.parse(response);
                        //console.log(res.data);
                        if(res.success){
                            cancelarfactura();
                            $.message("Factura Pagada Correctamente", "success", true);
                        }else {
                            $.message("Error en la consulta", "error", true);
                        }
                    }
                });
                
            };
            
        };
        
        $(document).ready(function () {
            $('.owl-1').owlCarousel({
                loop: true,
                margin: 10,
                loop: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });
            
            $('.owl-2').owlCarousel({
                items:3,
                lazyLoad:true,
                loop:false,
                margin:5,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    400: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });

            $('.owl-3').owlCarousel({
                items:1,
                merge:true,
                loop:true,
                margin:10,
                video:true,
                lazyLoad:true,
                center:true,
                responsive:{
                    480:{
                        items:2
                    },
                    600:{
                        items:4
                    }
                }
            });
            
            $("#btregresar").click(function () {
                $("#imagenes").show();
                $("#txbuscar").hide();
                $("#txbuscar").val();
                $("#consultaVacia").hide();
                $('#name-buscar').val('');
            });
            
            $("#btcancelar").click(function () {
                cancelarfactura();
            });
        
        });
    </script>		
    <!-- END Java Script for this page -->

</body>

@endsection