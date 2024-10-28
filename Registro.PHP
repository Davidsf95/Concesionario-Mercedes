<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mercedes";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }

 
    $nombre = $_GET['Nombre'];
    $apellidos = $_GET['Apellidos'];
    $localidad = $_GET['Localidad'];
	$correo = $_GET['Correo'];
	$calle = $_GET['Calle'];
	$reseña = $_GET['Reseña'];

    $sql = "INSERT INTO mercedes (nombre, apellidos, localidad, correo, calle, reseña) VALUES ('$nombre', '$apellidos', '$localidad', '$correo', '$calle', '$reseña')";

   
    if ($conn->query($sql) === TRUE) {
        echo "Enhorabuena, registro completado exitosamente";
    } else {
        echo "Ha habido un error durante el proceso" . $sql . "<br>" . $conn->error;
    }

 
    $conn->close();
}
?>
