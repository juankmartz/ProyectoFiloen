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
    <title>Blog FiloEn</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/blogss.css">
    <link rel="stylesheet" href="css/estiloss.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
 
<div class="row">
    <a href="http://www.uis.edu.co/webUIS/es/academia/facultades/cienciasHumanas/escuelas/filosofia/programasAcademicos/filosofia/index.jsp?variable=37"><img src="imagenes/uis.png" class="dos" alt="Escuela de filosofía UIS"></a>

    <h1>BLOG FILOEN</h1>
<header>
    
    <div class="boton">
        <nav class="navegacion2">
            <ul class="menu2">
                <li><a href="inicioEst.php"> <img src="imagenes/inicio.png" alt="" title="Inicio" width="30px" height="30px"></a></li>
                <li><a href=""> <img src="imagenes/Opciones.png" alt="Opciones" title="Opciones" width="30px" height="30px"></a>
                    <ul class="submenu2">
                            <li><a href=""> <span><img src="imagenes/mensajes2.png" width="20px" height="20px"></span> Mensajes</a></li>
                            <li><a href=""> <span><img src="imagenes/solicitud.png" width="20px" height="20px"></span> Solicitudes de Amistad</a></li>
                            <li><a href=""> <span><img src="imagenes/Sgrupo.png" width="20px" height="20px"></span> Solicitudes de Grupo</a></li>
                            <li><a href=""> <span><img src="imagenes/anuncio.png" width="20px" height="20px"></span> Crear un Anuncio</a></li>
                            <li><a href="tareas.php"> <span><img src="imagenes/tareas.png" width="20px" height="20px"></span> Tareas</a></li>
                            <li><a href=""> <span><img src="imagenes/privacidad2.png" width="20px" height="20px"></span> Privacidad</a></li>
                            <li><a href=""> <span><img src="imagenes/config.png" width="20px" height="20px"></span> Configuración</a></li>
                            <li><a href=""> <span><img src="imagenes/problema2.png" width="20px" height="20px"></span> Reportar un Problema</a></li>
                        </ul>
                </li>
                <li><a href=""> <img src="imagenes/mensajes.png" alt="" title="Chat" width="30px" height="30px"></a></li>
                <li><a href=""> <img src="imagenes/notificaciones.png" alt="" title="Notificaciones" width="30px" height="30px"></a></li>
                <li><a href="index.php"> <img src="imagenes/salir.png" class="salir" alt="Cerrar Sesión" title="Cerrar Sesión" width="30px" height="30px"></a></li>
            </ul>
        </nav>
    </div>
    
</header>   
</div>

<div class="fontello">
    
</div>

<div class=" main row">
    <div class="iblog">     
        <img src="imagenes/logo2.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
        <div>
            <h4>Filosfofía y Enseñanza de la Filosofía</h4>
            <h2>FiloEn</h2>
        </div>
    </div>

    <div id="header">
    <nav class="navegacion">
        <ul class="menus">
            <li> <a href=""><span><img src="Imagenes/home.png"></span> Inicio</a></li>
            <li> <a href="">Sobre Mí</a></li>
            <li> <a href="#">Intereses <span class="icon icon-angle-down"></span></a></li>
            <li> <a href="#">Videos <span class="icon icon-angle-down"></span></a></li>
        </ul>
    </nav>
    </div>
</div>

<h3 class="titulo">ARTÍCULOS</h3>
<hr class="linea">

<div class="main row">

    <div class="col-xs-12 col-sm-9 col-md-9">

        <article class="main"> 

            <?php 

            $por_pagina = 5;

			if (isset($_GET['pagina'])) {
				$pagina = $_GET['pagina'];
			}else{
				$pagina = 1;
			}

			//la pagina inicia en 0 y se multiplica $por_pagina

			$empieza = ($pagina-1)* $por_pagina;

			//seleccionar los registros de la tabla usuarios con LIMIT

			$query = "SELECT * FROM blog LIMIT $empieza, $por_pagina";
			$resultado = mysqli_query($connect, $query);

			?>

			<?php 
		$noticia = mysqli_query($connect, "SELECT * FROM blog ORDER BY id DESC");
    		
		 	while ($fila = mysqli_fetch_assoc($resultado)) {
		 		 
		 	?>
		<?php 
		

        $cont = mysqli_query($connect, "SELECT * FROM comentarios WHERE not_id = '".$fila['id']."'");
        $contar = mysqli_num_rows($cont);

        ?>
        <div>
        <a href="noticiacompleta.php?id=<?php echo $fila['id']; ?>"><h2><?php echo $fila['Titulo']; ?></h2></a>
        
        <p><?php echo $fila['Fecha']; ?></p>
     
        <div class="contenido">
        <p class="letra"><?php echo $fila['articulo']; ?></p>
        </div>

        
        <hr class="linea">
        <div class="opciones">
	        <a href="noticiacompleta.php?id=<?php echo $fila['id']; ?>" class="leer" ><?php echo "Leer más..."; ?></a>  
	        <a href="" class="gusta"><img src="imagenes/gusta.png" title="Me gusta"></a>
	        <div class="coment"><img src="imagenes/comentarios.png" title="Comentarios"> (<?php echo $contar; ?>)</div>
      	</div>
        <hr class="linea">
         <br/> 
         <hr>

        <?php 
 ?>
		 	<?php 	
		 	
		 	};
		  ?>

<div class="paginacion">
<?php 

	//seleccionar todo sobre la tabla de blog

$query = "SELECT * FROM blog";

$resultado = mysqli_query($connect, $query);

//contar el total de registros

$total_registros = mysqli_num_rows($resultado);

//usando ceil para dividir el total de registros entre $por_pagina

$total_paginas = ceil($total_registros / $por_pagina);

// link a la primera página

echo "<a href='blog.php?pagina=1'>".' Primera '."</a>";

for ($i= 1; $i<=$total_paginas; $i++) { 
	echo "<a href='blog.php?pagina= " .$i. "'>" .$i. "</a>";
}

//link a la ultima página

echo "<a href= 'blog.php?pagina=$total_paginas'>".' Última '."</a>";


	 ?>
	 </div>
</div>

        </article>

    </div>

    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="menuAplicaciones">
            <h4 class="informacion">-- Más opociones de menú --</h4>
            <nav><ul>
                <li> <a href="agregarnoticia.php"> <img src="imagenes/publicaciones.png" alt=""> Nueva Entrada</a></li>
                <li> <a href="">Inicio</a></li>
                <li> <a href="#">Mi Perfil</a></li>
                <li> <a href="">Perfiles</a></li>
                <li> <a href="">Noticias</a></li>
                <li> <a href="">Foros</a></li>
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

