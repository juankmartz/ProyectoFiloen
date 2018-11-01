<!DOCTYPE html>
<?PHP
//include '../controlador/conBD.php';
include '../modelo/Mensajeria.php';
include '../modelo/Usuario.php';

session_start();
$p = $_GET;
$s = $_SESSION;
$user = new Usuario();
if (isset($s['usuario'])) {
    $user = unserialize($s['usuario']);
//    echo "<h3> el usuario es " . $user->getNombre() . "</h3>";
}
$conn = conBD::conectar();
$idsalachat = $p["idSalaChat"];
?>
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
            <h3><?php echo $datosSala["titulo"]; ?></h3>
            <p> <?php echo $datosSala["descripcion"]; ?></p>
            <h6>Administrador: <b><?php echo $datosSala["administrador"]; ?></b> <span class="float-right"><?php echo $datosSala["participante"]; ?> participantes</span></h6>
            <div class="participantes-chat">
                <h3>participantes grupo</h3>
                <?php
                while ($up = mysqli_fetch_array($participantes, MYSQLI_ASSOC)) {
//                $nuevoUser = new Usuario();
//                $nuevoUser->nuevoUsuario($up["idusuario"], $up["nombre"], $up["codigo"], $up["correo"], 
//                        $up["ciudad"], $up["direccion"], $up["identificacion"], $up["tipo_usuario"],
//                        $up["usuario"], $up["contrasenna"]);
                    $listParticipantes[$up["idusuario"]] = $up["nombre"];
                    ?>
                    <span class="participante-sala"><?php echo $up["nombre"]; ?></span>
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
                                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                                <div class="text-mensaje">
                                    <span class="nombreChat"><?php echo $listParticipantes[$mensaj["iduser_envia"]]; ?> dice:</span>
                                    <p class="mensaje"><?php echo $mensaj["mensaje"] ?></p>
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