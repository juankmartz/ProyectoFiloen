<?php
include '../controlador/conBD.php';
include '../modelo/Noticia.php';
include '../modelo/Usuario.php';

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

if (isset($p['oper'])) {
    echo $p['tipoMultimedia'];
    if ($p["oper"] == "nueva noticia") {
        $conn = conBD::conectar();
        //verificacion de archivo multimedia.
//
        $rutaMultimedia = "";
        $tipoMulti = "YOUTUBE";
        if($p["tipoMultimedia"] == "video"){
            $rutaMultimedia = "../vista/Video/noticia/noticia_";
            $tipoMulti = "VIDEO";
        }else{
            $rutaMultimedia = "../vista/Imagenes/noticia/noticia_";
            $tipoMulti = "IMAGEN";
        }
        try {

            if ($_FILES['multimedia']["error"] > 0) {
		echo '<br> el error es : '.$_FILES['multimedia']["error"];
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['multimedia']['error'] value.
            switch ($_FILES['multimedia']['error']) {
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
            if ($_FILES['multimedia']['size'] > 8000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['multimedia']['mime'] VALUE !!
            // Check MIME Type by yourself.
//            $finfo = new finfo(FILEINFO_MIME_TYPE);
//            if (false === $ext = array_search(
//                    $finfo->file($_FILES['multimedia']['tmp_name']), array(
//                'jpg' => 'image/jpeg',
//                'png' => 'image/png',
//                'gif' => 'image/gif',
//                    ), true
//                    )) {
//                throw new RuntimeException('Invalid file format.');
//            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['multimedia']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
//    if (!move_uploaded_file(
//        '../vista/Imagenes/noticia/noticia_'.$_FILES['multimedia']['tmp_name'],
//            $_FILES['multimedia']['tmp_name'])
//    ) {
//        throw new RuntimeException('Failed to move uploaded file.');
//    }
//            echo 'File is uploaded successfully.';
        } catch (RuntimeException $e) {
	    print_r($_FILES);
            echo $e->getMessage();
        
        }
        //fin archivo multimedia
        $hoy = new DateTime('now');
        $hoy = $hoy->format("Y-m-d H:i:s");
        $idUser = $user->getid();
        echo $idUser;
        echo $hoy;
        $idNuevoRegistro = Noticia::registroNuevaNoticia(
                        $p['titulo'], $p['subtitulo'], $p['contenido'], '', $tipoMulti, $hoy, $idUser, $p['enlace'], $p["estado"], $hoy,$conn);
        if ($idNuevoRegistro > 0) {
            /* ahora con la funcion move_uploaded_file lo guardaremos en el destino que queramos */
            if (!($_FILES['multimedia']["error"] > 0)) {
		$rutaMultimedia = $rutaMultimedia. $idNuevoRegistro. "." . end(explode(".", $_FILES['multimedia']['name']));
                move_uploaded_file($_FILES['multimedia']['tmp_name'], $rutaMultimedia );
//                echo 'File is uploaded successfully.';
                Noticia::actualizarNoticiaMultimedia($idNuevoRegistro, $rutaMultimedia , $tipoMulti, $conn, $user->getid());
//                Noticia::actualizarNoticiaEstado($idNuevoRegistro, $p["estado"], $conn, $user->getid());
                header('Location: ../vista/index.php');
            }
        } else {
            
        }
//        falta validar que si se ejecuta bien el registro
    }
} else {
    echo 'no se encontro la variable OPER';
}


