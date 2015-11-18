var pagina = 1;
$('document').ready(function() {
  $('#boton').click(function() {
      $('#myModal').modal('show');
      $('#clave_alumno').attr('autofocus',true);
      $("#"+id_area).css("background-color","#C3C3C3");

  });
});

function dameNombreAlumno(){
  
    if($('#tipo_solicitante').val()==1)
    {
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
}
function altaPrestamo()
{
  var data = $("#form").serialize() + "&id_area="+id_area + "id_lab="+ID_LABORATORIO +"page="+pagina;
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
  alert(BASE_UR);
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
