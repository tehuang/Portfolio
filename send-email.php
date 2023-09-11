<?php

ini_set("display_errors","On");

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

require_once('./config.php');
$mail->Username = "teresayhhuang@gmail.com";
$mail->Password = EMAIL_PASSWORD;

$mail->setFrom("teresayhhuang@gmail.com", "Customer");
$mail->addAddress("teresayhhuang@gmail.com");
// $mail->addReplyTo($email, $name);
$mail->Body = "Sender Name:". $name ."\nSender Email: " . $email . "\nContent: " . $message ;

$mail->send();

header("Location: sent.html");