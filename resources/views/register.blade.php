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
    <link rel="stylesheet" href="newstore_template/assets/css/styleClient.css">
    <!-- <link href="/pike_template/assets/css/select2.css" rel="stylesheet" type="text/css" /> -->

    <!-- FAVICON -->
    <link rel="shortcut icon" href="newstore_template/assets/ico/favicon.png">

</head>


<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <!-- Logo cabecera, -->
            <div>
                <a href="/auth/login" class="txt1">
                    <img src=""
                            style="height:40px;margin:0 auto; cursor: pointer;" alt="">
                </a>
            </div>
            <!--<a class="navbar-brand" href="index.html">PDVI</a>-->
        </div>
    </div>
</nav>
<!-- Top content -->

<body>

<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 text">
            </div>
            </div>
        </div>

        @yield('register')
        
        </div>
    </div>
</div>
</div>


</body>

</html>

<script>
    contract = sessionStorage.getItem('contract');
</script>