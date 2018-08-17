<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Principal</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/inicioEst.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
          $('.flexslider').flexslider();
        });
      </script>

</head>
<body>

<div class="encabezado">
        <img src="imagenes/logo1.png" alt="FiloEn" width="100px">
    </div>
            
    <div class="encabezado2">
        <h4>Filosofía y Enseñanza de la Filosofía</h4>
        <h2 class="filoen">FiloEn</h2>
    </div> 

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
                <li><a href=""> <img src="imagenes/mensajes.png" alt="" title="Chat" width="30px" height="30px"></a></li>
                <li><a href=""> <img src="imagenes/notificaciones.png" alt="" title="Notificaciones" width="30px" height="30px"></a></li>
                <li><a href="index.php"> <img src="imagenes/salir.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
            </ul>
        </nav>
    </div>
        

    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="imagenes/32.jpg" alt="">
                <section class="flex-caption">
                    <p> <h1> Bienvenido a FiloEn</h1>
                    <h3>Un Sitio Web para la enseñanza y aprendizaje de la Filosofía...</h3></p>
                </section>
            </li>
    
            <li>
                    <img src="imagenes/valores.jpg" alt="">
                    <section class="flex-caption">
                        <p> <h1>Grandes beneficios</h1>
                        <h3>Entérate de los nuevos servicios para generar conocimiento filosófico...</h3></p>
                    </section>
                </li>
    
            <li>
                <img src="imagenes/fe.jpg" alt="">  
                <section class="flex-caption">
                    <p> <h1>Chat Interactivo</h1>
                    <h3>Tendrás participación activa con todos los Usuarios desde cualquier parte... </h3></p>
                </section>
            </li>
    
            <li>
                <img src="imagenes/reloj.jpg" alt="">
                <section class="flex-caption">
                        <p> <h1> Espacio para comunidad UIS</h1>
                            <h3>Regístrate y tendrás acceso fácil a información de la Filosofía... </h3></p>
                </section>
            </li>
    
            <li>
                <img src="imagenes/libros.jpg" alt="">
                <section class="flex-caption">
                        <p> <h1> Temas Comunes</h1>
                            <h3> Expresa y aprende conceptos filosóficos con diferentes tipos de Usuarios...</h3></p>
                </section> 
            </li>
        
            <li>
                <img src="imagenes/27.jpg" alt=""> 
                <section class="flex-caption">
                        <p> <h1> Conocimiento en Comunidad</h1>
                            <h3>Únete y crea comunidades para el aprendizaje de la Filosofía...</h3></p>
                </section> 
            </li>
        </ul>
    </div>

    <div id="header">
    <nav class="navegacion">
        <ul class="menus">
            <li> <a href="inicioEst.php">Inicio</a></li>
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
            <li> <a href="#">Noticias</a></li>
            <li> <a href="#">Eventos</a></li>
        </ul>
    </li>

    <li> <a href="">Temas Filosofía <span class="icon icon-angle-down"></span></a>
        <ul class="submenu">
            <li> <a href="#">Ver mapa de navegacion</a></li>
            <li> <a href="#">ver mapa</a></li>
        </ul>
    </li>

    <li> <a href="">Aplicaciones <span class="icon icon-angle-down"></span></a>
        <ul class="submenu">
            <li> <a href="#">Crear Foro</a></li>
            <li> <a href="#">Crear Grupo</a></li>
            <li> <a href="MiBlog.php">Mi Blog</a></li>
            <li> <a href="#">Solicitudes</a></li>
            <li> <a href="#">Mis Asignaturas</a></li>
        </ul>
    </li>

    <li> <a href="">Participa <span class="icon icon-angle-down"></span></a>
        <ul class="submenu">
            <li> <a href="#">Foros</a></li>
            <li> <a href="#">Grupos Comunidad</a></li>
            <li> <a href="#">Conferencias</a></li>
        </ul>
    </li>

    <li> <a href="contactenos_Comp.php">Contáctenos</a></li>
    </ul>
    </nav>
</div>

<h4 class="informacion">Información y más</h4>
<div class="prueba">
    <div class="menuAplicaciones">
        <nav><ul>
            <li> <a href="InfoCuenta.php"> <img src="imagenes/personal.png" alt=""> Información Personal</a></li>
            <li> <a href="#"> <img src="imagenes/perfiles.png" alt=""> Demás Perfiles</a></li>
            <li> <a href="MiBlog.php"> <img src="imagenes/blog.png" alt=""> Mi Blog</a></li>
            <li> <a href="MisGrupos.php"> <img src="imagenes/comunidad.png" alt=""> Comunidad</a></li>
            <li> <a href="#"> <img src="imagenes/leccion.png" alt=""> Mis Asignaturas</a></li>
            <li> <a href="MisClases.php"> <img src="imagenes/clase.png" alt=""> Mis clases</a></li>
            <li> <a href="Chat.php"> <img src="imagenes/chat.png" alt=""> Chat</a></li>
            <li> <a href="eventos.php"> <img src="imagenes/eventos.png" alt=""> Eventos</a></li>
            <li> <a href="http://filosofiayensenanza.uis.edu.co:8080/bibliotecadigitalfiloen"> <img src="imagenes/libros.png" alt=""> Libros</a></li>
            <li> <a href="#"> <img src="imagenes/clima.png" alt=""> Clima</a></li>
            </ul>
            </nav>
    </div>

    <h2 class="titulo1">Noticias</h2>
<div class="prueba2">
    <div class="primeras">
        <section>
        <article class="noticia">
            <div>
            <img src="imagenes/FestFilosofia.jpg" alt="Festival de Filosofìa" width="100px" height="65px">
            </div>
            <div>
            <h2>I Festival de Filosofía. 16, 17 y 18 de noviembre 2017</h2>
            <div class="parrafo1">
                <p>
                El I Festival de Filosofía, organizado por la Fundación Santillana y La Térmica en distintos puntos del centro de Málaga los días 16, 17 y 18 de noviembre, convoca a pensadores, filósofos y críticos de la cultura y los invita a mantener una vivaz controversia...
                </p>
            </div>
            <ul>
                <li class="vermas"> <a href="#"> Ver mas...</a></li>
            </ul>
            </div>
        
        </article>
        </section>
        
        <section>
                <article class="articulo1">
                <div>
                <img src="imagenes/han.jpg" alt="Byung-chul Han" width="100px" height="65px">
                </div>
                <div>
                <h2>La filosofía minimalista de Byung-Chul Han</h2>
                <div class="parrafo2">
                <p>
                    Desde los griegos la filosofía tenía como eje escrutar las incógnitas de la existencia, percibir el mundo a través del prisma de un equilibrado razonamiento, en que las ideas y la lógica intentaban desentrañar ese engranaje conocido...
                </p>
                </div>
                <ul>
                    <li class="vermas"> <a href="#"> Ver mas...</a></li>
                </ul>
                </div>
        
            </article>
        </section>
        
    </div>
    <br>

    <div class="segunda">
        <section>
            <article class="noticia3">
                <div class="nuevo">
                <img src="imagenes/revistaUIS.jpg" alt="Revista UIS" width="65px" height="100px" class="revista" >
                </div>
                <div class="mayor">
                <h2>Elementos formales de la felicidad. Una lectura no comprensiva de Aristóteles</h2>
                <h3>Revsita Filosofía UIS</h3>
                <div class="parrafo3">
                    <p>A lo largo de este artículo presentaré los elementos que conforman la idea de la felicidad para Aristóteles y al final presentaré algunas proposiciones epilogales sobre dicha idea como un fin no comprensivo, es decir, sin suscribir la posición...</p>
                </div>
                    
                <ul>
                    <li class="vermas"> <a href="#"> Ver mas...</a></li>
                </ul>
            </div> 
            </article>
        </section>
        
        <section>
            <article class="noticia4">
                <div class="modelo">
                <img src="imagenes/cohorte.jpg" alt="Doctorado en Filosofía" width="100px" height="65px">
                </div>
                <div>
                <h2>Inscripciones abiertas para la segunda cohorte del Doctorado en Filosofía</h2>
                <div class="parrafo4">
                    <p>
                        La Escuela de Filosofía de la UIS informa que se encuentran abiertas las inscripciones para la segunda cohorte del Doctorado en Filosofía.
                        En esta oportunidad el Comité de Posgrados ha determinado que se admitirán seis (6) estudiantes...
                    </p>
                </div>
                <ul>
                    <li class="vermas"> <a href="#"> Ver mas...</a></li>
                </ul>
            </div>
            </article>
        </section>
        </div>
    </div>
    </div>
    

<hr class="linea">    

<footer>
<div class="pie">
    <p>
    <a href="inicioEst.php">Inicio</a> | 
    <a href="contactenos_Comp.php">Contáctenos</a> |
    <a href="#">Registro</a> |
    <a href="#">Login</a> |                                                
    </p>
    <p>
            Copyright 2016. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
    </p>
                            
</div>

</footer>
    
</body>
</html>