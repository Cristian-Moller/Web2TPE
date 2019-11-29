<?php
require_once("./models/comentario.model.php");
require_once("./api/JSONView.php");
require_once('./models/login.model.php');
require_once('./helpers/auth.helper.php');


class ApiComentarioController {
    private $comentariosModel;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->comentariosModel = new ComentarioModel();
        $this->view = new JSONView();
        $this->authHelper = new AuthHelper();
    }

    
    public function getAll($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $comentarios = $this->comentariosModel->getAll($id);
        $this->view->response($comentarios, 200);
    }

    /**
     * Obtiene un comentario dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function GetComentarioById($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $comentario = $this->comentariosModel->GetComentarioById($id);
        
        if ($comentario) {
            $this->view->response($comentario, 200); 
        } else {
            $this->view->response("No existe comentario con el id={$id}", 404);
        }
     
    }

    public function deleteComentario($params = []) {
        $this->authHelper->redirectLoggedAdmin();

        $comentario_id = $params[':ID'];
        $comentario = $this->comentariosModel->GetComentarioById($comentario_id);

        if ($comentario) {
            $this->comentariosModel->BorrarComentario($comentario_id);
            $this->view->response("Comentario id=$comentario_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$comentario_id not found", 404);
    }


    public function InsertarComentario($params = []){
        
        $comentario = $this->getData();

        $comentario->id_usuario_fk = $this->authHelper->getLoggedUserId();

        $id = $this->comentariosModel->InsertarComentario($comentario->comentario, $comentario->puntuacion, $comentario->id_usuario_fk, $comentario->id_vehiculo_fk);
        $comentarioNuevo = $this->comentariosModel->GetComentarioById($id);
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo, 200);
        else 
            $this->view->response("Fallo al insertar el comentario", 500);
    }

    private function getData(){
        return json_decode(file_get_contents("php://input"));
    }
   
}
