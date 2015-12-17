@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/UDI4.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="img/UDI3.jpg" alt="Chania">
    </div>


  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div>
  <h1>BIENVENIDO</h1>
  </br>
  <div style="margin:30px;">
  <h3>Misión</h3>
      <p>La formación de profesionales del más alto nivel, capaces de desempeñarse en forma digna y eficaz en
      beneficio de la sociedad, que posean una base firme de conocimientos en su disciplina, con habilidades
      de pensamiento lógico, de autoactualización, de trabajo en equipo, proactivos, críticos y creativos,
      con dominio del idioma, capaces de identificar, plantear y resolver problemas de manejo de información y
      automatización de procesos mediante el uso, adaptación y/o desarrollo de tecnología informática y/o
      computacional en cualquier área de conocimiento o campo de aplicación.
      </p>
  </br>

  <h3>Objetivo</h3>
      <p>
      Este sistema tiene como objetivo principal el poder facilitar el trabajo de los laboratorios de cómputo del Área de Computación
      e Informática, teniendo un buen control de los equipos de cada laboratorio y así poder brindar un mejor servicio a los alumnos y
      profesores del área.
      </p>
  </br>
  <h3>Estrategias</h3>

  <ul>
      <li>Facilitar la petición de requerimientos por parte de los alumnos y profesores</li>
      <li>Llevar  el registro de los alumnos que ingresan a los laboratorios</li>
      <li>Inventario de los equipos de cada laboratorio</li>
      <li>Detección de alarmas cuando no se ha realizado un requerimiento</li>
  </ul>
  </br>

  <h3>Contacto</h3>
    <p><strong>Dr. Francisco Eduardo Martínez Pérez</strong> (Encargado de los laboratoros de cómputo UDICEI)</p>
    <p>Tel. <strong> (444)1468874</strong></p>
  </br>
</div>
</div>
@stop
