<?php

class VehiculoModel {
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db_concesionaria;
                        charset=utf8','root','');
    }

    function getAll(){
     
        //preparo la consulta
        $query = $this->db->prepare('SELECT vehiculo.*, marca.nombre as marca FROM vehiculo inner join marca on vehiculo.id_marca_fk=marca.id');

        // ejecuto la consulta
        $ok = $query -> execute();
        if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);

        return $vehiculos;
    }

    public function InsertarVehiculo($nombre,$combustible,$color,$precio,$id_marca_fk,$vendido) {
        $query = $this->db->prepare("INSERT INTO vehiculo(nombre,combustible,color,precio,id_marca_fk,vendido) VALUES(?,?,?,?,?,?)");
        $query->execute(array($nombre,$combustible,$color,$precio,$id_marca_fk,$vendido));

    }

    public function VenderVehiculo($id){
        $sentencia =  $this->db->prepare("UPDATE vehiculo SET vendido=1 WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function BorrarVehiculo($id){
        $sentencia = $this->db->prepare("DELETE FROM vehiculo WHERE id=?");
        $sentencia->execute(array($id));
    }

}
	
