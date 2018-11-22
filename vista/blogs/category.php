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
    <title>Categorías</title>
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
    if(isset($_GET['id'])){
        
        $query = mysqli_query($connect, "SELECT * FROM blog WHERE id = '".$_GET['id']."'");
        
        while($row= mysqli_fetch_array($query))
        {
            
            $usuario = mysqli_query($connect, "SELECT * FROM categorias WHERE id = '".$row['categoria']."' ");
            $user = mysqli_fetch_array($usuario);
           ?>
        
        <a href="noticiacompleta.php?id=<?php echo $row['id']; ?>"><h2 class="primo"><?php echo $row['Titulo']; ?></h2></a>
        
        <p><?php echo $row['Fecha']; ?></p>
     
        <div class="contenido">
        <p class="letra"><?php echo $row['articulo']; ?></p>
        </div>
 			
        
        <hr class="linea">
        <div class="opciones">
	        <a href="noticiacompleta.php?id=<?php echo $row['id']; ?>" class="leer" ><?php echo "Leer más..."; ?></a>  
	        <a href="" class="gusta"><img src="imagenes/gusta.png" title="Me gusta"></a>
	       <div class="coment"><img src="imagenes/comentarios.png" title="Comentarios"> (<?php //echo $contar; ?>)</div>
      	</div>
        <hr class="linea">
         <br/> 
         <hr>
        
        <?php
        } 
        };
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