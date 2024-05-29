<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Paciente</title>
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
    <h1>Registro de Paciente</h1>
    <form id="formulario" action="21-pdo-post.php" method="post">    
        <label for ="nombre">Nombres:</label> 
        <input type="text" id="nombre" name="nombre" required><br>
        <label for= "apellido">Apellidos:</label>
        <input type ="text" id="apellido" name="apellido"><br>
        <label for="edad">Edad :</label>
        <input type="text" id="edad" name="edad" required /><br>
        <label for="talla">Talla(cm):</label>
        <input type="text" id="talla" name="talla" required /><br>
        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso"><br>
        <h2><u>Síntomas</u></h2>
        <label class="checkbox"><input type="checkbox" name="tos" id="tos" value="1"> Tos</label>
        <label class="checkbox"><input type="checkbox" name="fiebre" id="fiebre" value="1"> Fiebre</label>
        <label class="checkbox"><input type="checkbox" name="disnea" id="disnea" value="1"> Disnea</label>
        <label class="checkbox"><input type="checkbox" id="dolor_muscular" name="dolor_muscular" value="1"> Dolor muscular</label>
        <label class="checkbox"><input type="checkbox" id="gripe" name="gripe" value="1"> Gripe</label>
        <label class="checkbox"><input type="checkbox" id="Presion_alta" name="Presion_alta" value="1"> Presión Alta</label>
        <label class="checkbox"><input type="checkbox" id="Fatiga" name="Fatiga" value="1"> Fatiga</label>
        <label class="checkbox"><input type="checkbox" id="Garraspera" name="Garraspera" value="1"> Garraspera</label>
        <label for="fecha">*Fecha de vacunación:*</label>
        <input type="date" id="fecha" name="fecha" >
        <div class="Botones">
            <button type="submit">Guardar</button>
            <button class="cancelar">Cancelar</button>
        </div>
    </form>    
</body>
</html>