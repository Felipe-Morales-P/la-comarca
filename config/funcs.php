<?php

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

function isNull ($nombreC, $usuarioC, $contraseña, $contraseña2, $correoC)
{
    if(strlen(trim($nombreC)) < 1|| strlen(trim($usuarioC)) < 1 || strlen(trim(
        $contraseña)) < 1 || strlen (trim($contraseña2)) < 1 || strlen(trim($correoC)) < 1) 
        {
            return true;
            } else {
            return false;
            
        } 
    } 





function isEmail ($correoC)
{

    if (filter_var($correoC,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
    return false;
    }
}


function validaPassword($var1, $var2)
{
    if(strcmp($var1, $var2) !== 0){
        return false;
    } else {
    return true;
    }
        
}

function minMax ($min, $max, $valor){
    if(strlen (trim($valor)) < $min)
    {
        return true;
    }
    else if(strlen(trim($valor)) > $max)
    {
        return true;
    }
    else
    {
        return false;
    }

}

function usuarioExiste($usuarioC)
{
    global $conn;

    $stmt = $conn->prepare("SELECT idCliente FROM clientes WHERE usuarioCliente = ? LIMIT 1");
    $stmt->bind_param("s", $usuarioC);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt-> close();

    if ($num > 0)
    {
        return true;    
    } else {
    return false;
    }
}


function emailExiste($correoC)
{
    global $conn;

    $stmt = $conn->prepare("SELECT idCliente FROM clientes WHERE correoCliente = ? LIMIT 1");
    $stmt->bind_param("s", $correoC);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt-> close();

    if ($num > 0)
    {
        return true;    
    } else {
    return false;
    }
}



function generateToken()
{
    $gen = md5(uniqid(mt_rand(),false));
    return $gen;
}




function generarTokenPass($user_id)
{
    global $conn; 

    $token= generateToken();

    $stmt = $conn->prepare("UPDATE clientes SET token_password=?,
    password_request=1 WHERE idCliente= ?");
    $stmt->bind_param('ss',$token,$user_id);
    $stmt->execute();
    $stmt->close();

    return $token;
}

function enviarEmail($correoC, $nombreC, $asunto,$cuerpo){
    
    
    
    //Load Composer's autoloader
    require '../contrasena/Exception.php';
    require '../contrasena/PHPMailer.php';
    require '../contrasena/SMTP.php';


    $mail =new PHPMailer();


   
        //Server settings
        $mail->isSMTP();                                       //Send using SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lacomarca@zohomail.com';                     //SMTP username
        $mail->Password   = 'comarca123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('lacomarca@zohomail.com', 'Papeleria La Comarca');
        $mail->addAddress('$correoC', '$nombreC');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = '$asunto';
        $mail->Body    = '$cuerpo';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        if($mail->send())
        return true;
        else
        return false;
    
}


function getValor ($campo, $campoWhere, $valor)
{
    global $conn;

    $stmt = $conn->prepare ("SELECT $campo FROM clientes WHERE $campoWhere = ? LIMIT 1");
    $stmt->bind_param ('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0)
    {
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    }
}

function hashPassword($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function registraUsuario($tipoIdC,$numIdC,$nombreC,$correoC,$telefonoC,$direccionC,$contraseña_cifrada,
$usuarioC,$token,$activo,$tipo_usuario){

    global $conn;


$stmt = $conn->prepare ("INSERT INTO clientes (tipoIdentificacion,numIdentificacionC,
nombreCliente,correoCliente,telefonoCliente,direccionCliente,contraseñaCliente usuarioCliente,
token,activacion,id_tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt -> bind_param ('$tipoIdC','$numIdC','$nombreC','$correoC','$telefonoC',' $direccionC','$contraseña_cifrada',
'$usuarioC','$token','$activo','$tipo_usuario');

if ($stmt->execute()){
    return $conn->insert_id;
}else{
    return 0;
}
}





function resultBlock ($errors){
    if(count($errors)>0)
    {
        echo "<div id='error' class='alert alert-danger' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a><ul>";
        foreach($errors as $error)
        {
            echo"<li>".$error."</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}




?>
