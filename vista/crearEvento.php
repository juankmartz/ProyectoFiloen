<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="container">
    <form method="post" action="../controlador/eventos.php" >
        <h3> nuevo evento</h3>
        <input type="hidden" name="oper" value="nuevo evento">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8 container">
                <div class="row mb-2">
                    <div class="col-sm-4">Inicia :</div>
                    <div class="col-sm-4"> <input class="form-control input-sm" type="date" name="fini" required="" title="Fecha en la que iniciara el evento <br> ejm 25/04/2018 "></div>
                    <div class="col-sm-4"> <input class="form-control input-sm" type="time" name="tini" required="" value="12:00:00"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4">Finaliza :</div>
                    <div class="col-sm-4"> <input class="form-control input-sm" type="date" name="ffin"></div>
                    <div class="col-sm-4"> <input class="form-control input-sm" type="time" name="tfin"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4">Evento :</div>
                    <div class="col-sm-8"> <input class="form-control input-sm" type="text" name="nombre" placeholder="Nombre del evento..." required=""></div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4">Lugar :</div>
                    <div class="col-sm-8"> <input class="form-control input-sm" type="text" name="lugar" placeholder="donde se realizara el evento..."required=""></div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4">Mas información :</div>
                    <div class="col-sm-8"> <textarea class="form-control" name="informacion" placeholder="Recuerda informar de que se trata el evento y la forma de participar en el mismo..." required=""></textarea></div>
                </div>
                <div class="row mb-2">
                    <input type="button" value="invitar" class="btn btn-defauld">
                    <input type="submit" class="float-right btn btn-primary" value="crear evento">
                </div>
            </div>
        </div>
    </form>
</div>
