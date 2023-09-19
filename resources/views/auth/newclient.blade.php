<?php $page_title = __('Catalogs') ?>
@extends('register')
@section('register')
    <!-- Display Validation Errors -->
    @include('common.errors',['page'=>'newstore'])
    <div class="row">
        <div
                class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1 form-box">
            <form action="{{route('saveclient')}}" id="formNewClient" method="POST" class="f1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="contract" value="{{$contract}}">
                <input id="url" type="hidden" name="url" value="{{ Request::url() }}">
                <div id="alert" hidden role="alert"></div>

                <h3>{{__('Sign up as a client at your Punto de Venta Inteligente')}}</h3>

                <p>{{__('We will ask you some basic information to create your user and soon you can start using the platform.')}}</p>
                <div class="f1-steps">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="16.6" data-number-of-steps="3"
                             style="width: 16.6%;"></div>
                    </div>
                    <div class="f1-step-cli active">
                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                        <p>{{__('Your data')}}</p>
                    </div>
                    <div class="f1-step-cli">
                        <div class="f1-step-icon"><i class="fa fa-map-marker"></i></div>

                        <p>{{__('Your location')}}</p>

                    </div>


                    <div class="f1-step-cli">
                        <div class="f1-step-icon"><i class="fa fa-usd"></i></div>
                        <p>{{__('Listo')}}</p>
                    </div>
                </div>
                <fieldset>
                    <h4>{{__('Your name')}}</h4>
                    <div class="row">
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="name" class="f1-first-name form-control" id="f1-first-name"
                                   placeholder="{{__('Names...')}}" required autofocus>
                            <label for="f1-first-name">{{__('Names...')}}</label>
                        </div>
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="lastname" class="f1-last-name form-control" id="f1-last-name"
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

                            <select required class="custom-select" name="typedoc" id="f1-typeDoc">
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
                            <input type="number" name="numberdocument" class="f1-numberDocument form-control"

                                   id="f1-numberDocument" placeholder="{{__('Id number...')}}" required autofocus>
                            <label for="f1-numberDocument">{{__('Id number...')}}</label>

                        </div>
                    </div>
                    <div class="f1-buttons">
                        <button type="button" id="btn1" class="btn btn-next">{{__('Next')}}</button>
                    </div>
                </fieldset>
                <fieldset>

                    <h4>{{__('Your location')}}</h4>
                    <div class="row">
                        <div class="f1-country input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="f1-country">{{__('Country')}}</label>

                            </div>
                            <select class="custom-select" name="country" id="f1-country" required="required">
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
                            <select class="custom-select" name="city" id="f1-city" required="required">
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
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="neighborhood" class="f1-neighborhood form-control" id="f1-neighborhood"
                                   placeholder="{{__('neighborhood...')}}" required autofocus>
                            <label for="f1-neighborhood">{{__('neighborhood...')}}</label>
                        </div>
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="address" class="f1-home-address form-control" id="f1-home-address"
                                   placeholder="{{__('home-address...')}}" required autofocus>
                            <label for="f1-home-address">{{__('home-address...')}}</label>
                        </div>
                    </div>

                    <h4>{{__('Tu contacto')}}</h4>
                    <div class="row">
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                            <input type="number" id="f1-phone" name="phone" class="f1-phone form-control"

                                   placeholder="{{__('Phone...')}}" required="required" autofocus>
                            <label for="f1-phone">{{__('Phone...')}}</label>

                        </div>
                        <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                            <input  type="email" id="f1-email" name="email" class="f1-email form-control"
                                   placeholder="{{__('Email...')}}" required="required" autofocus>
                            <label for="f1-email">{{__('Email...')}}</label>
                        </div>
                    </div>
                    <div class="f1-buttons">
                        <button type="button"  class="btn btn-previous">{{__('Previous')}}</button>
                        <button type="button" id="btn2" class="btn btn-next">{{__('Next')}}</button>
                    </div>
                </fieldset>



                <fieldset>
                    <h3>{{__('That is all')}}:)</h3>
                    <h4>

                        {{__('In a few moments the email will be arriving with your username and password to enter the platform.')}}
                    </h4>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">{{__('Previous')}}</button>
                        <button type="submit" id="btn3" class="btn btn-submit">{{__('Final')}}</button>
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

            $('#btn3').prop('disabled',true);
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


            $.backstretch("newstore_template/assets/img/bck4.jpg");

            function loadButton() {
                $("#button1").attr('hidden', true);
                $("#load_button").removeAttr('hidden');
            }

            $('#btn2').on('click', function(e){
                $.ajax({
                    url:"/newclient/ajax?type=validateEmail",
                    type:'get',
                    data:{
                        "contract" : '{{$contract}}',
                        "email" : $('#f1-email').val()
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        if(res.success){
                            if(res.message === false){
                                $('#alert').removeClass();
                                $('#alert').addClass("alert alert-danger");
                                $('#alert').text('La dirección de correo electrónico ya se encuentra asociada a un usuario.');
                                $('#alert').removeAttr('hidden');
                                $('#alert').show();

                                $('#f1-email').attr('style','border-color: #FF1F00');

                                $('#btn3').prop('disabled',true);
                                e.stopImmediatePropagation();
                                return false;
                            }
                            else{
                                $('#btn3').prop('disabled',false);
                                $('#f1-email').removeAttr('style');
                                $('#alert').hide();
                            }

                        }else{
                            console.log('error en la consulta');
                        }
                    }
                });
            });

            $('#btn1').on('click', function(e){
                $.ajax({
                    url:"/newclient/ajax?type=validateDocument",
                    type:'get',
                    data:{
                        "numberdocument": $('#f1-numberDocument').val(),
                        "typedoc" : $('#f1-typeDoc').val(),
                        "contract" : '{{$contract}}'
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        if(res.success){
                            if(res.message === false){
                                $('#alert').removeClass();
                                $('#alert').addClass("alert alert-danger");
                                $('#alert').text('El número de identificación ya se encuentra asociado a un usuario.');
                                $('#alert').removeAttr('hidden');
                                $('#alert').show();

                                $('#f1-numberDocument').attr('style','border-color: #FF1F00');

                                $('#btn2').prop('disabled',true);
                                e.stopImmediatePropagation();
                                return false;
                            }
                            else{
                                $('#btn2').prop('disabled',false);
                                $('#f1-numberDocument').removeAttr('style');
                                $('#alert').hide();
                            }

                        }else{
                            console.log('error en la consulta');
                        }
                    }
                });
            });

        </script>
@endsection