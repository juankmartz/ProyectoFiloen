<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author desarrolloJuan
 */
class Usuario {

    var $id = 0, $nombre = "SIN DEFINIR", $codigo= 0, $correo= "sindefinir@email.com", $ciudad="no se", $direccion="", $identificacion="", $tipo_usuario="INVITADO", $user="",$avatar="", $pass="", $estado="";

    function nuevoUsuario($id, $nombre, $codigo, $correo, $ciudad, $direccion, $identificacion, $tipo_usuario, $user, $pass) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->correo = $correo;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->identificacion = $identificacion;
        $this->tipo_usuario = $tipo_usuario;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function UsuarioPorID($id) {

        $conn = $_SESSION["conexionBD"];
        $query = "SELECT * FROM usuario where idusuario = '" . $id . "';";
        $result = mysqli_query($conn, $query);
        $datos_usuario = mysql_fetch_array($result);
        $this->id = $id;
        $this->nombre = $datos_usuario["nombre"];
        $this->codigo = $datos_usuario["codigo"];
        $this->correo = $datos_usuario["correo"];
        $this->ciudad = $datos_usuario["ciudad"];
        $this->direccion = $datos_usuario["direccion"];
        $this->identificacion = $datos_usuario["idintificacion"];
        $this->tipo_usuario = $datos_usuario["tipo_usuario"];
        $this->user = $datos_usuario["usuario"];
        $this->pass = $datos_usuario["contrasenna"];
        $this->estado = $datos_usuario["estado"];
    }
    
    public function buscarUsuarioByCriterio($criterio, $tipo_usuario) {
       
        $query = "SELECT * FROM usuario WHERE nombre LIKE '%".$criterio."%' OR estado = '".$criterio."' OR  tipo_usuario = '".$tipo_usuario."' ; ";
        
//        if($criterio !=""){
//            if(strlen($criterios)>0) $criterios = $criterios." AND ";
//             $criterios = $criterios." nombre LIKE '%".$nombre."%' ";
//        }
//        if($tipo_usuario != ""){
//            if(strlen($criterios)>0) $criterios = $criterios." AND ";
//             $criterios = $criterios." tipo_usuario = '".$tipo_usuario."' ";
//        }
//        if($estado != ""){
//            if(strlen($criterios)>0) $criterios = $criterios." AND ";
//             $criterios = $criterios." estado = '".$estado."' ";
//        }
//        if(strlen($criterios)>0) $criterios =" WHERE ".$criterios;
//         $query = $query.$criterios;
//         echo $query;
        $conn = conBD::conectar();
        $result = mysqli_query( $conn,$query);
        $datosPerfiles = array();
//         echo $result;
//        print_r($result);
        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nuevoUsuario($fila['idusuario'], $fila['nombre'], $fila['codigo'], $fila['correo'], $fila['ciudad'],$fila['direccion'], 
                $fila['identificacion'], $fila['tipo_usuario'], $fila['usuario'], $fila['contrasenna']);
            array_push($datosPerfiles, $nuevoUsuario);
        }
//        $datosPerfiles = mysqli_fetch_all($result);
        return $datosPerfiles;
        
    }
    
    public function guardarCambios(){
        //`avatar` = '".$this->avatar."',
//`estado` = '".$this->estado."'
        $sql ="UPDATE `usuario`
SET
`codigo` = '".$this->codigo."',
`nombre` = '".$this->nombre."',
`correo` = '".$this->correo."',
`identificacion` = '".$this->identificacion."',
`direccion` = '".$this->direccion."',
`ciudad` = '".$this->ciudad."',
`tipo_usuario` = '".$this->tipo_usuario."',
`usuario` = '".$this->user."',
`contrasenna` = '".$this->pass."' 
 WHERE `idusuario` = '".$this->id."';";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        echo "<br>".$resp;
    }
                function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    public function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
