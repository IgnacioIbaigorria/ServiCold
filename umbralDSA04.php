<?php
require_once 'conexion.php';

$sql = "SELECT umbral FROM sensores WHERE tabla = 'ds18b20A04'";

$result = $con->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // Si se encontraron resultados
    $row = $result->fetch_assoc();
    // Convertir el valor de umbral a un número (si es posible)
    $umbral = floatval($row["umbral"]); // Convertir a float (número con decimales)
    if (!is_numeric($umbral)) {
        $response['error'] = "El valor del umbral no es numérico";
    } else {
        $response['umbral'] = $umbral;
    }
} else {
    $response['error'] = "No se encontraron resultados para tabla ds18b20A04";
}

// Cerrar conexión
$con->close();

// Devolver respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
