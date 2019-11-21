<?php
require_once("./models/vehiculo.model.php");
require_once('./models/marca.model.php');
require_once("./api/JSONView.php");
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');


class ApiVehiculoController {
    private $vehiculosModel;
    private $marcasModel;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->marcasModel = new MarcaModel();
        $this->view = new JSONView();
        $this->authHelper = new AuthHelper();
    }

    public function getAll($params = null) {
        $vehiculos = $this->vehiculosModel->getAll();
        $this->view->response($vehiculos, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function GetById($params = null) {
   //     $this->authHelper->redirectLoggedIn();

        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $vehiculo = $this->vehiculosModel->GetById($id);
        $marca = $this->marcasModel->getMarca($vehiculo['id_marca_fk']);
        
        if ($vehiculo) {
            $vehiculo['nombreMarca'] = $marca['nombre'];
            $this->view->response($vehiculo, 200); //implementar con fetch..
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }

    }
}
