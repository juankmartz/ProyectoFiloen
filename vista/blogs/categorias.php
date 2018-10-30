
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
    <title>Categorías "El Patio Filosófico"</title>
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
    <a href=""><img src="imagenes/logo.png" class="dos"></a>

    <h1>BLOG EL PATIO FILOSÓFICO</h1>
<header>
    
    <?php
    require 'barsup.php';
    ?>
    
</header>   
</div>

<div class="fontello">
    
</div>

<div class=" main row">
    <div class="iblog">     
        <img src="imagenes/logo.png" alt="Filosofia y enseñanza de la filosofia" class="uno" >
        <div>
            
           
        </div>
    </div>

    <?php
        require 'navegacion.php';
    ?>
</div>

<h3 class="titulo">AGREGAR CATEGORÍA</h3>
<hr class="linea">

<div class="row">

    <div class="col-xs-12 col-sm-9 col-md-9">

        <form name="form1" id="form1" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputFile" class="cate" >Nombre Categoría</label>
              <br>
              <input type="text" id="exampleInputFile" class="cat" placeholder="Escriba el nombre de la categoría" name="nombrecategoria">
            </div>
           
            <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
        </form>
        
        <?php
            if(isset($_POST['agregar'])) {
                $query = mysqli_query($connect, "INSERT INTO categorias (categoria) values ('".$_POST['nombrecategoria']."') ");
                
                if($query) {
                    echo "La categoría ha sido insertada correctamente";
                }else{
                    echo 'La categoría NO se agregó correctamente';
                }
            }
        ?>
        
        <br>
        <br>
        
        <h2>Mis categorías</h2>
        
        <?php
        $category = mysqli_query($connect, "SELECT * FROM categorias");
        
        while ($cat= mysqli_fetch_array($category))
        {
        ?>    
      
        <a href="category.php?id=<?php echo $cat['idCategorias']; ?>"><?php echo $cat['categoria']; ?></a>
        <br>
        
        
        <?php
        
        }
        ?>
        <br>
        <br>
        <a href="blog.php" class="btn btn-dark" >Ir al Blog</a>

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