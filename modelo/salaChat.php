<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salaChat
 *
 * @author desarrolloJuan
 */
class salaChat {

    var $idsala_chat = "", $titulo = "", $descripcion = "", $fecha = "0", $estado = "", $idadministrador = 0;
    function __construct() {
        
    }

    function getIdsala_chat() {
        return $this->idsala_chat;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdadministrador() {
        return $this->idadministrador;
    }

    function setIdsala_chat($idsala_chat) {
        $this->idsala_chat = $idsala_chat;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdadministrador($idadministrador) {
        $this->idadministrador = $idadministrador;
    }

    function cargarDatosSalaChat($idsala_chat, $titulo, $descripcion, $fecha, $estado, $idadministrador) {
        $this->idsala_chat = $idsala_chat;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->idadministrador = $idadministrador;
    }

    function buscarSalaChatPorIdSalaEstado($idsala_chat, $estado) {
        $this->idsala_chat = $idsala_chat;
        $this->estado = $estado;
    }

    function buscarSalaChatPorIdUser($idadministrador) {
        $this->idadministrador = $idadministrador;
    }

    public function publicarEnGrupo($idgrupo, $publicacion, $idUser) {
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $sql = "INSERT INTO `publicacion`
(`idusuario`,`fecha`,`estado`,`texto`,`tipo_publicacion`,`idgrupo`)
VALUES
(
'".$idUser."',
'".$hoy."',
'ACTIVO',
'".$publicacion."',
'TEXTO',
'".$idgrupo."');";
       $result = mysqli_query($conn, $sql);
       $result = mysqli_insert_id($conn);
       mysqli_close($conn);
        return $result;
    }
    
    function comentarPublicacion($idpublic, $iduser, $fecha,$comentario )
    {
        $sql = "INSERT INTO `comentario`
(
`idpublicacion`,
`idusuario`,
`fecha`,
`comentario`)
VALUES
(
'".$idpublic."',
'".$iduser."',
'".$fecha."',
'".$comentario."');";
        $conn = conBD::conectar();
        mysqli_query($conn, $sql);
        $nuevoId = mysqli_insert_id($conn);
        mysqli_close($conn);
        return $nuevoId;
    }
    
    static function buscarPublicacionesGrupo($idGrupo){
        $sql = "SELECT `publicacion`.`idpublicacion`,
    `publicacion`.`idusuario`,
    `publicacion`.`fecha`,
    `publicacion`.`estado`,
    `publicacion`.`texto`,
    `publicacion`.`link`,
    `publicacion`.`video`,
    `publicacion`.`imagen`,
    `publicacion`.`tipo_publicacion`,
    `publicacion`.`idgrupo`
FROM `publicacion` WHERE idgrupo = '".$idGrupo."';";
        $conn = conBD::conectar();
       $result = mysqli_query($conn, $sql);
       return $result;
    }
    
    static function buscarComentarioPublicacion($idPublicacion){
         $sql = "SELECT `comentario`.`idcomentario`,
    `comentario`.`idpublicacion`,
    `comentario`.`idusuario`,
    `comentario`.`fecha`,
    `comentario`.`comentario`
FROM `comentario` WHERE idpublicacion = '".$idPublicacion."' ;";
        $conn = conBD::conectar();
//        echo 'buscando comentarios '. $sql;
       $result = mysqli_query($conn, $sql);
       return $result;
    }

}
