<?php $page_title = __('Start Inventory') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    @if (session('message'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
    @endif

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
          class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}:
            {{ $catalog }} - {{ $namecatalog }}
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="catalog" id="catalog" value="{{ $catalog }}">
        <input type="hidden" name="productid" value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->id : '' }}"/>

        <div class="form-group row">
            <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Sales Price') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="saleprice" id="saleprice-name" class="form-control"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                       value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->saleprice : '' }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label">{{ __('Available quantity') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="quantity" id="quantity-name" class="form-control"
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                       value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->availablequantity : '' }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control select-status"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option
                        <?= !empty($catalogproductEdit) && $catalogproductEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option
                        <?= !empty($catalogproductEdit) && $catalogproductEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        {{--Agregar Imagen User--}}
        <div class="form-group row" id="ocultarCargaImagen">


                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style=" max-height: 200px;"></div>
                    <div style="height: 30px"></div>

                    <div class="row">


                        <div style="height:42px"></div>
                        <!-- Add Task Button -->

                        <div class="col-md-12">
                            @if(!empty($catalogproductEdit))
                            <div style="height: 8px"></div>
                            <input type="hidden" name="catalogproductId" value="{{ $catalogproductEdit->id }}"/>
                            @endif
                            <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
                                    data-toggle="tooltip"
                                    title="{{ __('Cancel') }}">
                                <i class="fa fa-reply"></i>
                            </button>
                            <button type="submit" class="btn btn-primary"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                                    data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                                <i class="fa fa-save"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Catalog') }}: {{ $catalog }}
        - {{ $namecatalog }}

        <button type="button" class="btn btn-primary btn-add"
            style="display: none"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i>
        </button>
        @component('management.components.modalImportExcel.modalImportExcel')
            @slot('page',$page)
            @slot('group',$group)
            @slot('units','53')  // LISTA DE UNIDADES DE VENTA
            @slot('nametable','inventory')
            @slot('exceptionfields', 'company_id|contract_id|switch|status|average_cost')
            @slot('catalog', $catalog)
        @endcomponent
        
    </div>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-en task-table">
            </table>
        </div>
    </div>
</div>

<script>
    var id = 0;


    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'serverSide': true,
            'ajax': '/' + $("#url").val() + '/viewlist?id={{ $catalog }}',
            'processing': false,
            'rowId': 'id',
            'stateSave': false,
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}", "visible": false},
                {data: 'name', name: 'name', title: "{{ __('Product') }}"},
                {data: 'purchaseprice', name: 'purchaseprice', title: "{{ __('Purchase Price') }}"},
                {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                {data: 'salesUnit', name: 'salesUnit', title: "{{ __('Sales Unit') }}"},
                {data: 'availablequantity', name: 'availablequantity', title: "{{ __('Available Quantity') }}"},
                {data: 'barcode', name: 'barcode', title: "{{ __('Barcode') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {
                    data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false
                }
            ],
            "order": [[0, "asc"]]
        });


    @if (!empty($catalogproductEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
//        $("#ocultarCargaImagen").show();
    @endif

        $(".btn-cancel").on('click', function () {
            location.href = "/" + $("#url").val() + "/?id={{ $catalog }}";
        });

        $("#btnsave").on('click',function(){
            console.log("bien men");
        });
    });


    $('.task-table').on('click', 'tr ', function () {
        var table = $('.task-table').DataTable();
        id = table.row($(this)).id();
    } );

    function clic(){
    }

    function save(){
        var token = '{{csrf_token()}}';
        var table = $('.task-table').DataTable();

        $.ajax({
            url: '/management/inventorycatalogsproducts/ajax?type=edit',
            type: 'post',
            data: {
                'purchaseprice': $('#purchaseprice'+id).val(),
                'saleprice': $('#saleprice'+id).val(),
                'quantity': $('#quantity'+id).val(),
                'id': id,
                _token: token
            },
            success: function (response) {
                res = JSON.parse(response);
                table.draw();
            }
        });

    }


</script>

@endsection
