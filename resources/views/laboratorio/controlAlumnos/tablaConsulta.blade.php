<table id="tablaConsulta"  class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
  <thead>
  <tr>
    <th class="">Clave Alumno</th>
    <th class="">Nombre Alumno</th>
    <th class="">Area Lab</th>
    <th class="">Equipo</th>
    <th class="">Motivo / Materia</th>
    <th class="">Fecha</th>

    <th class="">Hora Entrada</th>
    <th class="">Tiempo</th>
  </thead>

    <tbody id="tbody">
      @foreach($entradas as $e)
        <tr id="{{$e->id_entrada}}" onclick="verOpciones(this)">
            <td class="">{{$e->alumno()->clave_unica}}</td>
            <td class="">{{$e->alumno()->nombreCompleto()}}</td>
            <td class="">{{$e->labArea()->area}}</td>
            <td class="">
              @if($e->prestamoItem())
                {{$e->prestamoItem()->item()->codigo_lab}}
              @endif</td>
            <td class="">
              @if($e->materia())
                {{$e->materia()->nombre_materia}}
              @endif
            </td>
            <td  class="">{{$e->fecha_entrada}}</td>

            <td  class="">{{$e->hora_entrada}}</td>
            <td class="">{{$e->duracion}}</td>


        </tr>
      @endforeach
    </tbody>

</table>
