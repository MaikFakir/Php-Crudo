<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

//atelatoriedad
$codigo=rand(100000,999999);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   =                     //SMTP username
    $mail->Password   =                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('senapruebas18@gmai.com', 'Pruebas');
    $mail->addAddress($correo,$nombre);     //Add a recipient

    //Content


    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Prueba Correo';
    $mail->Body    = " Bienvenid@ " .$nombre. " te has registrado con el correo: ".$correo."\n
    Tu codigo de Verificacion es <b>".$codigo."</b>"."tambien puedes verificar tu cuenta en el siguiente link <a href='localhost/Login/verificar.php?correo=".$correo."&codigo=".$codigo."'>Hola</a>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode('exito');
} catch (Exception $e) {
    echo json_encode('error');
}
?>