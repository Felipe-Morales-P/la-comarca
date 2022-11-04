<?php
include_once("conexion.php");
 
$idProductos = $_GET['idProductos'];
 
mysqli_query($conn, "DELETE FROM productos WHERE idProductos=$idProductos");
 
header("Location:index.php");

?>