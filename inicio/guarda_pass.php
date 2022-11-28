<?php


require '../config/conexion.php';
require '../config/funcs.php';

$user_id = $conn ->real_escape_string($_POST['user_id']);
$token = $conn ->real_escape_string($_POST['token']);
$contraseña = $conn ->real_escape_string($_POST['contraCl']);
$con_password = $conn ->real_escape_string($_POST['con_contraCl']);


if(validaPassword($contraseña, $con_password))
{
    $pass_hash = hashPassword($contraseña);

    if(cambiaPassword($pass_hash, $user_id,$token))
    {
        echo "Password modificado";
        echo "<br> <a href='iniciousua.php'>Iniciar Sesion</a>";

    } else {
        $errors[] = "Ha ocurrido un error al modificar el pasword";
    }
} else {
    echo 'Las contraseñas no coinciden';


}

?>