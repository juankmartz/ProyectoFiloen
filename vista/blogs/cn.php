<?php

$host = "mysql7003.site4now.net";
$dbuser = "a41246_filoen1";
$dbpwd = "filoen123";
$db = "db_a41246_filoen1";
//	$host= "localhost";
//	$dbuser = "root";
//	$dbpwd = "123buf";
//	$db = "db_a41246_filoen1";

$connect = mysqli_connect($host, $dbuser, $dbpwd, $db);

if (!$connect)
    echo ("No se ha conectado cn la base de datos");
else
    $select = mysqli_select_db($connect, $db);
?>