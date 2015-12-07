function consultaAcceso()
{

  var data = {
    id_lab: ID_LABORATORIO,
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
