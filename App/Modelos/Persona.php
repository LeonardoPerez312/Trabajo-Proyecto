<?php


namespace App\Modelos;


class Persona
{
    Public $Rol;
    private $Nombre_Documento;
    private $Numero_Documento;
    private $Nombre;
    private $Apellidoz;
    private $Celular;
    private $Correo;

    /**
     * Persona constructor.
     * @param $Rol
     * @param $Nombre_Documento
     * @param $Numero_Documento
     * @param $Nombre
     * @param $Apellidoz
     * @param $Celular
     * @param $Correo
     */
    public function __construct($Rol, $Nombre_Documento, $Numero_Documento, $Nombre, $Apellidoz, $Celular, $Correo)
    {
        $this->Rol = $Rol;
        $this->Nombre_Documento = $Nombre_Documento;
        $this->Numero_Documento = $Numero_Documento;
        $this->Nombre = $Nombre;
        $this->Apellidoz = $Apellidoz;
        $this->Celular = $Celular;
        $this->Correo = $Correo;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->Rol;
    }

    /**
     * @param mixed $Rol
     */
    public function setRol($Rol)
    {
        $this->Rol = $Rol;
    }

    /**
     * @return mixed
     */
    public function getNombreDocumento()
    {
        return $this->Nombre_Documento;
    }

    /**
     * @param mixed $Nombre_Documento
     */
    public function setNombreDocumento($Nombre_Documento)
    {
        $this->Nombre_Documento = $Nombre_Documento;
    }

    /**
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->Numero_Documento;
    }

    /**
     * @param mixed $Numero_Documento
     */
    public function setNumeroDocumento($Numero_Documento)
    {
        $this->Numero_Documento = $Numero_Documento;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidoz()
    {
        return $this->Apellidoz;
    }

    /**
     * @param mixed $Apellidoz
     */
    public function setApellidoz($Apellidoz)
    {
        $this->Apellidoz = $Apellidoz;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->Celular;
    }

    /**
     * @param mixed $Celular
     */
    public function setCelular($Celular)
    {
        $this->Celular = $Celular;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @param mixed $Correo
     */
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }
    public function MostarDatos()
    {
        echo "<H4>Los datos del persona son: </H4>";
        echo "<ul>";
        echo   "<li><strong>Rol: </strong>".$this->getRol()."</li>";
        echo   "<li><strong>Tipo_Documento: </strong>".$this->Nombre_Documento()."</li>";
        echo   "<li><strong>Numero_Documento: </strong>".$this->getNumeroDocumento()."</li>";
        echo   "<li><strong>Nombre: </strong>".$this->getNombre()."</li>";
        echo   "<li><strong>Apellidoz: </strong>".$this->getApellidoz()."</li>";
        echo   "<li><strong>Celular: </strong>".$this->getCelular()."</li>";
        echo   "<li><strong>Correo: </strong>".$this->getCorreo()."</li>";
        echo "</ul>";

    }

}

abstract class db_abstract_class

{

    public $isConnected;
    protected $datab;
    private $username = "weber";
    private $password = "weber2019";
    private $host = "localhost";
    private $driver = "mysql";
    private $dbname = "weber";

    # métodos abstractos para ABM de clases que hereden
    abstract protected static function search($query);

    abstract protected static function getAll();

    abstract protected static function searchForId($id);

    abstract protected function store();

    abstract protected function update();

    abstract protected function deleted($id);


    public function __construct(){
        $this->isConnected = true;
        try {
            $this->datab = new PDO(
                ($this->driver != "sqlsrv") ?
                    "$this->driver:host={$this->host};dbname={$this->dbname};charset=utf8" :
                    "$this->driver:Server=$this->host;Database=$this->dbname",
                $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->datab->setAttribute(PDO::ATTR_PERSISTENT, true);
        }catch(PDOException $e) {
            $this->isConnected = false;
            throw new Exception($e->getMessage());
        }
    }

    //disconnecting from database
    //$database->Disconnect();
    public function Disconnect(){
        $this->datab = null;
        $this->isConnected = false;
    }

    //Getting row
    //$getrow = $database->getRow("SELECT email, username FROM users WHERE username =?", array("yusaf"));
    public function getRow($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //Getting multiple rows
    //$getrows = $database->getRows("SELECT id, username FROM users");
    public function getRows($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //Getting last id insert
    //$getrows = $database->getLastId();
    public function getLastId(){
        try{
            return $this->datab->lastInsertId();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //inserting un campo
    //$insertrow = $database ->insertRow("INSERT INTO users (username, email) VALUES (?, ?)", array("Diego", "yusaf@email.com"));
    public function insertRow($query, $params){
        try{
            if (is_null($this->datab)){
                $this->__construct();
            }
            $stmt = $this->datab->prepare($query);
            return $stmt->execute($params);
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //updating existing row
    //$updaterow = $database->updateRow("UPDATE users SET username = ?, email = ? WHERE id = ?", array("yusafk", "yusafk@email.com", "1"));
    public function updateRow($query, $params){
        return $this->insertRow($query, $params);
    }

    //delete a row
    //$deleterow = $database->deleteRow("DELETE FROM users WHERE id = ?", array("1"));
    public function deleteRow($query, $params){
        return $this->insertRow($query, $params);
    }


}

