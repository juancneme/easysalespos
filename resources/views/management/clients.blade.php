<?php $page_title = __('Clients') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        <!-- New Form -->
        <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal"
              style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Clients') }}</div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
            <input id="id_user" type="hidden" name="id_user" value="<?= !empty($userEdit) ? $userEdit->id : '' ?>">

            <div class="form-group row">
                <label for="contrato" class="col-sm-3 col-form-label">{{ __('Contract') }}*</label>
                <div class="col-sm-6">
                        <select  name="contrato" id="contrato-name" class="form-control "
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>  <?= !$Admin ? 'readonly' : '' ?> required>
                            @foreach ($contracts as $contrato)
                                <option
                                    <?= !empty($userEdit) && $userEdit->contract_id == $contrato->id ? 'selected' : '' ?> value="{{ $contrato->id }}">{{ $contrato->numbercontract.' - ' .$contrato->TypeContract->name }}</option>
                            @endforeach
                        </select>
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
            

            <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
            data-toggle="tooltip" title="{{ __('Cancel') }}">
        <i class="fa fa-reply"></i>
    </button>

    <button type="submit" class="btn btn-primary"
            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
        <i class="fa fa-save"></i>
    </button>
        </form>
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Clients') }}

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
            $('select[readonly]').attr('disabled',true);
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
                    {data: 'contract_id', name: 'contract_id', title: "ID {{ __('Contract') }}"},
                    {data: 'fullname', name: 'fullname', title: "{{ __('Name') }}"},
                    {data: 'identification', name: 'identification', title: "{{ __('Identification') }}"},
                    {data: 'email', name: 'email', title: "{{ __('email') }}"},
                    {data: 'estado', name: 'status', title: "{{ __('Status') }}"},
                    {data: 'action', name: 'action',title: "{{ __('Actions') }}", orderable: false,searchable: false}
                ],
                "order": [[0, "desc"]]
            });


            @if (!empty($userEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
                    @endif

            var $roles = $('#roles-name').select2().val('');
            $roles.change();

            var $status = $('#estado-name').select2().val('');
            $status.change();

            @if (!empty($userEdit))

                arr = [];
           

            $status = $('#estado-name').select2().val('{{ $userEdit->status }}');
            $status.change();
            @endif

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
            $('select[readonly]').attr('disabled',false);
        })
    </script>
@endsection