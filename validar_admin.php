<?php
// Definir la contraseña de administrador
$admin_password = 'admin'; // Cambia esto por la contraseña deseada

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    // Validar la contraseña
    $response = ['valid' => false];
    if ($password === $admin_password) {
        $response['valid'] = true;
    }
    echo json_encode($response);
} else {
    echo json_encode(['valid' => false, 'message' => 'Método de solicitud no válido.']);
}
?>
