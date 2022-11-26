<?php
//Registrar usuario

require '../config/conexion.php';
require '../config/funcs.php';

$errors = array();
$min = 8;
$max = 10;

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

   $errors[]= "El numero de documento $tipoIdC : $numIdC ya existe en la base de datos";
}

if (isNull($tipoIdC,$numIdC,$nombreC,$correoC,$telefonoC,$direccionC,$usuarioC,$contraseña))
   {
   $errors[]= "Todos los campos son obligatorios";
   }

if (emailExiste($correoC))
{
   $errors[]= "El correo electronico $correoC ya existe";
}
if (usuarioExiste($usuarioC))
{
   
   $errors[]= "El nombre de usuario $usuarioC ya existe";
}
if(!validaPassword($contraseña, $contraseña2))
{
   $errors[]= "Las contraseñas no coinciden";

}
if (minMax($min,$max,$contraseña))
{
   $errors[]="La contraseña debe ser de maximo 10 digitos";
}
if ((count($errors) == 0))
{ 

 $contraseña_cifrada = hashPassword($contraseña);
 $token = generateToken();

 
 $registro = registraUsuario($tipoIdC,$numIdC,$nombreC,$correoC,$telefonoC,$direccionC,$contraseña_cifrada,
 $usuarioC,$token,$activo,$tipo_usuario);




 
if(($registro > 0))
{

   $url = 'http://'.$_SERVER["SERVER_NAME"].
   '/COMARCA/la-comarca/inicio/activar.php?id='.$registro.'&val='.$token;

   $asunto = 'Activar Cuenta - Sistema de Usuarios';
   $cuerpo = "Estimado $nombreC: <br /><br /> Para continuar con el proceso de registro, es indispensable
   que de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";
   
   if(enviarEmail($correoC, $nombreC, $asunto,$cuerpo)){

      echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la 
      direccion de correo electronico: $correoC"; 
      exit;

    }else{

   $errors[]= "Error al enviar Email";
    }

}else{
   
   $errors[] = "Error al registrar";
}

}
} else { 
   
   $errors[] = "Error al comprobar la informacion";

}

echo resultBlock($errors);
?>
<?

/*
 $contraseña_cifrada = password_hash ($contraseña, PASSWORD_DEFAULT);
 $token = generateToken();

 $query = mysqli_prepare($conn, "INSERT INTO clientes (tipoIdentificacion,numIdentificacionC,
 nombreCliente,correoCliente,telefonoCliente,direccionCliente,contraseñaCliente, usuarioCliente,
 token,activacion,id_tipo) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
// ss por que son 2 string
mysqli_stmt_bind_param($query, 'sisssssssii', $tipoIdC,$numIdC,$nombreC,$correoC,$telefonoC, $direccionC,$contraseña_cifrada,
$usuarioC,$token,$activo,$tipo_usuario);

// validamos que se enviaron los campos
// esto es igual a un if else
// expresion_a_evaluar ? si_es_true : si_no_else;

$tipoIdC = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : 0;
$numIdC =  isset($_POST['numIdentificacionC']) ? $_POST['numIdentificacionC'] : 0;
$nombreC =  isset($_POST['nombreCliente']) ? $_POST['nombreCliente'] : 0;
$correoC =  isset($_POST['token']) ? $_POST['token'] : 0; 
$telefonoC =  isset($_POST['activacion']) ? $_POST['activacion'] : 0;
$direccionC =  isset($_POST['id_tipo']) ? $_POST['id_tipo'] : 0;
$contraseña =  isset($_POST['contraseñaCliente']) ? $_POST['contraseñaC'] : 0;
$usuarioC =  isset($_POST['usuarioCliente']) ? $_POST['usuarioCliente'] : 0;
$token = isset($_POST['token']) ? $_POST['token'] : 0;
$activo = isset($_POST['activacion']) ? $_POST['activacion'] : 0;
$tipo_usuario = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : 0;

// validamos que no sea alguan 0
if ( !$tipoIdC || !$numIdC || !$nombreC || !$correoC || !$telefonoC ||!$direccionC || !$usuarioC || !$contraseña || !$token || !$activo || !$tipo_usuario){
  // finalizamos la ejecucion
  die("uno o ambos parametro sin definir!");
}
// si ambos estan definidos
// continuamos con la ejecucion
mysqli_stmt_execute($query);
*/

