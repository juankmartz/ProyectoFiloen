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
//        data: serializefiles(formulario),
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
            $("#" + idContRespuesta).append("ha ocurrido un Error en el envio del formulario " + e);
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
}

//
//function envioFormulario(formulario, idContRespuesta, remplazo) {
////    mostrarLoaderOndaDeCubos('Procesando...');
//    $.ajax({
//        url: $(formulario).attr("action"),
//        type: "post",
//        dataType: "html",
//        data: serializefiles(formulario),
//        cache: false,
////                contentType: false,
//        processData: false,
//        success: function (result) {
//            if (remplazo) {
//                $("#" + idContRespuesta).html(result);
//            } else {
//                $("#" + idContRespuesta).append(result);
//            }
//        },
//        error: function () {
//            alert("fallo en el envio del formulario");
////            ocultarLoaderOndaDeCubos();
////            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
//        }
//    });
//}
function envioFormularioMultiPart(formulario, idContRespuesta, remplazo) {
//    mostrarLoaderOndaDeCubos('Procesando...');
    var datos = $("#"+formulario).serializeArray(); //datos serializados
    var idForm = $("#"+formulario).attr("id");
    var formData = new FormData("#" + idForm);
//    formData.append("dato", "valor");
//var formData = new FormData(document.getElementById(idForm));
//            formData.append("dato", "valor");
    //agergaremos los datos serializados al objecto imagen
    $(datos).each(function () {
        formData.append($(this).name, $(this).val());
//         console.log("esto es una mierda "+$(this).name);
    });
    $.ajax({
        url: $("#"+formulario).attr("action"),
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            if (remplazo) {
                $("#" + idContRespuesta).html(result);
            } else {
                $("#" + idContRespuesta).append(result);
            }
        },
        error: function () {
            alert("fallo en el envio del formulario");
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
    return false;
}
function cargarPagina(uri, idContRespuesta, remplazo) {
//    mostrarLoaderOndaDeCubos('Procesando...');
    $.ajax({
        url: uri,
        type: "post",
        dataType: "html",
        cache: false,
        processData: false,
        success: function (result) {
            if (remplazo) {
                $("#" + idContRespuesta).html(result);
            } else {
                $("#" + idContRespuesta).append(result);
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

//USAGE: $("#form").serializefiles();
function serializefiles(formulario) {
    var obj = $(formulario);
    /* ADD FILE TO PARAM AJAX */
    var formData = new FormData();
    $.each($(obj).find("input[type='file']"), function (i, tag) {
        $.each($(tag)[0].files, function (i, file) {
            formData.append(tag.name, file);
        });
    });
    var params = $(obj).serializeArray();
    $.each(params, function (i, val) {
        formData.append(val.name, val.value);
    });
    return formData;
}


