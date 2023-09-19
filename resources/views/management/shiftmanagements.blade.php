<?php $page_title = __('Shifts') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div class="panel-heading">{{ __('Shifts') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        @if (!empty($ShiftEdit))
            <input type="hidden" name="id" value="{{ $ShiftEdit->id }}">
        @else
            <input type="hidden" name="id" value="0">
        @endif
        <div class="form-group row">
            <label for="usuario" class="col-sm-3 col-form-label">{{ __('User') }}*</label>
            <div class="col-sm-6">
                <select name="idusuario" id="usuario-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($users as $ItemsLists)
                        @if (!empty($users))
                            <option <?= $ItemsLists->id == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="fecha" class="col-sm-3 col-form-label">{{ __('Date') }}*</label>
            <div class="col-sm-6">
                <input type="date" name="fecha" id="fecha-name" class="form-control" disabled="disabled">
            </div>
        </div>
        
        <div class="form-group row">
             <label for="payform_name" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="sltypeshift" id="sltypeshift-name" class="form-control" required>
                    @foreach ($itemstypeshift as $ItemsLists)  
                        <option value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
            <i class="fa fa-reply"></i>
        </button>
        <button type="submit" class="btn btn-primary" <?= !empty( $promotionEdit ) && $promotionEdit=='disabled' ? 'disabled' : '' ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
            <i class="fa fa-save"></i>
        </button>

    </form>
    <hr style="border-color: #ccc" />
</div>

<!-- Current Shifts-->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">{{ __('Shifts') }}
    </div>

    <div class="panel-body">
        <table class="table table-striped table-en task-table"></table>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'company', name: 'company', title: "{{ __('Company') }}"},
                {data: 'full_name', name: 'full_name', title: "{{ __('User Name') }}"},
                {data: 'shiftdate', name: 'shiftdate', title: "{{ __('Start Date') }}"},
                {data: 'enddate', name: 'enddate', title: "{{ __('End Date') }}"},
                {data: 'initialbalance', name: 'initialbalance', title: "{{ __('Start Balance') }}"},
                {data: 'calculatedbalance', name: 'calculatedbalance', title: "{{ __('End Balance') }}"},
                {data: 'typeshift_name', name: 'typeshift_name', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}", orderable: false, searchable: false}
            ],
            "order": [[0, "desc"]]
        });
        
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + (month) + "-" + (day);
        $("#fecha-name").val(today);

        @if (!empty($ShiftEdit))
            $(".btn-add").trigger("click");
        @endif

    });
</script>
@endsection

