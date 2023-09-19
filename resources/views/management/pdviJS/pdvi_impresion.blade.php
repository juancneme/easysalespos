<script>
    function leer_info_ticket($id){
        //console.log("llego a leer info ticket");

        var datafull = '';
        var token = '{{csrf_token()}}';
        //console.log("ajax leer info ticket");
        $.ajax({
            url: '/management/pdvi/ajax?type=leer_info_ticket',
            type: 'get',
            data: {
                "id": $id,
                _token: token
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                if ( res.success) {
                    //console.log("regreso TRUE de guardar venta");
                    respuesta = res.data.data;
                    //console.log("respuesta ",respuesta);
                } else {
                    //console.log("regreso FALSE de guardar venta");
                    alert("No hay data disponible");
                }
                // //console.log("objj ",res);
            }
        });
        datafull = respuesta;
        // datafull = datafull.replace(/&quot;/g, '"');
        //console.log("llego despues de ajax leer info  ");
        print_invoice(datafull, $id, false);
        // if ( $mPrinter != '' ) print_invoice(datafull, datafull.id);
        //console.log("llego despues de ajax print invoice");
    }

    //Esta rutina esta duplicada en pdvicontroller hya que unificar
    function print_invoice(datafull, $id, $sw = true) {
        //console.log("Entro en print invoice => ",datafull,$id);
        // if ($id > 0) {
            var token = '{{csrf_token()}}';
            //console.log("ajax print invoice");
            if ( $sw ) datafull = JSON.stringify(datafull);
            $.ajax({
                url: 'http://ticket.pdv/index.php?data='+datafull,
                type: 'post'
            });
        // }
    }

    function tirilla_turno($id){
        //console.log("llego a leer info ticket");
        var datafull = '';
        var token = '{{csrf_token()}}';
        //console.log("ajax leer info ticket");
        respuesta = null;
        $.ajax({
            url: '/management/viewshifts/ajax?type=data_tirilla_turno',
            type: 'get',
            data: {
                "id": $id,
                _token: token
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                if ( res.success) {
                    //console.log("Regreso TRUE de guardar venta ",res);
                    respuesta = res.data;
                    //console.log("Respuesta ",respuesta);
                } else {
                    //console.log("Regreso FALSE de guardar venta");
                    alert("No hay data disponible");
                    //llamar moduklo de viewshifts
                }
                // //console.log("objj ",res);
            }
        });
        datafull =  respuesta;
        //console.log(datafull);
        datafull = datafull.replace(/&quot;/g, '"');
        //console.log(datafull);
        // datafull = datafull.replace(/&quot;/g, '"');
        //console.log("llego despues de ajax leer info  ",datafull);
        $dat = JSON.parse(datafull);
        //console.log("dat-> ",$dat);
        //console.log("dat.data ",$dat.turno.shiftdate);
        //console.log("dat.data ",$dat.turno.user_id);
        //console.log("dat.data ",$dat.turno.esAdmin);
        
        //console.log("****************************************");

        if (!$dat.turno.esAdmin)
            print_tirilla_turno(datafull, $id, false);
        else
            print_tirilla_tienda(datafull, $id, false);
        // if ( $mPrinter != '' ) print_invoice(datafull, datafull.id);
        //console.log("llego despues de ajax print invoice");
    }

    function print_tirilla_turno(datafull, $id, $sw = true) {
        //console.log("==============================================");
        //console.log("Entro en print invoice turno => ");
        //console.log($id, datafull);
        // if ($id > 0) {
            var token = '{{csrf_token()}}';
            // datafull = JSON.stringify(datafull);
            //console.log("ajax print invoice");
            //if ( $sw ) datafull = JSON.stringify(datafull);
            //console.log("json > ",datafull);
            $.ajax({
                url: 'http://ticket.pdv/tirTurno.php?data='+datafull,
                type: 'post'
            });
        // }
    }

    function print_tirilla_tienda(datafull, $id, $sw = true) {
        //console.log("==============================================");
        //console.log("Entro en print invoice tienda => ");
        //console.log($id, datafull);
        // if ($id > 0) {
            var token = '{{csrf_token()}}';
            // datafull = JSON.stringify(datafull);
            //console.log("ajax print invoice");
            //if ( $sw ) datafull = JSON.stringify(datafull);
            //console.log("json > ",datafull);
            $.ajax({
                url: 'http://ticket.pdv/tirTienda.php?data='+datafull,
                type: 'post'
            });
        // }
    }

</script>
