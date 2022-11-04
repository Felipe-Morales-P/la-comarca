<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/estilosregistro.css">
    <title>Registro Clientes</title>

    <!--aquí va la conexión a la base de datos-->
    <?php
    $conex = mysqli_connect("localhost", "root", "", "comarca");
    ?>
</head>

<body>
    <link rel="icon" href="../images/logo.png">


    <div class="cajafuera">
        <img class="portada" src="../images/IMAGES/PORTADA.png">
        <div class="formulariocaja">


            <ul>
                <li><a href="../index.html" class="Boton">INICIO</a></li>


            </ul>

            <div class="login-box">
                <h1>REGISTRO CLIENTES</h1>


                <!--Formulario para registrar-->
                
                <form method="POST" action="" class="form">

                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Direccion" name="direc" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingrese Localidad" name="loca" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Telefono" name="tele" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Barrio" name="bar" required="">
                    <br>
                    <input type="submit" class="inicioboton" name="enviar" value="Registrar">
                    <p><a class="textofinal" href="../index.html">¿Ya tienes una cuenta?</a></p>

                    <br>
                </form>




            </div>
        </div>
        <?php

        if (isset($_POST['enviar'])) {
            $dirr = $_POST['direc'];
            $local = $_POST['loca'];
            $telef = $_POST['tele'];
            $barr = $_POST['bar'];

            $guardar = mysqli_query($conex, "INSERT INTO envio (idenvio, Direccion, Localidad, Telefono, Barrio) VALUES ('', '$dirr', '$local', '$telef', '$barr')");

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
        mysqli_close($conex);
?>

</body>

</html>