<?php include_once "includes/header.php";
  include "../../config/conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombreProducto']) || empty($_POST['precioVenta']) || $_POST['precioVenta'] <  0 || empty($_POST['precioCompra']) || $_POST['precioCompra'] <  0 || empty($_POST['descripcionProducto']) || $_POST['descripcionProducto'] <  0 || empty($_POST['cantidadProductos']) || $_POST['cantidadProductos'] <  0 || empty($_POST['categoriaProducto'] || $_POST['categoriaProducto'] <  0 )) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $nombreProducto = $_POST['nombreProducto'];
      $precioVenta = $_POST['precioVenta'];
      $precioCompra = $_POST['precioCompra'];
      $descripcionProducto = $_POST['descripcionProducto'];
      $cantidadProductos = $_POST['cantidadProductos'];
      $categoriaProductos = $_POST['categoriaProductos'];

      $query_insert = mysqli_query($conn, "INSERT INTO productos(nombreProducto,precioVenta,precioCompra,descripcionProducto,cantidadProductos,categoriaProducto) values ('$nombreProducto', '$precioVenta', '$precioCompra', '$descripcionProducto','$cantidadProductos','$categoriaProducto')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
     <a href="lista_productos.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
         <div class="form-group">
           <label for="producto">Nombre</label>
           <input type="text" name="txtnombreProducto" required placeholder="Ingrese nombre producto" name="producto" id="producto" class="form-control">
         </div>
         <div class="form-group">
           <label for="precio">Precio Venta</label>
           <input type="text" name="txtprecioVenta"  required placeholder="Ingrese precio venta" class="form-control" name="precio" id="precio">
         </div>

         <div class="form-group">
           <label for="precio">Precio compra</label>
           <input type="text" name="txtprecioCompra" required placeholder="Ingrese precio venta" class="form-control" name="precio" id="precio">
         </div>

         <div class="form-group">
           <label for="precio">Descripcion</label>
           <input type="text" name="txtdescripcionProducto" required placeholder="Ingrese descripcion" class="form-control" name="precio" id="precio">
         </div>

         <div class="form-group">
           <label for="cantidad">Cantidad</label>
           <input type="text" name="txtdescripcionProducto" required placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
         </div>

         <div class="form-group">
           <label for="precio">Categoria</label>
           <input type="text" name="txtcategoriaProducto" required placeholder="Ingrese descripcion" class="form-control" name="precio" id="precio">
            </div>

            <input type="submit" name="btnregistrar" value="Añadir" class="btn btn-primary" onClick="javascript: return confirm('¿Deseas añadir este producto?');" >
       </form>
     </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="JS/datatables-simple-demo.js"></script>

    <script>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>