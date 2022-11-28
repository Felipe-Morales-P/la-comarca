<?php
include("includes/header.php");  
include "../../config/conexion.php";
?>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Catalogo</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	<link href="css/produc.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">




</head>

<body class="sb-nav-fixed">
	

	<section class="sesion">
		<div class="box-card">


			<div class="card">
				<div class="face front">
					<a href="php/utiles.php"><img src="img/utiles/4.png" alt=""></a>
					<h3>UTILES</h3>
				</div>
				<div class="face back">
					<h3>UTILES</h3>
					<p>En esta categoria podras encontrar
						Productos para que tus metas y trabajos queden de la mejor manera</p>
					<div class="link">
						<a href="#">
							<Details>
						</a>
					</div>
				</div>

			</div>
			<div class="card">
				<div class="face front">
					<a href="php/belleza.php"><img src="img/utiles/1.png" alt=""></a>
					<h3>BELLEZA</h3>
				</div>
				<div class="face back">
					<h3>BELLEZA</h3>
					<p>En esta categoria podras encontrar
						Productos para que tu imagen y quien tu eres, luzca a la perfección</p>
					<div class="link">
						<a href="#">
							<Details>
						</a>
					</div>
				</div>

			</div>
			<div class="card">
				<div class="face front">
					<a href="php/dulces.php"><img src="img/utiles/2.png" alt=""></a>
					<h3>DULCES</h3>
				</div>
				<div class="face back">
					<h3>DULCES</h3>
					<p>En esta categoria podras encontrar productos para que tu dia se sienta mucho mas divertido</p>
					<div class="link">
						<a href="#">
							<Details>
						</a>
					</div>
				</div>
			</div>

	    </div>

	</section>
	
<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../../index.html');
}
if(isset($_POST['btninicio']))
{
	header('location: ../index.html');
}
	
?>

</body>

</html>