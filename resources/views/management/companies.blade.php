<?php $page_title = __('Companies') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <form id="form_company" action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
            class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Companies') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input id="id_contrac" type="hidden" name="id_contrac"
                value="<?= !empty($companyEdit) ? $companyEdit->id : '' ?>">

        <div class="form-group row">
            <label for="contrato" class="col-sm-3 col-form-label">{{ __('Contract') }}*</label>
            <div class="col-sm-6">
                <select name="contrato" id="contrato-name" class="form-control "
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                    <?= !empty($type_user) && $type_user == 'ADM' ? 'disabled' : '' ?>
                    required>
                    @foreach ($contratos as $contrato)
                        <option
                            <?= !empty($companyEdit) && $companyEdit->contract_id == $contrato->id ? 'selected' : '' ?>
                            value=" {{ $contrato->id }}">{{ $contrato->numbercontract.'-'.$contrato->Persona->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Persona') }}*</label>
            <div class="col-xs-3 col-sm-4 col-md-4  input-bar-item">

                <select name="persona" id="persona-name" class="form-control "
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="true" selected >{{__('Select a person')}}</option>
                    @foreach ($personas as $persona)
                        <option
                            <?= !empty($companyEdit) && $companyEdit->person_id == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{ $persona->fullname }}</option>
                    @endforeach
                </select>
            </div>

            <div style="height: 55px"></div>

            <div class="col-xs-2 col-sm-2 col-md-2"
                    style="text-align: right; display:{{ !empty($companyEdit) ? 'none' : ''  }};">
                <a href="/{{strtolower( $group.'/'.$page.'/addperson') }}"
                    type="button"
                    class="btn btn-primary" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >{{ __('Add Person') }}</a>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2"
                    style="text-align: right; display:{{ !empty($companyEdit) ? '' : 'none'  }};">
                <button type="button" id="edit-person" class="btn btn-info"
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>{{ __('Edit Person') }}</button>
            </div>
        </div>

        <div class="form-group row">
            <label for="storename" class="col-sm-3 col-form-label">{{ __('Store Name') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="storename" id="storename-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        value="{{ !empty($companyEdit) ? $companyEdit->name : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="slogan" class="col-sm-3 col-form-label">{{ __('Slogan') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="slogan" id="slogan-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        value="{{ !empty($companyEdit) ? $companyEdit->slogan : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="tiposede" class="col-sm-3 col-form-label">{{ __('Type Sede') }}*</label>
            <div class="col-sm-3">
                <select name="tiposede" id="tiposede-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemstypesede as $typesede)
                        <option
                            <?= !empty($companyEdit) && $companyEdit->typecompany_id == $typesede->id ? 'selected' : '' ?> value="{{ $typesede->id }}">{{ $typesede->name }}</option>
                    @endforeach
                </select>
            </div>

            <label for="idowner" class="col-sm-2 col-form-label">{{ __('Idowner Company') }}*</label>
            <div class="col-sm-1">
                <input type="text" name="idowner" id="idowner-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($companyEdit) ? $companyEdit->idowner : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="startdate" class="col-sm-3 col-form-label">{{ __('Start Date') }}*</label>
            <div class="col-sm-2">
                <input <?= auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ? 'readonly' : '' ?>  type="date" name="startdate" id="startdate-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        value="{{ !empty($companyEdit) ? $companyEdit->startdate : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="enddate" class="col-sm-3 col-form-label">{{ __('End Date') }}*</label>
            <div class="col-sm-2">
                <input <?= auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero') ? 'readonly' : '' ?> type="date" name="enddate" id="enddate-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        value="{{ !empty($companyEdit) ? $companyEdit->enddate : '' }}">
            </div>
        </div>

        @if($type_contrac != "CEN")
        <div class="form-group row">
            <label for="admonid" class="col-sm-3 col-form-label">{{ __('Store Manager') }}*</label>
            <div class="col-sm-6">
                <select  name="admonid" id="admonid-name" style="width:100%" class="js-states form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> multiple >
                    @foreach ($usersadmon as $admon)
                        <option value="{{ $admon->id }}">{{ $admon->person->fullname }} ({{$admon->name}})</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if($type_contrac == "DES" && $type_user == "VEN")
        <div class="form-group row">
            <label for="catalog" class="col-sm-3 col-form-label">{{ __('Catalog') }}*</label>
            <div class="col-sm-3">
                <select name="catalog" id="catalog-name"
                        class="form-control " <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                    <option value="true" selected>{{__('Without assigned catalog')}}</option>
                    @foreach ($catalogs as $catalog)
                        <option
                            <?= !empty($companyEdit) && $companyEdit->catalog_id == $catalog->id ? 'selected' : ''?> value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if($type_contrac == "CEN" || $type_user == "VEN")
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

        <div class="form-group row store-id" style="display: none">
            <label for="storeId" class="col-sm-3 col-form-label">{{ __('Store Id') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="storeId" id="storeId-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        value="{{ !empty($companyEdit) ? $companyEdit->storeId : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="sellers[]" class="col-sm-3 col-form-label">{{ __('Sellers - Cashiers') }}*</label>
            <div class="col-sm-6">
                <select name="sellers[]" id="sellers-name" style="width:100%" class="js-states form-control"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> multiple>
                    @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}"
                            data-company-id="{{ $seller->firstname }}">{{ $seller->socialreason }} 
                            {{ $seller->firstname }} {{ $seller->lastname }} ({{$seller->name}})
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="opening_time" class="col-sm-3 col-form-label">{{ __('Opening Time') }}*</label>
            <div class="col-sm-6">
                <input type="time" name="opening_time" id="opening_time" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> 
                        value="{{ !empty($companyEdit->schedule) ? explode('|', $companyEdit->schedule)[0] : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="closing_time" class="col-sm-3 col-form-label">{{ __('Closing Time') }}*</label>
            <div class="col-sm-6">
                <input type="time" name="closing_time" id="closing_time" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> 
                        value="{{ !empty($companyEdit->schedule) ? explode('|', $companyEdit->schedule)[1] : '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inventory_control" class="col-sm-3 col-form-label">{{ __('Inventory Control') }}*</label>
            <div class="col-sm-2">
                <select name="inventory_control" id="inventory_control" class="form-control select-status"
                        <?= !empty($companyEdit) ? 'readonly' : '' ?> required>
                    <option <?= !empty($companyEdit) && $companyEdit->inventory_control == "1" ? 'selected' : 'name="not_selected"' ?> value="1">{{ __('Yes') }}</option>
                    <option <?= !empty($companyEdit) && $companyEdit->inventory_control == "0" ? 'selected' : 'name="not_selected"' ?> value="0">{{ __('No') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="delivery_service" class="col-sm-3 col-form-label">{{ __('Delivery service') }}*</label>
            <div class="col-sm-2">
                <select name="delivery_service" id="delivery_service" class="form-control select-status" required>
                    <option value="1">{{ __('Yes') }}</option>
                    <option <?= empty($companyEdit->deliverytype) ? 'selected' : '' ?>
                            value="0">{{ __('No') }}</option>
                </select>
            </div>

            <div class="col-sm-3">
                <select name="deliverytype_id" id="deliverytype_id" style="width:100%" class="js-states form-control deliverytype_id" >
                    <option value="true" selected>{{__('Select type of home delivery')}}</option>
                    @foreach ($deliveryLists as $delivery)
                        <option <?= !empty($companyEdit) && $companyEdit->deliverytype == $delivery->id ? 'selected' : '' ?> value="{{$delivery->id}}">{{ $delivery->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- <div class="form-group row delivery_list"   <?=!empty($companyEdit->deliverytype) ? 'display: true' :'style="display:none"' ?> >
        <div class="form-group row delivery_list">
            <div class="col-sm-5">
                <select name="deliverytype_id" id="deliverytype_id" style="width:100%" class="js-states form-control deliverytype_id">
                    @foreach ($deliveryLists as $delivery)
                        <option value="{{ !empty($companyEdit->deliverytype) ? $companyEdit->deliverytype : $delivery->id   }}">{{ $delivery->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> -->

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-2">
                <select name="status" id="estado-name" class="form-control select-status"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option
                        <?= !empty($companyEdit) && $companyEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option
                        <?= !empty($companyEdit) && $companyEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        @endif

        @if(!empty($companyEdit))
        <input type="hidden" name="companyId" value="{{ $companyEdit->id }}"/>
        @endif

        {{--Agregar Imagen Company--}}
        @component('management.components.images.imagecomponent')
            @slot('image',$image)
            @slot('path',$path)
            @slot('nameId','companyId')
            @if(!empty($companyEdit))
                @slot('edit',$companyEdit)
                @slot('scrCustom',$companyEdit->logo)
            @endif
            @if(!empty($perEdit))
                @slot('perEdit',$perEdit)
            @endif
        @endcomponent

    </form>
</div> 


<!-- Current Users -->

<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Companies') }}

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
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'contrato.numbercontract', name: 'Contrato.numbercontract', title: "{{ __('Contrato') }}"},
                {data: 'fullname', name: 'fullname', title: "{{ __('Persona') }}"},
                {data: 'name', name: 'name', title: "{{ __('Store Name') }}"},
                {data: 'slogan', name: 'slogan', title: "{{ __('Slogan') }}"},
                {
                    data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false
                }
            ],
            "order": [[0, "desc"]]
        });

        @if (!empty($companyEdit) || count($errors) > 0)  
            @if(!auth()->user()->hasRole('adcontrato') &&
                !auth()->user()->hasRole('admin'))  
                document.getElementById("contrato-name").disabled = true;
                document.getElementById("persona-name").disabled = true;
                document.getElementById("tiposede-name").disabled = true;
                @if($type_contrac == "CEN")
                document.getElementById("inventory_control").disabled = true;
                @endif
            @endif                    
            $(".btn-add").trigger("click");
        @endif

        var $sellers = $('#sellers-name').select2().val('');
        $sellers.change();

        @if (!empty($companyEdit))

            arr = [];
        @foreach($companyEdit->getSellers() as $seller)
        arr.push('{{ $seller->id }}');
        @endforeach

            $sellers = $('#sellers-name').select2().val(arr);
        $sellers.change();
        @endif

        //Payments methods
        var $payments = $('#payments-name').select2().val('');
        $payments.change();

        var $admons = $('#admonid-name').select2().val('');
        $admons.change();

        @if (!empty($companyEdit))
            arr = [];
        $('#admonid-name').select2().val('{{$companyEdit->admon_id}}');
        console.log($('#admonid-name').select2().val());
        @foreach($companyEdit->getPaymentsMethods() as $pays)
        arr.push('{{ $pays->id }}');
        @endforeach
            $payments = $('#payments-name').select2().val(arr);
        $payments.change();
        @endif
        @if(auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero'))
            $('#admonid-name').select2().prop('disabled',true);
        @endif

        //Valida si escoge el metodo de pago Fiado electronico
        $('#payments-name').change(function () {
            if (!$('#payments-name').val()) {
                $('.store-id').hide(500)
                $('#storeId-name').val("");
            } else {
                let flag = $('#payments-name').val().filter(e => e == 107)
                if (flag[0] == '107') {
                    $('.store-id').show(500)
                } else {
                    $('.store-id').hide(500)
                    $('#storeId-name').val("");
                }
            }
        });
        @if(!empty($haveCredential->store_key))
        let flag = $('#payments-name').val().filter(e => e == 107)
        if (flag[0] == '107')
            $('.store-id').show()
        $('#storeId-name').val('{{$haveCredential->store_key}}')
        @endif
    });

    $('#form_company').submit(function( event ) {
        document.getElementById("contrato-name").disabled = false;
        document.getElementById("persona-name").disabled = false;
        document.getElementById("tiposede-name").disabled = false;
        @if($type_contrac == "CEN")
        document.getElementById("inventory_control").disabled = false;
        @endif
        $('#admonid-name').select2().prop('disabled',false);
    });

    function onDisabled(event) {
        if (!event) {
            alert("{{__('You are complete maximun numbes of ')}}" + "{{__('Companies') }}");
            return false;
        }
    }

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
        var edit_user = $('#id_contrac').val();
        location.href = "/" + $("#url").val() + "/editperson/" + edit_person + '?user=' + edit_user;
    });

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


    $(document).on('change',"#delivery_service",function() {
        console.log("este es el valor de si o no "+$('#delivery_service').val());
        if($('#delivery_service').val() == 1) {
            $('.delivery_list').show();
            $('#deliverytype_id').attr('disabled',false);
        } else {
            $('#deliverytype_id').attr('disabled',true);
        }
    });

    // @if($type_contrac == "CEN")
    // $('#delivery_service').on('change',function () {
    //     console.log("este es el valor de si o no "+$('#delivery_service').val());
    //     if($('#delivery_service').val() == 1) {
    //         $('.delivery_list').show();
    //         $('#deliverytype_id').attr('disabled',false);
    //     } else {
    //         $('#deliverytype_id').attr('disabled',true);
    //     }
    // })
    // @endif

    $('#delivery_service').change();
    console.log("este es el valor de si o no "+$('#delivery_service').val());
    
</script>
@endsection
