<?php
//Registrar usuario

include("../config/conexion.php");

if(isset($_POST['registrarse'])){

 $tipoIdC = mysqli_real_escape_string($conn, $_POST ['tipoIdeC']);
 $numIdC = mysqli_real_escape_string($conn, $_POST ['numIdeC']);
 $nombreC = mysqli_real_escape_string($conn, $_POST ['nomC']);
 $correoC = mysqli_real_escape_string($conn, $_POST ['corrCl']);
 $telefonoC = mysqli_real_escape_string($conn, $_POST ['teleCl']);
 $direccionC = mysqli_real_escape_string($conn, $_POST ['direCl']);
 $usuarioC = mysqli_real_escape_string($conn, $_POST ['UsuCl']);
 $contraseña = mysqli_real_escape_string($conn, $_POST ['contraCl']);
 
 $contraseña_cifrada = password_hash ($contraseña, PASSWORD_DEFAULT);
 $sql_user = "SELECT idCliente, numIdentificacionC FROM clientes WHERE numIdentificacionC = '$numIdC' and tipoIdentificacion = '$tipoIdC'";
 $resultado_user = $conn->query($sql_user);
 $filas = $resultado_user -> num_rows;

if ($filas > 0){
   echo "<script>alert('Este usuario ya existe en la base de datos');window.location='registrousua.php'</script>";
} else {

   $query_usuario = "INSERT INTO clientes VALUES
   ('','$tipoIdC','$numIdC','$nombreC','$correoC','$telefonoC',' $direccionC','$contraseña_cifrada','$usuarioC')";

$resultado_registrar = $conn->query ($query_usuario);
if ($resultado_registrar > 0){
   echo "<script>alert('El usuario ha sido registrado: $usuarioC');window.location='iniciousua.php'</script>";
 }else{
   echo "Error: ".$query. "<br>".mysqli_error($conn);
}
}
}
?>