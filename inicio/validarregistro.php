<?php
//Registrar usuario

require '../config/conexion.php';
require '../config/funcs.php';

if(isset($_POST['registrarse'])){

 $tipoIdC = mysqli_real_escape_string($conn, $_POST ['tipoIdeC']);
 $numIdC = mysqli_real_escape_string($conn, $_POST ['numIdeC']);
 $nombreC = mysqli_real_escape_string($conn, $_POST ['nomC']);
 $correoC = mysqli_real_escape_string($conn, $_POST ['corrCl']);
 $telefonoC = mysqli_real_escape_string($conn, $_POST ['teleCl']);
 $direccionC = mysqli_real_escape_string($conn, $_POST ['direCl']);
 $usuarioC = mysqli_real_escape_string($conn, $_POST ['UsuCl']);
 $contraseña = mysqli_real_escape_string($conn, $_POST ['contraCl']);
 $contraseña2 = mysqli_real_escape_string($conn, $_POST ['contraCl2']);

 $activo = 0;
 $tipo_usuario =2;
 
 $sql_user = "SELECT idCliente, numIdentificacionC FROM clientes WHERE numIdentificacionC = '$numIdC' and tipoIdentificacion = '$tipoIdC'";
 $resultado_user = $conn->query($sql_user);
 $filas = $resultado_user -> num_rows;

if ($filas > 0){

   $errors[]= "El numero de documento $tipoIDC : $numIDC ya existe en la base de datos";
}

if (isNull($tipoIdC,$numIdC,$nombreC,$correoC,$telefonoC,$direccionC,$usuarioC,$contraseña))
   {
   $errors[]= "Todos los campos son obligatorios";
   }

if (emailExiste($correoC))
{
   $errors[]= "<El correo electronico $email ya existe";
}
if (usuarioExiste($usuarioC))
{
   
   $errors[]= "El nombre de usuario $usuarioC ya existe";
}
if(!validaPassword($contraseña, $contraseña2))
{
   $errors[]= "Las contraseñas no coinciden";
}
if ((count($errors)==0)&&($resultado_registrar > 0))
{

   
 $contraseña_cifrada = password_hash ($contraseña, PASSWORD_DEFAULT);

   $query_usuario = "INSERT INTO clientes VALUES
   ('','$tipoIdC','$numIdC','$nombreC','$correoC','$telefonoC',' $direccionC','$contraseña_cifrada','$usuarioC','','','','','','')";

$resultado_registrar = $conn->query ($query_usuario);

   echo "<script>alert('El usuario ha sido registrado: $usuarioC');window.location='iniciousua.php'</script>";
    }else{

   echo "Error: ".$query. "<br>".mysqli_error($conn);
}
}


?>