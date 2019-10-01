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

}