"use strict";

const vehiculoId = document.querySelector("#id-vehiculo-fk");//input-hidden
const isadmin = document.querySelector("#isadmin");

async function cargarComentario(){
    let div = document.querySelector("#lista-comentarios");
    let url = `http://localhost/api/comentarios/vehiculo/${vehiculoId.value}` ;
        
    try {
        let comentarios = await fetch(url)
            .then(response => response.json());
        $("#lista-comentarios li").remove(); 
        for (let elem of comentarios) {
            let itemLista = `
                <li class="media">
                    <div class="media-body">
                        <span class="text-muted pull-right">
                            <form>
                                <p class="clasificacion" id="clasificacion">
                                <input id="radio1" type="radio" name="estrellas" ${elem.puntuacion <= 5 ? 'checked' : ''} value="5"><!--
                                --><label for="radio1">★</label><!--
                                --><input id="radio2" type="radio" name="estrellas" ${elem.puntuacion <= 4 ? 'checked' : ''} value="4"><!--
                                --><label for="radio2">★</label><!--
                                --><input id="radio3" type="radio" name="estrellas" ${elem.puntuacion <= 3 ? 'checked' : ''} value="3"><!--
                                --><label for="radio3">★</label><!--
                                --><input id="radio4" type="radio" name="estrellas" ${elem.puntuacion <= 2 ? 'checked' : ''} value="2"><!--
                                --><label for="radio4">★</label><!--
                                --><input id="radio5" type="radio" name="estrellas" ${elem.puntuacion <= 1 ? 'checked' : ''} value="1"><!--
                                --><label for="radio5">★</label>
                                </p>
                            </form>
                        </span>
                        <strong class="text-success">${elem.email}</strong>
                        <p>
                            ${elem.comentario}
                        </p>
                        ${
                            isadmin.value == 1  ? `<button onclick="borrarComentario(${elem.id})" class="bt-icon"><i class="far fa-trash-alt"></i></button>` : ''
                        }
                       
                    </div>
                </li> `;
            $('#lista-comentarios').append(itemLista);
        }
    } catch(e) {
        div.innerHTML = "Fallo la Carga de Datos";
    }
}

cargarComentario();
document.querySelector('#bt-add').addEventListener('click', agregarComentario);

async function agregarComentario(){
    if(validar()){
        let comentario = document.getElementById("yo-opino");
        let estrellas = document.querySelector('input[type=radio]:checked');
        let vehiculo = vehiculoId.value;

        let comente = {
            "comentario": comentario.value,
            "puntuacion": estrellas.value,
            "id_vehiculo_fk": vehiculo,
        }
        let url = `/api/comentario`;
        
        try {
            let r = await fetch(url, {
                "method": "POST",
                "headers": {
                    "content-type": "application/json"
                },
                "body": JSON.stringify(comente)
            });
            let json = await r.json();
            comentario.value = "";
            estrellas.checked = false;
            cargarComentario();
        } catch(e) {
            div.innerHTML = "Fallo el Agregar";
        }
    }    
}

async function borrarComentario(ideliminar){
    let div = document.querySelector(".resultado");
    let url = `/api/comentario/${ideliminar}` ;
   
    try {
        let r = await fetch(url, {
            "method": "DELETE"
        });
        let json = await r.json();
        cargarComentario();
    } 
    catch(e) {
       console.log(e);
    }
}

function validar(){
    if( document.getElementById("yo-opino").value && 
    document.querySelector('input[type=radio]:checked').value){
        return true;
    }
    else{
        if(!document.getElementById("yo-opino").value){
            setInvalid($('#yo-opino'), document.getElementById("yo-opino"));
        }
        else{
            removeInvalid($('#yo-opino'), document.getElementById("yo-opino"));
        }
        if(!document.getElementById("estrellas").value){
            setInvalid($('#estrellas'), document.getElementById("estrellas"));
        }
        else{
            removeInvalid($('#estrellas'), document.getElementById("estrellas"));
        }
        
    }
}

function setInvalid(invalidElem, placeholderElem){
    invalidElem.addClass('invalid');
    placeholderElem.placeholder = "Debe ingresar un valor";
}
function removeInvalid(invalidElem, placeholderElem){
    invalidElem.removeClass('invalid');
    placeholderElem.placeholder = "";
}

