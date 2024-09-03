<?php

include 'conexion.php';

if ($con) {
    // echo "Conexión con base de datos exitosa! ";
    
    // Verifica si se enviaron los datos de temperatura
    if (isset($_POST['temperatura'])) {
        $temperatura = $_POST['temperatura'];
        // echo " Temperatura enviada: " . $temperatura;
        
        // Establece la zona horaria (ajusta según tu ubicación)
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha_actual = date("Y-m-d H:i:s");
        
        // Prepara la consulta SQL para insertar los datos en la tabla ds18b20SIM usando consultas preparadas
        $consulta = $con->prepare("INSERT INTO ds18b20SIM (Temperatura, fecha_actual) VALUES (?, ?)");
        $consulta->bind_param("ss", $temperatura, $fecha_actual);
        
        // Ejecuta la consulta
        if ($consulta->execute()) {
            // echo " Registro en base de datos OK! ";
        } else {
            // echo " Falla! Registro BD";
            error_log("Error en la inserción en la base de datos: " . $consulta->error);
        }
        
        $consulta->close();
    } else {
        // echo "No se enviaron datos de temperatura";
        error_log("No se enviaron datos de temperatura");
    }
} else {
    // echo "Falla! Conexión con base de datos ";
    error_log("Falla en la conexión con la base de datos: " . mysqli_connect_error());
}

$con->close();

?>
