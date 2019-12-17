<?php


namespace App\Modelos;

require('db_abstract_class.php');

class Bicicleta extends db_abstract_class
{
    private $idBicicletas;
    private $Referencia;
    private $Unidades;
    Private $Precio;
    private $Color;
    private $Modelo;
    private $Fecha;
    private $Marca;
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
    public function __construct($bicicleta = array())
    {
        parent::__construct();
        $this->idBicicletas = $bicicleta['idBicicleta'] ?? null;
        $this->Referencia = $bicicleta['Referencia'] ?? null;
        $this->Unidades = $bicicleta['Unidades'] ?? null;
        $this->Precio = $bicicleta['Precio'] ?? null;
        $this->Color = $bicicleta['Color'] ?? null;
        $this->Modelo = $bicicleta['Modelo'] ?? null;
        $this->Fecha = $bicicleta['Fecha'] ?? null;
        $this->Marca = $bicicleta['Marca'] ?? null;

    }

    /**
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->isConnected;
    }

    /**
     * @return PDO
     */
    public function getDatab(): PDO
    {
        return $this->datab;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->Marca;
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
        $this->updateRow("UPDATE weber.usuarios SET idBicicleta = ?,Referencia = ?,Unidades = ?,Marca = ?,Precio = ?,Color = ?,Modelo = ?,Fecha = ? WHERE id = ?", array(
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
            $getrow = $Usuario->getRow("SELECT * FROM weber.Bicicleta WHERE id =?", array($id));
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
        return Usuarios::buscar("SELECT * FROM weber.Bicicleta");
    }


    protected function store()
    {
        // TODO: Implement store() method.
    }
}
