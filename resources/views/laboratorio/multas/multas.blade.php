@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')
{!! Html::style('libs/bootstrap/css/acceso_multas.css') !!}
{!! Html::script('libs/bootstrap/js/acceso_multas.js') !!}
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



<div id="ModalMulta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Multas</h3>
        </div>

      <div class="modal-body">
      <form id="form1" role="form">
          <div class="form-group" style="padding: 0px 0px;">

      <label for="alumno"><span class="glyphicon glyphicon-user"></span> Datos del alumno </label>
       </br>
      {!!Form::Text('cve_alumno',null, array('id'=>'clave_alumno','class' => 'clave form-control','placeholder' => 'Clave alumno', 'onkeyup'=>'dameNombreAlumno()'))!!}
       {!!Form::Text('nombre',null, array('id'=>'nombre_alumno','class' => 'nombre form-control','placeholder' => 'Nombre alumno','disabled' => 'disabled'))!!}
     </br>
    </br>

     </br>
      </br>
      <label for="multa"><span class="glyphicon glyphicon-tower"></span> Tipo Multa</label></br>

       {!!Form::Text('id_multa',null, array('list'=>'multas','id'=>'id_multa','class' => 'clave form-control','placeholder' => 'Codigo equipo','onkeyup'=>'dameNombreEquipo()','onchange'=>'dameNombreEquipo()'))!!}

       <datalist id="multas">
         @foreach($laboratorio->tiposMultas() as $tm)
          <option >{{$tm->multa}}</option>
         @endforeach
       </datalist>
       {!!Form::Text('nombre',null, array('id'=>'nombre_equipo','class' => 'nombre form-control','placeholder' => 'Nombre equipo','disabled' => 'disabled'))!!}


       </br>
       </br>


     <label><span class="glyphicon glyphicon glyphicon-align-left"></span> Nota</label></br>
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
