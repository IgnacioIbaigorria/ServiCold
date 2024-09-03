<?php
// Incluir archivo de conexión
require_once 'conexion.php';

// Consulta SQL para obtener el umbral donde tabla es FL902(2)
$sql = "SELECT umbral FROM sensores WHERE tabla = 'FL902(2)'";

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
    $response['error'] = "No se encontraron resultados para tabla FL902(2)";
}

// Cerrar conexión
$con->close();

// Devolver respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
