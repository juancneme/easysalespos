<?php $page_title = __('Cash Input Output') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<form action="/{{ $group . '/' . $page }}" method="POST"  role="form" 
        autocomplete="off" class="form-horizontal" 
        style="padding-right: 15px;padding-left: 15px; margin-top: 110px;" >
    <div class="panel-heading">{{ __('Cash Input Output') }}</div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    <input id="accountvalue" type="hidden" name="accountvalue" value="{{ $valuebalance }}">

    <div class="form-group row">
        <label for="date_io" class="col-sm-3 col-form-label">{{ __('Date of completion') }}</label>
        <div class="col-sm-2" >
            <input type="date" name="date_io" id="date_io" class="form-control" style="text-align: center"
                    readonly required
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                    value={{ $today }}>
        </div>

        <label for="accountbalance" class="col-sm-3 col-form-label" style="text-align: right">{{ __('Account balance') }}</label>
        <div class="col-sm-2" >

            <input type="numeric" name="accountbalance" id="accountbalance" class="form-control" style="text-align: right"
                    readonly
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                    value="$ {{ number_format($valuebalance,2) }}" >
        </div>

    </div>

    <div class="form-group row">
        <label for="type" class="col-sm-3 col-form-label">{{ __('Type of operation') }}</label>
        <div class="col-sm-3" >
            <select name="type" id="type" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                    required >
                <option value="0" disabled selected>{{__('Select a type of operation')}}</option>
                <option value="17">{{__('Pago (Salida Efectivo)')}}</option>
                <option value="18">{{__('Recaudo (Entrada de Efectivo)')}}</option>
                @if ( $esCajero )
                <option value="20">{{__('Entrega de Dinero a Admon (Salida Efectivo))')}}</option>
                @endif
                <!-- @if ( $tieneSIS )
                <option value="21">{{__('Recaudo Cuota Fiado Electronico (Entrada Efectivo))')}}</option>
                @endif -->
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="value" class="col-sm-3 col-form-label">{{ __('Value of payment or collection') }}</label>
        <div class="col-sm-2" >
            <input type="numeric" name="value" id="value" class="form-control" style="text-align: right"
                    required
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> >
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-3 col-form-label">{{ __('Description of payment or collection') }}</label>
        <div class="col-sm-5" >
            <input type="text" onkeypress="return check(event)" name="description" id="description" class="form-control" style="text-align: left"
                    required
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                    value=''>
        </div>
    </div>
    
    <!-- Add Task Button -->
    <div class="form-group row">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary btn-consult" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('Save record') }}">
                <i class="">{{ __('Save record') }}</i> 
            </button>
            <button type="button" class="btn btn-success btn-reset" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('New record') }}">
                <i class="">{{ __('New record') }}</i> 
            </button>
        </div>
    </div>

</form>
<hr style="border-color: #ccc" />

<!-- Current Users -->
<div class="panel panel-default" >
    <div class="panel-heading">{{ __('Last transactions') }}
    </div>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>

<script>

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true; 
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[ A-Za-z0-9 - -]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

var ind_con = 0;
var ind_usu = 0;

    @if(!empty($shiftid))
        @if(isset($shiftid->typeshift_id))
            console.log("Información del turno: ", "{{ $shiftid->typeshift_id }}");
            @if($shiftid->typeshift_id == 15 )
                alert('La operación no se puede realizar');
                window.location.href = "{{ url('management/pdvi')}}";
            @else
                @if ($conBase)
                alert('La operación no se puede realizar');
                window.location.href = "{{ url('management/pdvi')}}";
                @endif
            // @if($shiftid->typeshift_id == 15 )
            //     window.location.href = "{{ url('management/pdvi')}}";
            // @elseif($shiftid->typeshift_id == 12)
            //     window.location.href = "{{ url('management/shiftclosure')}}";
            @endif

            @endif
        @endif
    @else    
        console.log("Información del turno: ", '{{ $shiftid }}');    
        alert('No se encontro informacion de su turno.');
        window.location.href = "{{ url('management/pdvi')}}";
    @endif    

jQuery(document).ready(function ($) {

    var table = $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist?contrato=0&usuario=0',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'created_at', name: 'created_at', title: "{{ __('Date System') }}"},
                {data: 'code', name: 'code', title: "{{ __('Type Payment') }}"},
                {data: 'description_payment', name: 'description_payment', title: "{{ __('Description Payment') }}"},
                {data: 'amount_payment', name: 'amount_payment', className: "text-right", title: "{{ __('Amount Payment') }}"},
                {data: 'name', name: 'name', title: "{{ __('User') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                     orderable: false, searchable: false}
            ],
            "order": [[1, "desc"]]
    });

    $(".btn-reset").on("click", function () {

        $('#contract_id').val(0);
        $('#contract_id').attr('disabled',false);
        $('#company_id').val(0);
        $('#company_id').attr('disabled',true);
        $('#user_id').val(0);
        $('#user_id').attr('disabled',true);
        $('.btn-consult').attr('disabled',false);
        $('.btn-reset').attr('disabled',true);
        $('#value').val('L '+formatNumber(0,0));

        table.ajax.url('/'+$('#url').val()+'/viewlist?contrato=0&usuario=0').load();

    });

    $("#type").on("change", function () {

        if ($('#type').val() == 20 ) {
            $('#description').val("Entrega de Dinero a Admon");
            $('#description').attr("readonly", true);
        }

        if ($('#type').val() == 21 ) {
            location.href=" {{ '/management/sistecreditpay' }}";
        }

    });

    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

});

</script>
@endsection