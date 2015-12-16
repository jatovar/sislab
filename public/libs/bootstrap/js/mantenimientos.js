var id_area = 1;

function seleccionaArea(t)
{
  if(t.id != id_area)
  {
    $("#"+t.id).css("background-color","#C3C3C3");
    $("#"+id_area).css("background-color","#798D8F");
    id_area = t.id;
  }
}
$('document').ready(function() {
  $('#btnNuevoMant').click(function() {
      $('#ModalMantenimiento').modal('show');
      $('#actividad').focus();
      $("#"+id_area).css("background-color","#C3C3C3");

  });
  $('#btnOk').click(function() {
    altaMantenimiento();
  });
});
function altaMantenimiento()
{
  var data = $("#form").serialize() + "&id_area="+id_area;
  $.ajax({
    url: BASE_UR + "controlEquipos/mantenimiento/store",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        $('#ModalMantenimiento').modal('hide');

      }
      else {
        //$('#nombre_alumno').val("");
        alert(data.msj);
      }
    }
  });

}
