<?php $page_title = __('Configurations') ?>
@extends('admin_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/management/configurations" method="POST" class="form-horizontal">
        <div class="panel-heading">{{ __('Configurations') }}</div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- User Name -->
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">{{ __('Name') }} *</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="user-name" class="form-control" required value="{{ !empty($configurationEdit) ? $configurationEdit->name : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">{{ __('Description') }} *</label>

            <div class="col-sm-6">
                <input type="text" name="description" id="description" class="form-control" required value="{{ !empty($configurationEdit) ? $configurationEdit->description : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="key" class="col-sm-3 control-label">{{ __('Key') }} *</label>

            <div class="col-sm-6">
                <input type="text" name="key" id="key" class="form-control" required value="{{ !empty($configurationEdit) ? $configurationEdit->key : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="value" class="col-sm-3 control-label">{{ __('Value') }} *</label>

            <div class="col-sm-6">
                <input type="text" name="value" id="value" class="form-control" required value="{{ !empty($configurationEdit) ? $configurationEdit->value : '' }}" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="forcompany" class="col-sm-3 control-label">{{ __('For Companies') }} *</label>

            <div class="col-sm-6">
                <select name="forcompany" id="forcompany" class="form-control select2" required>
                    <option value="0">{{ __('No') }}</option>
                    <option value="1">{{ __('Yes') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($configurationEdit))
                <input type="hidden" name="configId" value="{{ $configurationEdit->id }}" />
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i> 
                </button>
                <button type="submit" class="btn btn-primary" <?= !validatePermission("edit", $page) ? "disabled" : "" ?>
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
    <div class="panel-heading">{{ __('Configurations') }}

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
        $(".btn-add").on('click', function () {
            $(".form-add").toggle();
        });

        $(".task-table").DataTable({
            'ajax': '/management/configurations/viewlist',
            columns: [
                {data: 0, name: 'id', title: "{{ __('ID') }}"},
                {data: 1, name: 'name', title: "{{ __('Name') }}"},
                {data: 2, name: 'key', title: "{{ __('Key') }}"},
                {data: 3, name: 'value', title: "{{ __('Value') }}"},
                {data: 4, name: 'forcompany', title: "{{ __('For Company') }}", render: function(data, type, full, meta){
                    return data == 0 ? "{{ __('No') }}" : "{{ __('Yes') }}" ;
                }},
                {data: 5, name: 'action', title: "{{ __('Actions') }}", orderable: false, searchable: false}
            ],
            "order": [[0, "desc"]]
        });

        @if (!empty($configurationEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif
        
        $forcompany = $('#forcompany').select2().val('');
        $forcompany.change();
        
        @if(!empty($configurationEdit))
            $forcompany.select2().val('{{ $configurationEdit->forcompany }}');
            $forcompany.change();
        @endif
    });
</script>
@endsection