<?php
/*
 * To change this license header; choose License Headers in Project Properties.
 * To change this template file; choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controlador/conBD.php';

/**
 * Description of Noticia
 *
 * @author desarrolloJuan
 */
class Noticia {

    //put your code here
    var $idnoticia;
    var $titulo;
    var $subtitulo;
    var $contenido;
    var $imagen;
    var $video;
    var $fecha;
    var $idusuario;
    var $enlace;
    var $estado; //ACTIVA, INACTIVA, DESTACADA
    var $fecha_modifico;

    function __construct($idnoticia) {
        $conn = NULL;
        $sql = "SELECT `noticia`.`idnoticia`,`noticia`.`titulo`,`noticia`.`subtitulo`,`noticia`.`contenido`,`noticia`.`imagen`,`noticia`.`video`,`noticia`.`fecha`,`noticia`.`idusuario`,`noticia`.`enlace`,`noticia`.`estado`,`noticia`.`fecha_modifico` FROM `dbfiloen`.`noticia` where idnoticia = '" . $idnoticia . "'";
        if ($_SESSION["conexionBD"]) {
            $conn = $_SESSION["conexionBD"];
        } else {
            $bd = new conBD();
            $conn = $bd->conectar();
        }
        $respBD = mysqli_query($conn, $sql);
        if ($respBD) {
            while ($fila = mysql_fetch_row($respBD)) {
                $this->setNoticiaArray($fila);
            }
            mysqli_close($conn);
        } else {
            mysqli_close($conn);
            return false;
        }
    }

    function setNoticiaArray($fila) {
        $this->setIdnoticia($fila[0]);
        $this->setTitulo($fila[1]);
        $this->setSubtitulo($fila[2]);
        $this->setContenido($fila[3]);
        $this->setImagen($fila[4]);
        $this->setVideo($fila[5]);
        $this->setFecha($fila[6]);
        $this->setIdusuario($fila[7]);
        $this->setEnlace($fila[8]);
        $this->setEstado($fila[9]);
        $this->setFecha_modifico($fila[10]);
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

    public function registroNuevaNoticia($titulo, $subtitulo, $contenido, $imagen, $tipoMultimedia, $fecha, $idusuario, $enlace, $estado, 
            $fecha_modifico, $conn) {
        $hoy = new DateTime('now');
        $hoy = $hoy->format("Y-m-d H:i:s");
//        $conn = conBD::conectar();
        $id = 0;
        $sentenciaSQL = "INSERT INTO `noticia` (`titulo`,`subtitulo`,`contenido`,`imagen`,`tipo_multimedia`,`fecha`,`idusuario`,`enlace`,`estado`,`fecha_modifico`)
VALUES('" . $titulo . "','" . $subtitulo . "','" . $contenido . "','" . $imagen . "','" . $tipoMultimedia . "','" . $fecha . "',
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

    public function actualizarNoticiaMultimedia($id, $imagen, $tipoMultimedia, $conn, $idUser) {

//        $conn = conBD::conectar();
        $hoy = new DateTime('now');
        $hoy = $hoy->format("Y-m-d H:i:s");
        $sentenciaSQL = "UPDATE `noticia`
SET
`imagen` = '" . $imagen . "',
`tipo_multimedia` = '" . $tipoMultimedia . "',
`idusuario` = '" . $idUser . "',
`fecha_modifico` = '" . $hoy . "' 
WHERE `idnoticia` = '" . $id . "';
 ";
        mysqli_query($conn, $sentenciaSQL);
//        $id = mysqli_insert_id($conn);
        $exitoUpdate = mysqli_affected_rows($conn);
//        mysqli_close($conn);
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
