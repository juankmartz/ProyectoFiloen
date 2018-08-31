/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function envioFormulario(formulario, idContRespuesta, remplazarContenido) {
//    mostrarLoaderOndaDeCubos('Procesando...');
    $.ajax({
        url: $(formulario).attr("action"),
        type: "post",
        dataType: "html",
        data: $(formulario).serialize(),
        cache: false,
        processData: false,
        success: function (result) {
            if (remplazarContenido) {
                $("#" + idContRespuesta).html(result);
            } else {
                $("#" + idContRespuesta).append(result);
            }
//            ocultarLoaderOndaDeCubos();
        },
        error: function (e) {
             $("#" + idContRespuesta).append("ha ocurrido un Error en el envio del formulario "+e);
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
}


function envioFormulario(formulario, idContRespuesta, remplazo) {
//    mostrarLoaderOndaDeCubos('Procesando...');
    $.ajax({
        url: $(formulario).attr("action"),
        type: "post",
        dataType: "html",
        data: $(formulario).serialize(),
        cache: false,
//                contentType: false,
        processData: false,
        success: function (result) {
           if(remplazo){
                $("#"+idContRespuesta).html(result);
            }else{
                $("#"+idContRespuesta).append(result);
            }
        },
        error: function () {
             alert("fallo en el envio del formulario");
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
}


function mostrarLoaderOndaDeCubos(texto) {
    $("#loaderArchitic").css("display", "flex");
    $(".cssload-spinner").children("h3").text(texto);
}
function ocultarLoaderOndaDeCubos() {
    $("#loaderArchitic").css("display", "none");
}
function iniLoaderOndaDeCubos(texto) {
//if (texto == '') texto = 'Cargando...';
    $('#loaderArchitic').html(
            '<div class="cssload-spinner">' +
            '<div class="cssload-cube cssload-cube0"></div>' +
            '<div class="cssload-cube cssload-cube1"></div>' +
            '<div class="cssload-cube cssload-cube2"></div>' +
            '<div class="cssload-cube cssload-cube3"></div>' +
            '<div class="cssload-cube cssload-cube4"></div>' +
            '<div class="cssload-cube cssload-cube5"></div>' +
            '<div class="cssload-cube cssload-cube6"></div>' +
            '<div class="cssload-cube cssload-cube7"></div>' +
            '<div class="cssload-cube cssload-cube8"></div>' +
            '<div class="cssload-cube cssload-cube9"></div>' +
            '<div class="cssload-cube cssload-cube10"></div>' +
            '<div class="cssload-cube cssload-cube11"></div>' +
            '<div class="cssload-cube cssload-cube12"></div>' +
            '<div class="cssload-cube cssload-cube13"></div>' +
            '<div class="cssload-cube cssload-cube14"></div>' +
            '<div class="cssload-cube cssload-cube15"></div>' +
            '<h3 id="txtLoader">' + texto + '</h3></div>');
    $('#loaderArchitic').css('display', '-webkit-flex');
    ocultarLoaderOndaDeCubos();
}


