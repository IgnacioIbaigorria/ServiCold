<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ServiCold SAS</title>
    <link rel="icon" href="https://servicoldingenieria.com/src/favicon.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="icon" href="https://servicoldingenieria.com/src/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #172742, #202733);
            font-size: 16px; /* Asegúrate de tener un tamaño base razonable */
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
        
        p {
            font-size: 1.4rem;
            color: #bcd3de;
            line-height: 1.3;
        }
        
        h1 {
            font-size: 2.7rem; /* Ajustar tamaño para pantallas más pequeñas */
            font-weight: 600;
            color: #74b5f9;

        }
        
        h2, h3, h4, h5, h6 {
            font-size: 1.8rem; /* Ajustar tamaño para pantallas más pequeñas */
            font-weight: 500;
            color: #74b5f9;

        }
        
        .logo {
            margin-left: 100px; /* Ajustar el margen */
            height: 40px;
            margin-top: 10px;
            border: none;
        }
        
        .section {
            padding: 50px 20px; /* Reducir padding para dispositivos móviles */
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        
        /* Ajustar el margen superior de la primera sección para compensar el header fijo */
        #section1 {
            margin-top: 75px; /* Ajusta este valor según la altura de tu header */
        }

        .card {
            background-color: #303a48; /* Fondo de las tarjetas */
            color: #bcd3de; /* Color de la fuente */
        }

        .card p{
            font-size: 1.2rem;
        }
        
        .card-header .btn {
            width: 100%;
            text-align: left;
            padding: 0.5rem;
            border: none;
            background: none;
            outline: none;
            font-size: 1.4rem;
            color: #74b5f9;
        }
        
        .card-header .btn:hover {
            text-decoration: none;
        }
                
        .card + .card {
            margin-top: 1rem; /* Separación entre tarjetas */
        }

        .client-image {
            max-height: 350px; /* Ajusta este valor según tus necesidades */
            max-width: 500px;
            object-fit: contain;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        .carousel {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px; /* Ajusta este valor según tus necesidades */
        }

        .carousel-inner .carousel-item.active{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px; /* Ajusta este valor según tus necesidades */
            width: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .carousel-inner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px; /* Ajusta este valor según tus necesidades */
            width: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .carousel-inner .carousel-item {
            display: none;
            justify-content: center;
            align-items: center;
            height: 350px; /* Ajusta este valor según tus necesidades */
            width: auto;
            margin-left: auto;
            margin-right: auto;
        }
    

        .video-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #172742, #202733);
            overflow: hidden;
            border-radius: 10px;
            margin-top: 80px;
        }
        
        .video-bienvenido {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }
        
        .video-bienvenido video {
            width: 100%;
            height: 100%;
            max-height: 100%;
            object-fit: cover;
            object-position: bottom; /* Recorta el video desde abajo */
            border-radius: 10px;
        }
                                
        .video-container video {
            max-width: 800px;
            max-height: 800px;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
                                
        .section.in-view {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Desactivar el fondo opaco del modal */
        .modal-backdrop {
            display: none;
        }

        /* Personalizar el fondo del modal */
        .modal-content {
            background-color: #202733; /* Cambia el color según tus necesidades */
            color: #bcd3de; /* Cambia el color del texto según tus necesidades */
        }
        .modal-title {
            text-align: center;
            width: 100%;
        }
        
        .modal-body .text-center {
            text-align: center;
        }

        .blurred {
            filter: blur(5px);
            transition: filter 0.3s;
        }
    
        #productDescription {
            text-align: left;
        }
                                
        .frente {
            border-radius: 10px;
            width: 100%;
            height: auto;
        }
        .conectividad-title {
            font-size: 2.5rem;
            text-align: start;
            color: #74b5f9;
            margin-bottom: 20px;
        }

        .slogan {
            font-size: 2.5rem;
        }

        .section-title {
            font-size: 3rem;
            text-align: center;
            color: #74b5f9;
            margin-bottom: 20px;
        }
        
        .section-content {
            font-size: 1.8rem;
        }
        
        .conectividad-box {
            color: #e3f2fd;
            border-radius: 10px;
            border: 1px solid #74b5f9;
            background: #202733;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
            margin: 20px 20px; /* Quita el margen inferior */
            width: 400px; /* Establece el ancho fijo */
            height: 180px; /* Establece la altura fija */
            box-shadow: 0 0 15px rgba(116, 181, 249, 0.5); /* Añade un difuminado en el borde */
        }
                
        .conectividad-box h3 {
            margin-top: 15px;
            margin-left: 15px;
            margin-right: 15px;
        }

        .conectividad-box p {
            margin-bottom: 15px;
            margin-left: 15px;
            margin-right: 15px;
        }
        
        .fila-caja {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centra las cajas en el contenedor */
        }
        
        .fila-caja > .col-md-6 {
            padding: 0; /* Quita el padding de las columnas para evitar duplicación */
            box-sizing: border-box;
            flex: none; /* Hace que las columnas tomen el mismo ancho */
        }
        
        .imag-conectividad {
            border-radius: 10px;
            width: 400px;
            height: 390px;
        }
        
        .product-box {
            color: #e3f2fd;
            border-radius: 10px;
            border: 1px solid #74b5f9;
            background: #202733;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            margin: 20px 20px; /* Quita el margen inferior */
            width: 500px; /* Establece el ancho fijo */
            height: 250px; /* Establece la altura fija */
        }
        
        .product-box h3 {
            margin-top: 15px;
            margin-left: 15px;
            margin-right: 15px;
        }

        .product-box p {
            margin-bottom: 15px;
            margin-left: 15px;
            margin-right: 15px;
        }
        
        .ver-mas {
            font-size: 1.5rem;
            color: #74b5f9;
            background-color: #303a48;
            outline: none;
            border-radius: 10px;
            border-color: #303a48;
            height: 50px;
            width: 200px;
            align-items: center;
            text-align: center;
            justify-content: center;
            margin-bottom: 15px;

        }
        .ver-mas:hover{
            border-color: #fff;
            color: #fff;
        }

        .icon {
            margin-top: 30px;
        }

        .btn-primary {
            background-color: #2b78c5;
            border-color: #2b78c5;
            color: #e3f2fd;
            font-size: 1.25rem;
            margin-bottom: 15px;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        
        .asset-box img.icon, .contact-box img.icon {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
        
        #monitoreo .asset-box h3, #servicios-refrigeracion .service-box h3, #contacto .contact-box h3 {
            color: #74b5f9;
        }


        .contact-box a {
            color: #bcd3de;
            text-decoration: none;
        }
        
        .contact-box a:hover p {
            color: #74b5f9;
        }
        
        
        .contact-box a:hover .icon {
            filter: brightness(1.5); /* Opcional: brillo en el icono al pasar el cursor */
        }
        
        .timeline {
            position: relative;
            padding: 0;
            list-style: none;
        }
        
        .impar-lt {
            text-align: right;
        }

        .timeline:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #74b5f9;
            left: 50%;
            margin-left: -2px;
        }
        
        .timeline-item {
            margin-bottom: 50px;
            position: relative;
        }
        
        .timeline-item:before,
        .timeline-item:after {
            content: '';
            display: table;
        }
        
        .timeline-item:after {
            clear: both;
        }
        
        .timeline-item .timeline-panel {
            width: 46%;
            float: left;
            border: 3px solid #74b5f9;
            border-radius: 10px;
            background: #202733;
            color: #e3f2fd;
            padding: 20px;
            position: relative;
        }
        
        .timeline-item:nth-child(even) .timeline-panel {
            float: right;
        }
        
        .timeline-item .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 20px;
            left: 50%;
            margin-left: -25px;
            background-color: #74b5f9;
            border-radius: 50%;
            z-index: 100;
        }
        
        .timeline-item:nth-child(even) .timeline-badge {
            top: 0;
            bottom: 20px;
            left: auto;
            right: 50%;
            margin-right: -25px;
        }

        #contacto .contact-box h3 {
            color: #09061B;
        }
        
        /* Header fijo */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #202733;
            padding: 5px 10px;
            height: 60px; /* Ajustar la altura */
        }
        
        header img {
            height: 30px; /* Reducir el tamaño de la imagen */
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
                font-size: 0.8rem;
                color: #bcd3de;
                line-height: 1.3;
            }
            header{
            width: 100%;
            height: 30px;
            }
            
            header img {
            margin-left: 5px;
            border: none;
            }
            
            .fila-caja > .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-top: 15px;
                align-items: center;
                justify-content: center;
            }
            
        
            .conectividad-box {
                margin-bottom: 15px;
            }

            .product-box {
                width: 100%;
                height: auto;
                margin-right: auto;
                margin-left: auto;
                justify-content:center;
                align-items:center;
            }

            
            .timeline {
                display: none;
                align-items: center;
                justify-content: center;
            }
        
            .carousel-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
        
            .carousel-inner .carousel-item {
                display: none;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                max-width: 100%;
                width: 100%;
                height: auto;
            }
        
            .carousel-inner .carousel-item.active {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                max-width: 100%;
                width: auto;
                height: auto;
                margin-right: auto;
                margin-left: auto;
            }
        
            .carousel {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        
            .carousel-inner .carousel-item .timeline-panel {
                width: auto;
                height: auto;
                float: none;
                border: none;
                background: #202733;
                color: #e3f2fd;
                padding: 20px;
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
        
            .carousel-control-prev,
            .carousel-control-next {
                width: 5%;
            }
        
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: #74b5f9;
                border-radius: 50%;
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
                font-size: 0.65rem;
            }


            .section-title {
                font-size: 2rem;
            }
        
            .section-content {
                font-size: 0.8rem;
            }
        }
        
        @media (min-width: 768px) {
            #timelineCarousel {
            display: none;
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

    <header class="p-4">
        <img src="imagenes/logo-fondo.png" alt="ServiCold SAS" class="img-fluid logo">
        <div id="botones-nav" class="nav-buttons">
            <a href="#" class="active">HOME</a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="index.php">GESTIÓN</a>
                <a href="https://servicoldingenieria.com/back-end/logout.php">SALIR</a>
            <?php else: ?>
                <a href="#contacto">CONTACTO</a>
                <a href="https://servicoldingenieria.com/login.html">INICIAR SESIÓN</a>
            <?php endif; ?>

        </div>
    </header>

    <section id="section1" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-12">
                    <h2 class="slogan">Tu aliado de confianza para<br>sistemas de refrigeración<br>eficientes e innovadores.</h2><br>
                    <p class="titulo">Instala, mantén y monitorea tus sistemas de refrigeración.<br>Ejecuta decisiones precisas en tiempo real.</p><br>
                    <a href="#productos" class="btn btn-primary">Conoce nuestros productos</a><br>
                </div>
                <div class="col-md-5 col-12 video-bienvenido">
                    <video width="800" height="600" autoplay muted loop>
                        <source src="imagenes/bienvenido.mp4" type="video/mp4">
                        Tu navegador no soporta la reproducción de video.
                    </video>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section"> 
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="conectividad-title section-title text-center">Conectividad que potencia el<br> desarrollo empresarial</h2><br>
                    <div class="row fila-caja text-center">
                        <div class="col-md-6 col-12 conectividad-box">
                            <h3 class="text-center">Monitoreo en tiempo real</h3>
                            <p>Supervisa el rendimiento de tus equipos en tiempo real.</p>
                        </div>
                        <div class="col-md-6 col-12 conectividad-box">
                            <h3 class="text-center">Análisis de datos</h3>
                            <p>Obtén información crucial para optimizar procesos y reducir costos.</p>
                        </div>
                    </div>
                    <div class="row fila-caja text-center">
                        <div class="col-md-6 col-12 conectividad-box">
                            <h3 class="text-center">Establece alertas</h3>
                            <p>Mantente siempre informado con nuestras alertas por correo.</p>
                        </div>
                        <div class="col-md-6 col-12 conectividad-box">
                            <h3 class="text-center">Mantenimiento predictivo</h3>
                            <p>Identifica problemas potenciales antes de que ocurran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="productos" class="section">
        <div class="container"><br>
            <h2 class="section-title text-center">Categoría de productos</h2>
            <div class="row fila-caja">
                <div class="col-md-6 col-12">
                    <div class="product-box">
                        <h3 class="text-center">Sensor de temperatura</h3>
                        <p class="text-center">Controla y protege tus productos con nuestro innovador sistema de monitoreo de temperatura.</p>
                        <button class="btn ver-mas" data-toggle="modal" data-target="#productModal" data-image="imagenes/sensor-ds18b20.jpg" data-description="Mantén el control de la temperatura de tus equipos y ambientes desde cualquier lugar con nuestro sensor de temperatura. Con nuestro sistema podrás medir la temperatura en tiempo real y visualizar los valores en nuestra página desde múltiples dispositivos." data-brochure="docs/sensor_temperatura.pdf">Ver más</button>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="product-box">
                        <h3 class="text-center">Sensor de combustible</h3>
                        <p class="text-center">Supervisa el consumo de combustible de tus maquinarias desde cualquier lugar.</p>
                        <button class="btn ver-mas" data-toggle="modal" data-target="#productModal" data-image="imagenes/sensor-fl902.jpg" data-description="" data-brochure="docs/sensor_combustible.pdf">Ver más</button>
                    </div>
                </div>
            </div>
            <div class="row fila-caja">
                <div class="col-md-6 col-12">
                    <div class="product-box">
                        <h3 class="text-center">Sensor de temperatura y humedad</h3>
                        <p class="text-center">Supervisa de cerca la humedad y temperatura de tus productos para asegurar su calidad.</p>
                        <button class="btn ver-mas" data-toggle="modal" data-target="#productModal" data-image="imagenes/sensor-dht11.jpg" data-description="Este equipo mide la temperatura y la humedad ambiente y graba el valor en la nube para poder visualizar desde cualquier lugar." data-brochure="docs/sensor_temp_humedad.pdf">Ver más</button>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="product-box">
                        <h3 class="text-center">Módulo de energía</h3>
                        <p class="text-center">Supervisa de manera precisa y eficiente el consumo eléctrico, el voltaje y la potencia consumida.</p>
                        <button class="btn ver-mas" data-toggle="modal" data-target="#productModal" data-image="imagenes/modulo_energia.jpg" data-description="Detalles resumidos del módulo de energía." data-brochure="docs/modulo_energia.pdf">Ver más</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="monitoreo" class="section">
        <div class="container">
            <h2 class="section-title text-center">Monitoreo remoto de activos</h2><br>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-relámpago-100.png" alt="Energía" class="icon">
                        <h3 class="monitAct">Energía</h3>
                        <p>Monitoriza consumo eléctrico y niveles de tensión.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-gasolinera-100.png" alt="Combustible" class="icon">
                        <h3 class="monitAct">Combustible</h3>
                        <p>Monitoriza nivel de combustible de grupos electrógenos y maquinarias.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-temperatura-100.png" alt="Temperatura" class="icon">
                        <h3 class="monitAct">Temperatura</h3>
                        <p>Monitoriza la temperatura de tus productos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-humedad-100.png" alt="Humedad" class="icon">
                        <h3 class="monitAct">Humedad</h3>
                        <p>Monitoriza la humedad de tus productos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-alerta-100.png" alt="Alertas" class="icon">
                        <h3 class="monitAct">Alertas</h3>
                        <p>Recibe notificaciones de eventos críticos en tiempo real.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="asset-box">
                        <img src="iconos/icons8-pasado-100.png" alt="Historial" class="icon">
                        <h3 class="monitAct">Historial</h3>
                        <p>Accede a datos históricos para analizar tendencias.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <div class="video-container">
                        <video width="600" height="600" autoplay muted loop>
                            <source src="imagenes/video-conectividad.mp4" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios-refrigeracion" class="section">
        <div class="container">
            <h2 class="section-title text-center">Servicios de refrigeración</h2><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-box">
                        <h3 class="text-center titulo3">Residencial</h3>
                        <p class="text-center">Instalación, reparación<br> y mantenimiento de<br>refrigeradores, congeladores y sistemas de aire acondicionado.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <h3 class="text-center titulo3">Comercial</h3>
                        <p class="text-center">Soluciones de refrigeración para supermercados, restaurantes, <br>tiendas y otras empresas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <h3 class="text-center titulo3">Industrial</h3>
                        <p class="text-center">Instalación, reparación y mantenimiento de sistemas<br> de refrigeración de gran <br>capacidad para plantas de producción.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="historia" class="section">
        <div class="container">
            <h2 class="section-title text-center">Sobre nosotros</h2>
            <br>
            <!-- Carrusel para móviles -->
            <div id="timelineCarousel" class="carousel slide d-md-none" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="timeline-item">
                            <div class="timeline-panel">
                                <h3>Inicios</h3>
                                <p>Servicold SAS nace como una empresa con una visión innovadora en el sector de la refrigeración.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="timeline-item">
                            <div class="timeline-panel">
                                <h3>Crecimiento</h3>
                                <p>Expansión de la oferta de productos y servicios, incorporando nuevas tecnologías.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="timeline-item">
                            <div class="timeline-panel">
                                <h3>Innovación</h3>
                                <p>Desarrollo de soluciones personalizadas para satisfacer las necesidades de nuestros clientes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="timeline-item">
                            <div class="timeline-panel">
                                <h3>Compromiso</h3>
                                <p>Mantener responsabilidad con la calidad, la eficiencia y la satisfacción del cliente.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#timelineCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#timelineCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Línea de tiempo para escritorio -->
            <div class="timeline d-none d-md-block">
                <div class="timeline-item">
                    <div class="timeline-badge">1</div>
                    <div class="timeline-panel impar-lt">
                        <h3>Inicios</h3>
                        <p>Servicold SAS nace como una empresa con una visión innovadora en el sector de la refrigeración.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-badge">2</div>
                    <div class="timeline-panel">
                        <h3>Crecimiento</h3>
                        <p>Expansión de la oferta de productos y servicios, incorporando nuevas tecnologías.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-badge">3</div>
                    <div class="timeline-panel impar-lt">
                        <h3 class="titulo-lt">Innovación</h3>
                        <p>Desarrollo de soluciones personalizadas para satisfacer las necesidades de nuestros clientes.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-badge">4</div>
                    <div class="timeline-panel">
                        <h3>Compromiso</h3>
                        <p>Mantener responsabilidad con la calidad, la eficiencia y la satisfacción del cliente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section">
        <div class="container">
            <h2 class="section-title">Preguntas frecuentes</h2>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                ¿Los sensores son autoinstalables?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p>Sí, al adquirir nuestros sensores sólo deberá conectarlos y colocarlos donde desee realizar el monitoreo. Con esos pasos ya podrá visualizar su sensor en tiempo real desde nuestra página web.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Tiene costo mensual?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p>No, nuestro dispositivo funciona con un solo pago inicial, sin costo mensual adicional.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Se pueden configurar alarmas?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p>Sí, puedes personalizar y configurar alarmas según tus necesidades específicas. Recibirás notificaciones por correo electrónico cada 15 minutos en caso de superar el valor establecido.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Qué necesito para instalar mi sensor?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <p>Para una instalación exitosa, solo necesitas asegurarte de tener alimentación de 220V y una conexión a Wi-Fi estable.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                ¿Qué pasa en caso de interrupción temporal en la conexión o energía?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <p>Nuestro dispositivo está diseñado para reconectarse automáticamente a la red Wi-Fi en caso de un corte de energía eléctrica, sin pérdida de configuración.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                ¿Cómo puedo adquirir mi sensor remoto?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                        <div class="card-body">
                            <p>Estamos aquí para ayudarte. Puedes contactarnos a través de cualquier medio, y nuestro equipo estará encantado de asistirte en la adquisición de tu sensor remoto.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h3 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                ¿Hacen envíos?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                        <div class="card-body">
                            <p>Sí, ofrecemos envíos a todo el país, para que puedas recibir tu dispositivo de forma conveniente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <section id="clients" class="section">
        <div class="container">
            <h2 class="section-title titulo-conf">Confían en nosotros</h2>
            <div id="clientCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner text-center">
                    <div class="carousel-item active">
                        <img src="imagenes/Ecom-Chaco.png" alt="Cliente 1" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/arcor.png" alt="Cliente 2" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/Logo_Banco_de_la_Nacion_Argentina.svg.png" alt="Cliente 3" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/telecom.png" alt="Cliente 4" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/pedidosya.png" alt="Cliente 5" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/osde.png" alt="Cliente 6" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/libertad.png" alt="Cliente 7" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/gigared.png" alt="Cliente 8" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/cinemacenter.png" alt="Cliente 9" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/panatta.png" alt="Cliente 10" class="d-block w-100 client-image">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/elnono1.png" alt="Cliente 11" class="d-block w-100 client-image">
                    </div>

                    <!-- Añade más clientes según sea necesario -->
                </div>
                <a class="carousel-control-prev" href="#clientCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#clientCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
                    

    <section id="contacto" class="section">
        <div class="container">
            <h2 class="section-title text-center">Contactanos</h2><br>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="contact-box">
                        <a href="mailto:servicoldsas@gmail.com">
                            <img src="iconos/icons8-correo-100.png" alt="Email" class="icon">
                        </a>
                        <a href="mailto:servicoldsas@gmail.com">
                            <p>servicoldsas@gmail.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-box">
                        <a href="https://wa.me/5493624049287" target="_blank">
                            <img src="iconos/icons8-whatsapp-100.png" alt="WhatsApp" class="icon">
                        </a>
                        <a href="https://wa.me/5493624049287" target="_blank">
                            <p>(+54)9362404-9287</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-box">
                        <a href="https://www.google.com/maps?q=General+Obligado+2214,+Resistencia+-+Chaco" target="_blank" class="contacto">
                            <img src="iconos/icons8-delivery-pin-for-parcel-delivery-location-making-100.png" alt="Dirección" class="icon">
                        </a>
                        <a href="https://www.google.com/maps?q=General+Obligado+2214,+Resistencia+-+Chaco" target="_blank" class="contacto">
                            <p>General Obligado 2214 <br> Resistencia - Chaco</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-box">
                        <a href="https://www.instagram.com/servicold_refrigeracion" target="_blank">
                            <img src="iconos/icons8-instagram-100.png" alt="Instagram" class="icon">
                        </a>
                        <a href="https://www.instagram.com/servicold_refrigeracion" target="enlace">
                            <p class="enlace">@servicold_refrigeracion</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title mx-auto" id="productModalLabel">Descripción del producto</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="Imagen del producto" id="productImage" class="img-fluid mb-3">
                    <p id="productDescription"></p>
                    <a href="#" id="productBrochure" class="btn btn-primary" target="_blank">Ver folleto</a>
                </div>
            </div>
        </div>
    </div>


    <footer class="text-center p-4">
        &copy; 2021 ServiCold SAS.<br>Todos los derechos reservados.
    </footer>

    <script>
        function checkSectionsInView() {
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                var sectionPos = section.getBoundingClientRect().top;
                var screenPos = window.innerHeight / 1.3;
                if (sectionPos < screenPos) {
                    section.classList.add('in-view');
                }
            });
        }

        document.addEventListener('scroll', checkSectionsInView);
        document.addEventListener('DOMContentLoaded', function() {
            checkSectionsInView(); // Verificar secciones en vista al cargar la página
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#productModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var image = button.data('image');
                var description = button.data('description');
                var brochure = button.data('brochure');
    
                var modal = $(this);
                modal.find('#productImage').attr('src', image);
                modal.find('#productDescription').html(description);
                modal.find('#productBrochure').attr('href', brochure);
                
                // Añadir la clase de difuminado al contenido principal
                document.getElementById('productos').classList.add('blurred');
                document.getElementById('botones-nav').classList.add('blurred');
            });
    
            $('#productModal').on('hidden.bs.modal', function () {
                // Eliminar la clase de difuminado del contenido principal
                document.getElementById('productos').classList.remove('blurred');
                document.getElementById('botones-nav').classList.remove('blurred');
            });
        });
    </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
        const timeline = document.querySelector('.timeline');
        
        if (window.innerWidth <= 768) {
            // Aplica el comportamiento deslizable solo en móviles
            timeline.style.overflowX = 'auto';
            timeline.style.display = 'flex';
            timeline.style.padding = '10px';
        }
    });
    </script>
        </body>
</html>
