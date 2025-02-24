<?php
require_once("funciones.php");
if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["rol"])) {
    agregarUsuario($_POST["usuario"], $_POST["password"], $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["rol"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles1.css">
</head>

<body>
<form method="POST" action="nuevoUsuario.php">
    <label>Usuario: </label>
    <input type="text" name="usuario" required><br>
    <label>Contraseña: </label>
    <input type="password" name="password" required><br>
    <label>Nombre: </label>
    <input type="text" name="nombre" required><br>
    <label>Apellido: </label>
    <input type="text" name="apellido" required><br>
    <label>Correo: </label>
    <input type="text" name="correo" required><br>
    <label>Rol: </label>
    <select name="rol" required>
        <option value="ventas">Ventas</option>
        <option value="compras">Compras</option>
        <option value="almacen">Almacén</option>
        <option value="ruta">Ruta</option>
    </select><br>
    <button type="submit">Enviar</button>
</form>
    <?php
        if(isset($error)){
            echo "<p>". $error . "</p>";
        }
    ?>
</body>
</html>