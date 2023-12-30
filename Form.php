<?php

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'prachi@nexmoves.in';
        $mail->Password = 'Prachi@17';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('prachi@nexmoves.in', 'Message from Linkedin');
        $mail->addAddress('prachi@nexmoves.in');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<p>Name: $name</p><p>Email: $email</p><p>Subject: $subject</p><p>Message: $message</p>";

        $mail->send();
        echo 'Message Sent';
    } catch (Exception $e) {
        echo 'Failed to send the message. Please try again.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Form not submitted';
}
?>
