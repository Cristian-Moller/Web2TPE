{include 'templates/header.tpl'}
<div class="container-fluid">
  <div class="card" style="width:400px" id="detalle-vehiculo">
    <input id="vehiculo-id" name="vehiculoId" type="hidden" value="{$id}">
    <input id="vehiculo-action" name="vehiculoAction" type="hidden" value="{$action}">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators" id="carousel-indicators">
        
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" id="carousel-container">

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="card-body">
      <h4 class="card-title" id="card-title"></h4>
      <ul class="list-group" id="card-details">

      </ul>
    </div>
  </div>
</div>
<script src="js/vehiculos.js"></script>
{include 'templates/footer.tpl'}