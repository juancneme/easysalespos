<?php $page_title = 'Gestion y Control' ?>
@extends('pike_template')
@section('content')
@include('common.errors')

<div class="mainReportes">
    <!--<button class="btnmessage">mensaje</button>-->
    <form name="form1" action="{{ url('/sir/info') }}" method="get" class="form-inline form-horizontal" style="padding-top: 15px;">
            <input type="hidden" name="empresa" id="empresa" value="1" />

            <label for="fechaInicial" class="col-2 col-form-label">{{ __('Init Date') }}*</label>
            <input type="text" name="fechaInicial" id="fechaInicial" class="col-3 form-control" value="{{ !empty(Input::get("fechaInicial")) ? Input::get("fechaInicial") : date('Y-01-01') }}" />
            
            <label for="fechaFinal" class="col-2 col-form-label">{{ __('End Date') }}*</label>
            <input type="text" name="fechaFinal" id="fechaFinal" class="col-3 form-control" value="{{ !empty(Input::get("fechaFinal")) ? Input::get("fechaFinal") : date('Y-01-t') }}" />
            
            <button type="submit" name="btnsave" class="btn btn-primary" style="margin-left: 15px;">
                <i class="fa fa-search"></i> {{ __('Search') }}
            </button>
        
    </form>
</div>

<div class="row">
    <div class="col-12">
        @foreach($querys as $query)
        <p class="font-600 m-b-5">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
        <div class="progress">
        <div class="progress-bar progress-bar-striped progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95"></div>
        </div>
        @endforeach
    </div>
</div>

<script>
    jQuery(document).ready(function($){
        @if(empty(Input::get("fechaFinal")))
        $("button[name='btnsave']").trigger('click');
        @endif
    });
</script>
@endsection
