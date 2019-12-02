<?php


namespace App\Modelos;


class Ventas
{
 private $Valor;
 private $Forma_Pago;
 private $Fecha;

    /**
     * Ventas constructor.
     * @param $Valor
     * @param $Forma_Pago
     * @param $Fecha
     */
    public function __construct($Valor, $Forma_Pago, $Fecha)
    {
        $this->Valor = $Valor;
        $this->Forma_Pago = $Forma_Pago;
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param mixed $Valor
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
        return $this->Forma_Pago;
    }

    /**
     * @param mixed $Forma_Pago
     */
    public function setFormaPago($Forma_Pago)
    {
        $this->Forma_Pago = $Forma_Pago;
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
        echo "<H4>Los datos del cliente son: </H4>";
        echo "<ul>";
        echo   "<li><strong>Valor: </strong>".$this->getValor()."</li>";
        echo   "<li><strong>Forma_pago: </strong>".$this->getFormaPago()."</li>";
        echo   "<li><strong>Fecha: </strong>".$this->getFecha()."</li>";
        echo "</ul>";

    }

}