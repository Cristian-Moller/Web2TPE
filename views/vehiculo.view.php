<?php

class VehiculoView{
    
    function displayAll($vehiculos, $marcas){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <base href='.BASE_URL.' >
            <link rel="stylesheet" type="text/css" href="./css/estilos.css">
            <link rel="shortcut icon" href="./imagen/segunda imagen.jpg">

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

            <title>Concesionaria</title>
        </head>
        <body>
        <!--Encabezado-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"><img class="marcaimagen" src="./imagen/marca.jpg" alt="auto">Automotores Serenidad</a>
            </div>
        </nav>
        ';

        $html .= '<table class="table table-striped" id="tabla">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Combustible</th>
            <th scope="col">Color</th>
            <th scope="col">Precio</th>
            <th scope="col">Vender</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($vehiculos as $vehiculo){
            
            if($vehiculo->vendido == 1){
                $html .= "<tr id='{$vehiculo->id}'>
                <th scope='row'>{$vehiculo->id}</th>
                <td>{$vehiculo->marca}</td>
                <td>{$vehiculo->nombre}</td>
                <td>{$vehiculo->combustible}</td>
                <td>{$vehiculo->color}</td>
                <td>{$vehiculo->precio}</td>
                <td class='bt-icon'><a class='disabled'>Vendido</a></td>
                <td class='bt-icon'><a href='borrar/{$vehiculo->id}'><i class='far fa-trash-alt'></i></a></i></td>";
                //{$vehiculo->marca}: {$vehiculo->nombre}: {$vehiculo->combustible}: {$vehiculo->color}: {$vehiculo->precio} 
                //<a href='borrar/{$vehiculo->id}'>Borrar</a></li></strike>";
            }else{
                $html .= "<tr id='{$vehiculo->id}'>
                <th scope='row'>{$vehiculo->id}</th>
                <td>{$vehiculo->marca}</td>
                <td>{$vehiculo->nombre}</td>
                <td>{$vehiculo->combustible}</td>
                <td>{$vehiculo->color}</td>
                <td>{$vehiculo->precio}</td>
                <td class='bt-icon'><a href='vender/{$vehiculo->id}'>Vender</a></td>
                <td class='bt-icon'><a href='borrar/{$vehiculo->id}'><i class='far fa-trash-alt'></i></a></i></td>";
               // $html.= "<li> {$vehiculo->marca}: {$vehiculo->nombre}: {$vehiculo->combustible}: {$vehiculo->color}: {$vehiculo->precio} 
                //<a href='vender/{$vehiculo->id}'>Vender</a> <a href='borrar/{$vehiculo->id}'>Borrar</a></li>";
            }
        }
        $html .= "</tbody>
                  </table>  ";
 
      
        $html.='<form action="insertar" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="combustible"  placeholder="Combustible">
        <input type="text" name="color" placeholder="Color">
        <input type="number" name="precio" placeholder="Precio">
        <select name="marca">';
            $html.= "<option value='{$vehiculo->id_marca_fk}'>Seleccione</option>";
            foreach ($marcas as $marca){
                $html.= "<option value='{$marca->id}'> {$marca->nombre} </option>";
            }            
        $html.='</select>
        <input type="checkbox" name="vendido" id="vendido">
        <input type="submit" value="Insertar">
        </form>';

        $html.='
        <footer id="contact_form" class="page-footer font-small cyan darken-3">
      
          <!-- Footer Elements -->
          <div class="container">
      
            <!-- Grid row-->
            <div class="row">
      
              <!-- Grid column -->
              <div class="text-center col-md-12 col-xs-12 col-sm-12">
                <div class="iconos">
      
                  <!-- Facebook -->
                  <a class="fb-ic" target="_blank" href="https://es-la.facebook.com/">
                    <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                  </a>
                  <!-- Twitter -->
                  <a class="tw-ic" target="_blank" href="https://twitter.com/?lang=es">
                    <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                  </a>
                  <!--Instagram-->
                  <a class="ins-ic" target="_blank" href="https://www.instagram.com/?hl=es-la">
                    <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                  </a>
                </div>
              </div>
              <!-- Grid column -->
      
            </div>
            <!-- Grid row-->
      
          </div>
          <!-- Footer Elements -->
      
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href=""> Automotores SERENIDAD</a>
          </div>
          <!-- Copyright -->
      
        </footer>';
        
        $html.="</body>
            </html>";

        
       
        
        echo $html;
    }

    function display($vehiculo){
        var_dump($vehiculo);
    }

}
