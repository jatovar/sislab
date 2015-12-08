@extends('layouts.admin')
	@section('content')
	{!!Form::open(['id'=>'formbecario','route'=>'becario.store','method'=>'POST'])!!}
	<div class="text-center" style="">

		@include('alertas.alertas')
    <br>
        <h3 class= "h3">Registro Becarios</h3>
    <br>

		<div class="text-left" style="width: 300px; margin: auto;">


			<div class="form-group ">
				{!!Form::label('lbclave','Clave UASLP:')!!}
				{!!Form::text('cve_uaslp',null,['id'=>'cve_uaslp','class'=>'form-control','placeholder'=>'Ingrese la clave unica: '])!!}
			</div>
			<div class="form-group">
				{!!Form::label('lbrpe','RPE :')!!}
				{!!Form::text('rpe',null,['id'=>'rpe','class'=>'form-control','placeholder'=>'Ingrese el RPE'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('password','Nueva contraseña:')!!}
				{!!Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Ingrese la contraseña'])!!}

			</div>
	</div>
			{!!Form::button('Registrar',['class'=>'btn btn-primary' ,'onclick'=>'registrarBecario()'])!!}
			{!!Form::close()!!}


	</div>
	@endsection
