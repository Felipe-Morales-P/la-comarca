<?php
include_once("php/conexion.php");
 
$idProductos = $_GET['idProductos'];
 
mysqli_query($conn, "DELETE FROM productos WHERE idProductos=$idProductos");
 
header("Location: lista_productos.php");

?>