<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrate!</title>
    <link rel="stylesheet" href="\PAPELERIALACOMARCA\assets\estilosregistro.css">
     <?php
       $conex = mysqli_connect("localhost","root","","comarca");
    ?>

  </head>
  <body> 
    <form method="POST" action="" class="form">
    <section class="form-login">
      <h5>Registro</h5>
      <select class="controls" type="text" name="tipoIdeA" value="" placeholder="Tipo identificación">
        <option class="controls" >Tipo de documento</option>
        <option class="controls" >CC</option>
        <option class="controls" >CE</option>
        <option class="controls" >PS</option>
      </select>
      <input class="controls" type="text" name="numIdeA" value="" placeholder="Número de identificación">
      <input class="controls" type="text" name="nomA" value="" placeholder="Nombre ">      
      <input class="controls" type="email" name="corrAd" value="" placeholder="Correo">
      <input class="controls" type="tel" name="teleAd" value="" placeholder="Telefono">
      <input class="controls" type="text" name="direAdm" value="" placeholder="Dirección">
      <input class="controls" type="password" name="contraAd" value="" placeholder="Contraseña">
      <input class="buttons" type="submit" name="enviar" value="Ingresar">



    </section>
</form>

<?php  

if (isset($_POST['enviar'])){
    $tipoIdA=$_POST['tipoIdeA'];
    $numIdA=$_POST['numIdeA'];
    $nombreAdmin=$_POST['nomA'];
    $correoAdmin=$_POST['corrAd'];
    $telefonoAdmin=$_POST['teleAd'];
    $direccionAdmin=$_POST['direAdm'];
    $contrasenaAdmin=$_POST['contraAd'];

    $guardar = mysqli_query ($conex,"INSERT INTO administrador (tipoIdentificacionA, numIdentificacionA, nombreAdmin, correoAdmin, telefonoAdmin, direccionAdmin, contraseñaAdmin) VALUES ( '$tipoIdA', '$numIdA','$nombreAdmin', '$correoAdmin', '$telefonoAdmin', '$direccionAdmin', '$contrasenaAdmin')");
                          
    if (!$guardar) {
    echo "error al registrar";
    } else  {
    echo "Los datos se guardaron con éxito";
        }
        }
    mysqli_close($conex);

 ?>
  </body>
</html>