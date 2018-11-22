<?php


include '../controlador/conBD.php';
include '../modelo/Noticia.php';
include '../modelo/Usuario.php';
include '../vista/pluging/PHPMailer/PHPMailerAutoload.php';
session_start();
$p = $_POST;
$s = $_SESSION;
$user = NULL;
$conn = NULL;
if (isset($s['usuario']))
    $user = unserialize($s['usuario']);
if (isset($s['conexionBD']))
    $conn = $s['conexionBD'];
else
    $conn = conBD::conectar();
$destinatario = "elpatiofilosofico@gmail.com"; 
$asunto = "Contactenos - El patio filosofico"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Mensaje atraves de contactenos de EL PATIO FILOSOFICO</title> 
</head> 
<body> 
<h4>Envia por '.$p['nombre'].'</h4> 
<h5>asunto '.$p['asunto'].'</h5> 
<p> 
'.$p['mensaje'].'
</p> 
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: El patio filosofico <elpatiofilosofico@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: ".$p["correo"]."\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: juakmartz@gmail.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 


