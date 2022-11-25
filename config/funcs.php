<?php


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





function isEmail ($email)
{

    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
    return false;
    }
}




function emailExiste($email)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT idClientes FROM clientes WHERE correoCliente = ? LIMIT 1");
    $stmt->bind_param("s", $email);
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

function generarTokenPass($user_id)
{
    global $mysql;

    $token= generateToken();

    $stmt = $mysqli->prepare("UPDATE clientes SET token_password=?,
    password_request=1 WHERE idCliente= ?");
    $stmt->bind_param('ss',$token,$user_id);
    $stmt->execute();
    $stmt->close();

    return $token;
}




function getValor ($campo, $campoWhere, $valor)
{
    global $mysqli;

    $stmt = $ $mysqli->prepare ("SELECT $campo FROM clientes WHERE $campoWhere = ? LIMIT 1");
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


function generarToken()
{
    $gen = md5(uniqid(mt_rand(),false));
    return $gen;
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


function enviarEmail ($email, $nombre, $asunto, $cuerpo)
{

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTPr.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPmailer();
    $mail->issSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tipo de seguridad';
    $mail->Host = 'smtp.hostinng.com';
    $mail->Port = 'puerto';

    $mail->Username ='miemail@dominio.com';
    $mail->Password = 'password';

    $mail->setFrom('miemail@dominio.com','Sistema de Usuarios');
    $mail->addAddres($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->IsHTML(true);

    if($mail->send())
    return true;
    else
    return false;
}

?>
