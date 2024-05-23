<?php
include("15-poligonos.php");

echo "AREA DE TRIANGULO\n";
echo "INGRESA LA BASE :  ";
$b = fgets(STDIN);
echo "INGRESE LA ALTURA: ";
$h = fgets(STDIN);
$triangulo = new Triangulo($b,$h);
$area=$triangulo->calcularArea();
echo "EL AREA DEL TRIANGULO ES:  $area";

echo "\n***************************\n";

echo "\nAREA DE RECTANGULO\n";
echo "INGRESA LA BASE :";
$b = fgets(STDIN);
echo "INGRESE LA ALTURA: ";
$a = fgets(STDIN);
$rectangulo = new Rectangulo($b,$a);
$area=$rectangulo->calcularArea();
echo "EL AREA DEL RECTANGULO ES:  $area";
echo "\n***************************\n";

echo "\nAREA DE CUADRADO\n";
echo "INGRESA EL LADO UNO : ";
$l1 = fgets(STDIN);
echo "INGRESE EL LADO DOS: ";
$l2 = fgets(STDIN);
$cuadrado = new Cuadrado($l1,$l2);
$area=$cuadrado->calcularArea();
echo "EL AREA DEL CUADRADO ES:  $area";

echo "\n***************************\n";
$pi = pi();
echo "\nAREA DE CIRCULO\n";
echo "INGRESA EL RADIO :  ";
$r = fgets(STDIN);
$circulo = new Circulo($r);
$area=$circulo->calcularArea();
echo "EL AREA DEL CIRCULO ES:  $area";
?>


