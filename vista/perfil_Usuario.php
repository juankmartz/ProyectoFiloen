<?php
include '../modelo/Usuario.php';
session_start();
$g = $_GET;
$iduser = 0;
$usuario = new Usuario();
//        session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
//            redireccionar a index
    header('Location: vista/index.php');
}
if (isset($g['idUser'])) {
//    echo $g['idUser'];
    $usuario = $usuario->UsuarioPorID($_GET['idUser']);
//    echo $usuario->getNombre();
}
//        $usuario = new Usuario($idUser);
?>

<!--   

        <div class="cbp-spmenu-push" id="cont-push">
            <a href="buscardorPerfiles.php"></a>
            

            <div class="container" id="cuerpo-principal-perfil">-->
<div class="row mb-2">

    <div class="col-md-12 col-lg-4">
        <!--                            <div class="content-imagen col-4" id="avatar_perfil" style="background: url(../../Imagenes/17.5.jpg);">
                                    </div>-->
        <?php
        $avatar = $usuario->getAvatar();
        if ($avatar == "") {
            $avatar = "Imagenes/sin-avatar.png";
        }
        ?>
        <div class="ch-item ch-img-1" id="imgPerfil" style="background: url(<?php echo $avatar; ?>)">
            <div class="ch-info ">


            </div>
        </div>
        <div class="row pt-2 pb-2">
            <div class="center-block" style="margin: auto;">
                <button class="btn btn-sm btn-warning"><i class="fab fa-blogger"></i> Blog</button>
                <button class="btn btn-sm btn-default" onclick="dejarSeguirUsuario();" id="btn_dejarSeguir" title="Dejar de seguir para no recibir notifcaciones"><i class="fa fa-user-times"></i> </button>
                <button class="btn btn-sm btn-info" onclick="seguirUsuario();" id="btn_seguir" title="Seguir para recibir notifcaciones sobre nuevos contenidos de esta persona"><i class="fa fa-user-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-8 text-muted row">
        <div class="col-12"><h5  class="text-info ">Informacion personal</h5></div>
        <div class="col-12  info-perfil-3 mb-1">
            <span><?php echo $usuario->getTipo_usuario(); ?></span>
        </div>
        <div class="col-12  info-perfil-3 mb-1 row">
            <span class=" col-md-4 col-sm-12">Nombre: </span>
            <span ><?php echo $usuario->getNombre(); ?> </span>
            <!--<input type="text" class="input-editable form-control" disabled="true" value="" name="txtNombre" id="txtNombre">-->

        </div> 
        <div class="col-md-12  info-perfil-3 mb-1 row">
            <span class=" col-md-4 col-sm-12">Identificacion: </span>
            <span ><?php echo $usuario->getIdentificacion(); ?> </span>
        </div> 
        <div class="col-md-12  info-perfil-3 mb-1 row">
            <span class="col-md-4 col-sm-12">Cofigo: </span>
            <span ><?php echo $usuario->getCodigo(); ?> </span>
            <!--<input type="text" class="input-editable form-control" disabled="true" value="Codigo: < ?php echo $usuario->getCodigo(); ?>" name="txtCodigo" id="txtCodigo">-->
        </div> 

        <div class="col-12 pt-2 mt-2"><h5  class="text-info ">Informacion de contacto</h5></div>
        <div class="col-md-12 col-12 btn-group info-perfil-3 mb-1">
            <span class="text-right text-muted col-md-3 col-sm-12">Direccion: </span>
            <span ><?php echo $usuario->getDireccion(); ?> </span>

        </div>
        <div class="col-md-12 col-12 btn-group info-perfil-3 ">                        
            <span class="text-right text-muted col-md-3 col-sm-12">Email: </span>
            <span ><?php echo $usuario->getCorreo(); ?></span >

            <!--                                <div class="input-group-append">
                                                <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtEmail', this)"><i class="fa fa-pen"></i> </button>
                                            </div>-->
        </div>

    </div>
</div>



<div class="container-fluid" id="contacademia">
    <div class="col-12"><h5  class="text-info ">Informacion academica</h5></div>
    <?php
    ?>
    <div class="row" id="cont_estudioAcademico">
        <?php
        $infoAcademica = Usuario::buscarInfoAcademicaByIdUser($usuario->getId());
//                        print_r($infoAcademica);
        if (count($infoAcademica) <= 0) {
            ?>
            <blockquote style="width: 70%;margin: auto; border-color: orange; color: orange" >
                <h5 >Sin registros academicos</h5>
                <p class="text-muted">No se han registrado datos academicos para este perfil. </p>
            </blockquote >
            <?php
        }
        foreach ($infoAcademica as $info) {
            ?>
            <div class="row col-12 col-sm-10  offset-xs-0 offset-sm-1 mt-3 border-top">
                <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8"><?php echo $info["titulo"]; ?></span>
                <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8"><?php echo $info["institucion"]; ?></span>
                <span class="col-4 text-right text-muted">año:</span><span class="col-8"><?php echo $info["anno"]; ?></span>
            </div>    
            <?php
        }
        ?>
    </div>
</div>
<script>
    var $idUsuarioSeguir = '<?php echo $usuario->getId(); ?>';
    $("#btn_dejarSeguir").css('display','none');

    function seguirUsuario() {
//        var datos = {"oper": "seguir usuario", "idseguir": $idUsuarioSeguir};

        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append("oper", "seguir usuario");
        paqueteDeDatos.append("idseguir", $idUsuarioSeguir);
        console.log('inicio de ajax, Data = ');
        console.log(paqueteDeDatos);
        $.ajax({
            url: "../controlador/usuarios.php",
            type: "POST",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            success: function (result) {
                    $("#contresultados").append(result);
                    $("#btn_dejarSeguir").css('display','inline-block');
                    $("#btn_seguir").css('display','none');

                
            },
            error: function (e) {
                console.log("falla en el envio ajax Seguir");
                $("#contresultados").append("ha ocurrido un Error en el envio del formulario ");
            }
        });
    }
    function dejarSeguirUsuario() {
//        var datos = {"oper": "seguir usuario", "idseguir": $idUsuarioSeguir};

        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append("oper", "dejar de seguir usuario");
        paqueteDeDatos.append("idseguir", $idUsuarioSeguir);
        $.ajax({
            url: "../controlador/usuarios.php",
            type: "POST",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            success: function (result) {
                    $("#contresultados").append(result);
                    $("#btn_seguir").css('display','inline-block');
                    $("#btn_dejarSeguir").css('display','none');

            },
            error: function (e) {
                console.log("falla en el envio ajax Seguir");
                $("#contresultados").append("ha ocurrido un Error en el envio del formulario ");
            }
        });
    }
</script>