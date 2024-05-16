<?php
include "09.libreria.php";
echo "ingrese el primer numero: ";
$numero1=fgets(STDIN);
echo "ingrese el segundo numero: ";
$numero2=fgets(STDIN);
$resultado = multiplicar($numero1,$numero2);
echo "El producto $numero1 x $numero2 es $resultado \n";



?>