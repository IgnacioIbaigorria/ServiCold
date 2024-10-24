<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include 'conexion.php';

$response = [];

// Verifica si se recibió el parámetro 'sensor'
if (isset($_GET['sensor'])) {
    $sensor = mysqli_real_escape_string($con, $_GET['sensor']);

    if ($con) {
        // Consulta la base de datos utilizando el nombre del sensor
        $consulta = "SELECT nombre FROM sensores WHERE tabla = '$sensor'";
        $resultado = mysqli_query($con, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $response = mysqli_fetch_assoc($resultado);
        } else {
            http_response_code(404);
            $response = ["error" => "No se encontró información para el sensor solicitado"];
        }
    } else {
        http_response_code(500);
        $response = ["error" => "Error de conexión a la base de datos"];
    }
} else {
    http_response_code(400);
    $response = ["error" => "Parámetro 'sensor' faltante"];
}

echo json_encode($response);
?>
