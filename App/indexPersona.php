<?php

require("App\Modelos\Persona.php");
use App\Modelos\Persona  as Datos;

?>


<?php
$Computador2 = new Datos("Administrador","Cedula","1057607312","Andres","Avella","3143426091","leoz79753@gmail.com");

$Computador2 ->mostrarDatos();
?>