<?php include_once("conexion.php"); 
    
    $nombreP = $_POST['txtnombreProducto'];
    $descpP = $_POST['txtdescripcionProducto'];
	$cantP = $_POST['txtcantidadProductos'];
    $precioV = $_POST['txtprecioVenta'];
    $precioC= $_POST['txtprecioCompra'];
    $categoriaC = $_POST['txtcategoriaProducto'];
  
	mysqli_query($conn, "INSERT INTO productos (nombreProducto,descripcionProducto,cantidadProductos,precioVenta,precioCompra,categoriaProducto) VALUES('$nombreP','$descpP','$cantP','$precioV','$precioC','$categoriaC')");
    
header("Location:index.php");
	

?>
