<?php
require_once("funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_cliente = $_POST["numero_cliente"];
    $numero_factura = $_POST["numero_factura"];
    $pedido = consultarPedido($numero_cliente, $numero_factura);
    $cliente = consultarCliente($numero_cliente); // Asumiendo que existe una función para consultar el cliente
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Pedidos</title>
    <link rel="stylesheet" href="styles_consultar.css">
</head>
<body>
    <form method="POST" action="consulta_pedidos.php" id="consultaForm" <?php if (isset($pedido)) echo 'style="display:none;"'; ?>>
        <label>Número de Cliente:</label>
        <input type="text" name="numero_cliente" required><br>
        <label>Número de Factura:</label>
        <input type="text" name="numero_factura" required><br>
        <input type="submit" value="Consultar">
    </form>
    <?php
    if (isset($pedido)) {
        echo "<div id='pedidoInfo'>";
        echo "<p>Nombre del Cliente: " . htmlspecialchars($cliente["nombre"]) . "</p>";
        echo "<p>Número de Cliente: " . htmlspecialchars($pedido["numero_cliente"]) . "</p>";
        echo "<p>Número de Factura: " . htmlspecialchars($pedido["numero_factura"]) . "</p>";
        echo "<p>Fecha del Pedido: " . htmlspecialchars($pedido["fecha_hora"]) . "</p>";
        echo "<button onclick='mostrarFormulario()'>Regresar</button>";
        echo "</div>";
    }
    ?>
    <script>
        function mostrarFormulario() {
            document.getElementById('consultaForm').style.display = 'block';
            document.getElementById('pedidoInfo').style.display = 'none';
        }
    </script>
</body>
</html>