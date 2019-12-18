<?php


namespace App\Modelos;


class Productos   extends db_abstract_class
{
    private $idProducto;
    private $Codigo;
    private $Unidades;
    private $Referencia;
    Private $Valor_Unidad;

    /**
     * Productos constructor.
     * @param $idProducto
     * @param $Codigo
     * @param $Unidades
     * @param $Referencia
     * @param $Valor_Unidad
     */
    public function __construct($producto =  array())
    {
        parent::__construct();
        $this->idProducto = $producto['id']?? null;
        $this->Codigo = $producto['codigo']?? null;
        $this->Unidades = $producto['unidades']?? null;
        $this->Referencia = $producto['referencia']?? null;
        $this->Valor_Unidad = $producto['valor_unidad']?? null;
    }
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto): void
    {
        $this->idProducto = $idProducto;
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
    public function setCodigo($Codigo): void
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
    public function setUnidades($Unidades): void
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
    public function setReferencia($Referencia): void
    {
        $this->Referencia = $Referencia;
    }

    /**
     * @return mixed
     */
    public function getValorUnidad()
    {
        return $this->Valor_Unidad;
    }

    /**
     * @param mixed $Valor_Unidad
     */
    public function setValorUnidad($Valor_Unidad): void
    {
        $this->Valor_Unidad = $Valor_Unidad;
    }

    protected function store()
    {
        $this->insertRow("INSERT INTO weber.Productos VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->idProducto,
                $this->Codigo,
                $this->Unidades,
                $this->Referencia,
                $this->Valor_Unidad,
            )
        );
        $this->Disconnect();
    }


    protected function update()
    {
        $this->updateRow("UPDATE weber.Productos SET idProducto = ?, Codigo = ?, Unidades = ?, Referencia = ?, Valor_Unidad = ? WHERE id = ?", array(
                $this->idProducto,
                $this->Codigo,
                $this->Unidades,
                $this->Referencia,
                $this->Valor_Unidad,

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
        $tmp = new Usuarios();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuario = new Usuarios();
            $Usuario->id = $valor['id'];
            $Usuario->nombres = $valor['nombres'];
            $Usuario->apellidos = $valor['apellidos'];
            $Usuario->tipo_documento = $valor['tipo_documento'];
            $Usuario->documento = $valor['documento'];
            $Usuario->telefono = $valor['telefono'];
            $Usuario->direccion = $valor['direccion'];
            $Usuario->user = $valor['user'];
            $Usuario->password = $valor['password'];
            $Usuario->rol = $valor['rol'];
            $Usuario->estado = $valor['estado'];
            $Usuario->Disconnect();
            array_push($arrUsuarios, $Usuario);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }





}