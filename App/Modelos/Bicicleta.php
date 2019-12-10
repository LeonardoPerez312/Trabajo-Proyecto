<?php


namespace App\Modelos;


class Bicicleta
{
  private $Referencia;
  private $Unidades;
  Private $Precio;
  private $Color;
  private $Modelo;
  private $Fecha;

    /**
     * Bicicleta constructor.
     * @param $Referencia
     * @param $Unidades
     * @param $Precio
     * @param $Color
     * @param $Modelo
     * @param $Fecha
     */
    public function __construct($Referencia, $Unidades, $Precio, $Color, $Modelo, $Fecha)
    {
        $this->Referencia = $Referencia;
        $this->Unidades = $Unidades;
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
    public function setReferencia($Referencia): void
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
    public function setUnidades($Unidades): void
    {
        $this->Unidades = $Unidades;
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
    public function setPrecio($Precio): void
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
    public function setColor($Color): void
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
    public function setModelo($Modelo): void
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
    public function setFecha($Fecha): void
    {
        $this->Fecha = $Fecha;
    }




}