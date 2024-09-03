<?php

include 'conexion.php';


if ($con) {
    echo "Conexión con base de datos exitosa! ";
    
    // Verifica si se enviaron los datos de nivel de combustible
    if (isset($_POST['temperatura'])) {
        $temperatura = $_POST['temperatura'];
        echo " Temperatura enviada: " . $temperatura;
        
        // Establece la zona horaria (ajusta según tu ubicación)
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha_actual = date("Y-m-d H:i:s");
        
        // Prepara la consulta SQL para insertar los datos en la tabla FL-902
        $consulta = "INSERT INTO `ds18b20A07` (Temperatura, fecha_actual) VALUES ('$temperatura', '$fecha_actual')";
        
        // Ejecuta la consulta
        $resultado = mysqli_query($con, $consulta);
        
        if ($resultado) {
            echo " Registro en base de datos OK! ";
        } else {
            echo " Falla! Registro BD";
        }
    } else {
        echo "No se enviaron datos de temperatura";
    }
} else {
    echo "Falla! Conexión con base de datos ";
}

?>
