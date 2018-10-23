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


}
