<?php
$servername = "localhost"; // O tu servidor MySQL
$username = "root"; // Tu usuario de MySQL
$password = "1234"; // Tu contraseña de MySQL
$dbname = "mercedes"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
