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