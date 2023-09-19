<?php $page_title = __('ItemsSales') ?>
@extends('pike_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<form action="/{{ strtolower($group . '/' . 'sales') }}" method="GET"  autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ $page_title }} {{ __('Sale')}}:  {{ $transaction }}
        </div>

        <div class="panel-body">
            <table class="table table-striped table-en task-table">
            </table>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                <a  href="javascript:history.back()" class="btn btn-primary " data-placement="top" 
                    data-toggle="tooltip" title="{{ __('Return') }}">
                    <i class="fa fa-reply"></i> 
                </a>
            </div>
        </div>

    </div>
</form>

<script>
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist?transactionId={{ $transaction }}',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'producto.name', name: 'producto.name', title: "{{ __('Product') }}"},
                {data: 'unit_price', name: 'unit_price', className: "text-right", title: "{{ __('Price Unit') }}"},
                {data: 'tax_iva', name: 'tax_iva', title: "{{ __('Tax IVA') }}"},
                {data: 'quantity', name: 'quantity', title: "{{ __('Quantity') }}"},
                {data: 'partial_price', name: 'partial_price', className: "text-right", title: "{{ __('Partial Price') }}"},
                {data: 'iva_value', name: 'iva_value', className: "text-right", title: "{{ __('Tax') }}"},
                {data: 'total_price', name: 'total_price', className: "text-right", title: "{{ __('Price Total') }}"},
                // {data: 'total_value', name: 'total_value', title: "{{ __('Total Value') }}"},
                // {data: 'estado', name: 'status', title: "{{ __('Status') }}"},
                // {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                //     orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

    });
</script>
@endsection