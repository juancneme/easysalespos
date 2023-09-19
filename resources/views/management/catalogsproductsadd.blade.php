<?php $page_title = __('Catalogs') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
</div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}: {{ __('Catalog Master') }}
       
               
    
        </div>
    
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-en task-table">
                </table>
            </div>
        </div>
    </div>
    
<script>
        
        jQuery(document).ready(function ($) {

            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist?cat={{ $catalog }}',
                'stateSave': false,
                columns: [
                    {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                    {data: 'contrato.numbercontract', name: 'contrato.numbercontract', title: "{{ __('Contract') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                    {data: 'description', name: 'description', title: "{{ __('Description') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false}
                ],
                "order": [[0, "asc"]]
            });
        });
</script>

@endsection
