<?php $page_title = __('Credit Management') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <form action="/{{ $group . '/' . $page }}" method="POST"  autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div class="panel-heading">{{ __('Lists') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    </form>
    <hr style="border-color: #ccc" />
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Credit Management') }}
    </div>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>
@if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
            </div>
@endif

<!-- Confirm Modal-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#F5F5DC">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <div class="modal-body" style="display:flex; justify-content: center;">
                <label id="lbmensaje" class="col-form-label"></label>
            </div>

            <div id="footer" class="modal-footer" style="display: inline-table;">

            </div>
        </div>
    </div>
</div>

@include('management.components.pdvi.pdviModalConfirmation')

<script>
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({

            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'transaction_id', name: 'transaction_id', title: "{{ __('Sale') }}"},
                {data: 'info_client', name: 'info_client', title: "{{ __('Client') }}"},
                {data: 'authorization_code', name: 'authorization_code', title: "{{ __('Approval Date') }}"},
                {data: 'receipt_number', name: 'receipt_number', title: "{{ __('Collection Date') }}"},
                {data: 'amount', name: 'amount', className: "text-right", title: "{{ __('Credit Value') }}"},
                {data: 'status', name: 'status', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: true, searchable: true,}
            ],
            "order": [[0, "desc"]],
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                }]
        });

    });

    function recaudarCredito(id){
        //let value = $(this).attr("data-id");
        $('#lbmensaje').text('¿Estas seguro de recaudar este credito?');
        $("#confirmModal").modal("show");
        $("#footer").html('<a href="/management/creditmanagement/recaudarCredito/' + id + '" class="btn btn-primary" data-placement="top"" style="width:100%" >{{__('Aceptar')}}</a> <br><br> <div style="display: flex;justify-content: flex-end;"> <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Cancel')}}</button> </div>')
    }

</script>

@endsection
