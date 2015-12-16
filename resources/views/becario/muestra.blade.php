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
        <th>Dar de baja</th>
      </tr>
      </thead>

    @foreach($laboratorio->becarios()  as $labbec)
		@if ($labbec->becario()->activo == true)
	    <tr id="{{"Fila".$labbec->clave_uaslp}}">
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
				<td class="text-center">
					<a class= "text-center" onclick="muestraConfirmacion('{{$labbec->clave_uaslp}}')"> <span class="glyphicon glyphicon-remove"></span></a>
				</td>
	    </tr>
		@endif
    @endforeach

  </table>
  @endsection
