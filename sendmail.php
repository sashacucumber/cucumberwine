<?php
use PHPMailer\PHPMailer\PHPMailer
use PHPMailer\PHPMailer\Exception

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('dsasdfgfdsa@gmail.com', 'вам что-то написали');
$mail->addAddress('cucumberwine1706@gmail.com');
$mail->Subject = 'анонимное сообщение';

$body = '<h1>приветик!</h1>';

$body.='<p><strong>сообщение:</strong> '.$_POST['message'].'</p>';

$mail->Body = $body;

if(!$mail->send()) {
    $message = 'ошибка';
} else {
    $message = 'сообщение отправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>