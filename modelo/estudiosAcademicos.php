<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estudiosAcademicos
 *
 * @author desarrolloJuan
 */
class estudiosAcademicos {
    var $idAcademico = 0, $idUser = "",$titulo = "", $institucion = "",$anno = "", $fecha ="";
    function getIdAcademico() {
        return $this->idAcademico;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getAnno() {
        return $this->anno;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setIdAcademico($idAcademico) {
        $this->idAcademico = $idAcademico;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setAnno($anno) {
        $this->anno = $anno;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function obtenerArrayInformacionAcademicaPorIDUser($iduser){
        $conn = conBD::conectar();
        $sql = "";
        $result = mysqli_query($conn, $sql);
        
    }
            

}
