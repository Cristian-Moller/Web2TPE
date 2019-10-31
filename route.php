<?php

require_once('./controllers/vehiculo.controller.php');
require_once('./controllers/login.controller.php');
require_once('./controllers/modificar.controller.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("EDITAR", BASE_URL . 'editar');

$action = $_GET['action'];

print_r($action);
print(BASE_URL);

if($action == ''){
    $vehiculosController = new VehiculoController();
    $vehiculosController->showVehiculos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        print_r($partesURL);

        if($partesURL[0] == "vehiculo"){
            $controller = new VehiculoController();
            $controller->showVehiculos();
        }elseif($partesURL[0] == "insertar") {
            $controller = new VehiculoController();
            $controller->InsertarVehiculo();
        }elseif($partesURL[0] == "vender") {
            $controller = new VehiculoController();
            $controller->VenderVehiculo($partesURL[1]);

        }elseif($partesURL[0] == "editar") {
            $controller = new ModificarController();  
            if($partesURL[1] == "guardar"){
                $controller->EditarVehiculo();
            }else{
                $controller->GetVehiculo($partesURL[1]);
            }
        } elseif($partesURL[0] == "borrar") {
            $controller = new VehiculoController();
            $controller->BorrarVehiculo($partesURL[1]);

        }elseif($partesURL[0] == "login") {
            $controller = new LoginController();
            $controller->showLogin();
        } elseif($partesURL[0] == "ingresar"){
            $controller = new LoginController();
            $controller->Ingresar();
        } else {
            $vehiculosController = new VehiculoController();
            $vehiculosController->showVehiculos();
        }
    }
}


/*function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
*/  