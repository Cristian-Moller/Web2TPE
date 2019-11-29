<?php

require_once('./views/comentario.view.php');


class ComentarioController{
    private $comentarioView;

    function __construct() {
        $this->comentarioView = new ComentarioView();

    }

    public function VerComentarios($id){
        $this->comentarioView->DisplayComentarioCSR($id);
    }
}