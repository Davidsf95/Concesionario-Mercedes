<?php
session_start(); // Asegúrate de iniciar la sesión

// Verificamos si el correo está en la sesión, si no redirigimos al login
if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dejanos una reseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #58c1eb;
            text-align: center;
        }
        form {
            background-color: #fff;
            border: 4px solid #000;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }
        label {
            text-align: center;
        }
        textarea {
            width: 100%;
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="reseña">
        <h1>¡Comparte tu opinión!</h1>
        <form method="post" action="procesar_reseña.php">
            <!-- Aquí se muestra el correo de la sesión -->
            <label for="correo"><b>Correo:</b></label>
            <input type="email" id="correo" name="correo" required value="<?php echo htmlspecialchars($_SESSION['correo']); ?>" readonly><br><br>
            
            <label for="reseña"><b>Tu reseña:</b></label>
            <textarea id="reseña" name="reseña" rows="5" required></textarea>

            <button type="submit"><b>Enviar reseña</b></button>
        </form>
    </div>
</body>
</html>
