<!DOCTYPE html>
<html lang="es">

  <head>
    <title>UASLP</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />



    {!! Html::style('libs/bootstrap/css/bootstrap.css') !!}

    {!! Html::script('libs/bootstrap/js/jquery-2.1.4.js') !!}
    {!! Html::script('libs/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('libs/bootstrap/js/menu.js') !!}
    {!! Html::style('libs/bootstrap/css/principal.css') !!}
    {!! Html::script('libs/bootstrap/js/principal.js') !!}

    {!! Html::style('libs/bootstrap/css/modal.css') !!}
    {!! Html::script('libs/bootstrap/js/modal.js') !!}

    {!! Html::style('libs/css/alertas.css') !!}
    {!! Html::script('libs/js/alertas.js') !!}
  </head>
  <body  onclick="ocultar()" style=""  link = "white">
    <!--<div class="row" style="background-color:#F3F3F3;" >
    <div class="col col-md-10 col-md-offset-1"  >-->
  <div id="main-container" class="container">

      <div id="encabezado" class="container-fluid">
          <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6  cont-logos logo_uaslp">

              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6  cont-logos logo_ingenieria">

              </div>

              <div class="col-lg-8 col-md-6 col-sm-4 col-xs-4 fondo-encabezado">
                  <div class="row">
                      <div class="titulo_acei col-lg-9 col-md-12 col-sm-12 col-xs-12">
                      </div>
                  </div>
              </div>
          </div>
      </div>


    <div >
      @section('menu')
      @show
    </div>
    <div id="contenido_pagina"   class="contenedor-info">
      @section('contenido')
      @show
    </div>
    <div id="pie_pagina">

                    <div class="container-fluid texto-pie">
                        <div class="logo_uaslp2 hidden-xs">

                        </div>

                            Copyright © 2015 Universidad Autónoma de San Luis Potosí,<br>
                            Facultad de Ingeniería, Área de Computación e Informática <br> <br>
                            Webmaster

                    </div>
                </div>
    </div>
<!--  </div>
</div> -->
  </body>

</html>
