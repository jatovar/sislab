@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/controlequipos.css') !!}
{!! Html::script('libs/bootstrap/js/mantenimientos.js') !!}


<div class="SubTitulo">Mantenimiento de Equipos</div>

<div id="Contenido">
</br>
<button type="button" class="btn btn-success btn-sm" id="btnMantenimientos">Nuevo</button>
</br>
</br>
  <div id="TablaMantenimientos">
  @include('laboratorio.controlEquipos.tabla_mantenimientos')
  </div>
</div>
@include('laboratorio.controlEquipos.modalMantenimiento')







@stop
