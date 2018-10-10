<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acerca de FiloEn</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/acercaaFiloEnn.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 

    <script>
            function mostrarMensaje(){
                alert("Para ver Comunidad, ingresa tu usuario y contraseña!")
            }
    </script>

</head>
<body>

<div class="logo">
    <img src="imagenes/logo1.png" alt="Filosofia y enseñanza de la filosofia" width="80px">
    <div class="slogan">
        <h4>Filosfofía y Enseñanza de la Filosofía</h4>
        <h2>FiloEn</h2>
    </div>
</div>
                                
        <div class="ingreso">
            <li><a href="ingreso.php"><span><img src="Imagenes/iniciara.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
            <li><a href="registro.php"><span><img src="Imagenes/registroa.png" alt="" width="20px"></span> Registrarse</a></li>
    </div>

    <header>
        <div class="fondo1">
                <h1>COMUNIDAD FILOEN</h1>
        </div>
    </header>

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

<h3 class="titulo">Nuestra Comunidad</h3>
<hr class="linea">
<section class="main container col-md-12">

<div class="row">
    <section class="postsi col-md-12">

<article class="post clearfix col-md-12">
    <div class="cuadro1">

    <a href="#" class="thumb pull-left">
        <img src="imagenes/grupofilo.jpeg" height="400" alt="grupo FiloEn" > 
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
    
    <form action="contactenos.php">
    <button type="submit" class="btn btn-primary">Enviar Correo</button>
    </form>

    <a href="http://www.uis.edu.co/"><img src="imagenes/uis.png" ></a>

   </div>
    </article>

    </section>

</div>
</section>
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
    
</body>
</html>