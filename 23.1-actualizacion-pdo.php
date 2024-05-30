<?php
// Verificar si el ID del paciente está presente en la URL
if (!isset($_GET['id'])) {
    die("ID del paciente no proporcionado");
}

// Obtener el ID del paciente desde la URL
$id = intval($_GET['id']); // Convertir el ID a un entero para evitar inyección SQL

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del paciente
$sql = "SELECT * FROM pacientes WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("No se encontraron datos para el ID del paciente proporcionado");
}

// Si el formulario se ha enviado, actualizar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $talla_m = $_POST['talla_m'];
    $peso_kg = $_POST['peso_kg'];
    $sintoma_tos = isset($_POST['sintoma_tos']) ? 1 : 0;
    $sintoma_fiebre = isset($_POST['sintoma_fiebre']) ? 1 : 0;
    $sintoma_disnea = isset($_POST['sintoma_disnea']) ? 1 : 0;
    $sintoma_dolormuscular = isset($_POST['sintoma_dolormuscular']) ? 1 : 0;
    $sintoma_gripe = isset($_POST['sintoma_gripe']) ? 1 : 0;
    $sintoma_presionalta = isset($_POST['sintoma_presionalta']) ? 1 : 0;
    $sintoma_fatiga = isset($_POST['sintoma_fatiga']) ? 1 : 0;
    $sintoma_garraspera = isset($_POST['sintoma_garraspera']) ? 1 : 0;
    $fecha_vacunacion = $_POST['fecha_vacunacion'];

    $update_sql = "UPDATE pacientes SET 
        nombres='$nombres',
        apellidos='$apellidos',
        edad='$edad',
        talla_m='$talla_m',
        peso_kg='$peso_kg',
        sintoma_tos='$sintoma_tos',
        sintoma_fiebre='$sintoma_fiebre',
        sintoma_disnea='$sintoma_disnea',
        sintoma_dolormuscular='$sintoma_dolormuscular',
        sintoma_gripe='$sintoma_gripe',
        sintoma_presionalta='$sintoma_presionalta',
        sintoma_fatiga='$sintoma_fatiga',
        sintoma_garraspera='$sintoma_garraspera',
        ultima_fecha_vacunacion='$fecha_vacunacion' 
        WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Registro actualizado correctamente";
        // Redirigir a la página principal
        header("Location: 22-lista-pdo.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .Botones {
            text-align: center;
        }

        button {
            padding: 12px 24px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button.cancelar {
            background-color: #ff6347;
        }

        button.cancelar:hover {
            background-color: #ff3b28;
        }

        h2 {
            color: #4CAF50;
        }

        label.checkbox {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Editar Paciente</h1>
    <form action="" method="POST">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($row['nombres']); ?>" required><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>"><br>
        <label for="edad">Edad :</label>
        <input type="text" id="edad" name="edad" value="<?php echo htmlspecialchars($row['edad']); ?>" required><br>
        <label for="talla_m">Talla(m):</label>
        <input type="text" id="talla_m" name="talla_m" value="<?php echo htmlspecialchars($row['talla_m']); ?>" required><br>
        <label for="peso_kg">Peso (kg):</label>
        <input type="text" id="peso_kg" name="peso_kg" value="<?php echo htmlspecialchars($row['peso_kg']); ?>"><br>
        <h2><u>Síntomas</u></h2>
        <label class="checkbox"><input type="checkbox" name="sintoma_tos" value="1" <?php echo ($row['sintoma_tos'] == '1') ? 'checked' : ''; ?>> Tos</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_fiebre" value="1" <?php echo ($row['sintoma_fiebre'] == '1') ? 'checked' : ''; ?>> Fiebre</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_disnea" value="1" <?php echo ($row['sintoma_disnea'] == '1') ? 'checked' : ''; ?>> Disnea</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_dolormuscular" value="1" <?php echo ($row['sintoma_dolormuscular'] == '1') ? 'checked' : ''; ?>> Dolor muscular</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_gripe" value="1" <?php echo ($row['sintoma_gripe'] == '1') ? 'checked' : ''; ?>> Gripe</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_presionalta" value="1" <?php echo ($row['sintoma_presionalta'] == '1') ? 'checked' : ''; ?>> Presión Alta</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_fatiga" value="1" <?php echo ($row['sintoma_fatiga'] == '1') ? 'checked' : ''; ?>> Fatiga</label>
        <label class="checkbox"><input type="checkbox" name="sintoma_garraspera" value="1" <?php echo ($row['sintoma_garraspera'] == '1') ? 'checked' : ''; ?>> Garraspera</label>
        <label for="fecha_vacunacion">Fecha de vacunación:</label>
        <input type="date" id="fecha_vacunacion" name="fecha_vacunacion" value="<?php echo htmlspecialchars($row['ultima_fecha_vacunacion']); ?>"><br>
        <div class="Botones">
            <button type="submit">Guardar</button>
            <button type="button" class="cancelar" onclick="window.location.href='22-lista-pdo.php'">Cancelar</button>
        </div>
    </form>
</body>
</html>
