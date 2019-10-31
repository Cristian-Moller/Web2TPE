{include 'templates/header.tpl'}

<form action="guardar" method="post">
	<input type="number" name="id" value="{$vehiculo->id}" style="display:none;"/>
	Modelo: <input type="text" name="modelo" value="{$vehiculo->nombre}">
	Combustible: <input type="text" name="combustible" value="{$vehiculo->combustible}">
	Color: <input type="text" name="color" value="{$vehiculo->color}">
	Precio: <input type="number" name="precio" value="{$vehiculo->precio}">
	Marca: <select name="marca">
				<option value='{$vehiculo->id_marca_fk}'>Seleccione</option>
				{foreach from=$marcas item=marca}
					{if $marca->id eq $vehiculo->id_marca_fk}
						<option value='{$marca->id}' selected> {$marca->nombre} </option>
					 {else}
						<option value='{$marca->id}' selected> {$marca->nombre} </option>
					{/if}
				{/foreach}            
			</select>
		{if $vehiculo->vendido eq 1}
			Vendido: <input type="checkbox" name="vendido" id="vendido" checked>
		 {else}	
			Vendido: <input type="checkbox" name="vendido" id="vendido">
		{/if}
	<input type="submit" value="Guardar">
	<button><a href="../">Cancelar</a></button>
</form>

{include 'templates/footer.tpl'}