<?php


require '../config/conexion.php';
require '../config/funcs.php';


if(isset($_GET["id"]) AND isset ($_GET['val']))
{
    $idCliente = $_GET['id'];
    $token = $_GET['val'];

    $mensaje = validaIdToken($idCliente,$token);

    
 
}

 
?>
<html>


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/estilosregistro.css">
    <title>Registro Clientes</title>

</head>


<body>

	<div class="cajafuera">
		<img class="portada" src="../images/IMAGES/PORTADA2.png">
		<div class="formulariocaja">
			<ul>
			</ul>
			<div class="login-box">

					<h1>ACTIVAR CUENTA</h1>

					<br><br>
					<h1><?php echo $mensaje; ?><h1>
                    <li><a href="iniciousua.php" class="Boton">INICIAR SESION</a></li>
					<p><a class="textofinal" href="recupera.php">¿Olvidaste tu contraseña?</a></p>
				</form>

			</div>
		</div>
	</div>

</body>


</html>