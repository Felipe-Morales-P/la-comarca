<?php
//VALIDAR USUARIO


include("../config/conexion.php");
include("../config/funcs.php");


$errors = array();


 if (isset($_POST['login'])) {


    $usuarioC = $conn-> real_escape_string($_POST['usuarioCl']);
    $contraseñaC = $conn-> real_escape_string($_POST['contraCl']);

    if((strlen(trim($usuarioC))) <1 || strlen (trim($contraseñaC)) <1)
    {
        $errors [] = "Debe llenar todos los campos";
    }

    $errors[]= login ($usuarioC,$contraseñaC);
}

echo resultBlock($errors); 
?>
