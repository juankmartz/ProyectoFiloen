<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/InfoCuen.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
</head>
<body>
          

<div class="main">
        <form action="basededatos.php" method="POST">

            <h3>Información General</h3>


            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="col">
                    <label class="cambio" for="nombre" id="nombre">Cambiar Nombre</a></label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido">
                </div>
                <div class="col">
                    <label class="cambio" for="apellido" id="apellido">Cambiar Apellido</a></label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="documento">Numero Documento</label>
                    <input type="text" class="form-control" id="documento">
                </div>
                <div class="col">
                    <label class="cambio" for="documento" id="documento">Cambiar Número Documento</a></label>
                </div>
            </div>
        </div>
             <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputState">Tipo de Usuario </label >
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Código</label>
                    <input type="text" name="codigo" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="inputZip" placeholder="Código de Usuario" >  
                </div>
            </div>

        <div class="row">
                <div class="col">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion">
                </div>
                <div class="col">
                    <label class="cambio" for="direccion" id="direccion">Cambiar Dirección</a></label>
                </div>
            </div>
            

            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  placeholder="Email" name="correo" id="email">
                   
                </div>
                <div class="col">
                    <label class="cambio" for="email" id="email">Cambiar Correo Electrónico</a></label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad">
                </div>
                <div class="col">
                    <label class="cambio" for="ciudad" id="ciudad">Cambiar Ciudad</a></label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
                
</div>


</div>
</body>
</html>