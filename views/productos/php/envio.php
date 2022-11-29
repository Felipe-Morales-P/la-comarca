<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../img/logo.png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
    <title>Envio</title>
</head>
<body onload="showTab(current);hideMsg();">

    <div id="container" class="container">
        <form id="regForm" method="post" action="process.php">
            <ul id="progressbar">
                <li class="active" id="account">Localizacion</li>
                <li id="personal">Lugar de Entrega</li>
                <li id="contact">Datos de contacto</li>
            </ul>
            <div class="tab">
                <input type="text" name="uname" placeholder="Nombre Usuario" oninput="this.className=''">
                <input type="text" name="pass1" placeholder="Direccion" oninput="this.className=''">
                <input type="text" name="pass2" placeholder="Confirme La Direccion" oninput="this.className=''">
            </div>
            <div class="tab">
                <input type="text" name="fname" placeholder="Barrio" oninput="this.className=''">
                <input type="text" name="lname" placeholder="Localidad" oninput="this.className=''">
                <input type="date" name="dob" placeholder="Fecha de Compra" oninput="this.className=''">
            </div>
            <div class="tab">
                <input type="text" name="addr" placeholder="Nombre" oninput="this.className=''">
                <input type="email" name="email" placeholder="Correo Electronico" oninput="this.className=''">
                <input type="text" name="mob" placeholder="Telefono" oninput="this.className=''">
            </div>
            <div style="overflow: hidden;">
                <div style="float: right;">
                    <button onclick="nextPrev(-1);" type="button" id="prev">Previous</button>
                    <button onclick="nextPrev(1);" type="button" id="next">Next</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>