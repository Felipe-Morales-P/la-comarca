<?php
//VALIDAR USUARIO


include("../config/conexion.php");



$errors = array();

$usuarioC = $_POST['usuarioCl']; 
$contraseñaC = $_POST['contraCl'];


$consul = mysqli_query($conn,"SELECT * FROM clientes WHERE correoCliente = '$usuarioC'");
$data = mysqli_fetch_array($consul);


 if (isset($_POST['login'])) {


    $query_login = "SELECT * FROM clientes WHERE correoCliente = '$usuarioC'";
    $resultado = mysqli_query($conn, $query_login);
    $nr = mysqli_num_rows($resultado);

    $buscar_pass = mysqli_fetch_array($resultado);
  
    

    if(($nr == 1) && (password_verify($contraseñaC,$buscar_pass ['contraseñaCliente']))){

        session_start();
		$_SESSION['correoCliente']=$usuarioC;
        header("Location: ../views/productos/index.php");

    }else{

        echo "<script>alert('El usuario o la contraseña es incorrecto');window.location='iniciousua.php'</script>";
    }

    }
?>
