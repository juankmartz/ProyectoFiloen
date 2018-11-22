<?php
//include './conBD.php';
include '../modelo/Chats.php';
include '../modelo/Usuario.php';
include '../modelo/Mensajeria.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$p = $_POST;
$g = $_GET;
$s = $_SESSION;

$user = new Usuario();
//$conn = NULL;
if (isset($s['usuario']))
    $user = unserialize($s['usuario']);
//if (isset($s['conexionBD']))
//    $conn = $s['conexionBD'];
//else
//    $conn = conBD::conectar();
//echo $p['oper'];

//print_r($p);
if (isset($p['oper'])) {
//echo $p['oper'];

    if ($p["oper"] == "envio mensaje") {
        $idR = $p["idRecibe"];
        $mensaje = $p["mensaje"];
        if (Chats::envioMensaje($user->getId(), $idR, $mensaje)) {
            $fecha = new DateTime(conBD::getFechaActual());
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
    if ($p["oper"] == "envio mensaje sala chat") {
        $idR = $p["idSala"];
        $mensaje = $p["mensaje"];
        $salaChat = new Mensajeria();
        if ($salaChat->enviarMensajeSalaChat($idR,$user->getId(),$mensaje) > 0 ) {
            $fecha = new DateTime(conBD::getFechaActual());
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
    if ($p["oper"] == "nuevo grupo") {
        $nombre = $p["nombre"];
        $descripcion = $p["descripcion"];
        $grupo = new Mensajeria();
        $respSql = $grupo->crearNuevaSala($nombre, $descripcion, $user->getId());
        if ($respSql != false && $respSql > 0) {
            $fecha = new DateTime(conBD::getFechaActual());
            $fecha = $fecha->format("d M | H:i");
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>Se creo correctamente el nuevo grupo</p><h5><?php echo $titulo; ?> </h5>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'notice' // notice, warning or error
                });
                noty.show();
               
            </script>
            <?php
            ?>
            <div class="mensaje-izq">
                <div class="text-mensaje">
                    <h6>El Grupo fue creado</h6>
                    <p class="mensaje"><?php echo $nombre; ?> </p>

                    <span class="f-h-mensaje"><?php echo $descripcion; ?></span>
<!--                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_InvitarAGrupo">
                        invitar al grupo
                    </button>-->
<button type="button" onclick=" $('#idgrupoInivitar').val('<?php echo $respSql;?>');" class="btn btn-primary" data-toggle="modal" data-target="#ModalInivtarGrupo">Invitar
                    </button>
                </div>
            </div>
            <?php
        }else{
            ?>
             <script>
                var noty = new NotificationFx({
                    message: '<p>No fue posible completar el registro del nuevo grupo</p><h5><?php echo $titulo; ?> </h5>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'warning' // notice, warning or error
                });
                noty.show();
            </script>
            <?php
        }
    }
    if ($p["oper"] == "buscar para invitar") {
        $idGrupo = $p["idgrupo"];
        $resultados = array();
//    $tipousuario = "";
//    if (isset($p["tipo_usuario"]))
//        $tipousuario = $p["tipo_usuario"];
        $resultado = $user->buscarUsuarioInvitarGrupo($p["criterio"], $idGrupo);
        $r = new Usuario();
//        echo '<div id="invitarUsuariosGrupo"><input type="hidden" name="oper" value="Enviar invitacion grupo">';

        foreach ($resultado as $r) {
//            print_r($r);
            ?>
            <div class="row row-flow" id="invitacion_<?php echo $r->getId(); ?>">
                <div class="col-3" >
                    <div class="fotoPerfiles" style="background: url(Imagenes/222.jpg)"></div>
                </div>
                <div class="col-7 ">
                    <span class=""><?php echo $r->getNombre(); ?></span>
                    <input type="hidden" name="invitado" value="<?php echo $r->getId(); ?>">
                    <input type="hidden" name="oper" value="invitar a grupo">
                    <input type="hidden" name="nombInvitado" value="<?php echo $r->getNombre(); ?>">
                    <input type="hidden" name="idgrupo" value="<?php echo $idGrupo; ?>">
                </div>
                <input id="btn_invt<?php echo $r->getId(); ?>" type="button" class="float-right btn btn-primary" value="invitar" 
                       onclick="envioFormularioDataForm(zerialisForm('invitacion_<?php echo $r->getId(); ?>'), '../controlador/chats.php', 'invitacion_<?php echo $r->getId(); ?>', false);">
            </div>
            <?php
        }
    }
    if ($p["oper"] == "invitar a grupo") {
        $idGrupo = $p["idgrupo"];
        $idInvitado = $p["invitado"];
        $nombInvitado = $p["nombInvitado"];
        $resultados = array();
        $resultado = $user->invitarSalaChat($idInvitado, $idGrupo);
        if ($resultado) {
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>Se envio correctamente la invitacion a <?php echo $nombInvitado; ?> para que participe en este grupo</p>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'notice' // notice, warning or error
                });
                noty.show();
                $btn = $('#btn_invt<?php echo $idInvitado; ?>');
                $($btn).attr("class", "float-right btn btn-defauld");
                $($btn).attr("disabled", "");
            //            $($btn).attr("value","cancelar");
            </script>
            <?php
            return true;
        } else {
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>No fue posible enviar la invitacion a <?php echo $nombInvitado; ?> </p>',
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
    if ($p["oper"] == "aceptar invitacion grupo") {
        $idGrupo = $p["idgrupo"];
        $idInvitado = $user->getId();
        $invitacion = new Mensajeria();
        $resultado = $invitacion->aceptarInvitacionGrupo($idGrupo, $idInvitado);
        if ($resultado) {
            ?>
            <a href="#1">Ya puedes comenzar a participar en este grupo </a> <br>
            <script>
                $("#btn_acep<?php echo $idGrupo; ?>").remove();
            </script>
            
            <?php
            return true;
        } else {
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>No fue posible enviar la invitacion a <?php echo $nombInvitado; ?> </p>',
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
    if ($p["oper"] == "unirseGrupo") {
        $idgrupo= $p["idgrupo"];
        $mens = new Mensajeria();
        $MISgrupos = $mens->unirseGrupo($user->getId(), $idgrupo);
        if ($MISgrupos) {
             ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>Te has unido al grupo, ya puedes practicipar, compartir y aprender en este grupo. </p>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'notice' // notice, warning or error
                });
                noty.show();

            </script>
            <?php
        }else{
            ?>
            <script>
                var noty = new NotificationFx({
                    message: '<p>No fue posible unirse al grupo en este momento. intentelo mas tarde </p>',
                    layout: 'growl',
                    effect: 'slide',
                    type: 'warning' // notice, warning or error
                });
                noty.show();

            </script>
            <?php
        }
       
    }
    if ($p["oper"] == "cargarMisGrupos") {

        $mens = new Mensajeria();
        $MISgrupos = $mens->buscarSalasChatPorIdUsuario($user->getId(), 'ACTIVO');
        if ($MISgrupos->num_rows == 0) {
            ?><blockquote class="blockquote col-10 offset-1">
                <i class="text-muted">No estas participando aun en ningun grupo , unete y participa en los grupos disponibles</i>
            </blockquote> <?php
        }
        while ($fila = mysqli_fetch_array($MISgrupos, MYSQLI_ASSOC)) {
            ?>
            <div class=" mb-3 p-3">
                <span class="text-uppercase"><?php echo $fila["titulo"]; ?></span><br>
                <span class="text-lowercase"><?php echo $fila["descripcion"]; ?></span><br>
                <span class="fecha"><?php echo $fila["fecha"]; ?></span><br>
                <!--<input type="button" value="Unirse" class="btn btn-sm btn-defauld">-->
            </div>

            <?php
        }
    }
    if ($p["oper"] == "cargarNuevoMensaje") {
        
        $idRecibe = $p["idchat"];
        $mens = new Mensajeria();
        $MISgrupos = $mens->buscarNuevosMensajesChatPorIdUser($user->getId(),$idRecibe );
        
        while ($fila = mysqli_fetch_array($MISgrupos, MYSQLI_ASSOC)) {
            
                                    $newMensaj = new Mensajeria();
//                                    $newMensaj->actualizarEstadoMensaje($fila["idmensaje"], "ENTREGADO");
//                                    $newMensaj->cargarDatosMensaje($fila["idmensaje"], $fila["idenvia"], $fila["idrecibe"], $fila["mensaje"], $fila["fecha"], $fila["estado"]);
                                    if ($fila["estado"] == "ENVIADO") {
                                        $newMensaj->actualizarEstadoMensaje($fila["idmensaje"], "ENTREGADO");
                                    }
                                    if ($fila["idrecibe"] == $idRecibe) {
                                        ?>
                                        <div class="mensaje-der">
                                            <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                                            <div class="text-mensaje">
                                                <p class="mensaje"><?php echo $fila["mensaje"] ?> </p>
                                                <span class="f-h-mensaje"><?php echo $fila["fecha"]; ?></span>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="mensaje-izq">
                                            <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                                            <div class="text-mensaje">
                                                <p class="mensaje"><?php echo $fila["mensaje"] ?></p>
                                                <span class="f-h-mensaje"><?php echo $fila["fecha"]; ?></span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
    }
    if ($p["oper"] == "cargarNuevoMensajeSalaChat") {
        $idRecibe = $p["idSala"];
        $mens = new Mensajeria();
        $MISgrupos = $mens->buscarNuevosMensajesChatPorIdSala($user->getId(),$idRecibe );

        while ($fila = mysqli_fetch_array($MISgrupos, MYSQLI_ASSOC)) {
            
                                    $newMensaj = new Mensajeria();
                                    if ($fila["estado"] == "ENVIADO") {
                                         $mens ->actualizarEstadoMensajeSala($fila["idmensaje_sala"], 'ENTREGADO'); 
                                    }
                                    if (!($fila["iduser_envia"] == $user->getId())) {
                                        $userEnvio = new Usuario();
                                        $userEnvio->buscarUsuarioByiD($fila["iduser_envia"]);
                                        ?>
                                        <div class="mensaje-izq">
                                            <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="<?php echo $userEnvio->getAvatar(); ?>"> </div>
                                            <div class="text-mensaje">
                                                
                                                <p class="mensaje">
                                                    <b class="mr-2"><?php echo $userEnvio->getNombre(); ?> dice : </b><?php echo $fila["mensaje"] ?></p>
                                                <span class="f-h-mensaje"><?php echo $fila["fecha"]; ?></span>
                                            </div>
                                        </div>
            
                                        <?php
                                    } else {
                                        ?>
<!--                                       
                                        <?php
                                    }
                                }
    }
} else {
    echo "No se encontro la varible 'oper'";
}


    

