<?php $page_title = __('Business Types') ?>
@extends('pike_template')
@section('content')
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">
        <!-- New Form -->
        <form action="/{{ $group . '/' . $page }}" method="POST"  enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Business Types') }}</div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @if(!empty($businessEdit))
                <input type="hidden" name="id" value="{{ $businessEdit->id }}" />
            @endif

            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text"  name="name" id="name" class="form-control"
                           required
                           value="{{ !empty($businessEdit) ? $businessEdit->name : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="catalog" class="col-sm-3 col-form-label">{{ __('Catalog') }}*</label>
                <div class="col-sm-3">
                    <select name="catalog" id="catalog-name"
                            class="form-control " <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                        @foreach ($catalogs as $catalog)
                            <option
                                <?= !empty($businessEdit) && $businessEdit->catalog_id == $catalog->id
                                    ? 'selected'
                                    : ''
                                ?>
                                value="{{ $catalog->id }}">{{ $catalog->name }}
                            </option>
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
                    <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                        <i class="fa fa-reply"></i>
                    </button>

                    <button type="submit" class="btn btn-primary" <?= !empty( $businessEdit ) && $businessEdit=='disabled' ? 'disabled' : '' ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                            <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Confirm Modal-->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    CONFIRMA que el pedido esta listo ?
                </div>
                <div id="footer" class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Business Types') }}

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
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'id', name: 'id', title: "{{__('ID')}}"},
                    {data: 'name', name: 'name', title: "{{__('Name')}}"},
                    {data: 'catalog', name: 'catalog', title: "{{ __('Catalog') }}"},
                    {data: 'status', name: 'status', title: "{{ __('Status') }}"},
                    {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false}
                ],
                "order": [[0, "desc"]]
            });
            @if (isset($businessEdit) || count($errors) > 0)
                $(".btn-add").trigger("click");
            @endif
        });
    </script>
@endsection
