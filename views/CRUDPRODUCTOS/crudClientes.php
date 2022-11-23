<?php  
include("php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard-Comarca</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Administrador</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Mi perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="index.html">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="icon ion-md-apps mr-2 lead"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="crudClientes.php">
                            <div class="sb-nav-link-icon"><i class="icon ion-md-people mr-2 lead"></i></div>
                                Clientes
                                
                            </a>
                            <a class="nav-link " href="crudProductos.php">
                            <div class="sb-nav-link-icon"><i class="icon ion-md-basket mr-2 lead"></i></div>
                                Productos
                                
                            </a>
                            <a class="nav-link " href="pedidos.php">
                                <div class="sb-nav-link-icon"><i class="icon ion-md-checkmark mr-2 lead"></i></div>
                                Pedidos
                            </a>
                        </div>
                
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                        La Comarca
                    </div>
                </nav>
            </div>
    <div id="layoutSidenav_content">
    <table>
        <tr>
            <th colspan="10">
                <h1>Listar Clientes</h1>
        <tr>
            <th>Id Cliente</th>
            <th>Tipo De Identificación</th>
            <th>Numero De Identificación</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Direccion</th>
            <th>Contraseña</th>
            <th>Usuario</th>
            <th>Acción</th>
        </tr>
        <?php

        if (isset($_POST['btnbuscar'])) {
            $buscar = $_POST['txtbuscar'];
            $queryusuarios = mysqli_query($conn, "SELECT idCliente,tipoIdentificacion,numIdentificacionC,nombreCliente,	correoCliente,telefonoCliente,direccionCliente,contraseñaCliente,usuarioCliente FROM clientes where nombreCliente like '" . $buscar . "%'");
        } else {
            $queryusuarios = mysqli_query($conn, "SELECT * FROM clientes ORDER BY idCliente asc");
        }
        $numerofila = 0;
        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $numerofila++;
            echo "<tr>";
            echo "<td>" . $mostrar['idCliente'] . "</td>";
            echo "<td>" . $mostrar['tipoIdentificacion'] . "</td>";
            echo "<td>" . $mostrar['numIdentificacionC'] . "</td>";
            echo "<td>" . $mostrar['nombreCliente'] . "</td>";
            echo "<td>" . $mostrar['correoCliente'] . "</td>";
            echo "<td>" . $mostrar['telefonoCliente'] . "</td>";
            echo "<td>" . $mostrar['direccionCliente'] . "</td>";
            echo "<td>" . $mostrar['contraseñaCliente'] . "</td>";
            echo "<td>" . $mostrar['usuarioCliente'] . "</td>";
            echo "<td style='width:26%'><a href=\"editar.php?idCliente=$mostrar[idCliente]\">Modificar</a> | <a href=\"eliminar.php?idCliente=$mostrar[idCliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombreCliente]?')\">Eliminar</a></td>";
        }
        ?>
    </table>
            </div>
            
       </div>
            
    <script>
        function abrirform() {
            document.getElementById("formregistrar").style.display = "block";

        }

        function cancelarform() {
            document.getElementById("formregistrar").style.display = "none";
        }

    </script>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
</body>

        </html>