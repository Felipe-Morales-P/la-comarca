<?php
	if(isset($_GET['editar'])){
		$editar_id=$_GET['editar'];
	
				$consulta="SELECT * FROM productos WHERE idProductos='$editar_id'";
				$ejecutar=mysqli_query($conex, $consulta);
				$fila=mysqli_fetch_array($ejecutar);
			   	$idp=$fila['idProductos'];
				   $nomprod=$fila['nombreProducto'];
				   $descripp=$fila['descripcionProducto'];
				   $cantidadp=$fila['cantidadProductos'];
				   $precv=$fila['precioVenta'];
    			$precc=$fila['precioCompra'];
		}				
?>
<section class="form-register">
    <div class="form">
    <form method="post" action="">  
        <input  type="text" name="idp" value="<?php echo $idp;?>">
        <input  type="text" name="nomprod" value="<?php echo $nomprod; ?>">
        <input  type="text" name="descripp" value="<?php echo $descripp; ?>">
        <input  type="text" name="cantidadp" value="<?php echo $cantidadp; ?>">
		<input  type="text" name="precv" value="<?php echo $precv; ?>">
        <input  type="text" name="precc" value="<?php echo $precc; ?>">
        <input type="submit" name="enviar" value="actualizar">
      </form>
    </center>
    </div>
</section>	
	<?php
		if(isset($_POST['enviar'])){
			$idp =$_POST['idp'];
			$nomprod =$_POST['nomprod'];
			$descripp =$_POST['descripp'];
			$cantidadp =$_POST['cantidadp'];
			$precv =$_POST['precv'];
			$precc =$_POST['precc'];

		
			$actualizar="UPDATE productos SET idProductos='$idp', nombreProducto='$nomprod', descripcionProducto='$descripp', 
			cantidadProductos='$cantidadp', precioVenta='$precv', precioCompra ='$precc' WHERE idProductos='$editar_id'";
			$ejecutar =mysqli_query($conex, $actualizar);
			if ($ejecutar) {

				echo "<script>alert('Datos actualizados correctamente')</script>";
	
				mysqli_close($conex);
	
				echo "<script>window.location='crud.php'</script>";
			}
		}
		?>
</body>
</html>