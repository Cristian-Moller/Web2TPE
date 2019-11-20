<?php
require_once('libs/Smarty.class.php');
require_once('./helpers/auth.helper.php');

class MarcaView{
  
  private $smarty;

  function __construct(){
    $smarty = $this->smarty = new Smarty();
  }

  function displayAll($marcas, $logueado){
      
    $this->smarty->assign('BASE_URL', BASE_URL);
    $this->smarty->assign('marcas', $marcas);
    $this->smarty->assign('logueado', $logueado);
    $this->smarty->display('templates/lista.tpl');
    
  }

  function completeFormMarca($marca, $logueado){
      
    $this->smarty->assign('BASE_URL', BASE_URL);
    $this->smarty->assign('marca', $marca);
    $this->smarty->assign('logueado', $logueado);
    $this->smarty->display('templates/modificarmarca.tpl');
    
  }
}