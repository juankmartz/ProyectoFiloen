<?php 
	include "../../controlador/conBD.php";
//	include "funciones.php";
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicación Exitosa</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
    <link rel="stylesheet" href="css/estiloblog.css">
    <link rel="stylesheet" href="css/estiloss.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>

    <div class="fondo">
        
        <div class="container">
            <?php

            if (isset($_POST['guardar'])) {
		$connect = conBD::conectar();
			$query = mysqli_query($connect, "INSERT INTO blog (Titulo, articulo, Fecha) values ('".$_POST['titulo']."','".$_POST['articulo']."', NOW()) ");

		if ($query) {
			echo "<p>El artículo se ha agregado exitosamente</p>";
		}else{
			echo "El arículo no se ha podido publicar";
		}
	}

            ?>
            <br>
            <a href="agregarnoticia.php">Ir al Formulario</a> <a href="blog.php"> Ir a Mi Blog</a>
        </div>
    </div>




</body>
</html>
<?php            mysqli_close($connect); ?>
