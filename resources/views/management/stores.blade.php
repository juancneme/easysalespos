<?php $page_title = __('Comercios Disponibles') ?>
@extends('ruta_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <style>
        .owl-carousel .owl-stage {
            margin-bottom: 5px;
        }
        .container-fluid {
            width: 85vw;
        }

    </style>
    <form method="POST" action="{{ route('store.search')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group mx-sm-6">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input class="form-control form-control-lg" type="text" name="inputSearch" placeholder="{{__('Search')}}"
                   required>
        </div>
        <button type="submit" id="btn_search" class="btn btn-primary mb-2">{{__('Search')}}</button>
        <a href="/management/stores" type="button" class="btn btn-info mb-2" title="{{ __('User Profile') }}">
            {{__('Return')}}
        </a>
    </form>

    <div class="container-fluid">
        <div style="border: #D2CFCF 2px solid; background-color:#F0EEEE;border-top-width: 1px; height: 66vh;">
            <div class="row" style="height: 66vh;">
                <div class="perfectScrollbarContainer" style="height: 65vh;   ">
                    <div  style=" height: 85%; padding-left: 5px;padding-right: 0px; ">
                        @foreach($stores as $store)
                            <div class="card" style="cursor:pointer; border: 2px solid #D2CFCF; border-radius: 5px;
                    background-color:#ffffff;display: inline-block;max-width:2.8vw; min-width:300px; min-height:300px; padding-top: 15px; padding-left: 7px; padding-right: 5px;margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">
                                <img class="card-img-top" style="width: 24vw; height: 180px; max-width:250px; min-width:250px;"
                                     src="{{!empty($store->logo) ? '/support/pictures/companies/'.$store->contract_id.'/' .$store->company_id. '/'. $store->logo : '/support/pictures/companies/comp000000.png' }}" alt="Card image cap">
                                <div class="card-body" style="padding-left: 1px; padding-right: 1px; padding-top: 5px; padding-bottom: 5px;">
                                    <h6 class="card-title" style="height: 30px;"> {{strtoupper($store->name)}} </h6>
                                    <!-- <p class="card-text" style="line-height: 15px; height: 32px;">{{strtoupper($store->slogan)}}</p>
                                    <p class="card-text" style="line-height: 15px; height: 32px;">{{strtoupper($store->address)}}</p>
                                    <p class="card-text" style="line-height: 15px; height: 32px;">{{strtoupper($store->country)}}</p> -->
                                  <!--  <p class="card-text">
                                    
                                    </p> -->

<div style="display: flex;">

<form method="POST" action="{{ route('store.send',['id'=>$store->company_id])}}">
                                        {{ csrf_field() }}
                                        <button type="{{ $store->typeshift_id === 14 ? 'submit' : 'button' }}"
                                                style="{{ $store->typeshift_id === 14 ? 'background: rgb(92, 184, 92); ' : 'background: salmon ' }}"
                                        "
                                        class="btn {{ $store->typeshift_id === 14 ? 'btn-primary ' : 'btn-danger btn_send' }}
                                        "
                                        data-placement="top" data-toggle="tooltip" title="{{ __('Ir a la comercio') }}">
                                        <i class="fa  {{ $store->typeshift_id === 14 ? 'fa-arrow-circle-right' : 'fa-stop-circle' }}"></i>
                                        </button>
                                    </form>

                                    <div class="text-muted" style="font-weight:bold;padding-top: 6px;padding-left: 12px;">{{ $store->typeshift_id === 14 ? 'ABIERTO' : 'CERRADO' }}</div>

</div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function ($) {
                $('.owl-carousel').owlCarousel({});
                $('.btn_send').click(function () {
                    alert('La comercio no se encuentra disponible');
                });


            });
        </script>
@endsection
