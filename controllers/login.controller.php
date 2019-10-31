<?php

require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');
require_once('./views/login.view.php');


class LoginController{
    private $authHelper;
    private $loginModel;
    private $loginview;

    function __construct() {
        $this->loginModel = new LoginModel();
        $this->authHelper = new AuthHelper();


        $this->loginview = new LoginView();

    }

    public function showLogin() {
        $this->loginview->showLogin();
    }

    public function Ingresar(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->loginModel->getByUsername($username);

        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && ($password == $user->password)) {
            $this->authHelper->login($user);
            var_dump(BASE_URL);
            header('Location: ' . BASE_URL);
        } else {
            $this->loginview->showLogin("Login incorrecto");
        }
    }

}

