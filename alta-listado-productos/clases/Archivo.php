<?php

class Archivo
{
    public function Subir($destino = null) // true archivo subido o false en el caso opuesto
    {
        $resultado = true;
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
        return $resultado;
    }
}