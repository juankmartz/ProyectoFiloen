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
    <title>Artículo Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/noticiacompleta.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estiloss.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
 
<div class="roww">
   		<img src="imagenes/logo2.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
        <div>
        	<h4>Filosfofía y Enseñanza de la Filosofía</h4>
       		<h2>FiloEn</h2>
        </div>

    <h1>BLOG EL PATIO FILOSÓFICO</h1>  

    <a href="http://www.uis.edu.co/webUIS/es/academia/facultades/cienciasHumanas/escuelas/filosofia/programasAcademicos/filosofia/index.jsp?variable=37"><img src="imagenes/uis.png" class="dos" alt="Escuela de filosofía UIS"></a>

</div>

<header>
 <div class="fondo1">
            <h1>ARTÍCULO</h1>

            <div class="boton">
            <nav class="navegacion2">
                <ul class="menu2">
                    <li><a href="http://localhost/proyFiloen/vista/inicioest.php"> <img src="imagenes/inicio2.png" alt="" title="Inicio" width="30px" height="30px"></a></li>
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
            <li> <a href="blog.php"> Inicio</a></li>
            <li> <a href="sobremi.php">Sobre Mí</a></li>
            <li> <a href="#">Videos <span class="icon icon-angle-down"></span></a></li>
        </ul>
    </nav>
    </div>

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

<div class="footer1">
    <div class="row">
        <a href=""><img src="imagenes/ig.png"></a>
        <a href="https://www.facebook.com/"><img src="imagenes/fb.png"></a>
        <a href="https://twitter.com/?lang=es"><img src="imagenes/tw.png"></a>
        <a href=""><img src="imagenes/gg.png"></a>
        <a href="https://www.instagram.com/"><img src="imagenes/in.png"></a>
    </div>
</div>
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
</div>

</body>
</html>