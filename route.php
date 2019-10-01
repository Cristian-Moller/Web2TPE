<?php

require_once('./controllers/vehiculo.controller.php');


define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$action = $_GET['action'];
//print_r($_GET);

if($action == ''){
    $vehiculosController = new VehiculoController();
    $vehiculosController->showVehiculos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "vehiculo"){
            $controller = new VehiculoController();
            $controller->showVehiculos();
        }elseif($partesURL[0] == "insertar") {
            $controller = new VehiculoController();
            $controller->InsertarVehiculo();
        }elseif($partesURL[0] == "vender") {
            $controller = new VehiculoController();
            $controller->VenderVehiculo($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            $controller = new VehiculoController();
            $controller->BorrarVehiculo($partesURL[1]);

        }
    }
}
