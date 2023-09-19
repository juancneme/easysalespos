@extends('app')
@section('scripts')

<!--LOGIN CSS-->
<link rel="icon" type="image/png" href="/support/pictures/config/logos/logo000001.ico"/>
<link rel="stylesheet" type="text/css" href="/login_template/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="/login_template/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/login_template/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="/login_template/css/util.css">
<link rel="stylesheet" type="text/css" href="/login_template/css/main.css">

<!--LOGIN JS-->
<script type="text/javascript" src="/login_template/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/login_template/vendor/animsition/js/animsition.min.js"></script>
<script type="text/javascript" src="/login_template/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="/login_template/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/login_template/vendor/select2/select2.min.js"></script>
<script type="text/javascript" src="/login_template/vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/login_template/vendor/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/login_template/vendor/countdowntime/countdowntime.js"></script>
<script type="text/javascript" src="/login_template/js/main.js"></script>
@endsection

@section('content')
<div style="background-color: #666666;">
    <div class="limiter">

        <div  class="container-login100">
            <div class="wrap-login100">
                <!--<form class="login100-form" role="form" method="POST" action="{{ url('/auth/login') }}">-->
                <!-- <div class="login100-more" style="background-image: url('/support/pictures/config/imageslogin/random000001.jpg');">-->
                <!-- <div class="login100-more" style="" id="imagerandom"> </div>-->
                <div class="login100-more" style="background:" id="imagerandom"> </div>
                    <script>
                        // imagenes = ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg'];
                        imagenes = ['01.png','02.png','03.png'];
                        // document.getElementById('imagerandom').innerHTML='<img src="' + imagenes[Math.floor(Math.random() * imagenes.length)] + '" alt="Imagen aleatoria" />';
                        $('#imagerandom').css({'background-image': 'url(/support/pictures/config/imageslogin/EasySalesPOS' + imagenes[Math.floor(Math.random() * imagenes.length)] + ')'});
                    </script>
                    @yield('form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection