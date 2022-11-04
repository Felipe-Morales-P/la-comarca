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

                    <select class="cajaentradatexto" name="tipoIdeC" value="" placeholder="Tipo identificación">
                        <option value="controls">Tipo de Documento</option>
                        <option value="controls">Cedula de Ciudadania</option>
                        <option value="controls">Cedula de Extrajeria </option>
                        <option value="controls">Pasaporte</option>
                        <option value="controls">Tarjeta de identidad</option>
                    </select>

                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Numero de Documento" name="numIdeC" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Nombre" name="nomC" required="">
                    <input type="email" class="cajaentradatexto" placeholder="&#128273 Ingresar Correo" name="corrCl" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Telefono" name="teleCl" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Dirección" name="direCl" required="">
                    <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar Usuario" name="UsuCl" required="">
                    <input type="password" class="cajaentradatexto" placeholder="&#128274 Ingresar contraseña" name="contraCl" required="">

                    <br>
                    <input type="submit" class="inicioboton" name="enviar" value="Registrar">


                    <p><a class="textofinal" href="iniciousua.php">¿Ya tienes una cuenta?</a></p>

                    <br>
                </form>




            </div>
        </div>
        <?php

        if (isset($_POST['enviar'])) {
            $tipoIdC = $_POST['tipoIdeC'];
            $numIdC = $_POST['numIdeC'];
            $nombreC = $_POST['nomC'];
            $correoC = $_POST['corrCl'];
            $telefonoC = $_POST['teleCl'];
            $direccionC = $_POST['direCl'];
            $contraseña_fuerte = password_hash ($contraCL,PASSWORD_BCRYPT);
            $usuarioC = $_POST['UsuCl'];

            if (isset ($_POST["btnregistrar"]))

            $guardar = mysqli_query($conex, "INSERT INTO clientes (tipoIdentificacion, numIdentificacionC, nombreCliente, correoCliente, telefonoCliente, direccionCliente, contraseñaCliente, usuarioCliente) VALUES ( '$tipoIdC', '$numIdC','$nombreC', '$correoC', '$telefonoC', '$direccionC', '$contraseña_fuerte', '$usuarioC')");

            if (!$guardar) {

                echo "Error: ".$queryregistrar."<br>".mysql_error($conn);
            } else {
        ?>
                <script>
                    window.alert("Sus datos han sido registrados,Bienvenido!");
                    window.location = "iniciousua.php";
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