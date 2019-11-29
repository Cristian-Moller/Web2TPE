<?php
require_once('libs/Smarty.class.php');
require_once('./helpers/auth.helper.php');

class VehiculoView{
  
  private $smarty;

  function __construct(){
    $smarty = $this->smarty = new Smarty();
  }

    function displayAll($vehiculos, $marcas, $logueado){
      
      $this->smarty->assign('BASE_URL', BASE_URL);
      $this->smarty->assign('vehiculos', $vehiculos);
      $this->smarty->assign('marcas', $marcas);
      $this->smarty->assign('logueado', $logueado);
      $this->smarty->display('templates/tabla.tpl');
      
    }

    function completeForm($id){
      $this->smarty->assign('BASE_URL', BASE_URL );
      $this->smarty->assign('id', $id );
      $this->smarty->display('templates/modificar.tpl');

    }

    public function showError($msg) {
      echo $msg;
    }

    function display($vehiculo){
        var_dump($vehiculo);
    }

    function DisplayVehiculoCSR($id, $action, $isadmin){
      $smarty = new Smarty();
        $smarty->assign('titulo',"Detalle Vehiculo");
        $smarty->assign('id', $id);
        $smarty->assign('action', $action);
        $smarty->assign('administrador', $isadmin);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/vehiculodetail.tpl');

    }

    function ModificarVehiculoCSR($id, $action){
      $smarty = new Smarty();
        $smarty->assign('titulo',"Detalle Vehiculo");
        $smarty->assign('id', $id);
        $smarty->assign('action', $action);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/modificar.tpl');

    }
}

