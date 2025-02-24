<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
</head>
<body>
    <?php
        $log = false; // Initialize $log to avoid undefined variable error
        if (isset($_POST["user"]) && isset($_POST["pass"])) { // Corrected the parentheses
            if ($_POST["user"] == "root" && $_POST["pass"] == "root") {
                $user = $_POST["user"];
                $log = true;
            }
        }
        if ($log == true) {
            echo "bienvenido $user";
        } else {
    ?> 
            <form method="POST" action="127.0.0.1/pagina.php"> <!-- Corrected FORM to form -->
                <label>Usuario:</label><input type="text" name="user" placeholder="Usuario"> <!-- Corrected LABEL to label -->
                <label>Contraseña:</label><input type="password" name="pass" placeholder="Contraseña"> <!-- Corrected LABEL to label -->
                <input type="submit" value="Iniciar sesión">
            </form>
    <?php
        }
    ?>
    <h1>Esta es la página de inicio</h1>
</body>
</html>