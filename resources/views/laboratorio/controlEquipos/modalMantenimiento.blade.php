<div id="ModalMantenimiento" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Control de Mantenimientos</h3>
        </div>

      <div class="modal-body">
        <form id="formMantenimiento" role="form">
          <div class="form-group">
            <label for="actividad"><span class="glyphicon glyphicon-asterisk"></span> Actividad </label>
            <textarea name="actividad" rows="1" cols="40" autofocus="true" type="text" class="form-control" id="actividad" placeholder="Describa la actividad que se realizo" onkeyup="dameActividades()"></textarea>
          </br>
            <label for="area"><span class="glyphicon glyphicon-th-large"></span> Area </label><br>
            @foreach($laboratorio->areas() as $a)
              <div class="btn btn-default" id="{{$a->id_area}}" onclick="seleccionaArea(this)">  {{$a->area}} </div>
            @endforeach
          </br>
        </br>

        <label for="equipo"><span class="glyphicon glyphicon-tower"></span> Equipo</label></br>
        {!!Form::Text('codigo_lab',null, array('id'=>'codigo_lab','class' => 'clave form-control','placeholder' => 'Codigo equipo','onkeyup'=>'dameNombreEquipo()'))!!}

        {!!Form::Text('nombre',null, array('id'=>'nombre_equipo','class' => 'nombre form-control','placeholder' => 'Nombre equipo','disabled' => 'disabled'))!!}
         </br>
          </br>
          </br>
          <label for="equipo"><span class="glyphicon glyphicon glyphicon-align-left"></span> Descripción</label></br>
            <textarea name="descripcion" rows="3" cols="40" type="text" class="form-control" id="descripcion" placeholder="" ></textarea>

          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" id="btnOk" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>
