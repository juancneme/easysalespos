<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!-- If you delete this tag, the sky will fall on your head -->
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>PDVI</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('pdviSalePdf/css/style.css') }}">
</head>

<body bgcolor="#FFFFFF">

	<!-- HEADER -->
	<table class="head-wrap" bgcolor="#1D5499">
		<tr>
			<td></td>
			<td class="header container">

				<div class="content">
					<table bgcolor="#4980B5">
						<tr>
							<td>
								<img style="width: 50px; height: 50px" src="<?= file_exists(public_path('/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT) . '/logo000001.png'))
										? public_path('/support/pictures/partners/' .str_pad($contract, 3, "0", STR_PAD_LEFT) . '/logo000001.png')
										: public_path('/support/pictures/partners/001/logo000001.png')?>"/>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table><!-- /HEADER -->


	<!-- BODY -->
	<table class="body-wrap">
		<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF">

				<div class="content">
					<table>
						<tr>
							<td>

								<h3>Hola {{$name}} </h3>
								<!--<Nombre de persona completo>-->
								<h3>Bienvenido a tu plataforma {{$business}}</h3>

								<p class="lead">Gracias por crear una cuenta de usuario en la plataforma de {{$business}}</p>

								<!-- Callout Panel -->
								<p class="callout">
									Estos son tus datos de acceso:<br />

									Usuario: <label id="user1">{{$emailuser}} </label> <br />
									Contraseña:<label id="password2"> {{$passuser}}</label><br />

									@if(isset($key))
										Ingresa: <a href="{{$url . '/auth/login?par=' . $key}}" target="_blank"> {{$url . '/auth/login?par=' . $key}}</a>
									@else
										Ingresa: <a href="{{$url . '/auth/login'}}" target="_blank"> {{$url . '/auth/login'}}</a>
									@endif

								</p><!-- /Callout Panel -->

								<p class="lead"> <strong> Consejos de seguridad </strong></p>
								<p class="lead">
									<li>Inmediatamente ingrese al sistema cambie la contraseña.</li>
									<br>
									<li>Mantenga los datos de su cuenta en un lugar seguro.</li>
									<br>
									<li>No comparta los detalles de su cuenta con otras personas.</li>
									<br>
									<li>Cambie su contraseña regularmente.</li>
									<br>
									<li>Si sospecha que alguien está usando ilegalmente su cuenta, avísenos
										inmediatamente.</li>
									<br>
								</p>
								<!-- Contacto -->
								<table class="social" width="100%">
									<tr>
										<td>
											<table align="left">
												<tr>
													<td>
														<h5 class="">Soporte y contacto:</h5>
														<p>VideoTutoriales: <strong><a
																	href="http://www.youtube.com/pdvi"
																	target="_blank">www.youtube.com/pdvi</a></strong>
														</p>
														<p>Teléfono: <strong>01 8000 6233755</strong><br /></p>
														<p>Email: <strong><a href="mailto:easynet.info@easynet.com.co"
																	target="_blank">easynet.info@easynet.com.co</a></strong></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>
			<td></td>
		</tr>
	</table>

	<!-- FOOTER -->
	<table class="footer-wrap">
		<tr>
			<td></td>
			<td class="container">
				<!-- content -->
				<div class="content">
					<table>
						<tr>
							<td align="center">
								<p>
									<a href="#">Terminos</a> |
									<a href="#">Privacidad</a> |
									<a href="#">
										<unsubscribe>Darse de baja</unsubscribe>
									</a>
								</p>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table><!-- /FOOTER -->

</body>

</html>