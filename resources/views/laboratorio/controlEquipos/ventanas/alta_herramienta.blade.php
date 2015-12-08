<div id="ModalHerramienta"  class="modal fade" role="dialog">

<div class="modal-dialog">


  <div class="modal-content">
      <!-- dialog body -->
    <div class="modal-header"; style="height:12%;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 style=""><span class="glyphicon glyphicon-lock"></span> Alta de Herramientas</h3>
    </div>

  <div class="modal-body" style="height:78%;overflow-y:scroll">


    <table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">

      <thead>
        <tr>
          <th colspan="3" rowspan="1">Datos generales</th>
        </tr>
      </thead>
    <tbody>
      <tr>

        <form id="formDetalle">

        </tr>
        <tr>
        <form id="formDetalle">
        <th colspan="1">Nombre </th>
        <th colspan="1">Marca</th>
        <th colspan="1">Módelo</th>
        </tr>
        <tr >
          <td  colspan="1">{!! Form::textarea('nombre',null,array('class'=>'form-control','size' => '35x1'))!!}</td>
              <td  colspan="1">{!! Form::textarea('marca',null,array('class'=>'form-control','size' => '35x1'))!!}</td>

              <td colspan="1">{!!Form::textarea('modelo',null,array('class'=>'form-control','size' => '35x1'))!!}</td>

        </tr>

        <tr>
          <th colspan="1" >Especificaciones Principales</th>
          <th colspan="1">Lista de accesorios y partes</th>
          <th colspan="1">Uso</th>

        </tr>

      <tr>
        <td colspan="1">{!!Form::textarea('caracteristicas',null,array('class'=>'form-control','size' => '35x5'))!!}</td>
        <td colspan="1">{!!Form::textarea('accesorios_partes',null,array('class'=>'form-control','size' => '35x5'))!!}</td>
        <td colspan="1">{!!Form::textarea('uso',null,array('class'=>'form-control','size' => '35x5'))!!}</td>
      </tr>

      <tr>
        <th colspan="1">Documento</th>
        <th>Instructivo</th>
        <th>Foto</th>

      </tr>

      <tr>
        <td colspan="1">{!!Form::textarea('documento',null,array('class'=>'form-control','size' => '35x2'))!!}</td>
        <td colspan="1">{!!Form::textarea('instructivo',null,array('class'=>'form-control','size' => '35x2'))!!}</td>
        <td rowspan="6" colspan="2">{!! Html::image('img/0.png','alt', array('width' => 300 )) !!}
        <div class="text-center">            {!! Form::label('file', 'File') !!}
                            <span class="btn btn-default btn-file">
                               {!! Form::file('file') !!}</span>
        </diV>
          </td>
      </tr>
    <tr>
      <th colspan="1">Materiales Consumibles</th>
      <th colspan="1">Puntos a Checar</th>
    </tr>
        <tr>
          <td colspan="1">{!!Form::textarea('materiales_consumibles',null,array('class'=>'form-control','size' => '35x3'))!!}</td>
          <td colspan="1">{!!Form::textarea('puntos_checar',null,array('class'=>'form-control','size' => '35x3'))!!}</td>
        </tr>
    <tr>
        <th>Inversión</th>
        <th>Nota especial</th>
    </tr>

    <tr>

    </tr>
    <tr>
      <td colspan="1">
        <select id="clasificacion" name="clasificacion" class='form-control'>
          <option value="UASLP">UASLP</option>
          <option value="Donado">Donado</option>
          <option value="Privado">Privado</option>

      </select>
    </td>

      <td colspan="1" >{!!Form::text('nota_especial',null,array('class'=>'form-control'))!!}</td>
    </tr>

    </form>

    </tbody>
    </table>

  </div>
  <div class="modal-footer" style="height:9%;"><button type="button" class="btn btn-primary" onclick="siguiente()" >Siguiente</button></div>

</div>

</div>

</div>

<!-------------------------------->


<div id="ModalCodigos" class="modal fade" role="dialog">
  <div class="modal-dialog"  >


    <div class="modal-content">
      <!-- dialog body -->

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Alta de equipo</h3>
        </div>

      <div class="modal-body">
<table  class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">

<thead>
  <tr>
    <th colspan="5" rowspan="1">Códigos unicos de equipo</th>
    <th colspan="2" rowspan="1">Seleccione número de eqipos

  </th>
    <tr>
      <th >Ubicación</th>
      <th >Código Lab</th>
      <th>Fecha de Introdución</th>

      <th>Número Inventario 1</th>
      <th>Número Inventario 2</th>
      <th >Número serie</th>

      <th>Dirección address</th>
    </tr>
  </tr>
</thead>
<tbody id="tablaCodigos">
  <form id="formCodigos1">
    <tr>
      <td colspan="1">
        <select style="width:120px" name="id_area1" id="id_area1" class="form-control" >
          @foreach($laboratorio->areas() as $a)
            <option value="{{$a->id_area}}">{!!$a->area!!}</option>
          @endforeach

       </select>
     </td>
       <td>  {!!Form::text('codigo_lab1',null,array('id'=> 'codigo_lab1', 'class'=>'form-control'))!!}</td>
         <td>{!! Form::text('fecha_registro1',null,array('id'=>'fecha_registro1','class'=>'form-control'))!!}</td>

        <td> {!! Form::text('codigo_uaslp_11',null,array('id'=>'codigo_uaslp_11','class'=>'form-control'))!!}
        </td>

        <td> {!! Form::text('codigo_uaslp_21',null,array('id'=>'codigo_uaslp_21','class'=>'form-control'))!!}</td>

        <td>{!!Form::text('num_serie1',null,array('id'=>'no_serie1','class'=>'form-control'))!!}</td>

      <td> {!! Form::text('mac1',null,array('id'=>'mac1','class'=>'form-control'))!!}</td>
    </tr>
  </form>
</tbody>
</table>
<button style="float:right" class="btn btn-success" name="" onclick="agregarFila()">+</botton>

</div>
<div class="modal-footer"><button type="button" class="btn btn-primary" onclick="guardarEquipo()" >Guardar</button></div>
</div>

</div>

</div>


<!------------------->


<div id="ModalClasificacion" class="modal fade" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Alta de Herramientas</h3>
        </div>
        <div class="modal-body">
          <form class="" action="index.html" method="post">
            <label class="label label-default">Seleccione la categoria</label>
          </br>
        </br>

              <select class="categoria form-control" name="">
                  @foreach($laboratorio->categoriaslab() as $catLab)
                    <option>{{$catLab->categoria()->nombre}}</option>
                  @endforeach
              </select>
            </br>

        <label class="label label-default">Seleccione clasificacion</label>
      </br>
    </br>


              <select class="clasificacion form-control" name="" >
                @foreach($laboratorio->categoriaslab() as $catLab)
                    @foreach($catLab->clasificaciones() as $c)
                        <option>{{$c->nombre}}</option>
                    @endforeach
                @endforeach
              </select>


          </form>
        </div>
      <div class="modal-footer"><button id="btnSigDetalle" type="button" class="btn btn-primary" >Siguiente</button></div>
  </div>

  </div>

</div>
