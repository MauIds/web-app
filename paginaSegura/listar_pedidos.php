<?php
require_once("funciones.php");
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$conexion = conectar();
$sql = "SELECT * FROM pedidos";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filtro = $_POST["filtro"];
    $valor = $_POST["valor"];
    $sql .= " WHERE $filtro LIKE '%$valor%'";
}
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pedidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="listar_pedidos.php">
        <label>Buscar por:</label>
        <select name="filtro">
            <option value="numero_factura">Número de Factura</option>
            <option value="numero_cliente">Número de Cliente</option>
            <option value="fecha_hora">Fecha</option>
            <option value="estado">Estado</option>
        </select>
        <input type="text" name="valor" required>
        <input type="submit" value="Buscar">
    </form>
    <table>
        <tr>
            <th>Número de Factura</th>
            <th>Nombre del Cliente</th>
            <th>Número de Cliente</th>
            <th>Datos Fiscales</th>
            <th>Fecha y Hora</th>
            <th>Dirección de Entrega</th>
            <th>Notas Adicionales</th>
            <th>Estado</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["numero_factura"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nombre_cliente"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["numero_cliente"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["datos_fiscales"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["fecha_hora"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["direccion_entrega"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["notas_adicionales"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["estado"]) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>