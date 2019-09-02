<?php
    $archivo = fopen("Saludo.txt", "r");
    while(!feof($archivo))
    {
        echo  fgets($archivo) . "<br>";
    }
    fclose($archivo);