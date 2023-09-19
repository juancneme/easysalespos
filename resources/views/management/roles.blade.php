<?php $page_title = __('Roles') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div class="panel-heading">{{ __('Roles') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="user-name" class="form-control" 
                        <?= !empty($perEdit) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                        <?= !empty($roleEdit) && !auth()->user()->hasRole('admin') ? 'readonly' : '' ?>
                        required value="{{ !empty($roleEdit) ? $roleEdit->name : old('name') }}" >
            </div>
        </div>

        <div class="form-group row">
            <label for="display_name" class="col-sm-3 col-form-label">{{ __('Display Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="display_name" id="display_name-name" required 
                       class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                       value="{{ !empty($roleEdit) ? $roleEdit->display_name : old('display_name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="description" id="description-name" required class="form-control" 
                        <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> 
                       value="{{ !empty($roleEdit) ? $roleEdit->description : old('description') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="adminlevel" class="col-sm-3 col-form-label">{{ __('Administrative Level') }}*</label>
            <div class="col-sm-6">
                <select name="adminlevel" id="adminlevel-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemslevels as $Itemslevel)
                    @if (!empty($roleEdit))
                    <option <?= $roleEdit->adminlevel_id == $Itemslevel->id ? 'selected' : '' ?> value="{{ $Itemslevel->id }}">{{ $Itemslevel->name }}</option>
                    @else
                    <option <?= old('adminlevel') == $Itemslevel->id ? 'selected' : '' ?> value="{{ $Itemslevel->id }}">{{ $Itemslevel->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="modules[]" class="col-sm-3 col-form-label">{{ __('Modules') }}*</label>
            <div class="col-sm-6">
                <select name="modules[]" id="modules-name" style="width:100%" class="js-states form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> multiple required>
                   @foreach ($modules as $module)
                    <option value="{{ $module->id }}" data-placement="top" 
                            data-toggle="tooltip" title="{{ $module->name }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="module" class="col-sm-3 col-form-label">{{ __('Default Module') }}*</label>
            <div class="col-sm-6">
                <select name="module" id="module-name" style="width:100%" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemsmodules as $imodule)
                    <option <?= !empty($roleEdit) && $roleEdit->module_id == $imodule->id ? 'selected' : '' ?> value="{{ $imodule->id }}">{{ $imodule->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-form-label"><hr style="color: #0056b2;" /></label>
        </div>

        <div class="form-group row">
            <label for="permissions[]" class="col-sm-3 col-form-label">{{ __('Restrictions') }}</label>
            <div class="col-sm-6">
                <select name="permissions[]" id="permissions-name" style="width:100%" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> multiple>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" data-placement="top" 
                            data-toggle="tooltip" title="{{ $permission->description }}">{{ $permission->display_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($roleEdit))
                <input type="hidden" name="roleId" value="{{ $roleEdit->id }}" />
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
    <div class="panel-heading">{{ __('Roles') }}

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
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'display_name', name: 'display_name', title: "{{ __('Display Name') }}"},
                {data: 'description', name: 'description', title: "{{ __('Description') }}"},
                {data: 'adminlevel', name: 'adminlevel.name', title: "{{ __('Admin Level') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}", orderable: false, searchable: false}
            ],
            "order": [[0, "desc"]]
        });

        @if (!empty($roleEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif

        var $permissions = $('#permissions-name').select2().val('');
        $permissions.change();

        var $modules = $('#modules-name').select2().val('');
        $modules.change();

        @if (!empty($roleEdit))

            arr = [];
            @foreach($roleEdit->permissions() as $perm)
                arr.push('{{ $perm->id }}');
            @endforeach

            $permissions = $('#permissions-name').select2().val(arr);
            $permissions.change();

            arr = [];
            @foreach($roleEdit->modules() as $modul)
                arr.push('{{ $modul->id }}');
            @endforeach

            $modules = $('#modules-name').select2().val(arr);
            $modules.change();

        @endif

        $("#modules-name").change(function(){
            var $options = $();
            var items = $('#modules-name').val();
            var itemsel = $('#module-name').val();
            var modulos = [
            @foreach ($modules as $mod)
                [ '{{ $mod->id }}', '{{ $mod->name }}' ],
            @endforeach
            ];

            for (i = 0; i < items.length; i++) {
                for (j = 0; j < modulos.length; j++) {
                    if (items[i] == modulos[j][0]){
                        if (itemsel == modulos[j][0] )
                            $options = $options.add($("<option selected>").attr('value', modulos[j][0]).html( modulos[j][1] ));
                        else
                            $options = $options.add($("<option>").attr('value', modulos[j][0]).html( modulos[j][1] ));
                    }
                }
            }
            $('#module-name').html($options).trigger('change');
        });

    });
</script>
@endsection