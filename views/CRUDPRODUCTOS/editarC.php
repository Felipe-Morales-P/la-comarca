<?php 
include_once("../../config/conexion.php");
include("includes/header.php");

$idCliente = $_GET['idCliente'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM clientes WHERE idCliente=$idCliente");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $idCliente = $mostrar['idCliente'];
    $tipoId = $mostrar['tipoIdentificacion'];
    $numId = $mostrar['numIdentificacionC'];
	$nombre = $mostrar['nombreCliente'];
    $correo = $mostrar['correoCliente'];
    $telefono = $mostrar['telefonoCliente'];
    $direccion = $mostrar['direccionCliente'];
    $contraseña1 = $mostrar['contraseñaCliente'];
    $usuario = $mostrar['usuarioCliente'];
}
?>
<html>
<head>    
		<title>VaidrollTeam</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles.css">
</head>
<body>
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
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Id Cliente</td>
                <td><input type="text" name="txtidCliente" value="<?php echo $idCliente;?>" required ></td>
            </tr>
            <tr> 

            <tr> 
                <td>Tipo de Identificacion</td>
                <td><input type="text" name="txttipoIdentificacion" value="<?php echo $tipoId;?>" required></td>
            </tr>
            <tr> 
                <td>Numero de Identificacion</td>
                <td><input type="text" name="txtnumIdentificacionC" value="<?php echo $numId;?>" required></td>
            </tr>

            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>" required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="number" name="txttelefono" value="<?php echo $telefono;?>" required></td>
            </tr>
            <tr> 
                <td>Direccion</td>
                <td><input type="text" name="txtdireccionCliente" value="<?php echo $direccion;?>" required></td>
            </tr>
            <tr> 
                <td>Contraseña</td>
                <td><input type="password" name="txtcontraseñaCliente" value="<?php echo $contraseña1;?>" required></td>
            </tr>
            <tr> 
                <td>Usuario</td>
                <td><input type="text" name="txtusuarioCliente" value="<?php echo $usuario;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="lista_cliente.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))

{       
    $idProductos1   = $_POST['txtidProductos'];
    $nombreP1       = $_POST['txtnombreProducto'];
    $descpP1        = $_POST['txtdescripcionProducto'];
	$cantP1         = $_POST['txtcantidadProductos'];
    $precioV1       = $_POST['txtprecioVenta'];
    $precioC1       = $_POST['txtprecioCompra'];
    $categoriaC1    = $_POST['txtcategoriaProducto'];

 
    $querymodificar = mysqli_query($conn, "UPDATE productos SET nombreProducto='$nombreP1',descripcionProducto='$descpP1',cantidadProductos='$cantP1',precioVenta='$precioV1',precioCompra='$precioC1', categoriaProducto ='$categoriaC1' WHERE idProductos=$idProductos1");

  	echo "<script>window.location= 'lista_productos.php' </script>";
    
}
?>
	