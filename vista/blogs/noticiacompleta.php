<?php 
	include "../../controlador/conBD.php";
	include "funciones.php";
        
        $connect = conBD::conectar();
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artículo Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo.png">
    <link rel="stylesheet" href="css/noticiacompletas.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estiloss.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
 
<div class="roww">
   
    <h1>BLOG EL PATIO FILOSÓFICO</h1>  

    <a href=""><img src="imagenes/logo.png" class="dos"></a>

</div>

<header>
 <div class="fondo1">
            <h1>ARTÍCULO</h1>

          <?php
           require 'barsup2.php';
          ?>
    </div>

   </header>

    <?php
          require 'navegacion.php';
    ?>

<div class="main row">

    <div class="col-xs-12 col-sm-9 col-md-9">

      <?php 

	if (isset($_GET['id'])) {
		
		$query = mysqli_query($connect, "SELECT * FROM blog WHERE id = '".$_GET['id']."'");

		while ($row=mysqli_fetch_array($query)) {
		
		?>
		<div class="info">
		<h1><?php echo $row['Titulo']; ?></h1>
        <?php echo $row['Fecha']; ?>
        <br/>
        <br/>
        <p><?php echo $row['articulo']; ?></p>
		<br/>
        <a href="blog.php"><?php echo "Volver a Mi Blog"; ?></a>
        <br/> <br/>

        

		<?php 
			}
		?>
			<form id="form1" name="form1" method="post" action="">

				<h4><label for="textfield">Deja tu comentario</label></h4>

                                <p><textarea name="comentario" cols="90" rows="4" id="textfield" required></textarea></p>

				<p><input type="submit" class="btn btn-primary" name="guardar" value="Comentar" /></p>
			
			</form>
			<br/>
			<?php 
				if (isset($_POST['guardar'])) {
					
					$insert = mysqli_query($connect, "INSERT INTO comentarios (comentario, not_id) values ('".$_POST['comentario']."','".$_GET['id']."')"); 

					if ($insert) { echo "El comentario se ha agregado";}
				}

				 ?>
			<h4>Comentarios:</h4>
			
			</div>	
			<?php 

			$coment = mysqli_query($connect, "SELECT * FROM comentarios WHERE not_id = '".$_GET['id']."' ORDER BY id DESC");

			while ($com=mysqli_fetch_array($coment)) {
				?>
				<hr>
				<div class="comentarios"><p><?php echo $com['comentario']; ?></p></div>
				<?php  
			}
				?>
		<?php 
			}
		?>
        

    </div>

    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="menuAplicaciones">
            <h4 class="informacion">-- Más opociones de menú --</h4>
            <nav><ul>
                <li> <a href="agregarnoticia.php"> <img src="imagenes/publicaciones.png" alt=""> Nueva Entrada</a></li>
                <li> <a href="#">Mi Perfil</a></li>
                <li> <a href="">Perfiles</a></li>
                <li> <a href="">Noticias</a></li>
                <li> <a href="">Comunidades</a></li>
                <li> <a href="">Contáctenos</a></li>
                </ul>
            </nav>
        </div>

    </div>



<?php
            require 'footer.php';
?>


</body>
</html>
<?php            mysqli_close($connect); ?>
