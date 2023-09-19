<?php $page_title = __('Couriers') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Couriers') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Person') }}*</label>
            <div class="col-xs-3 col-sm-4 col-md-4  input-bar-item">
                <select name="person" id="persona-name" class="form-control " data-live-search="true" required>
                    <option value="" selected >{{__('Select a person')}}</option>
                    @foreach ($persons as $persona)
                        <option
                            <?= !empty($courierEdit) && $courierEdit->person_id == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{ $persona->fullname }}</option>
                    @endforeach
                </select>
            </div>
            <div style="height: 55px"></div>

            <div class="col-2">
                <button type="button" id="edit-person" class="btn btn-info">{{ __('Add Person') }}</button>

            </div>

        </div>

        <!-- Company -->
        <div class="form-group row">
            <label for="company" class="col-sm-3 col-form-label">{{ __('Company') }}</label>
            <div class="col-sm-6">
                <select name="company" id="company-name" class="form-control" >
                    <option selected value="">{{ __('Select a Company') }}</option>
                    @foreach($companies as $c)
                        <option <?= !empty($courierEdit) && $courierEdit->company_id == $c->id ? 'selected' : '' ?> value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Vehicle -->
        <div class="form-group row">
            <label for="vehicle" class="col-sm-3 col-form-label">{{ __('Vehicle') }}*</label>
            <div class="col-sm-6">
                <select name="vehicle" id="vehicle-name" class="form-control" required>
                    <option selected value="">{{ __('Select a vehicle type') }}</option>
                    @foreach($vehicles as $v)
                        <option <?= !empty($courierEdit) && $courierEdit->vehicle->type_id == $v->id ? 'selected' : '' ?> value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Reg Vehicle -->
        <div class="form-group row">
            <label for="price_sale" class="col-sm-3 col-form-label">{{ __('Reg Vehicle') }}*</label>
            <div class="col-sm-6">
                <input type="text" style="text-transform:uppercase;" disabled name="register" id="register-vehicle" class="form-control" value="{{ !empty($courierEdit) ? $courierEdit->vehicle->register : '' }}"/>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="status-name" class="form-control select-status" required>
                    <option <?= !empty($courierEdit) && $courierEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($courierEdit) && $courierEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div style="height:42px"></div>
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($courierEdit))
                    <div style="height: 8px"></div>
                    <input type="hidden" name="courierId" value="{{ $courierEdit->id }}" />
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                <button type="submit" class="btn btn-primary" <?= !empty( $courierEdit ) && $courierEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}"
                    <?= !empty($courierEdit) && $courierEdit->status == "1" ? 'selected' : '' ?> >
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Couriers') }}

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
                {data: 'fullname', name: 'fullname', title: "{{ __('Full Name') }}"},
                {data: 'identification', name: 'numberdocument', title: "{{ __('Type Id') }}"},
                {data: 'company', name: 'company', title: "{{ __('Company') }}"},
                {data: 'vehicle', name: 'vehicle', title: "{{ __('Vehicle') }}"},
                {data: 'cantidad', name: 'cantidad', title: "{{ __('Deliveries') }}"},
                {data: 'record', name: 'record', title: "{{ __('Vehicle Record') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "asc"]]
        });

        @if (!empty($courierEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
        @endif

        if(sessionStorage.getItem("change") === 'true'){
            $(".btn-add").trigger("click");
            sessionStorage.removeItem("change");
        }

        @if (empty($courierEdit->vehicle_id))
            $("#vehicle-name").val($("#vehicle-name option:first").val());
        @endif
    });

    @if ( !empty($perAddcourier) && $perAddcourier )
        $(".btn-add").attr("disabled", false);
    @else
        $(".btn-add").attr("disabled", true);
    @endif

    @if(!empty($courierEdit) )
        $("#edit-person").text('{{ __('Edit Person') }}');
            if( $('#vehicle-name').val() !== '120')
                $('#register-vehicle').prop( "disabled", false);
            else{
                $('#register-vehicle').prop( "disabled", true);
            }
    @endif

    // Add or Edit Person
    $(document).on('click', "#edit-person", function () {
        $person_id = $('#persona-name').val();
        console.log("person_id ", $person_id);
        if ($person_id != null && $person_id != ''){
            location.href = "/{{strtolower($group.'/'.$page)}}/editperson/" + $person_id+'?peredit=enabled';
        } else {
            location.href = "/{{strtolower($group.'/'.$page)}}/addpersons/couriers";
        }
    });

    $("#vehicle-name").on("change", function () {
        type = $('#vehicle-name').val();
        if(type === '120' || type === ''){
            $('#register-vehicle').val('');
            $('#register-vehicle').prop( "disabled", true);
        }
        else{
            $('#register-vehicle').prop( "disabled", false);
        }
    });

</script>

@endsection
