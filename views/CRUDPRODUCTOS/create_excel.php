<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'php/conexion.php';
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
                        <th>Id Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Descripcion del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio de Venta</th>
                        <th>Precio de Compra</th>
                        <th>Categoria</th>
                        <th>Acción</th>
					</tr>
				<tbody>
		";
		
		$query = mysqli_query($conn, "SELECT * FROM `productos`") or die(mysqli_errno());
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$fetch['idProductos']."</td>
                        <td>".$fetch['nombreProducto']."</td>
                        <td>".$fetch['descripcionProducto']."</td>    
                        <td>".$fetch['cantidadProductos']."</td>
                        <td>".$fetch['precioVenta']."</td>
                        <td>".$fetch['precioCompra']."</td>
                        <td>".$fetch['categoriaProducto']."</td>

					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>