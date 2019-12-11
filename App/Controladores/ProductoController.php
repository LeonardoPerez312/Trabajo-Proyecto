<?php


namespace App\Controladores;
use App\Modelos\Producto;

if(!empty($_GET['action'])){
    UsuariosController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ProductoController
{


}