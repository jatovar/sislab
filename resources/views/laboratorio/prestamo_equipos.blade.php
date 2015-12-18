@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')
{!! Html::style('libs/bootstrap/css/prestamos.css') !!}
{!! Html::script('libs/bootstrap/js/prestamos.js') !!}

<div class="SubTitulo">Prestamo de Equipos</div>
</br>
<button type="button" class="btn btn-success btn-sm" id="btnPrestamo">Nuevo</button>
<button type="button" class="btn btn-success btn-sm" id="btnConsulta">Consulta</button>

</br>

<div id="TablaPrestamos" style="margin-top:20px" >
<!--Tabla de prestamos-->
@include('laboratorio.tablaPrestamos')
</div>
<!--Modal para realizar consultas-->
@include('laboratorio.modalConsulta')
<!--Modal para un nuevo prestamo-->
@include('laboratorio.modalPrestamo')





@stop
