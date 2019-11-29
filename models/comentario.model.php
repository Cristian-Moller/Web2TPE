<?php

class ComentarioModel {
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db_concesionaria;
                        charset=utf8','root','');
    }

    function getAll($id){     
        //preparo la consulta
        $query = $this->db->prepare('SELECT usuario.email, comentario.* 
                                    FROM comentario inner join usuario 
                                    on comentario.id_usuario_fk=usuario.id 
                                    where comentario.id_vehiculo_fk=?');

        // ejecuto la consulta
        $ok = $query -> execute(array($id));
        //if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function GetComentarioById($id){
        //preparo la consulta
        $query = $this->db->prepare("SELECT * FROM comentario WHERE id=?");
        $query->execute([$id]);
        $comentario = $query->fetch(PDO::FETCH_OBJ);
        return (array)$comentario;
    }

    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id=?");
        $sentencia->execute(array($id));
    }

    
    public function InsertarComentario($comentario,$puntuacion,$id_usuario_fk,$id_vehiculo_fk) {        
        $query = $this->db->prepare("INSERT INTO comentario(comentario,puntuacion,id_usuario_fk,id_vehiculo_fk) VALUES(?,?,?,?)");
        $query->execute(array($comentario,$puntuacion,$id_usuario_fk,$id_vehiculo_fk));
        return $this->db->lastInsertId();
    }
}