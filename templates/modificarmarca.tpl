{include 'templates/header.tpl'}

    <form action="guardarMarca" method="post" class="col-md-10">
        <div class="input-group-center">
            <input type="number" name="id" value="{$marca->id}" style="display:none;"/>
            <div class="input-group col-md-4">		
                Marca: <input type="text" name="marca" value="{$marca->nombre}">
            </div>
    
            <input type="submit" value="Guardar">
            <button><a href="../">Cancelar</a></button>
        </div>
    </form>

{include 'templates/footer.tpl'}
