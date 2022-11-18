<?php  session_start();
include ("php\conexion.php");
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title>PRODUCTOS</title>
	<link rel="stylesheet" type="text/css" href="css/produc.css">
</head>
<body>
<img href="index.html"src="../../images/images/logo.png" class="logo" style="">
<h1 class="titulo">¡ADMIRA A LA VARIEDAD DE PRODUCTOS QUE TENEMOS PARA OFRECERTE!</h1>
<ul>
	<li><a class="INICIO" href="../../index.html">INICIO</a></li>
	<LI> <a class="INICIO" href="php/logout.php">Cerrar Sesión</a>-</LI>
</ul>            
<div class="container">
 	<div class="card">
 		<div class="utiles">
 			<a href="php/utiles.php"><img src="img/utiles/4.jpeg" style="width: 350px; height: 280px;"></a>
 			<h4>Utiles Escolares</h4>
 			<p>En esta categoria podras encontrar productos para que tus metas y trabajos queden de la mejor manera</p>
 		</div>
	</div>

 		<div class="card" style="float: left;">
 			<a href="php/belleza.php"><img src="img/utiles/1.jpg" style="width: 350px; height: 280px;"></a>
 			<h4>Belleza y Aseo</h4>
 			<p>En esta categoria podras encontrar productos para que tu imagen y quien tu eres, luzcan a la perfeccion</p>
 		</div>

 		<div class="card">
 			<a href="php/dulces.php"><img src="img/utiles/2.jpg" style="width: 350px; height: 280px;"></a>
 			<h4>Dulces</h4>
 			<p>En esta categoria podras encontrar productos para que tu dia se sienta mucho mas divertido</p>
 		</div>
 </div>
</body>
</html>