var pagina = 1;
$('document').ready(function() {
  $('#btnPrestamo').click(function() {
      $('#ModalPrestamo').modal('show');
      $('#clave_alumno').attr('autofocus',true);
      $("#"+id_area).css("background-color","#C3C3C3");

  });
  $('#btnConsulta').click(function() {
      $('#ModalConsultaPrestamo').modal('show');
  });
});

function dameNombre(){
  if($('#cve_solicitante').val().length > 2)
  {
    var data = "";
    var url = "";
    clave = $('#cve_solicitante').val();

    if($('#tipo_solicitante').val()==1)
    {
        url = "alumno/nombre";
        data = {
        clave_alumno: clave
      }
    }
    else {
     url = "profesor/nombre"
     data = {
      clave_profesor: clave
      }
    }
    $.ajax({
      url: BASE_UR + url,
      data: data,
      dataType:'json',
      type:'get',
      success: function(data) {
        if(data.success)
        {
          $('#nombre_solicitante').val(data.nombre);
        }
        else {
          $('#nombre_solicitante').val("");
          }
        }

      });
    }

}
function altaPrestamo()
{
  var data = $("#formPrestamo").serialize() + "&id_area="+id_area +"&page="+pagina;
  $.ajax({
    data: data,
    url: BASE_UR + "prestamos",
    dataType:'html',
    type:'POST',
    success: function(data) {

        $('#ModalPrestamo').modal('hide');
        $('#TablaPrestamos').html(data);
        borrarDatos("formPrestamo");
    }
  });
}
function borrarDatos(id)
{
  document.getElementById(id).reset();
}

$(document).on('click','.pagination a', function(e)
{
  e.preventDefault();
  pagina = $(this).attr('href').split('page=')[1];
  var data = {
    page: pagina
  }
  alert('2');

  $.ajax({
    url: BASE_UR + "prestamos/paginacion",
    data: data,
    dataType:'html',
    type:'post',
    success: function(data) {

          $('#TablaPrestamos').html(data);
    }
  });
}
);
