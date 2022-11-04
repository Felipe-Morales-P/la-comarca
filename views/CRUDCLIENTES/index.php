<?php
include_once("conexion.php");
?>
<html>

<head>
    <title>Crud Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <img src="img/logo.png" class="logo">
        <div id="barrabuscar">
            <form method="POST">
                <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
            </form>
            <form method="get" action="../../index.html">
                <button type="submit">INICIO
            </form>


            <form method="get" action="../CRUDPRODUCTOS/index.php">
                <button type="submit">Administrar Productos
            </form>




            <form method="POST" action="create_excel.php">
                <button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Exportar excel</button>
            </form>
        </div>
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
            <th>Acción</th>
        </tr>
        <?php

        if (isset($_POST['btnbuscar'])) {
            $buscar = $_POST['txtbuscar'];
            $queryusuarios = mysqli_query($conn, "SELECT idCliente,tipoIdentificacion,numIdentificacionC,nombreCliente,	correoCliente,telefonoCliente,direccionCliente,contraseñaCliente FROM clientes where nombreCliente like '" . $buscar . "%'");
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
            echo "<td style='width:26%'><a href=\"editar.php?idCliente=$mostrar[idCliente]\">Modificar</a> | <a href=\"eliminar.php?idCliente=$mostrar[idCliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombreCliente]?')\">Eliminar</a></td>";
        }
        ?>
    </table>
    <script>
        function abrirform() {
            document.getElementById("formregistrar").style.display = "block";

        }

        function cancelarform() {
            document.getElementById("formregistrar").style.display = "none";
        }


        <
        /html>