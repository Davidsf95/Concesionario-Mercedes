<?php
$servername = "localhost";  // o el servidor de tu base de datos
$username = "root";         // tu usuario de MySQL
$password = "1234";             // tu contraseña de MySQL (si la tienes)
$dbname = "mercedes";       // nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
