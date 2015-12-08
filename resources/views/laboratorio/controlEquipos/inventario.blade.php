@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/controlequipos.css') !!}
{!! Html::style('libs/bootstrap/css/inventario.css') !!}

{!! Html::script('libs/bootstrap/js/inventario.js') !!}


<div class="SubTitulo">Inventario de Equipos</div>


<div id="Contenido">
  <div class="Categorias">
  @foreach($laboratorio->categoriaslab() as $catLab)
  @if($catLab == $categoria)
       <a type="submit" style="background-color:#C4C4C4" href="{{URL::asset("controlEquipos/inventario")."/".$laboratorio->id_laboratorio."/".$catLab->categoria()->id_categoria_inv}}" class="btn  btn-default">{{$catLab->categoria()->nombre}}</a><span id="{{$catLab->categoria()->nombre}}" class="btn btn-success" >+</span>
  @else
  <a type="submit" href="{{URL::asset("controlEquipos/inventario")."/".$laboratorio->id_laboratorio."/".$catLab->categoria()->id_categoria_inv}}" class="btn  btn-default">{{$catLab->categoria()->nombre}}</a>
  @endif
  @endforeach
</div>
</br>

<table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
<thead>

  <tr><th>Código Lab</th>
    <th>Equipo</td>
    <th>Nombre</th>
    <th>Módelo</th>
    <th>No Inventario</th>
    <th>Ubicación</td>
    <th>Fecha de Introdución</th>
    <th>Detalle</th>
  </tr>
</thead>
<tbody>
  @if($categoria!=null)
    @foreach($categoria->detallesItems() as $di)
    @foreach($di->items() as $i)
    <tr>
      <td>{{$i->codigo_lab}}</td>
      <td>{{$i->detalle()->nombre}}</td>
      <td>{{$i->detalle()->modelo}}</td>
      <td>{{$i->codigo_uaslp_1}}</td>
      <td>{{$i->labArea()->area}}</td>
      @if($i->detalle()->clasificacion())

      <td>{{$i->detalle()->clasificacion()->nombre}}</td>

      @else
      <td></td>
      @endif
      <td>{{$i->fecha_registro}}</td>
     <td>
      <a  class="btn btn-link" href="{{URL::asset("controlEquipos/inventario/detalle")."/".$i->id_item}}">Ver Detalle</a>
     </td>
    </tr>
    @endforeach
  @endforeach
  @foreach($categoria->clasificaciones() as $clasificacion)
    @foreach($clasificacion->detallesItems() as $di)
      @foreach($di->items() as $i)
      @if($i->id_item_principal==null)
      <tr>
        <td>{{$i->codigo_lab}}</td>
        <td>{{$i->detalle()->clasificacion()->nombre}}</td>
        <td>


        {{$i->detalle()->nombre}}

        @foreach($i->item() as $si)
          </br>
          {{$si->detalle()->nombre}}
        @endforeach

        </td>
        <td>{{$i->detalle()->modelo}}
          @foreach($i->item() as $si)
            </br>
            {{$si->detalle()->modelo}}
          @endforeach

        </td>
        <td>{{$i->codigo_uaslp_1}}
        @foreach($i->item() as $si)
            </br>
            {{$si->codigo_uaslp_1}}
        @endforeach
        </td>

        <td>{{$i->labArea()->area}}</td>

        <td>{{$i->fecha_registro}}</td>
       <td>
        <a  class="btn btn-link" href="{{URL::asset("controlEquipos/inventarioDetalle")."/".$i->id_item}}">Ver Detalle</a>
       </td>

      </tr>
      @endif

      @endforeach
      @endforeach
    @endforeach
  @endif

  </tbody>

</table>
</div>
<div>
  @include('laboratorio.controlEquipos.ventanas.alta_computacional')
  @include('laboratorio.controlEquipos.ventanas.alta_muebles')
  @include('laboratorio.controlEquipos.ventanas.alta_material')
  @include('laboratorio.controlEquipos.ventanas.alta_herramienta')
</div>

@stop
