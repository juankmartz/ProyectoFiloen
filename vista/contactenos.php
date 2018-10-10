<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctenos</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/contactenoss.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">


     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <script> src="validarContactenos.js" </script>

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
        <div class="fondo2">
        <h1>CONTÁCTENOS</h1>
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

    <h3 class="titulo">IMPORTANTE</h3>
    <hr class="linea">

<div class="container">

    <div class="col-md-12">

    <p>Por medio del buzón de sugerencias ayudará a mejorar los servicios de nuestro portal con sus opiniones. También puedes escribirnos si deseas recibir más información acerca del grupo de Filosofía y enseñanaza de la Filosofía "FiloEn".</p>
    </div>

    <div class="row">

        <div class="col-md-8">
            <form action="enviar.php" method="POST">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombre" id="inputPassword3" placeholder="Nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Asunto</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="asunto" id="inputPassword" placeholder="Asunto">
                    </div>
                </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="correo" id="inputEmail3" placeholder="Email" required>
                </div>
              </div>
              
              <div class="form-group row">
                    <label for="mensaje" class="col-sm-2 col-form-label">Mensaje*</label>
                    <div class="col-sm-10">
                        <textarea name="mensaje" class="form-control" id="mensaje" placeholder=" &#128388; Escriba aquí su mensaje..." required></textarea>
                    </div>
                </div>
              
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Enviar Correo</button>
                </div>
              </div>
            </form>

        </div>

        <div class="col-md-4">
        <h2>Grupo FiloEn</h2>
        <p>
                Tu opinión es muy importante para nosotros... <br> Gracias por dejar tu comentario
                <br>
                <br>
                Email <br>
                soporte.portalfiloen@gmail.com <br> <br>
                <a href="http://www.filosofiayensenanza.org/inicio/">Grupo FiloEn</a>
        </p>

        <img src="imagenes/logo2.png">
        </div>
           
            
    </div>


</div>	
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