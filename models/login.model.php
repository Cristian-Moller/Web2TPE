<?php

class LoginModel {
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db_concesionaria;
                        charset=utf8','root','');
    }

    public function getByUsername($username){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
	
