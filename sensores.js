document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript cargado y DOM completamente construido'); // Log inicial

    fetch('https://servicoldingenieria.com/back-end/sensoresUsuario.php')
        .then(response => {
            console.log('Estado de la respuesta:', response.status); // Log para el estado de la respuesta
            if (!response.ok) {
                throw new Error('Error en la respuesta de la solicitud fetch');
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta del servidor:', data); // Log para la respuesta JSON
            if (data.error) {
                console.error('Error:', data.error);
                return;
            }

            const sensorList = document.getElementById('sensorList');

            data.forEach(sensor => {
                const sensorItem = document.createElement('li'); // Crear un elemento <li> para el sensor
                const sensorLink = document.createElement('a'); // Opcional: crear un elemento <a> para el enlace
                const url = `https://servicoldingenieria.com/${sensor.tabla}.html`;
                console.log('Generated URL:', url); // Log para la URL generada
                sensorLink.textContent = sensor.nombre; // Mostrar el nombre amigable
                sensorLink.href = url; // Enlace a la página del sensor
                sensorLink.classList.add('sensor-link');
                sensorItem.appendChild(sensorLink); // Agregar el enlace al elemento <li>
                sensorList.appendChild(sensorItem); // Agregar el elemento <li> al contenedor de la lista
            });
        })
        .catch(error => {
            console.error('Error en la solicitud fetch:', error); // Log para el error en fetch
        });
});
