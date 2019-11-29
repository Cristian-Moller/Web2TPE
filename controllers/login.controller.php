<?php

require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');
require_once('./views/login.view.php');


class LoginController{
    private $authHelper;
    private $loginModel;
    private $loginview;
    

    function __construct() {
        $this->authHelper = new AuthHelper();
        $this->loginModel = new LoginModel();
        $this->loginview = new LoginView();
    }

    public function showLogin() {
        $this->loginview->showLogin();
    }

    public function logout() {
        $this->authHelper->redirectLoggedIn();
        $this->authHelper->logout();
    }

    public function Ingresar(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->loginModel->getByUsername($username);
        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            $this->authHelper->login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->loginview->showLogin("Login incorrecto");
        }
    }

    function showUsuarios() {
        $logueado = $this->authHelper->redirectLoggedAdmin();
        $usuarios = $this->loginModel->getAll();
        $this->loginview->displayAll($usuarios, $logueado);
    }

    public function AdminUsuario($id){
        $this->loginModel->AdminUsuario($id, 1);
        header("Location: " . USUARIOS);
    }

    public function NoAdminUsuario($id){
        $this->loginModel->AdminUsuario($id, 0);
        header("Location: " . USUARIOS);
    }

    public function InsertarUsuario(){
        $this->loginModel->InsertarUsuario($_POST['email'],$_POST['password']);
        $user = $this->loginModel->getByUsername($_POST['email']);
        $this->authHelper->login($user);
        header("Location: " . BASE_URL);
    }

    public function GetSignUp(){
        $this->loginview->completeFormUsuario();  
    }

    public function BorrarUsuario($id){
        $this->loginModel->BorrarUsuario($id);
        header("Location: " . USUARIOS);
    }
    
}








