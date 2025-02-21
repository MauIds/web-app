<?php
   require_once("funciones.php");
    if(!isset($_SESSION["usuario"])){
        header("Location: login.php");
        exit();
    }
    $conexion = conectar();
    $sql = "SELECT * FROM items";
    $result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
   <div class="contenido">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>STR</th>
                <th>AGI</th>
                <th>INT</th>
                <th>MND</th>
                <th>VIT</th>
                <th>Descripcion</th>
            </tr>
            <?php
                if (mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".htmlspecialchars($row["id"])."</td>";
                        echo "<td>".htmlspecialchars($row["name"])."</td>";
                        echo "<td>".htmlspecialchars($row["type"])."</td>";
                        echo "<td>".htmlspecialchars($row["STR"])."</td>";
                        echo "<td>".htmlspecialchars($row["AGI"])."</td>";
                        echo "<td>".htmlspecialchars($row["INTE"])."</td>";
                        echo "<td>".htmlspecialchars($row["MND"])."</td>";
                        echo "<td>".htmlspecialchars($row["VIT"])."</td>";
                        echo "<td>".htmlspecialchars($row["description"])."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
</body>
</html>