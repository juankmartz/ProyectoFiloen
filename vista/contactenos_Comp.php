<!DOCTYPE html>
<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctenos "El Patio Filosófico"</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/contactenos_Regs.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 

</head>
<body>

<div class="logo">
    <img src="imagenes/logo.jpeg" alt="Filosofia y enseñanza de la filosofia">
</div>-->

<!--<header>
    <div class="fondo2">
            <h1>CONTÁCTENOS</h1>

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
                    <li> <a href="MuroYPerfEstud.php?id=< ?php echo $_SESSION['id']; ?> "><span><img src="Imagenes/persona.png" alt="" width="20px"></span> Filósofos<span class="icon icon-angle-down"></span></a>
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
    -->
    
     <?php
			if (isset($_POST['send'])){
				include("../controlador/sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
				
				/*Configuracion de variables para enviar el correo*/
				$mail_username="elpatiofilosofico@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="patio0987654321";//Tu contraseÃ±a de gmail
				$mail_addAddress="elpatiofilosofico@gmail.com";//correo electronico que recibira el mensaje
				$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
				$mail_setFromEmail=$_POST['correo'];
				$mail_setFromName=$_POST['nombre'];
				$txt_message=$_POST['mensaje'];
				$mail_subject=$_POST['asunto'];
				
				sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
			}
		?>
        <h3 class="titulo">IMPORTANTE</h3>
    <hr class="linea">

<div class="container">

    <div class="col-md-12">

    <p>Por medio del buzón de sugerencias ayudará a mejorar los servicios de nuestro portal con sus opiniones. También puedes escribirnos si deseas recibir más información acerca del grupo de Filosofía y enseñanaza de la Filosofía "FiloEn".</p>
    </div>

    <div class="row">

        <div class="col-md-8">
            <form action="../controlador/sendemail.php" method="POST">
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
        <h2>Grupo "El Patio Filosófico"</h2>
        <p>
                Tu opinión es muy importante para nosotros... <br> Gracias por dejar tu comentario
                <br>
                <br>
                Email <br>
                fil.yensenanzadelafil@gmail.com <br> <br>
                <a href="http://www.filosofiayensenanza.org/inicio/">Grupo FiloEn</a>
        </p>

        <!--<img src="imagenes/a.png">-->
        </div>   
    </div>

</div>  
</div>
<!--
<footer>
<div class="pie">
        <p>
        <a href="inicioEst.php">Inicio</a> | 
        <a href="contactenos.php">Contáctenos</a> |
        <a href="#">Registro</a> |
        <a href="#">Login</a> |                                                
        </p>
            <p>
                Copyright 2016. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
            </p>
                            
    </div>

</footer>
</body>
</html>-->