<?php
    
    require '../contrasena/correo.php';


function isNull ($nombre, $user, $pass, $pass_con, $email)
{
    if(strlen(trim($nombre)) < 1|| strlen(trim($user)) < 1 || strlen(trim(
        $pass)) < 1 || strlen (trim($pass_con)) < 1 || strlen(trim($email)) < 1) 
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

function enviarEmail($email, $nombre, $asunto,$cuerpo){


    $mail = new PHPMailer();
    

   
        //Server settings
        
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lacomarca@zohomail.com';                     //SMTP username
        $mail->Password   = 'comarca123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('lacomarca@zohomail.com', 'Prueba');
        $mail->addAddress('$email');     //Add a recipient
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
    
        $mail->send();
        
     
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
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
