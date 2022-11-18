<?php

 //Validar usuario y registrar
 include 'conexion.php';
 include 'SED.php';



 if ($conn ->connect_errno)
 {
    echo "No hay conexion: (".$conn->connect_errno.")".$conn->connect_error;
 }

 
 $usuarioC = $_POST['UsuCl'];
 $contraseña = $_POST['contraCl'];


 if (isset($_POST['login'])) {

    $query_buscar_usuario =mysqli_query ("SELECT * FROM clientes WHERE usuarioCliente=='$usuarioC'");
    $nr                   =mysqli_num_rows($query_buscar_usuario);
    $buscar_pass_usuario  =mysqli_fetch_array($query_buscar_usuario);
 

    if (($nr==1)&&($buscar_pass_usuario=SED::decryption($contraseña)))
    {
        if($contraseña==$contraseñaD){

            echo "<script>alert (Bienvenido: $usuarioC');window.location='../views/PRODUCTOS/index.html'</script>";
        }

    } else 
    {
        echo "ERROR DE AUTENTIFICACIÓN";
    }
}
?>

