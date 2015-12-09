{!! Html::style('libs/css/consultaAcceso.css') !!}

{!! Html::script('libs/js/consultasAcceso.js') !!}

<script>

</script>


</script>
<div id="ModalConsulta" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Consultas de Acceso</h3>
        </div>

      <div class="modal-body">
        <form id="form" role="form">
          <div class="form-group" style="padding: 0px 0px;">
            <div class="Etiqueta">Fecha  </div>

            <span  class="label label-default" >De:</span>

            <input type="date" id="fechaIni">
            <span  class="label label-default">a:</span>
            <input type="date" id="fechaFin">
            <div class="Etiqueta"> Alumnos</div>
            <span>Frecuentes</span><select id="frecuentes" onclick="consultaAcceso()">
              @foreach([1,2,3,4,5,6,7,8,9,10] as $num)
                <option value="{{$num}}">{{$num}}</option>
              @endforeach

          </select>
            <span>Por clave<input name="consulta" id="cve_alumno" type="text" onkeyup="consultaAcceso(this)" /><span>

            </br>
          </br>

              <div id="TablaConsulta">
                @include('laboratorio.controlAlumnos.tablaConsulta')
              </div>
          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary" onclick="altaRegistro()" >OK</button></div>

    </div>
  </div>
</div>
