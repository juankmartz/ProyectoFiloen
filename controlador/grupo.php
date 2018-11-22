<?php
//include './conBD.php';
include '../modelo/Chats.php';
include '../modelo/Usuario.php';
include '../modelo/Mensajeria.php';
include '../modelo/salaChat.php';
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

    if ($p["oper"] == "publicar en el grupo") {
        $idGrupo = $s["idGrupo"];
        $textPublicacion = $p["publicacion"];
        $salaGrupo = new salaChat();
        $idPublicacion = $salaGrupo->publicarEnGrupo($idGrupo, $textPublicacion, $user->getId());
//        $hoy = conBD::getFechaActual();
        if($idPublicacion > 0){
        ?>
<div class="publicacion">
<p>
    <?php echo $textPublicacion; ?>
    <br><small><?php echo conBD::getFechaActual(); ?></small>
</p>
<a href="#1" class="btn btn-sm fa fa-comment-alt" data-toggle="collapse" data-target="#coment_public<?php echo $idPublicacion;?>" > Comnetar</a>
<div id="coment_public<?php echo $idPublicacion;?>" class="collapse">
    <div class="nuevo-comment">
        <form action="../controlador/grupo.php" method="post" onsubmit="envioFormulario(this,'comment-<?php echo $idPublicacion;?>',false);return false;">
            <input type="hidden" name="oper" value="comentar publicacion">
            <input type="hidden" name="idpublic" value="<?php echo $idPublicacion;?>">
            <textarea class="nuevo-comment" name="comentario"></textarea>
            <input type="submit" value="Comentar" class="btn btn-sm">
        </form>
    </div>
    <div class="comment-publicacion-cont" id="comment-<?php echo $idPublicacion;?>">
    </div>
</div>
</div>
            <?php
        }
    }
    if ($p["oper"] == "comentar publicacion") {
//        $idGrupo = $s["idGrupo"];
        $idpublic = $p["idpublic"];
        $comentario = $p["comentario"];
        $grupo = new salaChat();
        $fecha = conBD::getFechaActual();
        $grupo->comentarPublicacion($idpublic, $user->getId(), $fecha, $comentario);
        $nombUser = Usuario::buscarNombre($user->getId());
        ?>

<div class="cuerpo-coment">
    <a href="#11" name="nuevoComentario" id="nuevoComentario"></a>
    <span  class="nomb-coment"><?php echo $nombUser; ?></span>
                                    <p class="text-coment"><?php echo $comentario; ?><br> 
                                        <small class="fecha-coment"><?php echo $fecha;?></small></p>
                                </div>
<script>

    $("#formComentario<?php echo $idpublic; ?>").find("textarea").val("");

   var destino = $("#nuevoComentario")
    $('html, body').animate({ scrollTop: destino.offset().top - 100 }, 500);
    $("#nuevoComentario").remove();


</script>
<?php
        
    }
    else if ($p["oper"] == "nuevo grupo") {
    }
    else if ($p["oper"] == "buscar para invitar") {
    }
    else if ($p["oper"] == "invitar a grupo") {
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
    else if ($p["oper"] == "aceptar invitacion grupo") {
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
    else if ($p["oper"] == "unirseGrupo") {
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
    else if ($p["oper"] == "cargarMisGrupos") {

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
    else if ($p["oper"] == "cargarNuevoMensaje") {
        
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
    else if ($p["oper"] == "cargarNuevoMensajeSalaChat") {
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
                                            <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                                            <div class="text-mensaje">
                                                <span class="nombreChat"><?php echo $userEnvio->getNombre(); ?> dice:</span>
                                                <p class="mensaje"><?php echo $fila["mensaje"] ?></p>
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


    

