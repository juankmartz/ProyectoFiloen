<?php
include '../controlador/conBD.php';

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pruebaNoticiaArchivo
 *
 * @author desarrolloJuan
 */


$dir_subida = '../vista/Imagenes/noticia/noticia_';
echo $_POST["nombre"];
 if ($_FILES['archivo1']["error"] > 0) {
            echo "Error: " . $_FILES['archivo1']['error'] . "<br>";
        } else {
            echo "Nombre: " . $_FILES['archivo1']['name'] . "<br>";

            echo "Tipo: " . $_FILES['archivo1']['type'] . "<br>";

            echo "Tamaño: " . ($_FILES["archivo1"]["size"] / 1024) . " kB<br>";
            echo "Carpeta temporal: " . $_FILES['archivo1']['tmp_name'];
        }
$fichero_subido = $dir_subida . basename($_FILES['archivo1']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";

class pruebaNoticiaArchivo {
    //put your code here
}
