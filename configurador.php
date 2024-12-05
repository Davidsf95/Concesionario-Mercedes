<?php
session_start(); // Inicia la sesión para poder almacenar datos del usuario, como el nombre y correo

// Si no hay un nombre de usuario en la sesión, redirige a la página de login
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php"); // Redirige al usuario a la página de login si no está logueado
    exit(); // Detiene la ejecución del código
}

// Verifica si el usuario hace clic en el enlace de cierre de sesión
if (isset($_GET['logout'])) {
    session_destroy(); // Destruye la sesión (elimina la información almacenada en la sesión)
    header("Location: paginainicio.html"); // Redirige al usuario a la página de inicio después de cerrar sesión
    exit(); // Detiene la ejecución del código
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace que la página sea responsiva para móviles -->
    <title>Bienvenido</title> 
    <style>
        /* Estilo general para la página */
        * {
            margin: 0; /* Elimina los márgenes predeterminados de todos los elementos */
            padding: 0; /* Elimina el padding (relleno) predeterminado */
            box-sizing: border-box; /* Hace que el padding y los márgenes no afecten al tamaño total de los elementos */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente para el texto */
            background-color: #e5f6f4; /* Color de fondo de la página */
            display: flex; /* Uso Flexbox para alinear los elementos */
            justify-content: center; /* Centra el contenido horizontalmente */
            align-items: center; /* Centra el contenido verticalmente */
            height: 100vh; /* Ocupa toda la altura de la pantalla */
            margin: 0; 
        }

        /* Barra de menú en la parte superior */
        .menu-bar {
            display: flex; /* Usa el modelo Flexbox para alinear los elementos */
            justify-content: space-between; /* Coloca los elementos a los extremos */
            align-items: center; /* Alinea los elementos verticalmente */
            background-color: #0044cc; 
            padding: 10px 20px; /* Relleno interno de la barra */
            color: white; 
            position: fixed; /* Hace que la barra de menú permanezca fija en la parte superior */
            top: 0; 
            left: 0; 
            width: 100%; /* Ancho completo */
            z-index: 1000; /* Asegura que la barra esté por encima de otros elementos */
        }

        /* Estilo para los enlaces dentro de la barra de menú */
        .menu-bar a {
            color: white; /* Color de los enlaces */
            text-decoration: none; /* Elimina el subrayado de los enlaces */
            padding: 10px 20px; /* Relleno de los enlaces */
            font-weight: bold; /* Texto de los enlaces en negrita */
            transition: background-color 0.3s; /* Animación para cambiar el color de fondo al pasar el ratón */
        }

        /* Efecto al pasar el ratón sobre los enlaces */
        .menu-bar a:hover {
            background-color: #575757; /* Cambia el color de fondo cuando el ratón pasa sobre el enlace */
            border-radius: 5px; /* Da bordes redondeados al enlace */
        }

        /* Estilo para mostrar el nombre y correo del usuario */
        .usuario {
            color: white; /* Color del texto */
            font-weight: bold; /* Hace el texto en negrita */
            display: flex; /* Uso Flexbox para mostrar el nombre y correo verticalmente */
            flex-direction: column; /* Coloca el nombre y correo verticalmente */
            text-align: right; /* Alinea el texto a la derecha */
        }

        /* Ajusta el cuerpo de la página para que no quede oculto debajo de la barra de menú */
        body {
            margin-top: 80px; /* Agrega un margen superior para que no quede oculto bajo la barra */
            font-family: Arial, sans-serif; 
        }

        /* Estilo para el contenedor principal */
        .container {
            background-color: #ffffff; 
            border-radius: 12px; /
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
            padding: 40px; /* Relleno interno */
            text-align: center; 
            width: 100%; /* Ancho completo */
            max-width: 600px; /* Ancho máximo */
        }

        /* Título principal dentro del contenedor */
        .container h1 {
            font-size: 2.8rem; /* Tamaño de la fuente */
            color: #00796b; /* Color del texto */
            margin-bottom: 20px; /* Espacio debajo del título */
            font-weight: bold; /* Hace el título en negrita */
        }

        /* Párrafo dentro del contenedor */
        .container p {
            font-size: 1.2rem; /* Tamaño de la fuente */
            color: #555; /* Color del texto */
            margin-bottom: 30px; /* Espacio debajo del párrafo */
        }

        /* Animación para la carga del contenedor */
        .container {
            animation: fadeIn 1.5s ease-in-out; /* Aplica la animación de desvanecimiento */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0; /* Comienza con la página invisible */
                transform: translateY(30px); /* Comienza desplazada hacia abajo */
            }
            100% {
                opacity: 1; /* Termina visible */
                transform: translateY(0); /* Termina en su posición original */
            }
        }

        /* Estilos para pantallas pequeñas (móviles) */
        @media (max-width: 768px) {
            .container {
                padding: 30px; /* Reduce el relleno en pantallas pequeñas */
            }

            .container h1 {
                font-size: 2.2rem; /* Reduce el tamaño del título */
            }

            .container p {
                font-size: 1rem; /* Reduce el tamaño del párrafo */
            }
        }
    </style>
</head>
<body>

    <!-- Barra de menú  -->
    <div class="menu-bar">
        <a href="paginainicio.html">Página de inicio</a> 
        <a href="suv.php">SUV</a> 
        <a href="deportivos.php">Deportivos</a> 
        <a href="compactos.php">Compactos</a> 
        <a href="SELECTORCOCHES.php" class="button">Configurar mi Mercedes</a> <!-- Enlace para configurar el coche -->
        <a href="?logout=true" class="button" style="background-color: #d32f2f; padding: 10px 20px;">Cerrar sesión</a> <!-- Enlace para cerrar sesión -->

        <!-- Muestra el nombre y correo del usuario si están disponibles -->
        <div class="usuario">
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</span> <!-- Muestra el nombre del usuario -->
            <?php if (isset($_SESSION['correo'])): ?>
                <span><?php echo htmlspecialchars($_SESSION['correo']); ?></span> <!-- Muestra el correo si está disponible -->
            <?php else: ?>
                <span>Correo no disponible</span> <!-- Si el correo no está disponible, muestra un mensaje -->
            <?php endif; ?>
        </div>
    </div>

    <!-- Contenedor principal con bienvenida al usuario -->
    <div class="container">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1> <!-- Título que da la bienvenida -->
        <p>Inicio de sesión exitoso. Ya estás listo para configurar tu Mercedes.</p> <!-- Mensaje que confirma el inicio de sesión exitoso -->
    </div>
</body>
</html>
