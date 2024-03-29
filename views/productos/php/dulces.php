<?php  session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" href="../img/logo.png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../Alert/sweetalert-dev.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
<title>DULCES</title>
</head>
<body>


<style>
    li {list-style: none;}
a { text-decoration: none;}
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr 1fr;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
.blog-post img{    width: 100%;    height: 400px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #FF0000;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #F7DC6F;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>


<!-- NAVBAR -->
<?php 

include("nav_cart.php"); 
include("modal_cart.php");

?>

<li><a class="INICIO" href="../index.php">Categorias</a></li>
<LI> <a class="INICIO" href="logout.php">Cerrar Sesión</a></LI>




<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;"> DULCES</p>
        <div class="container-fluid p-2" style="background-color: FCF3CF;">

            <?php $busqueda=mysqli_query($conex,"SELECT * FROM productos WHERE categoriaProducto='dulce' "); 
            $numero = mysqli_num_rows($busqueda); ?>

            <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
            <div class="container_card">
              
              <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ 
            
                    ?>

                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <div class="blog-post ">
                            <img src="../img/dulces/<?php echo $resultado["img"]; ?>" >
                            <a class="category">
                                <?php echo $resultado["precioVenta"]; ?>$
                            </a>
                                <div class="text-content">
                                    <input name="ref" type="hidden" id="ref" value="<?php echo $resultado["img"]; ?>" />                           
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $resultado["precioVenta"]; ?>" />
                                    <input name="titulo" type="hidden" id="titulo" value="<?php echo $resultado["nombreProducto"]; ?>" />
                                    <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                                        <div class="card-body">
                                                <h5 class="card-title"><?php echo $resultado["nombreProducto"]; ?></h5>
                                                <p><?php echo $resultado["descripcionProducto"]; ?></p>
                                                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                        </div>
                                </div>
                        </div>
                    </form>
                    <?php } ?>
            </div>
        </div>
    </div>
                
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>