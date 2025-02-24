<?php
require_once("funciones.php");
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != "admin") {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];
    agregarUsuario($usuario, $password, $nombre, $apellido, $correo, $rol);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="registrar_usuario.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Apellido:</label>
        <input type="text" name="apellido" required><br>
        <label>Correo:</label>
        <input type="email" name="correo" required><br>
        <label>Rol:</label>
        <select name="rol" required>
            <option value="ventas">Ventas</option>
            <option value="compras">Compras</option>
            <option value="almacen">Almacén</option>
            <option value="ruta">Ruta</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>