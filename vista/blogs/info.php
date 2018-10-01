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
    <title>Actualizar iformación</title>
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
       	<h1>INFORMACIÓN SOBRE MÍ</h1>
    </div>
</header>

<div class="container">

	<p>Este espacio está creado para que escribas en él todo tipo de información referente a cada usuario; aquí puedes dar a conocer tus conocimientos e intereses personales, con el fin de crear comunidad compartiendo tus conocimientos con quienes lo requieren. </p>



<form action="" method="POST" enctype="multipart/form-data" name="form1">
<table >

  <td>Id *
    <label for="titulo"></label></td>
  <td><input type="text" name="id" id="titulo" class="titulo" placeholder="ID" required></td>
  <tr><td>Descripción * 
    <label for="area_comentarios"></label></td>
    <td><textarea name="sobremi" id="" cols="70" rows="5" placeholder="Escribe información personal que quiere que los otros usuarios vean..." required></textarea></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="guardar" class="btn btn-primary" value="Actualizar información personal"></td></tr>
  <tr><td colspan="2" align="center"><a href="sobremi.php" class="tras">Ir a Sobre Mí</a></td></tr>
  
  </table>
</form>


<div class="container">
            <?php

      if (isset($_POST['guardar'])) {
    
      $id = $_POST['id'];
      $info = $_POST['sobremi'];

      if ($id=="" || $info=="") {
        echo "Todos los campos son obligatorios";
      }else{
        //ACTUALIZAR TODOS LOS CAMPOS 
        $_UPDATE_SQL="UPDATE minfo set id=$id, sobremi='$info' WHERE id= '$id'";

        mysqli_query($connect, $_UPDATE_SQL);

        echo "<script>alert('Los datos se han actualizado correctamente');</script>";
      }
    }

            ?>
  </div>
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