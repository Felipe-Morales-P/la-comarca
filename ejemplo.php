<?php

// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Inicio

 class ejemplo extends Controller{
function gmail()
{
    $data =
    [
        'title' => 'Nuevo mensaje'
    ];

    View::render('gmail',$data);
}

function post_gmail()
{
    try {

    $asunto           = clean($_POST["asunto"]);
    $contenido        = clean($_POST["contenido"]);
    $para             = clean($_POST["destinatario"]);

    if(!filter_var($para, FILTER_VALIDATE_EMAIL))
    {
        throw new Exception('Direccion de correo electronico no valida.');
    }
    $mail             =new PHPmailer();
    // Configuracion SMTP
    $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
    $mail->isSMTP();                                               // Activar envio SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Servidor SMTP
    $mail->Port       = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth   = true;                                       // Identificacion SMTP
    $email            = 'ceronarandia@gmail.com';
    $mail->Username   = $email;                 // Usuario SMTP
    $mail->Password   = 'recuerdala';	          // Contraseña SMTP
    $mail->setFrom     ($email, 'La comarca');                // Remitente del correo

    // Destinatarios
    $mail->addAddress('jjceron13@misena.edu.co', 'Jeff');  // Email y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->CharSet     = 'UTF-8';
    $mail->Subject     = 'Restablecer contraseña "Papeleria La Comarca';
    $mail->Body        = 'Para restablecer su contraseña haga click en el siguiente enlace <b>Click aqui</b>';
    $mail->AltBody     = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
    $mail->send();

    if (!$mail->send())
    {
        throw new Exception($mail->ErrorInfo);
    }

    Flasher::succes(sprintf('Mensaje enviado con exito a %S', $para));
    Redirect::back();

    }catch(Exception $e)
    {
        Flasher::error($e->getMessage());
        Redirect::back();
    }
    

}
}
