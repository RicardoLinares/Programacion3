<?php
include "Clases\producto.php";
$opcion = "ALTA";
switch ($opcion) {
    case "ALTA":
        $p = new Producto($_POST["Producto"], $_POST["Codigo"]);
        if(Producto::Guardar($p))
        {
            echo "Exito al Guardar";
        }
        break;
    case "MOSTRAR":
        break;
    default:
        # code...
        break;
}