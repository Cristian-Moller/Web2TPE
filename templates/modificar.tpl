{include 'templates/header.tpl'}

<form action="guardar" method="post" class="col-md-10" enctype="multipart/form-data">
	<div class="input-group-center">
		<input type="number" name="id" value="{$vehiculo->id}" style="display:none;"/>
		<div class="input-group col-md-4">		
			Modelo: <input type="text" name="modelo" value="{$vehiculo->nombre}">
		</div>
		<div class="input-group col-md-4">
			Combustible: <input type="text" name="combustible" value="{$vehiculo->combustible}">
		</div>		
		<div class="input-group col-md-4">
			Color: <input type="text" name="color" value="{$vehiculo->color}">
		</div>			
		<div class="input-group col-md-4">
			Precio: <input type="number" name="precio" value="{$vehiculo->precio}">
		</div>		
		<div class="input-group col-md-4">
			Marca: <select name="marca">
				<option value='{$vehiculo->id_marca_fk}'>Seleccione</option>
					{foreach from=$marcas item=marca}
						{if $marca->id eq $vehiculo->id_marca_fk}
							<option value='{$marca->id}' selected> {$marca->nombre} </option>
						{else}
							<option value='{$marca->id}' selected> {$marca->nombre} </option>
						{/if}
					{/foreach}   
		</div>
		<div class="input-group col-md-4">
			</select>
				{if $vehiculo->vendido eq 1}
					Vendido: <input type="checkbox" name="vendido" id="vendido" checked>
				{else}	
					Vendido: <input type="checkbox" name="vendido" id="vendido">
				{/if}
		</div>
		<input type="file" name="imagen" id="">

		<input type="submit" value="Guardar">
		<button><a href="../">Cancelar</a></button>
	</div>
</form>

{include 'templates/footer.tpl'}