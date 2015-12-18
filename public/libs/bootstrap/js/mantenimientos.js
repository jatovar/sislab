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
  $('#btnMantenimientos').click(function() {
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
  var data = $("#formMantenimiento").serialize() + "&id_area="+id_area;
  $.ajax({
    url: BASE_UR + "controlEquipos/mantenimientos",
    data: data,
    dataType:'html',
    type:'POST',
    success: function(data) {
        $('#TablaMantenimientos').html(data);
        $('#ModalMantenimiento').modal('hide');
        borrarDatos("formMantenimiento");
      }


  });
}
function borrarDatos(id)
{
    document.getElementById(id).reset();
}
