<?php $page_title = __('Reset') ?>
@extends('forms_template')
@section('form')

<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="top-content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1 form-box">

                    <form class="form-horizontal f1" role="form" method="POST" action="{{ url('/reset') }}">
                        {{ csrf_field() }}

                        <div class="panel panel-success">
                            <label style="font-weight: 400" for="email" class="col-md-4 control-label">{{ __('Reset Password') }}</label>
                            <input type="hidden" name="token" value="{{ $token }}"/>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">{{ __('Email') }}</label>

                                <div class="col-md-11 offset-md-1 col-lg-12 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                    @if (session('send_email'))
                                        <input id="email" placeholder="{{ __('Email') }}" type="email" class="form-control" name="email" value="{{ session('send_email') }}" required autofocus>
                                    @else
                                        <input id="email" placeholder="{{ __('Email') }}" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                    @endif

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(auth()->user())
                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label for="old_password" class="col-md-4 control-label">{{__('Enter your old password')}}</label>

                                <div class="col-md-11 offset-md-1 col-lg-12 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                    <input style="font-weight: 400" id="old_password" placeholder="{{__('Enter your old password')}}" type="password" class="form-control" name="old_password" required autofocus>

                                    @if ($errors->has('old_password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">{{__('Enter your new password')}}</label>

                                <div class="col-md-11 offset-md-1 col-lg-12 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                    <input style="font-weight: 400" id="password" placeholder="{{__('Enter your new password')}}" type="password" class="form-control" name="password" required autofocus>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">{{__('Confirm your new password')}}</label>
                                <div class="col-md-11 offset-md-1 col-lg-12 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                    <input style="font-weight: 400" id="password-confirm" placeholder="{{__('Confirm your new password')}}" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div
                                    class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                    <button style="color:#fff; background-color:#138496" type="submit"
                                        class="btn btn-info btn-block my-4">
                                        {{__('Reset Password')}}
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
