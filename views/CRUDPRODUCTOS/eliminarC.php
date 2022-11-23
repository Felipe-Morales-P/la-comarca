<?php
include_once("php/conexion.php");
 
$idCliente = $_GET['idCliente'];
 
mysqli_query($conn, "DELETE FROM clientes WHERE idCliente=$idCliente");
 
header("Location:index.php");

?>