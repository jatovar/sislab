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
$(document).on('click','.pagination a', function(e)
{
  e.preventDefault();
  pagina = $(this).attr('href').split('page=')[1];
  var data = {
    id_lab: ID_LABORATORIO,
    page: pagina,
    cve_alumno: $('#cve_alumno').val()

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
);
