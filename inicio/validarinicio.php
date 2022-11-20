<?php

//Validar usuario

include("../config/conexion.php");

$correoC = $_POST['correoCl'];
$contraseñaC = $_POST['contraCl'];


if (isset($_POST['login'])) {


    $query_login = mysqli_query ($conn,"SELECT * FROM clientes WHERE correoCliente = '$correoC'");
    $nr = mysqli_num_rows($query_login);
    $buscar_pass = mysqli_fetch_array($query_login);

    if(($nr == 1) && (password_verify($contraseñaC,$buscar_pass ['contraseñaCliente']))){

        header("Location: ../views/productos/index.php");
    }else{

        echo "<script>alert('El usuario o la contraseña es incorrecto');window.location='iniciousua.php'</script>";
    }

    }
?>
