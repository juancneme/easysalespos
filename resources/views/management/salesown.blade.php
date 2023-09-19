<?php $page_title = __('Sales') ?>
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
    <div class="panel-heading">Mis {{ __('Sales') }}
    </div>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>

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
                {data: 'pivot', name: 'pivot', title: "{{ __('PV') }}"},
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'invoice_number', name: 'invoice_number', title: "{{ __('Numero Factura') }}"},
                {data: 'contrato.numbercontract', name: 'Contrato.numbercontract', orderable: false, title: "{{ __('Contrato') }}"},
                {data: 'comercio.name', name: 'Comercio.name', orderable: false, title: "{{ __('Company') }}"},
                {data: 'user.name', name: 'User.name', title: "{{ __('Cashier') }}"},
                {data: 'seller.name', name: 'Seller.name', title: "{{ __('Seller') }}"},
                {data: 'operation_date', name: 'operation_date', title: "{{ __('Date Sale') }}"},
                {data: 'shiftmanagement_id', name: 'shiftmanagement_id', title: "{{ __('Turn') }}"},
                {data: 'type', name: 'type', title: "{{ __('Type') }}"},
                {data: 'info_client', name: 'info_client', title: "{{ __('Client') }}"},
                {data: 'total_value', name: 'total_value', className: "text-right", title: "{{ __('Total Value') }}"},
                {data: 'estado.name', name: 'status', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: true, searchable: true,}
            ],
            "order": [[12, "asc"],[1, "desc"]],
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                }]
        });

    });

    function onEditConfirmation(ele) {
        $('#modalConfirmation').modal('show');
        $('#modalConfirmation').find('.modal-body').empty();
        $('#modalConfirmation').find('.modal-body').append( "{{ __('When you resume the next sale will be permanently removed, do you want to continue?') }}");
        $(".edit-sale").attr("href", "{{ $edit }}"+$(ele).data("id"));
    }

    function rejectSale(id) {
        let value = $(this).attr("data-id");

        $('#lbmensaje').text('¿Desea rechazar la venta?');
        $("#confirmModal").modal("show");
        $("#footer").html('<a href="/management/sales/rejectTransaction/' + id + '" class="btn btn-primary" data-placement="top"" style="width:100%" >{{__('Accept')}}</a> <br><br> <div style="display:flex; justify-content:flex-end;"><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()" >{{ __('Close') }} </button></div>')
    }

</script>
@include('management.pdviJS.pdvi_impresion')

@endsection
