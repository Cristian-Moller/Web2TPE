<?php
require_once("./models/vehiculo.model.php");
require_once('./models/marca.model.php');
require_once("./api/JSONView.php");
require_once('./views/vehiculo.view.php');
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');


class VehiculoApiController {
    private $vehiculosModel;
    private $marcasModel;
    private $view;
    private $vehiculosView;
    private $authHelper;

    public function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->marcasModel = new MarcaModel();
        $this->view = new JSONView();
        $this->vehiculosView = new VehiculoView();
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
        $this->authHelper->redirectLoggedIn();

        // obtiene el parametro de la ruta
        $id = $params;
        
        $vehiculo = $this->vehiculosModel->GetById($id);
        $marcas = $this->marcasModel->getAll();

        
        if ($vehiculo) {
            //$this->view->response($vehiculo, 200); //implementar con fetch..
            $this->vehiculosView->completeForm($vehiculo, $marcas);  
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }

    }
}
