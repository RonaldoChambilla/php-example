<?php 

include("12-clase.php");

echo"******** MENU DE OPCIONES ******** \n";
echo"******** BIENVENIDO A MI CALCULADORA ******** \n";
echo"******** SUMAR (OPCION 1) ******** \n";
echo"******** RESTAR (OPCION 2) ******** \n";
echo"******** MULTIPLICAR (OPCION 3)******** \n";
echo"******** DIVIDIR (OPCION 4)******** \n";
echo"******** POTENCIAR (OPCION 5)******** \n";
echo"******** RAIZ (OPCION 6)******** \n";
echo"******** SALIR (OPCION 0)******** \n";
$opcion = fgets(STDIN);
switch ($opcion) {
    case 1:
        echo "ESCRIBA EL PRIMER NUMERO: ";
        $numero1 = fgets(STDIN);
        echo "\nESCRIBA EL SEGUNDO NUMERO: ";
        $numero2 = fgets(STDIN);
        $calculadora = new Calculadora($numero1,$numero2);
        $resultado = $calculadora->sumar();
        echo "\nEL RESULTADO DE LA SUMA ES : $resultado";
        break;
    case 2:
            echo "ESCRIBA EL PRIMER NUMERO: ";
            $numero1 = fgets(STDIN);
            echo "\nESCRIBA EL SEGUNDO NUMERO: ";
            $numero2 = fgets(STDIN);
            $calculadora = new Calculadora($numero1,$numero2);
            $resultado = $calculadora->restar();
            echo "\nEL RESULTADO DE LA RESTA ES : $resultado";
            break;
    case 3:
                echo "ESCRIBA EL PRIMER NUMERO: ";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBA EL SEGUNDO NUMERO: ";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->multiplicar();
                echo "\nEL RESULTADO DE LA MULTIPLICACION ES : $resultado";
                break;
    case 4:
                    echo "ESCRIBA EL PRIMER NUMERO: ";
                    $numero1 = fgets(STDIN);
                    echo "\nESCRIBA EL SEGUNDO NUMERO: ";
                    $numero2 = fgets(STDIN);
                    $calculadora = new Calculadora($numero1,$numero2);
                    $resultado = $calculadora->dividir();
                    echo "\nEL RESULTADO DE LA DIVISION ES : $resultado";
                    break;
    case 5:
                        echo "ESCRIBA EL PRIMER NUMERO: ";
                        $numero1 = trim(fgets(STDIN));
                        echo "\nESCRIBA EL SEGUNDO NUMERO: ";
                        $numero2 = trim(fgets(STDIN));
                        $calculadora = new Calculadora($numero1,$numero2);
                        $resultado = $calculadora->potencia();
                        echo "\nEL RESULTADO DE LA POTENCIA ES : $resultado";
                        break;
    case 6:
                            echo "ESCRIBA EL NUMERO PARA SABER SU RAIZ: ";
                            $numero1 = fgets(STDIN);
                            $calculadora = new Calculadora($numero1);
                            $resultado = $calculadora->raiz();
                            echo "\nLA RAIZ CUADRADA DE $numero1 ES : $resultado";
                            break;
    case 0:
                                echo"MUCHAS GRACIAS POR ESTAR AQUI";
                                break;
    
    default:
        # code...
        break;
}