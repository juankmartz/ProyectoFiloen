<?php 

//LLAMAR LOS CAMPOS
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$email = $_POST['correo'];
$mensaje = $_POST['mensaje'];

//DATOS PARA EL CORREO

$destinatario = "ferramirezalbarracin@gmail.com";
$asunto = "Contacto desde nuestro Portal FiloEn";

$carta = "DE: $nombre \n";
$carta .= "Correo: $email \n";
$carta .= "Asunto: $asunto \n";
$carta .= "Mensaje: $mensaje \n";

//ENVIAR MENSAJE AL CORREO
mail($destinatario, $asunto, $carta);
header('Location: mensaje_envio.php')
?>