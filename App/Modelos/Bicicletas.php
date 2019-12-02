<?php


namespace App\Modelos;


class Bicicletas
{
    Private $Referencia;
    Private $Unidades;
    Private $Marca;
    Private $Precio;
    Private $Color;
    Private $Modelo;
    Private $Fecha;

    /**
     * Bicicletas constructor.
     * @param $Referencia
     * @param $Unidades
     * @param $Marca
     * @param $Precio
     * @param $Color
     * @param $Modelo
     * @param $Fecha
     */
    public function __construct($Referencia, $Unidades, $Marca, $Precio, $Color, $Modelo, $Fecha)
    {
        $this->Referencia = $Referencia;
        $this->Unidades = $Unidades;
        $this->Marca = $Marca;
        $this->Precio = $Precio;
        $this->Color = $Color;
        $this->Modelo = $Modelo;
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->Referencia;
    }

    /**
     * @param mixed $Referencia
     */
    public function setReferencia($Referencia)
    {
        $this->Referencia = $Referencia;
    }

    /**
     * @return mixed
     */
    public function getUnidades()
    {
        return $this->Unidades;
    }

    /**
     * @param mixed $Unidades
     */
    public function setUnidades($Unidades)
    {
        $this->Unidades = $Unidades;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->Marca;
    }

    /**
     * @param mixed $Marca
     */
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->Precio;
    }

    /**
     * @param mixed $Precio
     */
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->Color;
    }

    /**
     * @param mixed $Color
     */
    public function setColor($Color)
    {
        $this->Color = $Color;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * @param mixed $Modelo
     */
    public function setModelo($Modelo)
    {
        $this->Modelo = $Modelo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
    public function MostarDatos()
    {
        echo "<H4>Los datos de la Bicicleta son: </H4>";
        echo "<ul>";
        echo   "<li><strong>Referencia: </strong>".$this->getReferencia()."</li>";
        echo   "<li><strong>Unidades: </strong>".$this->Unidades()."</li>";
        echo   "<li><strong>Marca: </strong>".$this->getMarca()."</li>";
        echo   "<li><strong>Precio: </strong>".$this->getPrecio()."</li>";
        echo   "<li><strong>Color: </strong>".$this->getColor()."</li>";
        echo   "<li><strong>Modelo: </strong>".$this->getModelo()."</li>";
        echo   "<li><strong>Fecha: </strong>".$this->getFecha()."</li>";
        echo "</ul>";

    }


}