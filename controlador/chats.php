<?php
//include './conBD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './conBD.php';
include '../modelo/Usuario.php';

session_start();
$p = $_POST;
$s = $_SESSION;
$user = new Usuario();
//$conn = NULL;
if (isset($s['usuario']))
    $user = unserialize($s['usuario']);
//if (isset($s['conexionBD']))
//    $conn = $s['conexionBD'];
//else
//    $conn = conBD::conectar();

if (isset($p['oper'])) {
//    echo $p['oper'];
    if ($p["oper"] == "envio mensaje") {
        $idR = $p["idRecibe"];
        $mensaje = $p["mensaje"];
        if (chats::envioMensaje($user->getId(), $idR, $mensaje)) {
            $fecha = new DateTime( conBD::getFechaActual());
            $fecha = $fecha->format("d M | H:i");
            ?>
            <!--            <script>
                            agregarMensaje('chat_< ?php echo $idR; ?>', '< ?php echo $mensaje; ?>');
                        </script>-->
            <div class="mensaje-der">
                <!--<div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>-->
                <div class="text-mensaje">
                    <p class="mensaje"><?php echo $mensaje; ?> </p>
                    <span class="f-h-mensaje"><?php echo $fecha; ?></span>
                </div>
            </div>
            <?php
        }
    }
}

class chats {

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
        if ($existoInsert > 0) {
            return true;
        } else
            return false;
    }

}
