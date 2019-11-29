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
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

        {foreach from=$usuarios item=usuario}
        {if $usuario->admin eq "1"}

            <tr id='{$usuario->id}'></tr>
            <th scope='row'>{$usuario->id}</th>

            <td>{$usuario->email}</td>
            <td class='bt-icon'><a href='noadministrar/{$usuario->admin}'>NO Admin</a></td>
                            
            <td class='bt-icon'><a href='BorrarUsuario/{$usuario->id}'><i class='far fa-trash-alt'></i></a></td>
        
            {else}

            <tr id='{$usuario->id}'></tr>
            <th scope='row'>{$usuario->id}</th>

            <td>{$usuario->email}</td>
            <td class='bt-icon'><a href='administrar/{$usuario->id}'>Ser Admin</a></td>
                            
            <td class='bt-icon'><a href='BorrarUsuario/{$usuario->id}'><i class='far fa-trash-alt'></i></a></td>
        {/if}
        {/foreach}

        </tbody> 
    </table> 
        
</div>    
{include 'templates/footer.tpl'}