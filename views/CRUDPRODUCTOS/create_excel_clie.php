<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'conexion.php';
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
                        <th>Id Cliente</th>
                        <th>Tipo De Identificación</th>
                        <th>Numero De Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Direccion</th>
                        <th>Contraseña</th>
                        <th>Acción</th>
					</tr>
				<tbody>
		";
		
		$query = mysqli_query($conn, "SELECT * FROM `clientes`") or die(mysqli_errno());
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$fetch['idCliente']."</td>
                        <td>".$fetch['tipoIdentificacion']."</td>
                        <td>".$fetch['numIdentificacionC']."</td>    
                        <td>".$fetch['nombreCliente']."</td>
                        <td>".$fetch['correoCliente']."</td>
                        <td>".$fetch['telefonoCliente']."</td>
                        <td>".$fetch['direccionCliente']."</td>
                        <td>".$fetch['contraseñaCliente']."</td>

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