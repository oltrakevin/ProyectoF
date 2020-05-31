<?php

$destinatario = $_POST['destinatario'];
$emailE = 'oltrakevin@gmail.com';
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$emailE."\r\n".
    'Reply-To: '.$emailE."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$mensajeCompleto = $mensaje;

mail($destinatario, $asunto,$mensajeCompleto, $headers);

echo "<script>alert('Correo enviado exitosamente')</script>";

header("Location:../email.php");
