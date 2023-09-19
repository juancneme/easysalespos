<?php $page_title = __('Sistecredit Pay') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<div class="panel-body form-add" style="margin-top: 110px;">
    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    <form action="/{{strtolower($group . '/' . $page) }}" method="POST" autocomplete="off"
            enctype="multipart/form-data"
            class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>

<div class="panel panel-default" enctype="multipart/form-data">
    <form action="/{{strtolower( $group . '/' . $page ).'/getActiveCredits'}}" method="POST" class="form-horizontal"
            style="padding-right: 15px;padding-left: 15px; margin-left: 20px;margin-right: 20px;">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <div class="form-group row" style="margin-top: 15px;">
            <label for="typedoc" class="col-sm-2 col-form-label">{{ __('Identification') }}*</label>
            <div class="col-sm-9" style="border-top: 30px">
                <select name="typedoc" id="typedoc" class="form-control" required>
                    @foreach ($itemstypedocument as $ItemsDocs)
                        <option
                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                            value="{{ $ItemsDocs->id }}">{{ $ItemsDocs->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="typeper" class="col-sm-2 col-form-label">{{ __('Number Document') }}*</label>
            <div class="col-sm-9" style="border-top: 30px">
                <input id="numberdocument" name="numberdocument" class="form-control"
                        value="{{isset($numberdoc) ? $numberdoc :""}}"
                        <?= $numberdoc != null ? 'readonly' : '' ?> required>
            </div>
        </div>

        <div style="display: flex; justify-content: center;">
            <button class="btn btn-success " type="button" onclick="onSearch()" style="margin-right: 20px;">
                <i class="glyphicon glyphicon-remove"></i> {{ __('Nueva Consulta') }}</button>
            <button class="btn btn-primary " type="submit">
                <i class="glyphicon glyphicon-remove"></i> {{ __('Créditos Vigentes') }}</button>
        </div>
    </form>

    <!--Modal -->
    <div class="modal fade" id="payModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" data="" style="background-color: beige;">

                <div class="modal-header">
                    <h5 id="labelTittle" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="onClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div style="justify-content: space-between; display: flex;">
                        <label id="labelTotalValue"></label>
                        <label id="labelMinValue"></label>
                    </div>
                    <select name="valuesSelect" id="valuesSelect" class="form-control" required>
                        <option id="totalValue" value=""></option>
                        <option id="minValue" value=""></option>
                        <option style="display: none" id="otherValue" value="otherValue">Otro valor</option>
                    </select>
                    <div style="display: flex; justify-content: center;">
                        <input class="form-control" type="text" placeholder="Otro valor a pagar" name="valueCheck"
                                id="inputValue" value="" disabled style="margin-top: 15px;">
                        <input type="hidden" name="credit" id="credit">
                    </div>
                </div>
                
                <button type="submit" onclick="payCredit()" class="btn btn-primary" style="height:36px; margin-right: 67px; width:90%; margin-right: 20px; margin-left:20px;">{{__('Register Pay')}}</button>

                <div class="modal-footer">
                    <button style="width:7rem;" type="button" class="btn btn-danger" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>

                <div>
                    <button id="load_btn" type="button"   class="btn btn-light" hidden style="width:100%; background-color:beige;">
                        <i class="fa fa-spinner fa-spin"></i>{{__('Loading')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--Notification modal-->
    <div id="Notificacion" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: beige;">
                <div class="modal-body" style="display:flex; justify-content:center;">
                    <label id="lbmensaje" class="col-form-label"></label>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-dismiss="modal" onclick="location.reload()" class="btn btn-primary" style="height:36px; margin-right: 67px; width:90%; margin-right: 20px; margin-left:20px;">{{__('Accept')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body" style="margin-top: 20px;">
        <table id="example" class="table table-striped table-en task-table">
        </table>
    </div>
</div>

<script>
@if($data !='')
var data = JSON.parse('{{$data}}'.replace(/&quot;/g, '"'));
var table = $('.task-table').DataTable({
    data: data,
    columns: [
        {data: 'creditNumber', title: "{{ __('# Crédito') }}"},
        {data: 'idDocument', title: "{{ __('Documento') }}"},
        {
            data: 'totalPayment',
            className: "text-right",
            title: "{{ __('Saldo') }}",
            render: $.fn.dataTable.render.number(',', '.', 2, '$ ')
        },
        {data: 'dueDate', title: "{{ __('Fecha Vencimiento') }}"},
        {
            "className": 'options',
            "data": null,
            title: "{{ __('Action') }}",
            "render": function (data, type, row, meta) {
                // debugger;
                return '<button class="btn btn-mini btn-success" type="button" onclick="onSubmit(data,' + meta.row + ')"> <i class="fa fa-dollar"></button>';
            }
        }
    ],
    "order": [[0, "desc"]],
});
@endif

$('#valuesSelect').change(function () {
    $(this).val() == "otherValue" ? $('#inputValue').prop("disabled", false) : $('#inputValue').prop("disabled", true);
});

function onClick(e, item) {
    if (!confirm('Confirma el pago del valor: ' + item.formatMoney(2))) e.preventDefault();
}

function onSubmit(data, index) {
    let flag = data[index].totalPayment === data[index].minimumPayment ? 1 : 0;
    $('#labelTittle').empty();
    $('#labelTittle').append('Registrar recaudo # ' + data[index].creditNumber);
    $('#labelTotalValue').empty();
    $('#labelTotalValue').append('Valor total: ' + data[index].totalPayment.formatMoney(2));
    $('#labelMinValue').empty();
    $('#labelMinValue').append('Valor minimo: ' + data[index].minimumPayment.formatMoney(2));
    $('#totalValue').empty();
    $('#totalValue').append('Valor total: ' + data[index].totalPayment.formatMoney(2));
    $('#minValue').empty();
    $('#minValue').append('Valor minimo: ' + data[index].minimumPayment.formatMoney(2));
    $("#totalValue").val(data[index].totalPayment);
    $("#minValue").val(data[index].minimumPayment);
    $("#credit").val(data[index].creditId);
    flag ? $('#otherValue').hide() : $('#otherValue').show();
    flag ? $('#inputValue').hide() : $('#inputValue').show();
    $("#payModal").modal('show');
}

function onSearch() {
    $("#numberdocument").attr('readonly', false);
    $("#numberdocument").val("");
}

function onClose() {
    $("#inputValue").val("");
}

function payCredit() {
    var value = "";
    let minValue = $("#minValue").val();
    let maxValue = $("#totalValue").val();
    value = $("#valuesSelect option:selected").val();

    if ($("#valuesSelect option:selected").val() == 'otherValue') {
        value = $("#inputValue").val();
    }
    if (parseInt(value) < parseInt(minValue)) {
        alert("Error: " + 'el valor minimo debe es de: ' + parseInt($("#minValue").val()).formatMoney(2));
        return false;
    }
    if (parseInt(value) > parseInt(maxValue)) {
        alert("Error: " + 'el monto maximo es de: ' + parseInt($("#totalValue").val()).formatMoney(2));
        return false;
    }
    if (value != '' && value != undefined) {
        $.ajax({
            url: 'payCredit',
            type: 'get',
            data: {
                "payId": value,
                "credit": $("#credit").val(), 
                _token: $("_token").val()
            },

            beforeSend: function () {
                $("#load_btn").removeAttr('hidden');
                $("#pay_btn").hide();

            },
            success: function (response) {
                $(".load_btn").attr('hidden')
                $("#payModal").modal('hide');
                $("#lbmensaje").text("Pago Exitoso!");
                $("#Notificacion").modal('show');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $(".load_btn").attr('hidden')
                alert("Error: " + XMLHttpRequest.responseText);
            }

        });
    } else {
        alert("{{ __("Select Pay") }}")
    }
}
</script>
@endsection
