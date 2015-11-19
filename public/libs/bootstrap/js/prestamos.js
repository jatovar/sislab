var pagina = 1;
$('document').ready(function() {
  $('#boton').click(function() {
      $('#myModal').modal('show');
      $('#clave_alumno').attr('autofocus',true);
      $("#"+id_area).css("background-color","#C3C3C3");

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
  var data = $("#form").serialize() + "&id_area="+id_area + "&id_lab="+ID_LABORATORIO +"&page="+pagina;
  $.ajax({
    url: BASE_UR + "prestamo_equipo/alta",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        $('#myModal').modal('hide');
        $('#myModal').html(data);
        borrarDatos();

      }
      else {
        //$('#nombre_alumno').val("");
        alert(data.msj);
      }
    }
  });
}
function borrarDatos()
{
  $("cve_solicitante").val("");
  $("nombre_solicitante").val("");
  $("codigo_lab").val("");
  $("nombre_equipo").val("");
  $("descripcion").val("");

}

$(document).on('click','.pagination a', function(e)
{
  e.preventDefault();
  pagina = $(this).attr('href').split('page=')[1];
  var data = {
    id_lab: ID_LABORATORIO,
    page: pagina
  }

  $.ajax({
    url: BASE_UR + "controlAlumnos/prestamo_equiposPaginacion",
    data: data,
    dataType:'html',
    type:'get',
    success: function(data) {

          $('#TablaPrestamos').html(data);
    }
  });
}
);
