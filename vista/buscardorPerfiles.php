<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--<html>
    <head>

    </head>
    <body>-->
	<?php
	// put your code here
//        parametrizar multiselect o individual, si se permite la seleccion. ver perfil 
	?>
	<div class="container" style="min-width: 150%">
            <h3>Buscar usuarios</h3>
            <!--onsubmit="envioFormulario('formBuscar', 'contresultados', true); return false;"-->
            <form onsubmit="envioFormularioMultiPart2('formBuscar', 'contresultados', true); return false;" class="row" method="post" id="formBuscar" action="../controlador/usuarios.php" >
		<div class="col-sm-12 col-md-6">
		    <div class="btn-group" >
                        <input name="criterio" type="text" class="form-control" placeholder="Criterios  de busqueda" aria-label="Username" aria-describedby="basic-addon1" required>
                        <button class="btn btn-default" onclick="$('#btnSubmitBusqueda').click();"><a class="fa fa-search"></a> Buscar</button>
                        <input type="submit" value="Buscar" style="display: none;" id="btnSubmitBusqueda">
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
