<!DOCTYPE html>

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

				<form method="POST" action="validarinicio.php">

					<h1>INICIO SESION DE CLIENTES</h1>

					<br><br>
					<label for="usuario">CORREO</label>
					<br><input type="email" class="cajaentradatextoUsuario" placeholder="Ingrese su correo" name="correoCl" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu correo')">><br><br>
					<label for="password">CONTRASEÑA</label>
					<br><input type="password" class="cajaentradatexto" placeholder="Ingrese contraseña" name="contraCl" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu contraseña')">
					<br><br><br>
					<input class="inicioboton" type="submit" name="btnloginx" value="INGRESAR"></a>
					<br>
					<p><a class="textofinal" href="registrousua.php">¿Aun no tienes una cuenta?</a></p>					
					<p><a class="textofinal" href="recupera.php"> Olvide mi contraseña </a></p>
				</form>

			</div>
		</div>
	</div>

</body>

</html>