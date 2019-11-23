<?php
require_once("./models/vehiculo.model.php");
require_once('./models/marca.model.php');
require_once('./models/image.model.php');
require_once("./api/JSONView.php");
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');


class ApiVehiculoController {
    private $vehiculosModel;
    private $marcasModel;
    private $view;
    private $authHelper;
    private $imagesModel;

    public function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->marcasModel = new MarcaModel();
        $this->view = new JSONView();
        $this->authHelper = new AuthHelper();
        $this->imagesModel = new ImageModel();
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
        $imagenes = $this->imagesModel->GetById($id);
        $imagenes_url = array();
        $count = 0;
        foreach($imagenes as $imagen){
            $imagenes_url[$count] = $imagen->imagen_url;
            $count++;
        }
        if ($vehiculo) {
            $vehiculo['nombreMarca'] = $marca['nombre'];
            $vehiculo['imagenes'] = $imagenes_url;
            $this->view->response($vehiculo, 200); //implementar con fetch..
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }

    }

    public function GuardarVehiculo($params=null){
        if(isset($_POST)){
            $vendido = 0;
            if(isset($_POST['vendido'])){
                $vendido = 1;
            }
            if($_POST['vehiculoId']){
                $id = $this->vehiculosModel->EditarVehiculo($_POST['vehiculoId'],$_POST['modelo'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'],$vendido);
               
            } else {
                $id = $this->vehiculosModel->InsertarVehiculo($_POST['modelo'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'],$vendido);
            }
            if ($id) {
                $this->UploadImages($id);
                $this->view->response($id, 200); //implementar con fetch..
            } else {
                $this->view->response("Ocurrio un error al actualizar el vehiculo", 500);
            }
        }
        
        //header("Location: " . BASE_URL);
    }

    public function UploadImages($id)
    {
        $this->imagesModel->deleteImagenes($id);
        $this->imagesModel->GuardarImagen($id);
    }
}
