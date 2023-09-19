<?php $page_title = __('Connections') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Connections') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label" >{{ __('Name') }} *</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-id" class="form-control" required
                       value="{{ !empty($connectionEdit) ? $connectionEdit->name : old('name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="url" class="col-sm-3 col-form-label">{{ __('Url') }} </label>
            <div class="col-sm-6">
                <input type="text" name="url" id="url-id" class="form-control"
                       value="{{ !empty($connectionEdit) ? $connectionEdit->url : old('url') }}" />
            </div>
        </div>
        
        <div class="form-group row">
            <label for="class" class="col-sm-3 col-form-label">{{ __('Class') }} </label>
            <div class="col-sm-6">
                <input type="text" name="class" id="class-id" class="form-control"
                       value="{{ !empty($connectionEdit) ? $connectionEdit->{'class'} : old('class') }}" />
            </div>
        </div>
        
        <div class="form-group row">
            <label for="cube" class="col-sm-3 col-form-label">{{ __('Cube') }} </label>
            <div class="col-sm-6">
                <input type="text" name="cube" id="cube-id" class="form-control"
                       value="{{ !empty($connectionEdit) ? $connectionEdit->cube : old('cube') }}" />
            </div>
        </div>
        
        <div class="form-group row">
            <label for="user" class="col-sm-3 col-form-label">{{ __('User') }} </label>
            <div class="col-sm-6">
                <input type="text" name="user" id="user-id" class="form-control"
                       value="{{ !empty($connectionEdit) ? $connectionEdit->user : old('user') }}" />
            </div>
        </div>
        
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">{{ __('Password') }} </label>
            <div class="col-sm-6">
                <input type="text" name="password" id="password-id" class="form-control"
                       value="{{ !empty($connectionEdit) ? $connectionEdit->password : old('password') }}" />
            </div>
        </div>
        
        <div class="form-group row">
             <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control" required>
                    <option <?= !empty($connectionEdit) && $connectionEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($connectionEdit) && $connectionEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($connectionEdit))
                <input type="hidden" name="connectionId" value="{{ $connectionEdit->connection_id }}" />
                @endif
                
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                @if(validatePermission('edit', $page))
                <button type="submit" class="btn btn-primary" data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i>
                </button>
                @endif
            </div>
        </div>
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Connections') }}

        <button type="button" class="btn btn-primary btn-add" 
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i> 
        </button>

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

    var table = $(".task-table").DataTable({
        'ajax': '/sir/connections/viewlist',
        columns: [             
            {data: 'connection_id', name: 'connection_id', title: "{{ __('ID') }}"},
            {data: 'name', name: 'name', title: "{{ __('Name') }}"},
            {data: 'url', name: 'url', title: "{{ __('Url') }}"},
            {data: 'class', name: 'class', title: "{{ __('Class') }}"},
            {data: 'cube', name: 'cube', title: "{{ __('Cube') }}"},
            {data: 'user', name: 'user', title: "{{ __('User') }}"},
            {data: 'status', name: 'status', title: "{{ __('Status') }}", render: function(data, type, full, meta){
                return data == 1 ? '{{ __("Active") }}' : '{{ __("Inactive") }}';
            }},
            {data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}", orderable: false, searchable: false}
        ]
    });
    
    @if (!empty($connectionEdit) || count($errors) > 0)
    $(".btn-add").trigger("click");
    @endif

});
</script>
@endsection