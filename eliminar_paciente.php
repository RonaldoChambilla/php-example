<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "covid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del paciente a eliminar
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id > 0) {
    // Eliminar el paciente de la base de datos
    $sql = "DELETE FROM pacientes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Paciente eliminado correctamente";
    } else {
        echo "Error al eliminar paciente: " . $conn->error;
    }
} else {
    echo "ID de paciente no válido";
}

$conn->close();

// Redirigir de vuelta a la página principal
header("Location: 22-lista-pdo.php");
?>
