<?php $page_title = __('SuperPagos') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')


    <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    <!-- Current Oders -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('SuperPagos') }}
        </div>
        <div class="form-group row">
            <form action="/management/pdvi/downloadCarnet" method="GET">
                <div class="applysistecredit">
                    <button type="submit" style="height: 50px; margin-right: 24px;" class="btn btn-primary btn-lg">
                        <h5 style="color:#fff;" class="modal-title modal_header_font">   {{ __('Tarjeta recaudo') }}                 <i class="fa fa-file-pdf-o"></i>
                        </h5>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>

    </script>

@endsection
