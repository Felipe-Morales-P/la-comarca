<?php

include('../config/conexion.php');

$nombre = $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];
$nom	= $_POST["txtnomClient"];
$tipoid = $_POST["txttipoIdent"];
$id 	= $_POST["txtnumIdent"];
$email  = $_POST["txtemail"];
$tel 	= $_POST["txttel"];
$dir 	= $_POST["txtdir"];

//Para iniciar sesión
if(isset($_POST["btnloginx"]))
{

$queryusuario = mysqli_query($conn,"SELECT * FROM clientes WHERE usuarioCliente = '$nombre'");
$nr 		= mysqli_num_rows($queryusuario); 
$mostrar	= mysqli_fetch_array($queryusuario); 

if (($nr == 1) && (password_verify($pass,$mostrar['contraseñaCliente'])) )
	{ 
		session_start();
		$_SESSION['nombredelusuario']=$nombre;
		header("Location: ../views/productos/index.php");
	}

else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'index.html' </script>";
	}
}

if (isset($_POST["btnloginadmin"]))
{
	{ 
		session_start();
		$_SESSION['nombredelusuario']=$nombre;
		header("Location:../VIEWS/CRUDCLIENTES/index.php");
	}
}






//Para registrar

if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM clientes WHERE usuarioCliente = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

if ($nr == 0)
{

	$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
	$queryregistrar = "INSERT INTO clientes(usuarioCliente, contraseñaCliente, nombreCliente,  tipoIdentificacion, numIdentificacionC, correoCliente, telefonoCliente , direccionCliente) values ('$nombre','$pass_fuerte','$nom','$tipoid','$id','$email','$tel','$dir')";
	

if(mysqli_query($conn,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $nombre');window.location= 'index.html' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysql_error($conn);
}

}else
{
		echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'index.html' </script>";
}


} 
/*VaidrollTeam*/
?>