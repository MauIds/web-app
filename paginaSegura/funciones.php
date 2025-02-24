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

function agregarUsuario($usuario, $password, $nombre, $apellido, $correo, $rol = 'ventas') {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (usuario, password, nombre, apellido, correo, rol) VALUES (?, ?, ?, ?, ?, ?)";
    $conexion = conectar();
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $usuario, $password, $nombre, $apellido, $correo, $rol);
        if (mysqli_stmt_execute($stmt)) {
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

function consultarPedido($numero_cliente, $numero_factura) {
    $conexion = conectar();
    $sql = "SELECT numero_cliente, numero_factura, fecha_hora FROM pedidos WHERE numero_cliente = ? AND numero_factura = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $numero_cliente, $numero_factura);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $numero_cliente, $numero_factura, $fecha_hora);
        mysqli_stmt_fetch($stmt);
        return ["numero_cliente" => $numero_cliente, "numero_factura" => $numero_factura, "fecha_hora" => $fecha_hora];
    }
    return null;
}

function consultarCliente($numero_cliente) {
    $conexion = conectar();
    $sql = "SELECT nombre_cliente FROM pedidos WHERE numero_cliente = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $numero_cliente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre_cliente);
        mysqli_stmt_fetch($stmt);
        return ["nombre" => $nombre_cliente];
    }
    return null;
}

function registrar_pedido($numero_factura, $nombre_cliente, $numero_cliente, $datos_fiscales, $fecha_hora, $direccion_entrega, $notas_adicionales) {
    $conexion = conectar();
    $sql = "INSERT INTO pedidos (numero_factura, nombre_cliente, numero_cliente, datos_fiscales, fecha_hora, direccion_entrega, notas_adicionales) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $numero_factura, $nombre_cliente, $numero_cliente, $datos_fiscales, $fecha_hora, $direccion_entrega, $notas_adicionales);
        if (mysqli_stmt_execute($stmt)) {
            echo "Pedido registrado correctamente";
        } else {
            echo "Error al ejecutar la consulta";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta";
    }
}

function crearUsuarioAdmin() {
    $conexion = conectar();
    $sql = "INSERT INTO usuarios (usuario, password, nombre, apellido, correo, rol) VALUES ('admin', ?, 'Admin', 'Admin', 'admin@example.com', 'admin')";
    $password = password_hash("admin", PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $password);
        mysqli_stmt_execute($stmt);
    }
}
crearUsuarioAdmin();


function entrada($usuario, $password)
{
    $conexion = conectar();
    $sql = "SELECT password, rol FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt){
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0){
            mysqli_stmt_bind_result($stmt, $password_en_bd, $rol);
            mysqli_stmt_fetch($stmt);
            if (password_verify($password, $password_en_bd))
            {
                $_SESSION["usuario"] = $usuario;
                $_SESSION["rol"] = $rol;
                header("Location: main.php");
                exit();
            } else {
                global $error;
                $error = "El usuario o contraseña son incorrectos";
            }
        } else {
            global $error;
            $error = "El usuario no existe";
        }
        mysqli_stmt_close($stmt);
    } else {
        global $error;
        $error = "Error al preparar la consulta";
    }
}
?>