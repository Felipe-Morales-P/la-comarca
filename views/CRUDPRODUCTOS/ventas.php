<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Fecha creacion</th>
							<th>Fecha venta</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require "../../config/conexion.php";
						$query = mysqli_query($conn, "SELECT idFactura, numeroFact, numeroPed, fechaCre, fechaVen FROM factura ORDER BY idFactura DESC");
						mysqli_close($conn);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><?php echo $dato['idFactura']; ?></td>
									<td><?php echo $dato['numeroFact']; ?></td>
									<td><?php echo $dato['fechaCre']; ?></td>
									<td><?php echo $dato['fechaVen']; ?></td>
									<td>
										<button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato'numeroPed';  ?>" f="<?php echo $dato'idFactura'; ?>">Ver</button>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>