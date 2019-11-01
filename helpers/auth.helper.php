<?php

class AuthHelper {
    public function __construct() {}

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->email;
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

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USERNAME'];
    }
}
