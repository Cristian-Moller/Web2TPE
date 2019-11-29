<?php
    require_once('libs/Smarty.class.php');
    require_once('./helpers/auth.helper.php');

    class LoginView{
    
        private $smarty;

        function __construct(){
            $smarty = $this->smarty = new Smarty();

        }

        public function showLogin($error = null) {
            $this->smarty->assign('BASE_URL', BASE_URL);
            $this->smarty->assign('titulo', 'Iniciar Sesión');
            $this->smarty->assign('error', $error);
            $this->smarty->display('templates/login.tpl');
        }

        function displayAll($usuarios, $logueado){
            $this->smarty->assign('BASE_URL', BASE_URL);
            $this->smarty->assign('usuarios', $usuarios);
            $this->smarty->assign('logueado', $logueado);
            $this->smarty->display('templates/usuarios.tpl');
            
        }

        function completeFormUsuario(){
            $this->smarty->assign('BASE_URL', BASE_URL);
            $this->smarty->display('templates/signup.tpl');
            
        }
}