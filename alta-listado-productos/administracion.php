<?php
require_once ("clases/producto.php");
require_once ("clases/Archivo.php");




$alta = isset($_POST["guardar"]) ? TRUE : FALSE;

if($alta) {

	if(Archivo::Subir("archivos/" . $_FILES["archivo"]["name"]))
	{
		echo "EXITO";
	}

	$p = new Producto($_POST["codBarra"],$_POST["nombre"], "archivos/" . $_FILES["archivo"]["name"]);
	
	if(!Producto::Guardar($p)){
		$mensaje = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		include("mensaje.php");
	}
	else{
		$mensaje = "El archivo fue escrito correctamente. PRODUCTO agregado CORRECTAMENTE!!!";
		include("mensaje.php");
	}
}//if $alta
?>