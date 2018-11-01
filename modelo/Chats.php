<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chats
 *
 * @author desarrolloJuan
 */
class Chats {
    
    var $idchat = "", $idusuario = 0, $mensaje = "", $fecha = "", $idEnvia = 0;

    function getIdchat() {
        return $this->idchat;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdEnvia() {
        return $this->idEnvia;
    }

    function setIdchat($idchat) {
        $this->idchat = $idchat;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdEnvia($idEnvia) {
        $this->idEnvia = $idEnvia;
    }

    function cargarMensajeChat($idchat, $idusuario, $mensaje, $fecha, $idEnvia) {
        $this->idchat = $idchat;
        $this->idusuario = $idusuario;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
        $this->idEnvia = $idEnvia;
    }

    public function getChatPersona($idRecibe, $idEnvia) {
        $sql = "SELECT `mensaje`.`idmensaje`,
    `mensaje`.`idenvia`,
    `mensaje`.`idrecibe`,
    `mensaje`.`mensaje`,
    `mensaje`.`fecha`,
    `mensaje`.`estado`
FROM `mensaje` WHERE `idenvia` = '" . $idEnvia . "' AND `idrecibe` = '" . $idRecibe . "' ORDER BY `fecha` ASC ;";
        $conn = conBD::conectar();
        $resultado = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $resultado;
    }
    public function getChatTodosPersona($idRecibe) {
        $sql = "SELECT `mensaje`.`idmensaje`,
    `mensaje`.`idenvia`,
    `mensaje`.`idrecibe`,
    `mensaje`.`mensaje`,
    `mensaje`.`fecha`,
    `mensaje`.`estado`
FROM `mensaje` WHERE `idenvia` = '" . $idEnvia . "' AND `idrecibe` = '" . $idRecibe . "' ORDER BY `fecha` ASC ;";
        $conn = conBD::conectar();
        $resultado = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $resultado;
    }

    static public function getChatidMensaje($idMensaje) {
        $sql = "SELECT `mensaje`.`idmensaje`,
    `mensaje`.`idenvia`,
    `mensaje`.`idrecibe`,
    `mensaje`.`mensaje`,
    `mensaje`.`fecha`,
    `mensaje`.`estado`
FROM `mensaje` WHERE `idmensaje` = '" . $idMensaje . "' ;";
        $conn = conBD::conectar();
        $resultado = mysqli_query($conn, $sql);
        $chat = new chats();
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        $chat->cargarMensajeChat($fila['idmensaje'], $fila['idrecibe'], $fila['mensaje'], $fila['fecha'], $fila['idenvia']);
        mysqli_close($conn);
        return $chat;
    }

    static function envioMensaje($idEnvia, $idRecibe, $Mensaje) {
        $fecha = conBD::getFechaActual();
        $conn = conBD::conectar();
        $sql = "INSERT INTO `mensaje`
(
`idenvia`,
`idrecibe`,
`mensaje`,
`fecha`,
`estado`)
VALUES
(
'" . $idEnvia . "',
'" . $idRecibe . "',
'" . $Mensaje . "',
'" . $fecha . "',
'ENVIADO');";
//        echo '<h3>sentencia   ' . $sql . '</h3>';
        mysqli_query($conn, $sql);
        $existoInsert = mysqli_affected_rows($conn);
        mysqli_close($conn);
        if ($existoInsert > 0) {
            return true;
        } else
            return false;
    }

}
