@extends('layouts.admin')
	@section('content')

  <br>
      <h3 class= "h3">Becarios Registrados</h3>
  <br>

  <table id="tabla2" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
      <thead>
      <tr>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Carrera</th>

      </tr>
      </thead>

    @foreach($laboratorio->becarios()  as $labbec)
    <tr>
      <td>
        {{$labbec->clave_uaslp}}
      </td>
      <td>
        {{$labbec->becario()->alumno()->nombreCompleto()}}
      </td>
      <td>
        {{$labbec->becario()->alumno()->email}}
      </td>
      <td>
          {{$labbec->becario()->alumno()->carrera()->nombre_carrera}}
      </td>
    </tr>

    @endforeach

  </table>
  @endsection
