<?php
// Verificar si el ID del paciente está presente en la URL
if (!isset($_GET['id'])) {
    die("ID del paciente no proporcionado");
}

// Obtener el ID del paciente desde la URL y convertirlo a entero para evitar inyección SQL
$id = intval($_GET['id']);

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del paciente según el ID proporcionado
$sql = "SELECT * FROM pacientes WHERE id=$id";
$result = $conn->query($sql);

// Verificar si se encontraron datos para el ID del paciente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("No se encontraron datos para el ID del paciente proporcionado");
}

// Si el formulario se ha enviado, actualizar los datos del paciente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $talla_m = $_POST['talla_m'];
    $peso_kg = $_POST['peso_kg'];

    // Recoger los síntomas y convertir a binario (1 o 0)
    $sintomas = [
        'sintoma_tos' => isset($_POST['sintoma_tos']) ? 1 : 0,
        'sintoma_fiebre' => isset($_POST['sintoma_fiebre']) ? 1 : 0,
        'sintoma_disnea' => isset($_POST['sintoma_disnea']) ? 1 : 0,
        'sintoma_dolormuscular' => isset($_POST['sintoma_dolormuscular']) ? 1 : 0,
        'sintoma_gripe' => isset($_POST['sintoma_gripe']) ? 1 : 0,
        'sintoma_presionalta' => isset($_POST['sintoma_presionalta']) ? 1 : 0,
        'sintoma_fatiga' => isset($_POST['sintoma_fatiga']) ? 1 : 0,
        'sintoma_garraspera' => isset($_POST['sintoma_garraspera']) ? 1 : 0,
    ];

    $fecha_vacunacion = $_POST['fecha_vacunacion'];

    // Construir la consulta de actualización
    $update_sql = "UPDATE pacientes SET 
        nombres='$nombres',
        apellidos='$apellidos',
        edad='$edad',
        talla_m='$talla_m',
        peso_kg='$peso_kg',
        sintoma_tos='{$sintomas['sintoma_tos']}',
        sintoma_fiebre='{$sintomas['sintoma_fiebre']}',
        sintoma_disnea='{$sintomas['sintoma_disnea']}',
        sintoma_dolormuscular='{$sintomas['sintoma_dolormuscular']}',
        sintoma_gripe='{$sintomas['sintoma_gripe']}',
        sintoma_presionalta='{$sintomas['sintoma_presionalta']}',
        sintoma_fatiga='{$sintomas['sintoma_fatiga']}',
        sintoma_garraspera='{$sintomas['sintoma_garraspera']}',
        ultima_fecha_vacunacion='$fecha_vacunacion'
        WHERE id=$id";

    // Ejecutar la consulta de actualización
    if ($conn->query($update_sql) === TRUE) {
        echo "Registro actualizado correctamente";
        // Redirigir a la página principal después de actualizar
        header("Location: 22-lista-pdo.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-actualizacion.css">
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Paciente</h1>
    <!-- Formulario para editar los datos del paciente -->
    <form action="" method="POST">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($row['nombres']); ?>" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>"><br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" value="<?php echo htmlspecialchars($row['edad']); ?>" required><br>

        <label for="talla_m">Talla (m):</label>
        <input type="text" id="talla_m" name="talla_m" value="<?php echo htmlspecialchars($row['talla_m']); ?>" required><br>

        <label for="peso_kg">Peso (kg):</label>
        <input type="text" id="peso_kg" name="peso_kg" value="<?php echo htmlspecialchars($row['peso_kg']); ?>"><br>
<!-- Continuación de los checkboxes para los síntomas -->
        <h2><u>Síntomas</u></h2>
        <label class="checkbox"><input type="checkbox" name="sintoma_tos" value="1" <?php echo ($row['sintoma_tos'] == '1') ? 'checked' : ''; ?>> Tos</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_fiebre" value="1" <?php echo ($row['sintoma_fiebre'] == '1') ? 'checked' : ''; ?>> Fiebre</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_disnea" value="1" <?php echo ($row['sintoma_disnea'] == '1') ? 'checked' : ''; ?>> Disnea</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_dolormuscular" value="1" <?php echo ($row['sintoma_dolormuscular'] == '1') ? 'checked' : ''; ?>>
        <label class="checkbox"><input type="checkbox" name="sintoma_gripe" value="1" <?php echo ($row['sintoma_gripe'] == '1') ? 'checked' : ''; ?>> Gripe</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_presionalta" value="1" <?php echo ($row['sintoma_presionalta'] == '1') ? 'checked' : ''; ?>> Presión Alta</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_fatiga" value="1" <?php echo ($row['sintoma_fatiga'] == '1') ? 'checked' : ''; ?>> Fatiga</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_garraspera" value="1" <?php echo ($row['sintoma_garraspera'] == '1') ? 'checked' : ''; ?>> Garraspera</label>

        <!-- Campo para la fecha de vacunación -->
        <label for="fecha_vacunacion">Fecha de vacunación:</label>
        <input type="date" id="fecha_vacunacion" name="fecha_vacunacion" value="<?php echo htmlspecialchars($row['ultima_fecha_vacunacion']); ?>"><br>

        <!-- Botones para guardar o cancelar la edición -->
        <div class="Botones">
            <button type="submit">Guardar</button>
            <button type="button" class="cancelar" onclick="window.location.href='22-lista-pdo.php'">Cancelar</button>
        </div>
    </form>
</body>
</html>

