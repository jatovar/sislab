@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')
{!! Html::script('libs/bootstrap/js/prestamos.js') !!}

<div class="SubTitulo">Prestamo de Equipos</div>

<div id="TablaPrestamos" >
  @include('laboratorio.controlAlumnos.tablaPrestamos')
</div>
<div class="text-center">
    <button type="button" class="btn btn-default btn-lg" id="boton">Nuevo Prestamo</button>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Prestamo de Equipo</h3>
        </div>

  <div class="modal-body">
    <form id="form" role="form">
    <div class="form-group" style="padding: 0px 0px;">
      <span class="glyphicons glyphicons-user"></span>
      <label for="alumno"><span class="glyphicon glyphicon-user"></span> Datos del solicitante </label>
      <select id="tipo_solicitante" name="tipo_solicitante" class="form-control">
        <option value="1">Alumno</option>
        <option value="0">Profesor</option>
      </select>
       </br>
      {!!Form::Text('cve_solicitante',null, array('id'=>'cve_solicitante','class' => 'clave form-control','placeholder' => 'Clave del solicitante', 'onkeyup'=>'dameNombre()'))!!}
       {!!Form::Text('nombre_solicitante',null, array('id'=>'nombre_solicitante','class' => 'nombre form-control','placeholder' => 'Nombre del solicitante','disabled' => 'disabled'))!!}
     </br>
    </br>


    <label for="area"><span class="glyphicon glyphicon-th-large"></span> Area </label><br>
    @foreach($laboratorio->areas() as $a)
      <div class="btn btn-default" id="{{$a->id_area}}" onclick="seleccionaArea(this)">  {{$a->area}} </div>
    @endforeach

     </br>
      </br>
      <label for="equipo"><span class="glyphicon glyphicon-tower"></span> Equipo</label></br>

       {!!Form::Text('codigo_lab',null, array('id'=>'codigo_lab','class' => 'clave form-control','placeholder' => 'Codigo equipo','onkeyup'=>'dameNombreEquipo()'))!!}
       {!!Form::Text('nombre_equipo',null, array('id'=>'nombre_equipo','class' => 'nombre form-control','placeholder' => 'Nombre equipo','disabled' => 'disabled'))!!}


       </br>

     </br>
    <label for="equipo"><span class="glyphicon glyphicon glyphicon-align-left"></span> Descripción</label></br>
     {!!Form::Textarea('descripcion',null, array('id'=>'descripcion', 'class' => 'form-control', 'placeholder' => 'Descripción', 'size' => '48x3'))!!}
     </br>
          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" onclick="altaPrestamo()" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>




@stop
