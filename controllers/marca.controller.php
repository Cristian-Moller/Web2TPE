<?php

require_once('./views/marca.view.php');
require_once('./models/marca.model.php');
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');

class MarcaController{
    private $marcaModel;
    private $marcasView;
    private $authHelper;

    function __construct() {

        $this->marcasView = new MarcaView();
        $this->marcasModel = new MarcaModel();
        $this->authHelper = new AuthHelper();
    }

    function showMarcas() {
        $marcas = $this->marcasModel->getAll();

        $logueado = $this->authHelper->redirectLoggedIn();

        $this->marcasView->displayAll($marcas, $logueado);    
    }

    public function InsertarMarca(){
        $this->authHelper->redirectLoggedIn();

        $this->marcasModel->Insertarmarca($_POST['nombre']);
        header("Location: " . MARCA);
    }

    public function BorrarMarca($id){
        $this->authHelper->redirectLoggedIn();
        $this->marcasModel->BorrarMarca($id);
        header("Location: " . MARCA);
    }

    public function GetMarca($id){
        $logueado = $this->authHelper->redirectLoggedIn();

        $marcas = $this->marcasModel->getMarca($id);
        
        $this->marcasView->completeFormMarca($marcas, $logueado);  
        
    }

    public function EditarMarca(){
        $this->authHelper->redirectLoggedIn();
        $this->marcasModel->EditarMarca($_POST['id'],$_POST['marca']);
        header("Location: " . MARCA);
    }
}