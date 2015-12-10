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
  $('#boton').click(function() {
      $('#myModal').modal('show');
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
    url: BASE_UR + "controlEquipos/mantenimiento/alta",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        $('#myModal').modal('hide');

      }
      else {
        //$('#nombre_alumno').val("");
        alert(data.msj);
      }
    }
  });

}
