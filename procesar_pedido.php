<?php
// Obtener los datos del formulario
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$medida = $_POST['medida'];
$acabado = $_POST['acabado'];

// Conexión a la base de datos (asegúrate de tener tus datos de conexión correctos)
$servername = "localhost";
$username = "root";  // Tu usuario de MySQL
$password = "1234";      // Tu contraseña de MySQL
$dbname = "mercedes"; // Nombre de la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// **Opción A: Guardar el nombre directamente en la base de datos**
// Si en la base de datos deseas almacenar el nombre del modelo directamente, no necesitamos hacer nada adicional. 
// Solo insertamos el valor de $modelo tal cual como se recibe del formulario.

$sql = "INSERT INTO pedido_cliente (modelo, color, medida_ruedas, acabado) VALUES (?, ?, ?, ?)";

// Usar una declaración preparada para evitar inyecciones SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $modelo, $color, $medida, $acabado);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Pedido realizado correctamente.";
} else {
    echo "Error al realizar el pedido: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
