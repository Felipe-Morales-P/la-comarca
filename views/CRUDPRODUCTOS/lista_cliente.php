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
					<tr>
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
        <?php

        if (isset($_POST['btnbuscar'])) {
            $buscar = $_POST['txtbuscar'];
            $queryusuarios = mysqli_query($conn, "SELECT idCliente,tipoIdentificacion,numIdentificacionC,nombreCliente,	correoCliente,telefonoCliente,direccionCliente,contraseñaCliente,usuarioCliente FROM clientes where nombreCliente like '" . $buscar . "%'");
        } else {
            $queryusuarios = mysqli_query($conn, "SELECT * FROM clientes ORDER BY idCliente asc");
        }
        $numerofila = 0;
        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $numerofila++;
            echo "<tr>";
            echo "<td>" . $mostrar['idCliente'] . "</td>";
            echo "<td>" . $mostrar['tipoIdentificacion'] . "</td>";
            echo "<td>" . $mostrar['numIdentificacionC'] . "</td>";
            echo "<td>" . $mostrar['nombreCliente'] . "</td>";
            echo "<td>" . $mostrar['correoCliente'] . "</td>";
            echo "<td>" . $mostrar['telefonoCliente'] . "</td>";
            echo "<td>" . $mostrar['direccionCliente'] . "</td>";
            echo "<td>" . $mostrar['contraseñaCliente'] . "</td>";
            echo "<td>" . $mostrar['usuarioCliente'] . "</td>";
            echo "<td style='width:26%'><a href=\"editar.php?idCliente=$mostrar[idCliente]\">Modificar</a> | <a href=\"eliminarC.php?idCliente=$mostrar[idCliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombreCliente]?')\">Eliminar</a></td>";
        }
        ?>
    </table>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>