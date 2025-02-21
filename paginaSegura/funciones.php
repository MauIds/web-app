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


session_start();
function entrada($usuario, $password)
{
    $conexion = conectar();
    $sql = "SELECT PASSWORD FROM usuarioss WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt){
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt)>0){
            
            mysqli_stmt_bind_result($stmt, $password_en_bd);
            mysqli_stmt_fetch($stmt);
            if (password_verify($password, $password_en_bd))
            {
                $_SESSION["usuario"] = $usuario;
                header("Location: main.php");
                exit();
            } else {
                $error = "El usuario o contraseña son incorrectos";
            }
        } else {
            $error = "El usuario no existe";
        }
    }      
}
?>