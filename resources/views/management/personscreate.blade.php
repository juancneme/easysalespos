<?php $page_title = __('Persons') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    @include('common.addpersons')

    <form method="POST" id="solicitude-create-form" role="form" autocomplete="off"  class="form-horizontal"
          style="padding-right: 15px;padding-left: 15px">

    @include('management.personsData')

    <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-6">
                @if(!empty($personsEdit))
                    <input type="hidden" name="personsId" value="{{ $personsEdit->id }}"/>
                @endif

                <button style="margin-top: 29px" type="button" class="btn btn-primary " id="botoncancel"
                        data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                <button style="margin-top: 29px" type="submit" id="solicitude-create-form" class="btn btn-primary btn-form-save"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </div>
    </form>

    <hr style="border-color: #ccc"/>

    <script>
        @include('management.personsScript')
        //    $("#typeper-name").change();
        //
        //    if (countAddress == 0)
        //            $("#addrow_address").trigger("click");
        //
        //    $("#A0").attr('disabled',true);
        var form = $("#solicitude-create-form");
        form.validate({
            ignore:  ":hidden"
        });
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('input[name=_token]').attr('content')}
            });

            $("#solicitude-create-form").submit(function (e) {
                e.preventDefault();
                var formId = '#solicitude-create-form';
                var edit_user = $('#id_user').val();
                console.log(edit_user);
                $.ajax({
                    url: '/management/persons/ajax?type=savePersons',
                    type: "POST",
                    data: $(formId).serialize(),
                    beforeSend: function() {
                        // setting a timeout
                        $('.errors').find('.alert-danger').find('li').remove();
                    },
                    success: function (response) {
                        res = JSON.parse(response);
                        console.log(res.data);
                        if (res.success) {
                            var url1 = location.pathname;
                            $('body,html').animate({scrollTop : 0}, 500);
                            $.message("Guardado Correctamente", "success", true);

                            if(url1.includes("client")){
                                list = [];

                                list.push({
                                    "firstname": $("#firstname-name").val(),
                                    "othernames": $("#othernames-name").val(),
                                    "lastname": $("#lastname-name").val(),
                                    "otherlastname": $("#otherlastname-name").val(),
                                    "socialreason": $("#socialreason-name").val(),
                                    "id": res.id,
                                    "person": res.personid,
                                    "client": true,
                                    "clientemail": res.email
                                });

                                json = JSON.stringify(list);
                                sessionStorage.setItem('data',json);
                                sessionStorage.setItem('default',true);
                            }
                            else{
                                sessionStorage.setItem('change','true');
                            }
                            window.location=document.referrer;

                        } else {
                            if(res.successid === false){
                                $('body,html').animate({scrollTop : 0}, 500);
                                $.message('El número de identificación ya se encuentra asociado a una persona.', "error", false);
                            }
                            $.each(res.data, function (index, datas) {
                                var keyaddres = Object.keys(datas);

                                for (var i = 0; i < keyaddres.length; i++) {
                                    var cadenacomprar = keyaddres[i].substring(0, 7);
                                    var cadena_errors = keyaddres[i].substring(0, 13);

                                    console.log(cadena_errors);
                                    if (cadenacomprar == "address") {
                                        $.message('el campo dirección es obligatorio', "error", false);
                                    }
                                    if (cadena_errors == "textcontact_p") {
                                        console.log(datas);
                                        $.message('el campo telefono es obligatorio y debe ser unicamente numerico,entre 6 a 10 digitos', "error", false);
                                    }
                                    if (cadena_errors == "textcontact_e") {
                                        console.log(datas);
                                        $.message('el campo  email debe contener un formato de correo ejemplo@gmail.com', "error", false);
                                    }

                                }

                                if ((datas.birthdate)) {
                                    $.message(datas.birthdate, "error", false);
                                }
                                if ((datas.numberdocument)) {
                                    $.message(datas.numberdocument, "error", false);
                                }
                                if ((datas.typeper)) {
                                    $.message(datas.typeper, "error", false);
                                }
                                if ((datas.typedoc)) {
                                    $.message(datas.typedoc, "error", false);
                                }
                                if ((datas.status)) {
                                    $.message(datas.status, "error", false);
                                }
                                if ((datas.firstname)) {
                                    $.message(datas.firstname, "error", false);
                                }
                                if ((datas.lastname)) {
                                    $.message(datas.lastname, "error", false);
                                }
                                if ((datas.digitcheck)) {
                                    $.message(datas.digitcheck, "error", false);
                                }
                                if ((datas.socialreason)) {
                                    $.message(datas.socialreason, "error", false);
                                }
                                if ((datas.typecivilstatus)) {
                                    $.message(datas.typecivilstatus, "error", false);
                                }
                                if ((datas.typesex)) {
                                    $.message(datas.typesex, "error", false);
                                }

                                datas = null;
                            });

                        }
                    },

                })
            });

        });

        $("#botoncancel").click(function () {
            window.location=document.referrer;
        });

    </script>
@endsection