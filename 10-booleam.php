<?php
$lusEncendida=true; 


if($lusEncendida)
echo "la luz esta encendida";
else
echo "la luz esta apagada";
//caso dos


$sintomas_covid=[
    "tos"=> true,
    "fiebre"=> false,
    "perdida_olfato"=>false,
    "dolor"=>false];

    if($sintomas_covid["tos"] &&
    $sintomas_covid["fiebre"]){
        echo"\n Estas enfermo tienes covid. Ve a un centro de salud.";
    }
    else {
        echo "\n Aun no estas con covid.";
    }
    //caso 3


    $saldo = 1000;
    if( ($saldo > 0)){
        echo "\n Tiene saldo insuficiente";

    }
    else {
        echo "\n saldo suficiente";
    }




?>