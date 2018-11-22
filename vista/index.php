<?php
include '../modelo/Usuario.php';
include '../modelo/Mensajeria.php';
?>
<html lang="esp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Portal FiloEn</title>
        <link href="pluging/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

        <link rel="stylesheet" href="css/flexslider.css" type="text/css">
        <link href="css/loaderEsferas.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="css/fontello.css" >-->
        <!--<link rel="stylesheet" href="css/estilos.css" >-->
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->

        <link href="pluging/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
        <link href="css/barraDesplazamiento.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link href="css/chats.css" rel="stylesheet" type="text/css"/>

        <!--         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">         
                    
                    
                    <?php
        session_start();
        $user = new Usuario();
        if (isset($_SESSION["usuario"])) {
//            print_r($_SESSION["usuario"]) ;
            $user = unserialize($_SESSION['usuario']);
        }
        ?>

        <style>

/*            .row img{
                padding: 0px 10px;
                width: 100%;
            }*/
            .text-max-170{
                width: 90%;
                text-align: justify;
            }



            .cuerpo-noticia > .row > img{
                max-height: 200px;
            }
            .img-noticia{
                max-width: calc( 99% + 1px );
            }
            @media only screen and (max-width: 950px) {
                .text-max-170{
                    max-height: 170px;
                    overflow: hidden;
                }
            }
            .video-noticia{
                width: 100%;
                max-height: 280px;
                background: rgba(17, 17, 17, 0.64);
                margin: 0;
                padding: 0;
                height: 100%;
            }
            .text-noticia-normal{
                overflow-y: hidden;
                max-height: 172px;

            }
            .video-noticia-dest {
                width: 90%;
            }
            a.btn-menu-superior > i {
                padding-bottom: 4px;
                margin-top: 10px;
            }
            a.btn-menu-superior {
                min-height: 50px;
                min-width: 50px;
                margin-left: 4px;
                border: 1px solid #ffffff3b;
                color: #fff;
                font-size: 30px;
                padding: 10px;
                padding-top: 0px;
                border-radius: 7px;
            }

            a.btn-menu-superior:hover {
                border: 1px solid rgba(255, 255, 255, 0.59);
                text-decoration: none;
                font-weight: 600;
                background: #ffffff40;
            }
        </style>
    </head>
    <body onload="cargarPagina('noticias.php', 'contenedorPrincipal', true);">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="imagenes/18.6.PNG" alt="Portal filoEn">
                    <section class="flex-caption">
                        <h1> Bienvenido a FiloEn </h1>
                        <p>Un Sitio Web para la enseñanza y aprendizaje de la Filosofía...</p>
                    </section>
                </li>

                <li style="display: none">
                    <img src="imagenes/322.jpg" alt="Portal FiloEn">
                    <section class="flex-caption">
                        <h1>Grandes beneficios</h1>
                        <p>Entérate de los nuevos servicios para generar conocimiento filosófico...</p>
                    </section>
                </li>

                <li style="display: none">
                    <img src="imagenes/fe.jpg" alt="Portal FiloEn">  
                    <section class="flex-caption">
                        <h1>Chat Interactivo</h1>
                        <p>Tendrás participación activa con todos los Usuarios desde cualquier parte... </p>
                    </section>
                </li>

                <li style="display: none">
                    <img src="imagenes/46.png" alt="">
                    <section class="flex-caption">
                        <h1> Espacio para comunidad UIS</h1>
                        <p>Regístrate y tendrás acceso fácil a información de la Filosofía...</p>
                    </section>
                </li>

                <li style="display: none">
                    <img src="imagenes/libross.png" alt="">
                    <section class="flex-caption">
                        <h1> Temas Comunes</h1>
                        <p>Expresa y aprende conceptos filosóficos con diferentes tipos de Usuarios...</p>
                    </section> 
                </li>

                <li style="display: none">
                    <img  src="imagenes/67.5.jpg" alt=""> 
                    <section class="flex-caption">
                        <h1> Conocimiento en Comunidad</h1>
                        <p>Únete y crea comunidades para el aprendizaje de la Filosofía...</p>
                    </section> 
                </li>
            </ul>
        </div>

        <div id="header">
            <nav class="navegacion">
                <?php
                if ($user->getId() > 0) {
                    ?>
                    <a href=""></a>
                    <ul class="menus row">
                        <!--<li> <a href="inicioEst.php"><span><img src="Imagenes/inicio.png" alt="" width="20px"></span> Inicio</a></li>-->
                        <li class="col"> <a class="btn btn-light" href="MuroYPerfEstud.php?id=<?php echo $_SESSION['id']; ?> ">
                                <i class="fa fa-user-alt"></i><span class="hidden-md-down">Filósofos</span><i class="icon icon-angle-down"></i></a>
                            <ul class="submenu">
                                <li> <a href="#1" onclick="cargarPagina('buscardorPerfiles.php', 'contenedorPrincipal', true);">Perfiles</a></li>
                                <li> <a href="blogs/blog.php">Mi Blog</a></li>
                            </ul>
                        </li>
                        <!--<li> <a href="#"><span><img src="Imagenes/grupo_1.png" alt="" width="20px"></span> Comunidad<span class="icon icon-angle-down"></span></a>-->
                        <li class="col"> <a href="#" class="btn btn-light"><i class="fa fa-users"></i><span class="hidden-md-down"> Comunidad</span><span class="icon icon-angle-down"></span></a>
                            <ul class="submenu">
                                <li> <a href="#1" onclick="cargarPagina('grupos.php', 'contenedorPrincipal', true);">Grupos</a></li>
                                <li> <a href="">Blog</a></li>
                                <li> <a href="#1" onclick="cargarPagina('inicioUsuario.php', 'contenedorPrincipal', true)">Perfil</a></li>
                                <li> <a href="#1" onclick="cargarPagina('buscardorPerfiles.php', 'contenedorPrincipal', true)">Demas perfil</a></li>
                                <li> <a href="Informate_comp.php">Infórmate</a></li>
                                <li> <a href="acercaFiloEn_Comp.php">Acerca de FiloEn</a></li>
                            </ul> 
                           
                        </li>
                        <!--<li> <a href="#"><span><img src="Imagenes/not.png" alt="" width="20px"></span> Noticias</a></li>-->

                        <!--<li> <a href=""><span><img src="Imagenes/eve.png" alt="" width="20px"></span> Eventos</a></li>-->
                        <li class="col"> <a href="#22" class="btn btn-light" onclick="cargarPagina('eventos.php', 'contenedorPrincipal', true)" ><i class="fa fa-trophy"></i><span class="hidden-md-down"> Eventos</span></a></li>

                        <!--<li> <a href=""><span><img src="Imagenes/herramienta.png" alt="" width="20px"></span> Herramientas <span class="icon icon-angle-down"></span></a>-->
                        <li class="col">
                            <a href="#1" class="btn btn-light"> 
                                <i class="fa fa-cogs"></i> <span class="hidden-md-down">Herramientas</span>
                                <span class="icon icon-angle-down"></span>
                            </a>
                            <ul class="submenu">
                                <li> <a href="blogs/">Agregar Noticia</a></li>
                                <li> <a href="">Figuras Retóricas</a></li>
                                <li> <a href="">Biblioteca</a></li>
                            </ul>
                        </li>

                        <li class="col"> <a  class="btn btn-light" href="#1" onclick="cargarPagina('contactenos_Comp.php', 'contenedorPrincipal', true)">
                                <i class="fa fa-envelope"></i><span class="hidden-md-down"> Contáctenos</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="menus">
                        <li> <a href="index.php"><span><img src="Imagenes/inicio.png" alt="" width="20px"></span> Inicio</a></li>
                        <li><a href="#"><span><img src="Imagenes/persona.png" alt="" width="20px"></span>Personas <span class="icon icon-angle-down"></span> </a>
                            <ul class="submenu">
                                <li> <a href="#">Perfiles</a></li>
                                <li> <a href="acercaFiloEn.php" >Nuestra Gente</a></li>
                                <li> <a href="informate.php">Infórmate</a></li>
                            </ul>       
                        </li>
                        <li> <a href="#"><span><img src="Imagenes/grupo_1.png" alt="" width="20px"></span> Grupos <span class="icon icon-angle-down"></span> </a>
                            <ul class="submenu">
                                <li> <a href="#ingreso.php" onclick="" >Comunidad</a></li>
                            </ul> 
                        </li>
                        <li> <a ><span><img src="Imagenes/herramienta.png" alt="" width="20px"></span> Herramientas <span class="icon icon-angle-down"></span></a>
                            <ul class="submenu">
                                <li> <a href="#">Aplicaciones</a></li>
                                <li> <a href="#1" onclick="cargarLoader()">Biblioteca</a></li>
                            </ul>
                        </li>
                        <li> <a href="contactenos.php"><span><img src="Imagenes/contactenos.png" alt="" width="20px"></span> Contáctenos</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>
        </div>
 
        <div class="ingreso">
            <?php
            if ($user->getId() == 0) {
                ?>
                <li><a href="#1" onclick="cargarPagina('ingreso.php', 'contenedorPrincipal', true)"><span><img src="Imagenes/iniciar.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
                <li><a href="#1" onclick="cargarPagina('registro.php', 'contenedorPrincipal', true)"><span><img src="Imagenes/registro.png" alt="" width="20px"></span> Registrarse</a></li>
                <?php
            } if ($user->getId() > 0) {
                ?>     
                <a href="logout.php" class="btn-menu-superior float-right" title="Salir del sistema">&phi;</a>
                <!--<a href="logout.php" class="btn-menu-superior float-right" title="Configuracion"><i class="fa fa-child"></i></a>-->
                <a href="#1" class="btn-menu-superior float-right" title="Chats"><i class="fa fa-comment"></i></a>
                <a href="#1" class="btn-menu-superior float-right" title="Notificaciones"><i class="fa fa-globe"></i></a>
                <!--<span class="badge">42</span>-->
                <a href="#1" class="btn-menu-superior float-right" onclick="cargarPagina('inicioUsuario.php', 'contenedorPrincipal', true)" title="Mi perfil"><i class="fa fa-child"></i></a>
                <a href="" class="btn-menu-superior float-right " title="Inicio"><i class="fa fa-university"></i></a>
                <!--<nav class="navegacion2">-->
                <!--                    <ul class="menu2">
                                        <li><a href="inicioEst.php"> <img src="imagenes/inicio2.png" alt="" title="Inicio" width="30px" height="30px"></a></li>
                                        <li><a href=""> <img src="imagenes/perfilb.png" alt="" title="Mi perfil" width="40px" height="30px"></a></li>
                                        <li><a href=""> <img src="imagenes/notificaciones.png" alt="" title="Notificaciones" width="30px" height="30px"></a></li>
                                        <li><a href=""> <img src="imagenes/mensajes.png" alt="" title="Chat" width="30px" height="30px"></a></li>
                                        <li><a href=""> <img src="imagenes/Opcionesb.png" alt="Opciones" title="Opciones" width="30px" height="30px"></a>
                                            <ul class="submenu2">
                                                <li><a href=""> <span><img src="imagenes/anuncio.png" width="20px" height="20px"></span> Crear un Anuncio</a></li>
                                                <li><a href="tareas.php"> <span><img src="imagenes/tareas.png" width="20px" height="20px"></span> Tareas</a></li>
                                                <li><a href=""> <span><img src="imagenes/privacidad2.png" width="20px" height="20px"></span> Privacidad</a></li>
                                                <li><a href=""> <span><img src="imagenes/config.png" width="20px" height="20px"></span> Configuración</a></li>
                                                <li><a href=""> <span><img src="imagenes/problema2.png" width="20px" height="20px"></span> Reportar un Problema</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="logout.php"> <img src="imagenes/salirb.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
                                    </ul>-->

                <!--</nav>-->
            <?php } ?>
        </div>     
        <div class="content-fluid" id="contenedorPrincipal" style="margin-top: 30px;"></div>
        <div id="loader"></div>
        <?php
        if ($user->getId() > 0) {
            ?>
            <!--inici de chat-->
            <div id="chat-content" style="overflow: hidden;">

                <div class="conversacion">
                    <?php
                    if($user->getId()== 7)$idRecibe = "1";
                    if($user->getId()== 1)$idRecibe = "7";

                    $mensajes = new Mensajeria();
                    $resp = $mensajes->buscarMensajesChatPorIdUser($user->getId(), $idRecibe);
                    $userRecibe = new Usuario();
                    $userRecibe = $userRecibe->UsuarioPorID($idRecibe);
                    
                    ?>
                    <div class="titulo-chat row-flow" data-toggle="collapse" data-target="#chat_<?php echo $idRecibe; ?>">
                        <span class="nomb-chat col-11"><?php echo $userRecibe->getNombre() ?></span><a href="#1" class="btn-closed col-1"  onclick="$(this).parents('.conversacion').remove();">x</a>
                    </div>
                    <div class="collapse " id="chat_<?php echo $idRecibe; ?>">
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
                                            <div class="nomb-cuerpo-chat"> <img class="img-user-chat" src="<?php echo $userRecibe->getAvatar(); ?>"> </div>
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

                        <div class="mensaje-chat ">
                            <script>
                                setInterval(function () {
                                    //                                    alert("buscando");
                                    var misdata = {
                                        'oper': 'cargarNuevoMensaje',
                                        'idchat': '<?php echo $idRecibe; ?>'
                                    };
                                    //                                    console.log(data);
                                    $.ajax({
                                        url: "../controlador/chats.php",
                                        type: "POST",
                                        dataType: 'html',
                                        data: 'oper=cargarNuevoMensaje&idchat=<?php echo $idRecibe; ?>',
                                    }).done(function (respuesta) {
                                        console.log(respuesta);
                                        //            alert("exito");
                                        $("#contCuerpoChat<?php echo $idRecibe; ?>").append(respuesta);
                                    });
                                    //                                    alert('fin');
                                }, 3700);
                                //                                alert("la funcion sirve");
                            </script>
                            <form  action="../controlador/chats.php" method="post" onsubmit="envioFormulario(this, 'contCuerpoChat<?php echo $idRecibe; ?>', false);
                                        $(this).find('textarea').val('');
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
                        var timers = [[0, "vacio"]];
                        document.getElementById('contCuerpoChat<?php echo $idRecibe; ?>').addEventListener("DOMSubtreeModified", function () {
                            altura = $(this).height();
                            $(this).parent().scrollTop(altura);
                        }, false);



                    </script>

                </div>
            </div>

            <!--final del chat-->
            <?php
        }
        ?>

        <footer >
            <div class="pie">
                <p>
                    <a href="index.php">Inicio</a> | 
                    <a href="#contactenos.php" onclick="cargarPagina('contactenos.php', 'contenedorPrincipal', true);">Contáctenos</a> |
                    <a href="#registro.php" onclick="cargarPagina('registro.php', 'contenedorPrincipal', true);">Registro</a> |
                    <a href="#ingreso.php" onclick="cargarPagina('ingreso.php', 'contenedorPrincipal', true);">Login</a> |                                                
                </p>
                <p>
                    Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
                </p>                               
            </div>
        </footer> 
        <!--<script src="js/jquery.min.js"></script>-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->


<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="pluging/bootstrap4/js/bootstrap.js" type="text/javascript"></script>
        <script src="js/funcionesGenerales.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="pluging/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="pluging/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="pluging/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
        <script src="pluging/lineControlEditor/editor.js" type="text/javascript"></script>
        <script src="../vista/pluging/bootstrap4/js/popper.min.js"></script>
        <script type="text/javascript" charset="utf-8">
                        $(window).load(function () {
                            $('.flexslider').flexslider();
                            inicioLoader();

                        });
                        document.getElementById('contCuerpoChat7').addEventListener("DOMSubtreeModified", handler, true);

                        function handler() {
                            alert("hola");
                        }
        </script>
    </body>
</html>
