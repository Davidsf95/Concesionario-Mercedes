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
    <title>Personaliza tu Mercedes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #333;
        }

        .menu-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0044cc;
            padding: 10px 20px;
            color: white;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .menu-bar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .menu-bar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .background {
            background-image: url('C:/xampp/htdocs/fondoregistro.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        .form-container {
            background-color: rgba(51, 82, 182, 0.8);
            border: 4px solid #000000;
            padding: 120px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 50px auto;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px; /* Ajuste del padding para hacer el botón más pequeño */
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px; /* Reducción del tamaño de la fuente */
            width: 20%; /* El botón ocupará el 30% del ancho de su contenedor */
            margin: 10px auto; /* Centrado del botón */
            display: block;
        }

        button:hover {
            background-color: #45a049;
        }

        .reseña-link {
            display: block;
            margin-top: 20px;
            font-size: 16px;
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        .reseña-link:hover {
            color: #45a049;
        }

        .logo {
            width: 400px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>

<body class="background">
    
    <!-- Barra de menú -->
    <div class="menu-bar">
        <!-- Enlace a la página de inicio -->
        <a href="configurador.php">Página de inicio</a>

        <!-- Mostrar el correo del usuario si está en sesión -->
        <div class="usuario">
           
        </div>
    </div>
        

    <!-- Contenedor del formulario -->
    <div class="form-container">
        <img src="/fondoregistro.jpg" alt="Logo Mercedes Benz" class="logo">

        <h1>Bienvenido al configurador de vehículos Mercedes Benz</h1>
        <h2>¡Comencemos con tu pedido!</h2>
        <h2>Seleccione el modelo de coche:</h2>

        <form method="post" action="procesar_pedido.php">
            <select name="modelo" required>
                <option value="SUV MERCEDES GLC">SUV MERCEDES GLC</option>
                <option value="SUV GLE COUPE">SUV GLE COUPE</option>
                <option value="SUV GLS 4MATIC">SUV GLS 4MATIC</option>
                <option value="Deportivo AMG GT 63">Deportivo AMG GT 63</option>
                <option value="Deportivo AMG GT">Deportivo AMG GT</option>
                <option value="Deportivo AMG SL">Deportivo AMG SL</option>
                <option value="Compacto A250">Compacto A250</option>
                <option value="Compacto C220">Compacto C220</option>
                <option value="Compacto Clase A">Compacto Clase A</option>
            </select>

            <h3>Seleccione el color deseado:</h3>
            <div class="color-options">
                <div>
                    <input type="radio" id="blanco" name="color" value="blanco" required>
                    <label for="blanco">Blanco</label>
                </div>
                <div>
                    <input type="radio" id="negro" name="color" value="negro" required>
                    <label for="negro">Negro</label>
                </div>
                <div>
                    <input type="radio" id="azul" name="color" value="azul" required>
                    <label for="azul">Azul</label>
                </div>
                <div>
                    <input type="radio" id="rojo" name="color" value="rojo" required>
                    <label for="rojo">Rojo</label>
                </div>
                <div>
                    <input type="radio" id="verde" name="color" value="verde" required>
                    <label for="verde">Verde</label>
                </div>
                <div>
                    <input type="radio" id="amarillo" name="color" value="amarillo" required>
                    <label for="amarillo">Amarillo</label>
                </div>
            </div>

            <h3>Seleccione la medida de las ruedas:</h3>
            <div class="medidas-options">
                <div>
                    <input type="radio" id="16" name="medida" value="16" required>
                    <label for="16 pulgadas">16´´ pulgadas</label>
                </div>
                <div>
                    <input type="radio" id="17" name="medida" value="17" required>
                    <label for="17 pulgadas">17´´ pulgadas</label>
                </div>
                <div>
                    <input type="radio" id="18" name="medida" value="18" required>
                    <label for="18 pulgadas">18´´ pulgadas</label>
                </div>
                <div>
                    <input type="radio" id="19" name="medida" value="19" required>
                    <label for="19 pulgadas">19´´ pulgadas</label>
                </div>
                <div>
                    <input type="radio" id="20" name="medida" value="20" required>
                    <label for="20 pulgadas">20´´ pulgadas</label>
                </div>
                <div>
                    <input type="radio" id="21" name="medida" value="21" required>
                    <label for="21 pulgadas">21´´ pulgadas</label>
                </div>
            </div>

            <h3>Seleccione el acabado deseado:</h3>
            <select name="acabado" required>
                <option value="Avantgarde">Avantgarde (Incluye parrilla frontal + molduras interiores en aluminio claro)</option>
                <option value="Exclusive">Exclusive (Linea Exclusive interna y externa + molduras de madera y llantas exclusivas.)</option>
                <option value="AMG">AMG (Kit estético deportivo + parrilla exclusiva + asientos deportivos AMG + molduras en aluminio.)</option>
            </select>

            <!-- Botón de enviar -->
            <button type="submit"><b>Enviar</b></button>

            <!-- Enlace a dejar reseña -->
            <a href="reseña.php" class="reseña-link"><i><b>Deja aquí tu reseña</b></i></a>
        </form>
    </div>

</body>

</html>
