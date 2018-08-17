<?php 

session_start();
include "cn.php";
include "funciones.php";

if (isset($_SESSION['usuario'])) {
    header("Location: inicioEst.php");

   /* ini_set('error_reporting', 0); */
}
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">

    <link rel="stylesheet" href="css/estilos.css" >
    <link rel="stylesheet" href="css/ingresar.css">
    <link rel="stylesheet" href="css/fontello.css">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
    <script src="http://code.jquery.com/jquery-latest.js"></script> 

    <script> src="validarIngreso.js" </script>

    <script>
            function mostrarMensaje(){
                alert("Para ver Comunidad, ingresa tu usuario y contraseña!")
            }
    </script>

</head>
<body>

    <div class="encabezado">
        <img src="imagenes/logo1.png" alt="FiloEn" width="90px">
    </div>

    <div class="encabezado2">
        <h4>Filosofía y Enseñanza de la Filosofía</h4>
        <h2 class="filoen">FiloEn</h2>
    </div> 
                
    <div class="ingreso">
        <li><a href="ingreso.php"><span><img src="Imagenes/iniciara.png" alt=""  width="20px" ></span> Iniciar Sesión</a></li>
        <li><a href="registro.php"><span><img src="Imagenes/registroa.png" alt="" width="20px"></span> Registrarse</a></li>
        </div>

    <header>
 
        <div class="fondo1">
            <div class="fondo2">
            <img src="imagenes/855.png"/>
            <h1>Comunidad FiloEn</h1>
            </div>

            <div class="movimiento">
                    <ul>
                        <li><p>Ingresa y descubre todos los servicios enfocados al aprendizaje de la Filosofía...</p></li>
                        <li><p>Regístrate y aprende la Filosofía en Comunidad...</p></li>
                        <li><p>Hay una nueva forma de adquirir conocimiento filosófico...</p></li>
                        
                    </ul>
                </div>
            
            
        </div>
        
    </header>

    <div id="header">
        <nav class="navegacion">
            <ul class="menus">
                <li> <a href="index.php"><span><img src="Imagenes/home.png" alt="" width="20px"></span> Inicio</a></li>            
                <li> <a href="informate.php">Infórmate</a></li>
                <li> <a href="#">Nuestra Gente <span class="icon icon-angle-down"></span></a>
            <ul class="submenu">
                <li> <a href="#">Perfiles</a></li>
                <li> <a href="ingreso.php" onclick="mostrarMensaje()">Comunidad</a></li>
                <li> <a href="acercaFiloEn.php">Acerca de FiloEn</a></li>
            </ul> 
        </li>
        <li> <a href="#">Herramientas <span class="icon icon-angle-down"></span></a>
            <ul class="submenu">
                <li> <a href="#">Aplicaciones</a></li>
                <li> <a href="#">Biblioteca</a></li>
            </ul>
        </li>
        <li> <a href="contactenos.php">Contáctenos</a></li>
        </ul>
        </nav>
</div>
    
<h3 class="titulo">Ingresar</h3>
<hr class="linea">


<form id="form1" name="form1" action="" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre" name="usuario" maxlength="20" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="contraseña" name="contrasena" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="guardar" class="btn btn-primary">Ingresar a FiloEn</button>
    </div>
  </div>
<div class="container">
  <img src="Imagenes/FiloEn.png" alt="filosofia" width="200px" >
</div>
</form>

<?php 

if (isset($_POST['guardar'])) {
    
    $usuario = clean($_POST['usuario']);
    $contrasena = md5($_POST['contrasena']);

    $query = mysqli_query($connect, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena' ");

    $contar = mysqli_num_rows($query);

    if ($contar != 0) {
        while ($row=mysqli_fetch_array($query)) {
            
            if ($usuario == $row['usuario'] && $contrasena == $row['contrasena']) {
                
                $_SESSION['usuario'] = $usuario;

                /* $_SESSION['id'] = $row['id']; */



                header("Location: inicioEst.php");
            }
        }
    }else{
        echo "El nombre de ususario y la contraseña no coinciden. Por favor intentelo de nuevo";
    }
}
    
 ?>

<footer>
<div class="pie">
    <p>
    <a href="index.php">Inicio</a> | 
    <a href="contactenos.php">Contáctenos</a> |
    <a href="registro.php">Registro</a> |
    <a href="ingreso.php">Login</a> |                                                
    </p>
        <p>
            Copyright 2018. <a href="http://www.uis.edu.co/" rel="develop">Universidad Industrial de Santander</a>   <a href="http://www.filosofiayensenanza.org/inicio/" rel="develop">Grupo FiloEn</a>
        </p>
                        
</div>
</footer>
</body>
</html>