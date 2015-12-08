@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')
{!! Html::style('libs/bootstrap/css/acceso_alumnos.css') !!}
{!! Html::script('libs/bootstrap/js/acceso_alumnos.js') !!}

<div class="SubTitulo">Acceso a Alumnos</div>
<div >
    <button type="button" class="btn btn-default btn-sm btn-success" id="boton">Nuevo</button>
    <button type="button" class="btn btn-default btn-sm btn-success" id="btnConsulta">Consulta</button>

</div>
<div style="height:100%;margin-top:20px" onload="cargar()" class="Alumnos" >

    <div id="Tabla">
      @include('laboratorio.controlAlumnos.tablaAcceso')
    </div>

    <div id="Opciones" class="Opciones text-center" ><a onclick="cerrarOpciones()"> X</a></br>
      <div class="btn btn-success">Prestamo</div>
      <div class="btn btn-success">Revisar Práctica</div>
      <div class="btn btn-success">Multa</div>
      <div class="btn btn-danger" onclick="bajaRegistro()">Baja</div>
    </div>


</div>
@include('laboratorio.controlAlumnos.modalConsulta')


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Acceso de alumnos</h3>
        </div>

      <div class="modal-body">
        <form id="form" role="form">
          <div class="form-group" style="padding: 0px 0px;">

      <span class="glyphicons glyphicons-user"></span>
      <label for="alumno"><span class="glyphicon glyphicon-user"></span> Datos del alumno </label>
       </br>
      {!!Form::Text('cve_alumno',null, array('id'=>'clave_alumno','class' => 'clave form-control','placeholder' => 'Clave alumno', 'onkeyup'=>'dameNombreAlumno()'))!!}
       {!!Form::Text('nombre',null, array('id'=>'nombre_alumno','class' => 'nombre form-control','placeholder' => 'Nombre alumno','disabled' => 'disabled'))!!}
     </br>
    </br>

    <label for="area"><span class="glyphicon glyphicon-th-large"></span> Area </label><br>
    @foreach($laboratorio->areas() as $a)
      <div class="btn btn-default" id="{{$a->id_area}}" onclick="seleccionaArea(this)">  {{$a->area}} </div>
    @endforeach

     </br>
      </br>
      <label for="equipo"><span class="glyphicon glyphicon-tower"></span> Equipo</label></br>

       {!!Form::Text('codigo_lab',null, array('list'=>'equipos','id'=>'codigo_lab','class' => 'clave form-control','placeholder' => 'Codigo equipo','onkeyup'=>'dameNombreEquipo()','onchange'=>'dameNombreEquipo()'))!!}

       <datalist id="equipos">

         @foreach($laboratorio->areas() as $a)
          @foreach($a->items() as $i)
          <option >{{$i->codigo_lab}}</option>
          @endforeach
         @endforeach

       </datalist>
       {!!Form::Text('nombre',null, array('id'=>'nombre_equipo','class' => 'nombre form-control','placeholder' => 'Nombre equipo','disabled' => 'disabled'))!!}


       </br>
       </br>

       {!!Form::Label('Materia')!!}
       </br>
       <select name="cve_materia" id="cve_materia" class="form-control">
         @foreach($materias as $m)
         {
           <option value="{{$m->clave_materia}}">{{$m->nombre_materia}}</option>
         }
         @endforeach
      <select>

     </br>
     </br>
     <label for="equipo"><span class="glyphicon glyphicon glyphicon-align-left"></span> Nota</label></br>
     {!!Form::Textarea('nota',null, array('id'=>"nota",'class' => 'form-control', 'placeholder' => 'Nota especial', 'size' => '48x2'))!!}
     </br>
          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary" onclick="altaRegistro()" >OK</button></div>

    </div>
  </div>
</div>

@stop
