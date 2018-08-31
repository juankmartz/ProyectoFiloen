<?php
include './conBD.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro_usuario
 *
 * @author Juan-desarrollo
 */
if ($_POST["oper"] == "nuevo usuario") {

    $registroExitoso = registro_usuario::registroNuevoUsuario($_POST['codigo'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['ciudad'], $_POST['direccion'], $_POST['identificacion'], $_POST['tipo_usuario'], 'ACTIVO', $_POST['usuario'], $_POST['contrasena']);

    if ($registroExitoso) {
        
    }
}
if ($_POST["oper"] == "ccc") {
    ?> <script>alert('Esto va a ser la bomba');</script> <?php
}

class registro_usuario {
    /*
     * registra en base de datos los datos iniciales de un nuevo usuario para concederle acceso ala plataforma
     */

    function registroNuevoUsuario($codigo, $nombre, $apellido, $correo, $ciudad, $direccion, $identificacion, $tipouser, $estado, $user, $pass) {
        $conn = conBD::conectar();
        $sentenciaSQL = "SELECT * FROM `usuario` WHERE  identificacion = '" . $identificacion . "' ";
        $existenRegistro = mysqli_query($conn, $sentenciaSQL);
        $existenRegistro1 = mysqli_num_rows($existenRegistro);
        if ($existenRegistro1 > 0) {
            ?><script>
                var noty = new NotificationFx({
                    message: '<h5>Operacion fallida</h5><p>Ya existe un usuario con la identificacion suministrada.</p>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'warning' // notice, warning or error
                });
                noty.show();
//                alert('ya existe un usuario con la identificacion suministrada.');
            </script> <?php
            return false;
        } else {

            $sentenciaSQL = "SELECT * FROM `usuario` WHERE   usuario = '" . $user . "' ";
            $existenRegistro = mysqli_query($conn, $sentenciaSQL);
            $existenRegistro1 = mysqli_num_rows($existenRegistro);
            if ($existenRegistro1 > 0) {
                ?><script>var noty = new NotificationFx({
                            message: '<h5>Operacion fallida</h5><p>El nombre de usuario ya se encuentra registrado</p>',
                            layout: 'growl',
                            effect: 'slide',
                            type: 'warning' // notice, warning or error
                        });
                        noty.show();
//                        alert('El nombre de usuario ya se encuentra registrado');
                </script> <?php
                return false;
            } else {
                $sentenciaSQL = "SELECT * FROM `usuario` WHERE   codigo ='" . $codigo . "'";
                $existenRegistro = mysqli_query($conn, $sentenciaSQL);
                $existenRegistro1 = mysqli_num_rows($existenRegistro);
                if ($existenRegistro1 > 0) { //el codigo ya esta registrado...
                    ?><script>var noty = new NotificationFx({
                            message: '<h5>Operacion fallida</h5><p>Lo sentimos el registro no se completo, el codigo suministrado ya fue registrado en otro usuario</p>',
                            layout: 'growl',
                            effect: 'slide',
                            type: 'warning' // notice, warning or error
                        });
                        noty.show();
//                        alert('El codigo suministrado ya fue registrado en otro usuario');
                    </script> <?php
                    return false;
                } else {
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
                    '" . $codigo . "',
                    '" . $nombre . " " . $apellido . "',
                    '" . $correo . "',
                    '" . $identificacion . "',
                    '" . $direccion . "',
                    '" . $ciudad . "',
                    '" . $tipouser . "',
                    '" . $user . "',
                    '" . $pass . "',
                    '',
                    '" . $estado . "');";
                    $resp = mysqli_query($conn, $insertsql);
                    echo "respuesta al insert " . $insertsql;
//            mysqli_query($conn, $sentenciaSQL);
                    ?><script>var noty = new NotificationFx({
                            message: '<h5>Operacion exitosa</h5><p>El registro fue satisfactorio ya puede comenzar a usar su cuenta en la plataforma </p>',
                            layout: 'growl',
                            effect: 'slide',
                            type: 'notice' // notice, warning or error
                        });
                        noty.show();</script> <?php
                    return true;
                }
            }
        }
    }

    //put your code here
}
