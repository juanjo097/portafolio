<?php

$recipient = 'rodriguez.rangel97@gmail.com';
$name = '';
$subject = '';
$email = '';
$correo = '';
$message = '';


if(isset($_POST['name'])) 
{
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}

if(isset($_POST['subject'])) 
{
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
}

if(isset($_POST['email'])) 
{
    $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
}

if(isset($_POST['message'])) 
{
    $subject = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
}

print_r($name);
print_r($subject);
print_r($email);

$dest = "rodriguez.rangel97@gmail.com"; //Email de destino
//Cabeceras del correo para que no llegue a spam
$headers = "From: $name <$email>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

try {
    if(mail($dest,$subject,$message,$headers))
    {  
        $result = '<div>Email enviado correctamente</div>';	
        print_r($result);
        $_POST['name'] = '';
        $_POST['subject'] = '';
        $_POST['email'] = '';
        $_POST['message'] = '';
    }
    else{
        $result = '<div>Hubo un error al enviar el mensaje</div>';
        print_r($result);
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}



?>