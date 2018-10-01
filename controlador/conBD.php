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

    var $host = "mysql7003.site4now.net";
    var $dbuser = "a41246_filoen1";
    var $dbpwd = "filoen123";
    var $db = "db_a41246_filoen1";

//    var $host = "localhost";
//    var $dbuser = "root";
//    var $dbpwd = "buffalo1";
//    var $db = "dbfiloen";

    public function functionName($param) {
	echo 'hola mundo' . $param;
    }

    public function conectar() {
	$host = "mysql7003.site4now.net";
	$dbuser = "a41246_filoen1";
	$dbpwd = "filoen123";
	$db = "db_a41246_filoen1";
	$connect = mysqli_connect(
		$host, $dbuser, $dbpwd, $db);

	return $connect;
    }

    function ejecutarInsert($sentencia) {
	$connect = conectar();
	mysqli_query($connect, $sentencia);
	mysqli_close($connect);
    }

}
