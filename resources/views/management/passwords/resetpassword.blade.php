<?php $page_title = __('') ?>
@extends('pike_template')
@section('content')

@include('common.errors')
<form method="post" action="/management/update">
    {{ csrf_field() }}

    <hr style="height: 2px; background-color: #CCCCCC;">
    <h3>{{ __('PASSWORD CHANGE') }}</h3>
    <hr style="height: 2px; background-color: #CCCCCC;">
    <label>{{ __('The new password must contain between 8 and 16 characters, and must be the combination of spatial characters, lowercase letters, capital letters and numeric characters.') }}</label>
    <br>
    <label>{{ __('Valid special characters: ') }} !#$%&()*+,-.:;<=>?/@\_"</label>
    <hr style="height: 2px; background-color: #CCCCCC;">

    <div class="form-group">
        <label for="mypassword">{{__('Enter your current password')}}:</label>
        <input type="password" name="mypassword" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">{{__('Enter your new password')}}:</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="mypassword">{{__('Confirm your new password')}}:</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">{{__('Change my password')}}</button>
</form>
@endsection