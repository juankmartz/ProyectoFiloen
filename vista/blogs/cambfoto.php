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
    <link rel="stylesheet" href="css/estiloblog.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estiloss.css">


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
       	<h1>ACTUALIZAR FOTO</h1>
    </div>
</header>

<div class="container">

	<p>Bienvenido al formulario de entradas para el Blog de FiloEn. Este formulario es exclusivo para subir artículos al blog y no permite entradas dirigidas a otras partes del portal web. </p>
  <?php   
        if(isset($_GET['id'])){
        $query= mysqli_query($connect, "SELECT * FROM foto WHERE id = '".$_GET['id']."'");
        while($row= mysqli_fetch_array($query)){
       ?> 
<?php
    if($row['avatar'] !=''){ ?>
        <img src="" height="100" width="100" />
    <?php } ?>
        
        <br/>
        <a href="editar_foto.php;">Editar foto</a>
        
        <?php
            }
            }
        ?>

        <form class="form1" action="" method="POST" enctype="multipart/form-data">
                
            <table>
                <tr>
                
                <img src="<?php echo $row['foto']; ?>" height="300" width="300" />
                <tr>
  <td colspan="2" align="center" class="texto">Seleccione una imagen con tamaño inferior a 2 MB </td></tr>
  <tr>
    <td colspan="2" align="left"><input type="file" name="foto" id="imagen" class="inputuno" required></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="guardar" class="btn btn-primary" value="Actualizar Foto"></td></tr>
  <tr><td colspan="2" align="center"><a href="blog.php" class="tras">Página de visualización del blog</a></td></tr> 
                
            </table>
        </form>
        
        <?php if(isset($_POST['guardar'])){
            $nombre = clean($_POST['txtnom']);
            
            $sql= mysqli_query($connect, "UPDATE foto SET nombre = '".$nombre."' WHERE id = '".$_GET['id']."'");
            
            if($sql){
                echo 'Se han actualizado los datos Correctamente';
            }
        }
        ?>
        <?php
    


?>


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

