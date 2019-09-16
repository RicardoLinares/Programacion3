<?php
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
$con = @mysqli_connect($host, $user, $pass, $base);
switch ($queHago) {
    case "TraerTodos_usuarios":
        $sql = "SELECT * FROM usuarios";
        $rs = $con->query($sql);     
        $table = "<table>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Perfil</td>
            <td>Estado</td>
        </tr>";
        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $newElement ="
            <tr>
            <td>". $row->id ."</td>
            <td>". $row->nombre ."</td>
            <td>". $row->apellido ."</td>
            <td>". $row->perfil ."</td>
            <td>". $row->estado ."</td>
        </tr>" ;
            $table = $table . $newElement;
        }     
        $table = $table . "</table>";

        echo $table;
        break;
    case "TraerPorId_Usuarios":
         $sql = "SELECT `id`, `nombre`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `id`= " . $idUsuario;
        $rs = $con->query($sql);     
        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }     
        
        echo "<pre>";
        if(isset($user_arr))
        {
            var_dump($user_arr); 
        }
            
        echo "</pre>";
         break;
    case 'TraerPorEstado_Usuarios':
        $sql = "SELECT `id`, `nombre`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `estado`= " . $estadoUsuario;
        $rs = $con->query($sql);     
        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }     
        
        echo "<pre>";
        if(isset($user_arr))
        {
            var_dump($user_arr); 
        }
            
        echo "</pre>";
         break;
    case 'Agregar_usuarios':
        $sql = "INSERT INTO `usuarios`( `nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('" . $nombreUsuario . "','". $apellidoUsuario ."','" . $claveUsuario . "',". $perfilUsuario .",". $estadoUsuario . ")";
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    case 'Modificar_usuarios':
        $sql = "UPDATE `usuarios` SET `nombre`='" . $nombreUsuario . "',`apellido`='". $apellidoUsuario ."',`clave`= '" . $claveUsuario . "',`perfil`= ". $perfilUsuario .",`estado`= ". $estadoUsuario . " WHERE`id`= ". $idUsuario . "";
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    case 'Borrar_usuarios':
        $sql = "DELETE FROM `usuarios` WHERE `id` =". $idUsuario;
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    case "TraerTodos_productos":
        $sql = "SELECT * FROM productos";
        $rs = $con->query($sql);     
        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }     
        
        echo "<pre>";
        if(isset($user_arr))
        {
            var_dump($user_arr); 
        }
            
        echo "</pre>";
        break;
    case "TraerPorId_productos":
        $sql = "SELECT `id`, `codigo_barra`, `nombre`, `path_foto` FROM `productos` WHERE `id`= " . $idProducto;
        $rs = $con->query($sql);     
        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }     
        
        echo "<pre>";
        if(isset($user_arr))
        {
            var_dump($user_arr); 
        }
            
        echo "</pre>";
         break;
    case 'Agregar_productos':
        $sql = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES ('". $codigoProducto . "','". $nombreProducto . "','". $pathProducto . "')";
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    case 'Modificar_productos':
        $sql = "UPDATE `productos` SET `codigo_barra`='". $codigoProducto . "',`nombre`='". $nombreProducto . "',`path_foto`='". $pathProducto . "' WHERE `id`= ". $idProducto;
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    case 'Borrar_productos':
        $sql = "DELETE FROM `productos` WHERE `id` =". $idProducto;
        $rs = $con->query($sql);     
        
        echo "Filas afectadas" . mysqli_affected_rows($con);
        break;
    default;
        break;
}
mysqli_close($con);
# code...
