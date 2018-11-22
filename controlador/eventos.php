<?php
include '../controlador/conBD.php';
include '../modelo/Usuario.php';

session_start();
$p = $_POST;
$s = $_SESSION;
$user = new Usuario();
$conn = NULL;
if (isset($s['usuario']))
    $user = unserialize($s['usuario']);

print_r($p);
if (isset($p['oper'])) {
    if ($p["oper"] == "nuevo evento") {
        $conn = conBD::conectar();
        $fechaIni = $p["fini"]." ".$p["tini"];
        $fechaFin = $p["ffin"]." ".$p["tfin"];
        echo $fechaIni;
        $sql = "INSERT INTO `evento`
(
`nombre`,
`inicio`,
`final`,
`lugar`,
`informacion`,
`estado`,
`idusuario`)
VALUES
(
'".$p["nombre"]."',
'".$fechaIni."',
'".$fechaFin."',
'".$p["lugar"]."',
'".$p["informacion"]."',
'ACTIVO',
".$user->getId().");";
//        echo  $sql;
       mysqli_query($conn, "select * usuario");
       mysqli_close($conn);
    }
    else if($p["oper"] == "buscar mis eventos"){
        //lista los evento a en los que se es invitado, administrador o participante.
    }
    else if($p["oper"] == "buscar  eventos"){
        // lista todos los eventos publicos.
    }
} else {
    echo 'no se encontro la variable OPER';
}


