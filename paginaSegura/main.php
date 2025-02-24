<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    <link rel="stylesheet" href="styles_menu.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
        <a href="logout.php">Cerrar sesión</a>
        <a href="registrar_pedido.php">Registrar pedido</a>
        <a href="registrar_usuario.php">Registrar usuario</a>
        <a href="admin_dashboard.php">Admin dashboard</a>
        <a href="consulta_pedidos.php">Consultar pedidos</a>
        <a href="nuevoUsuario.php">Sign Up</a>
    </div>
</body>
</html>