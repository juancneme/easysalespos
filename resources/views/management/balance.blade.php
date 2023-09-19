<?php $page_title = __('Movements to Accounts') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<form action="/{{ $group . '/' . $page }}" method="POST"  role="form" 
      autocomplete="off" class="form-horizontal" 
      style="padding-right: 15px; padding-left: 15px; margin-top: 104px;">
    <div class="panel-heading">{{ __('Movements') }}</div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

    <div class="form-group row">

        <label for="contrato_id" class="col-sm-1 col-form-label">{{ __('Contract') }}*</label>
        <div class="col-sm-3">
            <select name="contract_id" id="contract_id" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required >
                <option value="0" disabled selected>{{__('Select a contract')}}</option>
                @foreach ($contracts as $contrato)
                <option <?= old('contract_id') == $contrato->id ? 'selected' : '' ?> value="{{ $contrato->id }}">{{ $contrato->numbercontract }} - {{ $contrato->nombrecompleto }}</option>
                @endforeach
            </select>
        </div>

        <label for="company_id" class="col-sm-1 col-form-label">{{ __('Company') }}*</label>
        <div class="col-sm-3">
            <select name="company_id" id="company_id" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required >
                <option value="0" disabled selected>{{__('Select a company')}}</option>
            </select>
        </div>

        <label for="user_id" class="col-sm-1 col-form-label">{{ __('User ID') }}</label>
        <div class="col-sm-2">
            <select name="user_id" id="user_id" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                <option value="0" disabled selected>{{__('Select a user')}}</option>
            </select>
        </div>
    </div>

    <div class="form-group row">

        <label for="value" class="col-sm-1 col-form-label">{{ __('Value Balance') }}</label>
        <div class="col-sm-2" >
            <input type="text" name="value" id="value" class="form-control" disabled style="text-align: right"
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                    value="{{'$ '.number_format(0,0)}}">
        </div>

    </div>
    
    <!-- Add Task Button -->
    <div class="form-group row">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary btn-consult" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('Add Deposit') }}">
                <i class="">{{ __('Consult') }}</i> 
            </button>
            <button type="button" class="btn btn-success btn-reset" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('Add Deposit') }}">
                <i class="">{{ __('New Consutl') }}</i> 
            </button>
        </div>
    </div>

</form>
<hr style="border-color: #ccc" />

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 0px;">
    <div class="panel-heading">{{ __('Transaction Detail') }}
    </div>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>

<script>

var ind_con = 0;
var ind_usu = 0;

jQuery(document).ready(function ($) {

    var table = $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist?contrato=0&compania=all&usuario=all',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'created_at', name: 'created_at', title: "{{ __('Date System') }}"},
                {data: 'code', name: 'code', title: "{{ __('Type Payment') }}"},
                {data: 'description_payment', name: 'description_payment', title: "{{ __('Description Payment') }}"},
                {data: 'amount_payment', name: 'amount_payment', className: "text-right", title: "{{ __('Amount Payment') }}"},
                //{data: 'date_payment', name: 'date_payment', title: "{{ __('Date Payment') }}"},
                {data: 'name', name: 'name', title: "{{ __('User') }}"}
                //{data: 'action', name: 'action', title: "{{ __('Actions') }}",
                //      orderable: false, searchable: false}
            ],
            "order": [[1, "desc"]]
    });

    $("#contract_id").on("change", function () {

        var $options = $();
        var $contratosel = $('#contract_id').val();

        $.ajax({
            url: '/' + $("#url").val() + '/ajax?type=findcompany',
            type: 'get',
            data: {
                "contrato": $contratosel
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                if(res.success){
                    $options = $options.add($("<option disabled>").attr('value', null).html( '{{ __("Select a company") }}' ));
                    $options = $options.add($("<option selected>").attr('value', 'all').html( '{{ __("All Companies") }}' ));
                    if (res.data != ''){
                        $.each(res.data,function(index, datas){
                            $options = $options.add($("<option>").attr('value', datas.id).html( datas.id+' - '+datas.name ));
                        });
                    }
                    $('#company_id').attr('disabled',false);
                    $('#company_id').html($options).trigger('change');

                    $options = $();
                    $options = $options.add($("<option disabled>").attr('value', 0).html( '{{ __("Select a user") }}' ));
                    $options = $options.add($("<option selected>").attr('value', 'all').html( '{{ __("All Users") }}' ));
                    $('#user_id').html($options).trigger('change');

                }
            }
        });

    });

    $("#company_id").on("change", function () {

        var $options = $();
        var $contratosel = $('#contract_id').val();
        var $companiasel = $('#company_id').val();

        if ( $companiasel != 'all' && $companiasel != null ) {

            $.ajax({
                url: '/' + $("#url").val() + '/ajax?type=findusers',
                type: 'get',
                data: {
                    "contrato": $contratosel,
                    "compania": $companiasel
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);
                    if(res.success){
                        $options = $options.add($("<option disabled>").attr('value', 0).html( '{{ __("Select a user") }}' ));
                        $options = $options.add($("<option selected>").attr('value', 'all').html( '{{ __("All Users") }}' ));
                        if (res.data != ''){
                            $.each(res.data,function(index, datas){
                                $options = $options.add($("<option>").attr('value', datas.id).html( datas.id+' - '+datas.name ));
                            });
                        }
                        $('#user_id').attr('disabled',false);
                        $('#user_id').html($options).trigger('change');
                    }
                }
            });

        }

    });

    $(".btn-consult").on("click", function () {

        var $contratosel = $('#contract_id').val();
        var $companiasel = $('#company_id').val();
        var $usuariosel  = $('#user_id').val();

        if ($contratosel != 0 && $contratosel != null ) {
            console.log('/'+$('#url').val()+'/viewlist?contrato='+$contratosel+'&compania='+$companiasel+'&usuario='+$usuariosel);
            table.ajax.url('/'+$('#url').val()+'/viewlist?contrato='+$contratosel+'&compania='+$companiasel+'&usuario='+$usuariosel).load();

            $.ajax({
                url: '/' + $("#url").val() + '/ajax?type=findbalance',
                type: 'get',
                data: {
                    "contrato": $contratosel,
                    "compania": $companiasel,
                    "usuario": $usuariosel
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);
                    if(res.success){
                        if (res.data != ''){
                            $('#value').val('$ '+formatNumber(res.data,0));
                        }
                    }
                }
            });
        }

        $('#contract_id').attr('disabled',true);
        $('#company_id').attr('disabled',true);
        $('#user_id').attr('disabled',true);
        $('.btn-consult').attr('disabled',true);
        $('.btn-reset').attr('disabled',false);

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
        $('#value').val('$ '+formatNumber(0,0));

        table.ajax.url('/'+$('#url').val()+'/viewlist?contrato=0&compania=all&usuario=all').load();

    });

    $('#contract_id').val(0);
    $('#contract_id').attr('disabled',false);
    $('#company_id').val(0);
    $('#company_id').attr('disabled',true);
    $('#user_id').val(0);
    $('#user_id').attr('disabled',true);
    $('.btn-consult').attr('disabled',false);
    $('.btn-reset').attr('disabled',true);
    $('#value').val('$ '+formatNumber(0,0));

    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    
});
</script>
@endsection