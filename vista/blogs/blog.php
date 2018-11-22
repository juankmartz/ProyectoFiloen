<?php 
//	include "cn.php";
	include "funciones.php";
        include '../../controlador/conBD.php';
	
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog "El Patio Filosófico"</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logor.jpg">
    <link rel="stylesheet" href="css/blogg.css">
    <link rel="stylesheet" href="css/estiloss.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
 
<div class="row">
    <a href=""><img src="imagenes/logo.png" class="dos" ></a>

    <h1>BLOG EL PATIO FILOSÓFICO</h1>
<header>
    
    <?php
    require 'barsup.php';
    ?>
    
</header>   
</div>

<div class="fontello">
    
</div>

<div class="row">
    <div class="iblog">     
        <img src="imagenes/logo.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
        <div>
            
           
        </div>
    </div>

    <?php
        require 'navegacion.php';
    ?>
</div>

<h3 class="titulo">ARTÍCULOS</h3>
<hr class="linea">

<p class="cat"> Todos los artículos</p>

<div class="main row">

    <div class="col-xs-12 col-sm-9 col-md-9">

        <article class="main"> 

            <?php 
$connect = conBD::conectar();
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
                        
		$noticia = mysqli_query($connect, "SELECT * FROM blog ORDER BY Fecha DESC");
    	
		 	while ($fila = mysqli_fetch_assoc($resultado)) {
 
		 ?>
            
		<?php 

        $cont = mysqli_query($connect, "SELECT * FROM comentarios WHERE not_id = '".$fila['id']."'");
        $contar = mysqli_num_rows($cont);

        ?>
        <div>
            <a href="noticiacompleta.php?id=<?php echo $fila['id']; ?>"><h2 class="primo"><?php echo $fila['Titulo']; ?></h2></a>
        
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

