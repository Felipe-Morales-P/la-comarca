
<?php
    include ('conexioon.php');
?>

<head>
    <title>Agregar Producto</title>
    <link rel="shortcut icon" href="../archivos/images/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../archivos/css/estilosedit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <form action="agregarproducto.php" method="POST" class="formulario">
    <h1>Agregar Producto</h1>
    <div class="contenedor">
        <input type="text" placeholder="Producto" name="producto"><br/><br/>
        <input type="text" placeholder="Precio" name="precio"><br/><br/>
        <input type="text" placeholder="Descripcion" name="descripcion"><br/><br/>
        <input type="text" placeholder="Imagen" name="imagen"><br/><br/>
        <input class="btn btn-success" type="submit" name="Agregar" value="Agregar" href="agregarproducto.php">
        <a class="btn btn-primary" href="caarroo.php">Regresar</a>
    </div>
    </form>

</body>

<?php
    if (isset($_POST["Agregar"])){

    
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $imagen=$_POST['imagen'];
    $query = "INSERT INTO productos(producto, precio, descripcion, imagen) 
              VALUES('$producto','$precio','$descripcion','$imagen')";

    
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Producto Almacenado Exitosamente");
                window.location = "productos.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Intentalo De Nuevo, Producto No Almacenado");
                window.location = "agregar.php";
            </script>
        ';
    }
    }
?>