<?php


namespace App\Modelos;


class Bicicleta
{
    private $idBicicletas;
    private $Referencia;
    private $Unidades;
    Private $Precio;
    private $Color;
    private $Modelo;
    private $Fecha;

    /**
     * Bicicleta constructor.
     * @param $idBicicletas
     * @param $Referencia
     * @param $Unidades
     * @param $Precio
     * @param $Color
     * @param $Modelo
     * @param $Fecha
     */
    public function __construct($idBicicletas, $Referencia, $Unidades, $Precio, $Color, $Modelo, $Fecha)
    {
        $this->idBicicletas = $idBicicletas['idBicicleta'];
        $this->Referencia = $Referencia['Referencia'];
        $this->Unidades = $Unidades['Unidades'];
        $this->Precio = $Precio['Precio'];
        $this->Color = $Color['Color'];
        $this->Modelo = $Modelo['Modelo'];
        $this->Fecha = $Fecha;['Fecha'];
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdBicicletas()
    {
        return $this->idBicicletas;
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
    public function getUnidades()
    {
        return $this->Unidades;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->Precio;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->Color;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    protected function update()
    {
        $this->updateRow("UPDATE weber.usuarios SET nombres = ?, apellidos = ?, tipo_documento = ?, documento = ?, telefono = ?, direccion = ?, user = ?, password = ?, rol = ?, estado = ? WHERE id = ?", array(
                $this->idBicicletas,
                $this->Referencia,
                $this->Unidades,
                $this->Precio,
                $this->Color,
                $this->Modelo,
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
        $tmp = new Bicicleta();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuario = new Bicicleta();
            $Usuario->idBicicletas = $valor['idBicicleta'];
            $Usuario->Referencia = $valor['Referencia'];
            $Usuario->Unidades = $valor['Unidades'];
            $Usuario->Precio = $valor['Precio'];
            $Usuario->Color = $valor['Color'];
            $Usuario->Modelo = $valor['Modelo'];
            $Usuario->Fecha = $valor['Fecha'];
            $Usuario->Disconnect();
            array_push($arrUsuarios, $Usuario);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

    protected static function searchForId($id)
    {
        $Usuario = new Bicicleta();
        if ($id > 0){
            $getrow = $Usuario->getRow("SELECT * FROM weber.usuarios WHERE id =?", array($id));
            $Usuario->idBicicletas = $getrow['idBicicleta'];
            $Usuario->Unidades = $getrow['Unidades'];
            $Usuario->Precio = $getrow['Precio'];
            $Usuario->Color = $getrow['Color'];
            $Usuario->Modelo = $getrow['Modelo'];
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
        return Usuarios::buscar("SELECT * FROM weber.usuarios");
    }





}
