<?php
session_start();
if (empty($_SESSION['active'])) {
	
}

include "../../config/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Punto de Venta</title>

	<!-- Custom styles for this template-->
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


</head>

<body id="page-top">
	
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-primary text-white topbar mb-4 static-top shadow">
					<a class= "navbar-brand ps-3 text-white" href="../../index.html">CATEGORIAS</a>
                 
            
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small text-white"><i class="fas fa-user fa-fw"></i></span>
							</a>
							
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									usuario
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Salir
								</a>
							</div>
						</li>

					</ul>

				</nav>

			 <script>
window.addEventListener('DOMContentLoaded', event => {


const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});
        </script>

        <script>
            window.addEventListener('nav-link collapsed', event => {

const datatablesSimple = document.getElementById('datatablesSimple');
if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple);
}
});
            </script>
