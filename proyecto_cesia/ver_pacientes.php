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

// Consulta para obtener pacientes
$sql = "SELECT id, nombre, edad, direccion FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pacientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Ver Pacientes</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="sobre.php">Sobre Nosotros</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="pacientes.php">Agregar Paciente</a></li>
                <li><a href="ver_pacientes.php">Ver Pacientes</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Lista de Pacientes</h2>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($row['edad']); ?></td>
                                <td><?php echo htmlspecialchars($row['direccion']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay pacientes registrados.</p>
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
