<?php
require_once('./controllers/vehiculo.controller.php');
require_once('./controllers/marca.controller.php');
require_once('./controllers/login.controller.php');

require_once('./controllers/comentario.controller.php');


$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("EDITAR", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/editar');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("MARCA", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/marcas');
define("USUARIOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/usuarios');

$controllerVehiculo = new VehiculoController();
$controllerMarca = new MarcaController();
//$controllerAPI = new VehiculoApiController();
$controllerComentario = new ComentarioController();
$logincontroller = new LoginController();
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

        }elseif($partesURL[0] == "editar") {
            $controllerVehiculo->GetVehiculo($partesURL[1]);
        } elseif($partesURL[0] == "borrar") {
            $controllerVehiculo->BorrarVehiculo($partesURL[1]);
        }elseif($partesURL[0] == "login") {
            $logincontroller->showLogin();
        }elseif($partesURL[0] == "logout") {
            $logincontroller->logout();

        }elseif($partesURL[0] == "signup"){
            $logincontroller->GetSignUp();
        }elseif($partesURL[0] == "GuardarUsuario") {
            $logincontroller->InsertarUsuario();

        }elseif($partesURL[0] == "ingresar"){
            $logincontroller->Ingresar();

        }elseif($partesURL[0] == "usuarios"){
            $logincontroller->showUsuarios();
        }elseif($partesURL[0] == "administrar"){
            $logincontroller->AdminUsuario($partesURL[1]);
        }elseif($partesURL[0] == "noadministrar"){
            $logincontroller->NoAdminUsuario($partesURL[1]);
        
        }elseif($partesURL[0] == "InsertarUsuario"){
            $logincontroller->InsertarMarca();
        }elseif($partesURL[0] == "BorrarUsuario"){
            $logincontroller->BorrarUsuario($partesURL[1]);

        } elseif($partesURL[0] == "marcas"){
            $controllerMarca->showMarcas();
        }elseif($partesURL[0] == "insertarMarca"){
            $controllerMarca->InsertarMarca();
        }elseif($partesURL[0] == "borrarMarca"){
            $controllerMarca->BorrarMarca($partesURL[1]);
        }elseif($partesURL[0] == "editarMarca" && $partesURL[1] != "guardarMarca"){
            $controllerMarca->GetMarca($partesURL[1]);
        }elseif($partesURL[0] == "editarMarca" && $partesURL[1] == "guardarMarca"){
            $controllerMarca->EditarMarca($partesURL[1]);

        }elseif($partesURL[0] == "detalle"){
            $controllerVehiculo->VerDetalle($partesURL[1]);

        }elseif($partesURL[0] == "opiniones"){
            $controllerComentario->VerComentarios($partesURL[1]);
        }
    }

}