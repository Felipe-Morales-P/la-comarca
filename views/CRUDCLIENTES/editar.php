<?php 
include_once("conexion.php");
include_once("index.php");

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
    $contraseña = $mostrar['contraseñaCliente'];
}
?>
<html>
<head>    
		<title>VaidrollTeam</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
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
                <td>Contrseña</td>
                <td><input type="password" name="txtcontraseñaCliente" value="<?php echo $contraseña;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="index.php">Cancelar</a>
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
    $idCliente1 = $_POST['txtidCliente'];

	$tipoId1 	= $_POST['txttipoIdentificacion'];
    $numId1 	= $_POST['txtnumIdentificacionC'];
	$nombre1 	= $_POST['txtnombre'];
    $correo1 	= $_POST['txtcorreo'];
    $telefono1 	= $_POST['txttelefono']; 
    $direccion1 = $_POST ['txtdireccionCliente'];
    $contraseña1 = $_POST['txtcontraseñaCliente'];  
    $querymodificar = mysqli_query($conn, "UPDATE clientes SET tipoIdentificacion='$tipoId1',numIdentificacionC='$numId1',nombreCliente='$nombre1',correoCliente='$correo1',telefonoCliente='$telefono1', direccionCliente ='$direccion1', contraseñaCliente ='$contraseña1'  WHERE idCliente=$idCliente1");

  	echo "<script>window.location= 'index.php' </script>";
    
}
?>
	