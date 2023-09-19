<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Restablecer tu contraseña</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							<img src="images/logopdvi" alt="Logo PDVi" width="300" height="100" style="display: block;" />
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										<b>Restablecimiento de contraseña</b>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
									<b>Hola!!</b>
									</br>
										Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.
									</td>
								</tr>
								
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
									</br>
										<a type="button" class="btn btn-primary" href="{{$servidor.'/reset/'.$token}}">Restablecer la contraseña</a>
									</td>
								</tr>
								
								
								
								
							
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
										Sino solicitó un restablecimiento de contraseña, omita este correo, no es necesario realizar ninguna otra acción.
										</br>
										</br>
										Saludos, 
										</br>
										PDVi
										</br>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
										Si tiene problemas al hacer click en el botón "Restablecer la contraseña", copie y pegue la siguiente URL dentro de su navegador web:
										{{$servidor.'/reset/'.$token}}
									</td>
								</tr>
								
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										2019 PDVi 
										
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
										
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>