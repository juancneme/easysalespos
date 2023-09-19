<!--app/views/form.blade.php-->
<?php $page_title = __('User Profile') ?>
@extends('admin_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body">

    <!-- New Form -->
    <!-- 	<form action="{{ url('management/profiles') }}" method="POST" class="form-horizontal" enctype="application/x-www-form-urlencoded"> -->
    {!! Form::open(array('url'=>'/management/profiles', 'method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}
<!-- 		<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    <div class="panel-heading">{{ __('User Profile') }}</div>

    <input type="hidden" name="user_id" value="{{ !empty($profileEdit) ? $profileEdit->user->id : 0 }}">
    <!-- User Name -->
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">{{ __('User Name') }}</label>

        <div class="col-sm-6">
            <input type="text" name="name" id="name" readonly class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->user->name : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="photo" class="col-sm-3 control-label">{{ __('Photo') }}</label>

        <div class="col-sm-6">
            <div class="form-group edit-profile-form">
                {!! Form::file('photo', array('id'=>'photo','class'=>'file')) !!}
                @if(!empty($profileEdit) && !empty($profileEdit->photo))
                <img src="{{ $profileEdit->photo }}" height="100px" />
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="birthday" class="col-sm-3 control-label">{{ __('Birthday') }}</label>

        <div class="col-sm-6">
            <input type="text" name="birthday" id="birthday" class="form-control input-datepicker" value="{{ !empty($profileEdit) ? $profileEdit->birthday : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="docType" class="col-sm-3 control-label">{{ __('Doc Type') }}</label>

        <div class="col-sm-6">
            <select name="docType" id="docType" class="form-control select2">
                <option value="">{{ __("Select") }}</option>
                <option value="1">{{ __("Citizenship Card") }}</option>
                <option value="2">{{ __("Foreigner ID") }}</option>
                <option value="3">{{ __("Passport") }}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="docNum" class="col-sm-3 control-label">{{ __('Doc Number') }}</label>

        <div class="col-sm-6">
            <input type="text" name="docNum" id="docNum" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->doc_num : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="celPhone" class="col-sm-3 control-label">{{ __('Cel Phone') }}</label>

        <div class="col-sm-6">
            <input type="text" name="celPhone" id="celPhone" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->cel_phone : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="housePhone" class="col-sm-3 control-label">{{ __('House Phone') }}</label>

        <div class="col-sm-6">
            <input type="text" name="housePhone" id="housePhone" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->house_phone : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-sm-3 control-label">{{ __('Address') }}</label>

        <div class="col-sm-6">
            <input type="text" name="address" id="address" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->address : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="neighborhood" class="col-sm-3 control-label">{{ __('Neighborhood') }}</label>

        <div class="col-sm-6">
            <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->neighborhood : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="locality" class="col-sm-3 control-label">{{ __('Locality') }}</label>

        <div class="col-sm-6">
            <input type="text" name="locality" id="locality" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->locality : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="houseApto" class="col-sm-3 control-label">{{ __('House / Apartment') }}</label>

        <div class="col-sm-6">
            <input type="radio" name="houseApto" id="houseApto" class="form-control" value="0" {{ !empty($profileEdit) && $profileEdit->houseApto == '0' ? 'checked' : '' }} /> {{ __('House') }}
            <input type="radio" name="houseApto" id="houseApto" class="form-control" value="1" {{ !empty($profileEdit) && $profileEdit->houseApto == '1' ? 'checked' : '' }} /> {{ __('Apartment') }}
        </div>
    </div>

    <div class="form-group">
        <label for="houseType" class="col-sm-3 control-label">{{ __('House Type') }}</label>

        <div class="col-sm-6">
            <select name="houseType" id="houseType" class="form-control select2">
                <option value="">{{ __("Select") }}</option>
                <option value="1">{{ __("Own") }}</option>
                <option value="2">{{ __("Rent") }}</option>
                <option value="3">{{ __("Own with debt") }}</option>
                <option value="4">{{ __("Family") }}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="civilStatus" class="col-sm-3 control-label">{{ __('Civil Status') }}</label>

        <div class="col-sm-6">
            <select name="civilStatus" id="civilStatus" class="form-control select2">
                <option value="">{{ __("Select") }}</option>
                <option value="1">{{ __("Single") }}</option>
                <option value="2">{{ __("Married") }}</option>
                <option value="3">{{ __("Free Union") }}</option>
                <option value="4">{{ __("Separated") }}</option>
                <option value="5">{{ __("Divorced") }}</option>
                <option value="6">{{ __("Widower") }}</option>
                <option value="7">{{ __("Boyfriend / Girlfriend") }}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="childrens" class="col-sm-3 control-label">{{ __('Childrens') }}</label>

        <div class="col-sm-6">
            <input type="number" name="childrens" id="childrens" class="form-control" value="{{ !empty($profileEdit) ? $profileEdit->childrens : '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="education" class="col-sm-3 control-label">{{ __('Education') }}</label>

        <div class="col-sm-6">
            <select name="education" id="education" class="form-control select2">
                <option value="">{{ __("Select") }}</option>
                <option value="1">{{ __("Preschool") }}</option>
                <option value="2">{{ __("Basic Primary") }}</option>
                <option value="3">{{ __("Basic High School") }}</option>
                <option value="4">{{ __("Half") }}</option>
                <option value="5">{{ __("Technician") }}</option>
                <option value="6">{{ __("Profesional Technician Training") }}</option>
                <option value="7">{{ __("Technological") }}</option>
                <option value="8">{{ __("University") }}</option>
                <option value="9">{{ __("Specialization") }}</option>
                <option value="10">{{ __("Master") }}</option>
                <option value="11">{{ __("Phd") }}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="cv" class="col-sm-3 control-label">{{ __('CV') }}</label>

        <div class="col-sm-6">
            <div class="form-group edit-profile-form">
                {!! Form::file('cv', array('id'=>'cv','class'=>'file')) !!}
                @if(!empty($profileEdit) && !empty($profileEdit->cv))
                <a href="{{ $profileEdit->cv }}" target="_blank">{{ __('CV') }}</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Task Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            @if(!empty($profileEdit))
            <input type="hidden" name="profileId" value="{{ $profileEdit->id }}" />
            @endif
            <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                <i class="fa fa-reply"></i> 
            </button>
            <!-- 				<button type="submit" class="btn btn-primary"> -->
            <!-- 					<i class="fa fa-save"></i> Save Changes -->
            <!-- 				</button> -->
            {!! Form::button('<i class="fa fa-save"></i> ', array("type"=>"submit", "class"=>"btn btn-primary", "title"=> __('Save Changes') )) !!}
        </div>
    </div>
    <!-- 	</form> -->
    {!! Form::close() !!}
    <hr style="border-color: #ccc" />
</div>

<script>
    jQuery(document).ready(function ($) {
        $(".btn-cancel").on('click', function (e) {
            e.preventDefault();
            location.href = "/management/users";
        });

        @if (!empty($profileEdit))
        doctype = $("#docType").select2().val("{{ $profileEdit->doc_type }}");
        doctype.change();

        houseApto = $('#houseApto[value="{{ $profileEdit->house_apto }}"]').iCheck('check');
        houseApto.change();

        houseType = $("#houseType").select2().val("{{ $profileEdit->house_type }}");
        houseType.change();

        civilStatus = $("#civilStatus").select2().val("{{ $profileEdit->civil_status }}");
        civilStatus.change();

        education = $("#education").select2().val("{{ $profileEdit->education }}");
        education.change();

        @endif
    });
</script>
@endsection