<?php $page_title = __('Catalogs') ?>
@extends('register')
@section('register')
    <!-- Display Validation Errors -->
    @include('common.errors',['page'=>'newstore'])
                <div class="row">
                    <div
                        class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1 form-box">
                        <form action="{{route('savesupplier')}}" method="POST" class="f1" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                             <h3>{{__('Sign up as a supplier at your Punto de Venta Inteligente')}}</h3>

                            <p>{{__('We will ask you some basic information to create your user and soon you can start using the platform.')}}</p>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="10" data-number-of-steps="5"
                                         style="width: 10%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                    <p>{{__('Your data')}}</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-map-marker"></i></div>

                                    <p>{{__('Your location')}}</p>

                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-shopping-basket"></i></div>
                                    <p>{{__('Your business')}}</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-sticky-note"></i></div>
                                   <p>{{__('Your documents')}}</p>
                                </div>
                              <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-usd"></i></div>
                                    <p>{{__('Listo')}}</p>
                                </div>
                            </div>
                            <fieldset>
                                <h4>{{__('Your name')}}</h4>
                                <div class="row">
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <input type="text" name="nombre" class="f1-first-name form-control" id="f1-first-name"
                                               placeholder="{{__('Names...')}}" required autofocus>
                                        <label for="f1-first-name">{{__('Names...')}}</label>
                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <input type="text" name="apellido" class="f1-last-name form-control" id="f1-last-name"
                                               placeholder="{{__('Surnames...')}}" required autofocus>
                                        <label for="f1-last-name">{{__('Surnames...')}}</label>
                                    </div>
                                </div>

                                  <h4>{{__('Your identification')}}</h4>

                                <div class="row">
                                    <div class="input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="f1-typeDoc">ID</label>
                                        </div>

                                        <select required class="custom-select" name="identificacion1" id="f1-typeDoc">
                                            <option value="true" disabled
                                                    selected>{{__('Select a type of identification')}}</option>
                                            @foreach ($tipoidentificacion as $item)
                                            <option
                                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <input type="number" name="numberdocumento" class="f1-numberDocument form-control"

                                               id="f1-numberDocument" placeholder="{{__('Id number...')}}" required autofocus>
                                        <label for="f1-numberDocument">{{__('Id number...')}}</label>

                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">{{__('Next')}}</button>
                                </div>
                            </fieldset>
                            <fieldset>

                                <h4>{{__('Your location')}}</h4>
                                <div class="row">
                                    <div class="f1-country input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="f1-country">{{__('Country')}}</label>

                                        </div>
                                        <select class="custom-select" name="pais" id="f1-country" required="required">
                                            @foreach ($itemscountries as $countries)
                                                <option
                                                    <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                                    <?= $countries->id == 1047 ? 'selected' : '' ?>
                                                    value="{{ $countries->id }}">{{ $countries->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="f1-country input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="f1-city">{{__('City')}}</label>
                                        </div>
                                        <select class="custom-select" name="ciudad" id="f1-city" required="required">
                                            @foreach ($itemscities as $cities)
                                                <option
                                                    <?= $cities->id == 2181 ? 'selected' : '' ?>
                                                    value="{{$cities->id}}">{{$cities->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                        <input type="number" id="f1-phone" name="telefono" class="f1-phone form-control"

                                        placeholder="{{__('Phone...')}}" required="required" autofocus>
                                        <label for="f1-phone">{{__('Phone...')}}</label>

                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                        <input type="email" id="f1-email" name="email" class="f1-email form-control"
                                               placeholder="{{__('Email...')}}" required="required" autofocus>
                                        <label for="f1-email">{{__('Email...')}}</label>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">{{__('Previous')}}</button>
                                    <button type="button" class="btn btn-next">{{__('Next')}}</button>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row" style="margin-bottom: -15px;">
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <h4>

                                            {{__('Identification of your business')}}

                                        </h4>
                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <a id="copy" onclick="copy_address()" data-toggle="tooltip" data-placement="right"
                                            title="{{__('Copy from your data')}}">
                                            <i class="fa fa-certificate"></i>
                                        </a>
                                        <span class="spanright badge badge-warning">{{__('Copy from your data')}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label-group col-lg-12 col-sm-12 col-md-12">
                                        <input type="text" class="f1-namestore form-control" id="f1-namestore"
                                               placeholder="{{__('Name of your business')}}" name="nombretienda" required autofocus>
                                        <label for="f1-namestore">{{__('Name of your business')}}</label>
                                    </div>
                                    <div class="f1-typeDocStore input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="f1-typeDocStore">{{__('Doc Type')}}</label>
                                        </div>
                                        <select class="custom-select" name="identificacion2" id="f1-typeDocStore"
                                                required="required">

                                            <option value="" selected>{{__('Select a type of identification')}}</option>
                                            @foreach ($tipoidentificacion as $item)
                                                <option
                                                    <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <input type="number" class="f1-numberDocumentStore form-control" name="numberdocumento2"

                                               id="f1-numberDocumentStore" placeholder="{{__('Doc Number')}}" required="required"
                                               autofocus>
                                        <label for="f1-numberDocumentStore">{{__('Doc Number')}}</label>
                                    </div>
                                </div>
                                <h4>{{__('Location of your business')}}</h4>

                                <div class="row">
                                    <div class="form-label-group col-lg-12 col-sm-12 col-md-12">
                                        <input type="text" class="f1-addressStore form-control" name="direccion"
                                               id="f1-addressStore"

                                               placeholder="{{__('Address')}}..." required autofocus>
                                        <label for="f1-addressStore">{{__('Address')}}...</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                        <input type="number" class="f1-phonet form-control" name="telefono" id="f1-phonet"

                                               placeholder="{{__('Phone')}}..." required="required" autofocus>
                                        <label for="f1-phonet">{{__('Phone')}}...</label>

                                    </div>
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                        <input type="email" id="f1-emailt" name="email2" class="f1-emailt form-control"
                                               placeholder="{{__('Email')}}..." required="required" autofocus>
                                        <label for="f1-emailt">{{__('Email')}}...</label>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">{{__('Previous')}}</button>
                                    <button type="button" class="btn btn-next">{{__('Next')}}</button>
                                </div>
                            </fieldset>


                            <fieldset>


                                <div class="row" style="margin-bottom: -15px;">
                                    <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                        <h4>
                                              {{__('Your documents')}}
                                        </h4>
                                    </div>

                                </div>
                                <div class="input-group increment">
                                   <div class="col-md-6">
                                        <button style="background-color:#0a6aa1; width:30px; height:30px; padding:6px 0px; border-radius:5px; text-align:center; font-size:12px; line-height:1.42857;"
                                                class="btn-addfile" type="button">
                                            <i class="fa fa-plus" style="color:#fff" aria-hidden="true"></i>
                                        </button>
                                        <label for="f1-AddDocuments">{{__('Add the required documents')}}</label>
                                    </div>
                                    <div style="height: 55px"></div>
                                </div>

                                <div>
                                    <div class="clone-upload hide">
                                        <div class="control-group">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3" style="min-width:45%;padding-left: 0px;padding-right: 2px;">
                                                        <select id="id_file" name="id_file[]" class="form-control">
                                                            <option value="true" disabled
                                                                    selected>{{__('Select a type of document')}}</option>
                                                            @foreach ($documentContract as $item)
                                                            <option
                                                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '0' ?>
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div style="padding-left:0px; padding-right:1px;" class="col-4">
                                                        <input  style="color:#495057; background-color:#fff;height:38px; border-radius:5px; border: 1px solid #ccc; max-width: 90%;" type="file" id="upload_file" name="upload_file[]"/>
                                                        <input type="hidden" id="hidden_upload_file" name="coun_file[]" value="0">
                                                    </div>

                                                    <div class="col-2" style="padding-left:6px; padding-right:6px;">
                                                        <button class="btn-danger btn-delfile" type="button" style="width:30px; height:30px; padding:6px 0px; border-radius:5px; text-align:center; font-size:12px; line-height:1.42857; color:white;">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                        <label for="f1-DeleteDocuments">{{__('Delete')}}</label>
                                                    </div>
                                                    <div style="height: 55px"></div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">{{__('Previous')}}</button>
                                    <button type="button" class="btn btn-next">{{__('Next')}}</button>
                                </div>
                            </fieldset>
                            <fieldset>
                                <h3>{{__('That is all')}}:)</h3>
                                <h4>

                                    {{__('In a few moments the email will be arriving with your username and password to enter the platform.')}}
                                </h4>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">{{__('Previous')}}</button>
                                    <button type="submit" class="btn btn-submit">{{__('Final')}}</button>
                                </div>
                            </div>
                            </fieldset>
                        </form>



        <!-- LOGIN_NEWUSERS_JS -->

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="newstore_template/assets/js/jquery.backstretch.min.js"></script>
        <script src="newstore_template/assets/js/retina-1.1.0.min.js"></script>
        <script src="newstore_template/assets/js/scripts.js"></script>
        <script src="newstore_template/assets/js/bootstrap-filestyle.min.js" type="text/javascript" ></script>

        <!-- ADD FILE BUTTON functions-->



        <script type="text/javascript">

        //hide de first input
        $(".clone-upload").ready(function () {
            $(".clone-upload").index()
            $(".clone-upload").eq(0).hide();
        });

        //clone input
        $(".btn-addfile").click(function () {
            var html = $(".clone-upload").html();
            $(".increment").after(html);
        });

        //delete input
        $("body").on("click", ".btn-delfile", function () {
            $(this).parents(".control-group").remove();
        });
        $(".btn-addfile").trigger('click');


        $.backstretch("newstore_template/assets/img/bck2.jpg");


        function loadButton() {
            $("#button1").attr('hidden', true);
            $("#load_button").removeAttr('hidden');
        }
        </script>
@endsection