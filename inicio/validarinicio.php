<?php

 //Validar usuario y registrar
 $conn = new mysqli ("localhost","root","","comarca");




 if ($conn ->connect_errno)
 {
    echo "No hay conexion: (".$conn->connect_errno.")".$conn->connect_error;
 }

 
 $usuarioC = $_POST['UsuCl'];
 $pass = $_POST['contraCl'];


 if (isset($_POST['login'])) {

        


    $queryusuario    = mysqli_query($conn, "SELECT * FROM clientes WHERE usuarioCliente = '$usuarioC'");
    $nr              = mysqli_num_rows($queryusuario);
    $buscarpass      = mysqli_fetch_array($queryusuario);


    if (($nr == 1) && (password_verify($pass, $buscarpass['contraseñaCliente']))) {
    
        {
            echo "<script>alert (Bienvenido: $usuarioC');window.location='../views/PRODUCTOS/index.html'</script>";
        }

    } else {
        echo "ERROR DE AUTENTIFICACIÓN";
    }
 }
?>

