<?php
require_once("router.php");
require_once("./api/apiVehiculoController.php");
require_once("./api/apiMarcaController.php");
require_once("./api/apiComentarioController.php");


// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
//$router->addRoute("vehiculos", "GET", "apiController", "getAll");
$router->addRoute("vehiculos/:ID", "GET", "ApiVehiculoController", "GetById");
$router->addRoute("vehiculos/edit/:ID", "GET", "ApiVehiculoController", "GetById");
$router->addRoute("vehiculos/edit/:ID", "POST", "ApiVehiculoController", "GuardarVehiculo");
$router->addRoute("vehiculos/new", "POST", "ApiVehiculoController", "GuardarVehiculo");
$router->addRoute("marcas", "GET", "ApiMarcaController", "GetAll");

$router->addRoute("comentarios/vehiculo/:ID", "GET", "ApiComentarioController", "getAll");
$router->addRoute("comentario/:ID", "GET", "ApiComentarioController", "GetComentarioById");
$router->addRoute("comentario/:ID", "DELETE", "ApiComentarioController", "deleteComentario");
$router->addRoute("comentario", "POST", "ApiComentarioController", "InsertarComentario");


// rutea
$router->route($resource, $method);
