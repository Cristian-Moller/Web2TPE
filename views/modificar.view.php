<?php
require_once('libs/Smarty.class.php');

class ModificarView{
  
  private $smarty;
  function __construct(){
    $smarty = $this->smarty = new Smarty();
  }

    function completeForm($vehiculo, $marcas){
      $this->smarty->assign('EDIT', EDIT); 
      $this->smarty->assign('BASE_URL', BASE_URL );
      $this->smarty->assign('vehiculo', $vehiculo );
      $this->smarty->assign('marcas', $marcas);
      $this->smarty->display('templates/modificar.tpl');

    }
}

