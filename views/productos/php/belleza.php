<?php  session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../Alert/sweetalert-dev.js"></script>

<!-- Font Awesome -->

 <!-- ESTILO CURSOS DE PROGRAMACION -->
<title>UTILES ESCOLARES</title>
</head>
<body>
<style>
.container_card{    margin: 0 auto;    padding:  0px 20px;   display: grid;  /* width: 800px; */    grid-template-columns: 1fr 1fr ; grid-gap:1em      /* grid-row-gap: 60px; */ }

.blog-post{    position: relative;   margin-bottom: 15px;   margin: 80px;}
.blog-post img{   width: 90%;   height: 390px;   object-fit: cover;   border-radius: 10px;    }
.blog-post .category{    position: absolute;   top: 15px;    left: 20px;  padding: 10px 15px;font-size: 14px;  text-decoration: none; background-color: #e67e22;   color: #fff;  border-radius: 5px;  box-shadow: 1px 1px 8px rgba(0,0,0,0.1); text-transform: uppercase; }

.text-content{    position: absolute;   bottom: -30px;   padding: 20px;   background-color: #D6EAF8; width: calc(100% - 20px); left: 50%; transform: translateX(-50%);  border-radius: 10px;  box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{   font-size: 20px;  font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px; width: 70px;  border: 5px solid rgba(0,0,0,0.1);   border-radius: 50%;    position: absolute;   top: -35px; left: 35px;}

.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}

@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}

.pie-pagina {   width: 100%;  background-color: #0a141d;    color: #ffffff;}
.pie-pagina .contenedor-2 { background-color: #0d2237;  padding: 15px 10px; text-align: center; color: #fff;}
.pie-pagina .contenedor-2 small { font-size: 18px;}
</style>

<?php 

include("nav_cart.php"); 
include("modal_cart.php");

?>




<a href="../index.html">Categorias</a>


<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Utiles Escolares</p>
        <div class="container-fluid p-2" style="background-color: #F5EEF8;">

            <?php $busqueda=mysqli_query($conex,"SELECT * FROM productos WHERE categoriaProducto='belleza' "); 
            $numero = mysqli_num_rows($busqueda); ?>

            <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
            <div class="container_card">
              
              <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ 
            
                    ?>

                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <div class="blog-post ">
                            <img src="../img/belleza/<?php echo $resultado["img"];?>" >
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

<footer class="pie-pagina">
                <div class="contenedor-2">
                    <small>&copy; 2022 <b>Papeleria La Comarca</b> - Todos los Derechos Reservados.</small>
                </div>
        </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>