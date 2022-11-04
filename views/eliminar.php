<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>ELIMINAR</title> 
	
	</head>	
  <body bgcolor="" text="BLACK">
	<?php
 		include 'conexioon.php';

		echo '<script>alert("¿Desea eliminar este producto?")</script>';
	
		$idp = $_POST ['idProductos'];

		$eliminar= mysqli_query ($conex, "DELETE FROM productos WHERE idProductos = '$idp'");

		if (!$eliminar) {
        	echo "error al eliminar el dato";
        	} else {
        	echo "Dato eliminado";
        	}  
		mysqli_close($conex);
	?>
<br><br>
<?php
  echo '<a href="seleccionar.php" title="Ir al inicio"><button type="button">VOLVER</button></a>';
?>
</body>
</html>