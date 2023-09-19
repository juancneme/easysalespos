@extends('auth.formlogin')
@section('form')
    <!--<form class="login100-form" role="form" method="POST" action="{{ url('/auth/login') }}">-->
    <form class="login100-form" method="POST" action=<?= $type_in === 'v' ? "/auth/login/clients" : '/auth/login'?> >
        @include('common.errors')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="num_contract" value="{{ $contratin }}">
        <input type="hidden" name="type_in" value="{{ $type_in }}">

        <br><br><br>
        <div style="display:flex;justify-content: center;">
            <img style="max-height:150px;margin-top: 3px;"  
            src="{{ $imagen_login }}">
        </div>
<!-- 
        @if($type_in === 'v')
        <div  style=" display: flex;align-items: center;justify-content: left; text-align: left; width: 100%; height: 5vh; color:#a9a9a9;" >
            <h1 style="padding-bottom: 10px;">Cliente</h1>
        </div>
        @else
        <div class="circle-logo"></div>
        <div  style=" display: flex;align-items: center;justify-content: center; text-align: center; width: 100%; height: 5vh; color:#a9a9a9;" >
            <h1 style="padding-bottom: 10px;">EasySales POS</h1>
        </div>
        @endif
 -->
        <br>

        <!--usuario F B-->
        <div class="wrap-input100 validate-input">
            <input type="text" name="emailf" style="display: none;" autocomplete="new-password" >
            <input type="text" name="email" class="input100" method="post" autocomplete="new-password">
            <span class="focus-input100" ></span>
            <span class="label-input100">{{ __('EMail Address') }}</span>
        </div>
        <!--password-->
        <div class="wrap-input100" >
            <input type="text" name="passwordf" style="display:none;" autocomplete="new-password">
            <input type="password" id="password-field" name="password" class="input100" autocomplete="new-password">
            <span class="focus-input100" ></span>
            <span class="label-input100">{{ __('Password') }}</span>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="color:#00a2e8"></span>
        </div>

        <!--recuerdame-->
        <!-- <div class="flex-sb-m w-full p-t-3 p-b-32"> -->
            <div class="contact100-form-checkbox checkbox" style="text-align: center">
                <label style="color:#00a2e8; font-size: 14px; font-weight: bold;" 
                       class="txt1">
                    <input style="border-color:#00a2e8 " type="checkbox" name="remember"> {{ __('Remember Me') }}
                </label>
            </div>
            <br>
            <div style="text-align: center">
                <a href="/reset" class="txt1" 
                    style="color:#00a2e8; font-size: 14px; font-weight: bold;" 
                    title="Recupera aquí tu contraseña">
                    {{__('Did you forget your password?')}}
                </a>
            </div>
            <br>
            @if($type_in === 'f')
               <!-- <div>
                    <a href="{{route('newstore', ['contract' => encrypt($contratin)])}}" class="txt1" style="color:#999999" title="Inscribete aquí como tendero">
                        {{__('Sign up NewStore')}}
                    </a>
                </div>
            
                <div>
                    <a href="/newsupplier" class="txt1" style="color:#999999" title="Inscribete aquí como proveedor">
                        {{__('Sign up NewSupplier')}}
                    </a>
                </div> -->
             
             <!--Nuevo cliente en el login-->
            @elseif($type_in === 'v')
               <div>
                    <a href="{{route('newclient', ['contract' => encrypt($contratin)])}}" class="txt1" style="color:#00a2e8" title="Inscribete aquí como cliente">
                        {{__('Sign up NewClient')}}
                    </a>
                </div>
            @endif

        <!-- </div> -->

        <div class="container-login100-form-btn" 
            style="color:#3b2529;
            background: #00a2e8;
            margin: 0 auto;
            margin-top: 0px;
            margin-top: 25px;
            min-width: 150px;
            border-radius: 20px;
            color: #fff;
            padding: 10px 20px;
            outline: 0;
            font-size: 16px;
            font-weight: 700;">
            <button type="submit" class="">
                {{ __('btn_login') }}
            </button>
        </div>

        <!-- <div style="display:flex; justify-content:flex-start;  margin-top: 25px; align-items:flex-start; opacity: 0.8;">
            <label style="color:#3b2529"> Powered by EasyNet <?php echo date('Y'); ?></label>
        </div> -->
        <!-- <div style="display:flex; justify-content:flex-start; align-items: flex-start ; align-content:flex-start;  margin-top: 5px;  opacity: 0.9;">
            <div>
                <img src="/support/pictures/config/logos/logo000006.png" style="width:30px; padding-bottom: 10px;">
            </div>
            <div>
                <img src="/support/pictures/config/logos/logo000005.png" style="width:30px; padding-bottom: 10px; margin-left: 20px;">
            </div>
        </div> -->
        


        <br>

        <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox checkbox"> 
                            <label style="color:#f1efef">
{{--                                login from REMOTE: {{ $_SERVER['REMOTE_ADDR'] }}--}}
{{--                                SERVER_ADDR: {{ $_SERVER['SERVER_ADDR'] }}--}}
{{--                                SERVER_NAME: {{ $_SERVER['SERVER_NAME'] }}--}}
                            </label>
                        </div>
                    </div>

    </form>

@endsection
