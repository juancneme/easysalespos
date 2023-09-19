<?php $page_title = 'User Categories' ?>
@extends('pike_template')
@section('content')
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Querys') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group row">
            <label for="user_id" class="col-sm-3 col-form-label">{{ __('User') }}*</label>
            <div class="col-sm-6">
                <select name="user_id" id="user_id-name" class="form-control">
                    <option value="0">{{__('Select')}}</option>
                    @foreach ($users as $u)
                    <option value="{{ $u->id }}" {{ !empty($ucEdit) && $u->id == $ucEdit->user_id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-sm-3 col-form-label">{{ __('Category') }}*</label>  
            <div class="col-xs-3 col-sm-4 col-md-4 input-bar-item">
                <select name="category_id" id="category_id-name" class="form-control" required>
                    <option value="">{{__('Select')}}</option>
                    @foreach ($categories as $c)
                    <option value="{{ $c->id }}" {{ !empty($ucEdit) && $ucEdit->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div> 
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($ucEdit))
                <input type="hidden" name="ucId" value="{{ $ucEdit->id }}" />
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
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('User Categories') }}

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

    $(".task-table").DataTable({
        'ajax': '/sir/usercategories/viewlist',
        columns: [ 
            {data: 'id', name: 'id', title: "{{ __('ID') }}"},
            {data: 'user', name: 'users.name', title: "{{ __('User') }}"},
            {data: 'category', name: 'categories.name', title: "{{ __('Category') }}"},
            {data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}", orderable: false, searchable: false}
        ],
        "order": [[0, "desc"]]
    });


    @if (!empty($ucEdit) || count($errors) > 0)
    $(".btn-add").trigger("click");
    @endif
//
//    var $roles = $('#roles-name').select2().val('');
//    $roles.change();
//
//    var $status = $('#estado-name').select2().val('');
//    $status.change();
//
//    @if (!empty($userEdit))
//
//        arr = [];
//        @foreach($userEdit->getRoles() as $role)
//            arr.push('{{ $role->id }}');
//        @endforeach
//        $roles = $('#roles-name').select2().val(arr);
//        $roles.change();
//
//        $status = $('#estado-name').select2().val('{{ $userEdit->status }}');
//        $status.change();
//    @endif

});
</script>
@endsection