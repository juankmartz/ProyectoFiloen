<?php 

$host= "localhost";
$dbuser = "root";
$dbpwd = "";
$db = "filoen";

$connect = mysqli_connect($host, $dbuser, $dbpwd, $db);

if (!$connect) 
	echo ("No se ha conectado cn la base de datos");

else
	$select = mysqli_select_db($connect, $db);

 ?>