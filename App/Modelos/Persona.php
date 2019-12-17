<?php


namespace App\Modelos;


class Persona extends db_abstract_class
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
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->Numero_Documento;
    }

    /**
     * Persona constructor.
     * @param $idPersona
     * @param $Rol
     * @param $Nombre_Documento
     * @param $Nombre
     * @param $apellidos
     * @param $Celular
     * @param $Correo
     * @param $user
     * @param $password
     * @param $estado
     */
    public function __construct($persona = array ())
    {
        $this->idPersona = $persona['idPersona'];
        $this->Rol = $persona['Rol'];
        $this->Nombre_Documento = $persona ['Nombre Documento'];
        $this->Numero_Documento = $persona['Numero Documento'];
        $this->Nombre = $persona['Nombres'];
        $this->apellidos = $persona['Apellidos'];
        $this->Celular = $persona['Celular'];
        $this->Correo = $persona['Correo'];
        $this->user = $persona['user'];
        $this->password = $persona['password'];
        $this->estado = $persona['estado'];

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
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->Rol;
    }

    /**
     * @return mixed
     */
    public function getNombreDocumento()
    {
        return $this->Nombre_Documento;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->Celular;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    protected function store()
    {
        $this->insertRow("INSERT INTO weber.usuarios VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->idPersona,
                $this->Rol,
                $this->Nombre_Documento,
                $this->Numero_documento,
                $this->Nombre,
                $this->apellidos,
                $this->Celular,
                $this->Correo,
                $this->user,
                $this->password,
                $this->estado,
            )
        );
        $this->Disconnect();
    }

    protected function update()
    {
        $this->updateRow("UPDATE weber.usuarios SET nombres = ?, apellidos = ?, tipo_documento = ?, documento = ?, telefono = ?, direccion = ?, user = ?, password = ?, rol = ?, estado = ? WHERE id = ?", array(
                $this->idPersona,
                $this->Rol,
                $this->Nombre_Documento,
                $this->Numero_Documento,
                $this->Nombre,
                $this->apellidos,
                $this->Celular,
                $this->Correo,
                $this->user,
                $this->password,
                $this->estado,
            )
        );
        $this->Disconnect();
    }

    protected static function search($query)
    {
        $arrUsuarios = array();
        $tmp = new Usuarios();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuario = new Usuarios();
            $Usuario->idPersona = $valor['idPersona'];
            $Usuario->Rol = $valor['Rol'];
            $Usuario->Nombre_Documento = $valor['Nombre_Documento'];
            $Usuario->Numero_Documento = $valor['Numero_Documento'];
            $Usuario->Nombre = $valor['Nombre'];
            $Usuario->apellidos = $valor['apellidos'];
            $Usuario->Celular = $valor['Celular'];
            $Usuario->Correo = $valor['Correo'];
            $Usuario->user = $valor['user'];
            $Usuario->password = $valor['password'];
            $Usuario->estado = $valor['estado'];
            $Usuario->Disconnect();
            array_push($arrUsuarios, $Usuario);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

    protected static function searchForId($id)
    {
        $Usuario = new Usuarios();
        if ($id > 0){
            $getrow = $Usuario->getRow("SELECT * FROM weber.usuarios WHERE id =?", array($id));
            $Usuario->idPersona = $getrow['idPersona'];
            $Usuario->Rol = $getrow['Rol'];
            $Usuario->Nombre_Documento = $getrow['Nombre_Documento'];
            $Usuario->Numero_Documento = $getrow['Numero_Documento'];
            $Usuario->Nombre = $getrow['Nombre'];
            $Usuario->Apellidos = $getrow['Apellidos'];
            $Usuario->Celular = $getrow['Correo'];
            $Usuario->user = $getrow['user'];
            $Usuario->password = $getrow['password'];
            $Usuario->estado = $getrow['estado'];
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


    protected function deleted($id)
    {
        // TODO: Implement deleted() method.
    }
}