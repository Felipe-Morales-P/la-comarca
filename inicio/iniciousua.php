<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>¡INICIO SESION DE USUARIO!</title>
	<link rel="stylesheet" href="CSS/estilosinicio.css">

</head>
<?php


include("../config/conexion.php");
include("../config/funcs.php");

?>

<body>

	<div class="cajafuera">
		<img class="portada" src="../images/IMAGES/PORTADA2.png">
		<div class="formulariocaja">
			<ul>
				<li><a href="../index.html" class="Boton">INICIO</a></li>
			</ul>
			<div class="login-box">

				<form method="POST" action="validarinicio.php">

					<h1>INICIO SESION DE CLIENTES</h1>

					<br><br>
					<label for="usuario">&#128235; Correo</label>
					<br><input type="text" class="cajaentradatextoUsuario" placeholder="Ingrese su correo" name="usuarioCl" required="">
					<br><br>
					<label for="password">&#128272; Contraseña</label>
					<br><input type="password" class="cajaentradatexto" placeholder="Ingrese contraseña" name="contraCl" required="">
					<br><br><br>
					<input class="inicioboton" type="submit" name="login" value="INGRESAR"></a>
					<br>
					<p><a class="textofinal" href="registrousua.php">¿Aun no tienes una cuenta?</a></p>
					<p><a class="textofinal" href="recupera.php">¿Olvidaste tu contraseña?</a></p>
				</form>

				

			</div>
		</div>
	</div>

</body>

</html>