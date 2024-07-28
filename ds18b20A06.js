// Variables para los datos de gráficos
let temperatureData = [];
let labels = [];
let sensorChart;

// Variable para almacenar el número fijo de datos a mostrar
let dataLimit = 25;

// Variable para almacenar la fecha seleccionada
let selectedDate = new Date().toISOString().split('T')[0]; // Fecha actual por defecto

// Inicializa el gráfico de líneas con Chart.js
function initializeChart() {
    const ctx = document.getElementById('sensorChart').getContext('2d');
    sensorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Temperatura (°C)',
                data: temperatureData,
                borderColor: 'rgba(255, 99, 132, 1)',
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    display: true,
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Temperatura (°C)'
                    },
                    // El rango será actualizado dinámicamente
                }
            },
            // Hacer que el gráfico sea responsivo
            responsive: true,
            // Mantener la relación de aspecto del gráfico al cambiar el tamaño
            maintainAspectRatio: false
        }
    });
}

// Agrega la asignación del evento onchange al campo de fecha selectedDate
document.getElementById('selectedDate').addEventListener('change', filterDataByDate);

// Función para filtrar los datos por fecha
function filterDataByDate() {
    console.log("Función filterDataByDate() llamada"); // Agrega esto para verificar si la función se está ejecutando
    let selectedDateValue = new Date(document.getElementById('selectedDate').value);
    
    // Si no se selecciona ninguna fecha, establece selectedDate a null para borrar el filtro
    if (!document.getElementById('selectedDate').value) {
        selectedDate = null;
    } else {
        // Formatea la fecha como YYYY-MM-DD
        selectedDate = selectedDateValue.toISOString().split('T')[0];
    }
    
    console.log(selectedDate);
    // Llama a loadAllData con la fecha seleccionada en el formato correcto
    loadAllData(selectedDate);
}

// Variable para almacenar el umbral obtenido
let temperatureThreshold;

function getThreshold() {
    console.log("Se está ejecutando la función getThreshold()");
    return fetch('https://servicoldingenieria.com/umbralDSA06.php', { cache: 'no-cache' })
        .then(response => response.json())
        .then(data => {
            if (data && typeof data.umbral !== 'undefined') {
                temperatureThreshold = data.umbral;
                console.log(`Umbral actualizado: ${temperatureThreshold}`);
            } else {
                console.log('No se encontró el umbral en los datos');
            }
        })
        .catch(error => {
            console.error('Error al obtener los datos del umbral:', error);
        });
}

// Bandera para controlar si la alerta ya se ha emitido
let alertEmitted = false;
let temperaturaObtenida;

// Función para verificar los datos del sensor de nivel de combustible
function checkTemp() {
    console.log("Se está ejecutando la función checkTemp()");
    // Realiza la solicitud HTTP GET para obtener los datos del sensor de nivel de combustible
    fetch('https://servicoldingenieria.com/checkTempA06.php',  {cache: 'no-cache' })
        .then(response => response.json())
        .then(data => {
            // Verifica si hay datos
            if (Array.isArray(data) && data.length > 0) {
                // Muestra los resultados y verifica las lecturas bajas
                data.forEach(item => {
                    // Verifica si el nivel de combustible está por debajo del umbral
                    if (parseFloat(item.Temperatura) >= temperatureThreshold && !alertEmitted) {
                        // Muestra una alerta en la página
                        alert(`¡Alerta! Temperatura alta: ${item.Temperatura}°C`);
                        temperaturaObtenida = parseFloat(item.Temperatura);


                        // Envía un correo electrónico de alerta
                        sendEmailAlert();

                        // Establece la bandera de alerta emitida en true para evitar emitirla nuevamente
                        alertEmitted = true;
                    }
                });
            }
        })
        .catch(error => {
            // Maneja los errores
            console.error('Error al obtener los datos del sensor de temperatura:', error);
        });
}

function sendEmailAlert() {
    console.log("Se llama la función sendEmailAlert()");

    // Solicitar los correos electrónicos de los usuarios que tienen acceso al sensor
    fetch('https://servicoldingenieria.com/back-end/emailDSA06.php')
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            console.log('Correos electrónicos obtenidos:', data);

            // Recorrer la lista de correos electrónicos y enviar la alerta a cada uno
            data.forEach(email => {
                console.log('Enviando alerta a:', email);

                // Construir los datos del formulario codificados
                const formData = new FormData();
                formData.append('to', email);
                formData.append('subject', 'Temperatura alta');
                formData.append('message', `¡Alerta! Temperatura alta: ${temperaturaObtenida}°C`);

                // Enviar la solicitud para enviar la alerta por correo electrónico
                fetch('https://servicoldingenieria.com/envioAlerta.php', {
                    method: 'POST',
                    body: formData // Pasa los datos del formulario
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Respuesta del servidor:', data); // Muestra la respuesta del servidor en la consola
                })
                .catch(error => {
                    console.error('Error al enviar la solicitud:', error);
                });
            });
        } else {
            console.error('No se encontraron correos electrónicos válidos');
        }
    })
    .catch(error => {
        console.error('Error al obtener los correos electrónicos:', error);
    });
}

// Función para formatear la fecha en el formato deseado (solo hora)
// Modifica la función para formatear la fecha en el formato deseado (solo hora)
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { 
        hour: 'numeric',
        minute: 'numeric'
    };
    return date.toLocaleTimeString('es-ES', options);
}

// Función para cargar los datos de la tabla y actualizar los gráficos
function loadAllData(selectedDate) {
    // URL para la solicitud a tu script PHP
    let url = `https://servicoldingenieria.com/DSGetA06.php?data_limit=${dataLimit}`;
    // Agrega el parámetro `selected_date` a la URL si se proporciona una fecha seleccionada
    if (selectedDate) {
        url += `&selected_date=${selectedDate}`;
    }
    // Realiza la solicitud HTTP GET a la URL
    fetch(url, { cache: 'no-cache' })
        .then(response => response.json())
        .then(data => {
            // Limpia el cuerpo de la tabla de resultados
            const resultBody = document.getElementById('resultBody');
            resultBody.innerHTML = '';
            
            labels = [];
            temperatureData = [];

            // Verifica si hay datos
            if (Array.isArray(data) && data.length > 0) {
                // Limita los datos según el parámetro de dataLimit
                // Verifica si dataLimit es nulo antes de limitar los datos
                if (dataLimit) {
                    data = data.slice(0, dataLimit);
                }   
                
                // Muestra los resultados en la tabla
                data.forEach(item => {
                    const row = document.createElement('tr');
                    // Muestra el nivel de combustible y la fecha de cada registro
                    row.innerHTML = `
                        <td>${item.Temperatura}</td>
                        <td>${formatDate(item.fecha_actual)}</td>`;
                    resultBody.appendChild(row);

                    // Actualiza las listas de datos para los gráficos
                    labels.push(formatDate(item.fecha_actual));
                    temperatureData.push(item.Temperatura);
                });

                // Limita las listas de datos según el dataLimit
                if (dataLimit){
                    labels = (labels.slice(-dataLimit)).reverse();
                    temperatureData = (temperatureData.slice(-dataLimit)).reverse();
                } else {
                    labels = labels.reverse();
                    temperatureData = temperatureData.reverse();
                }

                // Calcular el valor mínimo y máximo de los datos de temperatura
                const minTemp = Math.min(...temperatureData);
                const maxTemp = Math.max(...temperatureData);

                // Actualiza el gráfico con los nuevos límites del eje Y
                sensorChart.options.scales.y.min = minTemp;
                sensorChart.options.scales.y.max = maxTemp;
                sensorChart.data.labels = labels;
                sensorChart.data.datasets[0].data = temperatureData;
                sensorChart.update();
            } else {
                // Si no hay resultados, muestra un mensaje
                const row = document.createElement('tr');
                row.innerHTML = '<td colspan="2">No se encontraron resultados.</td>';
                resultBody.appendChild(row);
            }
        })
        .catch(error => {
            // Maneja los errores
            console.error('Error al obtener los datos:', error);
            const resultBody = document.getElementById('resultBody');
            const row = document.createElement('tr');
            row.innerHTML = '<td colspan="2">Error al obtener los datos.</td>';
            resultBody.appendChild(row);
        });
}

// Función para verificar la sesión del usuario
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

// Función para manejar el evento `change` en el menú desplegable `dataLimit`
function handleDataLimitChange() {
    // Obtén el valor de `dataLimit` desde el menú desplegable
    const dataLimitSelect = document.getElementById('dataLimit');
    const selectedDataLimit = dataLimitSelect.value;

    // Si se selecciona "Todas", establece dataLimit a null
    if (selectedDataLimit === 'all') {
        dataLimit = null;
    } else {
        // Si se selecciona un valor específico, convierte el valor a un número entero
        dataLimit = parseInt(selectedDataLimit);
    }

    // Llama a `loadAllData`
    loadAllData(selectedDate);
}
// Agrega la asignación del evento change al menú desplegable dataLimit
document.getElementById('dataLimit').addEventListener('change', handleDataLimitChange);

window.onload = function() {
    verificarSesion();
    getThreshold();
    checkTemp();
    initializeChart();
    
    // Establecer el valor predeterminado del campo de fecha con la fecha actual
    document.getElementById('selectedDate').value = selectedDate;

    loadAllData(selectedDate);  // Verifica la sesión y carga los datos
};


// Utiliza setInterval para verificar si hay nuevos datos cada 5 segundos
setInterval(() => {
    loadAllData(selectedDate);
}, 5000);
