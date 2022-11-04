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
      <select class="controls" type="text" name="tipoIdeC" value="" placeholder="Tipo identificación">
        <option class="controls" >Tipo de documento</option>
        <option class="controls" >CC</option>
        <option class="controls" >CE</option>
        <option class="controls" >PS</option>
      </select>
      <input class="controls" type="text" name="numIdeC" value="" placeholder="Número de identificación">
      <input class="controls" type="text" name="nomC" value="" placeholder="Nombre ">      
      <input class="controls" type="email" name="corrCl" value="" placeholder="Correo">
      <input class="controls" type="tel" name="teleCl" value="" placeholder="Telefono">
      <input class="controls" type="text" name="direCl" value="" placeholder="Dirección">
      <input class="controls" type="password" name="contraCl" value="" placeholder="Contraseña">
      <input class="buttons" type="submit" name="enviar" value="Ingresar">
    </section>
</form>

<?php  

if (isset($_POST['enviar'])){
    $tipoIdC=$_POST['tipoIdeC'];
    $numIdC=$_POST['numIdeC'];
    $nombreC=$_POST['nomC'];
    $correoC=$_POST['corrCl'];
    $telefonoC=$_POST['teleCl'];
    $direccionC=$_POST['direCl'];
    $contrasenaC=$_POST['contraCl'];

    $guardar = mysqli_query ($conex,"INSERT INTO clientes (tipoIdentificacion, numIdentificacionC, nombreCliente, correoCliente, telefonoCliente, direccionCliente, contraseñaCliente) VALUES ( '$tipoIdC', '$numIdC','$nombreC', '$correoC', '$telefonoC', '$direccionC', '$contrasenaC')");
                          
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