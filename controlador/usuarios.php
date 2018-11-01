<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'conBD.php';
include '../modelo/Usuario.php';

session_start();
$p = $_POST;
$s = $_SESSION;
//$conn = NULL;
$user = new Usuario();
if (isset($s['usuario']))
    $user = unserialize($s['usuario']);
//if (isset($s['conexionBD']))
//    $conn = $s['conexionBD'];
//else
//    $conn = conBD::conectar();

if (isset($p['oper'])) {
    if ($p['oper'] == "Buscar perfiles") {
        $resultados = array();
        $tipousuario = "";
        if (isset($p["tipo_usuario"]))
            $tipousuario = $p["tipo_usuario"];
        $resultado = $user->buscarUsuarioByCriterio($p["criterio"], $tipousuario);
        foreach ($resultado as $r) {
//           $r = new Usuario();
//            print_r($r);
            ?>

            <blockquote class="panel-info col-sm-10 offset-1 mt-2 ">
                <div class="row">
                    <div class="col-9 offset-sm-0 panel-body">
                        <div class="text-capitalize h4 col-sm-12"><?php echo $r->getNombre(); ?></div>
                        <div class="col-sm-12 row">
                            <div class="h6 text-muted col-md-6">Codigo: <?php echo $r->getCodigo(); ?></div>
                            <div class="h6 text-muted col-md-6"><?php echo $r->getTipo_usuario(); ?></div>
                        </div>
                        <div class="col-sm-12">
                            <a href="#2" onclick="cargarPagina('perfil_Usuario.php?idUser=<?php echo $r->getId(); ?>','cuerpo-principal-perfil', true)" class="btn btn-sm btn-primary">Ver perfil</a>
                        </div>
                    </div>
                    <div class="col-3" >
                        <div class="fotoPerfiles" style="background: url(Imagenes/222.jpg)"></div>
                    </div>
                </div>
            </blockquote>
            <?php
        }
    }
    if ($p['oper'] == "buscar para invitar") {//PARA INVITAR A GRUPO
        $idGrupo = $p["idgrupo"];
        $resultados = array();
        $tipousuario = "";
        if (isset($p["tipo_usuario"]))
            $tipousuario = $p["tipo_usuario"];
        $resultado = $user->buscarUsuarioByCriterio($p["criterio"], $tipousuario);
        $r = new Usuario();
//        echo '<div id="invitarUsuariosGrupo"><input type="hidden" name="oper" value="Enviar invitacion grupo">';

        foreach ($resultado as $r) {
//            print_r($r);
            ?>
            <div class="row" id="invitacion_<?php echo $r->getId(); ?>">
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
                <input type="button" class="float-right btn btn-primary" value="invitar" 
                       onclick="envioFormularioDataForm(zerialisForm('invitacion_<?php echo $r->getId(); ?>'), '../controlador/usuarios.php','invitacion_<?php echo $r->getId(); ?>',false);">
            </div>
            <?php
        }
    }
    if ($p['oper'] == "invitar a grupo") {
        $idGrupo = $p["idgrupo"];
        $idInvitado = $p["invitado"];
        $nombInvitado = $p["nombInvitado"];
        $resultados = array();
        $resultado = $user->invitarSalaChat($idInvitado, $idGrupo);
        if($resultado){
             ?>
<script>
     var noty = new NotificationFx({
                        message: '<p>Se envio correctamente la invitacion a <?php echo $nombInvitado;?> para que participe en este grupo</p>',
                        layout: 'growl',
                        effect: 'slide',
                        type: 'notice' // notice, warning or error
                                    });
                           noty.show();  
</script>
<?php
            return true;
        }else{
             ?>
<script>
     var noty = new NotificationFx({
                        message: '<p>No fue posible enviar la invitacion a <?php echo $nombInvitado;?> </p>',
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
} else {
    echo "no se encontro la variablew OPER";
}