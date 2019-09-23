<?php
require_once("AcessoDatos.php");
class usuarios
{
    public $id;
    public $nombre;
    public $apellido;
    public $Correo;
    public $clave;
    public $estado;

    public function MostrarDatos()
    {
            return $this->id." - ".$this->nombre." - ".$this->apellido." - ".$this->estado . " - ". $this->correo;
    }
    
    public static function TraerTodosLosUsuarios()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT `id`, `nombre`, `apellido`, `clave`, `Correo`, `estado` FROM `usuarios` WHERE 1");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new usuarios);                                                

        return $consulta; 
    }
    
    public function InsertarElUsuarios()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `Correo`, `estado`) "
                                                    . "VALUES (:nombre , :apellido , :clave , :correo , :estado ");
        
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);

        $consulta->execute();   

    }
    
    public static function ModificarUsuarios($id, $nombre, $apellido , $clave, $correo, $estado )
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `nombre`=:nombre,`apellido`=:apellido,`clave`=:clave,`Correo`=:correo,`estado`=:estado 
                                                         WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':estado', $estado, PDO::PARAM_INT);

        return $consulta->execute();

    }

    public static function EliminarUsuarios($cd)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM `usuarios` WHERE id = :id");
        
        $consulta->bindValue(':id', $cd->id, PDO::PARAM_INT);

        return $consulta->execute();

    }
    
    public static function ExisteEnBd($correo, $clave)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT `id`, `nombre`, `apellido`, `clave`, `Correo`, `estado` FROM `usuarios` WHERE Correo = :correo AND clave = :clave");

        $consulta->execute();
        return 1 == $consulta->count;
    }
}