<?php
require_once("clases/Archivo.php");
class Producto
{
    private $nombre;
    private $cod_barra;
    private $imagen;
    public function GetCodBarra() : string
    {
        return $this->cod_barra;
    }

    public function GetNombre() : string
    {
        return $this->nombre;
    }
    public function GetImage() : string
    {
        return $this->imagen;
    }
    // se espera que a sea el archivo
    public function __construct($n = null, $c = null, $a = null)
    {
        if($n != null)
        {
            $this->nombre = $n;
        }
        if($c != null)
        {
            $this->cod_barra = $c;
        }
        if($a != null)
        {
            $this->imagen = $a;
        }
    }

    public function ToString() : string
    {
        return $this->cod_barra . "-" .$this->nombre ."-". $this->imagen . "\r\n";
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

            array_push($arrayResultado, new Producto($array[0], $array[1], $array[2]));
            $linea = fgets($archivo);
        }while (!feof($archivo));

        fclose($archivo);

        return $arrayResultado;
    }
}