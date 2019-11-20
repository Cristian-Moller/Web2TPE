<?php

require_once('./models/vehiculo.model.php');
require_once('./views/vehiculo.view.php');
require_once('./models/marca.model.php');
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');

class VehiculoController{
    private $vehiculosModel;
    private $vehiculosView;
    private $marcasModel;
    private $authHelper;

    function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->vehiculosView = new VehiculoView();
        $this->marcasModel = new MarcaModel();
        $this->authHelper = new AuthHelper();
    }

    function showVehiculos() {
        $vehiculos = $this->vehiculosModel->getAll();
        $marcas = $this->marcasModel->getAll();
        $logueado = $this->authHelper->getLoggedUserName("Usuario Logueado");

        $this->vehiculosView->displayAll($vehiculos, $marcas, $logueado);    
    }

    public function VenderVehiculo($id){
        $this->authHelper->redirectLoggedIn();
        $this->vehiculosModel->VenderVehiculo($id);
        header("Location: " . BASE_URL);
    }

    public function BorrarVehiculo($id){
        $this->authHelper->redirectLoggedIn();
        $this->vehiculosModel->BorrarVehiculo($id);
        header("Location: " . BASE_URL);
    }

    public function InsertarVehiculo(){
        $this->authHelper->redirectLoggedIn();

        $vendido = 0;
        if(isset($_POST['vendido'])){
            if($_POST['vendido'] == 'on'){
                $vendido = 1;
            }
        }
       
      /*  $isValid = $this->validarFile();

        if($isValid){
            $this->vehiculosModel->InsertarVehiculo($_POST['nombre'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'], $vendido, $_FILES['imagen']);
        } else {
            $this->vehiculosView->showError("Formato no aceptado");
        }
        */
  
        // agarra el file
        var_dump($_FILES);
        if ($_FILES['imagen']['name']) {
            if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                
                $this->vehiculosModel->InsertarVehiculo($_POST['nombre'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'], $vendido, $_FILES['imagen']);
            }
            else {
                $this->vehiculosView->showError("Formato no aceptado");
                die();
            }
        }
        else {
            $this->vehiculosModel->InsertarVehiculo($_POST['nombre'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'], $vendido);
        }

        header("Location: " . BASE_URL);
    }

    public function EditarVehiculo(){
        $this->authHelper->redirectLoggedIn();

        $vendido = 0;
        if(isset($_POST['vendido'])){
            if($_POST['vendido'] == 'on'){
                $vendido = 1;
            }
        }
          // agarra el file
          
          if ($_FILES['imagen']['name']) {
            if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                $this->vehiculosModel->EditarVehiculo($_POST['id'],$_POST['modelo'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'],$vendido,$_FILES['imagen']);
            }
            else {
                $this->vehiculosView->showError("Formato no aceptado");
                die();
            }
        }
        else {
            $this->vehiculosModel->EditarVehiculo($_POST['id'],$_POST['modelo'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'],$vendido);
        }

        header("Location: " . BASE_URL);
    }
    
    
    public function GetVehiculo($id){
        $this->authHelper->redirectLoggedIn();

        $vehiculo = $this->vehiculosModel->GetById($id);
        $marcas = $this->marcasModel->getAll();
        
        $this->vehiculosView->completeForm($vehiculo, $marcas);  
        
    }
    

    //para seleccion multiple
  /*  public function validarFile(){

        $valido = false;
        if(count($_FILES['imagen']['type'])) {
            foreach ($_FILES['imagen']['type'] as $type) {

                if ($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png") {
                    $valido = true;
                }
                else {
                    return false;
                }
            }
        } else {
            $valido = true;
        }
        return $valido;
    }
    */
}

