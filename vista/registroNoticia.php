<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--<link href="pluging/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link href="pluging/lineControlEditor/editor.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="js/funcionesGenerales.js" type="text/javascript"></script>
        <!--<script src="js/jquery.min.js" type="text/javascript"></script>-->
        <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--<script src="pluging/bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>-->
        <script src="pluging/lineControlEditor/editor.js" type="text/javascript"></script>
    </head>
    <body>
	<?php
	include '../modelo/Usuario.php';
	session_start();

	if ($_SESSION['usuario']) {
	    $nombre = unserialize($_SESSION['usuario']);
	    ?> <script>
    		var noty = new NotificationFx({
    		    message: '<p>el usuario tiene session activa <?php echo $nombre->getNombre(); ?></p>',
    		    layout: 'growl',
    		    effect: 'slide',
    		    type: 'warning' // notice, warning or error
    		});
    		noty.show();
    	</script> <?php
	} else {

	    //sin session iniciada se redirecciona a la principal
	    /*
	     * hay que configurar para  que la ruta de origen 
	     * del proyecto se traiga directamente de BD o de archivo de configuracion
	     */
//            header('Location: /proyFiloen/');
	    echo 'no se encuentra la varialbe de session';
	}
	?>
        <!--<div class="container">-->
        <div id="ctn_notificacion"></div>
        <form enctype="multipart/form-data" id="formMultimedia" method="post" class="container mt-3" action="../controlador/Noticias.php"  onsubmit="envioFormularioMultiPart('formMultimedia', 'ctn_notificacion', true); return false;">
            <input type="hidden" name="oper" id="oper" value="nueva noticia" >
            <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
	    <div class="row">
                <div class="col-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Desea marcar como destacada esta noticia?</label><br>
                        <select name="estado" id="estado">
                            <option value="ACTIVA">Normal </option>
                            <option value="DESTACADA">Destacada </option>
                        </select>
                        <br>
                        <i class="text-muted texto6">Las noticas destacadas se muestran en la parte superior y con un mayor tamaño.</i>
                    </div>
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    <div class="form-group">
                        <label>Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo">
                    </div>
                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea class="form-control" rows="10" style="resize: none;" id="txtEditor" name="contenido">hola</textarea> 
                    </div>
                </div>
                <div class="col-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="link_noticia">Enlace noticia:</label>
                        <input type="text" class="form-control" name="enlace" placeholder="enlace de la noticia completa..." maxlength="500" id="link_noticia">
                    </div>
                    <div class="form-group">
                        <label for="multimedia">Multimedia:</label>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Acción 
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#1" onclick="ocultarVideo('multimedia');">cargar imagen <i class="fa fa-image"></i></a></li>
                                    <li><a href="#1" onclick="ocultarImagen('multimedia');" >cargar video <i class="fa fa-film"></i></a></li>

                                </ul>
                            </div>

                        </div>
                        <i class="text-muted texto6">seleccione el archivo de la imagen o video relacionado a esta noticia, tambien puede copiar el enlace si se ecuentra almacenado en algun servidor externo.</i>                         
                    </div>
                    <div class="form-group">
                        <img id="prev_imagen" width="50%" height="50%" src="" />
                        <video width="400" controls id="rep_video" >
                            <source src="mov_bbb.mp4" id="prev_video">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <div class="form-group">
                        <!--<div class="form-group">-->
                        <input type="submit" value="Publicar" class="btn btn-primary">
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <input type="file" name="multimedia" id="multimedia"  >
            <input type="hidden" name="tipoMultimedia" id="tipoMultimedia"  value="x" id="operMultimedia">
        </form>


        <form enctype="multipart/form-data" id="formuploadajax" method="post" action="../controlador/pruebaNoticiaArchivo.php" onsubmit="envioFormMultiPart2('#formuploadajax', 'mensaje', true); return false;">
            Nombre: <input type="text" name="nombre" placeholder="Escribe tu nombre">
            <br />
            <input  type="file" id="archivo1" name="archivo1" onchange="ocultarVideo('multimedia');previsualizarImage(this, 'prev_imagen');"/>
            <br />
            <input  type="file" id="archivo2" name="archivo2" onchange="ocultarImagen('multimedia');previsualizarVideo(this, 'rep_video');"/>
            <br />
            <input type="button" value="Subir archivos" onclick="estoSeraunAlert"/>
        </form>
        <div id="mensaje"></div>
        <script>

	    $('#rep_video').hide();
	    $('#prev_imagen').hide();
	    $maxiTamanoArchivo = 8000000;
	    function ocultarVideo(filImg) {
		$('#rep_video').hide();
		document.getElementById('rep_video').pause();
		$("#" + filImg).val('');
		$("#multimedia").off('change');
		$("#multimedia").change(function () {
		    var fileSize = this.files[0].size;
		    if (fileSize > $maxiTamanoArchivo) {
			var noty = new NotificationFx({message: '<h5>Tamaño superado</h5><p>El archivo no debe superar los 8MB, por favor verifique e intente de nuevo</p>',
			    layout: 'growl', effect: 'slide', type: 'warning'});
			noty.show();
			$("#multimedia").val('');
		    } else {
			previsualizarImage(this, 'prev_imagen');
		    }
		    
		});
		$("#tipoMultimedia").val('imagen');
		$("#multimedia").attr("accept", "image/x-png,image/gif,image/jpeg");
		$("#multimedia").click();

//                var $source = $(#rep_video).children('source');
//                $source[0].src = URL.createObjectURL('');
	    }
//	    function validarArchivo() {
//		var fileSize = $("#multimedia").files[0].size;
//		if (fileSize > maxi_tamano_archivo) {
//		    var noty = new NotificationFx({message: '<h5>Tamaño superado</h5><p>El archivo no debe superar los 8MB, por favor verifique e intente de nuevo</p>',
//			layout: 'growl', effect: 'slide', type: 'warning'});
//		    noty.show();
//		}else{
//		    envioFormularioMultiPart('formMultimedia', 'ctn_notificacion', true);
//		}
//	    }
	    function ocultarImagen(filVid) {
		$('#prev_imagen').hide();
		$("#" + filVid).val('');
		$("#multimedia").off('change');
		$("#multimedia").change(function () {
		    var fileSize = this.files[0].size;
		    if (fileSize > $maxiTamanoArchivo) {
			var noty = new NotificationFx({message: '<h5>Tamaño superado</h5><p>El archivo no debe superar los 8MB, por favor verifique e intente de nuevo</p>',
			    layout: 'growl', effect: 'slide', type: 'warning'});
			noty.show();
			$("#multimedia").val('');
		    } else {
			previsualizarVideo(this, 'rep_video');
		    }

		});
		$("#tipoMultimedia").val('video');
		$("#multimedia").attr("accept", "video/mp4,video/x-m4v,video/*");
		$("#multimedia").click();
	    }
	    function previsualizarImage(inpuFile, contImagen) {
		var file = inpuFile.files[0],
			imageType = /image.*/;

		if (!file.type.match(imageType))
		    return;

		var reader = new FileReader();
		reader.onload = function fileOnload(e) {
		    var result = e.target.result;
		    $('#' + contImagen).attr("src", result);
		    $('#' + contImagen).show();
		};
		reader.readAsDataURL(file);
	    }
	    function previsualizarVideo(inputFile, contVideo) {
		var $source = $('#' + contVideo).children('source');
		$source[0].src = URL.createObjectURL(inputFile.files[0]);
		$source.parent()[0].load();
//                   document.getElementById(contVideo).pause()
		$('#' + contVideo).show();
	    }

//                function fileOnload(e) {
//                    var result = e.target.result;
//                    $('#imgSalida').attr("src", result);
//                }

        </script>
        <!--        <form enctype="multipart/form-data" method="post" action="../controlador/Noticias.php" onsubmit="envioFormulario(this,'ctn_notificacion',true);return false;">
                    <input type="file" name="multimedia"  id="fileMultimedia">
                    <input type="hidden" name="oper"  value="xxx" id="operMultimedia">
                    <input type="hidden" name="idnoticia"  value="" id="idnoticia">
                    <input type="submit"  value="guardar imagen" id="btnMultimedia" class="">
                </form>-->
        <script>
	    $(document).ready(function () {
//                $("#txtEditor").Editor();
	    }
	    );
        </script>
        <!--</div>-->
    </body>
</html>
