

function mostrarAlerta(msg,id){
  $("#alert-"+id).html(msg);
  $("#alert-"+id).css("visibility","visible");
  $("#alert-"+id).css("position","relative");
  $("#alert-"+id).fadeTo(2000, 500).slideUp(500, function(){
      $("#alert-"+id).alert('close');
      $("#alert-"+id).css("visibility","hidden");
      $("#alert-"+id).css("position","absolute");
  });


}
