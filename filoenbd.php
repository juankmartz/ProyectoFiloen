<?php 

require 'cn.php';


$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$nombre_usuario=$_POST["nombre_usuario"];
$clave=$_POST["clave"];
$email=$_POST["correo"];
$documento=$_POST["documento"];
$direccion=$_POST["direccion"];
$ciudad=$_POST["ciudad"];


$insertar = "INSERT into usuarios values ('$codigo', '$nombre', '$apellido', '$nombre_usuario', '$clave', '$email', '$documento', '$direccion' ,'$ciudad')";


$verificar_nombre_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' ");
if (mysqli_num_rows($verificar_nombre_usuario) == 1) {
    echo ' <script>
            alert("El usuario ya está registrado");
            window.history.go(-1);
            </script>';

    exit;
}

$verificar_numero_documento = mysqli_query($conexion, "SELECT * FROM usuarios WHERE documento = '$documento' ");
if (mysqli_num_rows($verificar_numero_documento) == 1) {
    echo ' <script>
            alert("El usuario ya está registrado");
            window.history.go(-1);
            </script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$email' ");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo ' <script>
            alert("El usuario ya está registrado");
            window.history.go(-1);
            </script>';
    exit;
}

$verificar_codigo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE codigo = '$codigo' ");
if (mysqli_num_rows($verificar_codigo) == 1) {
    echo ' <script>
            alert("El usuario ya está registrado");
            window.history.go(-1);
            </script>';
    exit;
}


$resultado =  mysqli_query($conexion, $insertar) or die("Error al insertar los registros");

mysqli_close($conexion);
echo ' <script>
            alert("Usted se ha registrado exitosamente, gracias por tu registro a FiloEn");
            location:ingreso.php;
            </script>';





 ?>