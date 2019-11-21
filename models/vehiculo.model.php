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

    public function InsertarVehiculo($nombre,$combustible,$color,$precio,$id_marca_fk,$vendido, $imagen = null) {
        $filepath = null;
        if ($imagen)
        $filepath = $this->moveFile($imagen);
        
        $query = $this->db->prepare("INSERT INTO vehiculo(nombre,combustible,color,precio,id_marca_fk,vendido, imagen_url) VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($nombre,$combustible,$color,$precio,$id_marca_fk,$vendido, $filepath));

    }

    //  mueve la imagen y retorna la ubicación
    private function moveFile($imagen) {
        $filepath = "img/vehiculo/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }

    public function VenderVehiculo($id){
        $sentencia =  $this->db->prepare("UPDATE vehiculo SET vendido=1 WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function EditarVehiculo($id,$nombre,$combustible,$color,$precio,$id_marca_fk,$vendido,$imagen = null){
        $filepath = null;
        if ($imagen)
        $filepath = $this->moveFile($imagen);
        var_dump($filepath);
        $sentencia =  $this->db->prepare("UPDATE vehiculo SET nombre=?, combustible=?, color=?, precio=?, id_marca_fk=?, vendido=?, imagen_url=? WHERE id=?");
        $sentencia->execute(array($nombre,$combustible,$color,$precio,$id_marca_fk,$vendido,$filepath,$id));
    }

    public function BorrarVehiculo($id){

        $vehiculo = $this->GetById($id);
        unlink($vehiculo->imagen_url);
        
        $sentencia = $this->db->prepare("DELETE FROM vehiculo WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function GetById($id){
          //preparo la consulta
          $query = $this->db->prepare("SELECT * FROM vehiculo WHERE id=?");
          $query->execute([$id]);
          $vehiculo = $query->fetch(PDO::FETCH_OBJ);
          return (array)$vehiculo;
    }
}
	
