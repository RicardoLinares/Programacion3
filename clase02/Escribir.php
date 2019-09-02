<?php

    $archivo = fopen("Saludo.txt", "w");

    $resultado = fwrite($archivo, "Hola Mundo\r\n");
    $resultado = fwrite($archivo, "Ricardo\r\n");
    
    $resultado = fwrite($archivo, "Linares\r\n");
    if($resultado > 0)
    {
        echo "<h2> Escritua Exitosa </h2>";
    }

    fclose($archivo);
