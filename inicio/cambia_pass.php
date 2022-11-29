<?php 


require '../config/conexion.php';
require '../config/funcs.php';


if (empty($_GET['user_id'])){

    header ('Location: ../index.php');
}


if (empty($_GET['token'])){

    header ('Location: ../index.php');
}

$user_id = $conn ->real_escape_string($_GET['user_id']);
$token = $conn ->real_escape_string($_GET['token']);

if (!verificaTokenPass($user_id, $token))
{
echo 'No se pudo verificar los Datos'; 
exit;
}


?>

<html>

<head>
	<meta charset="utf-8">
	<title>Cambiar contraseña</title>
	<link rel="stylesheet" href="CSS/estilosinicio.css">

</head>

<body>

	<div class="cajafuera">
		<img class="portada" src="../images/IMAGES/PORTADA2.png">
		<div class="formulariocaja">
			<ul>
				<li><a href="../index.html" class="Boton">INICIO</a></li>

			</ul>
			<div class="login-box">

				<form method="POST" action="guarda_pass.php">

					<h1>Cambiar contraseña</h1>

					<br><br>

					<input type ="hidden" id="user_id" name="user_id" value ="
					<?php echo $user_id; ?>"/>
					<input type ="hidden" id="token" name="token" value ="
					<?php echo $token; ?>"/>


					<label for="password">&#128272; Nueva Contraseña</label>
					<br><input type="password" class="cajaentradatexto" placeholder="Ingrese contraseña" name="contraCl" required="">
					<br><br>
		
					<label for="password">&#128272; Confirmar Contraseña</label>
					<br><input type="password" class="cajaentradatexto" placeholder="Ingrese contraseña" name="con_contraCl" required="">
					<br><br><br>
					<input class="inicioboton" type="submit" name="login" value="INGRESAR"></a>
					<br>
				</form>

				

			</div>
		</div>
	</div>

</body>

</html>