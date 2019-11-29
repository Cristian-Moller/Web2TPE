
<div class="row bootstrap snippets">
  <div class="col-md-6 col-md-offset-2 col-sm-12">
    <div class="comment-wrapper">
      <div class="panel panel-info">
        <div class="panel-heading">
          Que opina de este vehiculo?
        </div>

        <input id="usuario-id" name="usuarioId" type="hidden" value="{$id}">
        <input id="isadmin" name="isadmin" type="hidden" value="{$administrador}">


        <div class="panel-body">
            <textarea class="form-control" placeholder="Escriba su comentario..." rows="3" id="yo-opino"></textarea>
            <br>

            <li class="media">
              <div class="media-body width-100">
                <label for="">Puntuar:</label>
                <span class="text-muted pull-right">
                  <form>
                      <p class="clasificacion" id="estrellas">
                      <input id="radio1" type="radio" name="estrellas" value="5"><!--
                      --><label for="radio1">★</label><!--
                      --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                      --><label for="radio2">★</label><!--
                      --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                      --><label for="radio3">★</label><!--
                      --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                      --><label for="radio4">★</label><!--
                      --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                      --><label for="radio5">★</label>
                      </p>
                  </form>
                </span>
              </div>
            </li> 

            <button type="button" class="btn btn-info pull-right" id="bt-add">Post</button>
            <div class="clearfix"></div>
            <hr>

          <input id="id-vehiculo-fk" name="IdvehiculoFK" type="hidden" value="{$id}">
          <ul class="media-list" id="lista-comentarios">
            
            
            
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>






<script src="js/comentarios.js"></script>
