
<?php
session_start();

// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mercedes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$localidad = $_POST['localidad'];
// Preparar la consulta SQL 
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar contraseña (utilizando password_hash y password_verify para mayor seguridad)
    if (password_verify($contraseña, $row['contraseña'])) {
        // Inicio de sesión exitoso
        $_SESSION['nombre'] = $row['nombre']; // Almacenar el ID del usuario en la sesión
        $_SESSION['nombre'] = $row['nombre']; // Almacenar el nombre de usuario en la sesión
        header("Location: paginainicio.html"); // Redirigir a la página de inicio
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
