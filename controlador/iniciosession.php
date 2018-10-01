<?php

include './conBD.php';
include '../modelo/Usuario.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_POST["oper"] == "incio session") {
    iniciosession::iniciarSession($_POST['usuario'], $_POST['contrasena']);
}
if ($_POST["oper"] == "salir session") {
    ?> <script>alert('Esto va a ser la bomba');</script> <?php

}

class iniciosession {

    public function iniciarSession($user, $pass) {
//        include ('../modelo/Usuario.php');
        session_start();
        $connect = conBD::conectar();
        $usuario = mysqli_query($connect, "SELECT * FROM usuario WHERE usuario = '" . $user . "'  ");
        $contarUser = mysqli_num_rows($usuario);
// $contarPass = mysqli_num_rows($contrasena);

        if ($contarUser == 0) {
            ?> <script>
                    var noty = new NotificationFx({
                        message: '<p>El nombre de usuario no se encuentra registrado, por favor verifique</p>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'warning' // notice, warning or error
                                    });
                           noty.show();  
                   </script> <?php

        } else if ($contarUser == 1) {
            //verificamos que la contrase�a sea la correcta
//            $row = mysqli_fetch_row($usuario);
            $row = mysqli_fetch_array($usuario);
//            $connect = conBD::conectar();
            $contrasena = mysqli_query($connect, "SELECT * FROM usuario WHERE idusuario = '" . $row['idusuario'] . "' and ESTADO = 'ACTIVO'");
            $row = mysqli_fetch_array($contrasena);
            if ($row["contrasenna"] == $pass) {
               $user = new Usuario();
               $user = new Usuario();
                           $user->nuevoUsuario($row["idusuario"], $row["nombre"], $row["codigo"], $row["correo"],
                                   $row["ciudad"], $row["direccion"], $row["identificacion"], $row["tipo_usuario"], $row["usuario"], $row["contrasenna"]);
                           
//                           $usuario = Usuario::Usuario($row["idusuario"], $row["nombre"], $row["codigo"], $row["correo"],
//                                   $row["ciudad"], $row["direccion"], $row["identificacion"], $row["tipo_usuario"], $row["usuario"], $row["contrasenna"]);
                           $_SESSION["conexionBD"] = $connect;
                           $_SESSION["iduser"] =  $row["idusuario"];
//                           if (! $_SESSION['Usuario'] instanceof Usuario)
                           $_SESSION["usuario"] = serialize($user) ;
                           $nuevoUser= $_SESSION['usuario'];
                           $nuevoUser= unserialize($nuevoUser);
                         
                            ?> <script> cargarPagina('inicioUsuario.php','contenedorPrincipal',true); var noty = new NotificationFx({
                        message: '<p>Bienvenido a Filoen </p><h6><?php echo $nuevoUser->getNombre()?></h6>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'notice' // notice, warning or error
                                    });
                           noty.show();</script> <?php
                           
                } else {
                    ?> <script>
                    var noty = new NotificationFx({
                        message: '<p>Contraseña incorrecta, verifique por favor</p>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'warning' // notice, warning or error
                                    });
                           noty.show();  
                   </script> <?php

            }
        } else {
            ?> <script> var noty = new NotificationFx({
                        message: '<h5>Error de duplicidad</h5><p>Existe un problema de duplicidad, por favor informe al administrador.</p>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'error' // notice, warning or error
                                    });
                           noty.show();
                                  </script> <?php

        }
    }

}
