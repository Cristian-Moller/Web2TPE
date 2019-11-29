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

    function getAll(){
     
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM usuario');
    
        // ejecuto la consulta
        $ok = $query -> execute();
        if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    public function AdminUsuario($id, $admin){
        $sentencia =  $this->db->prepare("UPDATE usuario SET admin=? WHERE id=?");
        $sentencia->execute(array($admin, $id));
        $ok = $sentencia -> execute();
        if(!$ok) var_dump($sentencia->errorInfo());
    }

    public function InsertarUsuario($email,$password) {
        $hash = password_hash ($password , PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO usuario(email,password,admin) VALUES(?,?,0)");
        $query->execute(array($email,$hash));
    }
    
    public function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
    }

}