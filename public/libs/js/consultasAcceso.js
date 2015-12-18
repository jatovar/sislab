function consultaAcceso(t)
{
  var data = {
    fechaIni: $('#fechaIni').val(),
    fechaFin: $('#fechaFin').val(),
    op : t.id,
    id_lab: ID_LABORATORIO,
    dato: t.value
  }


  $.ajax({
    url: BASE_UR + "controlAlumno/entradasAlumno",
    data: data,
    dataType:'html',
    type:'get',
    success: function(data) {

          $('#TablaConsulta').html(data);
    }
  });



}
