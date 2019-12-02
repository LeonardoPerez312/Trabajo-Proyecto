<?php


namespace App\Modelos;


class Producto
{
  private $Codigo;
  Private $Unidades;
  Private  $Referencia;
  Private  $Valor_Unidades;

    /**
     * Producto constructor.
     * @param $Codigo
     * @param $Unidades
     * @param $Referencia
     * @param $Valor_Unidades
     */
    public function __construct($Codigo, $Unidades, $Referencia, $Valor_Unidades)
    {
        $this->Codigo = $Codigo;
        $this->Unidades = $Unidades;
        $this->Referencia = $Referencia;
        $this->Valor_Unidades = $Valor_Unidades;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * @param mixed $Codigo
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
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
    public function getValorUnidades()
    {
        return $this->Valor_Unidades;
    }

    /**
     * @param mixed $Valor_Unidades
     */
    public function setValorUnidades($Valor_Unidades)
    {
        $this->Valor_Unidades = $Valor_Unidades;
    }
    public function MostarDatos()
    {
        echo "<H4>Los datos de los productos son: </H4>";
        echo "<ul>";
        echo   "<li><strong>Codigo: </strong>".$this->getCodigo()."</li>";
        echo   "<li><strong>Unidades: </strong>".$this->getUnidades()."</li>";
        echo   "<li><strong>Referencia: </strong>".$this->getReferencia()."</li>";
        echo   "<li><strong>Valor: </strong>".$this->getValorUnidades()."</li>";
        echo "</ul>";

    }
}