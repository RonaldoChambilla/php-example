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
    "<td>"+paciente.sintoma_dolormuscular+"</td>"+
    "<td>"+paciente.sintoma_gripe+"</td>"+
    "<td>"+paciente.sintoma_presionalta+"</td>"+
    "<td>"+paciente.sintoma_fatiga+"</td>"+
    "<td>"+paciente.sintoma_garraspera+"</td>"+
    "<td><button type='button' onclick=editar('"+paciente.nombres+"','"+paciente.edad+"','"+paciente.talla_m+"','"+paciente.peso_kg+"','"+paciente.sintoma_tos+"','"+paciente.sintoma_fiebre+"','"+paciente.sintoma_disnea+
    "','"+paciente.sintoma_dolormuscular+"','"+paciente.sintoma_gripe+"','"+paciente.sintoma_precionalta+"','"+paciente.sintoma_fatiga+"','"+paciente.sintoma_garraspera+"');>Editar</button></td>"+
    "<td><button type='button' onclick=eliminar('"+paciente.nombres+"','"+paciente.edad+"');>eliminar</button></td>"+
    "</tr>";
    $(id+" tr:last").after(html);
}
 
function editar(nombres,edad,talla_m,peso_kg,sintoma_tos,sintoma_fiebre,sintoma_disnea,sintoma_dolormuscular,sintoma_gripe,sintoma_presionalta,sintoma_fatiga,sintoma_garraspera) {
    $('#exampleModal').modal('show');    
    $("#nombre2").val(nombres);
    $("#edad2").val(edad);
    $("#talla2").val(talla_m);
    $("#peso2").val(peso_kg);
    if (sintoma_tos == 1) {
        $("#sintoma_tos").prop("checked", true);
    }
    else {
        $("#sintoma_tos").prop('checked', false);

    }
    if (sintoma_fiebre == 1) {
        $("#sintoma_fiebre").prop("checked", true);
    }
    else {
        $("#sintoma_fiebre").prop('checked', false);

    }
    if (sintoma_disnea == 1) {
        $("#sintoma_disnea").prop("checked", true);
    }
    else {
        $("#sintoma_disnea").prop('checked', false);

    }
    if (sintoma_dolormuscular == 1) {
        $("#sintoma_dolor_muscular").prop("checked", true);
    }
    else {
        $("#sintoma_dolor_muscular").prop('checked', false);

    }
    if (sintoma_gripe == 1) {
        $("#sintoma_gripe").prop("checked", true);
    }
    else {
        $("#sintoma_gripe").prop('checked', false);

    }
    if (sintoma_presionalta == 1) {
        $("#sintoma_presion_alta").prop("checked", true);
    }
    else {
        $("#sintoma_presion_alta").prop('checked', false);

    }
    if (sintoma_fatiga == 1) {
        $("#sintoma_fatiga").prop("checked", true);
    }
    else {
        $("#sintoma_fatiga").prop('checked', false);

    }
    if (sintoma_garraspera == 1) {
        $("#sintoma_garraspera").prop("checked", true);
    }
    else {
        $("#sintoma_garraspera").prop('checked', false);

    }


}

function actualizar() {
    const $nombre = $("#nombre2").val();
    const $edad = $("#edad2").val();
    const $talla = $("#talla2").val();
    const $peso = $("#peso2").val();
    const $sintoma_tos = $("#sintoma_tos").val();
    const $sintoma_fiebre = $("#sintoma_fiebre").val();
    const $sintoma_disnea = $("#sintoma_disnea").val();
    const $sintoma_dolormuscular = $("#sintoma_dolor_muscular").val();
    const $sintoma_gripe = $("#sintoma_gripe").val();
    const $sintoma_presionalta = $("#sintoma_presion_alta").val();
    const $sintoma_fatiga = $("#sintoma_fatiga").val();
    const $sintoma_garraspera = $("#sintoma_garraspera").val();
   
    let datos ={
        nombre : $nombre,
        edad : $edad,
        talla : $talla,
        peso : $peso,
        sintoma_tos : $sintoma_tos,
        sintoma_fiebre : $sintoma_fiebre,
        sintoma_disnea : $sintoma_disnea,
        sintoma_dolormuscular : $sintoma_dolormuscular,
        sintoma_gripe : $sintoma_gripe,
        sintoma_presionalta : $sintoma_presionalta,
        sintoma_fatiga : $sintoma_fatiga,
        sintoma_garraspera : $sintoma_garraspera
    };
    $.ajax({
        url :"26.1-update-ajax-pdo.php",
        type : "post",
        data : datos,
        success : function(result) {              
            alert("Se guardo los datos correctamente de "+result);            
        }
    })
 
 
    return;
}
 

function cancelar() {
    $('#exampleModal').modal('hide');    
}
$(document).ready(function() {

    $('#exampleModal').on('hidden.bs.modal', function () {    
    $(this).find('input[type="text"]').val('');
    $(this).find('input[type="number"]').val('');
    $(this).find('input[type="checkbox"]').prop('checked', false);
        });
    });
    

