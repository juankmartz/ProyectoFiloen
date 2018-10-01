<?php

include '../controlador/conBD.php';
include '../modelo/Noticia.php';
include '../modelo/Usuario.php';

session_start();
$p = $_POST;
$s = $_SESSION;
$f = $_FILES;
$user = NULL;
$conn = NULL;
if (isset($s['usuario'])) {
    $user = unserialize($s['usuario']);
//    echo "<h3> el usuario es " . $user->getNombre() . "</h3>";
}
if (isset($f[0])) {

    echo "<h3> existe archivo </h3>";
    print_r($f);
}
if (isset($s['conexionBD']))
    $conn = $s['conexionBD'];
else
    $conn = conBD::conectar();

if (isset($p['oper'])) {
    echo $p['oper'];
    if ($p["oper"] == "Guardar") {
        $conn = conBD::conectar();
        //verificacion de archivo multimedia.
//
        $nombre = "";
        $identificacion = "";
        $direccion = "";
        $email = "";
        $user = new Usuario();
        if (isset($p['txtNombre'])) {
            $nombre = $p["txtNombre"];
            $user->setNombre($nombre);
        }
        if (isset($p['txtIdentificacion'])) {
            $identificacion = $p["txtIdentificacion"];
            $user->setIdentificacion($identificacion);
        }
        if (isset($p['txtDireccion'])) {
            $direccion = $p["txtDireccion"];
            $user->setDireccion($direccion);
        }
        if (isset($p['txtEmail'])) {
            $email = $p["txtEmail"];
            $user->setCorreo($email);
        }
        if ($nombre != "" || $identificacion != "" || $direccion != "" || $email != "") {
            $user->guardarCambios();
            echo "<h1>registro actualizado</h1>";
        }
    } else if ($p["oper"] = "registro info academica") {
        $hoy = new DateTime('now');
        $hoy = $hoy->format("Y-m-d H:i:s");
        $sql = "INSERT INTO `informacion_academica`
(
`idusuario`,
`titulo`,
`institucion`,
`anno`,
`fecha`)
VALUES
(
 '" . $user->getId() . "',
 '" . $p['txtTituloAcademico'] . "',
'" . $p['txtInstitucion'] . "',
'" . $p['txtanno'] . "',
'".$hoy."');";
        $conn = conBD::conectar();
       if(mysqli_query($conn, $sql)){
            ?> <script>
//                cargarPagina('inicioUsuario.php','contenedorPrincipal',true); 
                var noty = new NotificationFx({
                        message: '<p>Se registro corectamente el estudio academico a su perfil </p><h6><?php echo $nuevoUser->getNombre()?></h6>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'notice' // notice, warning or error
                                    });
                           noty.show();</script> <?php
       }else{
            ?> <script> 
//                cargarPagina('inicioUsuario.php','contenedorPrincipal',true);
                var noty = new NotificationFx({
                        message: '<p>Lo sentimos no fue posible registrar el estudio academico en este momento, por favor verifiue los datos suministrados he intentelo de nuevo</p><h6><?php echo $nuevoUser->getNombre()?></h6>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'warning' // notice, warning or error
                                    });
                           noty.show();</script> <?php
       }
    }
} else {
    echo 'no se encontro la variable OPER';
}


