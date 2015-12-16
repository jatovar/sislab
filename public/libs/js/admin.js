

function registrarBecario(){
  var url = BASE_UR + "becario";
  var data = $("#formbecario").serialize();

  $.ajax({
    data: data,
    url: url,
    type: 'POST',
    datatype: 'json',
    success: function (result){
      //  alert(result);
      mostrarAlerta(result.msg,result.tipo);
      borrarDatos("formbecario");

    },
    error : function(xhr,ajaxOptions,thrownError){
      //alert(xhr.status + ' ' + thrownError + '\n' );
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
      //alert(xhr.status + ' ' + thrownError + '\n' );
    },
    traditional: true,
  });
}

function muestraConfirmacion(){
  


}
