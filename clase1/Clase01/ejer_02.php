<?php

$numeros = array(5);
$acumulador = 0;
for($i = 0; $i < 5; $i++)
{
    $numeros[$i] = rand(1,10);
    echo $numeros[$i] . "<br>";
    $acumulador += $numeros[$i];
}
$promedio = $acumulador / 5;

if($promedio < 6)
{
    echo "el promedio es menor a 6";
}
elseif($promedio > 6)
{
    echo "el promedio es mayor a 6";
}
else
{
    echo "el promedio es igual a 6";
}
echo " (" . $promedio . ")";