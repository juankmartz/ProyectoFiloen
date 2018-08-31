
<?php
include "../cn.php";

       $nombre = $_POST['nombre'];
       echo $nombre;
       $apellido = $_POST['apellido'];
       $email = $_POST['correo'];
       $identidad = $_POST['identificacion'];
       $direccion = $_POST['direccion'];
       $ciudad = $_POST['ciudad'];
       $tipo_usuario = $_POST['tipo_usuario'];
       $codigo = $_POST['codigo'];
       $nombre_usuario = $_POST['usuario'];
       $contrasena = $_POST['contrasena'];
       $insertsql = "INSERT INTO `usuario` (
`codigo`,
`nombre`,
`correo`,
`identificacion`,
`direccion`,
`ciudad`,
`tipo_usuario`,
`usuario`,
`contrasenna`,
`avatar`,
`estado`)
VALUES
(
'".$codigo."',
'".$nombre." ".$apellido."',
'".$email."',
'".$identidad."',
'".$direccion."',
'".$ciudad."',
'".$tipo_usuario."',
'".$nombre_usuario."',
'".$contrasena."',
'',
'ACTIVO');";
       
echo $insertsql;
mysqli_query($connect, $insertsql);

echo $nombre ;
echo '$nombre respuesta de ajax';
