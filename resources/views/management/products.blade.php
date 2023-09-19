<?php $page_title = __('Products') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">
        <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Products') }}</div>


            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="url" type="hidden" name="url" value="{{ $group . '/' . $page }}">

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->name : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="shortname" class="col-sm-3 col-form-label">{{ __('Short Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="shortname" id="shortname-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->shortname : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="manufacturer" class="col-sm-3 col-form-label">{{ __('Supplier') }}*</label>
                <div class="col-sm-6">
                    <select name="manufacturer" id="manufacturer-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($manufacturers as $manufacturer)
                            <option
                                <?= !empty($productEdit) && $productEdit->manufacturer_id == $manufacturer->id ? 'selected' : '' ?> value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="order" id="order-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->order : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="barcode" class="col-sm-3 col-form-label">{{ __('Barcode') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="barcode" id="barcode-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->barcode : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="salesunit" class="col-sm-3 col-form-label">{{ __('Sales Unit') }}*</label>
                <div class="col-sm-6">
                    <select name="salesunit" id="salesunit-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($salesunits as $salesunit)
                            <option
                                <?= !empty($productEdit) && $productEdit->salesunit_id == $salesunit->id ? 'selected' : '' ?> value="{{ $salesunit->id }}">{{ $salesunit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="purchaseprice" class="col-sm-3 col-form-label">{{ __('Purchase Price') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="purchaseprice" id="purchaseprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->purchaseprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Sales Price') }} *</label>
                <div class="col-sm-6">
                    <input type="text" name="saleprice" id="saleprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productEdit) ? $productEdit->saleprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="localtaxonomy" class="col-sm-3 col-form-label">{{ __('Local Taxonomy') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="localtaxonomy" id="localtaxonomy-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($productEdit) ? $productEdit->localtaxonomy : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Categoria') }}*</label>
                <div class="col-sm-6">
                    <select name="category" id="category" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($categories as $category)
                            <option
                                <?= !empty($productEdit) && $productEdit->category_id == $category->id ? 'selected' : '' ?> value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
                <div class="col-sm-6">
                    <select name="status" id="estado-name" class="form-control select-status"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        <option
                            <?= !empty($productEdit) && $productEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option
                            <?= !empty($productEdit) && $productEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>
            
            @if(!empty($productEdit))
            <input type="hidden" name="productId" value="{{ $productEdit->id }}"/>
            @endif

            {{--Agregar Imagen Categoria--}}
            @component('management.components.images.imagecomponent')
                @slot('image',$image)
                @slot('path',$path)
                @slot('nameId','productId')
                @if(!empty($productEdit))
                    @slot('edit',$productEdit)
                    @slot('scrCustom',$productEdit->picture->name)
                @endif
                @if(!empty($perEdit))
                    @slot('perEdit',$perEdit)
                @endif
            @endcomponent
            <!-- Add Task Button -->
        </form>

    </div>
    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Products') }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>
            @component('management.components.modalImportExcel.modalImportExcel')
                @slot('page',$page)
                @slot('group',$group)
                @slot('units','53')  // LISTA DE UNIDADES DE VENTA
                @slot('nametable','products')
                @slot('exceptionfields', 'idpartner|idowner|typemodal|master_id|localtaxonomy|products_picture_id')
            @endcomponent
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-en task-table">
            </table>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            console.log($("#url").val())
            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'fabricante.name', name: 'fabricante.name', title: "{{ __('Manufacturer') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                    {data: 'purchaseprice', name: 'purchaseprice', title: "{{ __('Purchase Price') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[0, "asc"]]
            });

            @if (!empty($productEdit) || count($errors) > 0)
                $(".btn-add").trigger("click");
                //$("#ocultarCargaImagen").show();
            @endif

        });
    </script>
@endsection
