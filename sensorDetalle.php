<?php
// Habilitar el reporting de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Función para registrar errores y solicitudes en un archivo
function logMessage($message) {
    $logFile = 'error_logBD.txt'; // Ruta del archivo de log
    $timestamp = date("Y-m-d H:i:s"); // Obtener la fecha y hora actuales
    $formattedMessage = "[$timestamp] $message" . PHP_EOL; // Formatear el mensaje
    file_put_contents($logFile, $formattedMessage, FILE_APPEND); // Escribir en el archivo
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include 'conexion.php';

$response = [];

// Registrar la solicitud y sus parámetros
$requestData = json_encode($_GET);
logMessage("Solicitud recibida: $requestData");

if ($con) {
    $sensorName = isset($_GET['sensor_name']) ? $_GET['sensor_name'] : null;
    $limit = isset($_GET['limit']) && in_array($_GET['limit'], ['25', '50', '100', '200', 'all']) ? $_GET['limit'] : '25';
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;

    if ($sensorName) {
        // Buscar el nombre de la tabla correspondiente y el tipo de sensor
        $consulta = "SELECT tabla, tipo, umbral, umbralMax FROM `sensores` WHERE nombre = '$sensorName'";
        $resultado = mysqli_query($con, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $tabla = $fila['tabla'];
            $tipoSensor = $fila['tipo'];
            $umbral_actual = $fila['umbral'];
            $umbral_max_actual = $fila['umbralMax'];

            // Determinar las columnas a seleccionar según el tipo de sensor
            if ($tipoSensor == 'temperatura') {
                $columns = "Temperatura, fecha_actual";
            } elseif ($tipoSensor == 'combustible') {
                $columns = "nivel_combustible, fecha_actual";
            } else {
                http_response_code(400);
                $errorMessage = "Tipo de sensor no reconocido";
                logMessage($errorMessage); // Log del error
                echo json_encode(["error" => $errorMessage]);
                exit();
            }

            // Establecer el límite de registros si no es 'all'
            $limitClause = $limit !== 'all' ? "LIMIT $limit" : "";

            // Filtrar los datos por fechas si se proporcionan
            $dateFilterClause = '';
            if ($start_date && $end_date) {
                $dateFilterClause = "AND DATE(fecha_actual) BETWEEN DATE('$start_date') AND DATE('$end_date')";
            } else if ($start_date){
                $dateFilterClause = "AND DATE(fecha_actual) >= DATE('$start_date')";
            } else {
                $dateFilterClause = "AND DATE(fecha_actual) = CURRENT_DATE";
            }

            // Consultar los datos del sensor desde la tabla correspondiente
            $consultaDatos = "SELECT $columns FROM `$tabla` WHERE 1=1 $dateFilterClause ORDER BY fecha_actual DESC $limitClause";
            $resultadoDatos = mysqli_query($con, $consultaDatos);

            if ($resultadoDatos) {
                while ($filaDatos = mysqli_fetch_assoc($resultadoDatos)) {
                    $response['data'][] = $filaDatos;
                }
            } else {
                http_response_code(500);
                $errorMsg = "Error al consultar la tabla de datos del sensor: " . mysqli_error($con);
                logMessage($errorMsg); // Log del error
                $response['error'] = "Error al consultar la tabla de datos del sensor";
            }

            // Agregar información del umbral actual
            $response['umbral_actual'] = $umbral_actual;
            $response['umbral_max_actual'] = !empty($umbral_max_actual) ? $umbral_max_actual : null;

        } else {
            http_response_code(404);
            $errorMessage = "Sensor no encontrado";
            logMessage($errorMessage); // Log del error
            $response = ["error" => $errorMessage];
        }
    } else {
        http_response_code(400);
        $errorMessage = "Nombre de sensor no proporcionado";
        logMessage($errorMessage); // Log del error
        $response = ["error" => $errorMessage];
    }
} else {
    http_response_code(500);
    $errorMessage = "Error de conexión a la base de datos";
    logMessage($errorMessage); // Log del error
    $response = ["error" => $errorMessage];
}

echo json_encode($response);
?>
