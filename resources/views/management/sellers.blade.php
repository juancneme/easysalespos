<?php $page_title = __('Sellers') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="display:block;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal"
        style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Cashier') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input id="id_user" type="hidden" name="id_user" value="<?= !empty($userEdit) ? $userEdit->id : '' ?>">        
        
        

        <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">{{ __('Full Name') }}*</label>
            <div class="col-sm-2">
                <input type="text" name="firstname" id="firstname-name" class="form-control"
                    placeholder="{{ __('First Name') }}"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                    style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    value="{{old('firstname') }}">
            </div>
            <div style="height: 50px"></div>
            <div class="col-sm-2">
                <input type="text" name="othernames" id="othernames-name" class="form-control"
                    placeholder="{{ __('Others Names') }}"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                    style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    value="{{old('othernames') }}">
            </div>
            <div style="height: 50px"></div>
            <div class="col-sm-2">
                <input type="text" name="lastname" id="lastname-name" class="form-control"
                    placeholder="{{ __('LastName') }}"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                    style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    value="{{old('lastname') }}">
            </div>
            <div style="height: 50px"></div>
            <div class="col-sm-2">
                <input type="text" name="otherlastname" id="otherlastname-name" class="form-control"
                    placeholder="{{ __('Others LastNames') }}"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                    style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    value="{{old('otherlastname') }}">
            </div>
        </div>





        <div class="form-group row">

            <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}*</label>
            <div class="col-sm-8">
                <input type="email" name="email" id="email-name" class="form-control"
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> value="{{old('email')}}"
                    <?= !empty($userEdit) && !auth()->user()->hasRole('admin') ? 'readonly' : '' ?>>

            </div>
        </div>

        <div class="form-group row">

            <label for="status" class="col-sm-2 col-form-label">{{ __('Doc Type') }}*</label>
            <div class="col-sm-8">
                <select name="typedocument" id="typedocument" class="form-control"
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>>
                    <option value="true" disabled selected>{{__('Select a type of identification')}}</option>
                    @foreach ($documents as $docu)
                    <option value="{{ $docu->id }}">{{ $docu->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row" style="display:{{ !empty($userEdit) ? 'none' : ''  }};">
            <label for="user-name-full" class="col-sm-2 col-form-label">{{ __('Doc Number') }} *</label>
            <div class="col-sm-8">
                <input type="text" name="numberdocument" id="Doc Number" class="form-control">
            </div>
        </div>
        <div class="form-group row">

            <label for="status" class="col-sm-2 col-form-label">{{ __('Companies') }}*</label>
            <div class="col-sm-8">
                <select name="sellcompany" id="sellcompany" class="form-control"
                    <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>>
                    <option value="true" disabled selected>{{__('Select a store')}}</option>
                    @foreach ($companys as $sell)
                    <option value="{{ $sell->id }}">{{ $sell->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip"
            title="{{ __('Cancel') }}">
            <i class="fa fa-reply"></i>
        </button>
        <button type="submit" class="btn btn-primary"
            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> data-placement="top"
            data-toggle="tooltip" title="{{ __('Save Changes') }}">
            <i class="fa fa-save"></i>
        </button>

    </form>
</div>



@endsection