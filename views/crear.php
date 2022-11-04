<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Producto</title>
    <link rel="stylesheet" href="../assets/estilosregistro.css">

    <?php
       $conex = mysqli_connect("localhost","root","","Comarca");
    ?>

  </head>
  <body> 
    <form method="POST" action="" class="form">
    <section class="form-login">
      <h5>Agregar Producto</h5><br> <br><br><br>
      <input class="controls" type="text" name="nombreP" value="" placeholder="Nombre Producto">
      <input class="controls" type="text" name="descrpP" value="" placeholder="Descripción de Producto">      
      <input class="controls" type="text" name="cantidadP" value="" placeholder="Cantidad de Productos">
      <input class="controls" type="text" name="precioV" value="" placeholder="Precio de Venta">
      <input class="controls" type="text" name="precioC" value="" placeholder="Precio de Compra">
      <input class="buttons" type="submit" name="enviar" value="Ingresar"> <br> <br><br>
      <a class="buttons" href="crud.php">Volver</a>
    </section>
</form>

<?php  

if (isset($_POST['enviar'])){
    $nombreP=$_POST['nombreP'];
    $descripP=$_POST['descrpP'];
    $cantpP=$_POST['cantidadP'];
    $precioV=$_POST['precioV'];
    $precioC=$_POST['precioC'];

    $guardar = mysqli_query ($conex,"INSERT INTO productos (nombreProducto, descripcionProducto, cantidadProductos, precioVenta, precioCompra) VALUES ( '$nombreP', '$descripP','$cantpP', '$precioV', '$precioC')");
                          
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