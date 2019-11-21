{include 'templates/header.tpl'}
<div class="container-fluid">
  <div class="card" style="width:400px" id="detalle-vehiculo">
    <input id="vehiculo-id" name="vehiculoId" type="hidden" value="{$id}">
    <img class="card-img-top" id="vehiculo-image" alt="Card image">
    <div class="card-body">
      <h4 class="card-title" id="card-title"></h4>
      <ul class="list-group" id="card-details">
      
      </ul>
    </div>
  </div>
</div>
<script src="js/vehiculos.js"></script>

{include 'templates/footer.tpl'}