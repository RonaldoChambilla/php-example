<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $pass="";

    try {
        
        $db = new PDO($dsn, $user, $pass);        
        $pacientes = $db->query("
        UPDATE pacientes
        SET nombre = '$nombre', edad = '$edad', talla = '$talla', peso = '$peso', sintoma_tos = '$sintoma_tos', sintoma_fiebre = '$sintoma_fiebre'
        , sintoma_disnea = '$sintoma_disnea', sintoma_dolormuscular = '$sintoma_dolormuscular', sintoma_gripe = '$sintoma_gripe', sintoma_presionalta = '$sintoma_presionalta', sintoma_fatiga = '$sintoma_fatiga'
        WHERE id = 1;");
        $resultado=[];
        foreach ($pacientes as $row) {
            array_push($resultado,$row);
        }         
        echo json_encode($resultado);        
    } catch (PDOException $e) {        
        echo "Error : ".$e->getMessage();
    }
    
}
?>