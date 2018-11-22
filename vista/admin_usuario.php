<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="pluging/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

        <link rel="stylesheet" href="css/flexslider.css" type="text/css">
        <link href="css/loaderEsferas.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontello.css" >
        <link rel="stylesheet" href="css/estilos.css" >
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->

        <link href="pluging/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
        <link href="css/barraDesplazamiento.css" rel="stylesheet" type="text/css"/>
        <link href="pluging/bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link href="css/chats.css" rel="stylesheet" type="text/css"/>
        <style>
            .cont-usuario {
                display: inline-block;
                padding: 8px 15px;
                border: 1px solid;
                border-radius: 5px;
                margin: 5px;
                background: #5e98d6;
                color: #f5f5f5;
                border-radius: 10px;
            }

            .datos-user {
                font-size: small;
                margin-top: 10px;
            }

           

            .img-user {
                height: 110px;
                width: 110px;
                border: 2px solid;
                margin: auto;
                border-radius: 12px;
            }

            label.input-group-addon {
                margin-bottom: 0px;
            }
            .img-user {
                height: 110px;
                width: 110px;
                border: 2px solid;
                margin: auto;
                border-radius: 12px;
            }
            h5 {
                font-size: medium;
                color: #f8f9fa;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h4>usuarios activos</h4>
        <?php ?>
        <div class="cont-usuario">
            <h5>Nombre del usuario</h5>
            <div class="img-user" style="background: url(Imagenes/22.png);"></div>
            <div class="datos-user">
                <div class="input-group">
                    <label class="input-group-addon">Usuario</label><samp >SinSaber</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">tipo usuario</label><samp >ESTUDIANTE</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">email</label><samp >tucorreo@correocaliente.com</samp>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-outline-light" title="Modifica a tipo administrador o normal"><i class="fa fa-pen"></i> </button>
                <button class="btn btn-outline-light" title="Dsabilita este usuario"><i class="fa fa-eraser"></i> </button>
                <button class="btn btn-outline-light" title="Resetea la contraseña del usuario, se notificara por correo electronico"><i class="fa fa-key"></i> </button>
            </div>
        </div>
        <div class="cont-usuario">
            <h5>Nombre del usuario</h5>
            <div class="img-user"></div>
            <div class="datos-user">
                <div class="input-group">
                    <label class="input-group-addon">Usuario</label><samp >SinSaber</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">tipo usuario</label><samp >ESTUDIANTE</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">email</label><samp >tucorreo@correocaliente.com</samp>
                </div>
            </div>
        </div>
        <div class="cont-usuario">
            <h5>Nombre del usuario</h5>
            <div class="img-user"></div>
            <div class="datos-user">
                <div class="input-group">
                    <label class="input-group-addon">Usuario</label><samp >SinSaber</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">tipo usuario</label><samp >ESTUDIANTE</samp>
                </div>
                <div class="input-group">
                    <label class="input-group-addon">email</label><samp >tucorreo@correocaliente.com</samp>
                </div>
            </div>
        </div>
        <h4>usuarios desactivados</h4>
    </body>
</html>
