<?php

class MarcaModel {
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db_concesionaria;
                        charset=utf8','root','');
    }

    function getAll(){
     
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM marca');

        // ejecuto la consulta
        $ok = $query -> execute();
        if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    public function InsertarMarca($nombre) {
        $query = $this->db->prepare("INSERT INTO marca(nombre) VALUES(?)");
        $query->execute(array($nombre));
    }

    public function BorrarMarca($id){
        $sentencia = $this->db->prepare("DELETE FROM marca WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function EditarMarca($id,$nombre){
        $sentencia =  $this->db->prepare("UPDATE marca SET nombre=? WHERE id=?");
        $sentencia->execute(array($nombre,$id));
    }

    function getMarca($id){
     
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM marca WHERE id=?');

        // ejecuto la consulta
        $ok = $query -> execute(array($id));
        if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $marca = $query->fetchAll(PDO::FETCH_OBJ);
        if (isset($marca))
        { return $marca[0];}
        else return NULL;
    }

}