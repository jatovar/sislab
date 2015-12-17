@extends('layouts.admin')
	@section('content')
  {!!Form::open(['id'=>'formlabCategorias','route'=>'labCategorias.store','method'=>'POST'])!!}
	<div class="text-center" style="">

		@include('alertas.alertas')
    <br>
        <h3 class= "h3">Registro Categorias</h3>
    <br>
  <table id="tabla2" class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
		<thead>
		<tr>
			<th>Categorias</th>
			<th>Descripcion</th>
			<th width="10%">Seleccionar</th>
		</tr>
		</thead>

		@foreach($categoria as $categoriaslab)
		<tr>
			<td>
				{{$categoriaslab->nombre}}
			</td>
			<td>
				{{$categoriaslab->descripcion}}
			</td>
			<td>
				<label>
				<input type="checkbox">
				</label>
			</td>
		</tr>
		@endforeach

  	</table>

		<button type="submit" class="btn btn-default">Alta</button>
	@endsection
