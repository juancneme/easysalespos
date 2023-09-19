<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        
                <!-- Primary Meta Tags -->
        <title>EasySalesPOS</title>
        <meta name="title" content="EasySales POS">
        <meta name="description" content="EasySales Punto de Venta.">

        <!-- Open Graph / Facebook -->
        <meta property="og:locale" content="es_CO" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://easysalespos.co /" />
        <meta property="og:title" content="Punto de venta inteligente" />
        <meta property="og:description" content="Punto de Venta inteligente" />
        <meta property="og:image" content="http://easysalespos.co /support/pictures/config/logos/logo000004.png" />
        <meta property="og:image:secure_url" content="http://easysalespos.co /support/pictures/config/logos/logo000004.png" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
       

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="http://easysalespos.co /" />
        <meta property="twitter:title" content="Punto de venta inteligente" />
        <meta property="twitter:description" content="Punto de Venta." />
        <meta property="twitter:image" content="http://easysalespos.co /support/pictures/config/logos/logo000004.png" />
        
        <!-- Para whatsapp -->
        <meta property="og:image" content="http://easysalespos.co /support/pictures/config/logos/logo000005.png" />
        <meta property="og:image:secure_url" content="http://easysalespos.co /support/pictures/config/logos/logo000005.png" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="300" />
        <meta property="og:image:height" content="300" />
        

        
        
        
        <base href="/public">
                
        <link rel="shortcut icon" href="/support/pictures/config/logos/logo000001.ico">
        <link href="/css/app.css" rel="stylesheet">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('scripts')
        <style>
            body {
                background-image: url('/support/pictures/config/wallpapers/fondo_body_login.png');
                background-repeat: no-repeat;
                background-position-y: top;
            }
            .container-fluid.fondo {
				<!--/*background-image: url('/img/fondo_login_21.png');
                background-size: 1500px 700px;*/ -->
                background-repeat: no-repeat;
                background-position: center !important;
            }
            .navbar-default {
                background-color: transparent;
                border: none;
            }
            .nav-header {
                <!--/*background-image: url(/img/header_bar.png);*/ -->
                background-size: 86% 50px;
                background-repeat: no-repeat;
                background-position: top right;
                background-color: transparent;
                border: none;
                margin-right: 0px;
            }
            
            .logo-image-home {
                <!--/*position: absolute;
                top: 3px;
                left: 5px;
                width: 300px;*/ -->
                width: 220px;
                top: 5px;
                position: absolute;
                <!--/*left: 22px;*/ -->
                height: 55px;
            }
        </style>
    </head>
    <body>

<!--        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img alt="" class="logo-image-home" src="{{ asset('/support/pictures/config/logos/logo000002.png') }}"> 
                    </a>
                </div>

                <div class="collapse navbar-collapse nav-header" id="bs-example-navbar-collapse-1">
                </div>
            </div>
        </nav>-->

        @yield('content')

        <footer id="page-footer">
            <div class="container">
                <div>
                        <!-- <img class="logo" alt="Health e-Learning" src="/img/health_e_learning_logo_IIHL.png"> -->
                    <p class="copy"><a target="_blank" href="http://www.asynert.com.co">EasyNet</a> &copy; Copyright <?php echo date('Y'); ?></p>
                </div>
            </div>
        </footer>
        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
         
    </body>
</html>
