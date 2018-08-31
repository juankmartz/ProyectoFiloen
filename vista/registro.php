<?php
session_start();
//include "cn.php";
//include "funciones.php";

ini_set('error_reporting', 0);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registro</title>
        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
        <link rel="stylesheet" href="css/estiloRegistros.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <!--para las notificaciones-->

        <link href="pluging/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
        <script src="http://code.jquery.com/jquery-latest.js"></script> 


    </head>
    <body>

        <div class="logo">
            <img src="imagenes/logo1.png" alt="Filosofia y enseñanza de la filosofia" width="80px">
            <div class="slogan">
                <h4>Filosfofía y Enseñanza de la Filosofía</h4>
                <h2>FiloEn</h2>
            </div>
        </div>

        <div class="ingreso">
            <li><a href="ingreso.php"><span><img src="Imagenes/iniciara.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
            <li><a href="registro.php"><span><img src="Imagenes/registroa.png" alt="" width="20px"></span> Registrarse</a></li>
        </div>

        <header>
            <div class="fondo1">
                <div class="fondo2">
                    <h1>REGISTRO</h1>
                </div>
            </div>
        </header>

        <div id="header">
            <nav class="navegacion">
                <ul class="menus">
                    <li> <a href="index.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>
                    <li> <a href="informate.php">Infórmate</a></li>
                    <li> <a href="#">Nuestra Gente <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Perfiles</a></li>
                            <li> <a href="ingreso.php" onclick="mostrarMensaje()">Comunidad</a></li>
                            <li> <a href="acercaFiloEn.php">Acerca de FiloEn</a></li>
                        </ul> 
                    </li>
                    <li> <a href="#">Herramientas <span class="icon icon-angle-down"></span></a>
                        <ul class="submenu">
                            <li> <a href="#">Aplicaciones</a></li>
                            <li> <a href="#">Biblioteca</a></li>
                        </ul>
                    </li>
                    <li> <a href="contactenos.php">Contáctenos</a></li>
                </ul>
            </nav>
        </div>
        <h2 class="titulo1">Registro de Usuario</h2>

        <p class="informacion">Todos los campos con asterisco <span>(*)</span> son obligatorios. Es aconsejable que digites todos los campos para obtener mayor información y veracidad en el registro.</p>

        <h2 class="subtitulo1">Información Personal</h2>
        <hr class="linea">

        <div id="resp"></div>

        <div class="container">
            <form name="form1" id="formRegistroUser" action="../controlador/registro_usuario.php" onsubmit="envioFormulario(this, 'resp', true);return false;" method="post">
                <input type="hidden" name="oper" value="nuevo usuario">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre *</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido *</label>
                        <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control"  placeholder="Email" name="correo" required>
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Número Documento *</label>
                        <input type="text" class="form-control" name="identificacion" value="" maxlength="15" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                    event.returnValue = false;" id="inputPassword4" placeholder="Numero de Documento" required>  
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Dirección</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Dirección de Residencia" name="direccion">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="ciudad" name="ciudad" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de Usuario *</label >
                        <select id="inputState" class="form-control" name="tipo_usuario">
                            <option selected value="ESTUDIANTE">Estudiante</option>
                            <option value="PROFESOR">Profesor</option>
                            <option value="PROFESIONAL">Profesional</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputZip">Código *</label>
                        <input type="text" class="form-control" name="codigo" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                    event.returnValue = false;" id="inputZip" placeholder="Código de Usuario" required>  
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Usuario *</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario" placeholder="Ingresar nombre de Usuario" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ingresa su Contraseña *</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="contraseña" name="contrasena" maxlength="20" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Confirmar Contraseña *</label>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Confirmar contraseña" name="cclave" maxlength="20" required>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="aceptar_terminos" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Acepto los términos y condiciones
                        </label>
                        <div class="invalid-feedback">
                            Debe aceptar antes de enviar.
                        </div>
                    </div>
                </div>

                <button id="btn-registro" type="submit" name="guardar" class="btn btn-primary">Registrarme</button>

            </form>




        </div>  

        <br>

        <footer>
            <div class="pie">
                <p>
                    <a href="index.php">Inicio</a> | 
                    <a href="contactenos.php">Contáctenos</a> |
                    <a href="registro.php">Registro</a> |
                    <a href="ingreso.php">Login</a> |                                                
                </p>
                <p>
                    Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
                </p>                   
            </div>
        </footer>
        <script src="js/funcionesGenerales.js"></script>
        <script src="pluging/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="pluging/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="pluging/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>

    </body>
</html>