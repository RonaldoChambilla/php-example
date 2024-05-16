<?php
 $cadena="El texto a terminado";
 echo "<h1>";
 echo "El texto en mayuscula ".strtoupper($cadena)."\n";
 echo "El texto en minuscula ".strtolower($cadena)."\n";
 echo "El texto tiene ".strlen($cadena)."caracteres"."\n";
 echo "El texto dice ahora ".
 str_replace("terminado","finalizado",$cadena)."\n";
 echo "</h>";