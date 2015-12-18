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
function dameTipoMulta(){

    multa = $('#tipo_multa').val();
    if(multa!="")
    {
      var data = {
        multa: multa
      }
      $.ajax({
        url: BASE_UR + "tipomulta/buscar",
        data: data,
        dataType:'json',
        type:'get',
        success: function(data) {

          if(data.success)
          {
            $('#costo').val(data.costo);
          }
          else {
            $('#costo').val("");
          }
        }
      });
    }
}
function altaMulta()
{
  var data = $("#formMulta").serialize();
  alert(data);
  $.ajax({
    data: data,
    url: BASE_UR + "multas",
    dataType:'html',
    type:'POST',
    success: function(data) {

        $('#ModalMulta').modal('hide');
        $('#TablaMulta').html(data);
        borrarDatos("formMulta");
    }
  });
}
function borrarDatos(id)
{
  document.getElementById(id).reset();
}
