<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "mercedes";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si todas las claves necesarias están presentes en el array $_POST
    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['contraseña'], $_POST['correo'], $_POST['telefono'], $_POST['localidad'])) {
        // Obtener valores del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Hashear la contraseña
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $localidad = $_POST['localidad'];

        // Verificar si el correo ya existe en la base de datos
        $sql_check = "SELECT correo FROM sesion WHERE correo = ?";
        $stmt = $conn->prepare($sql_check);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Si el correo ya existe, mostrar el mensaje de error
            $mensaje = "<div class='mensaje error'>El correo electrónico ya está siendo utilizado por otra cuenta. <a href='formulario.html'>Intenta con otro correo.</a></div>";
        } else {
            // Si el correo no existe, realizar el registro
            $sql = "INSERT INTO sesion (nombre, apellidos, contraseña, correo, telefono, localidad)
                    VALUES ('$nombre', '$apellidos', '$contraseña', '$correo', '$telefono', '$localidad')";

            if ($conn->query($sql) === TRUE) {
                $mensaje = "<div class='mensaje'>Se ha registrado correctamente. Bienvenido. <a href='iniciosesion.html'>Iniciar sesión</a></div>";
            } else {
                $mensaje = "<div class='mensaje error'>Error: " . htmlspecialchars($conn->error) . "</div>";
            }
        }

        
        $stmt->close();
    } else {
        // Mensaje de error si falta algún campo
        $mensaje = "<div class='mensaje error'>Por favor, complete todos los campos del formulario.</div>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('fondoregistrocompletado.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .mensaje {
            text-align: center;
            padding: 20px;
            border: 2px solid #4CAF50;
            background-color: rgba(255, 255, 255, 0.8); 
            font-size: 1.5em;
            border-radius: 10px;
            animation: cambiarColores 3s infinite;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        .mensaje.error {
            border-color: rgb(255, 99, 71);
            animation: cambiarColoresError 3s infinite;
        }
        .mensaje a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        .mensaje a:hover {
            color: #45a049;
        }
        @keyframes cambiarColores {
            0% { color: rgb(255, 0, 0); }   /* Rojo */
            25% { color: rgb(0, 255, 0); }  /* Verde */
            50% { color: rgb(0, 0, 255); }  /* Azul */
            75% { color: rgb(255, 255, 0); } /* Amarillo */
            100% { color: rgb(255, 0, 0); } /* Rojo */
        }
        @keyframes cambiarColoresError {
            0% { color: rgb(255, 69, 0); }  /* Naranja */
            50% { color: rgb(255, 0, 0); }  /* Rojo */
            100% { color: rgb(139, 0, 0); } /* Rojo oscuro */
        }
    </style>
</head>
<body>
    <?php echo isset($mensaje) ? $mensaje : ""; ?>
</body>
</html>
