<?php
$conn = mysqli_connect("localhost","root","","comarca");
$nomad=$_POST['nomaper'];
$conad=$_POST['contraper'];
session_start();

$consulta ="SELECT *FROM administrador where nomaper ='$nomad' and contraper ='$conad'";
   $resultado=mysqli_query($conn, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
   header ("location: ../views/CRUDCLIENTES/index.php");

}else{
?>

  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conn)
?>