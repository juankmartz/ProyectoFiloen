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
            $rutaMultimedia = "./vista/Video/noticia/noticia_";
            $tipoMulti = "VIDEO";
        }else{
            $rutaMultimedia = "./vista/Imagenes/noticia/noticia_";
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

class Noticias2 {

    var $idnoticia,
            $titulo,
            $subtitulo,
            $contenido,
            $imagen,
            $video,
            $fecha,
            $idusuario,
            $enlace,
            $estado,
            $fecha_modifico;

    function __construct($idnoticia, $titulo, $subtitulo, $contenido, $imagen, $video, $fecha, $idusuario, $enlace, $estado, $fecha_modifico) {
        $this->idnoticia = $idnoticia;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->contenido = $contenido;
        $this->imagen = $imagen;
        $this->video = $video;
        $this->fecha = $fecha;
        $this->idusuario = $idusuario;
        $this->enlace = $enlace;
        $this->estado = $estado;
        $this->fecha_modifico = $fecha_modifico;
    }

    function getIdnoticia() {
        return $this->idnoticia;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getVideo() {
        return $this->video;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getEnlace() {
        return $this->enlace;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha_modifico() {
        return $this->fecha_modifico;
    }

    function setIdnoticia($idnoticia) {
        $this->idnoticia = $idnoticia;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setVideo($video) {
        $this->video = $video;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setEnlace($enlace) {
        $this->enlace = $enlace;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha_modifico($fecha_modifico) {
        $this->fecha_modifico = $fecha_modifico;
    }

    //Metodos
    public function registroNuevaNoticia($titulo, $subtitulo, $contenido, $imagen, $video, $fecha, $idusuario, $enlace, $estado, $fecha_modifico) {
        $conn = conBD::conectar();
        $id = 0;
        $sentenciaSQL = "INSERT INTO `noticia` (`titulo`,`subtitulo`,`contenido`,`imagen`,`video`,`fecha`,`idusuario`,`enlace`,`estado`,`fecha_modifico`)
VALUES('" . $titulo . "','" . $subtitulo . "','" . $contenido . "','" . $imagen . "','" . $video . "','" . $fecha . "',
'" . $idusuario . "','" . $enlace . "','" . $estado . "','" . $fecha_modifico . "'); ";
        mysqli_query($conn, $sentenciaSQL);
        $id = mysqli_insert_id($conn);
        $existoInsert = mysqli_affected_rows($conn);

        if ($existoInsert > 0) {
            ?><script>var noty = new NotificationFx({
                    message: '<h5>Noticia registrada</h5><p>la noticia se registro existosamente. <?php echo $id; ?></p>',
                    layout: 'growl', effect: 'slide', type: 'notice' // notice, warning or error
                });
                noty.show();
                //                alert('ya existe un usuario con la identificacion suministrada.');
            </script> <?php
//            $nuevoID = mysqli_
            return $id;
        } else {
            ?><script>var noty = new NotificationFx({message: '<h5>Operación fallida</h5><p>No fue posible registrar la noticia, verifique los datos y archivos e inténtelo de nuevo</p>',
                    layout: 'growl', effect: 'slide', type: 'warning'});
                noty.show();
            </script> <?php
            return $id;
        }
    }

    public function actualizarNoticiaMultimedia($id, $imagen, $video, $conn, $idUser) {

//        $conn = conBD::conectar();
        $hoy = getdate();
        $hoy = date("Y-m-d H:i:s", $hoy);
        $sentenciaSQL = "UPDATE `noticia`
SET
`imagen` = '" . $imagen . "',
`video` = '" . $video . "',
`idusuario` = '" . $idUser . "',
`fecha_modifico` = '" . $hoy . "' 
WHERE `idnoticia` = '" . $id . "';
 ";
        mysqli_query($conn, $sentenciaSQL);
//        $id = mysqli_insert_id($conn);
        $exitoUpdate = mysqli_affected_rows($conn);

        return $exitoUpdate;
    }

    public function actualizarNoticiaEstado($id, $estado, $conn, $idUser) {

//        $conn = conBD::conectar();
        $hoy = getdate();
        $hoy = date("Y-m-d H:i:s", $hoy);
        $sentenciaSQL = "UPDATE `noticia`
SET
`estado` = '" . $estado . "',
`idusuario` = '" . $idUser . "',
`fecha_modifico` = '" . $hoy . "' 
WHERE `idnoticia` = '" . $id . "';
 ";
        mysqli_query($conn, $sentenciaSQL);
//        $id = mysqli_insert_id($conn);
        $exitoUpdate = mysqli_affected_rows($conn);
        return $exitoUpdate;
    }

    public function obtenerNoticasActuales() {
        $conn = conBD::conectar();
        $sql = "SELECT `noticia`.`idnoticia`,
    `noticia`.`titulo`,
    `noticia`.`subtitulo`,
    `noticia`.`contenido`,
    `noticia`.`imagen`,
    `noticia`.`video`,
    `noticia`.`fecha`,
    `noticia`.`idusuario`,
    `noticia`.`enlace`,
    `noticia`.`estado`,
    `noticia`.`fecha_modifico`
FROM `noticia` WHERE estado <> 'INACTIVO'";
        return mysqli_query($conn, $sql);
    }

}
