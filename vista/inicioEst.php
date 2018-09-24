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

    </head>
    <body>

        <div class="boton">
            <nav class="navegacion2">
                <ul class="menu2">
                    <li><a href="inicioEst.php"> <img src="imagenes/inicio.png" alt="" title="Inicio" width="30px" height="30px"></a></li>
                    <li><a href=""> <img src="imagenes/Opciones.png" alt="Opciones" title="Opciones" width="30px" height="30px"></a>
                        <ul class="submenu2">
                            <li><a href=""> <span><img src="imagenes/mensajes2.png" width="20px" height="20px"></span> Mensajes</a></li>
                            <li><a href=""> <span><img src="imagenes/solicitud.png" width="20px" height="20px"></span> Solicitudes de Amistad</a></li>
                            <li><a href=""> <span><img src="imagenes/Sgrupo.png" width="20px" height="20px"></span> Solicitudes de Grupo</a></li>
                            <li><a href=""> <span><img src="imagenes/anuncio.png" width="20px" height="20px"></span> Crear un Anuncio</a></li>
                            <li><a href="tareas.php"> <span><img src="imagenes/tareas.png" width="20px" height="20px"></span> Tareas</a></li>
                            <li><a href=""> <span><img src="imagenes/privacidad2.png" width="20px" height="20px"></span> Privacidad</a></li>
                            <li><a href=""> <span><img src="imagenes/config.png" width="20px" height="20px"></span> Configuración</a></li>
                            <li><a href=""> <span><img src="imagenes/problema2.png" width="20px" height="20px"></span> Reportar un Problema</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> <img src="imagenes/mensajes.png" alt="" title="Chat" width="30px" height="30px"></a></li>
                    <li><a href="#"> <img src="imagenes/notificaciones.png" alt="" title="Notificaciones" width="30px" height="30px"></a></li>
                    <li><a href="logout.php"> <img src="imagenes/salir.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
                </ul>
            </nav>
        </div>

        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="imagenes/18.6.PNG" alt="Portal filoEn">
                    <section class="flex-caption">
                        <h1> Bienvenido a FiloEn</h1>
                        <p>Un Sitio Web para la enseñanza y aprendizaje de la Filosofía...</p>
                    </section>
                </li>

                <li>
                    <img src="imagenes/322.jpg" alt="Portal FiloEn">
                    <section class="flex-caption">
                        <h1>Grandes beneficios</h1>
                        <p>Entérate de los nuevos servicios para generar conocimiento filosófico...</p>
                    </section>
                </li>

                <li>
                    <img src="imagenes/fe.jpg" alt="Portal FiloEn">  
                    <section class="flex-caption">
                        <h1>Chat Interactivo</h1>
                        <p>Tendrás participación activa con todos los Usuarios desde cualquier parte... </p>
                    </section>
                </li>

                <li>
                    <img src="imagenes/46.png" alt="">
                    <section class="flex-caption">
                        <h1> Espacio para comunidad UIS</h1>
                        <p>Regístrate y tendrás acceso fácil a información de la Filosofía...</p>
                    </section>
                </li>

                <li>
                    <img src="imagenes/libross.png" alt="">
                    <section class="flex-caption">
                        <h1> Temas Comunes</h1>
                        <p>Expresa y aprende conceptos filosóficos con diferentes tipos de Usuarios...</p>
                    </section> 
                </li>

                <li>
                    <img src="imagenes/67.5.jpg" alt=""> 
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
                    <li> <a href="inicioEst.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>
                    <li> <a href="MuroYPerfEstud.php?id=<?php echo $_SESSION['id']; ?> ">Mi Perfil</a></li>
                    <li> <a href="#">Nuestra Gente <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Perfiles</a></li>
                            <li> <a href="">Comunidad</a></li>
                            <li> <a href="Informate_comp.php">Infórmate</a></li>
                            <li> <a href="acercaFiloEn_Comp.php">Acerca de FiloEn</a></li>
                        </ul> 
                    </li>
                    <li> <a href="#">Herramientas <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Figuras Retóricas</a></li>
                            <li> <a href="http://filosofiayensenanza.uis.edu.co:8080/bibliotecadigitalfiloen">Biblioteca</a></li>
                            <li> <a href="#" onclick=" cargarPagina('registroNoticia.php', 'contPrincipal', true);">registro notica</a></li>

                        </ul>
                    </li>
                    <li> <a href="">Actualidad <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="noticias.php">Noticias</a></li>
                            <li> <a href="eventos.php">Eventos</a></li>
                        </ul>
                    </li>

                    <li> <a href="">Aplicaciones <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="foros.php">Crear Foro</a></li>
                            <li> <a href="MisGrupos.php">Crear Grupo</a></li>
                            <li> <a href="MiBlog.php">Mi Blog</a></li>
                            <li> <a href="#">Solicitudes</a></li>
                        </ul>
                    </li>

                    <li> <a href="">Participa <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="foros.php">Foros</a></li>
                            <li> <a href="comunidad.php">Grupos Comunidad</a></li>
                            <li> <a href="#">Conferencias</a></li>
                        </ul>
                    </li>

                    <li> <a href="contactenos_Comp.php">Contáctenos</a></li>
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

        <h3 class="titulo">Noticias Recientes</h3>
        <hr class="linea">

        <div class="row">

            <div class="col-md-9">
                <section class="grupo1">
                    <article class="main"> 

                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="Imagenes/28.png" width="300px" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris.  </p>

                            <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                        </div>

                    </article>

                </section>


                <article class="main"> 

                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="Imagenes/25.png" width="300px" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris.  </p>

                        <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                    </div>

                </article>

                <article class="main"> 

                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="Imagenes/partenon.png" width="300px" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris.  </p>

                        <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                    </div>

                </article>

                <article class="main"> 

                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="Imagenes/simetrico.jpg" width="300px" height="200px" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris.  </p>

                        <p><a href="#" class="btn btn-primary btn">Leer más</a></p>
                    </div>

                </article>

            </div>

            <div class="col-md-3">
                <div class="menuAplicaciones">
                    <h4 class="informacion">-- Más opociones de menú --</h4>
                    <nav><ul>
                            <li> <a href="InfoCuenta.php"> <img src="imagenes/personal.png" alt=""> Información Personal</a></li>
                            <li> <a href="#"> <img src="imagenes/perfiles.png" alt=""> Demás Perfiles</a></li>
                            <li> <a href="MiBlog.php"> <img src="imagenes/blog.png" alt=""> Mi Blog</a></li>
                            <li> <a href="MisGrupos.php"> <img src="imagenes/comunidad.png" alt=""> Comunidad</a></li>
                            <li> <a href="Chat.php"> <img src="imagenes/chat.png" alt=""> Chat</a></li>
                            <li> <a href="eventos.php"> <img src="imagenes/eventos.png" alt=""> Eventos</a></li>
                            <li> <a href="http://filosofiayensenanza.uis.edu.co:8080/bibliotecadigitalfiloen"> <img src="imagenes/libros.png" alt=""> Libros</a></li>
                            <li> <a href="#"> <img src="imagenes/clima.png" alt=""> Clima</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

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