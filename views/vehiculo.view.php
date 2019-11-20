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

    function completeForm($vehiculo, $marcas){
      $this->smarty->assign('BASE_URL', BASE_URL );
      $this->smarty->assign('vehiculo', $vehiculo );
      $this->smarty->assign('marcas', $marcas);
      $this->smarty->display('templates/modificar.tpl');

    }

    public function showError($msg) {
      echo $msg;
    }

    function display($vehiculo){
        var_dump($vehiculo);
    }
}

