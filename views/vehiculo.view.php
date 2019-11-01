<?php
require_once('libs/Smarty.class.php');
require_once('./helpers/auth.helper.php');

class VehiculoView{
  
  private $smarty;

  function __construct(){
    $smarty = $this->smarty = new Smarty();
  }

    function displayAll($vehiculos, $marcas){
      
      $this->smarty->assign('BASE_URL', BASE_URL);
      $this->smarty->assign('vehiculos', $vehiculos);
      $this->smarty->assign('marcas', $marcas);
      $this->smarty->display('templates/tabla.tpl');
      
    }

    function display($vehiculo){
        var_dump($vehiculo);
    }
}

