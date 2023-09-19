<?php $page_title = __('Users') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal"
            style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Users') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input id="url_request" type="hidden" name="url" value="{{ Request::url() }}">
        <input id="id_user" type="hidden" name="id_user" value="<?= !empty($userEdit) ? $userEdit->id : '' ?>">

        <div class="form-group row">
            <label for="contrato" class="col-sm-3 col-form-label">{{ __('Contract') }}*</label>
            <div class="col-sm-6">
                <select name="contrato" id="contrato-name" class="form-control "
                        @if(!$Admin)
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>  <?= !$Admin ? 'readonly' : '' ?> required>
                    <option value="{{$contracts[0]->id}}"
                            selected>{{ $contracts[0]->numbercontract.' - ' .$contracts[0]->Persona->fullname }}</option>
                    @else
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>  <?= !$Admin ? 'readonly' : '' ?>
                        required>
                        <option value="true" disabled selected>{{__('Select a contract')}}</option>
                    @endif

                    @foreach ($contracts as $contrato)
                        <option
                            <?= !empty($userEdit) && $userEdit->contract_id == $contrato->id ? 'selected' : '' ?> value="{{ $contrato->id }}">{{ $contrato->numbercontract.' - ' .$contrato->Persona->fullname }}</option>
                    @endforeach


                </select>
            </div>
        </div>
        <div class="row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Persona') }}*</label>
            <div class="col-xs-3 col-sm-4 col-md-4  input-bar-item">

                <select name="persona" id="persona-name" class="form-control "
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="true" disabled selected>{{__('Select a person')}}</option>
                    @foreach ($persons as $persona)
                        @if (!empty($userEdit))
                            <option
                                <?= $userEdit->person_id == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{$persona->fullname }}</option>
                        @else
                            <option
                                <?= old('persona') == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{$persona->fullname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div style="height: 55px"></div>

            <div class="col-xs-2 col-sm-2 col-md-2"
                    style="text-align: right; display: {{ !empty($userEdit) ? 'none' : ''  }};">
                <a href="/{{ strtolower($group.'/'.$page.'/addperson') }}"
                    type="button" class="btn btn-primary"
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >{{ __('Add Person') }}</a>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2"
                    style="text-align: right; display:{{ !empty($userEdit) ? '' : 'none'  }};">
                <button type="button" id="edit-person" class=" btn btn-info"
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >{{ __('Edit Person') }}</button>
            </div>
        </div>

        <div class="form-group row" style="display:{{ !empty($userEdit) ? 'none' : ''  }};">
            <label for="user-name-full" class="col-sm-3 col-form-label">{{ __('NameFull') }} *</label>
            <div class="col-sm-6">
                <input type="text" name="user-name-full" id="user-name-full" class="form-control" disabled>
            </div>
        </div>

        <div class="form-group row" style="display:{{ !empty($userEdit) ? 'none' : ''  }};">
            <label for="user-Identification" class="col-sm-3 col-form-label">{{ __('Identification') }} *</label>
            <div class="col-sm-6">
                <input type="text" name="user-Identification" id="user-Identification" class="form-control"
                        disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="name" style="text-transform: lowercase" id="user-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                        required value="{{ !empty($userEdit) ? $userEdit->name : old('name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">{{ __('Email') }}*</label>
            <div class="col-sm-6">
                <input type="email" name="email" id="email-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                        required value="{{ !empty($userEdit) ? $userEdit->email : old('email') }}"
                <?= !empty($userEdit) && !auth()->user()->hasRole('admin') ? 'readonly' : '' ?> >
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">{{ __('Password') }}*</label>
            <div class="col-sm-6">
                <input type="password" name="password" id="password-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                        value="{{ !empty($userEdit) ? $userEdit->password : old('password') }}">
            </div>
        </div>

        <div style="display: none">
            <select name="status" id="estado-name"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            </select>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option
                        <?= !empty($userEdit) && $userEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option
                        <?= !empty($userEdit) && $userEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="roles[]" class="col-sm-3 col-form-label">{{ __('Roles') }}*</label>
            <div class="col-sm-6">
                <select name="roles[]" id="roles-name" style="width:100%" class="js-states form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> multiple required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                                data-company-id="{{ $role->company_id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="admonlevel " class="col-sm-3 col-form-label">{{ __('Administrative level') }}*</label>
            <div class="col-sm-6">
                <select name="admonlevel" id="admonlevel-name" class="form-control "
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="true" disabled selected>{{__('Select a level')}}</option>
                    @foreach ($adminLevels as $level)
                        @if (!empty($userEdit))
                            <option
                                <?= $userEdit->admonlevel == $level->id ? 'selected' : '' ?> value="{{ $level->id }}">{{$level->name }}</option>
                        @else
                            <option
                                <?= old('persona') == $level->id ? 'selected' : '' ?>value="{{ $level->id }}">{{$level->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="functional_areas[]" class="col-sm-3 col-form-label">{{ __('Functional areas') }}*</label>
            <div class="col-sm-6">
                <select name="functional_areas[]" id="functional-areas-name" style="width:100%"
                        class="js-states form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> multiple required>
                    @foreach ($functionalAreas as $area)
                        <option  value="{{ $area->id }}" >{{ $area->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        @if(!empty($userEdit))
        <input type="hidden" name="userId" value="{{ $userEdit->id }}"/>
        @endif
        
        {{--Agregar Imagen User--}}
        @component('management.components.images.imagecomponent')
            @slot('image',$image)
            @slot('path',$path)
            @slot('nameId','userId')
            @if(!empty($userEdit))
                @slot('edit',$userEdit)
            @endif
            @if(!empty($perEdit))
                @slot('perEdit',$perEdit)
            @endif
        @endcomponent
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Users') }}

        <button type="button" class="btn btn-primary btn-add"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            {{ $numusers }}
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
    $('select[readonly]').attr('disabled', true);
    $('#area-name').on('change', function () {
        _val = $(this).val();
        $('#position-name option').each(function (i, e) {
            if ($(e).attr('data-area-id') == _val) {
                $(e).prop('disabled', false);
            } else {
                $(e).prop('disabled', true);
            }
        });
        $('#position-name').select2().val('');
        $('#position-name').change();
    });

    $(".task-table").DataTable({
        'ajax': '/' + $("#url").val() + '/viewlist',
        columns: [
            {data: 'id', name: 'id', title: "{{ __('ID') }}"},
            {data: 'name', name: 'name', title: "{{ __('Name') }}"},
            {data: 'email', name: 'email', title: "{{ __('Email') }}"},
            {data: 'roles', name: 'roles.display_name', orderable: false, title: "{{ __('Roles') }}"},
            {data: 'contrato.numbercontract', name: 'Contrato.numbercontract', title: "{{ __('Contract') }}"},
            {data: 'estado', name: 'status', title: "{{ __('Status') }}"},
            {
                data: 'action',
                name: 'action',
                width: '110px',
                title: "{{ __('Actions') }}",
                orderable: false,
                searchable: false
            }
        ],
        "order": [[0, "desc"]]
    });

    @if (!empty($userEdit) || count($errors) > 0)
    $(".btn-add").trigger("click");
    @endif

    if (sessionStorage.getItem("change") === 'true') {
        $(".btn-add").trigger("click");
        sessionStorage.removeItem("change");
    }

    var $roles = $('#roles-name').select2().val('');
    $roles.change();

    var $status = $('#estado-name').select2().val('');
    $status.change();

    var $functional_areas = $('#functional-areas-name').select2().val('');
    $functional_areas.change();

    @if (!empty($userEdit))
    arr = [];
    areas = [];
    @foreach($userEdit->getRoles() as $role)
        arr.push('{{ $role->id }}');
    @endforeach
    @foreach($arrayAreas as $area)
        areas.push('{{ $area }}')
    @endforeach
    $roles = $('#roles-name').select2().val(arr);
    $roles.change();

    $functional_areas = $('#functional-areas-name').select2().val(areas);
    $functional_areas.change();

    $status = $('#estado-name').select2().val('{{ $userEdit->status }}');
    $status.change();
    @endif

    //    // Buscar Persona cuando da click en el selector de perona
    //    $("persona-name").on("focus", function (e) {
    //        var person_id = $(this).attr("id");
    //        if (person_id > 0) {
    //            $.ajax({
    //                url: '/management/guaranteeajax/ajax?type=listcreditors',
    //                type: 'get',
    //                data: {
    //                    "contract": contractid,
    //                    "idform": idform
    //                },
    //                async: false,
    //                success: function (response) {
    //                    res = JSON.parse(response);
    //                    if(res.success){
    //                        var $options = $();
    //                        $options = $options.add($("<option selected>{{ __("Select a debtor") }}</option>").attr('value', 'true' ));
    //                        for (i = 0; i < res.data.length; i++) {
    //                            $options = $options.add($("<option>").attr('value', res.data[i].id).html( res.data[i].nombrecompleto ));
    //                        }
    //                        $('#PC'.concat(idCreditor)).html($options).trigger('change');
    //                    }else {
    //                        $.message("Error with Inscription", "error", true);
    //                    }
    //                }
    //            });
    //        }
    //    });
    //
    $('#persona-name').on('change', function (e) {
        var person_id = e.target.value;
        console.log(person_id);

        $.ajax({
            url: '/management/users/ajax?type=selectPersons',
            type: 'get',
            data: {
                "id": person_id
            },
            async: false,
            success: function (response) {
                console.log(person_id);
                res = JSON.parse(response);
                console.log(res.data);
                if (res.success) {
                    $.each(res.data, function (index, datas) {
                        console.log(datas);
                        document.getElementById('user-name-full').value = datas.socialreason + " " + datas.firstname + " " + datas.othernames + " " + datas.lastname + " " + datas.otherlastname;
                        document.getElementById('user-Identification').value = datas.numberdocument;
                    });
                    console.log('sirve');
                } else {
                    $.message("Error en la consulta", "error", true);
                }
            }
        });
    });

    $(".btn-add").trigger("change");

    function readURL(input) {
        if (input.files && input.files[0]) {

            $("#image-view").hide();
            $("#quitarimagen").removeAttr('disabled');

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        readURL(this);
    });

    $(document).on('click', "#quitarimagen", function () {
        $("#image-view").show();
        $("#quitarimagen").attr('disabled', 'disabled');
    });

    $(document).on('click', "#edit-person", function () {
        var edit_person = $('#persona-name').val();
        var edit_user = $('#id_user').val();

        //alert("/{{ strtolower($group)  }}/editperson/ "+  edit_person);
        location.href = "/{{  strtolower($group.'/'.$page)}}/editperson/" + edit_person + '?user=' + edit_user;
    });

    $(document).on('click', ".edit-person", function () {
        console.log($("#persona-name").val());
        var edit_person = $('#persona-name').val();
        console.log($('#id_user').val());
        var edit_user = $('#id_user').val();
        $.ajax({
            url: '/management/persons/ajax?type=editPerson',
            type: 'get',
            data: {
                "id": edit_person,
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                console.log(res.data);
                if (res.success) {
                    console.log('editar persona');
                } else {
                    $.message("Error en la consulta", "error", true);
                }
            }
        });
    });

    $("#persona-name").trigger("change");

});

$("form").submit(function (event) {
    $('select[readonly]').attr('disabled', false);
});

$('#user-name').bind('keypress', function (e) {
    if (e.which == 32) {//space bar
        alert('{{__('Username does not have spaces')}}');
        e.preventDefault();
    }
});

function onDisabled(event) {
    if (!event) {
        alert("{{__('You are complete maximun numbes of ')}}" + "{{__('Users') }}");
        return false;
    }
}

</script>
@endsection
