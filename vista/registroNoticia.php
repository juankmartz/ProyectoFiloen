<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--<link href="pluging/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link href="pluging/lineControlEditor/editor.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--<script src="js/jquery.min.js" type="text/javascript"></script>-->
        <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--<script src="pluging/bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>-->
        <script src="pluging/lineControlEditor/editor.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if (isset($_SESSION["iduser"])) {
            //session iniciada
        } else {

            //sin session iniciada se redirecciona a la principal
            /*
             * hay que configurar para  que la ruta de origen 
             * del proyecto se traiga directamente de BD o de archivo de configuracion
             */
//            header('Location: /proyFiloen/');
        }
        ?>
        <!--<div class="container">-->

        <form method="post" class="container mt-3" action="" >
            <div class="row">
                <div class="col-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Subtitulo</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea class="form-control" rows="10" style="resize: none;" id="txtEditor" name="contenidoNoticia">hola</textarea> 
                    </div>
                </div>
                <div class="col-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="link_noticia">Enlace noticia:</label>
                        <input type="text" class="form-control" name="linknoticia" placeholder="enlace de la noticia completa..." maxlength="500" id="link_noticia">
                    </div>
                    <div class="form-group">
                        <label for="multimedia">Multimedia:</label>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Acción <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Acción #1</a></li>
                                    <li><a href="#">Acción #2</a></li>
                                    <li><a href="#">Acción #3</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Acción #4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<div class="form-group">-->
                            <input type="submit" value="Publicar" class="btn btn-primary">
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function () {
//                $("#txtEditor").Editor();
            });
        </script>
        <!--</div>-->
    </body>
</html>
