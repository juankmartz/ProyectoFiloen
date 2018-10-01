
<html lang="esp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Portal FiloEn</title>
        <link href="pluging/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

        <link rel="stylesheet" href="css/flexsliderr.css" type="text/css">
        <link href="css/loaderEsferas.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontello.css" >
        <link rel="stylesheet" href="css/estilos.css" >
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->-->
<?php
session_start();
$user = NULL;
if(isset($_SESSION["user"])){
    
}

?>
        <style>



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
                <ul class="menus">
                    <li> <a href="index.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>
                    <li> <a href="informate.php">Infórmate</a></li>
                    <li> <a href="#">Nuestra Gente <span class="icon icon-angle-down"></span> </a>
                        <ul class="submenu">
                            <li> <a href="#">Perfiles</a></li>
                            <li> <a href="ingreso.php" onclick="mostrarMensaje()" >Comunidad</a></li>
                            <li> <a href="acercaFiloEn.php">Acerca de FiloEn</a></li>
                        </ul> 
                    </li>
                    <li> <a >Herramientas <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Aplicaciones</a></li>
                            <li> <a href="#1" onclick="cargarLoader()">Biblioteca</a></li>
                            <li> <a href="#1" onclick="cargarPagina('inicioUsuario.php', 'contenedorPrincipal', true)">ver Perfil</a></li>
                        </ul>
                    </li>
                    <li> <a href="contactenos.php">Contáctenos</a></li>
                </ul>
            </nav>
        </div>

        <div class="encabezado">
            <img src="imagenes/logo1.png" alt="FiloEn" width="60px">
        </div>

        <div class="encabezado2">
            <h4>Filosofía y Enseñanza de la Filosofía</h4>
            <h2 class="filoen">FiloEn</h2>
            <a href="http://www.uis.edu.co/"><img src="imagenes/uis.png" width="120px"></a>
        </div> 

        <div class="ingreso">
            <li><a href="#1" onclick="cargarPagina('ingreso.php','contenedorPrincipal', true)"><span><img src="Imagenes/iniciar.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
            <li><a href="registro.php"><span><img src="Imagenes/registro.png" alt="" width="20px"></span> Registrarse</a></li>
        </div>
        <div class="content-fluid" id="contenedorPrincipal">

            <!--            <h3 class="titulo">Últimas Noticias</h3>
                        <hr class="linea">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1 col-md-5">
                                <a href="#">
                                    <img  class="media-object img-noticia" src="Imagenes/28.png" width="300px" alt="...">
                                </a>
                            </div>
                            <div class="col-xs-10 col-xs-offset-1 col-md-7">
                                <h4 class="media-heading">Media heading</h4>
                                <p class="text-max-170">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris. Aenean lobortis iaculis arcu, ut vehicula lectus fermentum eget. Suspendisse potenti. Donec sollicitudin auctor odio, non ultricies diam maximus nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel luctus magna. In hac habitasse platea dictumst.
                                    Proin quis pretium mi, et mollis velit. Vivamus nec urna eget purus scelerisque aliquam id pellentesque orci. Curabitur sed odio sit amet tellus aliquet blandit in sit amet mauris. Curabitur consequat eros sed est tempus, eget euismod arcu consequat. Integer rhoncus dui ut ornare fringilla. Integer justo dolor, tincidunt et facilisis pharetra, dapibus accumsan mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ipsum neque, cursus in purus sed, fringilla fermentum dolor.</p>
                                <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                            </div>
            
                        </div>
            
                        <div class="row">
            
                            <div class="col-xs-10 col-xs-offset-1 col-md-5">
                                <a href="#">
                                    <img  class="media-object img-noticia" src="Imagenes/25.png" width="300px" alt="...">
                                </a>
                            </div>
                            <div class="col-xs-10 col-xs-offset-1 col-md-7">
                                <h4 class="media-heading">Media heading</h4>
                                <p class="text-max-170">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris. Aenean lobortis iaculis arcu, ut vehicula lectus fermentum eget. Suspendisse potenti. Donec sollicitudin auctor odio, non ultricies diam maximus nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Pellentesque vel luctus magna. In hac habitasse platea dictumst.
                                    Proin quis pretium mi, et mollis velit. Vivamus nec urna eget purus scelerisque aliquam id pellentesque orci. Curabitur sed odio sit amet tellus aliquet blandit in sit amet mauris. Curabitur consequat eros sed est tempus, eget euismod arcu consequat. Integer rhoncus dui ut ornare fringilla. Integer justo dolor, tincidunt et facilisis pharetra, dapibus accumsan mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ipsum neque, cursus in purus sed, fringilla fermentum dolor.</p>
            
                                <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                            </div>
            
                        </div>
            
                        <div class="content-fluid">
                            <div class="row">
                                <div class="col-sm-6  col-xs-12">
                                    <div class="cuerpo-noticia">
                                        <div class="row"><img src="Imagenes/34.jpg" alt="" ></div>
                                        <div class="row">
                                            <h4>Titulo de la imagen</h4>
                                            <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
                                            <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6  col-xs-12">
                                    <div class="cuerpo-noticia">
                                        <div class="row"><img src="Imagenes/fds.jpg" alt="" ></div>
                                        <div class="row">
                                            <h4>Titulo de la imagen</h4>
                                            <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
                                            <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6  col-xs-12">
                                    <div class="cuerpo-noticia">
                                        <div class="row"><img src="Imagenes/ddd.jpg" alt="" ></div>
                                        <div class="row">
                                            <h4>Titulo de la imagen</h4>
                                            <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
                                            <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-xs-12">
                                    <div class="cuerpo-noticia">
                                        <div class="row"><img src="Imagenes/g1.gif" alt="" ></div>
                                        <div class="row">
                                            <h4>Titulo de la imagen</h4>
                                            <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
                                            <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
        </div>
        <div id="loader"></div>
        <footer >
            <div class="pie">
                <p>
                    <a href="index.php">Inicio</a> | 
                    <a href="contactenos.php">Contáctenos</a> |
                    <a href="registro.php">Registro</a> |
                    <a href="ingreso.php">Login</a> |                                                
                </p>
                <p>
                    Copyright 2016. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
                </p>                               
            </div>
        </footer> 
        <script src="js/bootstrap.min.js"></script>   
        <script src="js/jquery-latest.js"></script> 

        <script src="js/jquery.min.js"></script>
        <script src="js/funcionesGenerales.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" charset="utf-8">
                                $(window).load(function () {
                                    $('.flexslider').flexslider();
                                    inicioLoader();
                                    
                                });
        </script>
    </body>
</html>
