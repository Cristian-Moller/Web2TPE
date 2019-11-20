{include 'templates/header.tpl'}
<div>
        {if $logueado}
            <div class="alert alert-success" role="alert">
            {$logueado}
            </div>
        {/if}

    <table class="table table-striped" id="lista">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marca</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

        {foreach from=$marcas item=marca}
                <tr id='{$marca->id}'></tr>
                <th scope='row'>{$marca->id}</th>

                <td>{$marca->nombre}</td>
                                
                <td class='bt-icon'><a href='editarMarca/{$marca->id}'><i class="fas fa-pencil-alt"></i></a></td>
                
                <td class='bt-icon'><a href='borrarMarca/{$marca->id}'><i class='far fa-trash-alt'></i></a></td>
        {/foreach}

        </tbody> 
    </table> 
        <form action="insertarMarca" method="post">
            <input type="text" name="nombre" placeholder="Marca">
            
            <input type="submit" value="Insertar">
        </form>

    
</div>    
{include 'templates/footer.tpl'}