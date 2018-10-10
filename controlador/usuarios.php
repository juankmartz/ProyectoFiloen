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
                            <a href="#2" class="btn btn-sm btn-primary">Ver perfil</a>

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
} else {
    echo "no se encontro la variablew OPER";
}