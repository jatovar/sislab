<table id="tablaMultas" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
  <thead>
  <tr>
    <th class="clave">Clave Alumno</th>
    <th class="nombre">Nombre Alumno</th>
    <th class="area">Descripción Multa</th>
    <th class="area">Costo/Sanción</th>
    <th class="equipo">Fecha</th>
    <th class="motivo">Estado</th>
    <th class="nota">Fecha Pago/Reposición</th>
    <th class="tiempo">Clave quien registro</th>
    <th class="tiempo">Nombre quien registro</th>

  </thead>

    <tbody id="tbody" style="height:300px;max-height:400px">
      @foreach($multas as $m)
        <td>{{$m->cve_alumno}}</td>
        <td>{{$m->alumno()->nombreCompleto()}}</td>
        <td>{{$m->tipoMulta()->multa}}</td>
        <td>${{$m->tipoMulta()->costo}}</td>
        <td>{{$m->fecha}}</td>
        <td>{{$m->estado}}</td>
        <td>{{$m->fecha_pago}}</td>
        <td>{{$m->rpe_registro}}</td>

        <td>{{$m->nombreResponsable()}}</td>




      @endforeach

    </tbody>



</table>
