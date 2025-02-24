<?php
require_once("funciones.php");
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_factura = $_POST["numero_factura"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $numero_cliente = $_POST["numero_cliente"];
    $datos_fiscales = $_POST["datos_fiscales"];
    $fecha_hora = $_POST["fecha_hora"];
    $direccion_entrega = $_POST["direccion_entrega"];
    $notas_adicionales = $_POST["notas_adicionales"];
    registrar_pedido($numero_factura, $nombre_cliente, $numero_cliente, $datos_fiscales, $fecha_hora, $direccion_entrega, $notas_adicionales);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pedido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="registrar_pedido.php">
        <label>Número de Factura:</label>
        <input type="text" name="numero_factura" required><br>
        <label>Nombre del Cliente:</label>
        <input type="text" name="nombre_cliente" required><br>
        <label>Número de Cliente:</label>
        <input type="text" name="numero_cliente" required><br>
        <label>Datos Fiscales:</label>
        <input type="text" name="datos_fiscales" required><br>
        <label>Fecha y Hora:</label>
        <input type="datetime-local" name="fecha_hora" required><br>
        <label>Dirección de Entrega:</label>
        <input type="text" name="direccion_entrega" required><br>
        <label>Notas Adicionales:</label>
        <textarea name="notas_adicionales"></textarea><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>