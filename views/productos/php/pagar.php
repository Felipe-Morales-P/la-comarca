<?php  session_start();
$con = mysqli_connect("localhost", "root", "", "comarca") or die("ERROR DE CONEXIÓN");



//insertamos los datos del cliente
//creamos referencia de cliente
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref_cliente = $password;
$query = "INSERT INTO compra 
VALUES (idCompra, fechaCompra, apellido, telefono, localidad, direccion)";
$result = mysqli_query($con,$query);





//creamos referencia de pedido
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref = $password;





//insertamos el pedido

if(isset($_SESSION['carrito'])){
    $carrito_mio=$_SESSION['carrito'];
    // $_SESSION['carrito']=$carrito_mio;
    }


            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
                if($carrito_mio[$i]!=NULL){
        
                    $cantidad = $carrito_mio[$i]['cantidad'];
                    $articulo = $carrito_mio[$i]['titulo'];
                    $precio = $carrito_mio[$i]['precio'];
                    $total_precio = $precio * $cantidad;
                    $query = "INSERT INTO compra (re,nombre,apellido,telefono,localidad,direccion)
                    VALUES ('$ref', '$cantidad', '$articulo', '$precio', '$total_precio')";
                    $result = mysqli_query($con,$query); 
           
            }
            }
            }
            }


       
            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
            if($carrito_mio[$i]!=NULL){ 
            $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
            }
            }}}
            if(!isset($total)){$total = '0';}else{ $total = $total;}
            //echo $total; 







$ref_user = $ref_cliente;
$estado = 'Falta de pago';
$medio = 'Tarjeta bancaria';
$total_pedido = $total;

$query = "INSERT INTO compra (idCompra, nombre, apellido, telefono, localidad, direccion)
VALUES ('$ref', '$ref_user', '$estado', '$medio', '$total_pedido')";
$result = mysqli_query($conexion,$query);


unset( $_SESSION["carrito"] ); 

header("Location: ../Carrito de compra paso 6/index.php");



?>