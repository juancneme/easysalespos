<?php $page_title = __('Manufacturer') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Manufacturer') }}</div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div class="form-group row">
                <label for="code" class="col-sm-3 col-form-label">{{ __('Code Manufacturer') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="code" id="code-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($manufacturerEdit) ? $manufacturerEdit->code : old('code') }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name Manufacturer') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($manufacturerEdit) ? $manufacturerEdit->name : old('name') }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="shortname" class="col-sm-3 col-form-label">{{ __('Shortname Manufacturer') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="shortname" id="shortname-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($manufacturerEdit) ? $manufacturerEdit->shortname : old('shortname') }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="order" id="order-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($manufacturerEdit) ? $manufacturerEdit->order : old('order') }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{__('Operator Code (only for services)')}}</label>
                <div class="col-sm-6">
                    <select class="form-control" id="operators"
                            name=" operators"<?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                        @if(empty($manufacturerEdit))
                            <option selected value="">N/A</option>
                            @foreach($manufacturerService as $value)
                                <option value="{{$value["idpartner"]}}">{{$value["name"]}}</option>
                            @endforeach
                        @elseif(!empty($manufacturerEdit))
                            <option selected value="">N/A</option>
                            @foreach($manufacturerService as $value)
                                <option
                                    <?= !empty($manufacturerEdit) && $manufacturerEdit->idpartner == $value["idpartner"] ? 'selected' : '' ?> value="{{$value["idpartner"]}}">{{$value["name"]}}</option>
                            @endforeach

                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
                <div class="col-sm-6">
                    <select name="status" id="estado-name" class="form-control select-status"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        <option
                            <?= !empty($manufacturerEdit) && $manufacturerEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option
                            <?= !empty($manufacturerEdit) && $manufacturerEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>

            @if(!empty($manufacturerEdit))
            <input type="hidden" name="proveedorId" value="{{ $manufacturerEdit->id }}"/>
            @endif

            {{--Agregar Imagen Manufacturer--}}
            @component('management.components.images.imagecomponent')
                @slot('image',$image)
                @slot('path',$path)
                @slot('nameId','proveedorId')
                @if(!empty($manufacturerEdit))
                    @slot('edit',$manufacturerEdit)
                @endif
                @if(!empty($perEdit))
                    @slot('perEdit',$perEdit)
                @endif
            @endcomponent
        </form>
    </div>
    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Manufacturer') }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>
            @component('management.components.modalImportExcel.modalImportExcel')
                @slot('page',$page)
                @slot('group',$group)
                @slot('units','')
                @slot('nametable','manufacturers')
                @slot('exceptionfields', '')
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
                    {data: 'id', name: 'id', title: "{{ __('ID') }}", visible: false, searchable: false},
                    {data: 'code', name: 'code', title: "{{ __('Code Manufacturer') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Name Manufacturer') }}"},
                    {data: 'shortname', name: 'shortname', title: "{{ __('Shortname Manufacturer') }}"},
                    {data: 'order', name: 'order', title: "{{ __('Order') }}"},
                    {data: 'status', name: 'status', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[0, "asc"]]
            });

            @if (!empty($manufacturerEdit) || count($errors) > 0);
            $(".btn-add").trigger("click");

            @endif

            function readURL(input) {
                if (input.files && input.files[0]) {

                    $("#image-view").hide();
                    $("#quitarimagen").removeAttr('disabled');

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    };
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
