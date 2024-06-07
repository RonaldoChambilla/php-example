<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $talla = $_POST['talla'];
    $peso = $_POST['peso'];
    $sintoma_tos = $_POST['sintoma_tos'];
    $sintoma_fiebre = $_POST['sintoma_fiebre'];
    $sintoma_disnea = $_POST['sintoma_disnea'];
    $sintoma_dolormuscular = $_POST['sintoma_dolormuscular'];
    $sintoma_gripe = $_POST['sintoma_gripe'];
    $sintoma_presionalta = $_POST['sintoma_presionalta'];
    $sintoma_fatiga = $_POST['sintoma_fatiga'];
    $sintoma_garraspera = $_POST['sintoma_garraspera'];

    $dsn="mysql:host=localhost;dbname=covid";
    $user="root";
    $pass="988467202r--";

    try {
        
        $db = new PDO($dsn, $user, $pass);
        if ($accion == "actualizar"){      
        $pacientes = $db->query("
        UPDATE pacientes
        SET nombres = '$nombre', edad = '$edad', talla_m = '$talla', peso_kg = '$peso', sintoma_tos = '$sintoma_tos', sintoma_fiebre = '$sintoma_fiebre'
        , sintoma_disnea = '$sintoma_disnea', sintoma_dolormuscular = '$sintoma_dolormuscular', sintoma_gripe = '$sintoma_gripe', sintoma_presionalta = '$sintoma_presionalta', sintoma_fatiga = '$sintoma_fatiga'
        WHERE id = '$id';");
    }  
    elseif ($accion == "guardar"){
        $pacientes = $db ->query(
            "INSERT INTO pacintes(nombres,edad,talla_m,peso_kg,sintoma_tos,sintoma_fiebre,sintoma_disnea,sintoma_dolormuscular,sintoma_gripe,sintoma_presionalta,sintoma_fatiga) 
            VALUES ('$nombre','$edad','$talla','$peso','$sintoma_tos','$sintoma_fiebre','$sintoma_disnea','$sintoma_dolormuscular','$sintoma_gripe','$sintoma_presionalta','$sintoma_fatiga');"
        );
    }
        
    } catch (PDOException $e) {        
        echo "Error : ".$e->getMessage();
    }
    
}
?>