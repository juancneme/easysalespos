<?php $page_title = __('Orders from suppliers') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')


<input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
<!-- Current Oders -->
<div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Orders from suppliers') }}
        </div>
    
        <div class="panel-body">
            <table id="example" class="table table-striped table-en task-table">
            </table>
        </div>
</div>

<script>

jQuery(document).ready(function ($) {
    
    $(".task-table").DataTable({
        'ajax': '/' + $("#url").val() + '/viewlist',
        'stateSave': false,
        columns: [
            {data: 'created_at', name: 'created_at', title: "{{ __('created_at') }}"},
            {data: 'id', name: 'id', title: "{{__('Invoice Number')}}"},
            {data: 'proveedor.name', name: 'proveedor.name', title: "{{__('Supplier')}}"},
            {data: 'total_value', name: 'total_value', title: "{{__('Total Value')}}"},
            {data: 'user.name', name: 'user.name', title: "{{__('User')}}"},
            {data: 'estado.name', name: 'estado.name', title: "{{ __('Status') }}"},
            {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                orderable: false, searchable: false}
        ],
        "order": [[0, "asc"]]
    });
});


</script>

@endsection          