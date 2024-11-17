<?php
session_start(); // Asegúrate de iniciar la sesión

// Verificar si el correo está en la sesión
if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}

// Incluir el archivo de conexión a la base de datos
include('conexionreseña.php');  // Cambié aquí a tu archivo de conexión

// Obtener los datos del formulario
$correo = $_SESSION['correo'];
$reseña = htmlspecialchars($_POST['reseña']); // Protege el contenido de la reseña

// Preparar y ejecutar la consulta para insertar los datos en la base de datos
$sql = "INSERT INTO reseña (correo, reseña) VALUES (?, ?)";

// Verificar que la conexión sea válida antes de usarla
if ($conn) {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo, $reseña); // 'ss' indica que ambos parámetros son cadenas de texto

    if ($stmt->execute()) {
        echo "¡Muchas gracias por tu tiempo y tu valoración!";
    } else {
        echo "Error al enviar la reseña: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "No se pudo conectar a la base de datos.";
}
?>
