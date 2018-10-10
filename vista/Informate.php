<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infórmate Portal filoEn</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/Informates.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css" >


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
    <div class="encabezado">
        <img src="imagenes/logo1.png" alt="Aristó" width="100px">
    </div>

    <div class="encabezado2">
        <h4>Filosofía y Enseñanza de la Filosofía</h4>
        <h2 class="filoen">FiloEn</h2>
    </div> 
                
    <div class="ingreso">
        <li><a href="ingreso.php"><span><img src="Imagenes/iniciara.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
        <li><a href="registro.php"><span><img src="Imagenes/registroa.png" alt="" width="20px"></span> Registrarse</a></li>
    </div>

    <header>
 
        <div class="fondo1">
            <div class="fondo2">
            <img src="imagenes/a.png"/>
            <h1>Infórmate</h1>
            </div>
            <div class="movimiento">
                    <ul>
                        <li><p>Infórmate de todo lo que puedes hacer con FiloEn...</p></li>
                        <li><p>Descubre la nueva forma de aprender la Filosofía...</p></li>
                        <li><p><p>Entérate de los nuevos servicios que aquí vas a encontrar...</p></p></li>
                        
                    </ul>
            </div>
            
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
<div class=" main-container">
<div class="media">

    <div class="media-left">
      <a href="#">
        <img src="imagenes/30.png" alt="" width="300" height="200">
      </a>
    </div>
    <div class="media-body">
            <div class="texto1">
            <h1>Comparte y aprende en comunidad</h1>
            <p>En FiloEn puedes aprender la filosofía de una forma sencilla, divertida y con tu grupo de amigos.
               El estudio en comunidad es la mejor forma de adquirir conocimiento, compartiendo y aportando con tu opinión y la de tus compañeros sobre los temas de interés.
            </p>
        </div>
    </div>
</div>
<br>
<br>
<hr class="lineas">

<div class="media">
    
    <div class="media-body">
        <div class="texto2">
            <h1>Comunícate con nuestro Chat interactivo</h1>
            <p>
                Con características únicas y una plataforma académica, podrás chatear tranquilamente con los usuarios que necesites, estar conectado desde cualquier lugar y gestionar tus estudios filosóficos.
                Aprovechando al máximo los servicios que te ofrece FiloEn.
            </p>
        </div>
        <div class="media-left">
          <a href="#">
            <img src="imagenes/29.png" alt="" width="300" height="200">
          </a>
        </div>
    </div>
</div>

<br>
<br>
<hr class="lineas">

    <div class="media">
            <div class="media-left">
              <a href="#">
                <img src="imagenes/27.png" alt="" width="300" height="200">
              </a>
            </div>
        <div class="media-body">
            <div class="texto3">
                <h1>Crea grupos de estudio con diferentes usuarios, para el estudio de la filosofía</h1>
                <p>
                    FiloEn te permite reforzar tus conocimientos adquiridos en clase con tus amigos, desde tu casa; creando grupos virtuales para el acompañamiento
                     de tus estudios. Esta metodología, permite crear comunidad, comunicación e integración con usuarios nuevos, interesados en hacer parte.
                </p>
            </div>
        </div>

    </div>
<br>
<br>
<hr class="lineas">

    <div class="media">

            <div class="texto4">
                <h1>Crea un blog para tu información personal</h1>
                <p>
                   Con FiloEn, mantener tu información personal a la mano ahora es muy fácil. En tu blog, podrás subir el mejor contenido educativo en pro de la comunidad, brindando la oportunidad a los otros usuarios de comentar y compartir cualquier información de su interés; ayudando así
                   a los interesados de la filosofía.
            </div>
                <div class="media-left">
                  <a href="#">
                    <img src="imagenes/28.png" alt="" width="300" height="200">
                  </a>
                </div>
            
        </div>

<br>
<br>
<hr class="lineas">

    <div class="media">

         <div class="media-left">
          <a href="#">
            <img src="imagenes/26.png" alt="" width="280" height="190">
          </a>
        </div>
        <div class="media-body">
            <div class="texto5">
            <h1>Publica, descarga y comenta documentos, multimedia y más </h1>
            <p>
                Encuentra el mejor recurso educativo gratis, todo en un mismo sitio. FiloEn te permite publicar en tu perfil académico y encontrar videos, imágenes, artículos y más;
                además, crear tu propia información y mostrar tu contenido educativo original. 
            </p>
            </div>
        </div>
    </div>

<br>
<br>
<hr class="lineas">

    <div class="media">
        <div class="media-body">
            <div class="texto6">
                <h1>Últimas noticias de la Filosofía</h1>
                <p>
                   Esté informado de las últimas noticias, eventos, diplomados y contenido filosófico. FiloEn se intereza en sus usuarios para que tengan la mayor información lo más actualizada posible.
            </div>
                <div class="media-left">
                  <a href="#">
                    <img src="imagenes/22.png" alt="" width="300" height="200">
                  </a>
                </div>
        </div>
    </div>

<br>
<br>
<br>

</div>
    <footer>

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
</body>
</html>