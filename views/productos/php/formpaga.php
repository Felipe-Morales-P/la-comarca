<?php session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../css/style.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../Alert/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="../Alert/sweetalert.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- ESTILO CURSOS DE PROGRAMACION -->
    <link rel="stylesheet" href="../css/style_cp.css">


    <title>Consulta basica</title>
</head>

<body>


    <style>
        .container_card {
            margin: 0 auto;
            padding: 0px 20px 20px 20px;
            display: grid;
            /* width: 800px; */
            grid-template-columns: 1fr 1fr;
            grid-gap: 1em;
            /* grid-row-gap: 60px; */
        }

        .blog-post {
            position: relative;
            margin-bottom: 15px;
            margin: 30px;
        }

        .blog-post img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        .blog-post .category {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            font-size: 14px;
            text-decoration: none;
            background-color: #e67e22;
            color: #fff;
            border-radius: 5px;
            box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
        }

        .text-content {
            position: absolute;
            bottom: -30px;
            padding: 20px;
            background-color: #fff;
            width: calc(100% - 20px);
            left: 50%;
            transform: translateX(-50%);
            border-radius: 10px;
            box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.08);
            /* padding-top: 50px; */
        }

        .text-content h2 {
            font-size: 20px;
            font-weight: 400;
            /* margin-bottom: 30px; */
        }

        .text-content img {
            height: 70px;
            width: 70px;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            position: absolute;
            top: -35px;
            left: 35px;
        }

        .tags a {
            color: #888;
            font-weight: 700;
            text-decoration: none;
            margin-right: 15px;
            transition: 0.3s ease;
        }

        .tags a:hover {
            color: #000;
        }

        @media screen and (max-width: 1100px) {
            .container_card {
                grid-template-columns: 1fr 1fr;
                grid-row-gap: 60px;
            }
        }

        @media screen and (max-width: 600px) {
            .container_card {
                grid-template-columns: 1fr;
                grid-row-gap: 60px;
            }
        }
    </style>


    <!-- NAVBAR -->
    <?php

    include("nav_cart.php");
    include("modal_cart.php");

    ?>

    <!-- vista D -->
    <div class="center mt-5">
        <div class="card pt-3">
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Tus Productos</p>
            <div class="container-fluid p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <br>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>


                        <a href="utiles.php">Atras</a>


                        <div class="container_card">

                            <?php
                            if (isset($_SESSION['carrito'])) {
                                $total = 0;
                                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                    if (isset($carrito_mio[$i])) {
                                        if ($carrito_mio[$i] != NULL) {
                            ?>

                                            <tr>
                                                <th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
                                                <td>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['cantidad'] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['titulo'] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] ?>$</td>
                                            </tr>

                            <?php
                                            $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                        }
                                    }
                                }
                            }
                            ?>

                    </tbody>
                </table>

                <!-- mas iva -->

                <li class="list-group-item d-flex justify-content-between">
                    <span style="text-align: left; color: #000000;"><strong>Total (COP)</strong></span>
                    <?php
                    if (isset($_SESSION['carrito'])) {
                        $total = 0;
                        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                            if (isset($carrito_mio[$i])) {
                                if ($carrito_mio[$i] != NULL) {
                                    $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                }
                            }
                        }
                    }
                    if (!isset($total)) {
                        $total = '0';
                    } else {
                        $total = $total;
                    }
                    echo number_format($total, 2, ',', '.');  ?> $
                </li>


            </div>
        </div>




        <hr>

        <?php
        $busqueda = mysqli_query($conex, "SELECT * FROM compra");

        ?>


        <!-- datos cliente -->
        <div class="container p-5">
            <form class="row g-3 needs-validation" action="pagar.php" method="POST" novalidate>

                
                <a href="location: envio.php"><button class="btn btn-success mb-4" type="submit" name="enviar">Registrar Productos</button></a>
            </form>
        </div>

        <?php

        if (isset($_POST['enviar'])) {
            $nombrea = $_POST['noma'];
            $apellido = $_POST['apell'];
            $tela = $_POST['tela'];
            $locali = $_POST['loca'];
            $direccr = $_POST['direca'];


            $guardar = mysqli_query($conex, "INSERT INTO compra (idCompra, nombre, apellido, telefono, localidad, direccion)  VALUES ('', '$nombrea', '$apellido', '$tela', '$locali' '$direccr')");

            if (!$guardar) {
                echo "error al registrar";
            } else {
                echo "El registro fue valido";
                header("location: envio.php");
            }
        }
        mysqli_close($conex);

        ?>



    </div>
    </div>


<!-- partial:index.partial.html -->
<!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Localizacion</h2>
    <h3 class="fs-subtitle">Localizacion</h3>
    <input type="text" name="email" placeholder="Direccion" />
    <input type="password" name="pass" placeholder="Localidad" />
    <input type="password" name="cpass" placeholder="Barrio" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Contacto</h2>
    <h3 class="fs-subtitle">Informacion para contacto</h3>
    <input type="text" name="twitter" placeholder="Gmail" />
    <input type="text" name="facebook" placeholder="Telefono" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
</form>
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
                
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="../js/script.js"></script>


    
</body>

</html>