@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/controlequipos.css') !!}
{!! Html::style('libs/bootstrap/css/inventario.css') !!}
{!! Html::script('libs/bootstrap/js/inventario.js') !!}



<div class="SubTitulo">Inventario de Equipos</div>

<div>
<table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">

<thead>
  <tr>
    <th colspan="3" rowspan="1">Alta de Equipo</th>
  </tr>
</thead>
<tbody>
  <tr>
    <form id="formCodigos">

    <th >Código Lab</th>
    <th>Número Inventario</th>
    <th>Fecha de Introdución</th>

  </tr>
    <tr>
      <td colspan="1">
        <select name="id_area" class="form-control" >
          @foreach($laboratorio->areas() as $a)
            <option value="{{$a->id_area}}">{!!$a->area!!}</option>
          @endforeach

       </select>

        {!!Form::text('codigo_lab')!!}</td>

      <td> {!! Form::text('codigo_uaslp_1')!!}</td>
      <td>{!! Form::text('fecha_registro')!!}</td>


    </tr>
    <tr>
      <th >Número serie</th>
      <th>Dirección address</th>
      <th>Marca</th>
    </tr>
    <tr>
      <td colspan="1">
        {!!Form::text('num_serie')!!}</td>
      <td> {!! Form::text('mac')!!}</td>
    </form>
    <form id="formDetalle">
      <td>{!! Form::text('marca')!!}</td>
    </tr>
    <tr>
    <form id="formDetalle">
    <th colspan="1">Nombre </th>
    <th colspan="1">Módelo</th>
      <th colspan="1">Uso</th>
    </tr>
    <tr >
      <td  colspan="1">{!! Form::textarea('nombre',null,array('class'=>'form-control','size' => '35x2'))!!}</td>
          <td  colspan="1">{!! Form::textarea('modelo',null,array('class'=>'form-control','size' => '35x2'))!!}</td>

            <td colspan="1">{!!Form::textarea('uso',null,array('class'=>'form-control','size' => '35x2'))!!}</td>

    </tr>

    <tr>
      <th colspan="1" >Especificaciones Principales</th>
      <th colspan="1">Lista de accesorios y partes</th>
      <th colspan="1">Foto</th>


    </tr>

  <tr>

          <td colspan="1">{!!Form::textarea('caracteristicas',null,array('class'=>'form-control','size' => '35x7'))!!}</td>
          <td colspan="1">{!!Form::textarea('accesorios_partes',null,array('class'=>'form-control','size' => '35x7'))!!}</td>
          <td rowspan="10" colspan="2">{!! Html::image('img/0.png','alt', array('width' => 300 )) !!}
          </br></br><input id="nombre" name="nombre"  type="button" value="Seleccionar Imagen"/>
          </td>
  </tr>

  <tr>
    <th colspan="1">Materiales Consumibles</th>
    <th colspan="1">Puntos a Checar</th>


  </tr>

  <tr>

      <td colspan="1">{!!Form::textarea('materiales_consumibles',null,array('class'=>'form-control','size' => '35x5'))!!}</td>
      <td colspan="1">{!!Form::textarea('puntos_checar',null,array('class'=>'form-control','size' => '35x5'))!!}</td>

  </tr>
<tr>
  <th colspan="1">Documento</th>
  <th>Instructivo</th>
</tr>
    <tr>
      <td colspan="1">{!!Form::textarea('documento',null,array('class'=>'form-control','size' => '35x3'))!!}</td>
      <td colspan="1">{!!Form::textarea('instructivo',null,array('class'=>'form-control','size' => '35x3'))!!}</td>
    </tr>
    <tr>

        <th>Inversión</th>

          <th>Nota especial</th>
    </tr>

<tr>

</tr>
<tr>
  <td colspan="1">{!!Form::select('fininciamiento',array('uaslp'=>'UASLP','donado'=>'Donado'),['class'=>'form-control'])!!}</td>

  <td colspan="1">{!!Form::text('nota_especial')!!}</td>
</tr>
</form>

</tbody>
</table>
</div>
<div class="container container-fluid text-center" style="padding:10px">

<a  class="btn btn-success" onclick="guardarEquipo()">Guardar</a>
</div>
@stop
