<?php
$to = $_GET['to'];
$message = $_GET['message'];
$subject = $_GET['subject'];

$headers .= "From: CustomBB <no-reply@custombb.no-ip.org>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$mail = mail($to, $subject, $message, $headers);

header("Location: http://custombb.no-ip.org/register.php");
?>