<?php
//include '../controlador/conBD.php';
include '../modelo/Noticia.php';
include '../modelo/Usuario.php';

session_start();
$p = $_POST;
$s = $_SESSION;
$f = $_FILES;
$user = new Usuario();
if (isset($s['usuario'])) {
    $user = unserialize($s['usuario']);
//    echo "<h3> el usuario es " . $user->getNombre() . "</h3>";
}
if (isset($f[0])) {

    echo "<h3> existe archivo </h3>";
    print_r($f);
}

if (isset($p['oper'])) {
//    echo $p['oper'];
    if ($p["oper"] == "Guardar") {
//        $conn = conBD::conectar();
//verificacion de archivo multimedia.
//
        $nombre = "";
        $identificacion = "";
        $direccion = "";
        $email = "";
//        $user = new Usuario();
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
//        echo "nombre " . $nombre . "identif " . $identificacion . "direccion " . $direccion . " email " . $email . "";
        if ($nombre != "" || $identificacion != "" || $direccion != "" || $email != "") {
            $user->guardarCambios();
            $user->actualizarUsuarioSession();
//            echo "<h1>registro actualizado</h1>";
        }
    } else if ($p["oper"] == "registro info academica") {
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
'" . $hoy . "');";
//                $conn = conBD::conectar();
        if (conBD::ejecutarInsert($sql)) {
            ?> <script>
                //                cargarPagina('inicioUsuario.php','contenedorPrincipal',true); 
                var noty = new NotificationFx({
                    message: '<p>Se registro corectamente el estudio academico a su perfil </p><h6><?php echo $user->getNombre() ?></h6>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'notice' // notice, warning or error
                });
                noty.show();</script>
            <?php
            $infoAcademica = Usuario::buscarInfoAcademicaByIdUser($user->getId());
            foreach ($infoAcademica as $info) {
            ?>
            <div class="row col-12 col-sm-10  offset-xs-0 offset-sm-1 mt-3 border-top">
                <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8"><?php echo $info["titulo"]; ?></span>
                <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8"><?php echo $info["institucion"]; ?></span>
                <span class="col-4 text-right text-muted">año:</span><span class="col-8"><?php echo $info["anno"]; ?></span>
            </div>    
            <?php
            }
        } else {
            ?> <script>
                //                cargarPagina('inicioUsuario.php','contenedorPrincipal',true);
                var noty = new NotificationFx({
                    message: '<p>Lo sentimos no fue posible registrar el estudio academico en este momento, por favor verifiue los datos suministrados he intentelo de nuevo</p><h6><?php echo $nuevoUser->getNombre() ?></h6>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'warning' // notice, warning or error
                });
                noty.show();</script> <?php
        }
    } else if ($p["oper"] == "actualizar avatar") {

//        $conn = conBD::conectar();
        $rutaMultimedia = "";
        $rutaMultimedia = "../vista/Imagenes/perfil/user_" . $user->getId();
        try {
            if ($_FILES['archivo']["error"] > 0) {
                echo '<br> el error es : ' . $_FILES['archivo']["error"];
                throw new RuntimeException('Invalid parameters.');
            }

// Check $_FILES['archivo']['error'] value.
            switch ($_FILES['archivo']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

// You should also check filesize here. 
            if ($_FILES['archivo']['size'] > 8000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
        } catch (RuntimeException $e) {
            print_r($_FILES);
            echo $e->getMessage();
        }
//fin archivo multimedia

        /* ahora con la funcion move_uploaded_file lo guardaremos en el destino que queramos */
        if (!($_FILES['archivo']["error"] > 0)) {
            $rutaMultimedia = $rutaMultimedia . "." . end(explode(".", $_FILES['archivo']['name']));
            move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaMultimedia);
            $user->setAvatar($rutaMultimedia);
            $user->actualizarAvatar();
        }
    }
} else {
    echo 'no se encontro la variable OPER';
}


