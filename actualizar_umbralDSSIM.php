<?php
// Incluir archivo de conexión
require_once 'conexion.php';

// Verificar si se ha recibido un valor de umbral para actualizar
if (isset($_POST['nuevoUmbral'])) {
    // Sanitizar y obtener el nuevo valor del umbral
    $nuevoUmbral = $_POST['nuevoUmbral'];

    // Preparar la consulta SQL para actualizar el umbral
    $sql = "UPDATE sensores SET umbral = '$nuevoUmbral' WHERE tabla = 'ds18b20SIM'";

    if ($con->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal después de la actualización
        header("Location: ds18b20SIM.html");
        exit();
    } else {
        echo "Error al actualizar el umbral: " . $con->error;
    }
} else {
    echo "No se recibió un nuevo valor de umbral para actualizar.";
}

// Cerrar conexión
$con->close();
?>
