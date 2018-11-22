<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva entrada</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logor.jpg">
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
        <img src="imagenes/logo.png"  class="uno" >
    
        <h1>BLOG EL PATIO FILOSÓFICO</h1>
    </div>
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
                <h1>NUEVA ENTRADA</h1>
            </div>
        </header>

        <div class="container">



	<p>Bienvenido al formulario de entradas para el Blog. Este formulario es exclusivo para subir artículos al blog y no permite entradas dirigidas a otras partes del portal web. </p>

            <form action="transacciones.php" method="POST" enctype="multipart/form-data" name="form1">
                <table >
                    <tr>
                        <td>Título *
                            <label for="titulo"></label></td>
                        <td><input type="text" name="titulo" id="titulo" class="titulo" placeholder="Escribe el título del Artículo" required></td>
                    </tr>
                    <tr><td>Contenido * 
                            <label for="area_comentarios"></label></td>
                        <td><textarea name="articulo" id="ckeditor" class="ckeditor" placeholder="Escribe el cuerpo del Artículo..." required></textarea></td>
                    </tr>
                    <input type="hidden" name="MAX_TAM" value="2097152">
                    <tr>
                        <td colspan="2" align="center" class="texto">Seleccione una imagen con tamaño inferior a 2 MB </td></tr>
                    <tr>
                        <td colspan="2" align="left"><input type="file" name="avatar" id="imagen" class="inputuno" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="guardar" class="btn btn-primary" value="Publicar Artículo"></td></tr>
                    <tr><td colspan="2" align="center"><a href="blog.php" class="tras">Página de visualización del blog</a></td></tr>

                </table>
            </form>

</div>
<?php
 require 'footer.php';
?>
