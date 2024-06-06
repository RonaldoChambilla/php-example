function buscarPacientes() {
    const $nombre = $("#nombre").val();
    
    let datos ={
        nombre : $nombre
    };
    $.ajax({
        url :"26-ajax-pdo.php",
        type : "post",
        data : datos,
        success : function(result) {
            debugger;
            
            const pacientes=$.parseJSON(result);
            pacientes.forEach(item => {
                
            agregarFilas("#tabla",item);

            });
            //console.log(result);
        }
    })


    return;
}

function agregarFilas(id,paciente) {
    const html=
    "<tr>"+
    "<td>"+paciente.nombres+"</td>"+
    "<td>"+paciente.edad+"</td>"+    
    "<td>"+paciente.talla_m+"</td>"+
    "<td>"+paciente.peso_kg+"</td>"+
    "<td>"+paciente.sintoma_tos+"</td>"+
    "<td>"+paciente.sintoma_fiebre+"</td>"+
    "<td>"+paciente.sintoma_disnea+"</td>"+
    "<td><button type='button' onclick=editar('"+paciente.nombres+"','"+paciente.edad+"','"+paciente.talla_m+"','"+paciente.peso_kg+"','"+paciente.sintoma_tos+"','"+paciente.sintoma_fiebre+"','"+paciente.sintoma_disnea+"');>Editar</button></td>"+
    "<td><button type='button' onclick=eliminar('"+paciente.nombres+"','"+paciente.edad+"');>eliminar</button></td>"+
    "</tr>";
    $(id+" tr:last").after(html);
}
 
function editar(nombres,edad,talla_m,peso_kg,sintoma_tos,sintoma_fiebre,sintoma_disnea) {
    $('#exampleModal').modal('show');    
    $("#nombre2").val(nombres);
    $("#edad2").val(edad);
    $("#talla2").val(talla_m);
    $("#peso2").val(peso_kg);
    if (sintoma_tos == 1) {
        $('#sintoma_tos').prop('checked', true);
    } else {
        $('#sintoma_tos').prop('checked', false);
        }
    if (sintoma_fiebre == 1) {
        $('#sintoma_fiebre').prop('checked', true);
    } else {
        $('#sintoma_fiebre').prop('checked', false);
        }
    if (sintoma_disnea == 1) {
        $('#sintoma_disnea').prop('checked', true);
    } else {
        $('#sintoma_disnea').prop('checked', false);
        }
    
}
$(document).ready(function() {
    $('#exampleModal').on('hidden.bs.modal', function () {
        $(this).find('input[type="text"]').val('');
        $(this).find('input[type="number"]').val('');
        $(this).find('input[type="checkbox"]').prop('checked', false);
    });
});
