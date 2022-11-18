
<?php
$conn = new mysqli ("localhost","root","","comarca");




 if ($conn ->connect_errno)
 {
    echo "No hay conexion: (".$conn->connect_errno.")".$conn->connect_error;
 }

$tipoIdC = $_POST['tipoIdeC'];
$numIdC = $_POST['numIdeC'];
$nombreC = $_POST['nomC'];
$correoC = $_POST['corrCl'];
$telefonoC = $_POST['teleCl'];
$direccionC = $_POST['direCl'];
$usuarioC = $_POST['UsuCl'];
$contraseña = $_POST['contraCl'];



if (isset($_POST['registrarse'])) {

   include 'SED.php';
   $contraseñaE = SED::encryption($contraseña);

   $queryregistrar = "INSERT INTO clientes (tipoIdentificacion,numIdentificacionC,nombreCliente,correoCliente
   ,telefonoCliente, direccionCliente,contraseñaCliente,usuarioCliente) VALUES
   ('$tipoIdC','$numIdC','$nombreC','$correoC','$telefonoC',' $direccionC','$contraseñaE','$usuarioC')";

if (mysqli_query($conn,$queryregistrar))

{
   echo "<script>alert ('Usuario registrado: $usuarioC');window.location='iniciousua.php'</script>";

}
else
{
   echo "Error:".$queryregistrar."<br>".mysql_error($conn);
}

}       
                

 ?>