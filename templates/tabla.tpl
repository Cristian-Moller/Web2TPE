{include 'templates/header.tpl'}
<div>
        {if $logueado}
            <div class="alert alert-success" role="alert">
            {$logueado}
            </div>
        {/if}

    <table class="table table-striped alignVertical" id="tabla">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Combustible</th>
            <th scope="col">Color</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Vender</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

        {foreach from=$vehiculos item=vehiculo}
            
        {if $vehiculo->vendido eq "1"}
           
                <tr id='{$vehiculo->id}'>
                <th scope='row'>{$vehiculo->id}</th>
                <td>{$vehiculo->marca}</td>
                <td>{$vehiculo->nombre}</td>
                <td>{$vehiculo->combustible}</td>
                <td>{$vehiculo->color}</td>
                <td>{$vehiculo->precio}</td>
                <td> <img onerror="this.onerror=null;this.src='img/default/notfound.png'" src="{$vehiculo->imagen_url}" alt="{$vehiculo->nombre}"> </td>

                <td class='bt-icon'><a class='disabled'>Vendido</a></td>
                
                <td class='bt-icon'><a href='editar/{$vehiculo->id}'><i class="fas fa-pencil-alt"></i></a></td>
                
                <td class='bt-icon'><a href='borrar/{$vehiculo->id}'><i class='far fa-trash-alt'></i></a></td>
                
            {else}
                <tr id='{$vehiculo->id}'>
                <th scope='row'>{$vehiculo->id}</th>
                <td>{$vehiculo->marca}</td>
                <td>{$vehiculo->nombre}</td>
                <td>{$vehiculo->combustible}</td>
                <td>{$vehiculo->color}</td>
                <td>{$vehiculo->precio}</td>
                <td> <img onerror="this.onerror=null;this.src='img/default/notfound.png'" src="{$vehiculo->imagen_url}" alt="{$vehiculo->nombre}"> </td>

                <td class='bt-icon'><a href='vender/{$vehiculo->id}'>Vender</a></td>
              
                <td class='bt-icon'><a href='editar/{$vehiculo->id}'><i class="fas fa-pencil-alt"></i></a></td>

                <td class='bt-icon'><a href='borrar/{$vehiculo->id}'><i class='far fa-trash-alt'></i></a></i></td>
                
            {/if}
        {/foreach}

        </tbody>
    </table> 
            <form action="insertar" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre" placeholder="Modelo">
                <input type="text" name="combustible"  placeholder="Combustible">
                <input type="text" name="color" placeholder="Color">
                <input type="number" name="precio" placeholder="Precio">
                <select name="marca">
                    <option value='{$vehiculo->id_marca_fk}'>Seleccione</option>
                    {foreach from=$marcas item=marca}
                        <option value='{$marca->id}'> {$marca->nombre} </option>
                    {/foreach}            
                </select>
                <input type="checkbox" name="vendido" id="vendido">
                <input type="file" name="imagen" id="">
                <input type="submit" value="Insertar">
            </form>
            <input type="submit" value="Marcas" 
            onclick="window.location='marcas';" /> 
    
</div>    
{include 'templates/footer.tpl'}