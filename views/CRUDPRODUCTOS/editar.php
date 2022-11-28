<?php 
include_once("../../config/conexion.php");
include_once("lista_productos.php");


$idProductos = $_GET['idProductos'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM productos WHERE idProductos= $idProductos");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $idProductos = $mostrar['idProductos'];
    $nombreP = $mostrar['nombreProducto'];
    $descpP = $mostrar['descripcionProducto'];
	$cantP = $mostrar['cantidadProductos'];
    $precioV = $mostrar['precioVenta'];
    $precioC= $mostrar['precioCompra'];
    $categoriaC = $mostrar['categoriaProducto'];

}
?>

<html>
<head>    
		<title>VaidrollTeam</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles.css">
</head>

 
<script>

function abrirform() {
    document.getElementById("formmodificar").style.display = "block";

}

function cancelarform() {
    document.getElementById("formmodificar").style.display = "none";
}
</script>  

<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar Productos</th></tr>
		     <tr> 
                <td>Id Productos</td> 
                <td><input type="text" name="txtidProductos" value="<?php echo $idProductos;?>" required ></td>
            </tr>
            <tr> 

            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombreProducto" value="<?php echo $nombreP;?>" required></td>
            </tr>
            <tr> 
                <td>Descripcion</td>
                <td><input type="text" name="txtdescripcionProducto" value="<?php echo $descpP;?>" required></td>
            </tr>

            <tr> 
                <td>Cantidad</td>
                <td><input type="text" name="txtcantidadProductos" value="<?php echo $cantP;?>" required></td>
            </tr>
            <tr> 
                <td>Precio de Venta</td>
                <td><input type="text" name="txtprecioVenta" value="<?php echo $precioV;?>" required></td>
            </tr>
            <tr> 
                <td>Precio de Compra</td>
                <td><input type="text" name="txtprecioCompra" value="<?php echo $precioC;?>" required></td>
            </tr>
            <tr> 
                <td>Categoria</td>
                <td><input type="text" name="txtcategoriaProducto" value="<?php echo $categoriaC;?>" required></td>
            </tr>
				
                <td colspan="2">
				<a href="lista_productos.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este producto?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $idCliente1 = $_POST['txtidCliente'];

	$tipoId1 	= $_POST['txttipoIdentificacion'];
    $numId1 	= $_POST['txtnumIdentificacionC'];
	$nombre1 	= $_POST['txtnombre'];
    $correo1 	= $_POST['txtcorreo'];
    $telefono1 	= $_POST['txttelefono']; 
    $direccion1 = $_POST ['txtdireccionCliente'];
    $contraseña1 = $_POST ['contraseñaCliente'];
    $usuario1 = $_POST['txtusuarioCliente'];
    $querymodificar = mysqli_query($conn, "UPDATE clientes SET tipoIdentificacion='$tipoId1',numIdentificacionC='$numId1',nombreCliente='$nombre1',correoCliente='$correo1',telefonoCliente='$telefono1', direccionCliente ='$direccion1', contraseñaCliente ='$contraseña1', usuarioCliente='$usuario1'   WHERE idCliente=$idCliente1");

  	echo "<script>window.location= 'lista_productos.php' </script>";
    
}
?>