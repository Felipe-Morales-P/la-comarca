<?php include_once "includes/header.php"; 
include("../../config/conexion.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Productos</h1>
		<a href="registro_producto.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
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
                    </thead>
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

            <script>
                function abrirform() {
                    document.getElementById("formregistrar").style.display = "block";
                }
                function cancelarform() {
                    document.getElementById("formregistrar").style.display = "none";
                    }
            </script>
            </table>
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
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="JS/datatables-simple-demo.js"></script>

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
</div>
                </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>