<div id="ModalMulta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span>Alta Multas</h3>
        </div>

      <div class="modal-body">
      <form id="formMulta" role="form">
          <div class="form-group" style="padding: 0px 0px;">

      <label for="alumno"><span class="glyphicon glyphicon-user"></span> Datos del alumno </label>
       </br>
      {!!Form::Text('cve_alumno',null, array('id'=>'cve_alumno','class' => 'clave form-control','placeholder' => 'Clave alumno', 'onkeyup'=>'dameNombreAlumno()'))!!}
       {!!Form::Text('nombre',null, array('id'=>'nombre_alumno','class' => 'nombre form-control','placeholder' => 'Nombre alumno','disabled' => 'disabled'))!!}
     </br>
    </br>

      </br>
      <label for="multa"><span class="glyphicon glyphicon-tower"></span>Multa</label></br>

       {!!Form::Text('tipo_multa',null, array('list'=>'multas','id'=>'tipo_multa','class' => 'clave form-control','placeholder' => 'tipo multa','onkeyup'=>'dameTipoMulta()','onchange'=>'dameTipoMulta()'))!!}

       <datalist id="multas">
         @foreach($laboratorio->tiposMultas() as $tm)
          <option >{{$tm->multa}}</option>
         @endforeach
       </datalist>
       {!!Form::Text('costo',null, array('id'=>'costo','class' => 'nombre form-control','placeholder' => 'costo','disabled' => 'disabled'))!!}


       </br>
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
