"use strict";

// event listeners
const vehiculoIdetail = document.querySelector("#vehiculo-id");
const action = document.querySelector("#vehiculo-action");

function getVehiculo() {
  getMarcas();
  if (vehiculoIdetail.value) {
    fetch(`/api/vehiculos/${vehiculoIdetail.value}`, {
      method: "GET",
      headers: { "Content-Type": "application/json" }
    })
      .then(response => response.json())
      .then(res => {
        switch (action.value) {
          case "DETALLE": {
            cargarDetalle(res);
            break;
          }
          case "EDIT": {
            cargarForm(res);
            break;
          }
        }
      })
      .catch(err => console.log(err));
  }
}

function cargarDetalle(res) {
  const list = document.querySelector("#card-details");
  const carousel = document.querySelector("#carousel-container");
  const title = document.querySelector("#card-title");
  const indicators = document.querySelector("#carousel-indicators");
  let count = 0;
  res.imagenes.forEach(imagen => {
    carousel.innerHTML += `
        <div class="item  ${res.imagenes[0] === imagen ? "active" : ""}">
          <img style="width:100%" src="${
            imagen ? imagen : "img/default/notfound.png"
          }" alt="${res.nombreMarca} ${res.nombre}">
        </div>`;
    indicators.innerHTML += `<li data-target="#myCarousel" data-slide-to="${count}" ${
      count == 0 ? 'class="active"' : ""
    }></li>`;
  });

  title.innerHTML = `${res.nombreMarca} - ${res.nombre}`;
  list.innerHTML = `<li class="list-group-item">Precio: ${res.precio}</li>
    <li class="list-group-item">Combustible: ${res.combustible}</li>
    <li class="list-group-item">Color: ${res.color}</li>
    ${
      res.vendido == 1 ? '<li class="list-group-item">Color: Vendido </li>' : ""
    }`;
}

function getMarcas() {
  if (action.value == "EDIT") {
    fetch(`/api/marcas`, {
      method: "GET",
      headers: { "Content-Type": "application/json" }
    })
      .then(response => response.json())
      .then(marcas => {
        cargarMarcas(marcas);
      })
      .catch(err => console.log(err));
  }
}

function cargarForm(res) {
  if (vehiculoIdetail.value) {
    cargarFormEdit(res);
  }
}

function cargarFormEdit(res) {
  document.querySelector("input[name=modelo]").value = res.nombre;
  document.querySelector("input[name=combustible]").value = res.combustible;
  document.querySelector("input[name=color]").value = res.color;
  document.querySelector("input[name=precio]").value = res.precio;
  document.querySelector("input[name=vendido]").checked =
    res.vendido == 1 ? true : false;
  document.getElementById("marca-select").value = res.id_marca_fk;
  res.imagenes.map(imagen => {
    document.querySelector(
      "#image-preview"
    ).innerHTML += `<img src="${imagen}" alt="preview" style="width:150px">`;
  });
}

function cargarMarcas(marcas) {
  const select = document.querySelector("#marca-select");
  let html = `<option value=''>Seleccione</option>`;
  marcas.forEach(marca => {
    html += `<option value='${marca.id}'> ${marca.nombre} </option>`;
  });

  select.innerHTML = html;
}

function readURL(input) {
  document.querySelector("#image-preview").innerHTML = "";
  for (let i = 0; i < input.files.length; i++) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#image-preview").append(
        $(`<img src="${e.target.result}" alt="preview" style="width:150px">`)
      );
    };

    reader.readAsDataURL(input.files[i]);
  }
}

$("#imagenes").change(function() {
  readURL(this);
});

//Post data
$("form#vehiculo-form").submit(function(e) {
  e.preventDefault(); //no recarga la pagina
  var formData = new FormData(this);

  if (document.querySelector("#imagenes").value === "") formData.delete('imagen[]');

  let url = !vehiculoIdetail.value
    ? "api/vehiculos/new"
    : `api/vehiculos/edit/${vehiculoIdetail.value}`;

  $.ajax({
    url: url,
    type: "POST",
    data: formData,
    success: function(data) {
      window.location.replace('/');
    },
    error: function(err) {
      window.location.replace('/');
    },
    cache: false,
    contentType: false,
    processData: false
  });
});

getVehiculo();
