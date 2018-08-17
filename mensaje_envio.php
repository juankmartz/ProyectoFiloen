<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal FiloEn</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

    <link rel="stylesheet" href="css/mensaje_envio.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" >
    <link rel="stylesheet" href="css/estilos.css" >


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
          $('.flexslider').flexslider();
        });
      </script>

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
    
<div id="header">
        <nav class="navegacion">
            <ul class="menus">
                <li> <a href="index.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>
                <li> <a href="informate.php">Infórmate</a></li>
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
            </ul>
        </li>
        <li> <a href="contactenos.php">Contáctenos</a></li>
        </ul>
        </nav>
</div>

<div class="container">
<section class="form_wrap">
    <section class="mensaje-exito">
        <h1>¡Su mensaje se ha enviado exitosamente!</h1>

        <a href="contactenos.php">Enviar otro mensaje a FiloEn</a>
        <a href="registro.php">Ir a registro de usuarios FiloEn</a>
    </section>

</section>
<img src="imagenes/FiloEn.png">
</div>
    

<footer >
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