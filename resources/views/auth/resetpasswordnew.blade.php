<?php $page_title = __('Reset') ?>
@extends('forms_template')
@section('form')

<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
    
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="top-content">
        <div class="container">

            <div class="row">
                <div
                    class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1 form-box">

            <form class="form-horizontal f1" role="form" method="POST" action="{{route('changepassword')}}">
                        {{ csrf_field() }}

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

                </div>
            </div>
        </div>
    </div>
</div>




@endsection