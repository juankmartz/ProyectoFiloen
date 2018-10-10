<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
<!--        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <link href="pluging/bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="pluging/bootstrap4/js/bootstrap.js" type="text/javascript"></script>
        <script src="js/funcionesGenerales.js" type="text/javascript"></script>-->
        <title></title>
    </head>
    <body>
	<?php
	// put your code here
	?>
	<div class="container">
            <!--onsubmit="envioFormulario('formBuscar', 'contresultados', true); return false;"-->
            <form onsubmit="envioFormularioMultiPart2('formBuscar', 'contresultados', true); return false;" class="row" method="post" id="formBuscar" action="../controlador/usuarios.php" >
		<div class="col-sm-12 col-md-6">
		    <div class="btn-group" style="width: 100%">
                        <input name="criterio" type="text" class="form-control" placeholder="Criterios  de busqueda" aria-label="Username" aria-describedby="basic-addon1" required>
                        <button class="btn btn-default" onclick="$('#formBuscar').submit();"><a class="fa fa-search"></a> Buscar</button>
                        <!--<input type="submit" value="Buscar">-->
		    </div>
		</div>
                <input type="hidden" name="oper" value="Buscar perfiles">
<!--		<div class="col-sm-6 col-md-3">
                    <input type="check" name="filtroTipoUser">
                    <select class="form-control" name="tipo_usuario">
			<option value="ESTUDIANTE">Egresado</option>
			<option value="PROFESIONAL">Estudiante</option>
			<option value="PROFESOR">Profesores</option>
		    </select>
		</div>-->
		<!--administrador-->
<!--		<div class="col-sm-6 col-md-3">
		    <select class="form-control">
			<option value="a">Activos</option>
			<option value="b">Inactivo</option>
			<option value="c">Profesores</option>
		    </select>
		</div>-->

	    </form>
            <div class="row" id="contresultados"></div>
	</div>
    </body>
</html>
