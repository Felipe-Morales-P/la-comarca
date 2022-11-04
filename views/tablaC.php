<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Ultimo Ingreso</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($arrDatos) {
                foreach ($arrDatos as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['usuario']; ?>
                    </td>

                    <td>
                        <?php
                      if ($row['sector'] == 1) { ?>
                            <p>Administración</p>
                            <?php } else { ?>
                            <p>Producción</p>
                            <?php } ?>
                    </td>

                    <td>
                        <?php echo $row['ultimo_acceso']; ?>
                    </td>

                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id=" <?echo $row[ 'id'];?>"><i class="fas fa-eye"></i></a>

                            <a href="editar.php?var=<?php echo base64_encode($row[ 'id']);?>" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                        </a>
                            <a href="eliminar.php?var=<?php echo base64_encode($row[ 'id']);?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                        </a>
                        </div>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>