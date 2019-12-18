<?php


namespace App\Modelos;

require('db_abstract_class.php');



class Bicicleta  extends db_abstract_class
{
    private $idBicicleta;
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
     * @param $Marca
     */
    public function __construct($bicicleta = array())
    {
        parent::__construct();
        $this->idBicicleta = $bicicleta['idBicicleta']?? null;
        $this->Referencia = $bicicleta['Referencia']?? null;
        $this->Unidades = $bicicleta['Unidades']?? null;
        $this->Precio = $bicicleta['Precio']?? null;
        $this->Color = $bicicleta['Color']?? null;
        $this->Modelo = $bicicleta['Modelo']?? null;
        $this->Fecha = $bicicleta['Fecha']?? null;
        $this->Marca = $bicicleta['Marca']?? null;
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
        return $this->idBicicleta;
    }

    /**
     * @param mixed $idBicicletas
     */
    public function setIdBicicletas($idBicicleta):int
    {
        $this->idBicicleta = $idBicicleta;
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
    public function setColor($Color): string
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
    public function setMarca($Marca): void
    {
        $this->Marca = $Marca;
    }


    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO bicicleteria.Bicicleta VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->Referencia,
                $this->Unidades,
                $this->Precio,
                $this->Color,
                $this->Modelo,
                $this->Fecha,
                $this->Marca,

            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE bicicleteria.Bicicleta SET idBicicleta = ?, Referencia = ?, Unidades = ?, Precio = ?, Color = ?, Modelo = ?, Fecha = ?, Marca = ? WHERE id = ?", array(
                $this->Referencia,
                $this->Unidades,
                $this->Precio,
                $this->Color,
                $this->Modelo,
                $this->Fecha,
                $this->Marca,
            )
        );
        $this->Disconnect();
        return $result;
    }

    public function deleted($id) : void
    {
        // TODO: Implement deleted() method.
    }

    public static function search($query) : array
    {
        $arrbicicleta = array();
        $tmp = new Bicicleta();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Bicicleta = new Bicicleta();
            $Bicicleta->Referencia = $valor['referencia'];
            $Bicicleta->Unidades = $valor['unidades'];
            $Bicicleta->Precio = $valor['precio'];
            $Bicicleta->Color = $valor['color'];
            $Bicicleta->Modelo = $valor['modelo'];
            $Bicicleta->Fecha = $valor['fecha'];
            $Bicicleta->Marca = $valor['marca'];
            array_push($arrbicicleta, $Bicicleta);
        }
        $tmp->Disconnect();
        return $arrbicicleta;
    }

    public static function searchForId($idBicicleta) : Bicicleta
    {
        $Usuario = null;
        if ($idBicicleta > 0){
            $Bicicleta = new Bicicleta();
            $getrow = $Usuario->getRow("SELECT * FROM bicicleteria.Bicicleta WHERE id =?", array($idBicicleta));
            $Bicicleta->Referencia = $getrow['Referencia'];
            $Bicicleta->Unidades = $getrow['Unidades'];
            $Bicicleta->Marca = $getrow['Marca'];
            $Bicicleta->Precio = $getrow['Precio'];
            $Bicicleta->Color = $getrow['Color'];
            $Bicicleta->Modelo = $getrow['Modelo'];
            $Bicicleta->Fecha = $getrow['Fecha'];


        }
        $Usuario->Disconnect();
        return $Usuario;
    }

    public static function getAll() : array
    {
        return Bicicleta::search("SELECT * FROM bicicleteria.Bicicleta");
    }

    public static function usuarioRegistrado ($Unidades) : bool
    {
        $result = Bicicleta::search("SELECT id FROM bicicleteria.Bicicleta where Unidades = ".$Unidades);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }


    protected function store()
    {
        // TODO: Implement store() method.
    }
}