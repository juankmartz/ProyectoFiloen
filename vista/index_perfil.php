
<html>
    <head>
        <title></title>
        <!--<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link href="pluging/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="pluging/bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            #avatar_perfil {
                width: 100%;
                height: 150px;
                border: red 1px solid;
                max-width: 150px;
                display: inline-block;
                float: right;
                border-radius: 50%;
            }
            .info-perfil-3:hover > .btn-hover-editar{
                display: block;
                font-weight: bold;
            }
            .info-perfil-3:hover > .input-group-append > .btn-hover-editar{
                display: block;
                font-weight: bold;
            }
            .btn-hover-editar{
                display: none;
            }
            #avatar_perfil{
                background-size: cover;
                background-repeat: space;
            }
            .info-perfil-3 {
                /*margin-top: 11px;*/
            }
            .input-editable:disabled {
                background: none;
                border: none;
            }
            blockquote{
                padding: 20px;
                border: 1px solid #e2e2e2;
                border-radius: 4px;
                border-left: 5px solid #5bc0de;
                color: #5bc0de;
                margin: 5px 50px;

            }
        </style>

        <style>
            .ch-item {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                position: relative;
                cursor: default;
                box-shadow: 
                    inset 0 0 0 0 rgba(200,95,66, 0.4),
                    inset 0 0 0 16px rgba(255,255,255,0.6),
                    0 1px 2px rgba(0,0,0,0.1);

                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;
            }

            .ch-img-1 { 
                background-image: url(Imagenes/14.jpg);
            }

            .ch-img-2 { 
                background-image: url(../images/5.jpg);
            }

            .ch-img-3 { 
                background-image: url(../images/6.jpg);
            }

            .ch-info {
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                opacity: 0;

                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;

                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                transform: scale(0);

                -webkit-backface-visibility: hidden; /*for a smooth font */

            }

            .ch-info h3 {
                color: #fff;
                text-transform: uppercase;
                position: relative;
                letter-spacing: 2px;
                font-size: 22px;
                margin: 0 30px;
                padding: 65px 0 0 0;
                height: 110px;
                font-family: 'Open Sans', Arial, sans-serif;
                text-shadow: 
                    0 0 1px #fff, 
                    0 1px 2px rgba(0,0,0,0.3);
            }

            .ch-info p {
                color: #fff;
                padding: 10px 5px;
                font-style: italic;
                margin: 0 30px;
                font-size: 12px;
                border-top: 1px solid rgba(255,255,255,0.5);
            }

            .ch-info p a {
                display: block;
                color: #fff;
                color: rgba(255,255,255,0.7);
                font-style: normal;
                font-weight: 700;
                text-transform: uppercase;
                font-size: 9px;
                letter-spacing: 1px;
                padding-top: 4px;
                font-family: 'Open Sans', Arial, sans-serif;
            }

            .ch-info p a:hover {
                color: #fff222;
                color: rgba(255,242,34, 0.8);
            }

            .ch-item:hover {
                box-shadow: inset 0 0 0 150px rgba(200,95,66, 0.4), inset 0 0 0 16px rgba(255,255,255,0.8), 0 1px 2px rgba(0,0,0,0.1);
            }

            .ch-item:hover .ch-info {
                opacity: 1;

                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);	
            }

        </style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div is="resp"></div>
        <div class="container">
            <form method="post" action="../controlador/registro_usuario.php" onsubmit="envioFormulario(this, 'resp', false);">
                <div class="row mb-5">
                    <h4 class="col-12 ">Informacion personal xxxxx</h4>
                    <div class="col-sm-4 col-2">
<!--                        <div class="content-imagen col-4" id="avatar_perfil" style="background: url(Imagenes/17.5.jpg);">
                        </div>-->
                            <div class="ch-item ch-img-1">
                                <div class="ch-info">
<!--                                    <img src="Imagenes/14.jpg" alt=""/>-->
                                    <h3>Brainiac</h3>
                                    <p>by Daniel Nyari <a href="http://drbl.in/eODP">View on Dribbble</a></p>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-8 col-10 row">
                        <div class="col-12 btn-group info-perfil-3 mt-2">
                            <input type="text" class="input-editable form-control" disabled="true" value="JUAN CARLOS MARTINEZ BONILLA" name="txtNombre" id="txtNombre">
                            <!--                            <a href="#1" class="btn-hover-editar" onclick="editarCampo(this)">editar</a>
                                                        <a href="#1" class="btn-hover-editar" onclick="guardarCampo(this)">guardar</a>-->
                            <div class="input-group-append">
                                <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtNombre', this)"><i class="fa fa-pen"></i> </button>
                            </div>
                        </div>
                        <div class="col-12 btn-group info-perfil-3 mt-2">
                            <input type="text" class="input-editable form-control" disabled="true" value="1098613789 cc" name="txtIdentificacion" id="txtIdentificacion">
                            <div class="input-group-append">
                                <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtIdentificacion', this)"><i class="fa fa-pen"></i> </button>
                            </div>
                        </div>
                        <div class="col-6 btn-group info-perfil-3 mt-2">
                            <input type="text" class="input-editable form-control" disabled="true" value="PROFESIONAL" name="txtTipoUser" id="txtTipoUser">
                        </div>
                        <div class="col-6 btn-group info-perfil-3 mt-2">
                            <input type="text" class="input-editable form-control" disabled="true" value="Codigo: 20967133" name="txtCodigo" id="txtCodigo">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12"><h4>Informacion de contacto</h4></div>
                    <div class="col-6 btn-group info-perfil-3 ">
                        <span class="input-group-text" id="basic-addon1">Direccion: </span>
                        <input type="text" class="input-editable form-control" disabled="true" value="calle libertadores 233 # 45-23 " 
                               name="txtDireccion" id="txtDireccion">
                        <div class="input-group-append">
                            <button title="Editar"  class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtDireccion', this)"><i class="fa fa-pen"></i> </button>
                        </div>
                    </div>
                    <div class="col-6 btn-group info-perfil-3 ">                        
                        <span class="input-group-text" id="basic-addon1">Email: </span>
                        <input type="text" class="input-editable form-control col-10" disabled="true" value="calle libertadores 233 # 45-23 " 
                               name="txtEmail" id="txtEmail">
                        <div class="input-group-append">
                            <button title="Editar" class="btn btn-outline-secondary btn-sm btn-hover-editar" type="button" onclick="editarCampo('txtEmail', this)"><i class="fa fa-pen"></i> </button>
                        </div>
                    </div>
                </div>
            </form>
            <hr />

            <h4>Informacion academica</h4>
            <div class="container-fluid">
                <blockquote >
                    <h5 >Sin registros academicos</h5>
                    <p class="text-muted">No se han registrado datos academicos, si desea puede registrar los diferentes estudios realizados en su vida academica. </p><input type="button" class="btn btn-sm btn-primary" value="registrar">
                    <form id="forminformacionAcademica" class="mt-10">
                        <div class="row">
                            <div class="col-12 btn-group mt-2 ">
                                <span class="input-group-text">Titulo: </span>
                                <input type="text" class="form-control" placeholder="Titulo completo obtenido" name="txtTituloAcademico" id="txtTituloAcademico">
                            </div>
                            <div class="col-8 btn-group mt-2">
                                <span class="input-group-text">Institucion: </span>
                                <input type="text" class="form-control" placeholder="Nombre de la institucion" name="txtInstitucion" id="txtInstitucion">
                            </div>
                            <div class="col-4 btn-group mt-2">
                                <span class="input-group-text">Año: </span>
                                <input type="text" class="form-control"  placeholder="año de grado" name="txtanno" id="txtanno">
                            </div>

                        </div>
                        <div class="form-group mt-3 mb-4"><input class="btn btn-sm btn-primary"type="submit" name="nuevoRegistroAcademico" value="Guardar"></div>
                    </form>
                </blockquote>
                <div class="row">

                    <div class="row col-12 mt-3 border-top">
                        <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                        <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                        <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                    </div>

                    <div class="row col-12 mt-3 border-top">
                        <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                        <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                        <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                    </div>

                    <div class="row col-12 mt-3 border-top">
                        <span class="col-4 text-right text-muted">Titulo:</span><span class="col-8">Ingeniero de sitemas</span>
                        <span class="col-4 text-right text-muted">Institucion:</span><span class="col-8">UNIVERSIDAD INDUSTRIAL DE SANTANDER</span>
                        <span class="col-4 text-right text-muted">año:</span><span class="col-8">2012</span>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function editarCampo(idInput, btn) {
//             alert( $(boton).parent().children("input").val());
                $("#" + idInput).removeAttr("disabled");
                $(btn).remove();
            }
            function guardarCampo(idInput) {
//             alert( $(boton).parent().children("input").val());
                $("#" + idInput).attr("disabled", "true");
//                $(boton).parent().children("input").attr("disabled", "true");
            }
        </script>
    </body>
</html>
