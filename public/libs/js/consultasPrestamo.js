function consultaPrestamo(t)
{

  var data = {
    fechaIni: $('#fechaIni').val(),
    fechaFin: $('#fechaFin').val(),
    op : t.id,
    dato: t.value
  }

  $.ajax({
    url: BASE_UR + "prestamos/consulta",
    data: data,
    dataType:'html',
    type:'get',
    success: function(data) {

          $('#TablaConsulta').html(data);
    }
  });



}
