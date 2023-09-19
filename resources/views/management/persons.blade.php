<?php $page_title = __('Persons') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<!-- empy forms button-->
@include('common.addpersons')

<div class="panel-body form-add" style="margin-top: 110px;">
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" id="saveForm" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

        <div class="col-sm-12">
        @include('management.personsData')
        </div>
        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-6">
                @if(!empty($personsEdit))
                <input type="hidden" name="personsId" value="{{ $personsEdit->id }}" />
                @endif
                <a href="javascript:history.back()" style="margin-top: 29px" type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </a>
                <button  style="margin-top: 29px" type="submit" form="saveForm" class="btn btn-primary" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
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
    <div class="panel-heading">{{ $page_title }}

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
                {data: 'id', name: 'id', title: "{{ __('ID') }}", visible: false, searchable: false},
                {data: 'typeperson', name: 'TypePerson.name', title: "{{ __('Type Person') }}"},
                {data: 'identification', name: 'numberdocument', title: "{{ __('Type Id') }}"},
                {data: 'fullname', name: 'fullname', title: "{{ __('Full Name') }}"},
                {data: 'birthdate', name: 'birthdate', title: "{{ __('Birthdate') }}"},
                {data: 'estado', name: 'status', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($personsEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        $("#ocultarCargaImagen").show();
        $("#typeper-name").change();
        @endif

        @include('management.personsScript')

    });
</script>
@endsection
