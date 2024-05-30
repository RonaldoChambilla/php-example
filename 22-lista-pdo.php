<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-lista.css">
    <title>Búsqueda de Pacientes</title>
</head>
<body>
    <h1>Búsqueda de Pacientes</h1>
    <form method="GET" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <h2>Síntomas</h2>
        <label><input type="checkbox" name="sintomas[]" value="tos"> Tos</label>
        <label><input type="checkbox" name="sintomas[]" value="fiebre"> Fiebre</label>
        <label><input type="checkbox" name="sintomas[]" value="disnea"> Disnea</label>
        <label><input type="checkbox" name="sintomas[]" value="dolormuscular"> Dolor Muscular</label>
        <label><input type="checkbox" name="sintomas[]" value="gripe"> Gripe</label>
        <label><input type="checkbox" name="sintomas[]" value="presionalta"> Presión Alta</label>
        <label><input type="checkbox" name="sintomas[]" value="fatiga"> Fatiga</label>
        <label><input type="checkbox" name="sintomas[]" value="garraspera"> Garraspera</label>
        <br>
        <button type="submit">Buscar</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Talla (m)</th>
            <th>Peso (kg)</th>
            <th>Síntomas</th>
            <th>Fecha de Vacunación</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "covid";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener criterios de búsqueda
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
        $sintomas = isset($_GET['sintomas']) ? $_GET['sintomas'] : [];

        // Construir la consulta SQL
        $sql = "SELECT * FROM pacientes WHERE 1=1";

        if ($nombre != '') {
            $sql .= " AND (nombres LIKE '%$nombre%' OR apellidos LIKE '%$nombre%')";
        }

        if (!empty($sintomas)) {
            foreach ($sintomas as $sintoma) {
                $sql .= " AND sintoma_$sintoma = '1'";
            }
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombres'] . "</td>";
                echo "<td>" . $row['apellidos'] . "</td>";
                echo "<td>" . $row['edad'] . "</td>";
                echo "<td>" . $row['talla_m'] . "</td>";
                echo "<td>" . $row['peso_kg'] . "</td>";
                echo "<td>";
                echo ($row['sintoma_tos'] ? "Tos " : "") .
                     ($row['sintoma_fiebre'] ? "Fiebre " : "") .
                     ($row['sintoma_disnea'] ? "Disnea " : "") .
                     ($row['sintoma_dolormuscular'] ? "Dolor Muscular " : "") .
                     ($row['sintoma_gripe'] ? "Gripe " : "") .
                     ($row['sintoma_presionalta'] ? "Presión Alta " : "") .
                     ($row['sintoma_fatiga'] ? "Fatiga " : "") .
                     ($row['sintoma_garraspera'] ? "Garraspera " : "");
                echo "</td>";
                echo "<td>" . $row['ultima_fecha_vacunacion'] . "</td>";
                echo "<td><a href='23.1-actualizacion-pdo.php?id=" . $row['id'] . "'>Editar</a> <a href='eliminar_paciente.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este paciente?\")'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron pacientes</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
