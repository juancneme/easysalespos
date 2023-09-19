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
            <img src="/support/pictures/config/logos/logo000003.png" style="height:40px;margin:0 auto;" alt="">
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


                <h1><strong>Regístrate a tu Punto de Venta Inteligente.</strong></h1>
                <div class="description">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> __('There were some problems.')<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p>
                        <strong>Te pediremos algunos datos básicos para crear tu usuario y en breve puedes comenzar a utilizar la plataforma.</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div
                    class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-xl-10 offset-xl-1 form-box">
                <form action="{{route('save')}}" method="POST" class="f1" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <h3>Regístrate en nuestra aplicación.</h3>

                    <p>Llena estos datos para tener acceso a la plataforma.</p>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="10" data-number-of-steps="5"
                                 style="width: 10%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>Tus datos</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-map-marker"></i></div>

                            <p>Tu ubicación</p>

                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-shopping-basket"></i></div>
                            <p>Tu comercio</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-sticky-note"></i></div>
                            <p>Tus Documentos</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-usd"></i></div>
                            <p>A vender</p>
                        </div>
                    </div>
                    <fieldset>
                        <h4>Tu nombre</h4>
                        <div class="row">
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <input type="text" name="nombre" class="f1-first-name form-control" id="f1-first-name"
                                       placeholder="Nombres" required autofocus>
                                <label for="f1-first-name">Nombres...</label>
                            </div>
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <input type="text" name="apellido" class="f1-last-name form-control" id="f1-last-name"
                                       placeholder="Apellidos" required autofocus>
                                <label for="f1-last-name">Apellidos...</label>
                            </div>
                        </div>

                        <h4>Tu identificación</h4>

                        <div class="row">
                            <div class="input-group mb-5 col-lg-4 col-sm-4 col-md-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="f1-typeDoc">ID</label>
                                </div>

                                <select class="custom-select" name="identificacion1" id="f1-typeDoc"
                                        required="required">
                                    <option value="true" disabled
                                            selected>{{__('Select a type of identification')}}</option>
                                    @foreach ($tipoidentificacion as $item)
                                        <option
                                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-label-group col-lg-8 col-sm-8 col-md-8">
                                <input type="number" name="numberdocumento" class="f1-numberDocument form-control"

                                       id="f1-numberDocument" placeholder="Número de documento" required autofocus>
                                <label for="f1-numberDocument">Número de documento...</label>

                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>
                    </fieldset>
                    <fieldset>

                        <h4>Tu ubicación</h4>
                        <div class="row">
                            <div class="f1-country input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="f1-country">País</label>

                                </div>
                                <select class="custom-select" name="pais" id="f1-country" required="required">
                                    <option value="true" selected>Seleccione</option>
                                    @foreach ($itemscountries as $countries)
                                        <option
                                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                            value="{{ $countries->id }}">{{ $countries->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="f1-country input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="f1-city">Ciudad</label>
                                </div>
                                <select class="custom-select" name="ciudad" id="f1-city" required="required">
                                    <option value="true" selected>Selecciona</option>
                                    @foreach ($itemscities as $cities)
                                        <option value="{{$cities->id}}">{{$cities->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                <input type="number" id="f1-phone" name="telefono" class="f1-phone form-control"

                                       placeholder="Teléfono" required="required" autofocus>
                                <label for="f1-phone">Teléfono...</label>

                            </div>
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                <input type="email" id="f1-email" name="email" class="f1-email form-control"
                                       placeholder="Email" required="required" autofocus>
                                <label for="f1-email">Email...</label>
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Anterior</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row" style="margin-bottom: -15px;">
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <h4>

                                    Identificación de tu comercio

                                </h4>
                            </div>
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <a id="copy" onclick="copy_address()" data-toggle="tooltip" data-placement="right"
                                   title="Copia desde tus datos.">
                                    <i class="fa fa-certificate"></i>
                                </a>
                                <span class="spanright badge badge-warning">Copia desde tus datos.</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label-group col-lg-12 col-sm-12 col-md-12">
                                <input type="text" class="f1-namestore form-control" id="f1-namestore"
                                       placeholder="Nombre de tu comercio" name="nombretienda" required autofocus>
                                <label for="f1-namestore">Nombre de tu comercio...</label>
                            </div>
                            <div class="f1-typeDocStore input-group mb-5 col-lg-6 col-sm-6 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="f1-typeDocStore">Tipo de documento</label>
                                </div>
                                <select class="custom-select" name="identificacion2" id="f1-typeDocStore"
                                        required="required">

                                    <option value="true" selected>{{__('Select a type of identification')}}</option>
                                    @foreach ($tipoidentificacion as $item)
                                        <option
                                            <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <input type="number" class="f1-numberDocumentStore form-control" name="numberdocumento2"

                                       id="f1-numberDocumentStore" placeholder="Número de documento" required="required"
                                       autofocus>
                                <label for="f1-numberDocumentStore">Número de documento...</label>
                            </div>
                        </div>
                        <h4>Ubicación de tu comercio</h4>

                        <div class="row">
                            <div class="form-label-group col-lg-12 col-sm-12 col-md-12">
                                <input type="text" class="f1-addressStore form-control" name="direccion"
                                       id="f1-addressStore"

                                       placeholder="Dirección" required autofocus>
                                <label for="f1-addressStore">Dirección...</label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                <input type="number" class="f1-phonet form-control" name="telefono" id="f1-phonet"

                                       placeholder="Teléfono" required="required" autofocus>
                                <label for="f1-phonet">Teléfono...</label>

                            </div>
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-12">
                                <input type="email" id="f1-emailt" name="email2" class="f1-emailt form-control"
                                       placeholder="Email" required="required" autofocus>
                                <label for="f1-emailt">Email...</label>
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Anterior</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>
                    </fieldset>


                    <fieldset>


                        <div class="row" style="margin-bottom: -15px;">
                            <div class="form-label-group col-lg-6 col-sm-6 col-md-6">
                                <h4>
                                    Tus documentos
                                </h4>
                            </div>

                        </div>
                        <div class="input-group increment">
                            <div class="col-md-3">
                                <button style=" background-color: #0a6aa1; width: 30px;height: 30px;padding: 6px 0px;border-radius: 15px;text-align: center;font-size: 12px;line-height: 1.42857;"
                                        class="btn btn-default btn-addfile" type="button">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <body>
                        <div class="clone-upload hide">
                            <div class="control-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2">
                                            <select name="id_file[]" class="form-control">
                                                <option value="true" disabled
                                                        selected>{{__('Select a type of identification')}}</option>
                                                @foreach ($tipoidentificacion as $item)
                                                    <option
                                                        <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '0' ?>
                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" id="upload_file" name="upload_file[]"/>
                                            <input type="hidden" name="coun_file[]" value="0">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-danger btn-delfile" type="button"
                                                    style="color: white"><i
                                                        class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </body>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Anterior</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h4>Listo, ahora selecciona tu tipo de comercio.</h4>
                        <div class="row">
                            <div class="f1-country input-group mb-5 col-lg-12 col-sm-12 col-md-12">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="f1-TypeStore">Tipo de comercio...</label>
                                </div>
                                <select class="custom-select" id="f1-TypeStore" required="required">
                                    <option selected>Selecciona...</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h3>Eso es todo :)</h3>
                        <h4>

                            En breves momentos te estará llegando el correo con tu usuario y contraseña para que ingreses a la plataforma.
                        </h4>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Anterior</button>
                            <button type="submit" class="btn btn-submit">Final</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- LOGIN_NEWUSERS_JS -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="newstore_template/assets/js/jquery.backstretch.min.js"></script>
<script src="newstore_template/assets/js/retina-1.1.0.min.js"></script>
<script src="newstore_template/assets/js/scripts.js"></script>

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


</script>

</body>


</html>