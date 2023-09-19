<?php $page_title = __('Services') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <style>
        .loader {
            border: 16px solid #a4a4a4;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 42px;
            height: 42px;
            -webkit-animation: spin 2s linear infinite;
        / Safari / animation: spin 2 s linear infinite;
        }

        /* Safari*/
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="d-flex justify-content-center">
        <div class="loader" hidden="true" style="margin-top: -41px;">

        </div>
    </div>


    <!-- MODAL CARGAR SERVICES-->
    <div class="modal fade" id="modalServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">SERVICES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('Do you want to include the services of MULTIMARK in the stores?')}}
                </div>

                <div>
                    <div class="alert alert-warning alert-dismissable">
                        <strong>{{__('Whoops!')}}</strong> {{__('If you have not created all the MANUFACTURERS Claro, Movistar, Tigo, Avantel, Virgin, Etb, Connect me, only the ones you have at the moment will be loaded.')}}
                    </div>
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="url" type="hidden" name="url" value="{{ $group . '/' . $page }}">

                        <select hidden class="custom-select custom-select-m select-send" id="id_cat" name="id_cat"
                                required="required">
                            @if($catalogos !='')
                                @foreach($catalogos as $cat)
                                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('Cancel')}}</button>
                            <button type="button" class="btn btn-primary btn-services">{{_('Accept')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL DELETE SERVICES-->
    <div class="modal fade" id="modalDelServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">SERVICES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <div class="alert alert-danger alert-disservicesmissable">
                        <strong>{{__('Whoops!')}}</strong> {{__('¿Do you want to delete all the services purchased from your catalog?')}}
                    </div>
                    <form>
                        <select class="custom-select custom-select-m select-send" id="id_cate" name="id_cat"
                                required="required">
                            @if($catalogos !='')
                                @foreach($catalogos as $cat)
                                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <select class="selectpicker"
                                id="pacages" name="pacages">
                            @if($categories !='')
                                @foreach($categories as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('Cancel')}}</button>
                            <button type="button" class="btn btn-primary btn-del-services">{{_('Accept')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Current Users -->
    <div class="row panel panel-default">
        <div class="card col-md-4" style="width: 30rem;height: 40rem;">
            <div class="card-body">
                <!--tab-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">{{__('Recharge')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">{{__('Packages')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form>
                            <div style="margin-top: 29px">
                                <label>{{__('Recharge Value')}}</label>
                                <input class="form-control" type="text" id="amount" name="amount"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '')" required/>
                            </div>
                            <div style="margin-top: 29px">
                                @if(empty($operators))
                                <div class="alert alert-primary" role="alert">
                                    {{__('Please create at least one Service manufacturer!')}}
                                </div>
                                @endif
                                <select class=" form-control selectpicker" multiple data-live-search="true"
                                        id="operators" name="operators[]">
                                    @if($operators !='')
                                        @foreach($operators as $value)
                                            <option value="{{$value}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div style="margin-top: 50px">
                                <button type="button" class="btn btn-primary btn-send-charge">{{_('Accept')}}</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div style="margin-top: 29px">
                            <button type="button" class="btn btn-success btn-charge">Cargar {{__('Services')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Data Table-->
        <div class="panel-body col-md-8">
            <div>
                <h4>{{__('Available Products')}}</h4>
            </div>
            <table id="example" class="table table-striped table-en task-table">
            </table>
        </div>
    </div>
    @include('management.servicesJS.servicecomponent')
@endsection
