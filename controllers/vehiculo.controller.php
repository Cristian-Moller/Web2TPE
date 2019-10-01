<?php

require_once('./models/vehiculo.model.php');
require_once('./views/vehiculo.view.php');
require_once('./models/marca.model.php');

class VehiculoController{
    private $vehiculosModel;
    private $vehiculosView;
    private $marcasModel;

    function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->vehiculosView = new VehiculoView();
        $this->marcasModel = new MarcaModel();

    }


    function showVehiculos() {
        $vehiculos = $this->vehiculosModel->getAll();
        $marcas = $this->marcasModel->getAll();
        $this->vehiculosView->displayAll($vehiculos, $marcas);    
    }

    public function InsertarVehiculo(){
        $vendido = 0;
        if(isset($_POST['vendido'])){
            if($_POST['vendido'] == 'on'){
                $vendido = 1;
            }
        }
        $this->vehiculosModel->InsertarVehiculo($_POST['nombre'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'], $vendido);
        header("Location: " . BASE_URL);
    }

    public function VenderVehiculo($id){
        $this->vehiculosModel->VenderVehiculo($id);
        header("Location: " . BASE_URL);
    }

    public function BorrarVehiculo($id){
        $this->vehiculosModel->BorrarVehiculo($id);
        header("Location: " . BASE_URL);
    }
}

