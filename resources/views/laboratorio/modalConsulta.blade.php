{!! Html::style('libs/css/consultaAcceso.css') !!}

{!! Html::script('libs/js/consultasPrestamo.js') !!}

<script>

</script>


</script>
<div id="ModalConsultaPrestamo" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Consultas de Prestamo</h3>
        </div>

      <div class="modal-body">
        <form id="formConsulta" role="form">
          <div class="form-group" style="padding: 0px 0px;">
            <div class="Etiqueta">Fecha  </div>

            <span  class="label label-default" >De:</span>

            <input type="date" id="fechaIni" value="<?php echo date('Y-m-d'); ?>">
            <span  class="label label-default">a:</span>
            <input type="date" id="fechaFin" value="<?php echo date('Y-m-d'); ?>">
            <div class="Etiqueta">Consulta Por</div>
            <span>Equipo<input name="consulta" id="equipo" type="text"  onkeyup="consultaPrestamo(this)" /><span>

            <span>Clave <input name="consulta" id="clave" type="text" onkeyup="consultaPrestamo(this)" /><span>

            </br>
          </br>

              <div id="TablaConsulta">
                @include('laboratorio.tablaConsulta')
              </div>
          </div>
        </form>


      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary" onclick="altaRegistro()" >OK</button></div>

    </div>
  </div>
</div>
