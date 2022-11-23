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
                        <th colspan="7"><h1>Listar Productos</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
                        <tr>
                            <th>Id Producto</th>
                            <th>Nombre del Producto</th>
                            <th>Descripcion del Producto</th>
                            <th>Cantidad</th>
                            <th>Precio de Venta</th>
                            <th>Precio de Compra</th>
                           <th>Categoria</th>
                       <th>Acción</th>
			        </tr>
                    <?php 
                    if(isset($_POST['btnbuscar']))
                    {
                        $buscar = $_POST['txtbuscar'];
                        $queryusuarios = mysqli_query($conn, "SELECT idProductos,nombreProducto,descripcionProducto,cantidadProductos,precioVenta,precioCompra,categoriaProducto FROM productos where categoriaProducto like '".$buscar."%'");
                    }
                    else
                    {
                        $queryusuarios = mysqli_query($conn, "SELECT * FROM productos ORDER BY idProductos asc");
                    }
                    $numerofila = 0;
                    while($mostrar = mysqli_fetch_array($queryusuarios)) 
                    {    $numerofila++;    
                        echo "<tr>";
                        echo "<td>".$mostrar['idProductos']."</td>";
                        echo "<td>".$mostrar['nombreProducto']."</td>";
                        echo "<td>".$mostrar['descripcionProducto']."</td>";    
		            	echo "<td>".$mostrar['cantidadProductos']."</td>";
                        echo "<td>".$mostrar['precioVenta']."</td>";
                        echo "<td>".$mostrar['precioCompra']."</td>";
                        echo "<td>".$mostrar['categoriaProducto']."</td>";  
                        echo "<td style='width:26%'><a href=\"editar.php?idProductos=$mostrar[idProductos]\">Modificar</a> | <a href=\"eliminar.php?idProductos=$mostrar[idProductos]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombreProducto]?')\">Eliminar</a></td>";           
                    }
                    ?>
                </table>
            <script>
                function abrirform() {
                    document.getElementById("formregistrar").style.display = "block";
                }
                function cancelarform() {
                    document.getElementById("formregistrar").style.display = "none";
                    }
            </script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo Producto</th></tr>
        <td>Id Productos</td>
                <td><input type="text" name="txtidProductos"  required ></td>
            </tr>
            <tr> 

            <tr> 
                <td>Nombre  </td>
                <td><input type="text" name="txtnombreProducto"  required></td>
            </tr>
            <tr> 
                <td>Descripcion </td>
                <td><input type="text" name="txtdescripcionProducto" required></td>
            </tr>

            <tr> 
                <td>Cantidad</td>
                <td><input type="text" name="txtcantidadProductos"  required></td>
            </tr>
            <tr> 
                <td>precio venta</td>
                <td><input type="text" name="txtprecioVenta"  required></td>
            </tr>
            <tr> 
                <td>precio Compra</td>
                <td><input type="text" name="txtprecioCompra" required></td>
            </tr>
            <tr> 
                <td>Categoria</td>
                <td><input type="text" name="txtcategoriaProducto" required></td>
            </tr>
				
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Añadir" onClick="javascript: return confirm('¿Deseas añadir este producto?');">
			</td>
            </tr>
        </table>
    </form>
</div>
       
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