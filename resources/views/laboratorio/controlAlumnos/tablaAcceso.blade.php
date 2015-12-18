<table id="tabla1" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
  <!--<thead>
  <tr>
    <th class="clave">Clave Alumno</th>
    <th class="nombre">Nombre Alumno</th>
    <th class="area">Area Lab</th>
    <th class="equipo">Espacio / Equipo</th>
    <th class="motivo">Motivo / Materia</th>
    <th class="nota">Nota</th>
    <th class="hora">Hora Entrada</th>
    <th class="tiempo">Tiempo</th>
  </thead>-->
  @foreach($entradas as $e)
  <table id="{{$e->id_entrada}}" class="Columnas" draggable="true" style="width:45%;">
      <tr>
        <td class="clave renglon"> Clave: {{$e->alumno()->clave_unica}}</td>
        <td class="nombre renglon"> Nombre: {{$e->alumno()->nombreCompleto()}}</td>
      </tr>
      <tr>
        <td class="area renglon"> Area: {{$e->labArea()->area}}</td>
        <td class="equipo renglon"> Equipo:
          @if($e->prestamoItem())
             {{$e->prestamoItem()->item()->codigo_lab}}
            @endif
        </td>
      </tr>
      <tr>
        <td class="hora renglon"> Hora: {{$e->hora_entrada}}</td>
        <td class="tiempo renglon">Timepo:</td>
      </tr>
      <!--<tr><td class="motivo renglon">
        @if($e->materia())
          Motivo: {{$e->materia()->nombre_materia}}
        @endif
      </td></tr>
      <tr><td class="nota renglon">Nota: {{$e->notas}}</td></tr>-->
  </table>
  @endforeach
    <!--<tbody id="tbody" style="height:300px;max-height:400px">
      @foreach($entradas as $e)
        <tr id="{{$e->id_entrada}}" class="Columnas" draggable="true" >
            <td class="clave"> Clave: {{$e->alumno()->clave_unica}}</td>
            <td class="nombre">{{$e->alumno()->nombreCompleto()}}</td>
            <td class="area">{{$e->labArea()->area}}</td>
            <td class="equipo">
              @if($e->prestamoItem())
                {{$e->prestamoItem()->item()->codigo_lab}}
              @endif</td>
            <td class="motivo">
              @if($e->materia())
                {{$e->materia()->nombre_materia}}
              @endif
            </td>
            <td class="nota">{{$e->notas}}</td>
            <td  class="hora">{{$e->hora_entrada}}</td>
            <td class="tiempo"></td>


        </tr>
      @endforeach
    </tbody>-->
</table>
<div id="Baja_Alumnos"  style=" margin-left:5px; background-color: whith; border: 1px dashed black; width: 90px; font-size:48px; text-align:center; padding:20px; vertical-align:middle;" class="glyphicon glyphicon-trash"></div>
<div style="width: 100%; background-color: white; height: 250px;"></div>
{!! Html::script('libs/js/Mover.js') !!}
{!!$entradas->render()!!}
