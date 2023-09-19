<?php $page_title = __('Categories') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        <!-- New Form -->
        <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Categories') }}</div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div class="form-group row">
                <label for="contract" class="col-sm-3 col-form-label">{{ __('Contract') }}*</label>
                <div class="col-sm-6">
                    <select name="contract" id="contract-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($contracts as $contract)
                            <option
                                <?= !empty($categoriaEdit) && $categoriaEdit->contract_id == $contract->id ? 'selected' : '' ?> value="{{ $contract->id }}">{{ $contract->numbercontract.'-'.$contract->Persona->fullname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required value="{{ !empty($categoriaEdit) ? $categoriaEdit->name : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="shortname" class="col-sm-3 col-form-label">{{ __('Short Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="shortname" id="shortname-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required value="{{ !empty($categoriaEdit) ? $categoriaEdit->shortname : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="order" id="order-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required value="{{ !empty($categoriaEdit) ? $categoriaEdit->order : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>

                <div class="col-sm-6">
                    <select name="status" id="estado-name" class="form-control select-status"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                            required>
                        <option
                            <?= !empty($categoriaEdit) && $categoriaEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option
                            <?= !empty($categoriaEdit) && $categoriaEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>

            @if(!empty($categoriaEdit))
            <input type="hidden" name="categoryId" value="{{ $categoriaEdit->id }}"/>
            @endif

            {{--Agregar Imagen Categoria--}}
            @component('management.components.images.imagecomponent')
                @slot('image',$image)
                @slot('path',$path)
                @slot('nameId','cotegoryId')
                @if(!empty($categoriaEdit))
                    @slot('edit',$categoriaEdit)
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
        <div class="panel-heading">{{ __('Categories') }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>
            @component('management.components.modalImportExcel.modalImportExcel')
                @slot('page',$page)
                @slot('group',$group)
                @slot('units','0')  // LISTA DE UNIDADES DE VENTA
                @slot('nametable','categories')
                @slot('exceptionfields', 'image|status|idowner|master_id|typemodal')
            @endcomponent

        </div>

        <div class="panel-body">
            <table class="table table-striped table-en task-table">
            </table>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {

            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                    {data: 'contrato.numbercontract', name: 'Contrato.numbercontract', title: "{{ __('Contract') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                    {data: 'shortname', name: 'shortname', title: "{{ __('Short Name') }}"},
                    {data: 'order', name: 'order', title: "{{ __('Order') }}"},
                    {data: 'image', name: 'image', title: "{{ __('Image') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: true, searchable: true
                    }
                ],
                "order": [[0, "desc"]]
            });

            @if (!empty($categoriaEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");

//        $("#ocultarCargaImagen").show();
            @endif

            function readURL(input) {
                if (input.files && input.files[0]) {

                    $("#image-view").hide();
                    $("#quitarimagen").removeAttr('disabled');

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").change(function () {
                readURL(this);
            });

            $(document).on('click', "#quitarimagen", function () {
                $("#image-view").show();
                $("#quitarimagen").attr('disabled', 'disabled');
            });

        });
    </script>
@endsection
