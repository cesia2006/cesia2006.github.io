<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mensaje_enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO mensajes_contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    if ($conn->query($sql) === TRUE) {
        $mensaje_enviado = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Contacto</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="sobre.php">Sobre Nosotros</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="pacientes.php">Pacientes</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Contáctanos</h2>
            <?php if ($mensaje_enviado): ?>
                <p>Mensaje enviado exitosamente</p>
            <?php else: ?>
                <form action="contacto.php" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Hospital Cesia</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>


