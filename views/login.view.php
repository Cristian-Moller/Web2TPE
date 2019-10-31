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
    }