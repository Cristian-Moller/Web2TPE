{include 'templates/header.tpl'}
<div class="container-fluid" id="vehiculo-container">
	<h3>
		Editar Vehículo
	</h3>
	<form action="submit" id="vehiculo-form" method="post" class="col-md-10" enctype="multipart/form-data">
		<div class="input-group-center">
			<input id="vehiculo-id" name="vehiculoId" type="hidden" value="{$id}">
			<input id="vehiculo-action" name="vehiculoAction" type="hidden" value="{$action}">
			<div class="input-group col-xs-6">
				Modelo: <input class="form-control" type="text" name="modelo" value="">
			</div>
			<div class="input-group col-xs-6">
				Combustible: <input class="form-control" type="text" name="combustible" value="">
			</div>
			<div class="input-group col-xs-6">
				Color: <input class="form-control" type="text" name="color" value="">
			</div>
			<div class="input-group col-xs-6">
				Precio: <input class="form-control" type="number" name="precio" value="">
			</div>
			<div class="input-group col-xs-6">
				Marca: <select class="form-control" name="marca" id="marca-select">

				</select>
			</div>
			<div class="input-group checkbox">
				<label class="checkbox-inline"><input type="checkbox" name="vendido" id="vendido">Vendido</label>

			</div>
			<h4>
				Imagenes
			</h4>
			<div id="image-preview">

			</div>

			<div>
				<input type="file" name="imagen[]" multiple id="imagenes">
			</div>
			<div class="align-center">
				<input type="submit" class="btn btn-success" value="Guardar" id="upload">
				<a class="btn btn-danger" href="../">Cancelar</a>
			</div>
		</div>
	</form>
</div>

{include 'templates/footer.tpl'}

<script src="js/vehiculos.js"></script>