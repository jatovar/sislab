<table id="tabla1" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
  <thead>
  <tr>
    <th class="clave">Clave Alumno</th>
    <th class="nombre">Nombre Alumno</th>
    <th class="area">Area Lab</th>
    <th class="equipo">Espacio / Equipo</th>
    <th class="motivo">Motivo / Materia</th>
    <th class="nota">Nota</th>
    <th class="hora">Hora Entrada</th>
    <th class="tiempo">Tiempo</th>
  </thead>

    <tbody id="tbody" style="height:300px;max-height:400px">
      @foreach($entradas as $e)
        <tr id="{{$e->id_entrada}}" onclick="verOpciones(this)">
            <td class="clave">{{$e->alumno()->clave_unica}}</td>
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
    </tbody>
</table>
{!!$entradas->render()!!}
