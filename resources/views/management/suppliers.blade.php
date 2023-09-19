<?php $page_title = __('Suppliers') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <form action="/{{ $group . '/' . $page }}" method="POST"  autocomplete="off"  enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Suppliers') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Persons Supplier') }}*</label>
            <div class="col-sm-6">
                <select name="person" id="persona-name" class="form-control" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    @foreach ($persons as $person)
                    <option <?= !empty($supplierEdit) && $supplierEdit->persona_id == $person->id ? 'selected' : '' ?> value="{{ $person->id }}">{{ $person->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name Supplier') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-name" class="form-control"
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                       required value="{{ !empty($supplierEdit) ? $supplierEdit->name : old('name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="shortname" class="col-sm-3 col-form-label">{{ __('Short Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="shortname" id="shortname-name" class="form-control"
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                       required value="{{ !empty($supplierEdit) ? $supplierEdit->shortname : old('shortname') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="order" id="order-name" class="form-control"
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                       required value="{{ !empty($supplierEdit) ? $supplierEdit->order : old('order') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control select-status" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option <?= !empty($supplierEdit) && $supplierEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($supplierEdit) && $supplierEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="contract" class="col-sm-3 col-form-label">{{ __('Contrato') }}*</label>
            <div class="col-sm-6">
                <select name="contract" id="contrato-name" class="form-control "
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>required>
                    @foreach ($contratos as $contrato)
                        <option
                            <?= !empty($supplierEdit) && $supplierEdit->contract_id == $contrato->id ? 'selected' : '' ?>  
                            value="{{ $contrato->id }}">{{ $contrato->numbercontract.'-'.$contrato->TypeContract->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        @if(!empty($supplierEdit))
        <input type="hidden" name="supplierId" value="{{ $supplierEdit->id }}"/>
        @endif

        {{--Agregar Imagen Supplier--}}
        @component('management.components.images.imagecomponent')
            @slot('image',$image)
            @slot('path',$path)
            @slot('nameId','supplierId')
            @if(!empty($supplierEdit))
                @slot('edit',$supplierEdit)
            @endif
            @if(!empty($perEdit))
                @slot('perEdit',$perEdit)
            @endif
        @endcomponent
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Suppliers') }}

        <button type="button" class="btn btn-primary btn-add"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i>
        </button>
        @component('management.components.modalImportExcel.modalImportExcel')
            @slot('page',$page)
            @slot('group',$group)
            @slot('units','0')  // LISTA DE UNIDADES DE VENTA
            @slot('nametable','suppliers')
            @slot('exceptionfields', 'image|status|')
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
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'nompersona', name: 'nompersona', title: "{{ __('Persons Supplier') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name Supplier') }}"},
                {data: 'shortname', name: 'shortname', title: "{{ __('Short Name') }}"},
                {data: 'order', name: 'order', title: "{{ __('Order') }}"},
                {data: 'status', name: 'status', title: "{{ __('Status') }}"},
                {data: 'contrato.numbercontract', name: 'Contrato.numbercontract', title: "{{ __('Contrato') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($supplierEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif
    });

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

    $("#image").change(function(){
        readURL(this);
    });

    $(document).on('click',"#quitarimagen",function(){
        $("#image-view").show();
        $("#quitarimagen").attr('disabled','disabled');
    });

</script>
@endsection
