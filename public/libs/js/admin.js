

function registrarBecario(){
  var url = BASE_UR + "becario";
  var data = $("#formbecario").serialize();

  $.ajax({
    data: data,
    url: url,
    type: 'POST',
    datatype: 'json',
    success: function (result){
      mostrarAlerta(result.msg,result.tipo);
      borrarDatos("formbecario");
    },
    error : function(xhr,ajaxOptions,thrownError){

    },
    traditional: true,
  });
}

function borrarDatos(id){
  document.getElementById(id).reset();
}
function registrarArea(){

  var url = BASE_UR + "area";
  var data = $("#formArea").serialize();

  $.ajax({
    data: data,
    url: url,
    type: 'POST',
    datatype: 'json',
    success: function (result){
      mostrarAlerta(result.msg,result.tipo);
      borrarDatos("formArea")
    },
    error : function(xhr,ajaxOptions,thrownError){

    },
    traditional: true,
  });
}

function muestraConfirmacion(id){
  var r = confirm("¿Realmente deseas borrar el registro?");
  if (r == true) {
    var url = BASE_UR + "becario/destroy";
    var data = {_method:"DELETE",id:id};
    
    $.ajax({
      data: data,
      url: url,
      type: 'POST',
      datatype: 'json',
      success: function (result){
                $("#Fila"+id).remove();
      },
      error : function(xhr,ajaxOptions,thrownError){

      },
      traditional: true,
    });
  } else {

  }
}
