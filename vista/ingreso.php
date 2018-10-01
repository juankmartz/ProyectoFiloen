<?php 

session_start();
//include "cn.php";
include "funciones.php";

if (isset($_SESSION['usuario'])) {
//    header("Location: inicioEst.php");
   /* ini_set('error_reporting', 0); */
}
 ?>
<!--
<!DOCTYPE html>

<html lang="esp">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

    <link rel="stylesheet" href="css/estilos.css" >
    <link rel="stylesheet" href="css/ingresar.css">
    <link rel="stylesheet" href="css/fontello.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
    para las notificaciones
    
    <link href="pluging/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
    <link href="pluging/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
    
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
    <script src="js/funcionesGenerales.js" type="text/javascript"></script>
</head>
<body>

    <div class="encabezado">
        <img src="imagenes/logo1.png" alt="FiloEn" width="90px">
    </div>

    <div class="encabezado2">
        <h4>Filosofia y Enseñanza de la Filosofia</h4>
        <h2 class="filoen">FiloEn</h2>
    </div> 
-->                
<!--    <div class="ingreso">
        <li><a href="ingreso.php"><span><img src="Imagenes/iniciara.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
        <li><a href="registro.php"><span><img src="Imagenes/registroa.png" alt="" width="20px"></span> Registrarse</a></li>
        </div>

    <header>
 
        <div class="fondo1">
            <div class="fondo2">
            <img src="imagenes/855.png"/>
            <h1>Comunidad FiloEn</h1>
            </div>
            <div class="movimiento">
                    <ul>
                        <li><p>Ingresa y descubre todos los servicios enfocados al aprendizaje de la FilosofÃ­a...</p></li>
                        <li><p>Registrate y aprende la Filosofia en Comunidad...</p></li>
                        <li><p>Hay una nueva forma de adquirir conocimiento filosÃ³fico...</p></li>
                        
                    </ul>
                </div>
        </div>
        
    </header>-->
<!--
    <div id="header">
        <nav class="navegacion">
            <ul class="menus">
                <li> <a href="index.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>            
                <li> <a href="informate.php">Informate</a></li>
                <li> <a href="#">Nuestra Gente <span class="icon icon-angle-down"></span></a>
            <ul class="submenu">
                <li> <a href="#">Perfiles</a></li>
                <li> <a href="ingreso.php" onclick="mostrarMensaje()">Comunidad</a></li>
                <li> <a href="acercaFiloEn.php">Acerca de FiloEn</a></li>
            </ul> 
        </li>
        <li> <a href="#">Herramientas <span class="icon icon-angle-down"></span></a>
            <ul class="submenu">
                <li> <a href="#">Aplicaciones</a></li>
                <li> <a href="#">Biblioteca</a></li>
                <li> <a href="#" onclick=" cargarPagina('registroNoticia.php','contPrincipal' , true);">registro notica</a></li>
            </ul>
        </li>
        <li> <a href="contactenos.php">ContÃ¡ctenos</a></li>
        </ul>
        </nav>
</div>
    -->
<h3 class="titulo">Ingresar</h3>
<hr class="linea">

<div id="resp"></div>
<div id="contPrincipal">
    
<form id="form1" name="form1" action="../controlador/iniciosession.php" method="post" onsubmit="envioFormulario(this, 'resp', true);return false;" >
  <div class="form-group row">
      <input type="hidden" name="oper" value="incio session">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre" name="usuario" maxlength="20" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="contraseña" name="contrasena" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="guardar" class="btn btn-primary">Ingresar a FiloEn</button>
    </div>
  </div>
<div class="container">
  <img src="Imagenes/FiloEn.png" alt="filosofia" width="200px" >
</div>
</form>
</div>

<!--
<footer>
<div class="pie">
    <p>
    <a href="index.php">Inicio</a> | 
    <a href="contactenos.php">Contactenos</a> |
    <a href="registro.php">Registro</a> |
    <a href="ingreso.php">Login</a> |                                                
    </p>
        <p>
            Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
        </p>
                        
</div>
</footer>-->
<script src="js/funcionesGenerales.js"></script>
<script src="pluging/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
<script src="pluging/NotificationStyles/js/classie.js" type="text/javascript"></script>
<script src="pluging/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
<!--
</body>
</html>-->