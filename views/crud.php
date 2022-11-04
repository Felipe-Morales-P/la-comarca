<DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>CONSULTAR</title> 
		<link rel="stylesheet" type="text/css" href="../assets/stylo.css">
		<?php
			include '../config/conexioon.php';
		?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


			
	</head>
 <body bgcolor="" text="">
	<div class="main">
	<img src="../imagen/sas.jpg" style="width: 8%; height: 10%; float: left;">
	<h1><font size="8"> Papelería Comarca</font></h1>
<br><br><br><br>	
	<!--Aqui se crea la tabla-->
		<div class="table" style="color: #;">
			<center>
    		<table>
	    		<font size="8"><tr>
	    			<td>Id del producto</td>
                    <td>Nombre del producto </td>
					<td>Descripcion del Producto</td>
					<td>Cantidad de Productos</td>
   					<td>Precio venta</td>
   					<td>Precio compra</td>
                    
    			</tr></font>
    	<!--aqui finaliza tabla-->	
		<?php
			$buscarusuarios=mysqli_query($conex,"SELECT * FROM productos") or die("fallas en la consulta");

			while ($traerusuario=mysqli_fetch_array($buscarusuarios)) {?>
				<tr>
					<td><?php echo $traerusuario['idProductos']; ?></td>
					<td><?php echo $traerusuario['nombreProducto']; ?></td>
					<td><?php echo $traerusuario['descripcionProducto']; ?></td>
					<td><?php echo $traerusuario['cantidadProductos']; ?></td>
					<td><?php echo $traerusuario['precioVenta']; ?></td>
					<td><?php echo $traerusuario['precioCompra'];?></td>	

					<td><a href="crud.php?editar=<?php echo $traerusuario['idProductos']; ?>"><img  src= "../views/pictures/editar.png" alt = ""></a></td>
					<td><a href="crud.php?eliminar=<?php echo $traerusuario['idProductos']; ?>"><img src="../views/pictures/delete.png"alt= ""></a></td>
					<td><a href="crear.php?crear=<?php echo $traerusuario['idProductos']; ?>"><img src="../views/pictures/mas.png" alt=""></a></td>
				</tr>
			<?PHP } ?>
			</table>
			
			<?php 
				if(isset ($_GET['editar'])){
					include("editarproductos.php");
			}
			?>	

			<?php 
				if(isset ($_GET['eliminar'])){
					$borrar_id =$_GET['eliminar'];
					
					$borrar="DELETE FROM productos WHERE idProductos='$borrar_id'";
					$ejecutar=mysqli_query($conex, $borrar);
					if($ejecutar){
						echo "<script>alert('Borrado exitoso')</script>";
						echo "<script>window.location='crud.php'</script>";
					}
				}				
			?>




</body>
</html>