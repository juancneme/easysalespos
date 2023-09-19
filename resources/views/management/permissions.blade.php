<?php $page_title = __('Permissions') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div class="panel-heading">{{ __('Permissions') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($permissionEdit) ? $permissionEdit->name : old('name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="display_name" class="col-sm-3 col-form-label">{{ __('Display Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="display_name" id="display_name" required class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> value="{{ !empty($permissionEdit) ? $permissionEdit->display_name : old('display_name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="description" id="description" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($permissionEdit) ? $permissionEdit->description : old('description') }}" />
            </div>
        </div>
        
        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Public') }}*</label>
            <div class="col-sm-6">
                <select name="public" id="public-name" style="width:100%" class="js-states form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option value="1">{{ __('Yes') }}</option>
                    <option value="0">{{ __('No') }}</option>
                </select>
            </div>
        </div>
        

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($permissionEdit))
                <input type="hidden" name="permissionId" value="{{ $permissionEdit->id }}" />
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
    <div class="panel-heading">{{ __('Permissions') }}

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

        var table = $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'display_name', name: 'display_name', title: "{{ __('Display Name') }}"},
                {data: 'description', name: 'description', title: "{{ __('Description') }}"},
                {data: 'public', name: 'public', title: "{{ __('Public') }}", render: function(data, type, full, meta){
                    ret = '';
                    if(data == '1') {
                        ret = '<button class="activate" data-id="'+full[0]+'" style="border: none; background: transparent;"><i class="result img-circle alert-success fa fa-check"></i></button>';
                    }else {
                        ret = '<button class="deactivate" data-id="'+full[0]+'" style="border: none; background: transparent;"><i class="result img-circle alert-error fa fa-times"></i></button>';
                    }
                    return ret;
                }},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}", orderable: false, searchable: false}
            ],
            "order": [[0, "desc"]]
        });
        
        table.on( 'draw.dt', function () {
            $(".activate, .deactivate").on('click', function(){
                $.ajax({
                    url: '/' + $("#url").val() + '/activate',
                    type: 'post',
                    data: {
                        "id": $(this).attr('data-id'),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(result){
                        table.draw();
                    }
                });
            });
        });

        @if (!empty($permissionEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif
        
        var $public = $("#public-name").select2().val('');
        $public.change();
        @if(!empty($permissionEdit))
            $public.select2().val('{{ $permissionEdit->public }}');
            $public.change();
        @endif
        
    });
</script>
@endsection