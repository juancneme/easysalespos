<?php $page_title = __('Modules') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST"  autocomplete="off" class="form-horizontal" style="padding-right:15px; padding-left:15px">
        <div class="panel-heading">{{ __('Modules') }}</div>
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($modulesEdit) ? $modulesEdit->name : old('name') }}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="typelabel" class="col-sm-3 col-form-label">{{ __('Type Label') }}*</label>
            <div class="col-sm-6">
                <select name="typelabel" id="typelabel-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemstypelabel as $ItemsLists)
                    @if (!empty($modulesEdit))
                    <option <?= $modulesEdit->typelabel_id == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @else
                    <option <?= old('typelabel') == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="group_name" class="col-sm-3 col-form-label">{{ __('Group') }}*</label>
            <div class="col-sm-6">
                <select name="group_name" id="group_name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required disabled>
                    @foreach ($gruposmenu as $ItemsLists)
                    @if (!empty($modulesEdit))
                    <option <?= $modulesEdit->group_name == $ItemsLists->name ? 'selected' : '' ?> value="{{ $ItemsLists->name }}">{{ $ItemsLists->name }}</option>
                    @else
                    <option <?= old('group_name') == $ItemsLists->name ? 'selected' : '' ?> value="{{ $ItemsLists->name }}">{{ $ItemsLists->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="page_name" class="col-sm-3 col-form-label">{{ __('Page') }}</label>
            <div class="col-sm-6">
                <input type="text" name="page_name" id="page_name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required disabled value="{{ !empty($modulesEdit) ? $modulesEdit->page_name : old('page_name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="idowner" class="col-sm-3 col-form-label">{{ __('Id Owner') }}*</label>
            <div class="col-sm-6">
                <select name="idowner" id="idowner-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option value="0">{{ __('Root Menu') }}</option>
                    @foreach ($itemsidowner as $ItemsLists)
                    @if (!empty($modulesEdit))
                    <option <?= $modulesEdit->idowner == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @else
                    <option <?= old('idowner') == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="order" id="order-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($modulesEdit) ? $modulesEdit->order : old('order') }}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="icon" class="col-sm-3 col-form-label">{{ __('Icon') }}*</label>
            <div class="col-sm-6" style="border:1px solid #CED4DA; border-radius:5px; max-height: 120px">
                <select name="icon" id="icon-name"  data-live-search="true" class="form-control selectpicker" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option value="true" selected disabled>{{__('Select a icon')}}</option>
                    @foreach ($icons as $Icon)
                    @if (!empty($modulesEdit))
                    <option data-icon="fa {{ $Icon->name }}" <?= $modulesEdit->icon_id == $Icon->id ? 'selected' : '' ?> value="{{ $Icon->id }}">
                         - {{ $Icon->name }}</option>
                    @else
                    <option data-icon="fa {{ $Icon->name }}" <?= old('icon') == $Icon->id ? 'selected' : '' ?> value="{{ $Icon->id }}">
                         - {{ $Icon->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="status" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option <?= !empty($modulesEdit) && $modulesEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($modulesEdit) && $modulesEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-6">
                @if(!empty($modulesEdit))
                <input type="hidden" name="modulesId" value="{{ $modulesEdit->id }}" />
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i> 
                </button>
                <button type="submit" class="btn btn-primary" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i> 
                </button>
            </div>
        </div>

    </form>
    <hr style="border-color: #ccc" />
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Modules') }}

        <button type="button" class="btn btn-primary btn-add"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?> 
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i> 
        </button>

    </div>

    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>


<script>
jQuery(document).ready(function ($) {

    $(".task-table").DataTable({
        'ajax': '/' + $('#url').val() + '/viewlist',
            columns: [
            {data: 'id', name: 'id', title: "{{ __('Id') }}"},
            {data: 'name', name: 'name', title: "{{ __('Name') }}"},
            {data: 'group_name', name: 'group_name', title: "{{ __('Group') }}"},
            {data: 'page_name', name: 'page_name', title: "{{ __('Page') }}"},
            {data: 'type_label.name', name: 'TypeLabel.name', title: "{{ __('Type Label') }}"},
            {data: 'order', name: 'order', title: "{{ __('Order') }}"},
            {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
            {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
    });

    @if (!empty($modulesEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        if ($("#typelabel-name").val() != 51 ){
            $("#group_name").attr('disabled',false);
            $("#page_name").attr('disabled',false);
        }
    @endif

    @if (!empty($modulesEdit) || count($errors) > 0)
    @endif
        
    if ($("#typelabel-name").val() == 51 ){
        $("#group_name").val('');
        $("#page-name").val('');
        $("#group_name").attr('disabled',true);
        $("#page-name").attr('disabled',true);
    }
        
    $("#typelabel-name").on("change", function (event) {
        
        console.log($("#typelabel-name").val());
        if ($("#typelabel-name").val() == 51 ){
            <!--Agrupador de Opciones-->
            $("#group_name").val('');
            $("#page_name").val('');
            $("#group_name").attr('disabled',true);
            $("#page_name").attr('disabled',true);
        }
        else {
            <!--Lanzador de Modulo-->
            $("#group_name").attr('disabled',false);
            $("#page_name").attr('disabled',false);
        }

    });
        
});
</script>


@endsection

