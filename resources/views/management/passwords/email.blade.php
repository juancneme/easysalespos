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

                    <form class="form-horizontal f1" role="form" method="POST" action="/email">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ __('Recover your password') }}</label>

                            <div class="col-md-11 offset-md-1 col-lg-12 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                <input placeholder="{{ __('Registered email') }}" id="email" type="email"
                                    class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div
                                class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1">
                                <button style="color:#fff; background-color:#138496" type="submit"
                                    class="btn btn-info btn-block my-4">
                                    {{__('reset password, send link')}}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
