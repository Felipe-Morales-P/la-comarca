<?php

require '../config/conexion.php';
require '../config/funcs.php';

$errors = array();

if (!empty($_POST)) 
{
	$email = $mysqli->real_escape_string($_POST['email']);

	if(!isEmail($email)) 
	{

		$errors[] = "Debe  ingresar un correo electronico valido";

	}
	

		if(emailExiste($email))
		{
			$user_id = getValor('idCliente','correoCliente',$email);
			$nombre = getValor('nombreCliente','correoCliente',$email);

			$token = generarTokenPass($email);

			$url = 'http://'.$SERVER["SERVER NAME"].
			'/login/cambia_pass-php?user_id='.$user_id. '&token='.$token;

			$asunto = 'Recuperar Contraseña - Sistema de Usuarios';
			$cuerpo = "¡Hola! $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a.<br /><br />
			 Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo))
			{
				echo "Hemos enviado un correo electronico a la dirección 
				$email para restablecer tu contraseña.<br />";
				    echo "<a href='iniciousua.php' >Iniciar Sesion<a/a>";
					exit;

			} else {

				$errors[]="Error al enviar Email";
			}



		} else {
		
			$errors[]="No existe el correo electronico";
		}
}

?>
<html>

<head>
	<meta charset="utf-8">
	<title>¡INICIO SESION DE USUARIO!</title>
	<link rel="stylesheet" href="CSS/estilosinicio.css">

</head>
<?php
$con = mysqli_connect("localhost", "root", "", "comarca") or die("ERROR DE CONEXIÓN")

?>

<body>

	<div class="cajafuera">
		<img class="portada" src="../images/IMAGES/PORTADA2.png">
		<div class="formulariocaja">
			<ul>
				<li><a href="../index.html" class="Boton">INICIO</a></li>
			</ul>
			<div class="login-box">

				<form method="POST" action="<?php $_SERVE['PHP_SELF']; ?>">

					<h1>RECUPERA TU CONTRASEÑA</h1>

					<br><br>
					<label for="usuario">&#128235; Correo</label>
					<br><input type="email" class="cajaentradatextoUsuario" placeholder="Ingrese su correo" name="email" required="">
					<br><br><br>
					<input class="inicioboton" type="submit" name="login" value="Enviar"></a>

					<br>
					<br>
					<p><a class="textofinal" href="registrousua.php">¿Aun no tienes una cuenta?</a></p>
				</form>

				<?php echo resultBlock ($errors); ?>

			</div>
		</div>
	</div>

</body>

</html>