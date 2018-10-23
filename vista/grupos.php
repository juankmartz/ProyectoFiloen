<!DOCTYPE html>
<?php
include '../modelo/Mensajeria.php';
include '../modelo/Usuario.php';
?>
<!--<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Comunidad FiloEn</title>

        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">-->
<!--<link rel="stylesheet" href="css/comunidad.css">-->
<!--        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">


        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
        <script src="http://code.jquery.com/jquery-latest.js"></script> 

    </head>
    <body>-->
<style>

    .container h3{
        padding: 5px;
        position: relative;
        font-size: 110%;
        font-family: 'arial narrow';
        color: white;
        background: rgba(0,110,192,0.8);
        border-radius: 10px;
        border: 2px solid rgb(0,110,192);
    }
    .col-md-9 .portada{
    position: relative;
    width: 100%;
    margin: 20px;
}

.col-md-9 .wrapper{
    border: 1px solid lightgray;
    padding: 20px;
    border-radius: 5px;
}
</style>
<?php
session_start();
$user = new Usuario();
if (isset($_SESSION["usuario"])) {
    $user = unserialize($_SESSION['usuario']);
}
?>

<h3 class="titulo">Grupos</h3>
<hr class="linea">
<section class="main container col-md-12">
    <div class="controles col-6 offset-2" id="nuevogrupo">
        <h3>Nuevo grupo</h3>
        <form method="post" action="../controlador/chats.php" onsubmit="envioFormulario(this, 'nuevogrupo', false);return false;">
            <div class="form-group">
                <label>Nombre del grupo</label>
                <input class="form-control" name="nombre" maxlength="80" placeholder="maximo 80 caracteres" required>
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" name="descripcion" maxlength="200" placeholder="Una breve descripcion con un maximo de 200 caracteres" required></textarea>
            </div>
            <input type="hidden" name="oper" value="nuevo grupo"><hr>
            <input type="submit" value="Guardar" class="btn tbn-sm btn-primary">
            <!--<button name="oper" class="btn btn-primary" value="nuevo grupo" onclick="$(this).parent().submit();">Nuevo grupo</button>-->
        </form>
    </div>
              
    <!-- Modal -->
    <div class="modal fade" id="ModalInivtarGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container cuerpo-modal">
                        <!--onsubmit="envioFormulario('formBuscar', 'contresultados', true); return false;"-->
                        <form onsubmit="envioFormularioMultiPart2('formBuscar', 'contresultados', true); return false;" class="row" method="post" id="formBuscar" action="../controlador/chats.php" >
                            <div class="col-sm-12 col-md-6">
                                <div class="btn-group" style="width: 100%">
                                    <input name="criterio" type="text" class="form-control" placeholder="Criterios  de busqueda" aria-label="Username" aria-describedby="basic-addon1" required>
                                    <button class="btn btn-default" onclick="$('#formBuscar').submit();"><a class="fa fa-search"></a> Buscar</button>
                                    <!--<input type="submit" value="Buscar">-->
                                </div>
                            </div>
                            <input type="hidden" name="oper" value="buscar para invitar">
                            <input type="hidden" name="idgrupo" value="9" id="idgrupoInivitar">
                        </form>
                        <div class="row" id="contresultados"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Finalizar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-9">
            <section class="wrapper">
                <div class="container">
                    <h3>Mis Grupos</h3>
                </div>

                <div class="contenido" id="misgrupos">
                    <?php
                    $mens = new Mensajeria();
                    $MISgrupos = $mens->buscarSalasChatPorIdUsuario($user->getId(), 'ACTIVO');
                    if ($MISgrupos->num_rows == 0) {
                        ?><blockquote class="blockquote col-10 offset-1">
                            <i class="text-muted">No estas participando aun en ningun grupo , unete y participa en los grupos disponibles</i>
                        </blockquote> <?php
                }
                while ($fila = mysqli_fetch_array($MISgrupos, MYSQLI_ASSOC)) {
                        ?>
                        <div class=" mb-3 p-3">
                            <a href="#1" onclick="envioFormularioDataForm('','comunidad_chat.php?idSalaChat=<?php echo $fila["idsala_chat"]; ?>','contenedorPrincipal',true);"><span class="text-uppercase"><?php echo $fila["titulo"]; ?></span></a><br>
                            <span class="text-lowercase"><?php echo $fila["descripcion"]; ?></span><br>
                            <span class="fecha"><?php echo $fila["fecha"]; ?></span><br>
                            <!--<input type="button" value="Unirse" class="btn btn-sm btn-defauld">-->
                        </div>

                        <?php
                    }
                    ?>
                    <span class="text-primary text-uppercase">invitaciones de grupo</span>
                    <?php
                    $mens = new Mensajeria();
                    $MISgrupos = $mens->buscarSalasChatPorIdUsuario($user->getId(), 'INVITADO');

                    while ($fila = mysqli_fetch_array($MISgrupos, MYSQLI_ASSOC)) {
                        ?>
                        <div class=" mb-1 p-3" >
                            <span id="invitavionGrupo<?php echo $fila["idsala_chat"]; ?>">
                                Te han invitado a participar en el grupo </span><b><?php echo $fila["titulo"]; ?> </b><br>
                            <span class="text-muted"><?php echo $fila["descripcion"]; ?></span><br>
                            <form class="form-horizontal"  action="../controlador/chats.php" method="post" onsubmit="envioFormulario(this, 'invitavionGrupo<?php echo $fila["idsala_chat"]; ?>', true);return false;">
                                <input type="submit" value="aceptar" id="btn_acep<?php echo $fila["idsala_chat"]; ?>" class="btn btn-sm btn-primary">
                                <input type="hidden" name="oper" value="aceptar invitacion grupo">
                                <input type="hidden" name="idgrupo" value="<?php echo $fila["idsala_chat"]; ?>">
                            </form>
                        </div>

                        <?php
                    }
                    ?>

                </div>
                <div class="container">
                    <h3>Grupos disponibles</h3>
                </div>

                <div class="contenido">
                    <?php
                    $mens = new Mensajeria();
                    $grupos = $mens->buscarSalasChatDisponibleUnirse($user->getId(), 'ACTIVO');

                    while ($fila = mysqli_fetch_array($grupos, MYSQLI_ASSOC)) {
                        ?>
                        <div class=" mb-3 p-3" id="unir_grupo<?php echo $fila["idsala_chat"]; ?>">
                            <span class="text-uppercase"><?php echo $fila["titulo"]; ?></span><br>
                            <span class="text-lowercase"><?php echo $fila["descripcion"]; ?></span><br>
                            <span class="fecha"><small><?php echo $fila["fecha"]; ?></small></span><br>
                            <form action="../controlador/chats.php" method="post" 
                                  onsubmit="envioFormulario(this, 'unir_grupo<?php echo $fila["idsala_chat"]; ?>', true);return false;">
                                <input type="hidden" name="oper" value="unirseGrupo">
                                <input type="hidden" name="idgrupo" value="<?php echo $fila["idsala_chat"]; ?>">
                                <input type="submit" value="Unirse" class="btn btn-sm btn-defauld">
                            </form>
                        </div>

                        <?php
                    }
                    ?>

                </div>

                <div class="container">
                    <h3>Filosofía y Enseñanza de la Filosofía</h3>
                </div>

            </section>

            <img src="imagenes/17.5.jpg" width="100%" height="200px" class="portada">

        </div>


    </div>
</section>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

//            ejecutarFuncion('../controlador/chats.php','cargarMisGrupos','misgrupos',true);
</script>

<!--    </body>
</html>-->