@extends('layouts.admin')
	@section('content')
  {!!Form::open(['id'=>'formlabCategorias','route'=>'labCategorias.store','method'=>'POST'])!!}
	<div class="text-center" style="">

		@include('alertas.alertas')
    <br>
        <h3 class= "h3">Registro Categorias</h3>
    <br>
	@endsection
