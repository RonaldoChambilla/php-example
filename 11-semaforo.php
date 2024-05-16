<?php

echo "ingrese el NUMERO segun el color del semaforo \n 1)ROJO \n 2)AMARILLO \n 3)VERDE \n";
  $color = fgets(STDIN);
   
  if ($color == 1){
    echo "¡PARE!";
  }
  elseif ($color == 3){
    echo "¡AVANZA!";
  }
  elseif ($color == 2){
    echo "¡ESPERA!";
  }
else{
echo "no vale";}








?>