<?php 
session_start();

if (isset($_POST['submit'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];

    if ( (isset($_POST['nombre_usuario'])) || (isset($_POST['clave'])) ) {

        $nombres = $_POST['nombre_usuario'];
        $claves = $_POST['clave'];

        if (($nombres == $nombre_usuario) && ($claves == $clave)) {
            //CREAR NUESTRA SESION 
            $_SESSION['nombre_usuario'] = $nombres;
            header("location: inicioEst.php");
        }else{
            header("location: ingreso.php");
        }

    }else{
         header("location: ingreso.php");
    }

}else{
    header("location: ingreso.php");
}

 ?>