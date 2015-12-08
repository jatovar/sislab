<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Curso</title>
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
  <body id="body" onclick="ocultar()" style=""  link = "white">
    <!--<div class="row" style="background-color:#F3F3F3;" >
    <div class="col col-md-10 col-md-offset-1"  >-->
  <div  class="Principal">
    <header id="Encabezado">
      <div class="Logo">
      <img src="/sislab/public/img/uaslplogo.png" style="height:70px" alt="" />
      </div>
      <div class="Titulo">
        Control Laboratorios
      </div>
      <div>
        <?php
        ?>
      </div>
    </header>
    <div id="menu" class="Menu">
      @section('menu')
      @show
    </div>
    <div class="container-fluid"   id="contenido">
      @section('contenido')
      @show
    </div>
    <div id="pie_pagina">

    </div>
    </div>
<!--  </div>
</div> -->
  </body>

</html>
