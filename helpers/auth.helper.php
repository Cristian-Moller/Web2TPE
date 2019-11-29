<?php

class AuthHelper {
    public function __construct() {}

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->email;
        $_SESSION['USERADM'] = $user->admin;        
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }

    public function redirectLoggedIn() {
        session_start();

        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . URL_LOGIN);
            die();
        }       
    }

    public function isAdmin(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if (isset ($_SESSION['USERADM'])){
            return $_SESSION['USERADM'];
        } else {
            return null;
        } 
    }

    public function redirectLoggedAdmin() {
        session_start();

        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . URL_LOGIN);
            die();
        } else{
            if($_SESSION['USERADM'] != 1){
                header('Location: ' . BASE_URL);
                die();
            }
        }
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
            if (isset ($_SESSION['USERNAME'])){
                return $_SESSION['USERNAME'];
            } else {
                return null;
            } 
    }

    public function getLoggedUserId() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
            if (isset ($_SESSION['ID_USER'])){
                return $_SESSION['ID_USER'];
            } else {
                return null;
            } 
    }
}
