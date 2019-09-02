<?php
$archivo = fopen("User.txt", "a");

$nombreCompleto = $_GET["Nombre"] . ", " . $_GET["Apellido"];

echo "Hola " . $nombreCompleto;

fwrite($archivo, $nombreCompleto."\r\n");

fclose($archivo);