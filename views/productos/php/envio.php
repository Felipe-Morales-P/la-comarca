<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro envio</title>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="../css/style.css" rel="stylesheet" >

    <!--aquí va la conexión a la base de datos-->
    <?php
    $conex = mysqli_connect("localhost", "root", "", "comarca");
    ?>
</head>

<body>
    <link rel="icon" href="../images/logo.png">


    <form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Localizacion</li>
    <li>Contacto</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Localizacion</h2>
    <h3 class="fs-subtitle">Datos para entrega</h3>
    <input type="text" name="direc" placeholder="Direccion" required="">
    <input type="text" name="loca" placeholder="Localidad" required="">
    <input type="text" name="bar" placeholder="Barrio" required="">
    <input type="button" name="next" class="next action-button" value="siguiente" >
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Contacto</h2>
    <h3 class="fs-subtitle">Informacion para contacto</h3>
    <input type="email" name="gmail" placeholder="Gmail" required="">
    <input type="text" name="tele" placeholder="Telefono" required="">
    <input type="button" name="previous" class="previous action-button" value="anterior" >
    <input type="button" name="enviar" class="next action-button" value="Enviar" 2>
  </fieldset>
</form>
<?php
if (isset($_POST['enviar'])) {
    $dirr = $_POST['direc'];
    $local = $_POST['loca'];
    $barr = $_POST['bar'];
    $cor= $_POST['gmail'];
    $telef = $_POST['tele'];


    $guardar = mysqli_query($conex, "INSERT INTO envio (idenvio, Direccion, Localidad, Barrio, correo, telefonno) VALUES ('', '$dirr', '$local', '$barr', '$cor', '$telef')");

    if (!$guardar) {

        echo "error al registrar";
    } else {
?>
        <script>
            window.alert("Sus datos han sido registrados,Bienvenido!");
            window.location = "../index.html";
        </script>
</body>

</script>
<?php

    }
}
?>
                
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="../js/script.js"></script>
</body>

</html>