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
        <script src="../vista/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <form class="form-horizontal" id="formmass" role="form" accept-charset="UTF-8" enctype="multipart/form-data">

            <input type="text" name="id" class="form-control" id="id_mass"  disabled>
            <input type='text' name="fecha" class='form-control input-number-line' id='fecha_mass'  maxlength='45' required='required' autofocus>
            <input type='file' name="imagen" class='form-control' id='fotogeneral_mass_file' maxlength='45' required='required' autofocus>  
            <input type='file' name="imagen" class='form-control' id='fotodetalle_mass_file' maxlength='45' required='required' autofocus>                  

            <button type="submit" id="acciones" class="btn btn-warning edit" data-dismiss="modal">Enviar</button>

        </form>
        <div id="respuesta"></div>
    </body>
    <script src="../vista/js/jquery.min.js" type="text/javascript"></script>
    <script src="../vista/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script>

        //// METODO PARA INSERTAR LOS DATOS //// 
        $("#form").on('submit', function (e) {
            // evito que propague el submit
            e.preventDefault();
            // agrego la data del form a formData
            var formData = new FormData(this);
            formData.append('id', $('input[name=id]').val());
            formData.append('fecha', $('input[name=fecha]').val());
            formData.append('foto1', $('input[name=imagen]').val());
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: 'php.php',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#respuesta").html();
                }

            });
        });
//});

    </script>
</html>
