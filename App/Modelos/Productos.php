<?php


namespace App\Modelos;


class Productos
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
    public function __construct($idProducto, $Codigo, $Unidades, $Referencia, $Valor_Unidad)
    {
        $this->idProducto = $idProducto['idProducto'];
        $this->Codigo = $Codigo['Codigo'];
        $this->Unidades = $Unidades['Unidades'];
        $this->Referencia = $Referencia['Referencia'];
        $this->Valor_Unidad = $Valor_Unidad['Valor_Unidad'];
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
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * @return mixed
     */
    public function getUnidades()
    {
        return $this->Unidades;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->Referencia;
    }

    /**
     * @return mixed
     */
    public function getValorUnidad()
    {
        return $this->Valor_Unidad;
    }

    protected function store()
    {
        $this->insertRow("INSERT INTO weber.usuarios VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
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
        $this->updateRow("UPDATE weber.usuarios SET nombres = ?, apellidos = ?, tipo_documento = ?, documento = ?, telefono = ?, direccion = ?, user = ?, password = ?, rol = ?, estado = ? WHERE id = ?", array(
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