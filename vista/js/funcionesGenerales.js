/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function ejecutarFuncion(urlClase, oper, idContRespuesta, remplazarContenido) {
//    mostrarLoaderOndaDeCubos('Procesando...');
//    inicioLoader();
//    oper = oper.replace(' ', '+');
    var formData = new FormData();
    formData.append("oper", oper);
    console.log(formData);
    $.ajax({
        url: urlClase,
        type: "get",
        dataType: "html",
//        data: serializefiles(formulario),
        data: '?oper='+oper,
        cache: false,
        processData: false,
        success: function (result) {
            if (remplazarContenido) {
                $("#" + idContRespuesta).html(result);
            } else {
                $("#" + idContRespuesta).append(result);
            }
//            cerrarLoader();
//            ocultarLoaderOndaDeCubos();
        },
        error: function (e) {
            $("#" + idContRespuesta).append("ha ocurrido un Error en el envio del formulario " + e);
//            cerrarLoader();
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
}

function ejecutarFuncionAjax(Urlaction, variables, idrespuesta, remplazo){
//    var datos ={ "oper" : "cargarNuevoMensaje", "idchat" : "7" };
    var datos = {"oper":"cargarNuevoMensaje", "idchat":"7"};

	$.ajax({
		url:  "../controlador/chats.php",
		type: "POST",
                dataType: 'json',
		data: datos
	}).done(function(respuesta){
		$("#"+idrespuesta).html(respuesta);
	});
}

function envioFormulario(formulario, idContRespuesta, remplazarContenido) {
//    mostrarLoaderOndaDeCubos('Procesando...');
//    inicioLoader();
    console.log($(formulario).serialize());
    $.ajax({
        url: $(formulario).attr("action"),
        type: "post",
        dataType: "html",
//        data: serializefiles(formulario),
        data: $(formulario).serialize(),
        cache: false,
        processData: false,
        success: function (result) {
            console.log("Exito en el evio del formulario");
            if (remplazarContenido) {
                $("#" + idContRespuesta).html(result);
            } else {
                $("#" + idContRespuesta).append(result);
            }
            cerrarLoader();
//            ocultarLoaderOndaDeCubos();
        },
        error: function (e) {
            $("#" + idContRespuesta).append("ha ocurrido un Error en el envio del formulario " + e);
            cerrarLoader();
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
}

function envioFormularioDataForm(datosFormulario, urlAction, idContRespuesta, remplazarContenido) {
//    mostrarLoaderOndaDeCubos('Procesando...');
//    inicioLoader();
    $.ajax({
        url: urlAction,
        type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
        contentType: false,
        data: datosFormulario, // Al atributo data se le asigna el objeto FormData.
        processData: false,
        cache: false,
        success: function (resultado) { // En caso de que todo salga bien.
            console.log(resultado);
            if (remplazarContenido) {
                $("#" + idContRespuesta).html(resultado);
            } else {
                $("#" + idContRespuesta).append(resultado);
            }
        },
        error: function () { // Si hay algún error.
            alert("Algo ha fallado.");
                            cerrarLoader();

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
//    cargarLoader();
    var datos = $("#" + formulario).serializeArray(); //datos serializados
    var idForm = $("#" + formulario).attr("id");
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
        url: $("#" + formulario).attr("action"),
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
            cerrarLoader();
        },
        error: function () {
            alert("fallo en el envio del formulario");
            cerrarLoader();
//            ocultarLoaderOndaDeCubos();
//            nuevaNotify('error', 'Error', 'Ha ocurrido un error en el envio del formulario; intentelo mas tarde', 9000);
        }
    });
    return false;
}


function envioFormularioMultiPart2(formulario, idContRespuesta, remplazo) {
//    cargarLoader();
    var paqueteDeDatos = zerialisForm(formulario);
    console.log(paqueteDeDatos);
    var destino = $('#' + formulario).attr("action"); // El script que va a recibir los campos de formulario.
    /* Se envia el paquete de datos por ajax. */
    $.ajax({
        url: destino,
        type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
        contentType: false,
        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
        processData: false,
        cache: false,
        success: function (resultado) { // En caso de que todo salga bien.
            console.log(resultado);
            if (remplazo) {
                $('#' + idContRespuesta).html(resultado);
                cerrarLoader();
            } else {
                $('#' + idContRespuesta).append(resultado);
                cerrarLoader();
            }
        },
        error: function () { // Si hay algún error.
            alert("Algo ha fallado.");
                            cerrarLoader();

        }
    });
}

function zerialisForm(idFormulario){
    var paqueteDeDatos = new FormData();
    $('#' + idFormulario).find("input").each(function () {
        switch ($(this).attr('type')) {
            case "checbox":
            {
                if ($(this).is(":checked")) {
                    paqueteDeDatos.append($(this).attr('name'), $(this).prop('value'));
                }
            }
            case "radio":
                {
                    if ($(this).is(":checked")) {
                        paqueteDeDatos.append($(this).attr('name'), $(this).prop('value'));
                    }
                }
                break;
            case "password":
                {
                    paqueteDeDatos.append($(this).attr('name'), $(this).prop('value'));
                }
                break;
            case "file":
                {
                    paqueteDeDatos.append('archivo', $(this)[0].files[0]);
                }
                break;
            default :
                {
                    paqueteDeDatos.append($(this).attr('name'), $(this).prop('value'));
                }
                break;
        }

    });
    $('#' + idFormulario).find("select").each(function () {
        paqueteDeDatos.append($(this).attr('name'), $(this).val());
    });
    $('#' + idFormulario).find("textarea").each(function () {
        paqueteDeDatos.append($(this).attr('name'), $(this).val());
    });
    return paqueteDeDatos;
}

function cargarPagina(uri, idContRespuesta, remplazo) {
//    mostrarLoaderOndaDeCubos('Procesando...');
//    cargarLoader();
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
            cerrarLoader();
        },
        error: function () {
            alert("fallo en el envio del formulario");
            cerrarLoader();
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

function inicioLoader()
{
    $("#loader").html(
            '<div class="dots">' +
            '<div class="dot"></div>' +
            '<div class="dot"></div>' +
            '<div class="dot"></div>' +
            '<div class="dot"></div>' +
            '<div class="dot"></div>' +
            '</div><h4 id="text-loader">Cargando...</h4>'
            );
}
function cargarLoader() {
    $("#loader").show();
    $("body").css("overflow", "hidde");
}

function cerrarLoader() {
    $("#loader").hide();
    $("body").css("overflow", "initial");
}


function previsualizarImage(inpuFile, contImagen) {
    var file = inpuFile.files[0],
            imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = function fileOnload(e) {
        var result = e.target.result;
        $('#' + contImagen).attr("src", result);
        $('#' + contImagen).show();
    };
    reader.readAsDataURL(file);
}
function previsualizarImage(inpuFile, contImagen) {
    var file = inpuFile.files[0],
            imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = function fileOnload(e) {
        var result = e.target.result;
        $('#' + contImagen).attr("src", result);
        $('#' + contImagen).show();
    };
    reader.readAsDataURL(file);
}
function previsualizarVideo(inputFile, contVideo) {
    var $source = $('#' + contVideo).children('source');
    $source[0].src = URL.createObjectURL(inputFile.files[0]);
    $source.parent()[0].load();
//                   document.getElementById(contVideo).pause()
    $('#' + contVideo).show();
}

function textAreaAjustable(textareas) {
                textareas.each(function () {
                    var textarea = $(this);

                    if (!textarea.hasClass('autoHeightDone')) {
//            textarea.addClass('autoHeightDone');

                        var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
                                h = textarea[0].scrollHeight - extraHeight;

                        // init height
                        textarea.height('auto').height(h);

                        textarea.bind('keyup', function (e) {

                            var code = (e.keyCode ? e.keyCode : e.which);
                            if (code == 13) {
                                alert("se enviara el formulario");
                                return false;
                            }
                            textarea.removeAttr('style'); // no funciona el height auto

                            h = textarea.get(0).scrollHeight - extraHeight;

                            textarea.height(h + 'px'); // set new height
                        });
                    }
                });

            }
            
            function buscarNuevoMensaje( idRespuesta, idChat) {
//                            setInterval(function () {
//                                alert("buscando");
//                                var data = new formData();
//                                data.append("oper", "cargarNuevoMensaje");
//                                data.append("idchat", idChat);
//                                $.ajax({
//                                    url: '../controlador/chats.php',
//                                    type: "post",
//                                    dataType: "html",
//                                    data: data,
//                                    cache: false,
//                                    processData: false,
//                                    success: function (result) {
//                                        console.log("cargando nuevo mensaje chat");
//                                        $("#" + idRespuesta).append(result);
//                                    },
//                                    error: function (e) {
//                                       console.log("Ha ocurrido un error al cargar nuevo mensajes al chat "+idRespuesta);
//                                   }
//                                });
//                                alert('fin');
//                            }, 3000);
                            alert("la funcion sirve"+idRespuesta+idChat);
                        }