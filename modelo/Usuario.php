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

    var $id = 0, $nombre = "SIN DEFINIR", $codigo= 0, $correo= "sindefinir@email.com", $ciudad="no se", $direccion="", $identificacion="", $tipo_usuario="INVITADO", $user="", $pass="";

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
