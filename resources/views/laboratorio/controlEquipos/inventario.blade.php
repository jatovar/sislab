@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/controlequipos.css') !!}
{!! Html::style('libs/bootstrap/css/inventario.css') !!}

{!! Html::script('libs/bootstrap/js/inventario.js') !!}


<div class="SubTitulo">Inventario de Equipos</div>


<div id="Contenido">
<table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
<thead>
  <tr><th>Código Lab</th>
    <th>Nombre</th>
    <th>Módelo</th>
    <th>No Inventario</th>
    <th>Área</td>
    <th>Fecha de Introdución</th>
    <th>Detalle</th>
  </tr>
</thead>
<tbody>
    @foreach($items as $i)
    <tr>
      <td>{{$i->codigo_lab}}</td>
      <td>{{$i->detalle()->nombre}}</td>
      <td>{{$i->detalle()->modelo}}</td>
      <td>{{$i->codigo_uaslp_1}}</td>
      <td>{{$i->labArea()->area}}</td>
      <td>{{$i->fecha_registro}}</td>
     <td>

      <a  class="btn btn-link" href="{{URL::asset("controlEquipos/inventario/detalle")."/".$i->id_item}}">Ver Detalle</a>
     </td>
    </tr>
    @endforeach

  </tbody>

</table>
<div class="container container-fluid text-center" style="padding:10px">
<a  class="btn btn-success" id="boton">Nuevo</a>
</div>
</div>
<div>
  @include('laboratorio.controlEquipos.tablasInventario.ventanaAlta')
</div>



@stop
