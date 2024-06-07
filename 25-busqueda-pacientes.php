<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>    
    <center><h1>Busqueda de Pacientes</h1></center>
    <!-- <form action="22.1-consulta-pdo.php" method="POST"> -->
    <input type="text" placeholder="Escribe aqui" name="nombre" id="nombre" /><br>
    <label id="tos" name="tos">Tos</label><input type="checkbox" for="tos">
    <button type="button" onclick="buscarPacientes();">Buscar</button>
    <table style="border: 1px solid black;" id="tabla">
        <tr>
            <td>ID</td>
            <td>Paciente</td>
            <td>Edad</td>
            <td>Talla</td>
            <td>Peso</td>
            <td>Tos</td>
            <td>Fiebre</td>
            <td>Disnea</td>
            <td>Dolor muscular</td>
            <td>Gripe</td>
            <td>Precion alta</td>
            <td>Fatiga</td>
            <td>Garraspera</td>
            <td>Acciones</td>
        </tr>          
    </table>
    <!-- </form> -->
    <script type="text/javascript"
    src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="25.1-ajax.js"></script>
 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nuevo Paciente
    </button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <input type="hidden" name="accion" id="accion" value="insertar">

                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre2" name="name"/>

                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="edad2" name="edad"/>

                    <label for="talla" class="form-label">Talla:</label>
                    <input type="number" class="form-control" id="talla2" name="talla"/>

                    <label for="peso" class="form-label">Peso:</label>
                    <input type="number" class="form-control" id="peso2" name="peso"/>

                    <label class="form-label">Sintomas:</label><br>
                    <input type="hidden" name="id2" id="id2">
                    <label class="checkbox"><input type="checkbox" name="tos" id="sintoma_tos" value="1"> Tos</label><br>
                    <label class="checkbox"><input type="checkbox" name="fiebre" id="sintoma_fiebre" value="1"> Fiebre</label><br>
                    <label class="checkbox"><input type="checkbox" name="disnea" id="sintoma_disnea" value="1"> Disnea</label><br>
                    <label class="checkbox"><input type="checkbox" name="dolor_muscular" id="sintoma_dolor_muscular" value="1"> Dolot muscular</label><br>
                    <label class="checkbox"><input type="checkbox" name="gripe" id="sintoma_gripe" value="1"> Gripe</label><br>
                    <label class="checkbox"><input type="checkbox" name="precion_alta" id="sintoma_presion_alta" value="1"> Precion alta</label><br>
                    <label class="checkbox"><input type="checkbox" name="fatiga" id="sintoma_fatiga" value="1"> fatiga</label><br>
                    <label class="checkbox"><input type="checkbox" name="garraspera" id="sintoma_garraspera" value="1"> Garraspera</label><br>
                    <button  type="button" onclick="guardarOactualizar(insertar);"> Guardar </button>
                    <button  type="button" onclick="eliminar();"> Canselar </button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="accion" id="accion" value="actualizar">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre2" name="name"/>

                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="edad2" name="edad"/>

                    <label for="talla" class="form-label">Talla:</label>
                    <input type="number" class="form-control" id="talla2" name="talla"/>

                    <label for="peso" class="form-label">Peso:</label>
                    <input type="number" class="form-control" id="peso2" name="peso"/>

                    <label class="form-label">Sintomas:</label><br>
                    <input type="hidden" name="id2" id="id2">
                    <label class="checkbox"><input type="checkbox" name="tos" id="sintoma_tos" value="1"> Tos</label><br>
                    <label class="checkbox"><input type="checkbox" name="fiebre" id="sintoma_fiebre" value="1"> Fiebre</label><br>
                    <label class="checkbox"><input type="checkbox" name="disnea" id="sintoma_disnea" value="1"> Disnea</label><br>
                    <label class="checkbox"><input type="checkbox" name="dolor_muscular" id="sintoma_dolor_muscular" value="1"> Dolot muscular</label><br>
                    <label class="checkbox"><input type="checkbox" name="gripe" id="sintoma_gripe" value="1"> Gripe</label><br>
                    <label class="checkbox"><input type="checkbox" name="precion_alta" id="sintoma_presion_alta" value="1"> Precion alta</label><br>
                    <label class="checkbox"><input type="checkbox" name="fatiga" id="sintoma_fatiga" value="1"> fatiga</label><br>
                    <label class="checkbox"><input type="checkbox" name="garraspera" id="sintoma_garraspera" value="1"> Garraspera</label><br>
                    <button  type="button" onclick="guardarOactualizar(actualizar);"> Guardar </button>
                    <button  type="button" onclick="eliminar();"> Canselar </button>

                </div>
            </div>
        </div>
    </div>
</body>
</html>