<?php $page_title = __('Orders') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

    <div class="collapse show" id="collapseTwo">
            <div class="panel panel-default" style="margin-top: 110px;">
                    <div class="panel-heading">{{ __('Orders') }}
                    </div>
                <form action="/{{ strtolower( $group . '/' . $page.'/makeorden') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel-body">
                        <table  class="table table-striped table-en task-table">
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success btn-rounded btn-lg">Realizar pedido</button>
                </form>
            </div>

    </div>

<script>

        jQuery(document).ready(function ($) {
    
            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                'stateSave': false,
                columns: [
                    {data: 'created_at', name: 'created_at', title: "{{ __('created_at') }}"},
                    {data: 'invoice_number', name: 'invoice_number', title: "{{__('Invoice Number')}}"},
                    {data: 'comercio.name', name: 'comercio.name', title: "{{__('Company')}}"},
                    {data: 'total_value', name: 'total_value', title: "{{__('Total Value')}}"},
                    {data: 'user.name', name: 'user.name', title: "{{__('User')}}"},
                    {data: 'client', name: 'client', title: "{{__('Client')}}"},
                    {data: 'estado.name', name: 'estado.name', title: "{{ __('Status') }}"},
                    {data: 'checkbox', name: 'checkbox', title: "{{ __('Selection') }}"},
                    {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false}
                ],
                "order": [[0, "asc"]]
            });

        });
</script>

@endsection