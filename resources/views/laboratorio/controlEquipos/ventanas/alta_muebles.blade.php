<div id="ModalMuebles" class="modal fade" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style=""><span class="glyphicon glyphicon-lock"></span> Alta de muebles</h3>
        </div>
        <div class="modal-body">
          <form class="" id="material" >



              <table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
                <thead>
                <tr>
                  <th style="width:50px" >Clasificaión</th>
                  <th>Ubicación</th>

                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th style="width:15px">Cantidad</th>
                  <th style="width:15px">Capacidad</th>
                  <th>Observaciones</th>
                <tr>
                </thead>
                <tbody id="tbodyMaterial">
                  <tr>
                    <td><select id="id_clasificacion1" style="width:120px" class="clasificacion form-control" name="" >
                      @foreach($laboratorio->categoriaslab() as $catLab)
                        @if($catLab->categoria()->nombre == "Herramientas")
                          @foreach($catLab->clasificaciones() as $c)
                              <option value="{{$c->nombre}}">{{$c->nombre}}</option>
                          @endforeach
                        @endif
                      @endforeach
                    </select></td>
                    <td><select style="width:120px" name="id_area1" id="id_area1" class="form-control" >
                      @foreach($laboratorio->areas() as $a)
                        <option value="{{$a->id_area}}">{!!$a->area!!}</option>
                      @endforeach

                   </select></td>
                    <td>{!!Form::textarea('nombre',null,array('id'=>'nombre','class'=>'form-control','size' => '35x1'))!!}</td>
                    <td>{!!Form::textarea('descripcion',null,array('id'=>'descripcion','class'=>'form-control','size' => '35x1'))!!}</td>
                    <td>{!!Form::textarea('cantidad',null,array('id'=>'cantidad','class'=>'form-control','size' => '35x1'))!!}</td>
                    <td>{!!Form::textarea('capacidad',null,array('id'=>'capacidad','class'=>'form-control','size' => '35x1'))!!}</td>
                    <td>{!!Form::textarea('observacion',null,array('id'=>'observacion','class'=>'form-control','size' => '35x1'))!!}</td>
                  </tr>
                </tbody>

             </table>


          </form>
          <button style="float:right" class="btn btn-success" name="" onclick="agregarFilaMaterial()">+</botton>

        </div>
      <div class="modal-footer"><button id="btnSigDetalle" type="button" class="btn btn-primary" >Siguiente</button></div>
  </div>

  </div>

</div>
