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

<style>
    .fotoPerfiles {
        height: 100px;
        width: 100px;
        /* background-size: 0%; */
        /* background-repeat: no-repeat; */
        border-radius: 50%;
        background-size: cover;
        background-size:100% auto;
    }
    /*stylos para barra lateral interna no fixed*/

    .menu-lateral,#btncerrarmenu {
        display: none;
    }
    .cbp-spmenu-push{
        padding-left: 240px!important;
        margin-left: 0px!important;
        width: 100%!important;
    }
    .cbp-spmenu {
        background: #47a3da;
        position: absolute!important;
        /*float: left;*/
    }

    div#cuerpo-principal-perfil {
        min-height: 612px;
    }

    .cbp-spmenu-push{
        margin-left: 240px;
        width: calc( 100% - 239px);
    }
    button#showLeftPush {
        background: #47a3da;
        color: white;
        top: 20px;
        left: 20px;
        height: 50px;
        width: 50px;
        border-radius: 5px;
        border: #258ecd solid 2px;
    }
    .menu-lateral{
        position: fixed;
        left: 30px;
        top: 30px;
        z-index: 999;
    }
    .menu-fix{
        position: fixed;
        z-index: 999;
        left: 270px;
    }
    #cbp-spmenu-s1 > a > i.fa {
        font-size: 18px;
        margin-right: 10px;
    }
    #cbp-spmenu-s1 > a  {
        background: #258ecd;
    }
    #cbp-spmenu-s1 > a:hover {
        text-decoration: none;
        color: #00ccff;
        text-decoration: none;
        color: #eff9fb;
        background: #1177b5;
        font-weight: 400;
    }
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
    @media (max-width: 980px) {
        .cbp-spmenu-push{
            padding-left: 0px!important;
            /*width: calc( 100% - 59px)!important;*/
            margin-left: 0px!important;
        }



        .text-menu-lateral{
            display:none;
        }
        .cbp-spmenu-vertical a:hover >  .text-menu-lateral {
            position: absolute;
            padding-right: 20px;
            display: inline-block;
            background: #258ecd;
            border-radius: 0 10PX 10PX 0px;
            white-space: nowrap;
        }
        .cbp-spmenu-vertical a:hover  {
            display: inline-block;
        }

        .cbp-spmenu-vertical {
            width: 60px;
            height: 100%;
            top: 0;
            z-index: 1000;
        }
        .cbp-spmenu-push{
            /*margin-left: 60px!important;*/
            /*width: calc( 100% - 59px)!important;*/
        }
        blockquote{
            margin: 0px;
        }
        .cbp-spmenu-vertical .titulo-menu{
            display: none;
        }
    }

</style>
<style>
    .ch-item {
        /*                width: 100%;
                        height: 100%;*/
        width: 160px;
        height: 160px;
        border-radius: 50%;
        margin: auto;
        position: relative;
        cursor: default;
        box-shadow: 
            inset 0 0 0 0 rgba(200,95,66, 0.4),
            inset 0 0 0 10px rgba(255,255,255,0.6),
            0 1px 2px rgba(0,0,0,0.1);

        -webkit-transition: all 0.4s ease-in-out;
        -moz-transition: all 0.4s ease-in-out;
        -o-transition: all 0.4s ease-in-out;
        -ms-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
    }

    .ch-img-1 { 
        background-size: cover!important;
        background-repeat: no-repeat!important;
        background-position: center!important;
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
        font-size: 13px;
        margin: 0 10px;
        margin-bottom: 10px;
        padding: 57px 0 0 0;
        font-family: 'Open Sans', Arial, sans-serif;
        text-shadow: 0 0 1px #fff, 0 1px 2px rgba(0,0,0,0.3);
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
<div class="container" style="min-width: 100%;min-height: 500px;">
    <h3>Buscar usuarios</h3>
    <!--onsubmit="envioFormulario('formBuscar', 'contresultados', true); return false;"-->
    <form class="mb-5" onsubmit="envioFormularioMultiPart2('formBuscar', 'contresultados', true); return false;" class="row" method="post" id="formBuscar" action="../controlador/usuarios.php" >
        <div class="col-sm-12 col-md-6">
            <div class="btn-group" >
                <input name="criterio" type="text" class="form-control" placeholder="Criterios  de busqueda" aria-label="Username" aria-describedby="basic-addon1" required>
                <button class="btn btn-default" onclick="$('#btnSubmitBusqueda').click();"><a class="fa fa-search"></a> Buscar</button>
                <div class="input-group-append"> 
                    <input type="submit" value="Buscar" style="display: none;" id="btnSubmitBusqueda">
                </div>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header btn-info">
                    <h5 class="modal-title" id="exampleModalLabel">Perfil Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_cuerpo_perfiles">
                    ...
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-5" id="contresultados"></div>
</div>
</body>
</html>
