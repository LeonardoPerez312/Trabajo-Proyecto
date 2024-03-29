<?php


namespace App\Controllers;
use App\Modelos\Productos;
use App\Models\Usuarios;


if(!empty($_GET['action'])) {
    ProductoController::main($_GET['action']);
}

class
ProductoController
{
    static function main($action)
    {
        if ($action == "create") {
            ProductoController::create();
        } else if ($action == "edit") {
            ProductoController::edit();
        } else if ($action == "searchForID") {
            ProductoController::searchForID($_REQUEST['idPersona']);
        } else if ($action == "searchAll") {
            ProductoController::getAll();
        } else if ($action == "activate") {
            ProductoController::activate();
        } else if ($action == "inactivate") {
            ProductoController::inactivate();
        }/*else if ($action == "login"){
            UsuariosController::login();
        }else if($action == "cerrarSession"){
            UsuariosController::cerrarSession();
        }*/

    }


    static public function create()
    {
        try {

            $arrayUsuario = array();
            $arrayUsuario['idProducto'] = $_POST['idProducto'];
            $arrayUsuario['Codigo'] = $_POST['Codigo'];
            $arrayUsuario['Unidades'] = $_POST['Unidades'];
            $arrayUsuario['Referencia'] = $_POST['Referencia'];
            $arrayUsuario['Valor_unidad'] = $_POST['Valor_unidad'];


            if(!Productos::ProductoController($arrayUsuario['Codigo'])){
                $Usuario = new Productos ($arrayUsuario);
                if($Usuario->create()){
                    header("Location: ../../views/modules/usuarios/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/usuarios/create.php?respuesta=error&mensaje=Usuario ya registrado");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/usuarios/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayUsuario = array();
            $arrayUsuario['idProducto'] = $_POST['idProducto'];
            $arrayUsuario['Codigo'] = $_POST['Codigo'];
            $arrayUsuario['Unidades'] = $_POST['Unidades'];
            $arrayUsuario['Referencia'] = $_POST['Referencia'];
            $arrayUsuario['Valor_Unidad'] = $_POST['Valor_unidad'];


            $user = new Productos($arrayUsuario);
            $user->update();

            header("Location: ../../views/modules/usuarios/show.php?id=".$user->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/usuarios/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjUsuario = Productos::searchForId($_GET['Id']);
            $ObjUsuario->setEstado("Activo");
            if($ObjUsuario->update()){
                header("Location: ../../views/modules/usuarios/index.php");
            }else{
                header("Location: ../../views/modules/usuarios/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/usuarios/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $ObjUsuario = Productos::searchForId($_GET['Id']);
            $ObjUsuario->setEstado("Inactivo");
            if($ObjUsuario->update()){
                header("Location: ../../views/modules/usuarios/index.php");
            }else{
                header("Location: ../../views/modules/usuarios/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/usuarios/index.php?respuesta=error");
        }
    }
    static public function searchForID ($id){
        try {
            return Productos::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../../views/modules/usuarios/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Productos::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }
    /*public static function personaIsInArray($idPersona, $ArrPersonas)
    {
        if (count($ArrPersonas) > 0) {
            foreach ($ArrPersonas as $Persona) {
                if ($Persona->getIdPersona() == $idPersona) {
                    return true;
                }
            }
        }
        return false;
    }

    static public function selectPersona($isMultiple = false,
                                         $isRequired = true,
                                         $id = "idConsultorio",
                                         $nombre = "idConsultorio",
                                         $defaultValue = "",
                                         $class = "",
                                         $where = "",
                                         $arrExcluir = array())
    {
        $arrPersonas = array();
        if ($where != "") {
            $base = "SELECT * FROM persona WHERE ";
            $arrPersonas = Persona::buscar($base . $where);
        } else {
            $arrPersonas = Persona::getAll();
        }

        $htmlSelect = "<select " . (($isMultiple) ? "multiple" : "") . " " . (($isRequired) ? "required" : "") . " id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option value='' >Seleccione</option>";
        if (count($arrPersonas) > 0) {
            foreach ($arrPersonas as $persona)
                if (!UsuariosController::personaIsInArray($persona->getIdPersona(), $arrExcluir))
                    $htmlSelect .= "<option " . (($persona != "") ? (($defaultValue == $persona->getIdPersona()) ? "selected" : "") : "") . " value='" . $persona->getIdPersona() . "'>" . $persona->getNombres() . " " . $persona->getApellidos() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }


    static public function editar()
    {
        try {
            $arrayUsuario = array();
            $arrayUsuario['idPersona'] = $_POST['idPersona'];
            $arrayUsuario['Rol'] = $_POST['Rol'];
            $arrayUsuario['Nombre_Documento'] = $_POST['Nombre_Documento'];
            $arrayUsuario['Numero_Documento'] = $_POST['Numero_Documento'];
            $arrayUsuario['Nombre'] = $_POST['Nombre'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Celular'] = $_POST['Celular'];
            $arrayUsuario['Correo'] = $_POST['Correo'];
            $arrayUsuario['user'] = '';
            $arrayUsuario['password'] = '';
            $arrayUsuario['rol'] = 'Cliente';
            $arrayUsuario['estado'] = 'Activo';

            //Subir el archivo
            if (!empty($_FILES['Foto']) && ($_FILES['Foto']["name"] != "")) {
                var_dump($_FILES['Foto']);
                $NameFile = GeneralFunctions::SubirArchivo($_FILES['Foto'], '../Vista/filesUploaded/');
                if ($NameFile != false) {
                    $arrayPersona['Foto'] = $NameFile;
                } else {
                    throw new Exception('La imagen no se pudo subir.');
                }
            } else {
                $persona = UsuariosController::buscarID($arrayPersona['idPersona']);
                $arrayPersona['Foto'] = $persona->getFoto();
            }

            $person = new Persona($arrayPersona);
            $person->editar();

            header("Location: ../Vista/modules/persona/view.php?id=" . $person->getIdPersona() . "&respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/edit.php?respuesta=error");
        }
    }

    static public function ActivarPersona()
    {
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Activo");
            $ObjPersona->editar();
            header("Location: ../Vista/modules/persona/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function InactivarPersona()
    {
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Inactivo");
            $ObjPersona->editar();
            header("Location: ../Vista/modules/persona/manager.php");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return Persona::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Persona::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Persona::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function asociarEspecialidad()
    {
        try {
            $Persona = new Persona();
            $Persona->asociarEspecialidad($_POST['Persona'], $_POST['Especialidad']);
            header("Location: ../Vista/modules/persona/managerSpeciality.php?respuesta=correcto&id=" . $_POST['Persona']);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/managerSpeciality.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function eliminarEspecialidad()
    {
        try {
            $ObjPersona = new Persona();
            if (!empty($_GET['Persona']) && !empty($_GET['Especialidad'])) {
                $ObjPersona->eliminarEspecialidad($_GET['Persona'], $_GET['Especialidad']);
            } else {
                throw new Exception('No se recibio la informacion necesaria.');
            }
            header("Location: ../Vista/modules/persona/managerSpeciality.php?id=" . $_GET['Persona']);
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    public static function login()
    {
        try {
            if (!empty($_POST['Usuario']) && !empty($_POST['Contrasena'])) {
                $tmpPerson = new Persona();
                $respuesta = $tmpPerson->Login($_POST['Usuario'], $_POST['Contrasena']);
                if (is_a($respuesta, "Persona")) {
                    $hydrator = new ReflectionHydrator(); //Instancia de la clase para convertir objetos
                    $ArrDataPersona = $hydrator->extract($respuesta); //Convertimos el objeto persona en un array
                    unset($ArrDataPersona["datab"], $ArrDataPersona["isConnected"], $ArrDataPersona["relEspecialidades"]); //Limpiamos Campos no Necesarios
                    $_SESSION['UserInSession'] = $ArrDataPersona;
                    echo json_encode(array('type' => 'success', 'title' => 'Ingreso Correcto', 'text' => 'Sera redireccionado en un momento...'));
                } else {
                    echo json_encode(array('type' => 'error', 'title' => 'Error al ingresar', 'text' => $respuesta)); //Si la llamda es por Ajax
                }
                return $respuesta; //Si la llamada es por funcion
            } else {
                echo json_encode(array('type' => 'error', 'title' => 'Datos Vacios', 'text' => 'Debe ingresar la informacion del usuario y contraseña'));
                return "Datos Vacios"; //Si la llamada es por funcion
            }
        } catch (Exception $e) {
            var_dump($e);
            header("Location: ../login.php?respuesta=error");
        }
    }

    public static function cerrarSession()
    {
        session_unset();
        session_destroy();
        header("Location: ../Vista/modules/persona/login.php");
    }


}*/


}