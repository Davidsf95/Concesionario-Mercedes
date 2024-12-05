<?php
session_start();  // Iniciar la sesión
if (isset($_SESSION['correo'])) {
    echo 'Bienvenido, ' . $_SESSION['correo'];
} else {
    echo 'Bienvenido, usuario';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Mejores Deportivos</title>
    <style>
        .coche {
            background-color: #b12739;
            padding: 20px;
            text-align: center;
        }
         
        /* Barra de menú */
        .menu-bar {
            display: flex;
            justify-content: flex-start; /* Alineación a la izquierda */
            align-items: center;
            background-color: #0044cc;
            padding: 10px 20px;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; /* Asegura que el menú esté por encima del contenido */
        }

    /* Estilos de los enlaces en el menú */
    .menu-bar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        /* Cambio de color al pasar el ratón sobre el enlace */
        .menu-bar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* Estilo para el nombre del usuario, alineado a la derecha */
        .usuario {
            margin-left: auto;
            color: white;
            font-weight: bold;
        }

        /* Cuerpo de la página, con margen para que el contenido no quede oculto bajo la barra de menú */
        body {
            margin-top: 60px;
            font-family: Arial, sans-serif;
        }
        .coche img {
            width: 400px; 
            height: auto; 
            margin: 10px;
        }
        
        .coche2 {
            background-color: #20b3ab;
            padding: 20px;
            text-align: center;
        }
        .coche2 img {
            width: 400px; 
            height: auto; 
            margin: 10px;
        }
       
        
        .coche p {
            font-size: 24px;
        }

        .coche2 p {
            font-size: 24px;
        }
        
        .coche3 {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }
        .coche3 img {
            width: 400px; 
            height: auto; 
            margin: 10px;
        }
 
        .coche3 p {
            font-size: 24px;
        }

    </style>
</head>
<body>
    <!-- Barra de menú -->
    <div class="menu-bar">
        <!-- Enlace a la página de inicio -->
        <a href="configurador.php">Página de inicio</a>

        <!-- Mostrar el correo del usuario si está en sesión -->
        <div class="usuario">
           
        </div>
    </div>
    <div class="coche">
        <img src="SL1.jpg" alt="Mercedes SL1">
        <img src="SL2.jpg" alt="Mercedes SL2">
        <img src="SL3.jpg" alt="Mercedes SL3">
        <h1>Mercedes AMG SL </h1><br>
            <p><b>Precio (con descuento y equipamiento seleccionado)	148.900 € <br>
            Velocidad máxima	278 km/h <br>
            Aceleración 0-100 km/h	4,7 s <br>
            Consumo WLTP <br>
            Combinado	11,2 l/100 km <br>
            Combustible	Gasolina <br>
            Potencia máxima	421 CV / 310 kW </b></p>
    </div>

    <div class="coche2">
        <img src="GT1.jpg" alt="Mercedes GT1">
        <img src="GT2.jpg" alt="Mercedes GT2">
        <img src="GT3.jpg" alt="Mercedes GT3">
        <h1>Mercedes GT </h1><br>
            <p><b>Precio (con descuento y equipamiento seleccionado)	160.700 € <br>
                Velocidad máxima	304 km/h <br>
            Aceleración 0-100 km/h	4 s <br>
            Consumo WLTP <br>
            Combinado	12,1 l/100 km <br>
            Combustible	Gasolina <br>
            Potencia máxima	476 CV / 350 kW </b></p>
    </div>

    <div class="coche3">
        <img src="AMGGT1.jpg" alt="Clase C1">
        <img src="AMGGT2.jpg" alt="Clase C2">
        <img src="AMGGT3.jpg" alt="Clase C3">
        <h1>Mercedes AMG GT </h1><br>
            <p><b>Precio (con descuento y equipamiento seleccionado)	220.416 € <br>
                Velocidad máxima	315 km/h <br>
            Aceleración 0-100 km/h	3,2 s <br>
            Consumo WLTP <br>
            Combinado	14,1 l/100 km <br>
            Combustible	Gasolina <br>
            Potencia máxima	585 CV / 430 kW </b></p>
    </div>
</body>
</html>