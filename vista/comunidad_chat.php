<!DOCTYPE html>
<?PHP
//include '../controlador/conBD.php';
include '../modelo/Mensajeria.php';
include '../modelo/Usuario.php';
include '../modelo/salaChat.php';

session_start();
$p = $_GET;
$s = $_SESSION;
$user = new Usuario();
if (isset($s['usuario'])) {
    $user = unserialize($s['usuario']);
//    echo "<h3> el usuario es " . $user->getNombre() . "</h3>";
}
//$conn = conBD::conectar();
$idsalachat = $p["idSalaChat"];
$_SESSION["idGrupo"] = $idsalachat;
?>
<link rel="stylesheet" href="css/grupo.css">
<style>
    .cont-Memsaje-comunal{
        font-size: 14px;
        padding-left: 45px;
        border: 1px solid red;
        max-height: 400px;
        height: 700px;
        overflow-y: auto;
        padding-bottom: 20px;
    }
    .participante-sala{
        display: block;
    }
    .nombreChat{
        display: block;
    }
    span.nombreChat {
        font-weight: 400;
        color: rgba(255, 255, 255, 0.87);
        font-size: 13px;

    }
    span.f-h-mensaje {
        font-size: 10px;
        color: #f1eded;
        text-align: right;
        display: block;
    }
</style>
<?php
$salaChats = new Mensajeria();
$listParticipantes = array();
$datosSala = $salaChats->buscarSalasChatPorIdSalaChat($idsalachat, "ACTIVO");
$participantes = $salaChats->buscarParticipantesSala($idsalachat);
$datosSala = mysqli_fetch_array($datosSala, MYSQLI_ASSOC);
//                print_r($datosSala);
?>
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-8">
            <h3 class="titulo-grupo"><?php echo $datosSala["titulo"]; ?></h3>
            <p class="descripcion-grupo"> <?php echo $datosSala["descripcion"]; ?></p>
            <h6 class="admin-grupo">Administrador: <b><?php echo $datosSala["administrador"]; ?></b> 
                <span class="float-right num-participantes"  data-toggle="collapse" data-target="#participantes"><?php echo $datosSala["participante"]; ?> participantes</span></h6>

            <div class="participantes-chat collapse" id="participantes">
                <?php
                while ($up = mysqli_fetch_array($participantes, MYSQLI_ASSOC)) {
                    $listParticipantes[$up["idusuario"]]["nombre"] = $up["nombre"];
                    $listParticipantes[$up["idusuario"]]["avatar"] = $up["avatar"];
                    ?>
                    <span class="participante-sala"><?php echo $up["nombre"]; ?></span>
                    <?php
                }
                ?>
            </div>
            <form class="form-nueva-publicacion" method="post" action="../controlador/grupo.php" onsubmit="envioFormulario(this, 'cuerpo-publicacion', false);return false;">
                <input type="hidden" name="oper" value="publicar en el grupo">
                <textarea name="publicacion" id="publicacion" required="" placeholder="Crea una nueva publicacion..." ></textarea>
                <input type="submit" value="Publicar" class="btn btn-sm btn-primary">
            </form>
            <div id="cuerpo-publicacion">
                <?php
                $publicaciones = salaChat::buscarPublicacionesGrupo($idsalachat);
                while ($fila = mysqli_fetch_assoc($publicaciones)) {
                    ?>
                   
                    <div class="publicacion">
                        <p>
                            <?php echo $fila["texto"]; ?>
                            <br><small><?php echo $fila["fecha"]; ?></small>
                        </p>
                         <?php 
                                $comentarios = salaChat::buscarComentarioPublicacion($fila["idpublicacion"]);
                                $numcoment = mysqli_num_rows($comentarios) ;
                                if($numcoment > 0){
                                ?>
                        <a href="#1" class="text-muted" data-toggle="collapse" data-target="#coment_public<?php echo $fila["idpublicacion"]; ?>" ><?php echo $numcoment; ?> comentarios</a>
                                <?php } ?>
                        <a href="#1" class="btn btn-sm fa fa-comment-alt" data-toggle="collapse" data-target="#coment_public<?php echo $fila["idpublicacion"]; ?>" > Comentar</a>
                        <div id="coment_public<?php echo $fila["idpublicacion"]; ?>" class="collapse">
                            <div class="nuevo-comment">
                                <form id="formComentario<?php echo $fila["idpublicacion"]; ?>" action="../controlador/grupo.php" method="post" onsubmit="envioFormulario(this, 'comment-<?php echo $fila["idpublicacion"]; ?>', false);return false;">
                                    <input type="hidden" name="oper" value="comentar publicacion">
                                    <input type="hidden" name="idpublic" value="<?php echo $fila["idpublicacion"]; ?>">
                                    <textarea class="nuevo-comment" name="comentario" required="" placeholder="Escribe tu comentario..."></textarea >
                                    <input  type="submit" onclick="$(this).parent().find('textarea').text('');" value="Comentar" class="btn btn-sm btn-dark">
                                </form>
                            </div>
                            <div class="comment-publicacion-cont" id="comment-<?php echo $fila["idpublicacion"]; ?>">
                                <?php 
//                                $comentarios = salaChat::buscarComentarioPublicacion($fila["idpublicacion"]);
                                while ($commnet = mysqli_fetch_assoc($comentarios)){
                                    $nombUser = Usuario::buscarNombre($commnet['idusuario']);
                                    ?>
                                <div class="cuerpo-coment">
                                    <span class="nomb-coment"><?php echo $nombUser; ?></span>
                                    <p class="text-coment"><?php echo $commnet['comentario'];?><br> 
                                        <small class="fecha-coment"><?php echo $commnet['fecha'];?></small></p>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-4 " style="font-size: 15px;" >
            <h4>Mensajes</h4>
            <div class="cont-Memsaje-comunal" id="cont-chatComunidad">
                <div id="cuerpo-chatComunidad">
                    <?php
                    $mensajeChats = $salaChats->buscarMensajesChatPorIdSala($idsalachat);
//                    print_r($listParticipantes);
                    while ($mensaj = mysqli_fetch_array($mensajeChats, MYSQLI_ASSOC)) {
//                        echo $mensaj["idmensaje_sala"];
                        $salaChats->actualizarEstadoMensajeSala($mensaj["idmensaje_sala"], "ENTREGADO");
//            echo $mensaj["iduser_envia"]."||".$user->getId()."<br>";
                        if ($mensaj["iduser_envia"] == $user->getId()) {
                            ?>
                            <div class="mensaje-der">
                                <div class="text-mensaje">

                                    <p class="mensaje"><?php echo $mensaj["mensaje"] ?> </p>
                                    <span class="f-h-mensaje"><?php echo $mensaj["fecha"]; ?></span>
                                </div>
                            </div>
        <!--<script>
        altura = $("#cuerpo-chatComunidad").height();
        alert(altura);
        $("#cont-chatComunidad").scrollTop(altura);
        </script>-->
                            <?php
                        } else {
                            ?>
                            <div class="mensaje-izq">
                                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="<?php echo $listParticipantes[$mensaj["iduser_envia"]]["avatar"]; ?>"> </div>
                                <div class="text-mensaje">
                                    
                                    <p class="mensaje"><b class="mr-2"><?php echo $listParticipantes[$mensaj["iduser_envia"]]["nombre"]; ?> dice : </b> <?php echo $mensaj["mensaje"] ?></p>
                                    <span class="f-h-mensaje"><?php echo $mensaj["fecha"]; ?></span>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <form  action="../controlador/chats.php" method="post" onsubmit="envioFormulario(this, 'cuerpo-chatComunidad', false);
                    $(this).find('textarea').val('');
                    return false;">
                <!--<form action="../controlador/chats.php" method="post" >-->
                <input type="hidden" name="oper" value="envio mensaje sala chat">
                <input type="hidden" name="idSala" value="<?php echo $idsalachat; ?>">
                <textarea name="mensaje"  class="form-control input-chat scroll-item scroll-blue"></textarea>
                <a href="#1" class="btn btn-sm btn-defauld btn-chat" onclick="$(this).parent().submit();"><i class="fa fa-paper-plane"></i></a>
            </form>
        </div>
    </div>
</div>
<script>
    altura = $("#cuerpo-chatComunidad").height();
//    alert(altura);
    $("#cont-chatComunidad").scrollTop(altura);
    document.getElementById('cuerpo-chatComunidad').addEventListener("DOMSubtreeModified", function () {
        altura = $(this).height();
        $(this).parent().scrollTop(altura);
    }, false);

    setInterval(function () {
        //                                    alert("buscando");

        //                                    console.log(data);
        $.ajax({
            url: "../controlador/chats.php",
            type: "POST",
            dataType: 'html',
            data: 'oper=cargarNuevoMensajeSalaChat&idSala=<?php echo $idsalachat; ?>',
        }).done(function (respuesta) {
            console.log(respuesta);
            //            alert("exito");
            $("#cuerpo-chatComunidad").append(respuesta);
        });
        //                                    alert('fin');
    }, 3500);
</script>