<?php $page_title = __('Shift Management') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<div class="panel-body form-add" style="margin-top: 110px;">
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal"
            style="padding-right: 15px;padding-left: 15px">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="url" id="url" value="{{ strtolower($group . '/' . $page) }}">
        <input type="hidden" name="typeItem" id="typeItem" value="{{ $typeItem }}">
        <input type="hidden" name="turno" id="turno" value="{{ $turno }}">

        <style>
            .form-control:read-only {
                outline: none;
                box-shadow: none;
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                border: none;
            }
        </style>

        <div class="panel1 panel-default1">

            @if(Input::get('id') || auth()->user()->hasRole('cajero') )
            <div class="panel-heading">{{ __('Balance sheet') }}  TURNO {{ $turno }}
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">{{ __('ITEMS') }}</label>
                <label for="status" class="col-sm-3 col-form-label"
                        style="text-align: center;">{{ __('VALORES INGRESADOS') }}</label>
                <label for="status" class="col-sm-3 col-form-label camsys"
                        style="text-align: center;">{{ __('VALORES SISTEMA') }}</label>
                <label for="status" class="col-sm-3 col-form-label camdif"
                        style="text-align: center;">{{ __('DIFERENCIAS') }}</label>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label"></label>
                <label for="status" class="col-sm-1 col-form-label"
                        style="text-align: center;">{{ __('CANTIDAD') }}</label>
                <label for="status" class="col-sm-2 col-form-label"
                        style="text-align: center;">{{ __('VALORES') }}</label>
                <label for="status" class="col-sm-1 col-form-label camsys"
                        style="text-align: center;">{{ __('CANTIDAD') }}</label>
                <label for="status" class="col-sm-2 col-form-label camsys"
                        style="text-align: center;">{{ __('VALORES') }}</label>
                <label for="status" class="col-sm-1 col-form-label camdif"
                        style="text-align: center;">{{ __('CANTIDAD') }}</label>
                <label for="status" class="col-sm-2 col-form-label camdif"
                        style="text-align: center;">{{ __('VALORES') }}</label>
            </div>

            <div class="clone_dinero hide">
                <div class="form-group row denominaciones" style="margin-top: -15px;">

                    <input type="hidden" id="iddineroYY" name="datosdinero[YY][id]" value=0>
                    <input type="hidden" id="codedineroYY" name="datosdinero[YY][code]" value=0>

                    <div class="col-sm-2">
                        <label id='namedineroYY' name='datosdinero[YY][name]'
                                style="color: #5cb85c; margin-left: 30px; margin-top: -30px; height: 30px"
                                class="col-form-label">XXXXX</label>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" id="input_dinero_amountYY" name="datosdinero[YY][input_amount]"
                                style="text-align: end; height: 30px" readonly class="form-control read canbil">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="input_dinero_valueYY" name="datosdinero[YY][input_value]"
                                style="text-align: end; height: 30px" readonly class="form-control read">
                    </div>

                </div>
            </div>

            <div class="clone_item hide">
                <div class="form-group row medipagoXX">

                    <input type="hidden" id="iditemXX" name="datosItems[XX][id]" value=0>

                    <div class="col-sm-2">
                        <label id='nameitemXX' name='datosItems[XX][name]' class="col-form-label"></label>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" id="input_amountXX" name="datosItems[XX][input_amount]"
                                style="text-align: end;" readonly class="form-control canmed">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="input_valueXX" name="datosItems[XX][input_value]"
                                style="text-align: end;" readonly class="form-control valmed">
                    </div>

                    <div class="col-sm-1">
                        <input type="text" id="system_amountXX" name="datosItems[XX][system_amount]"
                                style="text-align: end;" readonly class="form-control camsys">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="system_valueXX" name="datosItems[XX][system_value]"
                                style="text-align: end;" readonly class="form-control camsys">
                    </div>

                    <div class="col-sm-1">
                        <input type="text" id="diff_amountXX" name="datosItems[XX][diff_amount]"
                                style="text-align: end; background-color: lightblue;" readonly
                                class="form-control camdif">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="diff_valueXX" name="datosItems[XX][diff_value]" style="text-align: end;"
                                readonly class="form-control camdif">
                    </div>

                </div>
            </div>

            <div class="input-group control-group increment-item">
                <div class="col-md-11">
                    <br>
                    <button type="button"
                            id="btn-send"
                            class="btn btn-primary btn-primary"
                            data-placement="top"
                            data-toggle="tooltip"
                            title="{{ __('Listo') }}">{{ __('Listo') }}
                    </button>
                    <button type="button"
                            id="btn-return"
                            class="btn btn-primary btn-primary"
                            data-placement="top"
                            data-toggle="tooltip"
                            style="display: none"
                            title="{{ __('Regresar') }}">{{ __('Regresar') }}
                    </button>
                    <button type="submit"
                            id="btn-consolidar"
                            class="btn btn-primary btn-primary"
                            data-placement="top"
                            data-toggle="tooltip"
                            disabled
                            style="display: none"
                            title="{{ __('Consolidar') }}">{{ __('Consolidar') }}
                    </button>
                    <button
                        <?= auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('admin') ? '' : 'disabled' ?> type="button"
                        id="btn-ajust"
                        class="btn btn-primary btn-info"
                        data-placement="top"
                        style="display: none"
                        data-toggle="tooltip"
                        title="{{ __('Ajuste') }}">{{ __('Ajuste') }}
                    </button>
                    <button type="button" id="btn-confirm-ajust" class="btn btn-primary btn-info" disabled
                            data-placement="top" style="display: none" data-toggle="tooltip"
                            title="{{ __('Ajuste Completo') }}">{{ __('Ajuste Completo') }}
                    </button>
                    <button type="button" id="btn-close" class="btn btn-primary btn-danger" disabled
                            data-placement="top"
                            style="display: none" data-toggle="tooltip"
                            title="{{ __('Cierre') }}">{{ __('Cierre') }}
                    </button>
                </div>
            </div>
            @endif
            
        </div>
    </form>
</div>

<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Shift Management') }}
    </div>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>


<!-- <div class="panel panel-default" style="margin-top: 110px;"> -->
    <!-- @if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('admin')) -->
    <!-- @if(!Input::get('id')) -->
    <!-- <div class="panel-body"> -->
        <!-- <div class="table-responsive"> -->
            <!-- <table class="table table-striped table-en task-table"> -->
            <!-- </table> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- @endif -->
    <!-- @endif -->
<!-- </div> -->

<script>
    $countitems = 0;
    $itemsdinero = 0;
    var count = 0;

    jQuery(document).ready(function ($) {
        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'fullname', name: 'fullname', title: "{{ __('Cajero') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Estado') }}"},
                {data: 'shiftdate', name: 'shiftdate', title: "{{ __('Fecha Ini') }}"},
                {data: 'enddate', name: 'enddate', title: "{{ __('Fecha Fin') }}"},
                
                {
                    data: 'saldoinicial',
                    render: $.fn.dataTable.render.number(',', '.', 0, '$'),
                    title: "{{ __('Base Incial') }}",
                    className: "text-right"
                },
                {
                    data: 'saldofinal',
                    render: $.fn.dataTable.render.number(',', '.', 0, '$'),
                    title: "{{ __('Saldo final') }}",
                    className: "text-right"
                },
                {
                    data: 'valorreportado',
                    render: $.fn.dataTable.render.number(',', '.', 0, '$'),
                    title: "{{ __('Valor Reportado') }}",
                    className: "text-right"
                },
                {
                    data: 'diferencia',
                    render: $.fn.dataTable.render.number(',', '.', 0, '$'),
                    title: "{{ __('Diferencia') }}",
                    className: "text-right"
                },

                {
                    data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false
                }
            ],

            rowCallback: function( row, data ) {
                if ( data.diferencia < 0 ) {
                    $('td:eq(8)', row).addClass("text-danger");
                } else {
                    if ( data.diferencia > 0 ) {
                        $('td:eq(8)', row).addClass("text-info");
                    }
                }
            },

            "order": [[0, "desc"]]
        });
    });

    function carga_data_items($mIndice, $mItem) {

        console.log($mIndice);

        $diff = parseInt($mItem['diff_value']);
        $system = parseInt($mItem['system_value']);
        $input = parseInt($mItem['input_value']);

        $("#iditem" + $mIndice).val($mItem['id']);
        $("#nameitem" + $mIndice).text($mItem['name']);
        $("#input_amount" + $mIndice).val($mItem['input_amount']);
        $("#input_value" + $mIndice).val($input.formatMoney(0));
        $("#system_amount" + $mIndice).val($mItem['system_amount']);
        //$("#system_value"+$mIndice).val($mItem['system_value']);
        $("#system_value" + $mIndice).val($system.formatMoney(0));
        $("#diff_amount" + $mIndice).val($mItem['diff_amount']);
        //$("#diff_value"+$mIndice).val($mItem['diff_value']);
        $("#diff_value" + $mIndice).val($diff.formatMoney(0));

        if ($mItem['id'] == '0000000' || $mItem['id'] == '0100092') {
            $("#input_amount" + $mIndice).attr('hidden', true);
            $("#system_amount" + $mIndice).attr('hidden', true);
            $("#diff_amount" + $mIndice).attr('hidden', true);

            $("#input_value" + $mIndice).attr('style', 'text-align: end; background-color: #bcbfc1;');
            $("#system_value" + $mIndice).attr('style', 'text-align: end; background-color: #bcbfc1;');

        } else {
            $("#input_amount" + $mIndice).attr('readonly', false);
            $("#input_value" + $mIndice).attr('readonly', false);
        }
        return;
    }

    function carga_data_dinero($mIndice, $mDinero) {

        console.log($mIndice);
        console.log($mDinero);

        $dinero = parseInt($mDinero['valor']);

        $("#iddinero" + $mIndice).val($mDinero['id']);
        $("#codedinero" + $mIndice).val($mDinero['code']);
        $("#namedinero" + $mIndice).text('>> ' + $mDinero['name']);
        $("#namedinero" + $mIndice).val($mDinero['name']);
        $("#input_dinero_amount" + $mIndice).val($mDinero['cantidad']);
        $("#input_dinero_value" + $mIndice).val($dinero.formatMoney(0));

        $("#input_dinero_amount" + $mIndice).attr('readonly', false);
        $("#input_dinero_amount" + $mIndice).attr('type', 'number');

        return;
    }

    $(".canbil").on("change", function () {

        $index = parseInt($(this).attr('id').substring(19, 23));

        $code = parseInt(stripCharacters($("#codedinero" + $index).val()));
        $cantidadNew = parseInt(stripCharacters($("#input_dinero_amount" + $index).val()));

        $valorNew = $code * $cantidadNew;
        $("#input_dinero_value" + $index).val($valorNew.formatMoney(0));

        $valorEfectivo = 0;
        for ($bil = 1; $bil <= $itemsdinero; $bil++) {
            $codeI = parseInt(stripCharacters($("#codedinero" + $bil).val()));
            $cantidadI = parseInt(stripCharacters($("#input_dinero_amount" + $bil).val()));
            $valorEfectivo += $codeI * $cantidadI;
        }
        $("#input_value2").val($valorEfectivo.formatMoney(0)).change();

    });

    $(".valmed").on("change", function () {

        $index = parseInt($(this).attr('id').substring(11, 15));
        $valorNew = parseInt(stripCharacters($("#input_value" + $index).val()));
        // alert("campo => "+$("#input_value"+$index).val());
        // alert("sin car => "+stripCharacters($("#input_value"+$index).val()));
        // alert("$valorNew "+$valorNew);
        //Valor diferencia item
        $valorRes = $valorNew - parseInt(stripCharacters($("#system_value" + $index).val()));
        $("#diff_value" + $index).val($valorRes.formatMoney(0));
        if ($valorRes == 0) $("#diff_value" + $index).css('background-color', 'rgb(0, 190, 156)');
        if ($valorRes < 0) $("#diff_value" + $index).css('background-color', 'rgb(255, 75, 58)');
        if ($valorRes > 0) $("#diff_value" + $index).css('background-color', 'rgb(255, 197, 1)');

        //Calcula valor total cuando es un item diferente a total
        if ($index >= 2) {
            $valorTotal = 0;
            for ($ite = 2; $ite <= $countitems; $ite++) {
                $valorItem = parseInt(stripCharacters($("#input_value" + $ite).val()));
                // alert("$valorItem"+$ite+" "+$valorItem)
                $valorTotal += $valorItem;
            }
            // alert("$valorTotal "+$valorTotal);
            $("#input_value1").val($valorTotal.formatMoney(0));

            $valorRes = $valorTotal - parseInt(stripCharacters($("#system_value1").val()));
            $("#diff_value1").val($valorRes.formatMoney(0));
            if ($valorRes == 0) $("#diff_value1").css('background-color', 'rgb(0, 190, 156)');
            if ($valorRes < 0) $("#diff_value1").css('background-color', 'rgb(255, 75, 58)');
            if ($valorRes > 0) $("#diff_value1").css('background-color', 'rgb(255, 197, 1)');
        }
    });

    $(".canmed").on("change", function () {
        $index = parseInt($(this).attr('id').substring(12, 16));
        $cantidadMedNew = parseInt(stripCharacters($("#input_amount" + $index).val()));
        $valorRes = $cantidadMedNew - parseInt(stripCharacters($("#system_amount" + $index).val()));
        $("#diff_amount" + $index).val($valorRes);

        if ($valorRes == 0) $("#diff_amount" + $index).css('background-color', 'rgb(0, 190, 156)');
        if ($valorRes < 0) $("#diff_amount" + $index).css('background-color', 'rgb(255, 75, 58)');
        if ($valorRes > 0) $("#diff_amount" + $index).css('background-color', 'rgb(255, 197, 1)');

    });

    $('#btn-send').on('click', function () {
        $(".denominaciones").attr('hidden', true);
        $('#btn-send').hide();
        $('#btn-return').show();
        $('#btn-consolidar').show();
        $('#btn-consolidar').attr('disabled', false);
    });

    $('#btn-return').on('click', function () {
        $(".denominaciones").attr('hidden', false);
        $('#btn-send').show();
        $('#btn-return').hide();
        $('#btn-consolidar').hide();
        $('#btn-consolidar').attr('disabled', true);
    });

    $('#btn-ajust').on('click', function () {
        $(".denominaciones").attr('hidden', false);
        $(".valmed").attr('readonly', false);
        $(".canmed").attr('readonly', false);
        $('#btn-send').show();
        $('#btn-ajust').hide();
    });

    function stripCharacters(str) {
        str = str.replace("$", '');
        str = str.replace(/,/g, '');
        return str;
    }

    $('#btn-consolidar').click(function () {
        for (i = 1; i <= count; i++) {
            $("#input_value" + i).val(parseInt(stripCharacters($("#input_value" + i).val())));
            $("#system_value" + i).val(parseInt(stripCharacters($("#system_value" + i).val())));
        }
    });

    function tratamiento_turno () {

        // temas de ejeucion desde la entrada
        @if(!empty($shiftid) && $shiftid->typeshift_id != 14)
        if (window.location.href.includes('closeTurn')) {

            @if($shiftid->typeshift_id == 15 )
                window.location.href = "{{ url('management/pdvi') }}";
            @elseif($shiftid->typeshift_id == 12)
                window.location.href = "{{ url('management/balancesheet') }}";
            @endif
            
        }
        @endif

        @if( $hasPendingTransaction > 0 || $hasDelivery > 0 )
        if (confirm('Favor tramitar las ventas guardadas y domicilios pendientes antes de poder hacer el cierre')) {
            window.location.href = "{{ url('management/sales')}}";
        }else{
            window.location.href = "{{ url('management/sales')}}";
        }
        @elseif(!empty($shiftid) && $shiftid->typeshift_id == 14)
        if ("{{ !$confirmClosure }}") {
            confirm('Favor bloquear la caja antes de poder hacer el cierre')
            window.location.href = "{{ url('management/pdvi')}}";
        } else {
            if (window.location.href.includes('closeTurn')) {
                if (confirm('¿Desea bloquear la caja?')) {
                    if ("{{ isset($confirmModal) }}") {
                        $.ajax({
                            url: "/" + $("#url").val() + "/ajax?type=closeTurn",
                            type: 'get',
                            success: function (response) {
                                if (response) {
                                    alert(response);
                                } else {
                                    console.log('Error al cerrar el turno')
                                }
                            }
                        });
                        confirm('Turno bloqueado Correctamente')
                        window.location.href = "{{ url('management/balancesheet')}}";
                    }
                } else {
                    window.location.href = "{{ url('management/pdvi')}}";
                    // return false;
                }
            }
        }
        @endif

        @foreach ($itemsFull as $key => $item)
        $html = $(".clone_item").html();
        $html = $html.replace(/XX/g, $countitems + 1);
        $(".increment-item").before($html);
        carga_data_items($countitems + 1, {!! json_encode($item) !!} );
        $countitems++;
        count++;
        @endforeach

        @foreach ($denominaciones as $key => $dinero)
        $html = $(".clone_dinero").html();
        $html = $html.replace(/YY/g, $itemsdinero + 1);
        $(".medipago2").after($html);
        carga_data_dinero($itemsdinero + 1, {!! json_encode($dinero) !!} );
        $itemsdinero++;
        @endforeach

        $cantidadOld = 0;
        $valorNew = 0;
        $valorOld = 0;
        $valorTot = 0;

        for ($i = 1; $i <= $countitems; $i++) {
            $("#input_amount" + $i).change();
            $("#input_value" + $i).focus();
            $("#input_value" + $i).change();
            $("#input_value" + $i).blur();
        }

        $typeItem = '{{ $typeItem }}';
        if ($typeItem == 'INICIAL') {
            $(".camsys").attr('hidden', true);
            $(".camdif").attr('hidden', true);
        }
        
        if ($typeItem == 'BASE') {
            $(".denominaciones").attr('hidden', true);
            $(".valmed").attr('readonly', true);
            $(".canmed").attr('readonly', true);
            $('#btn-send').hide();
            $('#btn-ajust').show();
        }
        if ($typeItem == 'AJUSTE') {
            $(".denominaciones").attr('hidden', true);
            $(".valmed").attr('readonly', true);
            $(".canmed").attr('readonly', true);
            $('#btn-send').hide();
        }

        $('input:focus').css('border', 'none');

        //fin temas
    }

</script>
@include('management.pdviJS.pdvi_impresion')
    
@endsection
