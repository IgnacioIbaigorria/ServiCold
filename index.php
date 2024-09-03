<?php
session_start();
include 'conexion.php'; // Asegúrate de que este archivo contiene tu conexión a la base de datos

// Verificar si el usuario está logueado
if (isset($_SESSION['usuario_id'])) {
    $user_id = $_SESSION['usuario_id'];
    
    // Consultar la base de datos para obtener el nombre de usuario
    $sql = "SELECT nombre FROM usuarios WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si se encontró un resultado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['nombre'];
    } else {
        $username = '';
    }
    
    $stmt->close();
    $con->close();
} else {
    $username = '';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiCold</title>
    <!-- Enlace al favicon -->
    <link rel="icon" href="https://servicoldingenieria.com/src/favicon.png" type="image/x-icon">
    <!-- Enlace a Bootstrap 5 desde tu carpeta npm -->
    <link rel="stylesheet" href="https://servicoldingenieria.com/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Enlace a tu archivo de estilos CSS -->
    <link rel="stylesheet" type="text/css" href="https://servicoldingenieria.com/css/styles.css">
    <!-- Enlace a Bootstrap 5 JavaScript -->
    <script src="https://servicoldingenieria.com/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script de redireccionamiento -->
    <script>
        if (window.location.href === "https://servicoldingenieria.com/") {
            window.location.href = "https://servicoldingenieria.com/home.php";
        }
    </script>
    <style>
    
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #172742, #202733);
            font-size: 16px;
        }
                

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #bcd3de;
            margin: 0;
            padding-bottom: 50px;
            padding-top: 0;
            background: linear-gradient(to right, #172742, #202733);
        }
        
        header, footer {
            color: #bcd3de;
            background: linear-gradient(to right, #172742, #202733);
        }
        
        .container .principal .boton {
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
        }
        
        p {
            font-size: 1.4rem;
            color: #bcd3de;
        }
        
        h1 {
            font-size: 2.5rem; 
            font-weight: 600;
            color: #74b5f9;

        }
        
        h2, h3, h4, h5, h6 {
            font-size: 1.5rem; 
            font-weight: 500;
            color: #74b5f9;

        }
        
        .logo {
            margin-left: 100px;
            height: 40px;
            margin-top: 10px;
            border: none;
        }
        
        ul a{
            text-decoration: none;
            font-size: 1rem;
            color: #bcd3de;
        }

        
        .btn-primary {
            color: #74b5f9;
            background-color: #303a48;
            border-color: #303a48;
            font-size: 1.25rem;
            padding: 5px 10px;
            margin-bottom: 0;
            border-radius: 10px;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        input {
            border-radius: 5px;
            width: 250px;
            margin-bottom: 15px;
        }

        label p {
            font-size: 1.2rem;
        }

        header {
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #202733;
            padding: 5px 10px;
            height: 60px; 
        }
        
        header img {
            height: 30px;
            border: none;
        }
        
        .nav-buttons {
            display: flex;
            gap: 10px;
        }
        
        .nav-buttons a {
            color: #bcd3de;
            text-decoration: none;
            padding: 3px 8px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .nav-buttons a:hover {
            background-color: #007bff;
            color: #fff;
        }
        
        .nav-buttons .active {
            background-color: #007bff;
            color: #fff;
        }
        
        /* Media queries para pantallas pequeñas */
        @media (max-width: 768px) {
            .col-md-8, .col-md-4, .col-md-9, .col-md-3, .col-md-6 {
                width: 100%;
            }
            p {
                font-size: 1rem;
                color: #bcd3de;
            }
            header{
            width: 100%;
            height: 30px;
            }
            
            header img {
            margin-left: 5px;
            border: none;
            }

            .logo {
            margin-left: 0; 
            height: 30px;
            margin-top: 5px;
            margin-right: 5px;
            border: none;
            }
                
            .nav-buttons {
                display: flex;
                justify-content: end;
                align-items: center;
                height: 10px;
                width: 5px;
                margin-top: 5px;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 576px) {
            .section {
                padding: 30px 10px;
            }
            
            header{
            width: 100%;
            height: auto;
            }
            
            p {
                font-size: 1rem;
                color: #bcd3de;
            }

        
            h1 {
                font-size: 2rem;
            }
        
            h2, h3, h4, h5, h6 {
                font-size: 1.25rem;
            }
        
            .btn-primary {
                font-size: 1rem;
                padding: 10px;
            }
        }

    </style>
</head>

<body>
    <!-- Cabecera -->
    <header class="p-4">
        <img src="imagenes/logo-fondo.png" alt="ServiCold SAS" class="img-fluid logo">
        <div class="nav-buttons">
            <a href="home.html">HOME</a>
            <a href="cambiarPassword.html">CAMBIAR CONTRASEÑA</a>
            <a href="https://servicoldingenieria.com/back-end/logout.php">SALIR</a>
        </div>
    </header>

    <div class="container principal">
        <h1 id="pageTitle">Gestión</h1>
    
        <div class="col-md-8 col-12">
            <!-- Lista de administración -->
            <ul>
                <li>
                    <!-- Enlace para navegar a la página de "Sensores" -->
                    <a href="sensores.html"><p>Sensores</p></a>
                </li>
                <!-- Puedes agregar más elementos de lista aquí si lo necesitas -->
            </ul>
        </div>
        <div class="col-md-4 col-12">
            <?php if ($username === 'Admin'): ?>
                <button onclick="mostrarFormulario()" class="btn boton btn-primary">Opciones de Administrador</button>
    
                <div id="formularioAdmin" style="display:none;">
                    <form id="adminForm">
                        <label for="password"><p>Contraseña de Administrador:</p></label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit" class="btn-primary">Ingresar</button>
                    </form>
                </div>
    
                <script>
                    function mostrarFormulario() {
                        document.getElementById('formularioAdmin').style.display = 'block';
                    }

                    document.getElementById('adminForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        var password = document.getElementById('password').value;

                        fetch('https://servicoldingenieria.com/back-end/validar_admin.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams({
                                'password': password
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.valid) {
                                window.location.href = 'aDmINnnisTrADor.html';
                            } else {
                                alert('Servicold SAS dice: Contraseña incorrecta. Inténtelo de nuevo.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Servicold SAS dice: Ha ocurrido un error. Inténtelo de nuevo.');
                        });
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://servicoldingenieria.com/verificarSesion.js"></script>
</body>

</html>

