@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')
{!! Html::style('libs/bootstrap/css/multas.css') !!}
{!! Html::script('libs/bootstrap/js/multas.js') !!}
<div class="SubTitulo">Multas</div>
</br>
    <button type="button" class="btn btn-default btn-sm btn-success" id="btnNuevo">Nuevo</button>
    <button type="button" class="btn btn-default btn-sm btn-success" id="btnConsulta">Consulta</button>


<div style="height:100%;margin-top:20px" onload="cargar()" class="Alumnos" >

    <div id="Tabla">
      @include('laboratorio.multas.tablaMultas')
    </div>
    <div id="Opciones" class="Opciones text-center" ><a onclick="cerrarOpciones()">X</a></br>
      <div class="btn btn-danger" onclick="bajaRegistro()">Baja</div>
    </div>


</div>
@include('laboratorio.multas.alta_multa')

@stop
