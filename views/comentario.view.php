<?php
require_once('libs/Smarty.class.php');
require_once('./helpers/auth.helper.php');

class ComentarioView{
  
  private $smarty;

  function __construct(){
    $smarty = $this->smarty = new Smarty();
  }

  function displayAll($comentarios, $logueado){
    $this->smarty->assign('BASE_URL', BASE_URL);
    $this->smarty->assign('comentarios', $comentarios);
    $this->smarty->assign('logueado', $logueado);
    $this->smarty->display('templates/comentario.tpl');
    
  }

  function display($comentario){
      var_dump($comentario);
  }

  function DisplayComentarioCSR($id){
    $smarty = new Smarty();
    $smarty->assign('titulo',"Mostrar Comentario");
    $smarty->assign('id', $id);
    $smarty->display('templates/comentario_csr.tpl');
  }
    
    
}
