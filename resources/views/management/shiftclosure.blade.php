<?php $page_title = __('Shift Closure') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal"
          style="padding-right: 15px;padding-left: 15px">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

    </form>
    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Sales') }}
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('CAAA INGRESADOS') }}</label>
            <label for="status" class="col-sm-2 col-form-label"
                   style="text-align: center;">{{ __('VALORES INGRESADOS') }}</label>
            <label for="status" id="mountsSistem" class="col-sm-1 col-form-label"
                   style="display: none;text-align: center;">{{ __('MONTOS DEL SISTEMA') }}</label>
            <label for="status" id="valores" class="col-sm-3 col-form-label"
                   style="display: none;text-align: center;">{{ __('VALORES DEL SISTEMA') }}</label>
            <label id="diferencias" class="col-sm-3 col-form-label"
                   style="display: none;text-align: center;">{{ __('DIFERENCIAS') }}</label>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">{{ __('TOTAL DE ESTA CAJA') }}</label>
            <div class="col-sm-3">
                <input type="text" style="text-align: end;" id="total_amount" name="total_amount" readonly
                       class="form-control" value="0">
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">
                <input type="text" id="total_amount_sistem" name="total_amount_sistem"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="diff_total_amount" name="diff_total_amount"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">{{ __('EFECTIVO ') }}</label>
            <div class="col-sm-3">
                <input type="text" id="efectivo" style="text-align: end;" name="efectivo" readonly class="form-control"
                       value="0">
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">
                <input type="text" id="efectivo_sistem" name="efectivo_sistem" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="difEfectivo" name="difEfectivo" style="display: none;text-align: end;" readonly
                       class="form-control" value="0">
            </div>
        </div>

        <!--Data table-->
        <div id="table" class="panel-body">
            <table class="table table-striped table-en task-table">
            </table>
        </div>


        <!-- Montos ingresados por tareta credito debito y Mercado pago-->
        <div class="form-group row">
            <label for="status" class="col-sm-1 col-form-label">{{ __('TARJETA CREDITO ') }}</label>
            <div class="col-sm-1">
                <input type="number" id="credito_mount" name="credito_mount" class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="number" id="credito_val" name="credito_val" class="form-control" value="0">
            </div>
            <div class="col-sm-1">
                <input type="number" id="credito_mount_sistem" name="credito_mount_sistem"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="credito_sistem" name="credito_sistem" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="difTarjetaCredito" name="difTarjetaCredito"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-1 col-form-label">{{ __('TARJETA DEBITO ') }}</label>
            <div class="col-sm-1">
                <input type="number" id="debito_mount" name="debito_mount" class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="number" id="debito_val" name="debito_val" class="form-control" value="0">
            </div>
            <div class="col-sm-1">
                <input type="number" id="debito_mount_sistem" name="debito_mount_sistem"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="debito_sistem" name="debito_sistem" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="difTarjetaDebito" name="difTarjetaDebito" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-1 col-form-label">{{ __('MERCADO PAGO') }}</label>
            <div class="col-sm-1">
                <input type="number" id="mercado_mount" name="mercado_mount" class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="number" id="mercado_val" name="mercado_val" class="form-control" value="0">
            </div>
            <div class="col-sm-1">
                <input type="number" id="mercado_mount_sistem" name="mercado_mount_sistem"
                       style="display: none;text-align: end;" readonly class="form-control" value="0">
            </div>
            <div class="col-sm-3">
                <input type="text" id="mercado_sistem" name="mercado_sistem" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>

            <div class="col-sm-3">
                <input type="text" id="difMercadoPago" name="difMercadoPago" style="display: none;text-align: end;"
                       readonly class="form-control" value="0">
            </div>
        </div>
        <!-- Table close turn -->
        <div id="table_turn" class="panel-body">
            <table class="table table-striped table-en turn-table">
            </table>
        </div>

        <div class="col-sm-6">
            <button type="button" id="btn-return" class="btn btn-primary btn-primary" style="display: none"
                    data-placement="top" data-toggle="tooltip"
                    title="{{ __('Regresar') }}">{{ __('Regresar') }}
            </button>
            <button type="button" id="btn-send" class="btn btn-primary btn-primary" data-placement="top"
                    data-toggle="tooltip"
                    title="{{ __('Listo') }}">{{ __('Listo') }}
            </button>
            {{--            <button type="button" id="btn-close-turn" class="btn btn-primary btn-danger" data-placement="top"--}}
            {{--                    data-toggle="tooltip"--}}
            {{--                    title="{{ __('Cerrar turno') }}">{{ __('Cerrar turno') }}--}}
            {{--            </button>--}}
            <button type="button" id="btn-ajust" class="btn btn-primary btn-info" disabled data-placement="top"
                    style="display: none" data-toggle="tooltip"
                    title="{{ __('Ajuste') }}">{{ __('Ajuste') }}
            </button>
            <button type="button" id="btn-confirm-ajust" class="btn btn-primary btn-info" disabled
                    data-placement="top" style="display: none" data-toggle="tooltip"
                    title="{{ __('Ajuste Completo') }}">{{ __('Ajuste Completo') }}
            </button>
            <button type="button" id="btn-consolidar" class="btn btn-primary btn-primary" disabled data-placement="top"
                    data-toggle="tooltip"
                    title="{{ __('Consolidar') }}">{{ __('Consolidar') }}
            </button>
            <button type="button" id="btn-close" class="btn btn-primary btn-danger" disabled data-placement="top"
                    style="display: none" data-toggle="tooltip"
                    title="{{ __('Cierre') }}">{{ __('Cierre') }}
            </button>
        </div>
    </div>
    </div>
    <script>
        credito = 0;
        debito = 0;
        total_caja = 0;
        total_efectivo = 0;
        mercado_pago = 0;
        recordType = null;
        totalDebitoS = 0;
        totalCreditoS = 0;

        jQuery(document).ready(function ($) {
            @if($closeTurn->typeshift_id == 15 )
                $(window).load(function () {
                    $('#table').hide();
                    $('#btn-close').prop('disabled',false);
                    $('#btn-close').click();
                    $('#btn-consolidar').click();
                });
            @endif
            @if($sales > 0)
            confirm('tiene ventas en estado pendiente')

            window.location.href = "{{ url('management/sales')}}";
            return false;
            @endif
            if ("{{ isset($existClousure )   && $existClousure >1}}") {
                $('#debito_val').prop('readonly', true);
                $('#credito_val').prop('readonly', true);
                $('#mercado_val').prop('readonly', true);
                $('#btn-consolidar').hide();
                $('#btn-send').hide();
                $('#table').hide();
                $("#table_turn").show();
            }

            @if($shiftid->typeshift_id != 14)
            if (window.location.href.includes('closeTurn')) {
                alert('El turno no se puede bloquear');

                @if($shiftid->typeshift_id == 15 )
                    window.location.href = "{{ url('management/pdvi')}}";
                @elseif($shiftid->typeshift_id == 12)
                    window.location.href = "{{ url('management/balancesheet')}}";
                @endif
            }
            @endif

                id = 0;
            $(".task-table").DataTable({
                'serverSide': true,
                'ajax': '/' + $("#url").val() + '/viewlist',
                'processing': false,
                'stateSave': false,
                paging: false,
                columns: [
                    {data: 'id', name: 'id', title: "{{ __('ID') }}", "visible": false},
                    {data: 'name', name: 'name', title: "{{ __('name') }}"},
                    {data: 'quantity', name: 'quantity', title: "{{ __('quantity') }}"},
                    {data: 'amount_payment', name: 'amount_payment', title: "{{ __('amount_payment') }}"},
                ],
                "order": [[0, "asc"]]
            });



            @if(isset($clousureBase))
            if ("{{ intval($clousureBase) > 0 }}") {
                $.ajax({
                    url: "/" + $("#url").val() + "/ajax?type=getClousureBase",
                    type: 'get',
                    success: function (response) {
                        console.log(response);
                        $('#btn-send').hide();
                        $('#table').hide();
                        $('#btn-ajust').show()
                        $("#table_turn").show();
                        $('#btn-consolidar').show();
                        $('#btn-consolidar').show();
                        $('#btn-close').show();
                        $('#btn-ajust').prop('disabled', false);
                        $('#btn-close').prop('disabled', false);
                        displayLabels();
                        response.base.forEach((e) => {
                            switch (e.medium_payment_type) {
                                case 93:
                                    debito = e.input_value;
                                    totalDebitoS =e.system_value;
                                    $('#credito_val').val(e.input_value);
                                    $('#credito_mount').val(e.input_quantity);
                                    $('#credito_sistem').val(e.system_value.formatMoney(2));
                                    $('#credito_mount_sistem').val(e.system_quantity);
                                    $('#difTarjetaCredito').val(e.system_quantity);
                                    let difCredito = Number($('#credito_val').val().replace(/[^0-9.-]+/g, "")) - Number($('#credito_sistem').val().replace(/[^0-9.-]+/g, ""))
                                    $('#difTarjetaCredito').val(difCredito.formatMoney(2));
                                    break;
                                case 94:
                                    credito = e.input_value;
                                    totalCreditoS = e.system_value;
                                    $('#debito_val').val(e.input_value);
                                    $('#debito_mount').val(e.input_quantity);
                                    $('#debito_sistem').val(e.system_value.formatMoney(2));
                                    $('#debito_mount_sistem').val(e.system_quantity);
                                    let difDebito = Number($('#debito_val').val().replace(/[^0-9.-]+/g, "")) - Number($('#debito_sistem').val().replace(/[^0-9.-]+/g, ""))
                                    $('#difTarjetaDebito').val(difDebito.formatMoney(2));
                                    break;
                                case 92:
                                    total_efectivo = e.input_value;
                                    totalSystem = e.system_value;
                                    $('#efectivo').val(e.input_value.formatMoney(2));
                                    $('#efectivo_sistem').val(e.system_value.formatMoney(2));
                                    let difEfectivo = Number($('#efectivo').val().replace(/[^0-9.-]+/g, "")) - Number($('#efectivo_sistem').val().replace(/[^0-9.-]+/g, ""))
                                    $('#difEfectivo').val(difEfectivo.formatMoney(2));
                                    break;

                            }

                        });
                        resolve();

                    async    function resolve(){
                            for (const e of response.detail) {
                                let index = response.detail.indexOf(e);
                             await   $('#quantity' + response.denominations[index].id).val(e.amount);
                                $('#amount_payment' + response.denominations[index].id).val(response.denominations[index].code * e.amount);
                            }
                    }


                        let totalAmount = Number(debito) + Number(credito) + Number(total_efectivo);
                        let totalSystemV = Number(totalDebitoS) + Number(totalCreditoS) + Number(totalSystem);
                        let totalDiff = totalAmount - totalSystemV;
                        total_caja = totalAmount;
                        $('#total_amount').val(totalAmount.formatMoney(2));
                        $('#total_amount_sistem').val(totalSystemV.formatMoney(2));
                        $('#diff_total_amount').val(totalDiff.formatMoney(2));
                        validateMounts();
                        validateValues();
                    }
                });
            }

            @endif

                    {{--            @if($shiftid->typeshift_id != 14)--}}
                    {{--                    alert('El turno no se puede bloquear');--}}
                    {{--                    window.history.back();--}}
                    {{--            @endif--}}

                id = 0;

            $('.task-table').on('click', 'tr ', function () {
                var table = $('.task-table').DataTable();
                id = table.row($(this)).data().id;
                var token = '{{csrf_token()}}';

                $(document).on("keyup", "#quantity" + id, function () {
                    $(this).data("denomination_quantity", $('#quantity' + id).val())
                    var miData = {
                        id: id,
                        quantity: $('#quantity' + id).val(),
                        _token: token
                    };
                    $.ajax({
                        url: "/" + $("#url").val() + "/ajax?type=edit",
                        type: 'post',
                        data: miData,
                        success: function (response) {
                            number = Number(response);
                            total_efectivo -= Number($('#amount_payment' + id).val());
                            if (Math.sign(total_efectivo) === -1) total_efectivo = 0;
                            total_efectivo += number;
                            response == '' ? $('#amount_payment' + id).val('0') : $('#amount_payment' + id).val(number);
                            $('#efectivo').val(total_efectivo.formatMoney(2));
                            total_caja = total_efectivo + credito + debito + mercado_pago;
                            $('#total_amount').val(total_caja.formatMoney(2));
                        }
                    });
                })
            });

            /**
             * Cerrar Turno
             *
             **/

            $('#btn-close-turn').on('click', function () {
                $.ajax({
                    url: "/" + $("#url").val() + "/ajax?type=closeTurn",
                    type: 'get',
                    success: function (response) {
                        if (response) {
                            $('#btn-send').show();
                            $('#btn-close-turn').hide();
                            alert(response);
                        } else {
                            alert('Error al cerrar el turno')
                        }

                    }
                });
            });

            @if($shiftid->typeshift_id == 14)
            if ("{{ !$confirmClosure }}") {
                confirm('Favor bloquear la caja antes de poder hacer el cierre')
                window.history.back();
            } else {
                if (window.location.href.includes('closeTurn')) {
                    if (confirm('¿Desea bloquear la caja?')) {
                        if ("{{ isset($confirmModal) }}") {
                            $.ajax({
                                url: "/" + $("#url").val() + "/ajax?type=closeTurn",
                                type: 'get',
                                success: function (response) {
                                    if (response) {
                                        $('#btn-send').show();
                                        $('#btn-close-turn').hide();
                                        alert(response);
                                    } else {
                                        console.log('Error al cerrar el turno')
                                    }
                                }
                            });
                            confirm('Turno bloqueado Correctamente')
                        }
                    } else {
                        window.location.href = "{{ url('management/pdvi')}}";
                        return false;
                    }
                }
            }
            @endif

            $('#btn-consolidar').on('click', function () {
                let table = $('.task-table').DataTable();
                let arrayDataRows = []
                //Iteramos las filas del datatable para extraer laa info e insertamos la cantidad en la columna quantity
                table.rows().every(function (i) {
                    arrayDataRows.push(this.data());
                    arrayDataRows[i].quantity = $('#quantity' + this.data().id).val()
                });
                var token = '{{csrf_token()}}';
                let data = {
                    total_caja: total_efectivo + credito + debito + mercado_pago,
                    debito: debito != 0 ? debito : null,
                    credito: credito != 0 ? credito : null,
                    mercado_pago: mercado_pago != 0 ? mercado_pago : null,
                    total_efectivo: total_efectivo != 0 ? total_efectivo : null,
                    debito_mount: $('#debito_mount').val(),
                    credito_mount: $('#credito_mount').val(),
                    mercado_mount: $('#mercado_mount').val(),
                    recordType: recordType,
                    denominations: arrayDataRows,
                    _token: token
                };
                $.ajax({
                    url: "/" + $("#url").val() + "/ajax?type=compareBalance",
                    type: 'post',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        if (response != 'false') {
                            @if($closeTurn->typeshift_id == 15)
                                $('#btn-send').hide();
                                $('#btn-close').hide();
                                $('#credito_mount').prop('disabled',true);
                                $('#debito_mount').prop('disabled',true);
                                $('#mercado_mount').prop('disabled',true);
                                validateValues();
                                validateMounts();
                                displayLabels();
                                return false
                            @endif
                            $('#btn-consolidar').prop('disabled', true);
                            $('#total_amount_sistem').val(response.totalCaja.formatMoney(2));
                            $('#efectivo_sistem').val(response.totalEfectivo.formatMoney(2));
                            $('#credito_sistem').val(response.tarjetaCredito.formatMoney(2));
                            $('#debito_sistem').val(response.tarjetaDebito.formatMoney(2));
                            $('#mercado_sistem').val(response.mercadoPago.formatMoney(2));
                            $('#diff_total_amount').val(response.difTotalCaja.formatMoney(2));
                            $('#difEfectivo').val(response.difTotalEfectivo.formatMoney(2));
                            $('#difTarjetaDebito').val(response.difTarjetaDebito.formatMoney(2));
                            $('#difTarjetaCredito').val(response.difTarjetaCredito.formatMoney(2));
                            $('#difMercadoPago').val(response.difMercadoPago.formatMoney(2));
                            $('#debito_mount_sistem').val(response.debito_mount_sistem);
                            $('#credito_mount_sistem').val(response.credito_mount_sistem);
                            $('#mercado_mount_sistem').val(response.mercado_mount_sistem);
                            $('#debito_val').attr('style', 'text-align: end');
                            $('#credito_val').attr('style', 'text-align: end');
                            $('#mercado_val').attr('style', 'text-align: end');
                            $('#credito_mount').prop('readonly', true);
                            $('#debito_mount').prop('readonly', true);
                            $('#mercado_mount').prop('readonly', true);
                            $('#btn-return').hide();
                            $('#btn-close').show();
                            recordType == "BASE" ? $('#btn-ajust').show() : $('#btn-ajust').hide();
                            $('#btn-ajust').prop('disabled', false);
                            $('#btn-close').prop('disabled', false);
                            validateValues();
                            validateMounts();
                            displayLabels();

                        } else {
                            alert('Se produjo un error Favor comunicarse con un administrador!')
                        }
                    }
                });
            });

            $('#btn-send').on('click', function () {
                recordType = "BASE";
                $('#table').hide();
                $('#btn-return').show();
                $('#btn-consolidar').prop('disabled', false);
                $('#btn-send').hide()
            });

            $('#btn-return').on('click', function () {
                $('#btn-return').hide();
                $('#btn-send').show();
                $('#table').show();
                $('#btn-consolidar').prop('disabled', true);
            });

            $('#btn-ajust').on('click', function () {
                recordType = "AJUSTE";
                var confirmAjust = $('#btn-confirm-ajust');
                $('#btn-close').hide();
                $('#btn-ajust').hide();
                confirmAjust.prop('disabled', false);
                confirmAjust.show();
                $('#table').show();
                $('#debito_val').prop('readonly', false);
                $('#credito_val').prop('readonly', false);
                $('#mercado_val').prop('readonly', false);
                $('#credito_mount').prop('readonly', false);
                $('#debito_mount').prop('readonly', false);
                $('#mercado_mount').prop('readonly', false);
                $('#btn-send').prop('disabled', true);
                $('#btn-consolidar').prop('disabled', true);
            });

            $('#btn-confirm-ajust').on('click', function () {
                $('#table').hide();
                $('#btn-confirm-ajust').hide();
                $('#btn-ajust').show();
                $('#btn-consolidar').prop('disabled', false);
                $('#diff_total_amount').hide();
                $('#difEfectivo').hide();
                $('#difTarjetaDebito').hide();
                $('#difTarjetaCredito').hide();
                $('#difMercadoPago').hide();
                $('#mercado_mount_sistem').hide();
                $('#debito_mount_sistem').hide();
                $('#credito_mount_sistem').hide();
            });

            /**
             * Muestra los labels con los valores del sistema
             */
            function displayLabels() {
                $('#table').hide();
                $('#valores').show();
                $('#diferencias').show();
                $('#mountsSistem').show();
                $('#total_amount_sistem').show();
                $('#efectivo_sistem').show();
                $('#credito_sistem').show();
                $('#debito_sistem').show();
                $('#mercado_sistem').show();
                $('#diff_total_amount').show();
                $('#difEfectivo').show();
                $('#difTarjetaDebito').show();
                $('#difTarjetaCredito').show();
                $('#difMercadoPago').show();
                $('#mercado_mount_sistem').show();
                $('#debito_mount_sistem').show();
                $('#credito_mount_sistem').show();
                $('#debito_val').prop('readonly', true);
                $('#credito_val').prop('readonly', true);
                $('#mercado_val').prop('readonly', true);
            }

            /**
             * Muestra si el valor es negativo en rojo y si es 0 en verde
             */
            function validateValues() {
                let propArray = [
                    '#diff_total_amount',
                    '#difEfectivo',
                    '#difTarjetaDebito',
                    '#difTarjetaCredito',
                    '#difMercadoPago',
                ]
                propArray.forEach((e) => {
                    let value = Number($(e).val().replace(/[^0-9.-]+/g, ""));
                    value === 0
                        ? $(e).css("background-color", "#00BE9C")
                        : (Math.sign(value) === -1 ? $(e).css("background-color", "#FF4B3A") : $(e).css("background-color", "#FFC501"));
                })
            }

            /**
             *
             * Para el cierre del turno data taable
             * */
            $('#btn-close').on('click', function () {
                $.ajax({
                    url: "/" + $("#url").val() + "/ajax?type=showShiftClousure",
                    type: 'get',
                    success: function (response) {
                        console.log(response, 'respuesta del data table');
                        if (response != 'false') {
                            $('#btn-ajust').hide();
                            $('#btn-consolidar').hide();
                            $('#btn-close').hide();
                            $("#table_turn").show();
                            $(".turn-table").DataTable({
                                'serverSide': true,
                                'ajax': '/' + $("#url").val() + '/ajax?type=viewListShifClosure',
                                'processing': false,
                                'stateSave': false,
                                paging: false,
                                columns: [
                                    {data: 'id', name: 'id', title: "{{ __('ID') }}", "visible": false},
                                    {
                                        data: 'record_type',
                                        record_type: 'record_type',
                                        title: "{{ __('Tip de Operación') }}"
                                    },
                                    {data: 'turn', record_type: 'turn', title: "{{ __('turn') }}"},
                                    {
                                        data: 'paymethods.name',
                                        record_type: 'paymethods.name',
                                        title: "{{ __('Medio de pago') }}"
                                    },
                                    {
                                        data: 'input_quantity',
                                        record_type: 'input_quantity',
                                        title: "{{ __('Cantidad ingresada') }}"
                                    },
                                    {
                                        data: 'input_value',
                                        record_type: 'input_value',
                                        title: "{{ __('Valor ingresado') }}"
                                    },
                                    {
                                        data: 'system_quantity',
                                        record_type: 'system_quantity',
                                        title: "{{ __('Cantidad del sistema') }}"
                                    },
                                    {
                                        data: 'system_value',
                                        record_type: 'system_value',
                                        title: "{{ __('Valor del sistema') }}"
                                    },
                                ],
                                "order": [[0, "asc"]]
                            });
                            response.forEach((e) => {
                                switch (e.medium_payment_type) {
                                    case 93:
                                        debito = e.input_value;
                                        totalDebitoS = e.system_value;
                                        $('#credito_val').val(e.input_value);
                                        $('#credito_mount').val(e.input_quantity);
                                        $('#credito_sistem').val(e.system_value.formatMoney(2));
                                        $('#credito_mount_sistem').val(e.system_quantity);
                                        $('#difTarjetaCredito').val(e.system_quantity);
                                        let difCredito = Number($('#credito_val').val().replace(/[^0-9.-]+/g, "")) - Number($('#credito_sistem').val().replace(/[^0-9.-]+/g, ""))
                                        $('#difTarjetaCredito').val(difCredito.formatMoney(2));
                                        break;
                                    case 94:
                                        credito = e.input_value;
                                        totalCreditoS = e.system_value;
                                        $('#debito_val').val(e.input_value);
                                        $('#debito_mount').val(e.input_quantity);
                                        $('#debito_sistem').val(e.system_value.formatMoney(2));
                                        $('#debito_mount_sistem').val(e.system_quantity);
                                        let difDebito = Number($('#debito_val').val().replace(/[^0-9.-]+/g, "")) - Number($('#debito_sistem').val().replace(/[^0-9.-]+/g, ""))
                                        $('#difTarjetaDebito').val(difDebito.formatMoney(2));
                                        break;
                                    case 92:
                                        total_efectivo = e.input_value;
                                        totalSystem = e.system_value;
                                        $('#efectivo').val(e.input_value.formatMoney(2));
                                        $('#efectivo_sistem').val(e.system_value.formatMoney(2));
                                        let difEfectivo = Number($('#efectivo').val().replace(/[^0-9.-]+/g, "")) - Number($('#efectivo_sistem').val().replace(/[^0-9.-]+/g, ""))
                                        $('#difEfectivo').val(difEfectivo.formatMoney(2));
                                        break;
                                }

                            });

                            let totalAmount = Number(debito) + Number(credito) + Number(total_efectivo);
                            let totalSystemV = Number(totalDebitoS) + Number(totalCreditoS) + Number(totalSystem);
                            let totalDiff = totalAmount - totalSystemV;
                            total_caja = totalAmount;
                            $('#total_amount').val(totalAmount.formatMoney(2));
                            $('#total_amount_sistem').val(totalSystemV.formatMoney(2));
                            $('#diff_total_amount').val(totalDiff.formatMoney(2));
                            // validateMounts();
                            // validateValues();
                        } else {
                            alert('Error al cerrar el turno')
                        }

                    }
                });


            });
        });

        /**
         * Muestra si las cantidades de transacciones ingresadas por el usuario coinciden con el sistema
         */
        function validateMounts() {
            let propArray = [
                '#credito_mount_sistem',
                '#debito_mount_sistem',
                '#mercado_mount_sistem',
            ]

            $(propArray[0]).val() == $('#credito_mount').val() ? $(propArray[0]).css("background-color", "#00BE9C") : $(propArray[0]).css("background-color", "#FF4B3A")
            $(propArray[1]).val() == $('#debito_mount').val() ? $(propArray[1]).css("background-color", "#00BE9C") : $(propArray[1]).css("background-color", "#FF4B3A")
            $(propArray[2]).val() == $('#mercado_mount').val() ? $(propArray[2]).css("background-color", "#00BE9C") : $(propArray[2]).css("background-color", "#FF4B3A")
        }


        $(document).on("keyup", "#credito_val", function () {
            credito = Number($('#credito_val').val());
            total_caja = total_efectivo + credito + debito + mercado_pago;
            $('#total_amount').val(total_caja.formatMoney(2));
        });

        $(document).on("keyup", "#debito_val", function () {
            debito = Number($('#debito_val').val());
            total_caja = total_efectivo + credito + debito + mercado_pago;
            $('#total_amount').val(total_caja.formatMoney(2));
        });

        $(document).on("keyup", "#mercado_val", function () {
            mercado_pago = Number($('#mercado_val').val());
            total_caja = total_efectivo + credito + debito + mercado_pago;
            $('#total_amount').val(total_caja.formatMoney(2));
        });

    </script>
@endsection
