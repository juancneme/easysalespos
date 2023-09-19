<?php $page_title = __('Contracts') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">
        <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal"
              enctype="multipart/form-data"
              style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Contracts') }}</div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
            <input id="url" type="hidden" name="url1" value="{{ Request::url() }}">
            <input id="id_contrac" type="hidden" name="id_contrac"
                   value="<?= !empty($contractEdit) ? $contractEdit->id : '' ?>">

            <div class="form-group row" style="display:{{!empty($contractEdit) ? '' : 'none' }}">
                <label for="numbercontract" class="col-sm-3 col-form-label">{{ __('Number Contract') }}*</label>
                <div class="col-sm-6">
                    <input type="text" disabled name="numbercontract" id="numbercontract-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($contractEdit) ? $contractEdit->numbercontract : old('numbercontract') }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="typecontract" class="col-sm-3 col-form-label">{{ __('Type Contract') }}*</label>
                <div class="col-sm-6">
                    <select name="typecontract" id="typecontract-name" class="form-control "
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                        @foreach ($itemstypecontract as $ItemCont)
                            <option
                                <?= !empty($contractEdit) && $contractEdit->typecontract_id == $ItemCont->id ? 'selected' : '' ?> value="{{ $ItemCont->id }}">{{ $ItemCont->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="persona" class="col-sm-3 col-form-label">{{ __('Persons') }}*</label>
                <div class="col-xs-3 col-sm-4 col-md-4  input-bar-item">
                    <select name="person" id="persona-name" class="form-control " data-live-search="true"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        <option value="true" selected disabled>{{__('Select a person')}}</option>
                        @foreach ($persons as $persona)
                            <option
                                <?= !empty($contractEdit) && $contractEdit->person_id == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{ $persona->fullname }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="height: 55px"></div>

                <div class="col-2">
                    <button type="button" id="edit-person" class="btn btn-info">{{ __('Add Person') }}</button>

                </div>

            </div>

            <div class="form-group row">
                <label for="startdate" class="col-sm-3 col-form-label">{{ __('Start Date') }}*</label>
                <div class="col-sm-6">
                    <input type="date" name="startdate" id="startdate-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required max="<?php $hoy = date('Y-m-d'); echo $hoy;?>"
                           value="{{ !empty($contractEdit) ? $contractEdit->startdate : old('startdate') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="enddate" class="col-sm-3 col-form-label">{{ __('End Date') }}*</label>
                <div class="col-sm-6">
                    <input type="date" name="enddate" id="enddate-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required min="<?php $hoy = date('Y-m-d'); echo $hoy;?>"
                           value="{{ !empty($contractEdit) ? $contractEdit->enddate : old('enddate') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="timebilling" class="col-sm-3 col-form-label">{{ __('Time Billing') }}</label>
                <div class="col-sm-6">
                    <input type="text" name="timebilling" id="timebilling-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($contractEdit) ? $contractEdit->timebilling : old('timebilling') }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="taxregime" class="col-sm-3 col-form-label">{{ __('Type of tax regime') }}*</label>
                <div class="col-sm-6">
                    <select name="taxregime" id="taxregime-name" class="form-control "
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($itemstyperegime as $ItemRegime)
                            <option
                                <?= !empty($contractEdit) && $contractEdit->taxregime_id == $ItemRegime->id ? 'selected' : '' ?> value="{{ $ItemRegime->id }}">{{ $ItemRegime->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="quantitystores" class="col-sm-3 col-form-label">{{ __('Quantity Stores') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="quantitystores" id="quantitystores-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required
                           value="{{ !empty($contractEdit) ? $contractEdit->quantitystores : 10 }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="quantityusers" class="col-sm-3 col-form-label">{{ __('Quantity Users') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="quantityusers" id="quantityusers-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                           required
                           value="{{ !empty($contractEdit) ? $contractEdit->quantityusers : 30 }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="payments[]" class="col-sm-3 col-form-label">{{ __('Aditional Payments methods') }}</label>
                <div class="col-sm-6">
                    <select name="payments[]" id="payments-name" style="width:100%" class="js-states form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> multiple>
                        @foreach ($itemstypepay as $item)
                            <option value="{{ $item->id }}"
                                    data-company-id="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row subscripcion-key" style="display: none">
                <label for="slogan" class="col-sm-3 col-form-label">{{ __('Subscripcion key') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="subscripcion_key" id="subscripcion-key-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($companyEdit) ? $companyEdit->storeId : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }} *</label>
                <div class="col-sm-6">
                    <select name="status" id="estado-name" class="form-control select-status"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        <option
                            <?= !empty($contractEdit) && $contractEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option
                            <?= !empty($contractEdit) && $contractEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>


                    <div class="form-group row">

                    <label for="status" class="col-sm-3 col-form-label">{{ __('Logos') }} </label>
                    <div class="col-md-1">
                        <img name="image-view-1" id="image-view-1"
                             src="{{$img1 }}"
                             class="col-sm-2" style="display: block; max-width:100%;  "
                             value="{{ $path.$image }}">
                    </div>
                    <div class="col-md-1">
                        <img name="image-view-2" id="image-view-2"
                             src="{{ $img2 }}"
                             class="col-sm-2" style="display: block; max-width:100%;  "
                             value="{{ $path.$image }}">
                    </div>
                    <div class="col-md-1">
                        <img name="image-view-3" id="image-view-3"
                             src="{{ $img3}}"
                             class="col-sm-2" style="display: block; max-width:100%;  "
                             value="{{ $path.$image }}">
                    </div>
                    <div class="col-md-1">
                        <img name="image-view-4" id="image-view-4"
                             src="{{ $img4 }}"
                             class="col-sm-2" style="display: block; max-width:100%;  "
                             value="{{ $path.$image }}">
                    </div>
                    <div class="col-md-1">
                        <img name="image-view-5" id="image-view-5"
                             src="{{ $img5}}"
                             class="col-sm-2" style="display: block; max-width:100%;  "
                             value="{{ $path.$image }}">
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">{{ __('') }} </label>

                            <div class="col-md-1">
                                <label for="logo_1" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-1"></i> {{__('Logo 1')}}
                                    <input style="display: none" type="file" name="logo_1" accept=".png,image/png"
                                           id="logo_1" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label for="logo_2" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Logo 2')}}
                                    <input style="display: none" type="file" name="logo_2" accept=".png,image/png"
                                           id="logo_2" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label for="logo_3" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Logo 3')}}
                                    <input style="display: none" type="file" name="logo_3" accept=".png,image/png"
                                           id="logo_3" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label for="logo_4" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Logo 4')}}
                                    <input style="display: none" type="file" name="logo_4" accept=".png,image/png"
                                           id="logo_4" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label for="logo_5" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Logo 5')}}
                                    <input style="display: none" type="file" name="logo_5" accept=".png,image/png"
                                           id="logo_5" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>

                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-6">
                                @if(!empty($contractEdit))
                                    <input type="hidden" name="contractId" value="{{ $contractEdit->id }}"/>
                                @endif
                                <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
                                        data-toggle="tooltip"
                                        title="{{ __('Cancel') }}">
                                    <i class="fa fa-reply"></i>
                                </button>
                                <button type="submit" class="btn btn-primary"
                                        <?= !validatePermission("edit", $page) ? "disabled" : "" ?>
                                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
        </form>
        <!--    <hr style="border-color: #ccc" />-->
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Contracts') }}

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
                    {data: 'numbercontract', name: 'numbercontract', title: "{{ __('Number Contract') }}"},
                    {data: 'type_contract.name', name: 'TypeContract.name', title: "{{ __('Type Contract') }}"},
                    {data: 'fullname', name: 'Persona.firstname', width: '200px', title: "{{ __('Contract Client') }}"},
                    {data: 'startdate', name: 'startdate', title: "{{ __('Start Date') }}"},
                    {data: 'enddate', name: 'enddate', title: "{{ __('End Date') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[3, 'desc'], [0, 'asc']]
            });

            @if (!empty($contractEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
            @endif

            if(sessionStorage.getItem("change") === 'true'){
                $(".btn-add").trigger("click");
                sessionStorage.removeItem("change");
            }

            //Payments methods
            var $payments = $('#payments-name').select2().val('');
            $payments.change();

            @if (!empty($contractEdit))
                arr = [];
            @foreach($contractEdit->getPaymentsMethods() as $pays)
                console.log('{{ $pays->id }}');
                arr.push('{{ $pays->id }}');
            @endforeach
                $payments = $('#payments-name').select2().val(arr);
                $payments.change();
            @endif

            //Valida si escoge el metodo de pago Fiado electronico
            $('#payments-name').change(function () {
                if (!$('#payments-name').val()) {
                    $('.subscripcion-key').hide(500)
                    $('#subscripcion-key-name').val("");
                } else {
                    let flag = $('#payments-name').val().filter(e => e == 107)
                    if (flag[0] == '107') {
                        $('.subscripcion-key').show(500)
                    } else {
                        $('.subscripcion-key').hide(500)
                        $('#subscripcion-key-name').val("");
                    }
                }
            });
            @if(!empty($haveCredential->key))
            let flag = $('#payments-name').val().filter(e => e == 107)
            if (flag[0] == '107')
                $('.subscripcion-key').show()
            $('#subscripcion-key-name').val('{{$haveCredential->key}}')
            @endif

            // Add or Edit Person Contracts
            $(document).on('click', "#edit-person", function () {
                $person_id = $('#persona-name').val();
                console.log("person_id ", $person_id);
                if ($person_id != null && $person_id != '') {
                    location.href = "/{{strtolower($group.'/'.$page)}}/editperson/" + $person_id + '?peredit={{$perEdit}}';
                } else {
                    location.href = "/{{strtolower($group.'/'.$page)}}/addpersons/cont";
                }
            });

            //$("#persona-name").focus(function(){
            $(document).on('focus', "#persona-name", function () {
                console.log("Ingreso OnFocus");
                $.ajax({
                    url: '/management/contracts/ajax?type=listcontratantes',
                    type: 'get',
                    data: {},
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        if (res.success) {
                            var $options = $();
                            $options = $options.add($("<option value='' selected>{{ __("Select a person") }}</option>"));
                            for (i = 0; i < res.data.length; i++) {
                                $options = $options.add($("<option>").attr('value', res.data[i].id).html(res.data[i].nombrecompleto));
                            }
                            $('#persona-name').html($options).trigger('change');
                        } else {
                            $.message("{{ __('Error with Persons') }}", "error", true);
                        }
                    }
                });
            });

            function readURL(input, $ind) {
                if (input.files && input.files[0]) {

                    $("#quitarimagen").removeAttr('disabled');

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-view-'+$ind).attr('src', e.target.result);
                        // $('#image-view-1').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo_1").change(function () {
                // $("#image-view-1").hide();

                readURL(this,1);
            });
            $("#logo_2").change(function () {
                // $("#image-view-2").hide();

                readURL(this,2);
            });
            $("#logo_3").change(function () {
                // $("#image-view-3").hide();

                readURL(this,3);
            });
            $("#logo_4").change(function () {
                // $("#image-view-4").hide();

                readURL(this,4);
            });
            $("#logo_5").change(function () {
                // $("#image-view-5").hide();

                readURL(this,5);
            });

            $(document).on('change',"#typecontract-name",function(){
                    var permiso = '{{$perEdit}}';
                    typecontract_id = $('#typecontract-name').val();
                    console.log("typecontract_id ",typecontract_id);
                    // $("#quantitystores-name").val('1');
                    // $("#quantityusers-name").val('3');
                    $("#quantitystores-name").attr('readonly',true);
                    $("#quantityusers-name").attr('readonly',true);
                    if ( typecontract_id != '141'){
                        // $("#quantitystores-name").val('3');
                        // $("#quantityusers-name").val('10');
                        $("#quantitystores-name").attr('readonly',false);
                        $("#quantityusers-name").attr('readonly',false);
                    }
            });

            //$("#persona-name").focus(function(){
            $(document).on('change', "#persona-name", function () {
                var $permiso = '{{$perEdit}}';
                var $person_id = $('#persona-name').val();
                console.log("person_id ", $person_id);
                if ($person_id == null || $person_id == '') {
                    $("#edit-person").text('{{ __('Add Person') }}');
                } else {
                    if ($permiso == '') {
                        $("#edit-person").text('{{ __('Edit Person') }}');
                    } else {
                        $("#edit-person").text('{{ __('View Person') }}');
                        $("#edit-person").attr('name', 'viewPerson');
                    }


                }
            });

            $("#persona-name").trigger('change');
            $("#typecontract-name").trigger('change');

        });

    </script>

@endsection
