<?php


namespace App\Controllers;
require(__DIR__.'/../Modelos/Bicicleta.php');
use App\Modelos\Bicicleta;

if(!empty($_GET['action'])){
    BicicletasController::main($_GET['action']);
}

class BicicletasController
{

    static function main($action)
    {
        if ($action == "create") {
            BicicletasController::create();
        } else if ($action == "edit") {
            BicicletasController::edit();
        } else if ($action == "searchForID") {
            BicicletasController::searchForID($_REQUEST['idBicicleta']);
        } else if ($action == "searchAll") {
            BicicletasController::getAll();
        } else if ($action == "activate") {
            BicicletasController::activate();
        } else if ($action == "inactivate") {
            BicicletasController::inactivate();
        }/*else if ($action == "login"){
            BicicletasController::login();
        }else if($action == "cerrarSession"){
            BicicletasController::cerrarSession();
        }*/
    }


    static public function create()
    {
        try {

            $arrayBicicleta = array();
            $arrayBicicleta['Referencia'] = $_POST['Referencia'];
            $arrayBicicleta['Unidades'] = $_POST['Unidades'];
            $arrayBicicleta['Marca'] = $_POST['Marca'];
            $arrayBicicleta['Precio'] = $_POST['Precio'];
            $arrayBicicleta['Color'] = $_POST['Color'];
            $arrayBicicleta['Modelo'] = $_POST['Modelo'];
            $arrayBicicleta['Fecha'] = $_POST['Fecha'];
            if(!Bicicleta::usuarioRegistrado($arrayBicicleta['Precio'])){
                $Usuario = new Bicicleta ($arrayBicicleta);
                if($Usuario->create()){
                    header("Location: ../../Vistas/modules/bicicleta/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../Vistas/modules/bicicleta/create.php?respuesta=error&mensaje=Usuario ya registrado");
            }
        } catch (Exception $e) {
            header("Location: ../../Vistas/modules/bicicleta/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayBicicleta = array();
            $arrayBicicleta['Referencia'] = $_POST['Referencia'];
            $arrayBicicleta['Unidades'] = $_POST['Unidades'];
            $arrayBicicleta['Marca'] = $_POST['Marca'];
            $arrayBicicleta['Precio'] = $_POST['Precio'];
            $arrayBicicleta['Modelo'] = $_POST['Modelo'];
            $arrayBicicleta['Fecha'] = $_POST['Fecha'];


            $user = new Bicicleta($arrayBicicleta);
            $user->update();
            header("Location: ../../Vistas/modules/bicicleta/show.php?id=".$user->getIdBicicletas()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../Vistas/modules/bicicleta/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjBicicleta = Bicicleta::searchForId($_GET['IdBicicleta']);
            if($ObjBicicleta->update()){
                header("Location: ../../Vistas/modules/bicicleta/index.php");
            }else{
                header("Location: ../../Vistas/modules/bicicleta/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../Vistas/modules/bicicleta/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function searchForID ($id){
        try {
            return Bicicleta::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../../Vista/modules/bicicleta/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Bicicleta::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/bicicleta/manager.php?respuesta=error");
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