<?php
include("php\conexion.php");
?>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dashboard-Comarca</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	<link href="css/produc.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
	
<?php
include('../../config/conexion.php');

session_start();

if(isset($_SESSION['correoCliente']))
{
	$usuarioingresado = $_SESSION['correoCliente'];
	echo "<h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location: index.html');
}

?>

	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="index.php">categorias</a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
				class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
				aria-describedby="btnNavbarSearch" />
			    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
				class="fas fa-search"></i></button>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="php/miperfil.php?idCliente=$mostrar[idCliente]\">Mi perfil</a></li>
					<li>
						<hr class="dropdown-divider" />
					</li>

					<form method="POST">
					<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
					</form>
				

				</ul>

			</li>
		</ul>
	</nav>
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
						productos para que tus metas y trabajos queden de la mejor manera</p>
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
						productos para que tu imagen y quien tu eres, luzca a la perfección</p>
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
	session_destroy();
	header('location: ../index.html');
}
	
?>

</body>

</html>