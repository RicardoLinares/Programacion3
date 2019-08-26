<?php 
echo 'Hola';
echo '  Mundo';
$nombre = "rICARdo";
$apellido = "lInaRes ";
echo "<br>";

$nombre = strtolower($nombre);
$apellido = strtolower($apellido);
$nombre =  ucfirst($nombre);
$apellido = ucfirst($apellido);
printf($apellido . $nombre);