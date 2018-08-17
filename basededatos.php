
<?php 

//CONECTAMOS CON EL SERVIDOR
$conectar = mysqli_connect('localhost', 'root', '', 'pruebafiloen');

//VERIFICAMOS LA CONEXION 
if (!$conectar) {
	echo "NO SE PUDO CONECTAR CON EL SERVIDOR";
}

//RECUPERAR LAS VARIABLES
$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$nombre_usuario=$_POST["nombre_usuario"];
$clave=$_POST["clave"];
$email=$_POST["correo"];
$documento=$_POST["documento"];
$direccion=$_POST["direccion"];
$ciudad=$_POST["ciudad"];

//HACEMOS LA SENTENCIA SQL
$sql = "INSERT INTO usuarios VALUES ('$codigo', '$nombre', '$apellido', '$nombre_usuario', '$clave', '$email', '$documento', '$direccion' ,'$ciudad')";

//EJECUTAMOS LA SENTENCIA SQL
$ejecutar=mysqli_query($sql);

//VERIFICAMOS LA EJECUCION
if (!$ejecutar) {
	echo "HUBO ALGUN ERROR";
}else{
	echo "DATOS GUARDADOS CORRECTAMENTE <br><a href='registro.php'>Volver</a>";
}


 ?>



