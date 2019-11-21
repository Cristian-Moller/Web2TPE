"use strict";

// event listeners
const card = document.querySelector("#detalle-vehiculo");
const vehiculoId = document.querySelector("#vehiculo-id");
const list = document.querySelector("#card-details");
const image = document.querySelector("#vehiculo-image");
const title = document.querySelector("#card-title");

const test = document.querySelector("#test");

async function getVehiculo() {
  fetch(`/api/vehiculos/${vehiculoId.value}`, {
    method: "GET",
    headers: { "Content-Type": "application/json" }
  })
    .then(response => response.json())
    .then(res => {
        console.log(res);
        image.src = res.imagen_url ? res.imagen_url  : 'img/default/notfound.png';
        title.innerHTML = `${res.nombreMarca} - ${res.nombre}`
        list.innerHTML = `<li class="list-group-item">Precio: ${res.precio}</li>
        <li class="list-group-item">Combustible: ${res.combustible}</li>
        <li class="list-group-item">Color: ${res.color}</li>
        ${res.vendido == 1 ? '<li class="list-group-item">Color: Vendido </li>' : ''}`

    })
    .catch(err => console.log(err));
}

getVehiculo();
