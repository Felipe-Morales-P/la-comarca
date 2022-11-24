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

		if(emailExiste($email))
		{

			header("Location: ../views/productos/index.php");


		}

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

			</div>
		</div>
	</div>

</body>

</html>