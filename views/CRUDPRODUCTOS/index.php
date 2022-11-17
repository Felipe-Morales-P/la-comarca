<?php
include_once("conexion.php"); 
?>
<!--Busca por VaidrollTeam para más proyectos. -->
<html>
<head>    
		<title>CrudProductos</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
	<img src="img/logo.png" class="logo" >
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
        </form>
        <form method="get" action="../CRUDCLIENTES/index.php">
        <button type="submit">Administrar Clientes
</form>
<form method="get" action="../../index.html">
 <button type="submit">INICIO
</form>

        <form method="POST" action="create_excel.php">
				<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Exportar excel</button>
			</form>
		</div>
			<tr><th colspan="7"><h1>Listar Productos</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
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
</body>

</html>

