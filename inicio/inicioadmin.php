<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>INICIO SESION PERSONAL</title>
    <link rel = "stylesheet" href="../assets/CSS/estilos.css">
</head>
<body>
<form action="validaradmin.php" method="post">
	<div class="cajafuera">
	<div class="formulariocaja">
		<ul>
		<li><a href="../index.html" class="Boton">INICIO</a></li>
	</ul>
		<div class="login-box">

			<h1>INICIO SESION DE PERSONAL</h1>
			<form>
				<br><br><br><br>
				<label for="usuario">Usuario</label>
				<br>
				<input class="cajaentradatextoUsuario" type="text" placeholder="Ingrese Usuario" name="nomaper"><br><br>
				<label for="password">Contraseña</label>
				<br>
				<input class="cajaentradatexto" type="password" placeholder="Ingrese Contraseña" name="contraper">
				<br><br><br>
				<a href="../views/CRUDCLIENTES/index.php"><input class="inicioboton" type="submit" value="Iniciar Sesion"></a>
			</form>
		</div>
	</div>
</div>
	</form>
  </body>
</html>