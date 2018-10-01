<?php
include '../modelo/Usuario.php';
session_start();
?>
<?php
        $iduser = 0;
//        $usuario= NULL;
//        session_start();
        if (isset($_SESSION['usuario'])) {
	    $usuario = unserialize($_SESSION['usuario']);
        }else {
//            redireccionar a index
            header('Location: vista/index.php');
        }
//        $usuario = new Usuario($idUser);
        ?>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Blueprint: Slide and Push Menus</title>
        <meta name="description" content="Blueprint: Slide and Push Menus" />
        <meta name="keywords" content="sliding menu, pushing menu, navigation, responsive, menu, css, jquery" />
        <meta name="author" content="Codrops" />
        <link href="pluging/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/SlidePushMenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/SlidePushMenus/css/default.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../favicon.ico">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="pluging/SlidePushMenus/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="pluging/SlidePushMenus/js/classie.js" type="text/javascript"></script>
        <style>

            /*stylos para barra lateral interna no fixed*/

            .menu-lateral,#btncerrarmenu {
                display: none;
            }
            .cbp-spmenu-push{
                padding-left: 240px!important;
                margin-left: 0px!important;
                width: 100%!important;
            }
            .cbp-spmenu {
                background: #47a3da;
                position: absolute!important;
            }



            .cbp-spmenu-push{
                margin-left: 240px;
                width: calc( 100% - 239px);
            }
            button#showLeftPush {
                background: #47a3da;
                color: white;
                top: 20px;
                left: 20px;
                height: 50px;
                width: 50px;
                border-radius: 5px;
                border: #258ecd solid 2px;
            }
            .menu-lateral{
                position: fixed;
                left: 30px;
                top: 30px;
                z-index: 999;
            }
            .menu-fix{
                position: fixed;
                z-index: 999;
                left: 270px;
            }
            #cbp-spmenu-s1 > a > i.fa {
                font-size: 18px;
                margin-right: 10px;
            }
            #cbp-spmenu-s1 > a:hover {
                text-decoration: none;
                color: #00ccff;
            }
            #avatar_perfil {
                width: 100%;
                height: 150px;
                border: red 1px solid;
                max-width: 150px;
                display: inline-block;
                float: right;
                border-radius: 50%;
            }
            .info-perfil-3:hover > .btn-hover-editar{
                display: block;
                font-weight: bold;
            }
            .info-perfil-3:hover > .input-group-append > .btn-hover-editar{
                display: block;
                font-weight: bold;
            }
            .btn-hover-editar{
                display: none;
            }
            #avatar_perfil{
                background-size: cover;
                background-repeat: space;
            }
            .info-perfil-3 {
                /*margin-top: 11px;*/
            }
            .input-editable:disabled {
                background: none;
                border: none;
            }
            blockquote{
                padding: 20px;
                border: 1px solid #e2e2e2;
                border-radius: 4px;
                border-left: 5px solid #5bc0de;
                color: #5bc0de;
                margin: 5px 50px;

            }
            @media (max-width: 980px) {
                .cbp-spmenu-push{
                    padding-left: 0px!important;
                    width: calc( 100% - 59px)!important;
                    margin-left: 0px!important;
                }



                .text-menu-lateral{
                    display:none;
                }
                .cbp-spmenu-vertical a:hover >  .text-menu-lateral {
                    position: absolute;
                    padding-right: 20px;
                    display: inline-block;
                    background: #258ecd;
                    border-radius: 0 10PX 10PX 0px;
                    white-space: nowrap;
                }
                .cbp-spmenu-vertical a:hover  {
                    display: inline-block;
                }

                .cbp-spmenu-vertical {
                    width: 60px;
                    height: 100%;
                    top: 0;
                    z-index: 1000;
                }
                .cbp-spmenu-push{
                    margin-left: 60px!important;
                    width: calc( 100% - 59px)!important;
                }
                blockquote{
                    margin: 0px;
                }
                .cbp-spmenu-vertical .titulo-menu{
                    display: none;
                }
            }

        </style>
        <style>
            .ch-item {
                /*                width: 100%;
                                height: 100%;*/
                width: 200px;
                height: 200px;
                border-radius: 50%;
                margin: auto;
                position: relative;
                cursor: default;
                box-shadow: 
                    inset 0 0 0 0 rgba(200,95,66, 0.4),
                    inset 0 0 0 10px rgba(255,255,255,0.6),
                    0 1px 2px rgba(0,0,0,0.1);

                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;
            }

            .ch-img-1 { 
                background-image: url(Imagenes/25.jpg);
            }

            .ch-info {
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                opacity: 0;

                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;

                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                transform: scale(0);

                -webkit-backface-visibility: hidden; /*for a smooth font */

            }

            .ch-info h3 {
                color: #fff;
                text-transform: uppercase;
                position: relative;
                letter-spacing: 2px;
                font-size: 22px;
                margin: 0 30px;
                padding: 65px 0 0 0;
                height: 110px;
                font-family: 'Open Sans', Arial, sans-serif;
                text-shadow: 
                    0 0 1px #fff, 
                    0 1px 2px rgba(0,0,0,0.3);
            }

            .ch-info p {
                color: #fff;
                padding: 10px 5px;
                font-style: italic;
                margin: 0 30px;
                font-size: 12px;
                border-top: 1px solid rgba(255,255,255,0.5);
            }

            .ch-info p a {
                display: block;
                color: #fff;
                color: rgba(255,255,255,0.7);
                font-style: normal;
                font-weight: 700;
                text-transform: uppercase;
                font-size: 9px;
                letter-spacing: 1px;
                padding-top: 4px;
                font-family: 'Open Sans', Arial, sans-serif;
            }

            .ch-info p a:hover {
                color: #fff222;
                color: rgba(255,242,34, 0.8);
            }

            .ch-item:hover {
                box-shadow: inset 0 0 0 150px rgba(200,95,66, 0.4), inset 0 0 0 16px rgba(255,255,255,0.8), 0 1px 2px rgba(0,0,0,0.1);
            }

            .ch-item:hover .ch-info {
                opacity: 1;

                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);	
            }

        </style>
    </head>
    <body >
        
        <div class="cbp-spmenu-push" id="cont-push">
            <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open" id="cbp-spmenu-s1">
                <a href="#2" id="btncerrarmenu" onclick="$('#showLeftPush').click()" class="float-right small">x</a><h3 class="titulo-menu">Menu </h3>
                <a href="#"><i class="fa fa-user-circle"></i><span class="text-menu-lateral"> Información personal</span></a>
                <a href="#"><i class="fa fa-users"></i><span class="text-menu-lateral"> Demás Perfiles</span></a>
                <a href="#"><i class="fa fa-book"></i><span class="text-menu-lateral"> Mi Blog</span></a>
                <a href="#"><i class="fa fa-university"></i> <span class="text-menu-lateral">Comunidad</span></a>
                <a href="#"><i class="fa fa-comment"></i><span class="text-menu-lateral"> Chat</span></a>
                <a href="#"><i class="fa fa-calendar"></i><span class="text-menu-lateral"> Eventos</span></a>
                <a href="#"><i class="fa fa-newspaper "></i> <span class="text-menu-lateral">Libros</span></a>
            </nav>
           
            <div class="menu-lateral menu-fix">
    <button id="showLeftPush" >
                    <i style="font-size: 24px;" class="fa fa-bars" aria-hidden="true"></i>
                </button>
               
            </div>
            <form method="post" action="../controlador/informacionPersonal.php" onsubmit="en">
                <input type="file" name="avatar" id="avatar" style="display: none;">
            </form>

            <div class="container-flow">
                <div id="resp"></div>
                <form method="post" action="../controlador/informacionPersonal.php" class="" onsubmit="envioFormulario(this, 'resp', false);return false;">
                    <input type="hidden" name="oper" id="oper" value="Guardar">
                    <div class="row mb-5">
                        <h4 class="col-12 ">Informacion personal</h4>
                        <div class="col-12 col-md-4">
                            <!--                            <div class="content-imagen col-4" id="avatar_perfil" style="background: url(../../Imagenes/17.5.jpg);">
                                                        </div>-->
                            <div class="ch-item ch-img-1">
                                <div class="ch-info ">
                                    
<!--                                    <img src="Imagenes/14.jpg" alt=""/>-->
                                    <h3 class="text-center ">Cambiar imagen</h3><br>
<!--                                        <p class="text-center">Quieres cambiar la imagen actual? </p>-->
                                    <h4 class="text-center ">
                                        <a href="#1" onclick="$('#avatar').click();" class="btn btn-lg btn-primary ">
                                            <i href="#1" class="fa fa-camera "> </i>
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-8  row">
                            <div class="col-12 btn-group info-perfil-3 mt-2">
                                <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getNombre(); ?>" name="txtNombre" id="txtNombre">
                                <!--                            <a href="#1" class="btn-hover-editar" onclick="editarCampo(this)">editar</a>
                                                            <a href="#1" class="btn-hover-editar" onclick="guardarCampo(this)">guardar</a>-->
                                <div class="input-group-append">
                                    <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtNombre', this)"><i class="fa fa-pen"></i> </button>
                                </div>
                            </div>
                            <div class="col-12 btn-group info-perfil-3 mt-2">
                                <input type="text" class="input-editable form-control" disabled="true" value="<?php echo $usuario->getIdentificacion(); ?> cc" name="txtIdentificacion" id="txtIdentificacion">
                                <div class="input-group-append">
                                    <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtIdentificacion', this)"><i class="fa fa-pen"></i> </button>
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
                                <button title="Editar"  class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtDireccion', this)"><i class="fa fa-pen"></i> </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 btn-group info-perfil-3 ">                        
                            <span class="input-group-text" id="basic-addon1">Email: </span>
                            <input type="text" class="input-editable form-control " disabled="true" value="<?php echo $usuario->getCorreo(); ?>" 
                                   name="txtEmail" id="txtEmail">
                            <div class="input-group-append">
                                <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtEmail', this)"><i class="fa fa-pen"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-sm btn-primary" value="Guardar" name="oper" id="oper2">
                    </div>
                </form>
                <hr />

                <div class="row"><h4>Informacion academica</h4></div>
                <div class="container-fluid">
                    <blockquote >
                        <h5 >Sin registros academicos</h5>
                        <p class="text-muted">No se han registrado datos academicos, si desea puede registrar los diferentes estudios realizados en su vida academica. </p><input type="button" class="btn btn-sm btn-primary" value="registrar">
                        <form id="forminformacionAcademica" class="mt-sm-10" action="../controlador/informacionPersonal.php" onsubmit="envioFormularioMultiPart2('forminformacionAcademica','respuesta',true); return false;" method="post">
                            <input type="hidden" name="oper" value="registro info academica">
                            <h5 >Nueva informacion academica</h5>
                            <div class="row">
                                <div class="col-12 btn-group mt-2 ">
                                    <span class="input-group-text lb">Titulo: </span>
                                    <input type="text" class="form-control" placeholder="Titulo completo obtenido" name="txtTituloAcademico" id="txtTituloAcademico">
                                </div>
                                <div class="col-12 col-md-8 btn-group mt-2">
                                    <span class="input-group-text lb">Institucion: </span>
                                    <input type="text" class="form-control" placeholder="Nombre de la institucion" name="txtInstitucion" id="txtInstitucion">
                                </div>
                                <div class="col-12 col-md-4 btn-group mt-2">
                                    <span class="input-group-text lb">Año: </span>
                                    <input type="text" class="form-control"  placeholder="año de grado" name="txtanno" id="txtanno" maxlength="5">
                                </div>

                            </div>
                            <div class="form-group mt-3 mb-4"><input class="btn btn-sm btn-primary" type="submit"  value="Guardar"></div>
                        </form>
                    </blockquote>
                    
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

            </div>
            <script>
                function editarCampo(idInput, btn) {
                    //             alert( $(boton).parent().children("input").val());
                    $("#" + idInput).removeAttr("disabled");
                    $(btn).remove();
                }
                function guardarCampo(idInput) {
                    //             alert( $(boton).parent().children("input").val());
                    $("#" + idInput).attr("disabled", "true");
                    //                $(boton).parent().children("input").attr("disabled", "true");
                }
            </script>
            <script>
                var menuLeft = document.getElementById('cbp-spmenu-s1'),
                        showLeftPush = document.getElementById('showLeftPush'),
                        //                    body = $("#cont-push"), contenPush = $("#cont-push");
                        body = document.body, contenPush = document.getElementById('cont-push');
                //			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                //				menuRight = document.getElementById( 'cbp-spmenu-s2' ),
                //				menuTop = document.getElementById( 'cbp-spmenu-s3' ),
                //				menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
                //				showLeft = document.getElementById( 'showLeft' ),
                //				showRight = document.getElementById( 'showRight' ),
                //				showTop = document.getElementById( 'showTop' ),
                //				showBottom = document.getElementById( 'showBottom' ),
                //				showLeftPush = document.getElementById( 'showLeftPush' ),
                //				showRightPush = document.getElementById( 'showRightPush' ),
                //				body = document.body;

                //			showLeft.onclick = function() {
                //				classie.toggle( this, 'active' );
                //				classie.toggle( menuLeft, 'cbp-spmenu-open' );
                //				disableOther( 'showLeft' );
                //			};
                //			showRight.onclick = function() {
                //				classie.toggle( this, 'active' );
                //				classie.toggle( menuRight, 'cbp-spmenu-open' );
                //				disableOther( 'showRight' );
                //			};
                //			showTop.onclick = function() {
                //				classie.toggle( this, 'active' );
                //				classie.toggle( menuTop, 'cbp-spmenu-open' );
                //				disableOther( 'showTop' );
                //			};
                //			showBottom.onclick = function() {
                //				classie.toggle( this, 'active' );
                //				classie.toggle( menuBottom, 'cbp-spmenu-open' );
                //				disableOther( 'showBottom' );
                //			};
                showLeftPush.onclick = function () {
                    classie.toggle(this, 'active');
                    classie.toggle(body, 'cbp-spmenu-push-toright');
                    classie.toggle(menuLeft, 'cbp-spmenu-open');
                    $("#showLeftPush").children("i").toggleClass('fa-outdent');
                    //		$("#showLeftPush").parent().toggleClass('cbp-spmenu-push-toleft');
                    $("#showLeftPush").parent().toggleClass('menu-fix');
                    //                $(contenPush).toggleClass("cbp-spmenu-push");
                    classie.toggle(contenPush, 'cbp-spmenu-push-toleft');
                    //		disableOther('showLeftPush');
                };


                function disableOther(button) {
                    //				if( button !== 'showLeft' ) {
                    //					classie.toggle( showLeft, 'disabled' );
                    //				}
                    //				if( button !== 'showRight' ) {
                    //					classie.toggle( showRight, 'disabled' );
                    //				}
                    //				if( button !== 'showTop' ) {
                    //					classie.toggle( showTop, 'disabled' );
                    //				}
                    //				if( button !== 'showBottom' ) {
                    //					classie.toggle( showBottom, 'disabled' );
                    //				}
                    if (button !== 'showLeftPush') {
                        classie.toggle(showLeftPush, 'disabled');
                    }
                    //				if( button !== 'showRightPush' ) {
                    //					classie.toggle( showRightPush, 'disabled' );
                    //				}
                }
                function cargarEstudiosAcademicos(){
                    $("#cont_estudioAcademico").html();
                    
                }
            </script>
        </div>
<!--    </body>
</html>-->