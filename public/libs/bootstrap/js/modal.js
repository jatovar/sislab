var id_area = 1;

function seleccionaArea(t)
{
  if(t.id != id_area)
  {
    $("#"+t.id).css("background-color","#C3C3C3");
    $("#"+id_area).css("background-color","white");
    id_area = t.id;
  }
}
function dameNombreEquipo()
{

  cod = $('#codigo_lab').val();
  var data = {
    codigo_lab: cod
  }

  $.ajax({
    url: BASE_UR + "/invitem/nombre",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        $('#nombre_equipo').val(data.nombre);
      }
      else {
        $('#nombre_equipo').val("");
      }
    }
  });
}
