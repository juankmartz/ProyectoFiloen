<?php
//include '../controlador/conBD.php';
include '../modelo/Mensajeria.php';
include '../modelo/Usuario.php';

// put your code here

session_start();
$p = $_POST;
$s = $_SESSION;
$user = new Usuario();
//$conn = NULL;
if (isset($s['usuario'])) {
    $user = unserialize($s['usuario']);
}
$idRecibe = 0;
//$idEnvia = $user->getId();
if (isset($p["idRecibe"])) {
    $idRecibe = $p["idRecibe"];
} else {
    return;
}
//$conn = conBD::conectar();


$michats = new Chats();

$michats->getChatPersona($idRecibe, $idEnvia)
?>
<div class="conversacion">
    <?php
//    $idRecibe = "7";

    $mensajes = new Mensajeria();
    $resp = $mensajes->buscarMensajesChatPorIdUser($user->getId(), $idRecibe);
    $userRecibe = new Usuario();
    $userRecibe = $userRecibe->UsuarioPorID($idRecibe);
    ?>
    <div class="titulo-chat row-flow" data-toggle="collapse" data-target="#chat_<?php echo $idRecibe; ?>">
        <span class="nomb-chat col-11"><?php echo $userRecibe->getNombre() ?></span><a href="#1" class="btn-closed col-1"  onclick="$(this).parents('.conversacion').remove();">x</a>
    </div>
    <div class="collapse show" id="chat_<?php echo $idRecibe; ?>">
        <div class="cuerpo-chat scroll-item scroll-blue" id="chat_cuerpo_<?php echo $idRecibe; ?>">
            <div class="cont-cuerpo-chat" id="contCuerpoChat<?php echo $idRecibe; ?>">
                <?php
//                            print_r($mensajes);
                while ($fila = mysqli_fetch_array($resp, MYSQLI_ASSOC)) {
                    $newMensaj = new Mensajeria();
                    $newMensaj->cargarDatosMensaje($fila["idmensaje"], $fila["idenvia"], $fila["idrecibe"], $fila["mensaje"], $fila["fecha"], $fila["estado"]);
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
                ?>
            </div>
        </div>
        <script>
            buscarNuevoMensaje("contCuerpoChat<?php echo $idRecibe; ?>", "<?php echo $idRecibe; ?>");
        </script>
        <div class="mensaje-chat ">
            <script>
                setInterval(function () {
//                                    alert("buscando");
var misdata ={
    'oper': 'cargarNuevoMensaje',
    'idchat':'<?php echo $idRecibe; ?>'
};
                   
                    console.log(data);
                    $.ajax({
                        url: '../controlador/chats.php',
                        type: "POST",
                        dataType: "html",
                        data: { data: JSON.stringify(misdata) },
//                        data: 'oper=cargarNuevoMensaje&idchat=<?php echo $idRecibe; ?>',
//                                        data: {
//                                            'oper': 'cargarNuevoMensaje',
//                                            'idchat': '7'
//                                        },
                        cache: false,
                        processData: false,
                        success: function (result) {
                            console.log("cargando nuevo mensaje chat ");
                            console.log(result);
                            $("#" + contCuerpoChat<?php echo $idRecibe; ?>).append(result);
                        },
                        error: function (e) {
                            console.log("Ha ocurrido un error al cargar nuevo mensajes al chat " + idRespuesta);
                        }
                    });
//                                    alert('fin');
                }, 10000);
//                                alert("la funcion sirve");
            </script>
            <form  action="../controlador/chats.php" method="post" onsubmit="envioFormulario(this, 'contCuerpoChat<?php echo $idRecibe; ?>', false);
                    return false;">
                <!--<form action="../controlador/chats.php" method="post" >-->
                <input type="hidden" name="oper" value="envio mensaje">
                <input type="hidden" name="idRecibe" value="<?php echo $idRecibe; ?>">
                <textarea name="mensaje"  class="form-control input-chat scroll-item scroll-blue"></textarea>
                <a href="#1" class="btn btn-sm btn-defauld btn-chat" onclick="$(this).parent().submit();"><i class="fa fa-paper-plane"></i></a>
            </form>
        </div>
    </div>

    <script type="text/javascript">
//        var timers = [[0, "vacio"]];
        document.getElementById('contCuerpoChat<?php echo $idRecibe; ?>').addEventListener("DOMSubtreeModified", function () {
            altura = $(this).height();
            $(this).parent().scrollTop(altura);
        }, false);



    </script>

</div>


<!--
<div class="conversacion">
    <div class="titulo-chat row-flow" data-toggle="collapse" data-target="#chat_8">
        <span class="nomb-chat col-11">Nombre del chat...</span><a href="#1" class="btn-closed col-1"  onclick="$(this).parents('.conversacion').remove();">x</a>
    </div>
    <div class="collapse show" id="chat_8">
        <div class="cuerpo-chat scroll-item scroll-blue">
            <div class="mensaje-izq">
                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                <div class="text-mensaje">
                    <p class="mensaje">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, </p>
                    <span class="f-h-mensaje">24 abr 2017 | 23:45</span>
                </div>
            </div>
            <div class="mensaje-der">
                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                <div class="text-mensaje">
                    <p class="mensaje">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, </p>
                    <span class="f-h-mensaje">24 abr 2017 | 23:45</span>
                </div>
            </div>
            <div class="mensaje-izq">
                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> </div>
                <div class="text-mensaje">
                    <p class="mensaje">Lorem Ipsum es. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, </p>
                    <span class="f-h-mensaje">24 abr 2017 | 23:45</span>
                </div>
            </div>
            <div class="mensaje-izq">
                <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="../../vista/Imagenes/22.png"> 
                </div>
                <div class="text-mensaje">
                    <p class="mensaje">Lorem Ipsum es. desde el año 1500, </p>
                    <span class="f-h-mensaje">24 abr 2017 | 23:45</span>
                </div>
            </div>


        </div>
        <div class="mensaje-chat ">
            <form action="../controlador/chats.php" method="post" onsubmit="envioFormulario(this, 'chat_7', false); return false;">
                <form action="../controlador/chats.php" method="post" >
                <input type="hidden" name="oper" value="envio mensaje">
                <input type="hidden" name="idRecibe" value="7">
                <textarea name="mensaje"  class="form-control input-chat scroll-item scroll-blue"></textarea>
                <a href="#1" class="btn btn-sm btn-defauld btn-chat" onclick="$(this).parent().submit();"><i class="fa fa-paper-plane"></i></a>
            </form>
        </div>
    </div>
</div>-->