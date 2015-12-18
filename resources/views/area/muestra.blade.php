@extends('layouts.admin')
	@section('content')

  <br>
      <h3 class= "h3">Areas registradas</h3>
  <br>

  <table id="tabla2" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
      <thead>
      <tr>
        <th>Nombre Area</th>
        <th>Capacidad</th>
        <th>Salon</th>
      </tr>
      </thead>

			@foreach($laboratorio->areas() as $areas)
			<tr>
	      <td>
	        {{$areas->area}}
	      </td>
	      <td>
	        {{$areas->capacidad}}
	      </td>
	      <td>
	        {{$areas->salon}}
	      </td>


	    </tr>
			@endforeach




  </table>
  @endsection
