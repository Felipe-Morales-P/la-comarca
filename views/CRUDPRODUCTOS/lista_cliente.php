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
                        include "php/conexion.php";

                        $query = mysql_query($conexion, "SELECT * FROM 'clientes'");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysql_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['idCliente']; ?></td>
                                    <td><?php echo $data['tipoIdentificacion']; ?></td>
                                    <td><?php echo $data['numIdentificacionC']; ?></td>
                                    <td><?php echo $data['nombreCliente']; ?></td>
                                    <td><?php echo $data['correoCliente']; ?></td>
                                    <td><?php echo $data['telefonoCliente']; ?></td>
                                    <td><?php echo $data['direccionCliente']; ?></td>
                                    <td><?php echo $data['contraseñaCliente']; ?></td>
                                    <td><?php echo $data['usuarioCliente']; ?></td>
                                    <td>
                                        <a href="editar_cliente.php?id=<?php echo $data['idCliente']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
                                        <form action="eliminar_cliente.php?id=<?php echo $data['idCliente']; ?>" method="post" class="confirmar d-inline">
                                            <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
                                        </form>
                                    </td>
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