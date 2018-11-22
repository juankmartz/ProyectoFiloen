<!DOCTYPE html>
<?php
include '../modelo/evento.php';
?>
<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>

-->   
<!--<link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">-->
<link rel="stylesheet" href="css/eventoss.css">
<!--    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 

</head>
<body>-->
<style>
    article.main {width: 49%;display: inline-block;}

    .media-left {
        margin: auto;
        /* margin-right: 33px; */
        width: 80%;
        margin-bottom: 17px;
    }

    img.media-object {
        width: 100%;
    }



    input::-webkit-input-placeholder { color: red; } 

    input:-moz-placeholder { /* Firefox 18- */ color: red; } 

    input::-moz-placeholder { /* Firefox 19+ */ color: red; } 

    input:-ms-input-placeholder { color: red; }
</style>
<!--
<div class="logo">
    <img src="imagenes/logo1.png" alt="Filosofia y enseñanza de la filosofia" width="80px">
    <div class="slogan">
        <h4>Filosfofía y Enseñanza de la Filosofía</h4>
        <h2>FiloEn</h2>
    </div>
</div>-->

<header>
    <!--    <div class="fondo1">
                <h1>EVENTOS</h1>
    
                <div class="boton">
                <nav class="navegacion2">
                    <ul class="menu2">
                        <li><a href="inicioEst.php"> <img src="imagenes/inicio2.png" alt="" title="Inicio" width="30px" height="30px"></a></li>
                        <li><a href=""> <img src="imagenes/Opcionesb.png" alt="Opciones" title="Opciones" width="30px" height="30px"></a>
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
                        <li><a href=""> <img src="imagenes/mensajes.png" alt="" title="Chat" width="30px" height="30px"></a></li>
                        <li><a href=""> <img src="imagenes/notificaciones.png" alt="" title="Notificaciones" width="30px" height="30px"></a></li>
                        <li><a href="index.php"> <img src="imagenes/salirb.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
                    </ul>
                </nav>
            </div>
        </div>-->
</header>                            

<!-- <div id="header">
    <nav class="navegacion">
        <ul class="menus">
            <li> <a href="inicioEst.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>
            <li> <a href="MuroYPerfEstud.php">Mi Perfil</a></li>
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
        </ul>
    </li>
    <li> <a href="">Actualidad <span class="icon icon-angle-down"></span></a>
        <ul class="submenu">
            <li> <a href="noticias.php">Noticias</a></li>
            <li> <a href="#">Eventos</a></li>
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
            <li> <a href="#">Grupos Comunidad</a></li>
            <li> <a href="#">Conferencias</a></li>
        </ul>
    </li>

    <li> <a href="contactenos_Comp.php">Contáctenos</a></li>
    </ul>
    </nav>
</div>-->

<section class="main container">

    <div class="row">

        <!--    <div class="col-md-3">
                <div class="menuAplicaciones">
                <h4 class="informacion">-- Más opociones de menú --</h4>
                    <nav><ul>
                        <li> <a href="InfoCuenta.php"> <img src="imagenes/personal.png" alt=""> Información Personal</a></li>
                        <li> <a href="#"> <img src="imagenes/perfiles.png" alt=""> Demás Perfiles</a></li>
                        <li> <a href="MiBlog.php"> <img src="imagenes/blog.png" alt=""> Mi Blog</a></li>
                        <li> <a href="MisGrupos.php"> <img src="imagenes/comunidad.png" alt=""> Comunidad</a></li>
                        <li> <a href="MisClases.php"> <img src="imagenes/clase.png" alt=""> Mis clases</a></li>
                        <li> <a href="Chat.php"> <img src="imagenes/chat.png" alt=""> Chat</a></li>
                        <li> <a href="eventos.php"> <img src="imagenes/eventos.png" alt=""> Eventos</a></li>
                        <li> <a href="http://filosofiayensenanza.uis.edu.co:8080/bibliotecadigitalfiloen"> <img src="imagenes/libros.png" alt=""> Libros</a></li>
                        <li> <a href="#"> <img src="imagenes/clima.png" alt=""> Clima</a></li>
                        </ul>
                        </nav>
                </div>
            </div>-->

        <div class="">


            <h3 class="titulo">Eventos Filosofía</h3>
            <hr class="linea">

            <img src="imagenes/Socrates.jpg" width="100%" class="portada">

            <?php
//             $event = new Evento();
            $todosEventos = evento::getTodosEventos();

//             print_r($todosEventos);
            $evento = new evento();
            foreach ($todosEventos as $evento) {
                ?>
            <article class="main"> 
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="<?php echo $evento->getImagen(); ?>" width="300px" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $evento->getNombre(); ?></h4>
                    <p class="parrafo"><?php echo $evento->getInformacion(); ?></p>

                    <p><a href="#" class="btn btn-primary btn-sm">Leer más</a></p>

                    <div class="redi">
                        <li><a class="texto1" href="#" title="Me gusta"><i class="fa fa-thumbs-up"></i></a></li>
                        <li><a class="texto1" href="#" title="Comentar"><i class="fa fa-comments"></i></a></li>
                        <li><a class="texto1" href="#" title="Compartir"><i class="fa fa-share-alt"></i></a></li>

                    </div>
                </div>

            </article>
            <?php
            }
            ?>
            <article class="main"> 

                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="Imagenes/congreso.png" width="300px" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">VII CONGRESO COLOMBIANO DE FILOSOFÍA</h4>
                    <p class="parrafo">Entre el 15 y 18 de agosto de 2018, se llevará a cabo el VII Congreso Colombiano de Filosofía, en las instalaciones de la Universidad Industrial de Santander en la ciudad de Bucaramanga - Colombia. Lo invitamos a participar en las modalidades de asistente, ponente con una conferencia en un simposio o en una mesa temática, o autor o comentarista de una publicación. El Congreso Colombiano de Filosofía es un evento académico de carácter internacional que convoca periódicamente (cada dos años) la Sociedad Colombiana de Filosofía (SCF) en estrecha coordinación con una o varias universidades en alguna ciudad del país.  </p>

                    <p><a href="#" class="btn btn-primary btn-sm">Leer más</a></p>

                    <div class="redi">
                        <li><a class="texto1" href="#" title="Me gusta"><i class="fa fa-thumbs-up"></i></a></li>
                        <li><a class="texto1" href="#" title="Comentar"><i class="fa fa-comments"></i></a></li>
                        <li><a class="texto1" href="#" title="Compartir"><i class="fa fa-share-alt"></i></a></li>

                    </div>
                </div>

            </article>

            <article class="main"> 

                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="Imagenes/12.jpg" width="300px" height="200px" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Encuentro Internacional de Filosofía: Pensar el Cuerpo</h4>
                    <p class="parrafo">El cuerpo ha llegado a ocupar, sin lugar a dudas, un lugar central no sólo en el ámbito de la filosofía, sino también en el de las ciencias sociales y humanas. La pregunta por lo que sea y pueda el cuerpo, vinculada a problemas como la verdad, el pensamiento, la conciencia, la naturaleza, los valores, el lenguaje y la cultura, no sólo se ha planteado al interior de la filosofía, sino que de hecho ha sido y es tema relevante de investigaciones actuales, especialmente las dadas en campos como la sociología, la antropología, el psicoanálisis, la educación, la comunicación y la psicología.   </p>

                    <p><a href="#" class="btn btn-primary btn-sm">Leer más</a></p>

                    <div class="redi">
                        <li><a href="#"><img src="imagenes/buena.png" alt="" title="Me gusta"></a></li>
                        <li><a href="#"><img src="imagenes/comentar.png" alt="" title="Comentar"></a></li>
                        <li><a href="#"><img src="imagenes/compartir.png" alt="" title="Compartir"></a></li>
                    </div>
                </div>



            </article>

            <section class="container">


                <div class="col-md-12" id="contNuevoevento">
                    <!--            <h4 class="titulo">Crea un nuevo evento</h4>
                                <form action="eventos.php" method="POST">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Título*</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" name="nombre" id="inputPassword3" placeholder="Título del evento" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="mensaje" class="col-sm-2 col-form-label">Mensaje*</label>
                                        <div class="col-sm-10">
                                            <textarea name="mensaje" class="form-control" id="mensaje" placeholder=" &#128388; Escriba aquí el texto..." required></textarea>
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                    <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="imagen" id="imagen" >
                                    </div>
                                    </div>
                                  
                                  <div class="form-group row">
                                    <div class="col-sm-10">
                                      <button type="submit" class="btn btn-primary">Publicar Evento</button>
                                    </div>
                                  </div>
                                </form>-->

                </div>

            </section>
            <script>
                cargarPagina('crearEvento.php', 'contNuevoevento', true);
            </script>

        </div>

    </div>
</section>

<!--<footer>
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
</html>-->