<?php

/* session_start();

  include "cn.php";
  include "funciones.php";

  if (!isset($_SESSION['usuario'])) {
  header("Location: index.php");

  }
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Página Principal</title>

        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
        <link rel="stylesheet" href="css/inicioEst.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <link rel="stylesheet" href="css/fontello.css">


        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
        <script src="http://code.jquery.com/jquery-latest.js"></script> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/funcionesGenerales.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function () {
                $('.flexslider').flexslider();
            });
        </script>
        
        
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
        
        <div class="boton">
            <nav class="navegacion2">
                <ul class="menu2">
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
                    <li><a href="index.php"> <img src="imagenes/salirb.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
                </ul>
            </nav>
        </div>
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
                    <li> <a href="inicioEst.php"><span><img src="Imagenes/inicio.png" alt="" width="20px"></span> Inicio</a></li>
                    <li> <a href="MuroYPerfEstud.php?id=<?php echo $_SESSION['id']; ?> "><span><img src="Imagenes/persona.png" alt="" width="20px"></span> Filósofos<span class="icon icon-angle-down"></span></a>
                    <ul class="submenu">
                            <li> <a href="#">Perfiles</a></li>
                            <li> <a href="blogs/blog.php">Mi Blog</a></li>
                        </ul>
                    </li>
                    <li> <a href="#"><span><img src="Imagenes/grupo_1.png" alt="" width="20px"></span> Comunidad<span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Grupos</a></li>
                            <li> <a href="">Blog</a></li>
                            <li> <a href="">Perfil</a></li>
                            <li> <a href="Informate_comp.php">Infórmate</a></li>
                            <li> <a href="acercaFiloEn_Comp.php">Acerca de FiloEn</a></li>
                        </ul> 
                    </li>
                    <li> <a href="#"><span><img src="Imagenes/not.png" alt="" width="20px"></span> Noticias</a></li>
                    
                    <li> <a href=""><span><img src="Imagenes/eve.png" alt="" width="20px"></span> Eventos</a></li>

                    <li> <a href=""><span><img src="Imagenes/herramienta.png" alt="" width="20px"></span> Herramientas <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="blogs/">Agregar Noticia</a></li>
                            <li> <a href="">Figuras Retóricas</a></li>
                            <li> <a href="">Biblioteca</a></li>
                        </ul>
                    </li>

                    <li> <a href="contactenos_Comp.php"><span><img src="Imagenes/contactenos.png" alt="" width="20px"></span> Contáctenos</a></li>
                </ul>
            </nav>
        </div>

        <div class="encabezado">
            <img src="imagenes/logo.jpeg" alt="el patio filosófcio">
        </div>
      
        <div class="content-fluid" id="contenedorPrincipal">

           
        </div>
        <div id="loader"></div>

  
        <footer>
            <div class="pie">
                <p>
                    <a href="inicioEst.php">Inicio</a> | 
                    <a href="contactenos_Comp.php">Contáctenos</a> |
                    <a href="#">Registro</a> |
                    <a href="#">Login</a> |                                                
                </p>
                <p>
                    Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
                </p>

            </div>
        </footer>
    </body>
</html>