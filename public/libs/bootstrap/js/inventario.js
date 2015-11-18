BASE_UR_INV  = BASE_UR +"controlEquipos/";

$('document').ready(function() {
  $('#boton').click(function() {
    $('#myModal').modal('show');
  });
});
var id_area = 1;
var numEquipos = 1;
function seleccionaArea(t)
{
  if(t.id != id_area)
  {
    $("#"+t.id).css("background-color","#C3C3C3");
    $("#"+id_area).css("background-color","white");
    id_area = t.id;
  }
}
function siguiente()
{
  $('#myModal').modal('hide');
  $('#ModalCodigos').modal('show');
  ducument.getElementById('tbody').remove();
  agregarEquipos(1);
}
function nuevoEquipo()
{
  var url = BASE_UR_INV +"inventarioNuevo";
  var data = {
        };
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'html',
          success:  function (result) {
                      $("#Contenido").html(result);

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;

}
function modificarEquipo(id_item)
{
  var url = BASE_UR_INV +"inventarioModificar";
  var data = {
          id_item : id_item
        };
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'html',
          success:  function (result) {
                      $("#Contenido").html(result);

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;

}
function detalleEquipo(id_item)
{
  var url = BASE_UR_INV +"inventarioDetalle";
  var data = {
          id_item : id_item
        };
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'html',
          success:  function (result) {
                      $("#Contenido").html(result);

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;
}
function guardarCambiosEquipo(id_item)
{
  alert(id_item);
  var url = BASE_UR_INV +"inventarioGuardarCambios";
  var data = {
          id_item : id_item
        };
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'html',
          success:  function (result) {
                      $("#Contenido").html(result);

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;
}
function guardarEquipo()
{
  var url = BASE_UR_INV +"inventarioGuardar";
  var data = $("#formDetalle").serialize();
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'json',
          success:  function (result) {
            if(result.success)
            {
                guardarCodigos(result.id_detalle_item);
            }

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;
}
function guardarCodigos(id_detalle_item)
{
  var url = BASE_UR_INV +"inventarioGuardarCodigos";
  var data = $("#formCodigos").serialize() + "&id_detalle_item="+id_detalle_item;
  $.ajax({
          data:  data,
          url:  url,
          type:  'get',
          dataType: 'json',
          success:  function (result) {
            if(result.success)
            {
              alert("equipos agregados");
            }

          },
          error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + ' ' + thrownError + '\n' + xhr.responseText);
    }
  });
  return false;
}
function agregarEquipos(n)
{

  var tabla = document.getElementById("tablaCodigos");
  for(var i = numEquipos; i<n; i++)
  {

    tr = document.createElement("tr");
    td = document.createElement("td");
    select = document.createElement("select");
    select.type = "text";
    select.id = "id_area";
    select.setAttribute('class',"form-control");
    td.appendChild(select);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_lab";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "fecha_registro";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_uaslp_1";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_uaslp_2";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "no_serie";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "mac";
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    tabla.appendChild(tr);
  }
  numEquipos = n;
}
