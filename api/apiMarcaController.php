<?php
require_once('./models/marca.model.php');
require_once("./api/JSONView.php");


class ApiMarcaController {
    private $marcasModel;
    private $view;

    public function __construct() {
        $this->marcasModel = new MarcaModel();
        $this->view = new JSONView();
    }

    public function getAll($params = null) {
        $marcas = $this->marcasModel->getAll();
        $this->view->response($marcas, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function GetById($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $marca = $this->marcasModel->getMarca($id);
        
        if ($marca) {
            $this->view->response($marca, 200); //implementar con fetch..
        } else {
            $this->view->response("No existe la marca con el id={$id}", 404);
        }

    }
}
