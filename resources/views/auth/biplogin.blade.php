@extends('auth.formlogin')
@section('form')
    <!--<form class="login100-form" role="form" method="POST" action="{{ url('/auth/login') }}">-->
    <form class="login100-form" method="POST" action=<?= !empty($client) ? "/auth/login/clients" : '/auth/login'?> >
        @include('common.errors')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <img src="/support/pictures/partners/logoaso022.png" style="max-width:100%;width:auto;height:auto;">
        </div>
        <br>
        @if(!empty($client))
        <div  style=" display: flex;align-items: center;justify-content: center; text-align: center; width: 100%; height: 5vh;" >
            <h1>Clientes BIP</h1>
        </div>
            
    @endif
    <!--usuario-->
        <div class="wrap-input100 validate-input">
            <input type="text" name="emailf" style="display: none;" autocomplete="new-password" >
            <input type="text" name="email" class="input100" method="post" autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">{{ __('EMail Address') }}</span>
        </div>
        <!--password-->
        <div class="wrap-input100" >
            <input type="text" name="passwordf" style="display:none;" autocomplete="new-password">
            <input type="password" name="password" class="input100" autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">{{ __('Password') }}</span>
        </div>



        <!--recuerdame-->
        <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox checkbox">
                <label style="color:#999999" class="txt1">
                    <input style="border-color:#0000ff " type="checkbox" name="remember"> {{ __('Remember Me') }}
                </label>
            </div>

            <div>
                <a href="/newclient" class="txt1" style="color:#999999" title="Inscribete aquí como cliente">
                    {{__('Sign up NewClient')}}
                </a>
            </div>


        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{ __('btn_login') }}
            </button>
        </div>
        <div style="display:flex; justify-content:flex-start;  margin-top: 25px; align-items:flex-start; opacity: 0.8;">
            <label style="color:#3b2529"> Powered by EasyNet &COPY & PDVi  <?php echo date('Y'); ?></label> 
        
        
       
        
        </div>
        <div style="display:flex; justify-content:flex-start; align-items: flex-start ; align-content:flex-start;  margin-top: 5px;  opacity: 0.9;">
     
            <div>
                <img src="/support/pictures/config/logos/logo000006.png" style="width:40px; padding-bottom: 10px;">
            </div>
        
            <div>
               <img src="/support/pictures/config/logos/logo000005.png" style="width:40px; padding-bottom: 10px;">  
            </div>
        
        
        </div>
        
      
       
        <br>

        <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox checkbox">
                <label style="color:#e6e6e6">
                    login from REMOTE: {{ $_SERVER['REMOTE_ADDR'] }}
                    SERVER_ADDR: {{ $_SERVER['SERVER_ADDR'] }}
                    SERVER_NAME: {{ $_SERVER['SERVER_NAME'] }}
                </label>
            </div>
        </div>


    </form>




@endsection

