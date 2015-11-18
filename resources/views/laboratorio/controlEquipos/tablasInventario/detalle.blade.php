
<table id="tablaDetalle" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">

  <thead>
  <tr>
    <th colspan="3" rowspan="1">Control de Equipo</th>
  </tr>
</thead>
  <tbody>
  <tr>
    <th >Código Lab</th>

    <th>Número Inventario</th>
    <th>Fecha de Introdución</th>

  </tr>
    <tr>
      <td colspan="1">{{$i->codigo_lab}}</td>
      <td>{{$i->codigo_uaslp_1}}</td>
      <td>{{$i->fecha_registro}}</td>
    </tr>

    <tr>
    <th colspan="1">Nombre </th>
    <th colspan="1">Marca</th>
    <th colspan="1">Módelo</th>
    </tr>
    <tr >
        <td >{{$i->detalle()->nombre}}</td>
        <td colspan="1">{{$i->detalle()->marca}}</td>
        <td  colspan="1">{{$i->detalle()->modelo}}</td>
    </tr>

  <tr>
      <th colspan="1" >Especificaciones Principales</th>
      <th colspan="1">Lista de accesorios y partes</th>
      <th colspan="1">Uso</th>

  </tr>
  <tr>
          <td colspan="1">{{$i->detalle()->caracteristicas}}</td>
          <td colspan="1">{{$i->detalle()->accesorios_partes}}</td>
          <td colspan="1">{{$i->detalle()->uso}}</td>
  </tr>
  <tr>
    <th colspan="1">Documento</th>
    <th>Instructivo</th>
    <th>Foto</th>
  </tr>
  <tr>
    <td colspan="1">{{$i->detalle()->documento}}</td>
    <td colspan="1">{{$i->detalle()->instructivo}}</td>
    <td rowspan="6" colspan="1">{!! Html::image('img/video.jpg','alt', array('width' => 300 )) !!}</td>
  </tr>

  <tr>
    <th colspan="1">Materiales Consumibles</th>
    <th colspan="1">Puntos a Checar</th>
  </tr>

  <tr>

      <td colspan="1">{{$i->detalle()->materiales_consumibles}}</td>
      <td colspan="1">{{$i->detalle()->puntos_checar}}</td>
  </tr>

  <tr>
    <th>Inversión</th>
    <th>Nota especial</th>
  </tr>

  <tr>
    <td colspan="1">{{$i->detalle()->financiamiento}}</td>
    <td colspan="1">{{$i->detalle()->nota_especial}}</td>
  </tr>
</tbody>

</table>

<div class="container container-fluid text-center" style="padding:10px">

  <a  class="btn btn-success" onclick="modificarEquipo({{$i->id_item}})">Modificar</a>
</div>
