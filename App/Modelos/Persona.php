<?php


namespace App\Modelos;
require('BasicModel.php');

class Persona   extends db_abstract_class
{
    private $idPersona;
    private $Rol;
    private $Nombre_Documento;
    private $Numero_Documento;
    private $Nombre;
    private $apellidos;
    private $Celular;
    private $Correo;
    private $user;
    private $password;
    private $estado;

    /**
     * Persona constructor.
     * @param $idPersona
     * @param $Rol
     * @param $Nombre_Documento
     * @param $Numero_Documento
     * @param $Nombre
     * @param $apellidos
     * @param $Celular
     * @param $Correo
     * @param $user
     * @param $password
     * @param $estado
     */
    public function __construct($persona = array())
    {
        parent::__construct();
        $this->idPersona = $persona['id']?? null;
        $this->Rol = $persona['Rol']?? null;
        $this->Nombre_Documento = $persona['Nombre_documento']?? null;
        $this->Numero_Documento = $persona['Numero_documento']?? null;
        $this->Nombre = $persona['Nombre']?? null;
        $this->apellidos = $persona['Apellidos']?? null;
        $this->Celular = $persona['Celular']?? null;
        $this->Correo = $persona['Correo']?? null;
        $this->user = $persona['user']?? null;
        $this->password = $persona['password']?? null;
        $this->estado = $persona['estado']?? null;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona): void
    {
        $this->idPersona = $idPersona;
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
    public function setRol($Rol): void
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
    public function setNombreDocumento($Nombre_Documento): void
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
    public function setNumeroDocumento($Numero_Documento): void
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
    public function setNombre($Nombre): void
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
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
    public function setCelular($Celular): void
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
    public function setCorreo($Correo): void
    {
        $this->Correo = $Correo;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO weber.usuarios VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nombres,
                $this->apellidos,
                $this->tipo_documento,
                $this->documento,
                $this->telefono,
                $this->direccion,
                $this->user,
                $this->password,
                $this->rol,
                $this->estado
            )
        );
        $this->Disconnect();
        return $result;
    }







}