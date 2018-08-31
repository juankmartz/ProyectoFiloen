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

    var $id, $nombre, $codigo, $correo, $ciudad, $direccion, $identificacion, $tipo_usuario, $user, $pass;
    public function Usuario($id, $nombre, $codigo, $correo, $ciudad, $direccion, $identificacion, $tipo_usuario, $user, $pass) {
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
//        return this;
    }
    public function UsuarioPorID($id) {
        
        $conn = $_SESSION["conexionBD"];
        $query = "SELECT * FROM usuario where idusuario = '".$id."';";
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
    }
    
    public function getNombre(){
        return $this->nombre;
    }

}
