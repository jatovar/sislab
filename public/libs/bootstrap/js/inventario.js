BASE_UR_INV  = BASE_UR +"controlEquipos/";

$('document').ready(function() {
  $('#Materiales').click(function() {
    var numEquipos = 1;
    $('#ModalMaterial').modal('show');
  });
  $('#Herramientas').click(function() {
    var numEquipos = 1;
    $('#ModalHerramienta').modal('show');
  });
  $('#Muebles').click(function() {
    var numEquipos = 1;
    $('#ModalMuebles').modal('show');
  });
  $('#Computacionales').click(function() {
    var numEquipos = 1;
    $('#ModalComputacional').modal('show');
  });
  $('#btnSigDetalle').click(function() {
    $('#ModalClasificacion').modal('hide');
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
  $('#ModalHerramienta').modal('hide');
  $('#ModalCodigos').modal('show');
  //ducument.getElementById('tbody').remove();
  //agregarFila();
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
function guardarEquipo(cat)
{
  var url = BASE_UR_INV +"inventarioGuardar";
  var data = $("#formDetalle").serialize();
  if($('#clasificacion').val()=="")
  {
    data = data + '&id_categoria_inv='+cat;
  }
  else {
    data = data + '&id_clasificacion='+$('#clasificacion').val();

  }
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

          }

  });
  return false;
}
function guardarCodigos(id_detalle_item)
{
  var url = BASE_UR_INV +"inventarioGuardarCodigos";
  for(i=1;i<=numEquipos;i++)
  {
    var data =
    {
      id_detalle_item : id_detalle_item,
      id_area : $('#id_area'+i).val(),
      codigo_lab : $('#codigo_lab'+i).val(),
      fecha_registro : $('#fecha_registro'+i).val(),
      codigo_uaslp_1 : $('#codigo_uaslp_1'+i).val(),
      codigo_uaslp_2 : $('#codigo_uaslp_2'+i).val(),
      num_serie : $('#no_serie'+i).val(),
      mac : $('#mac'+i).val()
    }
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

            }

    });
  }
  return false;
}
function agregarFila()
{

    var tabla = document.getElementById("tablaCodigos");
    arr = document.getElementById('id_area1');
    numEquipos += 1;
    tr = document.createElement("tr");
    td = document.createElement("td");
    select = document.createElement("select");
    select.type = "text";
    select.id = "id_area"+numEquipos;
      for(i=0;i<arr.children.length; i++)
      {
        option = document.createElement('option');
        option.innerHTML =   arr.children[i].innerHTML;
        option.value =   arr.children[i].value;
        select.appendChild(option);
      }

    select.setAttribute('class',"form-control");
    td.appendChild(select);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_lab"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "fecha_registro"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_uaslp_1"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "codigo_uaslp_2"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "no_serie"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "mac"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);
    tabla.appendChild(tr);

}
function agregarFilaMaterial()
{
    var tabla = document.getElementById("tbodyMaterial");
    arr = document.getElementById('id_clasificacion1');
    numEquipos += 1;
    tr = document.createElement("tr");
    td = document.createElement("td");

    select = document.createElement("select");
    select.id = "id_clasificacion1";

    for(i=0;i<arr.children.length; i++)
    {
        option = document.createElement('option');
        option.innerHTML =   arr.children[i].innerHTML;
        option.value =   arr.children[i].value;
        select.appendChild(option);
    }

    select.setAttribute('class',"form-control");
    td.appendChild(select);
    tr.appendChild(td);


    arr = document.getElementById('id_area1');
    td = document.createElement("td");
    select = document.createElement("select");
    select.id = "id_area"+numEquipos;
      for(i=0;i<arr.children.length; i++)
      {
        option = document.createElement('option');
        option.innerHTML =   arr.children[i].innerHTML;
        option.value =   arr.children[i].value;
        select.appendChild(option);
      }

    select.setAttribute('class',"form-control");
    td.appendChild(select);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "nombre"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "descripcion"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "cantidad"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);


    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "capacidad"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    td = document.createElement("td");
    input = document.createElement("input");
    input.type = "text";
    input.id = "observacion"+numEquipos;
    input.setAttribute('class',"form-control");
    td.appendChild(input);
    tr.appendChild(td);

    tabla.appendChild(tr);

}
