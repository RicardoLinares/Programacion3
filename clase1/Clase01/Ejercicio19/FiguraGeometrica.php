<?php
declare(strict_types=1);
class FiguraGeometrica
{
    
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    protected function __construct(string $color,double $perimetro,double $superficie) {
        $this->_color = $color;
        $this->_perimetro = $perimetro;
        $this->_superficie = $superficie;
    }

    public function getColor()
    {
        return $this->_color;
    }
    public function SetColor($color)
    {
        $this->_color = $color;
    }

    protected function CalcularDatos()
    {
        $_color = "negro";
        $_perimetro = 0.0;
        $_superficie = 0.0;
    }
}