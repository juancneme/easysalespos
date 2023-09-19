<?php $page_title = __('Catalogs') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <form action="/{{ $group . '/' . $page }}" onsubmit="return false;" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <div id="divName" style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Product') }}</div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="id" id="id-field">
            <input type="hidden" name="catalog_id" id="id-catalog" value="{{$catalogonuevo}}">
            <input type="hidden" name="catalog_id_master" id="master-catalog" value="{{$catalog}}">

            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div class="form-group row">
                <label for="supplier" class="col-sm-3 col-form-label">{{ __('Distributor') }} *</label>
                <div class="col-sm-6">
                    <select name="supplier" id="supplier-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($suppliers as $supplier)
                            <option
                                <?= !empty($catalogproductEdit) && $catalogproductEdit->supplier_id == $supplier->id ? 'selected' : '' ?> value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Sales Price') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="saleprice" id="saleprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->saleprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Available Quantity') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="quantity" id="quantity-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->availablequantity : '' }}"/>
                </div>
            </div>

            <!-- Add Task Button -->
            <div style="height:42px"></div>
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                    @if(!empty($promotionEdit))
                        <div style="height: 8px"></div>
                        <input type="hidden" name="catalogId" value="{{ $promotionEdit->id }}" />
                    @endif

                    <button id="btn-back" type="button" class="btn btn-primary" data-placement="top"
                            data-toggle="tooltip" title="{{ __('Cancel') }}"> <i class="fa fa-reply"></i>
                    </button>

                    <button id="btn-save" class="btn btn-primary" data-placement="top"
                            data-toggle="tooltip" title="{{ __('Save Changes') }}"><i class="fa fa-save"></i>
                    </button>

                </div>
            </div>
        </form>
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}: {{ $catalog }}
            {{ $namecatalog }} (CATALOGO FUENTE)

            <button hidden type="button" class="btn btn-primary btn-add" 
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip"
                title="{{ __('Add') }}"><i class="fa fa-plus"></i>
            </button>
            
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-en task-table "></table>
            </div>
        </div>

    </div>

    <script>
        jQuery(document).ready(function ($) {

            table = $(".task-table").DataTable({
                'processing': false,
                'searchable': false,
                'orderable': false,
                'stateSave': false,
                'rowId': 'id',
                'dom': 'Blfrtip',
                'buttons': [
                    'selectAll',
                    // 'selectNone',
                ],
                'ajax': '/' + $("#url").val() + '/viewlist?id={{ $catalog }}&cat={{$catalogonuevo}}',
                columns: [
                    {data: 'id', name: 'id', title: "{{ __('ID') }}", "visible": false},
                    {data: 'catalogo.name', name: 'Catalogo.name', title: "{{ __('Catalog') }}"},
                    {data: 'categoria.name', name: 'Categoria.name', title: "{{ __('Category') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Product') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                    {data: 'image', name: 'image', title: "{{ __('Image') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}", visible: false,
                        targets: 0,
                        'searchable': false,
                        'orderable': false,
                        'checkboxes': {
                            'selectRow': false
                        }
                    }
                ],
                'select': {
                    'style': 'multi',

                },

                "order": [[0, "asc"]],

            });

            selectRowCheck();
        });

        function selectRowCheck() {
            $(".task-table").on('click', 'tr', function () {
                var table = $('.task-table').DataTable();
                var token = '{{csrf_token()}}';
                var id = table.row($(this)).id();
                var data = table.rows(this).nodes();

                $.ajax({
                    url: '/' + $("#url").val()+"/ajax?type=selectProduct",
                    type: 'post',
                    data: {
                        'id': id,
                        _token: token
                    },
                    success: function (response) {
                        res = JSON.parse(response);
                        var supplier = res.data.supplier_id;
                        var saleprice = res.data.saleprice;
                        var name = res.data.name;

                        $(".btn-add").trigger("click");

                        //Save id in a input
                        $("#id-field").val(id);

                        //Show product name
                        $("#divName").text(name);

                        //Update select value
                        $("#supplier-name").val(supplier);
                        $("#supplier-name").trigger('change');

                        //Update saleprice value
                        $("#saleprice-name").val(saleprice);

                        //Update quantity value
                        $("#quantity-name").val(0);
                    }
                });
            });
        }

        $("#btn-save").on('click', function () {
            var token = '{{csrf_token()}}';
            var table = $('.task-table').DataTable();

            $.ajax({
                url: '/' + $("#url").val()+"/ajax?type=saveProduct",
                type: 'post',
                data: {
                    'id': $("#id-field").val(),
                    'supplier': $("#supplier-name").val(),
                    'saleprice':  $("#saleprice-name").val(),
                    'quantity': $("#quantity-name").val(),
                    'catalog': $("#id-catalog").val(),
                    'master': $("#master-catalog").val(),
                    _token: token
                },
                success: function (response) {
                    res = JSON.parse(response);

                    table.draw();
                    $(".form-add").hide();
                    $(".panel-default").show();
                }
            });
        });

        $("#btn-back").on('click', function () {
            $(".form-add").hide();
            $(".panel-default").show();
        });


    </script>

@endsection
