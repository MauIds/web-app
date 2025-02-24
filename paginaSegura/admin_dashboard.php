<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != "admin") {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles_admin.css">
</head>
<body>
    <h1>Bienvenido, Administrador</h1>
    <a href="registrar_usuario.php">Registrar Nuevo Usuario</a><br>
    <a href="consulta_pedidos.php">Consultar Pedidos</a><br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>