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
            console.log(result);
        }
    })


    return;
}