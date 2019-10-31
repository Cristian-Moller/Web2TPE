<?php

require_once('./models/vehiculo.model.php');
require_once('./views/modificar.view.php');
require_once('./models/marca.model.php');

class ModificarController{
    private $vehiculosModel;
    private $modificarView;
    private $marcasModel;

    function __construct() {
        $this->vehiculosModel = new VehiculoModel();
        $this->modificarView = new ModificarView();
        $this->marcasModel = new MarcaModel();
    }

    public function EditarVehiculo(){
        $vendido = 0;
        if(isset($_POST['vendido'])){
            if($_POST['vendido'] == 'on'){
                $vendido = 1;
            }
        }
        $this->vehiculosModel->EditarVehiculo($_POST['id'],$_POST['modelo'],$_POST['combustible'],$_POST['color'],$_POST['precio'],$_POST['marca'],$vendido);
        header("Location: " . BASE_URL);
    }
    
    public function GetVehiculo($id){
        $vehiculo = $this->vehiculosModel->GetById($id);
        //var_dump($vehiculo);
        $marcas = $this->marcasModel->getAll();
        $this->modificarView->completeForm($vehiculo, $marcas);  
        
    }
}
