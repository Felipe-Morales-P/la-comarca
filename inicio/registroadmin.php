<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../assets/CSS/login.css">
	<title>Registro Administrador</title>

    <!--<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
	
	   <!--aquí va la conexión a la base de datos-->
    <?php
       $conn = mysqli_connect("localhost","root","","comarca");
    ?>
</head>
<body>
    <link rel="icon" href="../images/logo.png">


 <div class="cajafuera">
    <div class="formulariocaja">                
      <h1 style="padding-left: 50px;">REGISTRO ADMINISTRADOR</h1>
      <form id="frmlogin" class="grupo-entradas" method="POST" action="">
      <select class="cajaentradatexto" name="tipoa" size="1">
            <option>Tipo de Documento</option>
            <option value="CC">Cedula de Ciudadania</option>
            <option value="CE">Cedula de Extrajeria </option>
            <option value="PAS">Pasaporte</option>
        </select>
      <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Numero de Documento" name="numda" required="">
      <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Nombre" name="noma" required="">
      <input type="email" class="cajaentradatexto" placeholder="&#128273 Ingresar Correo" name="email" required="">
      <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Telefono" name="tela" required="">
      <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Dirección" name="direca" required="">
      <input type="password" class="cajaentradatexto" placeholder="&#128274 Ingresar contraseña" name="passa" required="">
      <br><br><br><br><br><br><br><br><br><br><br><P>
      <a href="inicioadmin.php"><button type="submit" class="botonenviar" name="enviar">Registrar</button></a>
    </form>      
  </div>
</div>


<?php  

if (isset($_POST['enviar'])){
    $tipodoc=$_POST['tipoa'];
    $nume=$_POST['numda'];
    $nombrea=$_POST['noma'];
    $correo=$_POST['email'];
    $tela=$_POST['tela'];
    $direcc=$_POST['direca'];
    $contraad=$_POST['passa'];
              
    $guardar = mysqli_query($conn,"INSERT INTO administrador (idAdmin, tipoIdentificacionA, numIdentificacionA, nombreAdmin, correoAdmin, telefonoAdmin direccionAdmin, passAdmin) 
    VALUES ('', '$tipodoc', '$nume', '$nombrea', '$correo', '$tela', '$direcc', '$contraad')");
                          
    if (!$guardar) {
    echo "error al registrar";
    } else  {
    echo "Los datos se guardaron con éxito";
        }
        }
    mysqli_close($conn);

 ?>
</body>
</html>