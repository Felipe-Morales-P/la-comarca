<?php
include("../../config/conexion.php");
session_start();
//print_r($_POST);
if (!empty($_POST)) {
  // Extraer datos del producto
  if(isset($_POST['btnbuscar']))
                    {
                        $buscar = $_POST['txtbuscar'];
                        $queryusuarios = mysqli_query($conn, "SELECT idProductos,nombreProducto,descripcionProducto,cantidadProductos,precioVenta,precioCompra,categoriaProducto FROM productos where categoriaProducto like '".$buscar."%'");
                    }
                    else
                    {
                        $queryusuarios = mysqli_query($conn, "SELECT * FROM productos ORDER BY idProductos asc");
                    }
    $result = mysqli_num_rows($query);
    if ($result > 0) {
      $data = mysqli_fetch_assoc($query);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
      exit;
    }else {
      $data = 0;
    }
  }
// Eliminar Producto
  if ($_POST['action'] == 'delProduct') {
    if (empty($_POST['producto_id']) || !is_numeric($_POST['producto_id'])) {
      echo "error";
    }else {

    $idProductos = $_REQUEST['producto_id'];
    $query_delete = mysqli_query($conexion, "UPDATE productos SET estado = 0 WHERE idProductos = $idproductos");
    mysqli_close($conexion);

  }
 echo "error";
 exit;
}
// Buscar Cliente
if ($_POST['action'] == 'searchCliente') {
  if (!empty($_POST['clientes'])) {
    $dni = $_POST['clientes'];

    $query = mysqli_query($conn, "SELECT * FROM clientes WHERE idCliente LIKE '$idCliente'");
    mysqli_close($conn);
    $result = mysqli_num_rows($query);
    $data = '';
    if ($result > 0) {
      $data = mysqli_fetch_assoc($query);
    }else {
      $data = 0;
    }
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
  }
  exit;
}

// agregar producto a detalle temporal
if ($_POST['action'] == 'addProductoDetalle') {
  if (empty($_POST['productos']) || empty($_POST['cantidad'])){
    echo 'error';
  }else {
    $codproducto = $_POST['productos'];
    $cantidad = $_POST['cantidad'];
    $token = md5($_SESSION['idUser']);
    $query_iva = mysqli_query($conexion, "SELECT igv FROM configuracion");
    $result_iva = mysqli_num_rows($query_iva);
    $query_detalle_temp = mysqli_query($conexion, "CALL add_detalle_temp ($codproducto,$cantidad,'$token')");
    $result = mysqli_num_rows($query_detalle_temp);

    $detalleTabla = '';
    $sub_total = 0;
    $iva = 0;
    $total = 0;
    $arrayData = array();
    if ($result > 0) {
        
    if ($result_iva > 0) {
      $info_iva = mysqli_fetch_assoc($query_iva);
      $iva = $info_iva['igv'];
    }
    while ($data = mysqli_fetch_assoc($query_detalle_temp)) {
      $precioTotal = round($data['cantidad'] * $data['precio_venta'], 2);
      $sub_total = round($sub_total + $precioTotal, 2);
      $total = round($total + $precioTotal, 2);

        $detalleTabla .='<tr>
            <td>'.$data['codproducto'].'</td>
            <td colspan="2">'.$data['descripcion'].'</td>
            <td class="textcenter">'.$data['cantidad'].'</td>
            <td class="textright">'.$data['precio_venta'].'</td>
            <td class="textright">'.$precioTotal.'</td>
            <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); del_product_detalle('.$data['correlativo'].');"><i class="fas fa-trash-alt"></i> Eliminar</a>
            </td>
        </tr>';
    }
    $impuesto = round($sub_total / $iva, 2);
    $tl_sniva = round($sub_total - $impuesto, 2);
    $total = round($tl_sniva + $impuesto, 2);
    $detalleTotales ='<tr>
        <td colspan="5" class="textright">Sub_Total S/.</td>
        <td class="textright">'.$impuesto.'</td>
    </tr>
    <tr>
        <td colspan="5" class="textright">Igv ('.$iva.'%)</td>
        <td class="textright">'. $tl_sniva.'</td>
    </tr>
    <tr>
        <td colspan="5" class="textright">Total S/.</td>
        <td class="textright">'.$total.'</td>
    </tr>';
    $arrayData['detalle'] = $detalleTabla;
    $arrayData['totales'] = $detalleTotales;
    echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
  }else {
    echo 'error';
  }
  mysqli_close($conexion);

  }
  exit;
}
// extrae datos del detalle tem
if ($_POST['action'] == 'searchForDetalle') {

  if (empty($_POST['user'])){
    echo 'error';
  }else {
    $token = md5($_SESSION['idUser']);

    $query = mysqli_query($conexion, "SELECT tmp.correlativo, tmp.token_user,
      tmp.cantidad, tmp.precio_venta, p.codproducto, p.descripcion
      FROM detalle_temp tmp INNER JOIN producto p ON tmp.codproducto = p.codproducto
      where token_user = '$token'");
    $result = mysqli_num_rows($query);

    $query_iva = mysqli_query($conexion, "SELECT igv FROM configuracion");
    $result_iva = mysqli_num_rows($query_iva);





// Anular Ventas
if ($_POST['action'] == 'anularVenta') {
    $data = "";
  $token = md5($_SESSION['idProductos']);
  $query_del = mysqli_query($conn, "DELETE FROM detalle_temp WHERE token_user = '$token'");
  mysqli_close($conn);
  if ($query_del) {
    echo 'ok';
  }else {
    $data = 0;
  }
  exit;
}
//procesarVenta
if ($_POST['action'] == 'procesarVenta') {
  if (empty($_POST['codcliente'])) {
    $codcliente = 1;
  }else{
    $codcliente = $_POST['codcliente'];

    $token = md5($_SESSION['idUser']);
    $usuario = $_SESSION['idUser'];
    $query = mysqli_query($conn, "SELECT * FROM detalle_temp WHERE token_user = '$token' ");
    $result = mysqli_num_rows($query);
  }

  if ($result > 0) {
    $query_procesar = mysqli_query($conn, "CALL procesar_venta($usuario,$codcliente,'$token')");
    $result_detalle = mysqli_num_rows($query_procesar);
    if ($result_detalle > 0) {
      $data = mysqli_fetch_assoc($query_procesar);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }else {
      echo "error";
    }
  }else {
    echo "error";
  }
  mysqli_close($conn);
  exit;
}

  //procesarGuia
  if ($_POST['action'] == 'procesarGuia') {
    if (empty($_POST['codcliente'])) {
      $codcliente = 1;
    } else {
      $codcliente = $_POST['codcliente'];

      $token = md5($_SESSION['idUser']);
      $usuario = $_SESSION['idUser'];
      $query = mysqli_query($conn, "SELECT * FROM detalle_temp WHERE token_user = '$token' ");
      $result = mysqli_num_rows($query);
    }

    if ($result > 0) {
      $query_procesar = mysqli_query($con, "CALL procesar_guia($usuario,$codcliente,'$token')");
      $result_detalle = mysqli_num_rows($query_procesar);
      if ($result_detalle > 0) {
        $data = mysqli_fetch_assoc($query_procesar);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
    mysqli_close($conn);
    exit;
  }
  //procesarBoleta
  if ($_POST['action'] == 'procesarBoleta') {
    if (empty($_POST['codcliente'])) {
      $codcliente = 1;
    } else {
      $codcliente = $_POST['codcliente'];

      $token = md5($_SESSION['idUser']);
      $usuario = $_SESSION['idUser'];
      $query = mysqli_query($conn, "SELECT * FROM detalle_temp WHERE token_user = '$token' ");
      $result = mysqli_num_rows($query);
    }

    if ($result > 0) {
      $query_procesar = mysqli_query($conn, "CALL procesar_boleta($usuario,$codcliente,'$token')");
      $result_detalle = mysqli_num_rows($query_procesar);
      if ($result_detalle > 0) {
        $data = mysqli_fetch_assoc($query_procesar);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
    mysqli_close($conn);
    exit;
  }

// Info factura
  if ($_POST['action'] == 'infoFactura') {
  if (!empty($_POST['nofactura'])) {
    $nofactura = $_POST['nofactura'];
    $query = mysqli_query($conn, "SELECT * FROM factura WHERE nofactura = '$nofactura' AND estado = 1");
    mysqli_close($conn);
    $result = mysqli_num_rows($query);
    if ($result > 0) {
      $data = mysqli_fetch_assoc($query);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
      exit;
    }
  }
  echo "error";
  exit;
  }
  // anular factura
  if ($_POST['action'] == 'anularFactura') {
    if (!empty($_POST['noFactura'])) {
        $data = "";
      $noFactura = $_POST['noFactura'];
      $query_anular = mysqli_query($conn, "CALL anular_factura($noFactura)");
      mysqli_close($conn);
      $result = mysqli_num_rows($query_anular);
      if ($result > 0) {
        $data = mysqli_fetch_assoc($query_anular);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit;
      }
    }
    $data = 0;
    exit;
    }
    // Cambiar contraseña
    if ($_POST['action'] == 'changePasword') {
      if (!empty($_POST['passActual']) && !empty($_POST['passNuevo'])) {
        $password = md5($_POST['passActual']);
        $newPass = md5($_POST['passNuevo']);
        $idUser = $_SESSION['idUser'];
        $code = '';
        $msg = '';
        $arrayData = array();
        $query_user = mysqli_query($conn, "SELECT * FROM administrador WHERE passAdmin = '$password' AND idAdmin = $idUser");
        $result = mysqli_num_rows($query_user);
        if ($result > 0) {
          $query_update = mysqli_query($conn, "UPDATE administrador SET passAdmin = '$newPass' where idAdmin = $idUser");
          mysqli_close($conn);
          if ($query_update) {
            $code = '00';
            $msg = "su contraseña se ha actualizado con exito";
            header("Refresh:1; URL=salir.php");
          }else {
            $code = '2';
            $msg = "No es posible actualizar su contraseña";
          }
        }else {
          $code = '1';
          $msg = "La contraseña actual es incorrecta";
        }
        $arrayData = array('cod' => $code, 'msg' => $msg);
        echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
      }else {
        echo "error";
      }
      exit;
      }
exit;
 ?>
