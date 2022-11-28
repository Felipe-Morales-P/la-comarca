<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Clientes</h1>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
                            <th colspan="10">
                                <h1>Listar Clientes</h1>
                                    <tr>
                                        <th>Id Cliente</th>
                                        <th>Tipo De Identificación</th>
                                        <th>Numero De Identificación</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Direccion</th>
                                        <th>Contraseña</th>
                                        <th>Usuario</th>
                                        <th>Acción</th>
                                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/conexion.php';

                        $query = mysqli_query($conn, "SELECT * FROM clientes");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($mostrar = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $mostrar['idCliente']; ?></td>
                                    <td><?php echo $mostrar['tipoIdentificacion']; ?></td>
                                    <td><?php echo $mostrar['numIdentificacionC']; ?></td>
                                    <td><?php echo $mostrar['nombreCliente']; ?></td>
                                    <td><?php echo $mostrar['correoCliente']; ?></td>
                                    <td><?php echo $mostrar['telefonoCliente']; ?></td>
                                    <td><?php echo $mostrar['direccionCliente']; ?></td>
                                    <td><?php echo $mostrar['contraseñaCliente']; ?></td>
                                    <td><?php echo $mostrar['usuarioCliente']; ?></td>
                                    <?php echo "<td style='width:26%'><a href=\"editarC.php?idCliente=$mostrar[idCliente]\">Modificar</a> | <a href=\"eliminarC.php?idCliente=$mostrar[idCliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombreCliente]?')\">Eliminar</a></td>";?>
                                    <?php ?>
                                    
                                    <?php } ?>
                                </tr>
                        <?php } ?>
                    </tbody>  
                </table>
    </div>
            
</div>
</div>
            
    <script>

        function abrirform() {
            document.getElementById("formregistrar").style.display = "block";

        }

        function cancelarform() {
            document.getElementById("formregistrar").style.display = "none";
        }

    </script>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>