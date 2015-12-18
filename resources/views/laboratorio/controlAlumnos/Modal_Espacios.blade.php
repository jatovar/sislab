<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      Espacions
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">

      @for ($i = 0; $i < $cantidad; $i++)
      <label   class="label label-primary" style="margin:5px;" id="{{'Esp'.$i}}" >
        <span class="glyphicon glyphicon-unchecked">{{$i}}</span>
      </label>
      @endfor
    </div>
  </div>
</div>
