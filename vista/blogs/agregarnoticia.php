<?php 
	include "cn.php";
	include "funciones.php";
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva entrada</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/estiloblogss.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>

    <div class="row">
        <img src="imagenes/logo2.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
        <div>
        	<h4>Filosfofía y Enseñanza de la Filosofía</h4>
       		<h2>FiloEn</h2>
        </div>
        <h1>BLOG FILOEN</h1>
        <img src="imagenes/uis.png" class="dos">
    </div>

<header>
  	<div class="fondo1">
       	<h1>NUEVA ENTRADA</h1>
    </div>
</header>

<div class="container">

	<p>Bienvenido al formulario de entradas para el Blog de FiloEn. Este formulario es exclusivo para subir artículos al blog y no permite entradas dirigidas a otras partes del portal web. </p>



<form action="transacciones.php" method="POST" enctype="multipart/form-data" name="form1">
<table >
<tr>
  <td>Título *
    <label for="titulo"></label></td>
  <td><input type="text" name="titulo" id="titulo" class="titulo" placeholder="Escribe el título del Artículo" required></td>
  </tr>
  <tr><td>Contenido * 
    <label for="area_comentarios"></label></td>
    <td><textarea name="articulo" id="ckeditor" class="ckeditor" placeholder="Escribe el cuerpo del Artículo..." required></textarea></td>
    </tr>
    <input type="hidden" name="MAX_TAM" value="2097152">
  <tr>
  <td colspan="2" align="center" class="texto">Seleccione una imagen con tamaño inferior a 2 MB </td></tr>
  <tr>
    <td colspan="2" align="left"><input type="file" name="avatar" id="imagen" class="inputuno" required></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="guardar" class="btn btn-primary" value="Publicar Artículo"></td></tr>
  <tr><td colspan="2" align="center"><a href="blog.php" class="tras">Página de visualización del blog</a></td></tr>
  
  </table>
</form>


</div>
<div class="footer1">
	<div class="row">
		<img src="imagenes/ig.png">
		<img src="imagenes/fb.png">
		<img src="imagenes/tw.png">
		<img src="imagenes/gg.png">
		<img src="imagenes/in.png">
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
                Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
            </p>
                            
    </div>
</footer>

</body>
</html>