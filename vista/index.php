
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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontello.css" >
        <link rel="stylesheet" href="css/estilos.css" >
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
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
                            <li> <a href="ingreso.php" onclick="mostrarMensaje()" >Comunidad</a></li>
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
            </nav>
        </div>

        <div class="encabezado">
            <img src="imagenes/logo1.png" alt="FiloEn" width="60px">
        </div>

        <div class="encabezado2">
            <h4>Filosofía y Enseñanza de la Filosofía</h4>
            <h2 class="filoen">FiloEn</h2>
        </div> 

        <div class="ingreso">
            <li><a href="#1" onclick="cargarPagina('ingreso.php','contenedorPrincipal', true)"><span><img src="Imagenes/iniciar.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
            <li><a href="registro.php"><span><img src="Imagenes/registro.png" alt="" width="20px"></span> Registrarse</a></li>
        </div>
        <div class="content-fluid" id="contenedorPrincipal">

           
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
                    Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
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
