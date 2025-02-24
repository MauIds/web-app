<?php
require_once("funciones.php");
session_start();
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["usuario"];
    $pass = $_POST["llave"];
    entrada($user, $pass);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="login.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="llave" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <?php
        if (!empty($error)) {
            echo "<p>" . $error . "</p>";
        }
    ?>
    <a href="nuevoUsuario.php">Sign Up</a>
</body>
</html>