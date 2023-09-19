<?php $page_title = __('Catalogs') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Catalogs') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label for="contract" class="col-sm-3 col-form-label">{{ __('Contract') }}*</label>
            <div class="col-sm-6">
                <select name="contract" id="contract-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($contracts as $contract)
                    <option <?= !empty($catalogEdit) && $catalogEdit->contract_id == $contract->id ? 'selected' : '' ?> value="{{ $contract->id }}">{{ $contract->numbercontract .' - '.$contract->Persona->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($catalogEdit) ? $catalogEdit->name : '' }}" />
                
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="description" id="description-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($catalogEdit) ? $catalogEdit->description : '' }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">{{ __('Type') }}*</label>
            <div class="col-sm-6">
                <select name="type" id="type-name" class="form-control select-status" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach($typeCatalogs as $typeCatalog)
                        <option <?= !empty($catalogEdit) && $catalogEdit->typecatalog_id == $typeCatalog->id
                            ? 'selected'
                            : ''
                            ?> value="{{$typeCatalog->id}}">{{$typeCatalog->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="status-name" class="form-control select-status" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option <?= !empty($catalogEdit) && $catalogEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($catalogEdit) && $catalogEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div style="height:42px"></div>
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($catalogEdit))
                <div style="height: 8px"></div>
                <input type="hidden" name="catalogId" value="{{ $catalogEdit->id }}" />
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

</div>
<div id="showMaster" class="modal fade">
    <div class="modal-dialog">
        <form action="/{{ $group . '/' . $page.'/clonecatalog' }}" method="POST" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="catalogSelect" id="catalogSelect">
            <div class="modal-content">
                <div class="modal-body">
                    <label for="status" class="col-sm-12 col-form-label">{{ __('Favor seleccionar un catalago Maestro') }}*</label>
                    <select name="catalogId" id="catalogId" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                        @foreach ($catalogosSemilla as $catalog)
                            <option  value="{{ $catalog->id }}">{{ $catalog->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button class="btn btn-success btn-lg btnopen">{{__('Accept')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Catalogs') }}

        <button type="button" class="btn btn-primary btn-add"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            {{ $catalogAdd }}
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
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'contrato.numbercontract', name: 'contrato.numbercontract', title: "{{ __('Contract') }}"},
                {data: 'type', name: 'type', title: "{{ __('Type') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'description', name: 'description', title: "{{ __('Description') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($catalogEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
        @endif
    });

    function onShowMaster(elem) {
        var dataId = $(elem).data("id");
        $('#catalogSelect').val(dataId);
       $('#showMaster').modal('show',1000)

    }
</script>
@endsection
