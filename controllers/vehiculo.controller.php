<?php

require_once('./models/vehiculo.model.php');
require_once('./views/vehiculo.view.php');
require_once('./models/marca.model.php');
require_once('./models/image.model.php');
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');

class VehiculoController{
    private $vehiculosModel;
    private $vehiculosView;
    private $marcasModel;
    private $authHelper;
    private $imagenModel;

    function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->vehiculosView = new VehiculoView();
        $this->marcasModel = new MarcaModel();
        $this->authHelper = new AuthHelper();
        $this->imagenModel = new ImageModel();
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
        $this->imagenModel->deleteImagenes($id);
        $this->vehiculosModel->BorrarVehiculo($id);
        header("Location: " . BASE_URL);
    }

    public function InsertarVehiculo(){
        $this->authHelper->redirectLoggedIn();
        $this->vehiculosView->ModificarVehiculoCSR(null, "EDIT");
    }

    public function GetVehiculo($id){
        $this->authHelper->redirectLoggedIn();
        $this->vehiculosView->ModificarVehiculoCSR($id, "EDIT");
    }
    
    public function VerDetalle($id){
        $admin = false;
        $isadmin = $this->authHelper->isAdmin();
        if($isadmin == "1"){
            $admin = true;
        }
        $this->vehiculosView->DisplayVehiculoCSR($id, "DETALLE", $admin);
    }
}

