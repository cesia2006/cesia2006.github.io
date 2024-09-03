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

$paciente_agregado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO pacientes (nombre, edad, direccion) VALUES ('$nombre', '$edad', '$direccion')";
    if ($conn->query($sql) === TRUE) {
        $paciente_agregado = true;
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
    <title>Pacientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Pacientes</h1>
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
            <h2>Agregar Paciente</h2>
            <?php if ($paciente_agregado): ?>
                <p>Paciente agregado exitosamente</p>
            <?php else: ?>
                <form action="pacientes.php" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" required>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                    <button type="submit">Agregar Paciente</button>
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
