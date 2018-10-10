<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acerca de El portal filosófico</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/acercaFiloEn_Compu.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
    
</head>
<body>

<div class="logo">
    <img src="imagenes/logo.jpeg" alt="Filosofia y enseñanza de la filosofia" width="80px">
    <div class="slogan">
       
    </div>
</div>

<header>
    <div class="fondo1">
            <h1>COMUNIDAD DE FILOSOFÍA</h1>

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
    </div>
</header>                            

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

<h3 class="titulo">Nuestra Comunidad</h3>
<hr class="linea">
<section class="main container col-md-12">

<div class="row">
    <section class="postsi col-md-12">

<article class="post clearfix col-md-12">
    <div class="cuadro1">

    <a href="#" class="thumb pull-left">
        <img src="imagenes/grupofilo.jpeg" width=400" alt="grupo FiloEn" > 
    </a>

    </div>

    <div class="cuadro2">
    <p class="post-contenido text-justify">El grupo Filosofía y Enseñanza de la Filosofía es un grupo interinstitucional avalado por las Universidades Pedagógica Nacional, Antioquia, Cauca e Industrial de Santander. Actualmente conformado por investigadores de estas universidades y de la Universidad de Texas-Arlington-EEUU. <br><br>
        En el 2020 nos consolidaremos como un grupo de investigación interdisciplinario interinstitucional de alta calidad que lidera un programa de investigación hemisférico soportado en los programas de pregrado, maestría y doctorado de las universidades que lo avalan, tanto para la formación de sus investigadores como para el desarrollo de proyectos de reflexión filosófica, de producción editorial y de producción de software, en el campo de la fenomenología, la hermenéutica, la formación, la enseñanza de la filosofía, la inteligencia artificial y los entornos virtuales para enseñanza e investigación.</p>
 
        <h2>¿Quiénes Somos?</h2>
    <p>
        Somos un grupo de investigación interinstitucional formado por investigadores que pertenecen a universidades públicas de Colombia y Estados Unidos que pone en el centro de sus estudios: el mundo de la vida, la constitución de la identidad personal y la identidad latinoamericana.
         <br> <p class="piepagina"> Grupo Filosofía y Enseñanza de la Filosofía FiloEn.</p>
        <br> <p class="letra">Si quieres hablar con alguno de nuestros profesionales del grupo FiloEn, puedes escribirnos al correo:
            
            Email <br>
            soporte.portalfiloen@gmail.com</p>
    </p>
    
    <form action="contactenos_Comp.php">
    <button type="submit" class="btn btn-primary">Enviar Correo</button>
    </form>

   </div>
    </article>

    </section>

</div>
</section>
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
    
</body>
</html>