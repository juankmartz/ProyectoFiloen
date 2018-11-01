<?php
include '../modelo/Usuario.php';
session_start();
$g = $_GET;
$iduser = 0;
        $usuario= new Usuario();
//        session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
//            redireccionar a index
    header('Location: vista/index.php');
}
if(isset($g['idUser'])){
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
<a href="#1" onclick="cargarPagina('buscardorPerfiles.php', 'cuerpo-principal-perfil', true);" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> regresar</a>
                <form method="post" action="../controlador/informacionPersonal.php" class="" onsubmit="envioFormulario(this, 'resp', false);return false;">
                    <input type="hidden" name="oper" id="oper" value="Guardar">
                    <div class="row mb-5">
                        <h4 class="col-12 ">Informacion personal</h4>
                        <div class="col-12 col-md-4">
                            <!--                            <div class="content-imagen col-4" id="avatar_perfil" style="background: url(../../Imagenes/17.5.jpg);">
                                                        </div>-->
                            <div class="ch-item ch-img-1" id="imgPerfil">
                                <div class="ch-info ">

                                    <!--<h3 class="text-center ">Cambiar imagen</h3><br>-->
<!--                                       
<!--                                    <h4 class="text-center ">
                                        <a href="#1" onclick="$('#avatar').click();" class="btn btn-lg btn-primary ">
                                            <i href="#1" class="fa fa-camera "> </i>
                                        </a>
                                    </h4>-->
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-8  row">

                            <div class="col-12 btn-group info-perfil-3 ">
                                <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getNombre(); ?>" name="txtNombre" id="txtNombre">
                                <!--                            <a href="#1" class="btn-hover-editar" onclick="editarCampo(this)">editar</a>
                                                            <a href="#1" class="btn-hover-editar" onclick="guardarCampo(this)">guardar</a>-->
                                <div class="input-group-append">
                                    <!--<button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtNombre', this)"><i class="fa fa-pen"></i> </button>-->
                                </div>
                            </div> 
                            <div class="col-12 btn-group info-perfil-3 ">
                                <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getIdentificacion(); ?>" name="txtIdentificacion" id="txtIdentificacion">
                                <div class="input-group-append">
                                    <!--<button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtIdentificacion', this)"><i class="fa fa-pen"></i> </button>-->
                                </div>
                            </div> 
                            <div class="col-12 col-sm-6 btn-group info-perfil-3 mt-2">
                                <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getTipo_usuario(); ?>" name="txtTipoUser" id="txtTipoUser">
                            </div>
                            <div class="col-12 col-sm-6 btn-group info-perfil-3 mt-2">
                                <input type="text" class="input-editable form-control" disabled="true" value="Codigo: <?php echo $usuario->getCodigo(); ?>" name="txtCodigo" id="txtCodigo">
                            </div> 
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12"><h4>Informacion de contacto</h4></div>
                        <div class="col-md-6 col-12 btn-group info-perfil-3 ">
                            <span class="input-group-text" id="basic-addon1">Direccion: </span>
                            <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getDireccion(); ?> " 
                                   name="txtDireccion" id="txtDireccion">
                            <div class="input-group-append">
                                <!--<button title="Editar"  class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtDireccion', this)"><i class="fa fa-pen"></i> </button>-->
                            </div>
                        </div>
                        <div class="col-md-6 col-12 btn-group info-perfil-3 ">                        
                            <span class="input-group-text" id="basic-addon1">Email: </span>
                            <input type="text" class="input-editable form-control " disabled="true" value="<?php echo $usuario->getCorreo(); ?>" 
                                   name="txtEmail" id="txtEmail">
                            <div class="input-group-append">
                                <!--<button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtEmail', this)"><i class="fa fa-pen"></i> </button>-->
                            </div>
                        </div>
                    </div>
                    <div class="row-flow mt-3">
                        <!--<input type="submit" class="btn btn-sm btn-primary" value="Guardar" name="oper" id="oper2">-->
                    </div>
                </form>
                <hr />

                <div class="container-fluid">
                    <div class="row-flow"><h4>Informacion academica</h4></div>
                    <?php 
                    
                    ?>
                    <div class="row" id="cont_estudioAcademico">

                        <div class="row col-12 col-sm-10  offset-xs-0 offset-sm-1 mt-3 border-top">
                            <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                            <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                            <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                        </div>

                        <div class="row col-12 col-sm-10 offset-sm-1 mt-3 border-top">
                            <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                            <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                            <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                        </div>

                        <div class="row col-12 col-sm-10 offset-sm-1  mt-3 border-top">
                            <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                            <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                            <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                        </div>
                    </div>
                </div>

<!--            </div>
            
            
        </div>-->
        <!--    </body>
        </html>-->