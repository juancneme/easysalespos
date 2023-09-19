<?php $page_title = __('Distribuitors') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <form action="/{{ $group . '/' . $page }}" autocomplete="off" method="POST" class="form-horizontal">
        <div class="panel-heading">{{ __('Distribuitors') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="/{{ $group . '/' . $page) }}">

        <div class="form-group row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Persons') }} *</label>
            <div class="col-sm-5">
                <select name="persona" id="persona-name" class="form-control" required>
                    @foreach ($persons as $person)
                    <option <?= !empty($distributorsEdit) && $distributorsEdit->persona_id == $person->id ? 'selected' : '' ?> value="{{ $person->id }}">{{ $person->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }} *</label>
            <div class="col-sm-5">
                <input type="text" name="name" id="name-name" class="form-control" required value="{{ !empty($distributorsEdit) ? $distributorsEdit->name : '' }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="shortname" class="col-sm-3 col-form-label">{{ __('Short Name') }} *</label>
            <div class="col-sm-2">
                <input type="text" name="shortname" id="shortname-name" class="form-control" required value="{{ !empty($distributorsEdit) ? $distributorsEdit->shortname : '' }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="order" class="col-sm-3 col-form-label">{{ __('Order') }} *</label>
            <div class="col-sm-2">
                <input type="text" name="order" id="order-name" class="form-control" required value="{{ !empty($distributorsEdit) ? $distributorsEdit->order : '' }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }} *</label>
            <div class="col-sm-2">
                <select name="status" id="estado-name" class="form-control select-status" required>
                    <option <?= !empty($distributorsEdit) && $distributorsEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($distributorsEdit) && $distributorsEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($distributorsEdit))
                <input type="hidden" name="distributorId" value="{{ $distributorsEdit->id }}" />
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
    <hr style="border-color: #ccc" />
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Distribuitors') }}
      
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
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'nompersona', name: 'nompersona', title: "{{ __('Persona') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'shortname', name: 'shortname', title: "{{ __('Short Name') }}"},
                {data: 'order', name: 'order', title: "{{ __('Order') }}"},
                {data: 'status', name: 'status', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($listsEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif
    });
</script>
@endsection
