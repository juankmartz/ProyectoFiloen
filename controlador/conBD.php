<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conBD
 *
 * @author 
 */
class conBD {

    public function functionName($param) {
        echo 'hola mundo' . $param;
    }

    public function conectar() {
        $host = "localhost";
        $dbuser = "root";
        $dbpwd = "buffalo1";
        $db = "dbfiloen";
        $connect = mysqli_connect($host, $dbuser, $dbpwd, $db);

        return $connect;
    }
    
    function ejecutarInsert($sentencia){
        $connect = conectar();
        mysqli_query($connect, $sentencia);
    }

}
