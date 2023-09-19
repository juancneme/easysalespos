<!DOCTYPE html>
<html lang="es">
   <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PDVI</title>

      <!-- LOGIN_NEWUSERS_CSS -->
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="newstore_template/assets/css/form-elements.css">
      <link rel="stylesheet" href="newstore_template/assets/css/style.css">
         
      <!-- FAVICON -->
      <link rel="shortcut icon" href="newstore_template/assets/ico/favicon.png">
         
   </head>

   <!-- Top menu -->
   <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
      <div class="container">
         <div class="navbar-header">
            <!-- Logo cabecera -->			
            <div>
               <a href="/auth/login"  class="txt1" style="color:#999999"><img src="/support/pictures/config/logos/logo000003.png"  style="height:40px;margin:0 auto; cursor: pointer;" alt="" >
               </a>
            </div>
            <!--<a class="navbar-brand" href="index.html">PDVI</a>-->
         </div>
      </div>
   </nav>
   <!-- Top content -->

   <body>
      @yield('form')

      <!-- LOGIN_NEWUSERS_JS -->
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
      <script src="/newstore_template/assets/js/jquery.backstretch.min.js"></script>
      <script src="/newstore_template/assets/js/retina-1.1.0.min.js"></script>
      <script src="/newstore_template/assets/js/scripts.js"></script>

      <script type="text/javascript">
      $.backstretch("newstore_template/assets/img/bck3.jpg");
      </script>
   </body>

</html>
