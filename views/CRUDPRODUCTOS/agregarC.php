<?php 
include_once("../../config/conexion.php"); 
    
    $tipoId = $_POST['txttipoIdentificacion'];
    $numId = $_POST['txtnumIdentificacionC'];
	$nombre = $_POST['txtnombreCliente'];
    $correo = $_POST['txtcorreoCliente'];
    $telefono = $_POST['txttelefonoCliente'];
    $direccion = $_POST['txtdireccionCliente'];
    $contraseña = $_POST['txtcontraseñaCliente'];
    
	mysqli_query($conn, "INSERT INTO clientes (tipoIdentificacion,numIdentificacionC,nombreCliente,correoCliente,telefonoCliente,direccionCliente,contraseñaCliente) VALUES('$tipoId','$numId','$nombre','$correo','$telefono','$direccion','$contraseña')");
    
header("Location:lista_cliente.php");
	

?>