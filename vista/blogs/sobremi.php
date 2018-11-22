<?php 
	include "../../controlador/conBD.php";
	include "funciones.php";
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil profeisional: El Patio Filosófico</title>
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
    <img src="imagenes/logo.png" class="dos" alt="Escuela de filosofía UIS">

    <h1>BLOG EL PATIO FILOSÓFICO</h1>
<header>
    
    <?php
     require 'barsup.php';
    ?>
    
</header>   
</div>

<div class="fontellos">
    
</div>

<div class=" main row">
    <div class="iblog">     
        <img src="imagenes/logo.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
     
    </div>

    <?php
        require 'navegacion.php';
    ?>
</div>

<h3 class="titulo">PERFIL PROFESIONAL</h3>
<hr class="linea">

<div class="row">

    <div class="col-xs-12 col-sm-9 col-md-9">

        <article class="main"> 

            <div class="col-xs-12 col-sm-8 col-md-8">

                    <?php 
                    $connect= conBD::conectar();
                        $query = mysqli_query($connect, "SELECT * FROM minfo");

                        if ($not=mysqli_fetch_array($query)) {
                        
                        ?>
                        <div class="info">
                        <br/>
                        <p class="texto"><?php echo $not['sobremi']; ?></p>
                        <br/>
                        <a href="blog.php"><?php echo "Volver a Mi Blog"; ?></a>
                        <a href="info.php"><?php echo "Editar Perfil Profesional"; ?></a>
                        <br/>
                        </div>

                        <?php 
                            };
                         ?>
                
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                    <?php 

	if (isset($_GET['id'])) {
		
		$query = mysqli_query($connect, "SELECT * FROM foto WHERE id = '".$_GET['id']."'");

		while ($row=mysqli_fetch_array($query)) {
		
		?>
		<div class="info">
		<h1><?php echo $row['nombre']; ?></h1>
        <br/>
        <br/>
        <p><?php echo $row['articulo']; ?></p>
		<br/>

		<?php 
			}
        }
		?>
        
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

