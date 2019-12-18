<?php


namespace App\Modelos;


class Ventas  extends db_abstract_class
{
    private $idVenta;
    private $Valor;
    private  $Forma_Pago;
    private  $Fecha;

    /**
     * Ventas constructor.
     * @param $idVenta
     * @param $Valor
     * @param $Forma_Pago
     * @param $Fecha
     */
    public function __construct($venta = array())
    {
        parent::__construct();
        $this->idVenta = $venta;
        $this->Valor = $venta;
        $this->Forma_Pago = $venta;
        $this->Fecha = $venta;
    }
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * @param mixed $idVenta
     */
    public function setIdVenta($idVenta): void
    {
        $this->idVenta = $idVenta;
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
    public function setValor($Valor): void
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
    public function setFormaPago($Forma_Pago): void
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
    public function setFecha($Fecha): void
    {
        $this->Fecha = $Fecha;
    }

    protected function store()
    {
        $this->insertRow("INSERT INTO weber.Bicicleta VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->idVenta,
                $this->Valor,
                $this->Forma_Pago,
                $this->Fecha,

            )
        );
        $this->Disconnect();
    }

    protected function update()
    {
        $this->updateRow("UPDATE weber.Ventas SET idVenta = ?, Valor = ?, Forma_Pago = ?, Fecha = ?,  WHERE id = ?", array(
                $this->idVenta,
                $this->Valor,
                $this->Forma_Pago,
                $this->Fecha,

            )
        );
        $this->Disconnect();
    }

    protected function deleted($id)
    {
        // TODO: Implement deleted() method.
    }

    protected static function search($query)
    {
        $arrUsuarios = array();
        $tmp = new Ventas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuario = new Ventas();
            $Usuario->idVenta = $valor['idVenta'];
            $Usuario->Valor = $valor['Valor'];
            $Usuario->Forma_Pago = $valor['Forma_Pago'];
            $Usuario->Fecha = $valor['Fecha'];
            $Usuario->Disconnect();
            array_push($arrUsuarios, $Usuario);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

    protected static function searchForId($id)
    {
        $Usuario = new Ventas();
        if ($id > 0){
            $getrow = $Usuario->getRow("SELECT * FROM weber.Ventas WHERE id =?", array($id));
            $Usuario->idVenta = $getrow['idVenta'];
            $Usuario->Forma_Pago = $getrow['Forma_Pago'];
            $Usuario->Fecha = $getrow['Fecha'];
            $Usuario->Disconnect();
            return $Usuario;
        }else{
            $Usuario->Disconnect();
            unset($Usuario);
            return NULL;
        }
    }

    protected static function getAll()
    {
        return Ventas::buscar("SELECT * FROM weber.Ventas");
    }








}