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

    },
    error : function(xhr,ajaxOptions,thrownError){
      //alert(xhr.status + ' ' + thrownError + '\n' );
    },
    traditional: true,
  });
}
