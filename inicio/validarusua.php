<?php

//Validar usuario

$usuarioCliente = $_POST['usuarioCliente'];
$contraseñaCliente = $_POST['contraseñaCliente'];
$con = mysqli_connect("localhost", "root", "", "comarca") or die("ERROR DE CONEXIÓN");
$consulta = "SELECT * FROM clientes WHERE usuarioCliente= '$usuarioCliente' AND contraseñaCliente='$contraseñaCliente'";

$resultado = mysqli_query($con, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
?>
    <script>
        window.alert("Bienvenido a Papeleria La Comarca");
        window.location = "../views/productos/index.html";
    </script>

<?php
} else {
    echo "ERROR DE AUTENTIFICACIÓN";
}
mysqli_free_result($resultado);
?>