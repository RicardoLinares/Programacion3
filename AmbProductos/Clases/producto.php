<?php

class Producto
{
    private $nombre;
    private $cod_barra;
    public function GetCodBarra() : string
    {
        return $this->cod_barra;
    }

    public function GetNombre() : string
    {
        return $this->nombre;
    }
    public function __construct($n = null, $c = null)
    {
        if($n != null)
        {
            $this->nombre = $n;
        }
        if($c != null)
        {
            $this->cod_barra = $c;
        }
    }

    public function ToString() : string
    {
        return $this->cod_barra . "-" .$this->nombre . "\r\n";
    }

    public static function Guardar(Producto $obj) : bool
    {
        $resultado= false;
        $archivo =fopen(".\Archivos\Productos.txt", "a");
        $lineas = fwrite($archivo, $obj->ToString());

        if($lineas > 0)
        {
            $resultado = true;
        }

        fclose($archivo);
        return $resultado;
    }

    public function TraerTodosLosProductos() : array
    {
        $arrayResultado = [];
        $archivo =fopen(".\Archivos\Productos.txt", "r");
        $linea = fgets($archivo);
        do{
            # code...
            

            $array = explode("-", $linea);

            array_push($arrayResultado, new Producto($array[0], $array[1]));
            $linea = fgets($archivo);
        }while (!feof($archivo));

        fclose($archivo);

        return $arrayResultado;
    }
}