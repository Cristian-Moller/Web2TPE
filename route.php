<?php
require_once('./controllers/vehiculo.controller.php');
require_once('./controllers/login.controller.php');
require_once('./controllers/modificar.controller.php');

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("EDITAR", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/editar');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$controllerVehiculo = new VehiculoController();
$controllerModificar = new ModificarController();  
$controller = new LoginController();

if($action == ''){
    $controllerVehiculo->showVehiculos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "vehiculo"){
            $controllerVehiculo->showVehiculos();
        }elseif($partesURL[0] == "insertar") {
            $controllerVehiculo->InsertarVehiculo();
        }elseif($partesURL[0] == "vender") {
            $controllerVehiculo->VenderVehiculo($partesURL[1]);

        }elseif($partesURL[0] == "editar" && $partesURL[1] != "guardar") {
            $controllerModificar->GetVehiculo($partesURL[1]);
        } elseif($partesURL[0] == "editar" && $partesURL[1] == "guardar") {
            $controllerModificar->EditarVehiculo();
        } elseif($partesURL[0] == "borrar") {
            $controllerVehiculo->BorrarVehiculo($partesURL[1]);
        }elseif($partesURL[0] == "login") {
            $controller->showLogin();
        }elseif($partesURL[0] == "logout") {
            $controller->logout();
        } elseif($partesURL[0] == "ingresar"){
            $controller->Ingresar();
        } 
    }

}