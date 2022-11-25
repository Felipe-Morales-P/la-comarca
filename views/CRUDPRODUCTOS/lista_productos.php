<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Productos</h1>
		<a href="agregar.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
                    <tr>
                        <th colspan="7"><h1>Listar Productos</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()"><i class='fas fa-audio-description'></i>Agregar</a></th></tr>
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
  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>
