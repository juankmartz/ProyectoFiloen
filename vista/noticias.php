<!DOCTYPE html>
<?PHP
include '../controlador/conBD.php';

session_start();
$limiteNoticias = 2;
if(isset($_SESSION["iduser"])){
    $limiteNoticias = 10;
}
$conn = conBD::conectar();
$sentenciaSQL = "SELECT * FROM `noticia` ";
$existenRegistro = mysqli_query($conn, $sentenciaSQL);
?>

    <h3 class="titulo">Últimas Noticias</h3>
    <hr class="linea">
    <?php
    // noticias destacadas
    $sql = "SELECT `noticia`.`idnoticia`,
    `noticia`.`titulo`,
    `noticia`.`subtitulo`,
    `noticia`.`contenido`,
    `noticia`.`imagen`,
    `noticia`.`tipo_multimedia`,
    `noticia`.`fecha`,
    `noticia`.`idusuario`,
    `noticia`.`enlace`,
    `noticia`.`estado`,
    `noticia`.`fecha_modifico`
FROM `noticia` WHERE estado = 'DESTACADA' limit ".$limiteNoticias;
    $resultado = mysqli_query($conn, $sql);
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	?>
        <div class="row">
    	<div class="col-xs-10 col-xs-offset-1 col-md-5">
    	    
    		<!--<img  class="media-object img-noticia" src="Imagenes/28.png" width="300px" alt="...">-->
		    <?php if ($fila["tipo_multimedia"] == "VIDEO") {
			?> 
			<video width="300" class="video-noticia-dest" controls id="noticia_<?php echo $fila["idnoticia"] ?>" >
			    <source src="<?php echo $fila["imagen"] ?>" >
			    Your browser does not support HTML5 video.
			</video>
			<?php
		    } else
		    if ($fila["tipo_multimedia"] == "IMAGEN") {
			?><img src="<?php echo $fila["imagen"]; ?>" alt="" ><?php
		    } else
		    if ($fila["tipo_multimedia"] == "YOUTUBE") {
			?><img class="media-object img-noticia" width="300px" src="<?php echo $fila["imagen"]; ?>" alt="" ><?php
		    }
		    ?>
    	
    	</div>
    	<div class="col-xs-10 col-xs-offset-1 col-md-7">
    	    <h4 class="media-heading"><?php echo $fila["titulo"]; ?></h4>
    	    <p class="text-max-170"><?php echo $fila["contenido"]; ?><p><br><a href="#" class="btn btn-primary btn">Leer más</a></p>
    	</div>

        </div>
	<?php
    }
    ?>
    <div class="content-fluid">
	<div class="row">
	    <?php
// noticias normales
	    $sql1 = "SELECT `noticia`.`idnoticia`,
    `noticia`.`titulo`,
    `noticia`.`subtitulo`,
    `noticia`.`contenido`,
    `noticia`.`imagen`,
    `noticia`.`tipo_multimedia`,
    `noticia`.`fecha`,
    `noticia`.`idusuario`,
    `noticia`.`enlace`,
    `noticia`.`estado`,
    `noticia`.`fecha_modifico`
FROM `noticia` WHERE estado = 'ACTIVA' limit ".$limiteNoticias;
	    $resultado1 = mysqli_query($conn, $sql1);
	    while ($fila = mysqli_fetch_array($resultado1, MYSQLI_ASSOC)) {
		?>

    	    <div class="col-md-6  col-xs-12">
    		<div class="cuerpo-noticia">
    		    <div class="row">
			    <?php if ($fila["tipo_multimedia"] == "VIDEO") {
				?> 
				<video width="400" class="video-noticia" controls id="noticia_<?php echo $fila["idnoticia"] ?>">
				    <source src="<?php echo $fila["imagen"] ?>" >
				    Your browser does not support HTML5 video.
				</video>
				<?php
			    } else
			    if ($fila["tipo_multimedia"] == "IMAGEN") {
				?><img src="<?php echo $fila["imagen"]; ?>" alt="" ><?php
			    } else
			    if ($fila["tipo_multimedia"] == "YOUTUBE") {
				?><img src="<?php echo $fila["imagen"]; ?>" alt="" ><?php
			    }
			    ?>

    		    </div>
    		    <div class="row">
    			<h4><?php echo $fila["titulo"]; ?></h4>
			<p class="text-noticia-normal"><?php echo $fila["contenido"]; ?></p> <br>
			<div><a href="#" class="btn btn-primary btn-sm">Leer más</a></div>
			
    		    </div>
    		</div>
    	    </div>

		<?php
	    }
	    ?>
	</div>
    </div>

   


