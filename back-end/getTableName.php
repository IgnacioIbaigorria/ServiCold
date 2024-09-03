<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include 'conexion.php';

$response = [];
$debugMessages = [];

// Obtener el nombre del archivo sin la extensión .html
$url = $_SERVER['REQUEST_URI'];
// Obtener el nombre del archivo sin la extensión .php
$htmlFileName = pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_FILENAME);

// Agregar mensaje de depuración
$debugMessages[] = "Nombre del archivo extraido: " . $htmlFileName;

if ($con) {
    // Consultar el nombre del sensor correspondiente al nombre del archivo
    $consulta = "SELECT nombre FROM sensores WHERE tabla = ?";
    $stmt = $con->prepare($consulta);

    // Agregar mensaje de depuración
    $debugMessages[] = "Consulta preparada: " . $consulta;

    $stmt->bind_param("s", $htmlFileName);
    $stmt->execute();
    $stmt->bind_result($sensorName);
    $stmt->fetch();

    if ($sensorName) {
        $response["sensorName"] = $sensorName;
    } else {
        http_response_code(404);
        $response["error"] = "Sensor no encontrado";
    }

    $stmt->close();
} else {
    http_response_code(500);
    $response["error"] = "Error de conexión a la base de datos";
}

// Incluir mensajes de depuración en la respuesta JSON
$response["debug"] = $debugMessages;

echo json_encode($response);
$con->close();
?>
