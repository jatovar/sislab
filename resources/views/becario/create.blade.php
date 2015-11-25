@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'profesor.store','method'=>'POST'])!!}
    <br>
        <h3 class= "h3">Registro Becarios</h3>
    <br>

	<div class="form-group">
		{!!Form::label('clave','Clave UASLP:')!!}
		{!!Form::text('txtclve',null,['class'=>'form-control','placeholder'=>'Ingrese la clave unica: '])!!}
	</div>
	<div class="form-group">
		{!!Form::label('rpe','RPE :')!!}
		{!!Form::text('txtrpe',null,['class'=>'form-control','placeholder'=>'Ingrese el RPE'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('password','Nueva contraseña:')!!}
		{!!Form::password('txtpassword',['class'=>'form-control','placeholder'=>'Ingrese la contraseña'])!!}
	</div>
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
