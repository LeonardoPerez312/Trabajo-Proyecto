<?php


namespace App\Modelos;


class Ventas
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
    public function __construct($idVenta, $Valor, $Forma_Pago, $Fecha)
    {
        $this->idVenta = $idVenta;
        $this->Valor = $Valor;
        $this->Forma_Pago = $Forma_Pago;
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
        return $this->Forma_Pago;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
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
        $this->updateRow("UPDATE weber.Bicicleta SET nombres = ?, apellidos = ?, tipo_documento = ?, documento = ?, telefono = ?, direccion = ?, user = ?, password = ?, rol = ?, estado = ? WHERE id = ?", array(
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
            $getrow = $Usuario->getRow("SELECT * FROM weber.Venta WHERE id =?", array($id));
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
        return Bicicleta::buscar("SELECT * FROM weber.Bicicleta");
    }






}