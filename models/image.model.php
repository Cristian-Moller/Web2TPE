<?php

class ImageModel {
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db_concesionaria;
                        charset=utf8','root','');
    }

    function GetById($id){     
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM Imagen where id_vehiculo_fk=?');
        $ok = $query->execute(array($id));

        // ejecuto la consulta
        if(!$ok) var_dump($query->errorInfo());
    
        // obtengo la respuesta
        $images = $query->fetchAll(PDO::FETCH_OBJ);

        return (array)$images;
    }

    function GuardarImagen($id_vehiculo){     

        $query = $this->db->prepare('INSERT INTO Imagen (id_vehiculo_fk, imagen_url) VALUES (?,?)');
        foreach($_FILES["imagen"]["tmp_name"] as $key => $tmp_name)
        {
            $destino_final = "img/vehiculo/".uniqid().".png";
            move_uploaded_file($tmp_name, $destino_final);
            $query->execute([$id_vehiculo,$destino_final]);
        }
    }

    function deleteImagenes($id){
        var_dump($id);
        $imagenes = $this->GetById($id);
        if(count($imagenes) > 0){
            $sentencia = $this->db->prepare("DELETE FROM Imagen WHERE id=?");
            foreach($imagenes as $imagen){
                unlink($imagen->imagen_url);
                $sentencia->execute(array($imagen->Id));
            }
        }
    }
}
	
