<?php
require_once("Usuario.php");
$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;
$idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : NULL;
$estadoUsuario = isset($_POST['estadoUsuario']) ? $_POST['estadoUsuario'] : NULL;
$nombreUsuario  = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : NULL;
$apellidoUsuario    = isset($_POST['apellidoUsuario']) ? $_POST['apellidoUsuario'] : NULL;
$claveUsuario   = isset($_POST['claveUsuario']) ? $_POST['claveUsuario'] : NULL;
$perfilUsuario  = isset($_POST['perfilUsuario']) ? $_POST['perfilUsuario'] : NULL;

$idProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : NULL;
$codigoProducto = isset($_POST['codigoProducto']) ? $_POST['codigoProducto'] : NULL;
$nombreProducto = isset($_POST['nombreProducto']) ? $_POST['nombreProducto'] : NULL;
$pathProducto = isset($_POST['pathProducto']) ? $_POST['pathProducto'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "mercado";
$sql = new PDO("mysql:host=localhost;dbname=cdcol;charset=utf8", $user, $pass);
switch ($queHago) {
    case "TraerTodos_usuarios":
        try {
            $datos = Usuarios::TraerTodosLosUsuarios(); 
          $table = "<table>
             <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Clave</td>
            <td>perfil</td>
            </tr>";
             while ($row = $datos->fetch(PDO::FETCH_LAZY)){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $newElement ="
            <tr>
            <td>". $row->id ."</td>
            <td>". $row->nombre ."</td>
            <td>". $row->apellido ."</td>
            <td>". $row->Correo ."</td>
            <td>". $row->clave ."</td>
            <td>". $row->estado ."</td>
           </tr>" ;
            $table = $table . $newElement;
        }     
        $table = $table . "</table>";

        echo $table;
        } catch (PDOexception $th) {
            echo $th->getMessage();
        }
        
        break;
    default;
        break;
}
# code...
