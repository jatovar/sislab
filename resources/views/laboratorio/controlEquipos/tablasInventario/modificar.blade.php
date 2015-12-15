
<div>
<table id="tablaDetalle" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">


  <tr>
    <th colspan="3"  rowspan="1">Control de Equipo</th>
  </tr>
  <tr>
    <th>Ubicación</th>
    <th>Código Lab</th>
    <th>Fecha de Introdución</th>
  </tr>
    <tr>
      <td>
        <select id="id_area" class="form-control">
          <option value="{{$i->id_area}}">{{$i->labArea()->area}}</option>
          @foreach($i->labArea()->laboratorio()->areas() as $area)
            @if($area->area != $i->labArea()->area)
              <option value="{{$area->id_area}}">{{$area->area}}</option>
            @endif
          @endforeach
      </select>
      </td>
      <td colspan="1">{!!Form::text('codigo_lab',$i->codigo_lab, array('id'=>'codigo_lab'))!!}</td>
      <td>{!! Form::date('fecha_registro',$i->fecha_registro, array('id'=>'fecha_registro'))!!}</td>

    </tr>
    <tr>
      <th>Número Inventario 1</th>
      <th>Número Inventario 2</th>
      <th>Número Serie</th>

    </tr>
    <tr>
    <td> {!! Form::text('codigo_uaslp_1',$i->codigo_uaslp_1,array('id'=>'codigo_uaslp_1'))!!}</td>
    <td> {!! Form::text('codigo_uaslp_2',$i->codigo_uaslp_2,array('id'=>'codigo_uaslp_2'))!!}</td>
    <td> {!! Form::text('num_serie',$i->num_serie,array('id'=>'num_serie'))!!}</td>
    </tr>
  <form id="formDatosItem">
    <tr>
    <th colspan="1">Nombre </th>
      <th colspan="1">Marca</th>
      <th colspan="1">Módelo</th>

    </tr>
    <tr >
      <td  colspan="1">{!! Form::textarea('nombre',$i->detalle()->nombre, ['size' => '35x2'])  !!}</td>
      <td  colspan="1">{!! Form::textarea('modelo',$i->detalle()->marca, ['size' => '35x2'])  !!}</td>
      <td colspan="1">{!!Form::textarea('uso',$i->detalle()->modelo, ['size' => '35x2'])!!}</td>
    </tr>
    <tr>
      <th colspan="1">Especificaciones Principales</th>
      <th colspan="1">Lista de accesorios y partes</th>
      <th colspan="1">Uso</th>
    </tr>

  <tr>

          <td colspan="1">{!!Form::textarea('caracteristicas',$i->detalle()->caracteristicas,['size' => '35x7'])!!}</td>
          <td colspan="1">{!!Form::textarea('accesorios_partes',$i->detalle()->accesorios_partes,['size' => '35x7'])!!}</td>
          <td colspan="1">{!!Form::textarea('accesorios_partes',$i->detalle()->uso,['size' => '35x7'])!!}</td>

  </tr>

      <tr>
        <th colspan="1">Documento</th>
        <th>Instructivo</th>
        <th>Foto</th>
      </tr>
  <tr>
      <td colspan="1">{!!Form::textarea('documento',$i->detalle()->documento,['size' => '35x2'])!!}</td>
      <td colspan="1">{!!Form::textarea('instructivo',$i->detalle()->instructivo,['size' => '35x2'])!!}</td>
      <td rowspan="6" colspan="2">{!! Html::image('img/video.jpg','alt', array('width' => 300 )) !!}
      </br></br><input id="nombre" name="nombre" class="form-control" type="button" value="Seleccionar Imagen"/>        </td>
  </tr>
  <tr>
    <th colspan="1">Materiales Consumibles</th>
    <th colspan="1">Puntos a Checar</th>
  </tr>
  <tr>
      <td colspan="1">{!!Form::textarea('materiales_consumibles',$i->detalle()->materiales_consumibles,['size' => '35x4'])!!}</td>
      <td colspan="1">{!!Form::textarea('puntos_checar',$i->detalle()->puntos_checar,['size' => '35x4'])!!}</td>
  </tr>

  <tr>
      <th>Inversión</th>
      <th>Nota especial</th>
  </tr>

<tr>

</tr>
<tr>
  <td colspan="1">{!!Form::text('instructivo',$i->detalle()->financiamiento)!!}</td>

  <td colspan="1">{!!Form::text('nota_especial',$i->detalle()->nota_especial)!!}</td>
</tr>

</form>
</table>
</div>
<div class="container container-fluid text-center" style="padding:10px">

<a  class="btn btn-success"  onclick="guardarCambiosEquipo({{$i->id_item}})">Guardar cambios</a>
</div>
