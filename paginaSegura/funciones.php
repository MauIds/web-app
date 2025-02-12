<?php
///////////////////////////////////////////////
///// variables/constantes globales  /////////
///////////////////////////////////////////////

define("servidor", "localhost");
define("basededatos", "dbperrona");
define("usuario", "lectura");
define("password", "mipassword");

///////////////////////////////////////////////
function conectar(){
    if (!($conexion = mysqli_connect(servidor, usuario, password, basededatos))){
        echo "Error conectando a la base de datos.";
        exit();
    }
    return $conexion;
}

function agregarUsuario($usuario, $password, $nombre, $apellido, $correo)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarioss (usuario, PASSWORD, nombre, apellido, correo) VALUES (?, ?, ?, ?, ?)";
    $conexion = conectar();
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt){
        mysqli_stmt_bind_param($stmt, "sssss", $usuario, $password, $nombre, $apellido, $correo);
        if (mysqli_stmt_execute($stmt)){
            echo "Usuario agregado correctamente";
            header("Location: login.php");
        } else {
            echo "Error al ejecutar la consulta";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta";
    }

}
?>