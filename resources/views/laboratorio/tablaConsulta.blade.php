<table id="tabla2" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
    <thead>
    <tr>
      <th>Clave Solicitante</th>
      <th>Tipo Solicitante</th>
      <th>Nombre Solicitante</th>
      <th>Codigo Equipo</th>
      <th>Nombre Equipo</th>
      <th>Clave de responsable</th>
      <th>Observacion</th>
      <th>Fecha Prestamo</th>

      <th>Fecha Entrega</th>

      </tr>

    </thead>
    <tbody>
      @foreach($prestamos as $p)
        <tr id="x" onclick="verOpciones(this)">
            <td>{{$p->cve_solicitante}}</td>
            <td>
              @if($p->tipo_solicitante==1)
                Alumno
              @else
                Profesor
              @endif
            </td>
            <td>{{$p->nombreSolicitante()}}</td>
            <td>  {{$p->item()->codigo_lab}}</td>

            @if($p->item()->detalle()->clasificacion()->nombre == 'Computadora')
                <td>{{$p->item()->detalle()->clasificacion()->nombre}}</td>
            @else
              <td>{{$p->item()->detalle()->nombre}}</td>
            @endif

            <td>{{$p->rpe_presto}}</td>
            <td>
              @if($p->observacion())
                {{$p->observacion()->observacion}}
              @endif
            </td>
            <td>{{$p->fecha_prestamo  }}</td>

            <td>{{$p->fecha_entrega}}</td>


        </tr>
      @endforeach
    </tbody>
  </table>
