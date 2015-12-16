@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')

{!! Html::style('libs/bootstrap/css/controlequipos.css') !!}
{!! Html::script('libs/bootstrap/js/mantenimientos.js') !!}


<div class="SubTitulo">Mantenimiento de Equipos</div>

<div id="Contenido">
</br>
<button type="button" class="btn btn-success btn-sm" id="boton">Nuevo</button>
</br>
</br>
<table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
<thead>
  <tr><th>Actividad</th>
  <th>Area</th>
  <th>Codigo Equipo</th>
  <th>Nombre Equipo</th>
  <th>Tipo Responsable</th>
  <th>Nombre Responsable</td>
  <th>Descripción</th>
  <th>Fecha Realizado</th></tr>
</thead>
  <tbody>
    <?php
    $cont = 1;
    $total = 0;
    foreach ($mantenimientos as $mant => $m):
      $total = count($m->items());
      if($total > 0)
      {

        foreach($m->items() as $item => $i):
          echo "<tr>";
          if($cont==1)
          {
            echo "<td rowspan=\"".$total."\">".$m->actividad."</td>";
            echo "<td rowspan=\"".$total."\">".$m->labArea()->area."</td>";
          }
            echo"<td>".$i->item()->codigo_lab."</td>";
            echo"<td>".$i->item()->detalle()->nombre."</td>";

          if($cont == 1)
          {
            echo "<td rowspan=\"".$total."\">".$m->tipo_responsable."</td>";
            echo "<td rowspan=\"".$total."\">".$m->cve_responsable."</td>";
            echo "<td rowspan=\"".$total."\">".$m->descripcion."</td>";
            echo "<td rowspan=\"".$total."\">".$m->fecha_realizado."</td>";
          }
          $cont = $cont + 1;
          echo "</tr>";
        endforeach;
      }
      else {
        echo "<tr>";
          echo "<td rowspan=\"1\">".$m->actividad."</td>";
          echo "<td rowspan=\"1\">".$m->labArea()->area."</td>";
          echo "<td></td>";
            echo "<td></td>";
        echo "<td rowspan=\"1\">".$m->tipo_responsable."</td>";
        echo "<td rowspan=\"1\">".$m->cve_responsable."</td>";
        echo "<td rowspan=\"1\">".$m->descripcion."</td>";
        echo "<td rowspan=\"1\">".$m->fecha_realizado."</td>";
        echo "</tr>";

      }
    endforeach; ?>


  </tbody>

</table>

</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Control de Mantenimientos</h3>
        </div>

      <div class="modal-body">
        <form id="form" role="form">
          <div class="form-group">
            <label for="actividad"><span class="glyphicon glyphicon-asterisk"></span> Actividad </label>
            <textarea name="actividad" rows="1" cols="40" autofocus="true" type="text" class="form-control" id="actividad" placeholder="Describa la actividad que se realizo" onkeyup="dameActividades()"></textarea>
          </br>
            <label for="area"><span class="glyphicon glyphicon-th-large"></span> Area </label><br>
            @foreach($laboratorio->areas() as $a)
              <div class="btn btn-default" id="{{$a->id_area}}" onclick="seleccionaArea(this)">  {{$a->area}} </div>
            @endforeach
          </br>
        </br>

        <label for="equipo"><span class="glyphicon glyphicon-tower"></span> Equipo</label></br>
        {!!Form::Text('codigo_lab',null, array('id'=>'codigo_lab','class' => 'clave form-control','placeholder' => 'Codigo equipo','onkeyup'=>'dameNombreEquipo()'))!!}

        {!!Form::Text('nombre',null, array('id'=>'nombre_equipo','class' => 'nombre form-control','placeholder' => 'Nombre equipo','disabled' => 'disabled'))!!}
         </br>
          </br>
          </br>
          <label for="equipo"><span class="glyphicon glyphicon glyphicon-align-left"></span> Descripción</label></br>
            <textarea name="descripcion" rows="3" cols="40" type="text" class="form-control" id="descripcion" placeholder="" ></textarea>

          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" id="btnOk" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>




@stop
