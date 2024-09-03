<<<<<<< HEAD
function verificarSesion(){
    fetch('https://servicoldingenieria.com/back-end/verificar_sesion.php')
        .then(response => response.json())
        .then(data => {
            // Manejar la respuesta del servidor
            if (!data.success) {
                // Usuario no autenticado, redirigir al formulario de inicio de sesión
                window.location.href = 'login.html';
            }
        })
        .catch(error => console.error('Error:', error));
}
window.onload = function() {
    verificarSesion(); // Carga los datos
};
=======
function verificarSesion(){
    fetch('https://servicoldingenieria.com/back-end/verificar_sesion.php')
        .then(response => response.json())
        .then(data => {
            // Manejar la respuesta del servidor
            if (!data.success) {
                // Usuario no autenticado, redirigir al formulario de inicio de sesión
                window.location.href = 'login.html';
            }
        })
        .catch(error => console.error('Error:', error));
}
window.onload = function() {
    verificarSesion(); // Carga los datos
};
>>>>>>> c6df4590b758e67527316ee00b83bc1b861455b4
