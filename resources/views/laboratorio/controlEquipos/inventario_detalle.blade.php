@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/inventario.css') !!}
{!! Html::script('libs/bootstrap/js/inventario.js') !!}


<div class="SubTitulo">Inventario de Equipos</div>

<div id="Contenido">
  @include('laboratorio.controlEquipos.tablasInventario.detalle');
</div>
@stop
