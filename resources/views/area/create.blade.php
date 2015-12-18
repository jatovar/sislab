@extends('layouts.admin')
	@section('content')
	{!!Form::open(['id'=>'formArea','route'=>'area.store','method'=>'POST'])!!}
	<div class="text-center" style="">

		@include('alertas.alertas')
    <br>
        <h3 class= "h3">Registro Areas</h3>
    <br>

		<div class="text-left" style="width: 300px; margin: auto;">


						<div class="form-group ">
							{!!Form::label('lbnombre','Nombre del area de laboratorio :')!!}
							{!!Form::text('area',null,['id'=>'area','class'=>'form-control','placeholder'=>'Ingrese el area'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('lbcapacidad','Capacidad :')!!}
							{!!Form::text('capacidad',null,['id'=>'capacidad','class'=>'form-control','placeholder'=>'Ingrese la capcacidad'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('lbsalon','Salon : ')!!}
							{!!Form::text('salon',null,['id'=>'salon','class'=>'form-control','placeholder'=>'Ingrese el salon'])!!}
						</div>
			</div>
			{!!Form::button('Registrar',['class'=>'btn btn-primary' ,'onclick'=>'registrarArea()'])!!}
			{!!Form::close()!!}


	</div>
	@endsection
