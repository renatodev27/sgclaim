<?php 

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

try {
    // Intentar crear una nueva instancia de la clase PHPMailer
    $mail = new PHPMailer (true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'renatoramos.devops@gmail.com';
    $mail->Password = 'dgvk akmp isdl xrlw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('renatoramos.devops@gmail.com', 'Renato');
    $mail->addAddress('rantopthetop93@gmail.com', 'Renato 2');

    $mail->isHTML(true);

    $mail->Subject = 'Php Mailer TEST';
    $mail->Body = "<h4>Message Title </h4> $message";

    if (!$mail->send()) {
        echo 'Email not sended an error ocurred: ' . $mail->ErrorInfo;
    }
    else {
        echo 'Message sended';
    }

    echo 'NAME:' . $name . '<br>';
    echo 'PHONE: ' . $phone . '<br>';
    echo 'EMAIL: ' . $email . '<br>';
    echo 'MESSAGE: ' . $message . '<br>';
} catch (Exception $e) {
        echo "Mailer Error: ".$mail->ErrorInfo;
}
