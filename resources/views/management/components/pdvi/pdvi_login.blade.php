<style>

/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}





/*////////////////////////[ login ]/////////////////*/
.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
  width: 100%;  
  /*min-height: 100vh;*/
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  background: #f2f2f2;
}


.wrap-login100 {
  width: 100%;
  background: #fff;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  flex-direction: row-reverse;

}

/*==================================================================
[ login more ]*/
.login100-more {
  width: calc(100% - 560px);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}

.login100-more::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.1);
}



/*==================================================================
[ Form ]*/

.login100-form {
  width: 560px;
  /*min-height: 100vh;*/
  display: block;
  background-color: #f7f7f7;
  padding: 173px 55px 55px 55px;
  padding-top: 5px !important;
  padding-bottom: 5px;
}

.login100-form-title {
  width: 100%;
  display: block;
  font-family: Poppins-Regular;
  font-size: 30px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
}



/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  width: 100%;
  height: 80px;
  position: relative;
  border: 1px solid #e6e6e6;
  border-radius: 10px;
  margin-bottom: 10px;
}

.label-input100 {
  font-family: Montserrat-Regular;
  font-size: 18px;
  color: #999999;
  line-height: 1.2;

  display: block;
  position: absolute;
  pointer-events: none;
  width: 100%;
  padding-left: 24px;
  left: 0;
  top: 30px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-family: Montserrat-Regular;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding: 0 26px;
}

input.input100 {
  height: 100%;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

/*---------------------------------------------*/

.focus-input100 {
  position: absolute;
  display: block;
  width: calc(100% + 2px);
  height: calc(100% + 2px);
  top: -1px;
  left: -1px;
  pointer-events: none;
  border: 1px solid #6675df;
  border-radius: 10px;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  -webkit-transform: scaleX(1.1) scaleY(1.3);
  -moz-transform: scaleX(1.1) scaleY(1.3);
  -ms-transform: scaleX(1.1) scaleY(1.3);
  -o-transform: scaleX(1.1) scaleY(1.3);
  transform: scaleX(1.1) scaleY(1.3);
}

.input100:focus + .focus-input100 {
  visibility: visible;
  opacity: 1;

  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

.eff-focus-selection {
  visibility: visible;
  opacity: 1;

  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

.input100:focus {
  height: 48px;
}

.input100:focus + .focus-input100 + .label-input100 {
  top: 14px;
  font-size: 13px;
}

.has-val {
  height: 48px !important;
}

.has-val + .focus-input100 + .label-input100 {
  top: 14px;
  font-size: 13px;
}

/*=========================[ Restyle Checkbox ]=======================*/

.input-checkbox100 {
  display: none;
}

.label-checkbox100 {
  font-family: Poppins-Regular;
  font-size: 13px;
  color: #999999;
  line-height: 1.4;

  display: block;
  position: relative;
  padding-left: 26px;
  cursor: pointer;
}

.label-checkbox100::before {
  content: "\f00c";
  font-family: FontAwesome;
  font-size: 13px;
  color: transparent;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  width: 18px;
  height: 18px;
  border-radius: 2px;
  background: #fff;
  border: 1px solid #6675df;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}

.input-checkbox100:checked + .label-checkbox100::before {
  color: #6675df;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  background: #6675df;

  font-family: Montserrat-Bold;
  font-size: 12px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 1px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: #333333;
}


/*[ Alert validate ]*/

.validate-input {
  position: relative;
}

/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  background: #6675df;

  font-family: Montserrat-Bold;
  font-size: 12px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 1px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: #333333;
}

.modal-content {
  width: auto;
  padding-top: 20px;
}

/*hide show password*/
.field-icon {
  top: 31px;
  position: absolute;
  font-size: 20px;
  right: 2px;
  color: #999890;
  display: flex;
  flex-direction: column;
  align-content: flex-end;
} 



</style>

<script>

     /*hide show password login*/
     $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }});

</script>  


<!-- Modal Abrir Turno -->
<div id="pdvi_login" class="modal fade">
    <div class="modal-dialog"> 
        <div class="modal-content" style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px;">
        <div  class="container-login100">

        <!-- col-lg-1 col-sm-12 -->
            <!-- <form class="login100-form" method="POST" action=<?= $esvirtual === true ? "/auth/login/clients" : '/auth/login'?> > -->
            <form class="login100-form" style="padding-top:21px;" background="#fff" method="POST" >
                @include('common.errors')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="num_contract" value="{{ $IDcontract }}">

                <div style="display:flex;justify-content: center;">
                    <img style="max-height:200px;" src="{{ $image_login }}">
                </div>

                <br>

                <div class="col-lg-12 col-sm-12">

                @if($esvirtual)
                <div  style=" display: flex;align-items: center;justify-content: left; text-align: left; width: 100%; height: 5vh; color:#a9a9a9;" >
                    <h1 style="padding-bottom: 10px; font-size: 1.5rem;">Cliente.</h1>
                </div>
                @else
                <div  style=" display: flex;align-items: center;justify-content: left; text-align: left; width: 100%; height: 5vh; color:#a9a9a9;" >
                    <h1 style="padding-bottom: 10px;">Tu Comercio.</h1>
                </div>
                @endif
    
               

                <!--usuario V M--->
                <div class="wrap-input100 validate-input">
                    <input type="text" name="emailf" style="display: none;" autocomplete="new-password" >
                    <input type="text" name="email" class="input100" method="post" autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">{{ __('EMail Address') }}</span>
                </div>

                <!--password-->
                <div class="wrap-input100" >
                      <input type="text" name="passwordf" style="display:none;" autocomplete="new-password">
                      <input type="password" id="password-field" name="password" class="input100" autocomplete="new-password">
                      <span class="focus-input100" ></span>
                      <span class="label-input100">{{ __('Password') }}</span>
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <!--recuerdame-->
                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox checkbox" style="padding-bottom: 32px;">
                        <label style="color:#999999" class="txt1">
                            <input style="border-color:#0000ff " type="checkbox" name="remember"> {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div style="display: flex;justify-content: space-between; padding-bottom: 32px;">
                    <div>
                        <a href="/reset" class="txt1" style="color:#999999" title="Recupera aquí tu contraseña">
                            {{__('Did you forget your password?')}}
                        </a>
                    </div>
                    @if($esvirtual)
                    <div>
                        <a href="{{route('newstore', ['contract' => encrypt($IDcontract)])}}" class="txt1" style="color:#999999" title="Inscribete aquí como tendero">
                            {{__('Sign up NewClient')}}
                        </a>
                    </div>
                    @else
                    <div>
                        <a href="{{route('newclient', ['contract' => encrypt($IDcontract)])}}" class="txt1" style="color:#999999" title="Inscribete aquí como cliente">
                            {{__('Sign up NewStore')}}
                        </a>
                    </div>
                    @endif
                    </div>   
              
                </div>

                @if ($esvirtual)
                <div class="container-login100-form-btn">
                    <button type="boton" id="btnloginclient" class="login100-form-btn" style="border:none;">
                        {{ __('btn_login') }}
                    </button>
                </div>
                @else
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" style="border:none;">
                        {{ __('btn_login') }}
                    </button>
                </div>
                @endif

                <div style="display:flex; justify-content:flex-start;  margin-top: 25px; align-items:flex-start; opacity: 0.8;">
                    <label style="color:#3b2529; font-size:10px;"> Powered by EasyNet &COPY & PDVi  <?php echo date('Y'); ?></label>
                </div>
                <div style="display:flex; justify-content:flex-start; align-items: flex-start ; align-content:flex-start;  margin-top: 5px;  opacity: 0.9;">
                    <div>
                        <img src="/support/pictures/config/logos/logo000006.png" style="width:30px; padding-bottom: 10px;">
                    </div>
                    <div>
                        <img src="/support/pictures/config/logos/logo000005.png" style="width:30px; padding-bottom: 10px; margin-left: 20px;">
                    </div>
                </div>

                </div>
            </form>

        </div>
        </div>
    </div>
</div>





