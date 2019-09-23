<?php
    $user = "root";
    $pass = "";
    try {
    
        $conStr = new PDO("mysql:host=localhost;dbname=cdcol;charset=utf8", $user, $pass);

        $objetos = $conStr->prepare("SELECT * FROM cds");
        var_dump($objetos);
        $datos = $objetos->execute();        
        var_dump($datos);
        $table = "<table><tr><th>Titulo</th><th>Artista</th><th>año</th></tr>";
        while($obj =  $objetos->fetch(PDO::FETCH_LAZY))
        {
            $table .= "<tr>";
            $table .= "<td>" . $obj->titel . "</td>";
            $table .= "<td>" . $obj->interpret . "</td>";
            $table .= "<td>" . $obj->jahr . "</td>";
            $table .="</tr>";
        }
        $table .="</table>";
        echo $table;
        } catch (PDOexception $th) {
        echo $th->getMessage();
        }