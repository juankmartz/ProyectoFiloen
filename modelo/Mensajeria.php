<?php

include '../controlador/conBD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensajeria
 *
 * @author desarrolloJuan
 */
class Mensajeria {

    var $idchat = "0", $userEnvia = "", $userRecibe = "", $mensaje = "", $fecha = "", $estado = "";

    function getIdchat() {
        return $this->idchat;
    }

    function getUserEnvia() {
        return $this->userEnvia;
    }

    function getUserRecibe() {
        return $this->userRecibe;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdchat($idchat) {
        $this->idchat = $idchat;
    }

    function setUserEnvia($userEnvia) {
        $this->userEnvia = $userEnvia;
    }

    function setUserRecibe($userRecibe) {
        $this->userRecibe = $userRecibe;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function __construct() {
        $this->idchat = 0;
    }

    function cargarDatosMensaje($idchat, $userEnvia, $userRecibe, $mensaje, $fecha, $estado) {
        $this->idchat = $idchat;
        $this->userEnvia = $userEnvia;
        $this->userRecibe = $userRecibe;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
        $this->estado = $estado;
    }

    function crearNuevaSala($titulo, $descripcion, $idAdmin) {
        //si no existe el nombre de grupo.
        if (!$this->comprobarNombreGrupo($titulo)) {
            $conn = conBD::conectar();
            $hoy = conBD::getFechaActual();
            $sql = "INSERT INTO `sala_chat`" .
                    "(" .
                    "`titulo`," .
                    "`descripcion`," .
                    "`fecha`," .
                    "`estado`," .
                    "`idadministrador`)" .
                    "VALUES" .
                    "(" .
                    "'" . $titulo . "'," .
                    "'" . $descripcion . "'," .
                    "'" . $hoy . "'," .
                    "'ACTIVO'," .
                    "'" . $idAdmin . "');";
//        echo "<br>".$sql;
            mysqli_query($conn, $sql);
            $existoInsert = mysqli_insert_id($conn);
            $sql = "INSERT INTO `participante_sala`" .
                    "(`idusuario`," .
                    "`idsala_chat`," .
                    "`fecha`," .
                    "`estado`)" .
                    "VALUES" .
                    "('" . $idAdmin . "'," .
                    "'" . $existoInsert . "'," .
                    "'" . $hoy . "'," .
                    "'ACTIVO'); ";
//        echo $sql;
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo $existoInsert;
            if ($existoInsert > 0)
                return $existoInsert;
            else
                return false;
        } else {
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>El nombre de grupo no esta disponible, por favor intente con uno nuevo</p>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'warning' // notice, warning or error
                });
                noty.show();
            </script>
            <?php

            return false;
        }
    }

    /*
     * retorna 'true' si el nombre de grupo existe en la BD
     * de lo contrario retornara 'false' cuando No se encuentre registrado
     */

    function comprobarNombreGrupo($nombGrupo) {
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $sql = "SELECT `sala_chat`.`idsala_chat`," .
                "`sala_chat`.`titulo`," .
                "`sala_chat`.`descripcion`," .
                "`sala_chat`.`fecha`," .
                "`sala_chat`.`estado`," .
                "`sala_chat`.`idadministrador`" .
                "FROM `sala_chat` where `titulo`='" . $nombGrupo . "';";
//echo $sql;
        $resl = mysqli_query($conn, $sql);
//        echo $resl;
        $fila = mysqli_fetch_array($resl, MYSQLI_ASSOC);
        mysqli_close($conn);
        if (count($fila) > 0) {

            return true;
        } else {

            return false;
        }
    }

    function aceptarInvitacionGrupo($idgrupo, $iduser) {
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $sql = "UPDATE `participante_sala` 
            SET `estado` = 'ACTIVO'
            WHERE `idusuario` = '" . $iduser . "' AND `idsala_chat` = '" . $idgrupo . "';";
//echo $sql;
        $resl = mysqli_query($conn, $sql);
//        echo $resl;
        mysqli_close($conn);
        if ($resl == 1) {
            return true;
        } else {

            return false;
        }
    }

    function buscarChatPorID($idchat) {
        $sql = "SELECT `mensaje`.`idmensaje`," .
                "`mensaje`.`idenvia`," .
                "`mensaje`.`idrecibe`," .
                "`mensaje`.`mensaje`," .
                "`mensaje`.`fecha`," .
                "`mensaje`.`estado`" .
                " FROM `mensaje` WHERE `idmensaje`='" . $idchat . "' ";
        $conn = conBD::conectar();
        mysqli_query($conn, $sql);
    }

    function buscarMensajesChatPorIdUser($iduser, $idRecibe) {
        $sql = "SELECT `mensaje`.`idmensaje`," .
                "`mensaje`.`idenvia`," .
                "`mensaje`.`idrecibe`," .
                "`mensaje`.`mensaje`," .
                "`mensaje`.`fecha`," .
                "`mensaje`.`estado`" .
                " FROM `mensaje` WHERE (`idrecibe`='" . $iduser . "' OR `idenvia` = '" . $iduser . "') AND (`idrecibe`='" . $idRecibe . "' OR `idenvia` = '" . $idRecibe . "') order by fecha ASC ";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        print_r($resp);
        mysqli_close($conn);
        return $resp;
    }
    
    function buscarMensajesChatPorIdSala($idSala) {
        $sql = "SELECT `mensaje_sala`.`idmensaje_sala`,
    `mensaje_sala`.`mensaje`,
    `mensaje_sala`.`iduser_envia`,
    `mensaje_sala`.`idsala_chat`,
    `mensaje_sala`.`fecha`
FROM `mensaje_sala` WHERE idsala_chat = '".$idSala."' ;";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        print_r($resp);
        mysqli_close($conn);
        return $resp;
    }

    function buscarNuevosMensajesChatPorIdUser($iduser, $idRecibe) {
        $sql = "SELECT `mensaje`.`idmensaje`," .
                "`mensaje`.`idenvia`," .
                "`mensaje`.`idrecibe`," .
                "`mensaje`.`mensaje`," .
                "`mensaje`.`fecha`," .
                "`mensaje`.`estado`" .
                " FROM `mensaje` WHERE (`idrecibe`='" . $idRecibe . "' OR `idenvia` = '" . $idRecibe . "') AND `idenvia` <> '" . $iduser . "'  AND `estado` = 'ENVIADO'  order by fecha DESC ";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        print_r($resp);
        mysqli_close($conn);
        return $resp;
    }
    
    function buscarNuevosMensajesChatPorIdSala($iduser, $idSala) {
        $sql = "SELECT `mensaje_sala`.`idmensaje_sala`,
    `mensaje_sala`.`mensaje`,
    `mensaje_sala`.`iduser_envia`,
    `mensaje_sala`.`idsala_chat`,
    `mensaje_sala`.`fecha`,
    `mensaje_sala`.`estado`
FROM `mensaje_sala` WHERE idsala_chat = '".$idSala."'  AND estado = 'ENVIADO' AND `iduser_envia` <> '".$iduser."'; ";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        print_r($resp);
        mysqli_close($conn);
        return $resp;
    }

    function buscarChatPorIDSala($idsalachat) {
        $sql = "SELECT `sala_chat`.`idsala_chat`," .
                "`sala_chat`.`titulo`," .
                "`sala_chat`.`descripcion`," .
                "`sala_chat`.`fecha`," .
                "`sala_chat`.`estado`," .
                "`sala_chat`.`idadministrador`" .
                "FROM `sala_chat` where `idsala_chat`'=" . $idsalachat . "';";
        $conn = conBD::conectar();
        $rep = mysqli_query($conn, $sql);
        return $rep;
    }

    function buscarParticipantesSala($idsalachat) {
        $sql = "
SELECT `usuario`.`idusuario`,
    `usuario`.`codigo`,
    `usuario`.`nombre`,
    `usuario`.`correo`,
    `usuario`.`identificacion`,
    `usuario`.`direccion`,
    `usuario`.`ciudad`,
    `usuario`.`tipo_usuario`,
    `usuario`.`usuario`,
    `usuario`.`contrasenna`,
    `usuario`.`avatar`,
    `usuario`.`estado`
FROM `usuario` WHERE idusuario in 
(SELECT `participante_sala`.`idusuario` FROM `participante_sala` WHERE idsala_chat = '".$idsalachat."' and estado = 'ACTIVO');
";
        $conn = conBD::conectar();
       return mysqli_query($conn, $sql);

    }

    function obtenerContactos($iduser) {
        $sql = "SELECT `mensaje`.`idmensaje`," .
                "`mensaje`.`idenvia`," .
                "`mensaje`.`idrecibe`," .
                "`mensaje`.`mensaje`," .
                "`mensaje`.`fecha`," .
                "`mensaje`.`estado`" .
                " FROM `mensaje` WHERE `idmensaje`='" . $idchat . "' order by fecha DESC";
        $conn = conBD::conectar();
        mysqli_query($conn, $sql);
    }

    function buscarSalasChatPorEstado($estado) {
        $conn = conBD::conectar();
        $sql = "SELECT `sala_chat`.`idsala_chat`," .
                "`sala_chat`.`titulo`," .
                "`sala_chat`.`descripcion`," .
                "`sala_chat`.`fecha`," .
                "`sala_chat`.`estado`," .
                "`sala_chat`.`idadministrador`" .
                "FROM `sala_chat` where `estado`='" . $estado . "';";

        $resp = mysqli_query($conn, $sql);
        return $resp;
    }

    function buscarSalasChatDisponibleUnirse($iduser, $estado) {
        $conn = conBD::conectar();
        $sql = "SELECT `sala_chat`.`idsala_chat`," .
                "`sala_chat`.`titulo`," .
                "`sala_chat`.`descripcion`," .
                "`sala_chat`.`fecha`," .
                "`sala_chat`.`estado`," .
                "`sala_chat`.`idadministrador`" .
                "FROM `sala_chat` where `idsala_chat` NOT IN (SELECT `participante_sala`.`idsala_chat` "
                . "FROM `participante_sala` "
                . "WHERE `idusuario` = '" . $iduser . "' "
                . "AND estado ='" . $estado . "');";
//echo $sql;
        $resp = mysqli_query($conn, $sql);
        return $resp;
    }

    function buscarSalasChatPorIdUsuario($idUser, $estado) {
        $conn = conBD::conectar();
        $sql = "SELECT SC.`idsala_chat`," .
                "SC.`titulo`," .
                "SC.`descripcion`," .
                "SC.`fecha`," .
                "SC.`estado`," .
                "SC.`idadministrador`," .
                "(SELECT COUNT(`idsala_chat`) as participantes FROM participante_sala WHERE `idsala_chat` = SC.`idsala_chat`) as participante," .
                "( SELECT usuario.nombre FROM usuario WHERE usuario.idusuario = SC.idadministrador) as administrador " .
                " FROM `sala_chat` SC where `idsala_chat` IN (SELECT `participante_sala`.`idsala_chat` "
                . "FROM `participante_sala` "
                . "WHERE `idusuario` = '" . $idUser . "' "
                . "AND estado ='" . $estado . "');";
//        echo $sql;
        $resp = mysqli_query($conn, $sql);

        return $resp;
    }
    function buscarSalasChatPorIdSalaChat($idSalaChat, $estado) {
        $conn = conBD::conectar();
        $sql = "SELECT SC.`idsala_chat`," .
                "SC.`titulo`," .
                "SC.`descripcion`," .
                "SC.`fecha`," .
                "SC.`estado`," .
                "SC.`idadministrador`," .
                "(SELECT COUNT(`idsala_chat`) as participantes FROM participante_sala WHERE `idsala_chat` = SC.`idsala_chat`) as participante, " .
                "( SELECT usuario.nombre FROM usuario WHERE usuario.idusuario = SC.idadministrador) as administrador" .
                " FROM `sala_chat` SC where `idsala_chat` IN (SELECT `participante_sala`.`idsala_chat` "
                . "FROM `participante_sala` "
                . "WHERE `idsala_chat` = '" . $idSalaChat . "' "
                . "AND estado ='" . $estado . "');";
//        echo $sql;
        $resp = mysqli_query($conn, $sql);
        return $resp;
    }

    function unirseGrupo($idUser, $idgrupo) {
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $sql = "INSERT INTO `participante_sala`"
                . "(`idusuario`,"
                . "`idsala_chat`,"
                . "`fecha`,"
                . "`estado`)"
                . "VALUES "
                . "('" . $idUser . "',"
                . "'" . $idgrupo . "',"
                . "'" . $hoy . "',"
                . "'ACTIVO');";
//        echo $sql;
//        $sql = "UPDATE `participante_sala`"
//                . "SET "
//                . "`fecha` = '" . $hoy . "',"
//                . "`estado` = 'ACTIVO'"
//                . "WHERE `idusuario` = '" . $idUser . "' AND `idsala_chat` = '" . $idgrupo . "';";
//        echo $sql;
        $resp = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $resp;
    }

    function actualizarEstadoMensaje($idMensaje, $estado) {
        $sql = "UPDATE `mensaje` SET `estado` = '" . $estado . "'  WHERE `idmensaje` = '" . $idMensaje . "'";
        $conn = conBD::conectar();
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    function actualizarEstadoMensajeSala($idMensaje, $estado) {
        $sql = "UPDATE `mensaje_sala` SET `estado` ='" . $estado . "'  WHERE `idmensaje_sala` = '" . $idMensaje . "';";
        $conn = conBD::conectar();
//        echo $sql;
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function enviarMensajeSalaChat($idSala, $idUsuario, $mensaje){
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $sql= "INSERT INTO `mensaje_sala`(
`mensaje`,
`iduser_envia`,
`idsala_chat`,
`fecha`,`estado`
)
VALUES
(
'".$mensaje."',
'".$idUsuario."',
'".$idSala."',
'".$hoy."','ENVIADO');";
        mysqli_query($conn, $sql);
        $idNuevo = mysqli_insert_id($conn);
        mysqli_close($conn);
        return $idNuevo;
    }
}
