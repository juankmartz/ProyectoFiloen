<?php

//use conBD;

class Usuario {

    var $id = 0, $nombre = "SIN DEFINIR", $codigo = 0, $correo = "sindefinir@email.com", $ciudad = "no se", $direccion = "", $identificacion = "", $tipo_usuario = "INVITADO", $user = "", $avatar = "", $pass = "", $estado = "";

    public function nuevoUsuario($id, $nombre, $codigo, $correo, $ciudad, $direccion, $identificacion, $tipo_usuario, $user, $pass) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->correo = $correo;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->identificacion = $identificacion;
        $this->tipo_usuario = $tipo_usuario;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function UsuarioPorID($id) {
        include_once '../controlador/conBD.php';
        $query = "SELECT * FROM usuario where idusuario = " . $id . ";";
//        echo $query;
        $conn = conBD::conectar();
        $result = mysqli_query($conn, $query);
        $datos_usuario = mysqli_fetch_array($result);

//        $nuevoUser = $this->nuevoUsuario($datos_usuario["idusuario"], $datos_usuario["nombre"], $datos_usuario["codigo"]
//                , $datos_usuario["correo"], $datos_usuario["ciudad"], $datos_usuario["direccion"], $datos_usuario["idintificacion"]
//                , $datos_usuario["tipo_usuario"], $datos_usuario["usuario"], $datos_usuario["contrasenna"]);
//        echo $datos_usuario["idusuario"]. $datos_usuario["nombre"].$datos_usuario["codigo"]
//                . $datos_usuario["correo"]. $datos_usuario["ciudad"]. $datos_usuario["direccion"]. $datos_usuario["identificacion"]
//                .$datos_usuario["tipo_usuario"]. $datos_usuario["usuario"]. $datos_usuario["contrasenna"];
        $nuevo = new Usuario();
        $nuevo->nuevoUsuario($datos_usuario["idusuario"], $datos_usuario["nombre"], $datos_usuario["codigo"]
                , $datos_usuario["correo"], $datos_usuario["ciudad"], $datos_usuario["direccion"], $datos_usuario["identificacion"]
                , $datos_usuario["tipo_usuario"], $datos_usuario["usuario"], $datos_usuario["contrasenna"]);
        return $nuevo;
    }

    public function buscarUsuarioByCriterio($criterio, $tipo_usuario) {

        $query = "SELECT * FROM usuario WHERE nombre LIKE '%" . $criterio . "%' OR estado = '" . $criterio . "' OR  tipo_usuario = '" . $tipo_usuario . "' ; ";
        echo "buscar usuario por criterio funcion";
        $conn = conBD::conectar();
        $result = mysqli_query($conn, $query);
        $datosPerfiles = array();
//         echo $result;
//        print_r($result);
        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nuevoUsuario($fila['idusuario'], $fila['nombre'], $fila['codigo'], $fila['correo'], $fila['ciudad'], $fila['direccion'], $fila['identificacion'], $fila['tipo_usuario'], $fila['usuario'], $fila['contrasenna']);
            array_push($datosPerfiles, $nuevoUsuario);
        }
//        $datosPerfiles = mysqli_fetch_all($result);
        return $datosPerfiles;
    }

    public function buscarUsuarioByiD($idUser) {
        $query = "SELECT * FROM usuario WHERE idusuario = '" . $idUser . "'";

        $conn = conBD::conectar();
        $result = mysqli_query($conn, $query);
//        $datosPerfiles = array();
//         echo $result;
//        print_r($result);
//        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//            $nuevoUsuario = new Usuario();
//            $nuevoUsuario->nuevoUsuario($fila['idusuario'], $fila['nombre'], $fila['codigo'], $fila['correo'], $fila['ciudad'], $fila['direccion'], $fila['identificacion'], $fila['tipo_usuario'], $fila['usuario'], $fila['contrasenna']);
//            array_push($datosPerfiles, $nuevoUsuario);
//        }
//        $datosPerfiles = mysqli_fetch_all($result);
        $fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $this->nuevoUsuario($fila['idusuario'], $fila['nombre'], $fila['codigo'], $fila['correo'], $fila['ciudad'], $fila['direccion'], $fila['identificacion'], $fila['tipo_usuario'], $fila['usuario'], $fila['contrasenna']);

    }

    public function buscarUsuarioInvitarGrupo($criterio, $idGrupo) {

        $query = "SELECT U.* FROM usuario U WHERE ( U.nombre LIKE '%" . $criterio . "%' OR U.estado = '" . $criterio . "' ) AND  U.idusuario NOT IN ( SELECT `participante_sala`.`idusuario` FROM `participante_sala` where idsala_chat = '" . $idGrupo . "')";

        $conn = conBD::conectar();
        $result = mysqli_query($conn, $query);
        $datosPerfiles = array();
//         echo $result;
//        print_r($result);
        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nuevoUsuario($fila['idusuario'], $fila['nombre'], $fila['codigo'], $fila['correo'], $fila['ciudad'], $fila['direccion'], $fila['identificacion'], $fila['tipo_usuario'], $fila['usuario'], $fila['contrasenna']);
            array_push($datosPerfiles, $nuevoUsuario);
        }
//        $datosPerfiles = mysqli_fetch_all($result);
        return $datosPerfiles;
    }

    public function invitarSalaChat($idInvitado, $idSalaChat) {
        $conn = conBD::conectar();
        $hoy = conBD::getFechaActual();
        $query = "INSERT INTO `participante_sala`" .
                "(`idusuario`," .
                "`idsala_chat`," .
                "`fecha`," .
                "`estado`)" .
                "VALUES" .
                "('" . $idInvitado . "'," .
                "'" . $idSalaChat . "'," .
                "'" . $hoy . "'," .
                "'INVITADO'); ";
//        echo $query;
        mysqli_query($conn, $query);
        $existoInsert = mysqli_affected_rows($conn);
        if ($existoInsert > 0) {

            return true;
        } else {
            return false;
        }
    }

    public function guardarCambios() {

        $sql = "UPDATE `usuario`" .
                "SET" .
                "`codigo` = '" . $this->codigo . "'," .
                "`nombre` = '" . $this->nombre . "'," .
                "`correo` = '" . $this->correo . "'," .
                "`identificacion` = '" . $this->identificacion . "'," .
                "`direccion` = '" . $this->direccion . "'," .
                "`ciudad` = '" . $this->ciudad . "'," .
                "`tipo_usuario` = '" . $this->tipo_usuario . "'," .
                "`usuario` = '" . $this->user . "'," .
                "`contrasenna` = '" . $this->pass . "' " .
                "WHERE `idusuario` = '" . $this->id . "';";
//        echo $sql;
        $conn = conBD::conectar();
        $resp = mysqli_query($conn, $sql);
//        echo "<br>".$resp;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    public function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function registroInicioSession() {
        $idSession = session_id();
        $hoy = conBD::getFechaActual();
        $conn = conBD::conectar();
        $sql = "INSERT INTO `usuario_loging`" .
                "(" .
                "`idusuario`," .
                "`fecha`," .
                "`estado`," .
                "`idsession`)" .
                "VALUES" .
                "(" .
                "'" . $this->id . "'," .
                "'" . $hoy . "'," .
                "'CONECTADO'," .
                "'" . $idSession . "');";
        mysqli_query($conn, $sql);
    }

    function registroCierreSession() {
//        $idSession = session_id();
        $hoy = conBD::getFechaActual();
        $sql = "INSERT INTO `usuario_loging`
(
`idusuario`,
`fecha_salio`,
`estado`
)
VALUES
(
'" . $this->id . "',
'" . $hoy . "',
'DESCONECTADO');";
        mysqli_query($conn, $sql);
    }

}
