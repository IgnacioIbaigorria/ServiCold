<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    // Verifica la conexión a la base de datos
    if ($con) {
        $sql = "INSERT INTO sensores (nombre, tabla) VALUES ('$nombre', '')";
        if (mysqli_query($con, $sql)) {
            echo "<script>
            alert('Sensor registrado con éxito.');
            window.location.href = 'aDmINnnisTrADor.html'; //
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
            mysqli_close($con);
        }
    }
    else {
        echo "Error de conexión a la base de datos.";
    }
}
?>
