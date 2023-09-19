<?php $page_title = __('ItemsLists') ?>
@extends('pike_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <form action="/{{ $group . '/' . $page }}" method="POST"   autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div class="panel-heading">{{ $page_title }}: {{ $idowner }} - {{ $namelist }}</div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idowner" id="idowner" value="{{ !empty( $idowner ) ? $idowner : -1  }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($listsEdit) ? $listsEdit->name : old('name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="code" class="col-sm-3 col-form-label">{{ __('Code') }} </label>
            <div class="col-sm-6">
                <input type="text" name="code" id="code-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> value="{{ !empty($listsEdit) ? $listsEdit->code : old('code') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }}*</label>
            <div class="col-sm-6">
                <input type="integer" name="order" id="order-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($listsEdit) ? $listsEdit->order : old('order') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="status-name" class="form-control select-status" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option <?php !empty($listsEdit) && $listsEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?php !empty($listsEdit) && $listsEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($listsEdit))
                <input type="hidden" name="listsId" value="{{ $listsEdit->id }}" />
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
    <div class="panel-heading">{{ $page_title }}:  {{ $idowner }} - {{ $namelist }}
    
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
            'ajax': '/' + $("#url").val() + '/viewlist?idowner={{ $idowner }}',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('My ID') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'order', name: 'order', title: "{{ __('Order') }}"},
                {data: 'estado', name: 'status', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($listsEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif
        
        $(".btn-cancel").on('click', function () {
            location.href='/' + $("#url").val() + '/?idowner={{ $idowner }}';
        });
        
    });
</script>
@endsection