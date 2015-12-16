$('document').ready(function() {
  $('#btnNuevo').click(function() {
      $('#ModalMulta').modal('show');
      $('#cve_alumno').attr('autofocus',true);

  });
/*  $('#btnConsulta').click(function() {
      $('#ModalConsultaPrestamo').modal('show');
  });*/
});
function dameNombreAlumno(){

    clave = $('#cve_alumno').val();
    var data = {
      clave_alumno: clave
    }

    $.ajax({
      url: BASE_UR + "/alumno/nombre",
      data: data,
      dataType:'json',
      type:'get',
      success: function(data) {
        if(data.success)
        {
          $('#nombre_alumno').val(data.nombre);
        }
        else {
          $('#nombre_alumno').val("");
        }
      }
    });
}
