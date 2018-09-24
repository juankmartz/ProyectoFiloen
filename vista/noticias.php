<!DOCTYPE html>
<?PHP
include '../controlador/conBD.php';


$conn = conBD::conectar();
$sentenciaSQL = "SELECT * FROM `noticia` ";
$existenRegistro = mysqli_query($conn, $sentenciaSQL);
?>
<html>
    <head>
        <link rel="stylesheet" href="css/fontello.css" >
        <link rel="stylesheet" href="css/estilos.css" >
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <style>
            .cuerpo-noticia > .row > img{
                max-height: 200px;
            }
            .img-noticia{
                max-width: calc( 99% + 1px );
            }
            @media only screen and (max-width: 950px) {
                .text-max-170{
                    max-height: 170px;
                    overflow: hidden;
                }
            }

        </style>
    </head>
    <body>
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
FROM `noticia` WHERE estado = 'DESTACADA'";
	$resultado = mysqli_query($conn, $sql);
	while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	    ?>
    	<div class="row">
    	    <div class="col-xs-10 col-xs-offset-1 col-md-5">
    		<a href="#">
    		    <img  class="media-object img-noticia" src="Imagenes/28.png" width="300px" alt="...">
    		</a>
    	    </div>
    	    <div class="col-xs-10 col-xs-offset-1 col-md-7">
    		<h4 class="media-heading"><?php echo $fila["titulo"]; ?></h4>
    		<p class="text-max-170"><?php echo $fila["contenido"]; ?><p><a href="#" class="btn btn-primary btn">Leer más</a></p>
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
FROM `noticia` WHERE estado = 'ACTIVA'";
		$resultado1 = mysqli_query($conn, $sql1);
		while ($fila = mysqli_fetch_array($resultado1, MYSQLI_ASSOC)) {
		    ?>

    		<div class="col-sm-6  col-xs-12">
    		    <div class="cuerpo-noticia">
    			<div class="row">
				<?php if ($fila["tipo_multimedia"] == "VIDEO") {
				    ?> 
				    <video width="400" controls id="noticia_<?php echo $fila["idnoticia"] ?>" >
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
    			    <h4>Titulo de la imagen</h4>
    			    <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
    			    <a href="#" class="btn btn-primary btn-sm">Leer más</a>
    			</div>
    		    </div>
    		</div>

		    <?php
		}
		?>
	    </div>
	</div>
	<!--        <div class="row">
		    <div class="col-xs-10 col-xs-offset-1 col-md-5">
			<a href="#">
			    <img  class="media-object img-noticia" src="Imagenes/28.png" width="300px" alt="...">
			</a>
		    </div>
		    <div class="col-xs-10 col-xs-offset-1 col-md-7">
			<h4 class="media-heading">Media heading</h4>
			<p class="text-max-170">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris. Aenean lobortis iaculis arcu, ut vehicula lectus fermentum eget. Suspendisse potenti. Donec sollicitudin auctor odio, non ultricies diam maximus nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel luctus magna. In hac habitasse platea dictumst.
			    Proin quis pretium mi, et mollis velit. Vivamus nec urna eget purus scelerisque aliquam id pellentesque orci. Curabitur sed odio sit amet tellus aliquet blandit in sit amet mauris. Curabitur consequat eros sed est tempus, eget euismod arcu consequat. Integer rhoncus dui ut ornare fringilla. Integer justo dolor, tincidunt et facilisis pharetra, dapibus accumsan mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ipsum neque, cursus in purus sed, fringilla fermentum dolor.</p>
			<p><a href="#" class="btn btn-primary btn">Leer más</a></p>
		    </div>
	
		</div>
	
		<div class="row">
	
		    <div class="col-xs-10 col-xs-offset-1 col-md-5">
			<a href="#">
			    <img  class="media-object img-noticia" src="Imagenes/25.png" width="300px" alt="...">
			</a>
		    </div>
		    <div class="col-xs-10 col-xs-offset-1 col-md-7">
			<h4 class="media-heading">Media heading</h4>
			<p class="text-max-170">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium leo at volutpat mollis. Nunc at nulla sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a blandit massa. Vestibulum ex massa, mollis nec mauris ac, lobortis porttitor nibh. Ut at metus sed felis ornare bibendum non vitae est. Proin luctus, ante pharetra ultricies auctor, metus sapien lobortis augue, sit amet eleifend dolor ante id mauris. Aenean lobortis iaculis arcu, ut vehicula lectus fermentum eget. Suspendisse potenti. Donec sollicitudin auctor odio, non ultricies diam maximus nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			    Pellentesque vel luctus magna. In hac habitasse platea dictumst.
			    Proin quis pretium mi, et mollis velit. Vivamus nec urna eget purus scelerisque aliquam id pellentesque orci. Curabitur sed odio sit amet tellus aliquet blandit in sit amet mauris. Curabitur consequat eros sed est tempus, eget euismod arcu consequat. Integer rhoncus dui ut ornare fringilla. Integer justo dolor, tincidunt et facilisis pharetra, dapibus accumsan mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ipsum neque, cursus in purus sed, fringilla fermentum dolor.</p>
	
			<p><a href="#" class="btn btn-primary btn">Leer más</a></p>
		    </div>
	
		</div>-->

	<!--        <div class="content-fluid">
		    <div class="row">
			<div class="col-sm-6  col-xs-12">
			    <div class="cuerpo-noticia">
				<div class="row"><img src="Imagenes/34.jpg" alt="" ></div>
				<div class="row">
				    <h4>Titulo de la imagen</h4>
				    <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
				    <a href="#" class="btn btn-primary btn-sm">Leer más</a>
				</div>
			    </div>
			</div>
	
			<div class="col-sm-6  col-xs-12">
			    <div class="cuerpo-noticia">
				<div class="row"><img src="Imagenes/fds.jpg" alt="" ></div>
				<div class="row">
				    <h4>Titulo de la imagen</h4>
				    <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
				    <a href="#" class="btn btn-primary btn-sm">Leer más</a>
				</div>
			    </div>
			</div>
	
			<div class="col-sm-6  col-xs-12">
			    <div class="cuerpo-noticia">
				<div class="row"><img src="Imagenes/ddd.jpg" alt="" ></div>
				<div class="row">
				    <h4>Titulo de la imagen</h4>
				    <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
				    <a href="#" class="btn btn-primary btn-sm">Leer más</a>
				</div>
			    </div>
			</div>
	
			<div class="col-sm-6 col-xs-12">
			    <div class="cuerpo-noticia">
				<div class="row"><img src="Imagenes/g1.gif" alt="" ></div>
				<div class="row">
				    <h4>Titulo de la imagen</h4>
				    <p>aque se ponde juan desscripoidicon de la for osf sdofnsd fisdfs flsdfljsfsdlfsdfsdfj sdfsdkf sdfsd fjsdf lsdfsdf</p>
				    <a href="#" class="btn btn-primary btn-sm">Leer más</a>
				</div>
			    </div>
			</div>
		    </div>
		</div>-->
    </body>
</html>
